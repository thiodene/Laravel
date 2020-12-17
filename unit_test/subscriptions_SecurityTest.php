<?php

namespace Tests\Feature;

use Session;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use DCPP\Auth\Http\Controllers\SecurityController;
use \Firebase\JWT\JWT; // Used to create token

class SecurityTest extends TestCase
{
    /**
     * This series of tests checks for Security Package
     * If not installed , App might not work properly
     * @return void
     */
    
    // This Tests verifies that the laravel-auth is inside the composer.json
    public function testSecurityComposerJson() 
    {
        // Get the security package info from .ENV file
        $this->environmentFile = '.env';
        list($composer_require_expected, $composer_repositories_expected) = explode(',', env('UNIT_TEST_SECURITY_PACKAGE'));
        
        // Check if the Security Package Laravel-Auth is installed
        $filepath = 'composer.json';
        $readpath = file_get_contents($filepath);
        $composer_json = json_decode($readpath);
        if ($composer_json)
        {
            // Test Composer Require
            if (isset($composer_json->require->{'dcpp/laravel-auth'}))
                $this->assertEquals('^'.$composer_require_expected, $composer_json->require->{'dcpp/laravel-auth'}, 'Update Laravel-Auth Security Package!' );
            else
                $this->assertTrue(false);

            // Test Composer Repositories
            if (isset($composer_json->repositories->{'laravel-auth'}))
                $this->assertEquals($composer_repositories_expected, $composer_json->repositories->{'laravel-auth'}->url, 'Update Laravel-Auth Security Package!' );
            else
                $this->assertTrue(false);
        }
        else
            $this->assertTrue(false);  
    }


    // This Tests verifies the import + permission of the Security Package to Use the App
    public function testSecurityPermission() 
    {
        // Convert the user object (including child nodes) to an array
        function objectToArray($d) 
        {
            // Gets the properties of the given object with get_object_vars function
            if (is_object($d)) 
            {
                $d = get_object_vars($d);
            }
        
            // array_map applies the callback to the elements of the given arrays; PHP callback are functions that may be called dynamically by PHP
            //__FUNCTION__ returns only the name of the function
            if (is_array($d)) 
            {
                return array_map(__FUNCTION__, $d);
            }
            else
            {
                return $d;
            }
        }
        // Create Web Token
        include app_path() . '/../config/token_' . env('APP_TEST_ROLE') . '.php';
        $t = JWT::encode($t, env('MICROSERVICE_KEY'));
        // Decode JSON web token
        $token = JWT::decode($t, env('MICROSERVICE_KEY'), array('HS256'));

        // Create User Session
        $userArray = objectToArray($token);
        Session::put('user', $userArray);
        // Get user from session
        $user = Session::get('user');
        
        // Now from User session create a security controller
        $security = new SecurityController;

        // should return `1` if the user has access to the App
        $this->assertTrue($security->check_microservice(env('APP_NAME')));
    }

}
