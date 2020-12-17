<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VersionsTest extends TestCase
{

    /**
     * This series of tests checks for correct Package managers and server software versions
     * If too old or not installed , App might not work properly
     * @return void
     */

    // This Tests verifies the actual version is above the expected
    public function testVersion() 
    {
        
        // Get the version list from .ENV file
        $this->environmentFile = '.env';
        $version_list = explode(',', env('UNIT_TEST_VERSION'));
        
        foreach ($version_list as $version) 
        {
            list($versionname, $version_expected) = explode(':', $version);
            // is installed?
            $version_actual = trim(shell_exec($versionname . ' -v'));
            if (strpos($version_actual, 'command not found'))
                $this->assertTrue(false);
            else
            {
                // Particular cases
                if (strpos($version_actual, ' '))
                    $version_actual = explode(' ', $version_actual)[1];
                else
                    $version_actual = str_replace('v', '', $version_actual);
            }

            $version_actual_arr = explode('.', $version_actual);
            $version_actual_size = sizeof($version_actual_arr);

            // Use the first 2 numbers of the Version for comparison
            if ($version_actual_size >= 2)
                $version_actual_version = $version_actual_arr[0] . '.' . $version_actual_arr[1];
            else
                $version_actual_version = $version_actual_arr[0];

            //Compare the actual Version to the expected
            $this->assertTrue($version_actual_version >= $version_expected);
        }
    }

    // This Tests verifies that the actual Laravel version not older than the expected
    public function testLaravelVersion() 
    {
        // Get the version list from .ENV file
        
        $this->environmentFile = '.env';
        $laravel_expected = explode('.', env('UNIT_TEST_LARAVEL'))[0];
        
        //Actual Laravel Version from SHELL Script
        $laravel_actual = trim(shell_exec('php artisan --version'));
        $laravel_actual_version_arr = explode(' ', $laravel_actual);
        $laravel_actual_v = $laravel_actual_version_arr[sizeof($laravel_actual_version_arr) - 1];

        $laravel_actual_arr = explode('.', $laravel_actual_v);
        $laravel_actual_size = sizeof($laravel_actual_arr);

        // Use the first 2 numbers of the Version for comparison
        $laravel_actual_version = $laravel_actual_arr[0];

        //Compare the actual Laravel Version to the expected
        $this->assertEquals($laravel_expected, $laravel_actual_version, 'Expected Laravel version: ' . $laravel_expected);
    }

}
