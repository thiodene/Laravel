<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DependenciesTest extends TestCase
{
    /**
     * This series of tests checks for Dependencies
     * They should be physically located in vendor folder
     * @return void
     */

    // This Tests verifies the package is physically located in vendor folder
    public function testPackage() 
    {
        // Get the package list from .ENV file
        $this->environmentFile = '.env';
        $package_list = explode(',', env('UNIT_TEST_PACKAGE'));
        
        foreach ($package_list as $packagepath) 
        {
            // Check if the package is there in vendor
            if(file_exists($packagepath))
            {
                $this->assertTrue(true);
            }
            else
                $this->assertTrue(false);
        }
    }

    // This Tests verifies that the Vue dependency is properly installed
    public function testVuePackage() 
    {
        // Get the Vue package info from .ENV file
        $this->environmentFile = '.env';
        list($composer_require_expected, 
            $package_devdep_expected,
            $package_dep_expected) = explode(',', env('UNIT_TEST_VUE'));
        
        // Check if the Composer Laravel/UI is installed
        $composerpath = 'composer.json';
        $readpath = file_get_contents($composerpath);
        $composer_json = json_decode($readpath);
        if ($composer_json)
        {
            // Test Composer Require
            if (isset($composer_json->require->{'laravel/ui'}))
            {
                $composer_require_expected_major = explode('.', $composer_require_expected)[0];
                $composer_require_actual_major = explode('.', $composer_json->require->{'laravel/ui'})[0];
                $this->assertEquals('^'.$composer_require_expected_major, $composer_require_actual_major, 'Update Laravel/UI Package for Vue!' );
            }
            else
                $this->assertTrue(false);
        }
        else
            $this->assertTrue(false);  

        // Check if the Packages for Vue installed
        $packagepath = 'package.json';
        $readpath = file_get_contents($packagepath);
        $package_json = json_decode($readpath);
        if ($package_json)
        {
            // Test Package DevDependencies for Vue
            // Check only major version changes
            if (isset($package_json->devDependencies->vue))
            {
                $package_devdep_expected_major = explode('.', $package_devdep_expected)[0];
                $package_devdep_actual_major = explode('.', $package_json->devDependencies->vue)[0];
                $this->assertEquals('^'.$package_devdep_expected_major, $package_devdep_actual_major, 'Update Vue DevDependencies Package!' );
            }
            else
                $this->assertTrue(false);

            // Test Package Dependencies
            if (isset($package_json->dependencies->{'vue-components-library'}))
                $this->assertEquals($package_dep_expected, $package_json->dependencies->{'vue-components-library'}, 'Update Vue Dependencies!' );
            else
                $this->assertTrue(false);
        }
        else
            $this->assertTrue(false); 
    }

}

