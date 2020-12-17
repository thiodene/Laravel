<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FolderPermissionTest extends TestCase
{
    /**
     * This series of tests checks for correct Storage folders permissions
     * If not,they will create errors while saving Log files
     * @return void
     */

    public function testStorageFolderWritable()
    {
        // Get the Permission value for .ENV file set for Storage Folders 
        $this->environmentFile = '.env';
        $folder_list = explode(',', env('UNIT_TEST_FOLDER_LIST'));
        
        foreach ($folder_list as $folderpath) 
        {
            // Check if Folder exists
            if(file_exists($folderpath))
            {
                // Check the permission of that specific folder from Shell
                $folder_permission_actual = trim(shell_exec('stat -c %a ' . $folderpath));
                $this->assertTrue($folder_permission_actual >= env('UNIT_TEST_FOLDER_PERMISSION'));
            }
            else
                $this->assertTrue(false);
        }

    }

}
