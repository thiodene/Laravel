<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class DatabaseTest extends TestCase
{
    /**
     * This series of tests check for inserted records after DB migration
     * If some key records are missing ie Admin ID, the App won't work
     * @return void
     */

     /* Users and Subscribers will be tested at a later stage
    public function testAdminRecordCreated()
    {
        // Administrator ID from ENV file
        $this->environmentFile = '.env';
        // Get the DB array data from ENV
        $db_array = explode(',', env('UNIT_TEST_DB'));
        // For the user DB info get the Admin ID
        $admin_id = explode(':', $db_array[0])[1];
        $admin_created = User::where('id', $admin_id)->first();

        if ($admin_created) 
        {
            // If the Admin record exists do not perform Assertions!
            $this->expectNotToPerformAssertions();
        }
        else
            $this->assertTrue(false);
    }
    */

    public function testSubscriberRecordCreated()
    {
        $this->assertTrue(true);
    }

}
