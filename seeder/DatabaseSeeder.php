<?php

date_default_timezone_set("America/Toronto");

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        //Insert System User
        DB::table('users')->insert([['id' => 1, 'email' => 'system@ontario.ca']]);
        
        #######################################################################################################
        # TYPES
        #######################################################################################################

        # Insert Types
        DB::table('types')->insert([
        
            # Top-level Types
            ['id' => 1,    'parent_id' => 1, 'name' => '',                              'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 1000, 'parent_id' => 1, 'name' => 'Request types',                 'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 2000, 'parent_id' => 1, 'name' => 'Work Required types',                 'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 3000, 'parent_id' => 1, 'name' => 'Media types',                  'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 4000, 'parent_id' => 1, 'name' => 'Platform types',                  'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 5000, 'parent_id' => 1, 'name' => 'Social Format types',                  'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 6000, 'parent_id' => 1, 'name' => 'Required Languages types',                  'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],
            ['id' => 7000, 'parent_id' => 1, 'name' => 'Requestor Team types',                  'name_fr' => NULL,   'label' => NULL,   'mandatory_flag' => 1, 'order_by' => NULL],

            # Request types
            ['id' => 1001, 'parent_id' => 1000, 'name' => 'New',               'name_fr' => 'Nouveau',              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 1002, 'parent_id' => 1000, 'name' => 'Supplementary',             'name_fr' => 'Supplementaire',         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],

            # Work Required types
            ['id' => 2001, 'parent_id' => 2000, 'name' => 'Ad Concepts',               'name_fr' => 'Concepte Adv',              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 2002, 'parent_id' => 2000, 'name' => 'Ad Production',             'name_fr' => 'Production Adv',         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],
            ['id' => 2003, 'parent_id' => 2000, 'name' => 'Copy Writing',                  'name_fr' => 'Ecrit',            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 3], 
            ['id' => 2004, 'parent_id' => 2000, 'name' => 'Internal Presentation',               'name_fr' => 'Presentation Interne',              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 4],
            ['id' => 2005, 'parent_id' => 2000, 'name' => 'Branding',             'name_fr' => 'Image de Marque',         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 5],

            # Media types
            ['id' => 3001, 'parent_id' => 3000, 'name' => 'Social',               'name_fr' => 'Social',              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 3002, 'parent_id' => 3000, 'name' => 'Video',             'name_fr' => 'Video',         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],
            ['id' => 3003, 'parent_id' => 3000, 'name' => 'Digital',                  'name_fr' => 'Digital',            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 3], 

            # Platform types
            ['id' => 4001, 'parent_id' => 4000, 'name' => 'Facebook',               'name_fr' => NULL,              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 4002, 'parent_id' => 4000, 'name' => 'Twitter',             'name_fr' => NULL,         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],
            ['id' => 4003, 'parent_id' => 4000, 'name' => 'Instagram',                  'name_fr' => NULL,            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 3], 

            # Social Format types
            ['id' => 5001, 'parent_id' => 5000, 'name' => 'Video',               'name_fr' => NULL,              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 5002, 'parent_id' => 5000, 'name' => 'Picture',             'name_fr' => NULL,         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],
            ['id' => 5003, 'parent_id' => 5000, 'name' => 'Audio',                  'name_fr' => NULL,            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 3], 

            # Required Languages types
            ['id' => 6001, 'parent_id' => 6000, 'name' => 'English',               'name_fr' => 'Anglais',              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 6002, 'parent_id' => 6000, 'name' => 'French',             'name_fr' => 'Francais',         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],
            ['id' => 6003, 'parent_id' => 6000, 'name' => 'Other',                  'name_fr' => 'Autre',            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 3], 

            # Requestor Team types
            ['id' => 7001, 'parent_id' => 7000, 'name' => 'Creative Services',               'name_fr' => NULL,              'label' => NULL,       'mandatory_flag' => 1, 'order_by' => 1],
            ['id' => 7002, 'parent_id' => 7000, 'name' => 'Technology and Delivery',             'name_fr' => NULL,         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 2],
            ['id' => 7003, 'parent_id' => 7000, 'name' => 'Marketing',                  'name_fr' => NULL,            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 3], 
            ['id' => 7004, 'parent_id' => 7000, 'name' => 'Media and Buying Operations',             'name_fr' => NULL,         'label' => NULL,      'mandatory_flag' => 1, 'order_by' => 4],
            ['id' => 7005, 'parent_id' => 7000, 'name' => 'Ontario.ca',                  'name_fr' => NULL,            'label' => NULL,           'mandatory_flag' => 1, 'order_by' => 5], 

            ]);
    
        #######################################################################################################
        # Insert Ministries
        #######################################################################################################
        
        //Insert Ministries
        DB::table('ministries')->insert([
            ['id' => 1,  'acronym' => 'MFA', 'name' => 'Ministry of Francophone Affairs', 'name_abbreviated'=>'Francophone Affairs'],
            ['id' => 2,  'acronym' => 'OMAFRA', 'name' => 'Ministry of Agriculture, Food and Rural Affairs', 'name_abbreviated'=>'Agriculture, Food and Rural Affairs'],
            ['id' => 3,  'acronym' => 'MCCSS', 'name' => 'Ministry of Children, Community and Social Services', 'name_abbreviated'=>'Children, Community and Social Services'],
            ['id' => 4,  'acronym' => 'SOLGEN', 'name' => 'Ministry of the Solicitor General', 'name_abbreviated'=>'Solicitor General'],
            ['id' => 5,  'acronym' => 'MEDJCT', 'name' => 'Ministry of Economic Development, Job Creation and Trade', 'name_abbreviated'=>'Economic Development, Job Creation and Trade'],
            ['id' => 6,  'acronym' => 'EDU', 'name' => 'Ministry of Education', 'name_abbreviated'=>'Education'],
            ['id' => 7,  'acronym' => 'ENDM', 'name' => 'Ministry of Energy, Northern Development and Mines', 'name_abbreviated'=>'Energy, Northern Development and Mines'],
            ['id' => 8,  'acronym' => 'MECP', 'name' => 'Ministry of the Environment Conservation and Parks', 'name_abbreviated'=>'Environment Conservation and Parks'],
            ['id' => 9,  'acronym' => 'MOF', 'name' => 'Ministry of Finance', 'name_abbreviated'=>'Finance'],
            ['id' => 10, 'acronym' => 'MGCS', 'name' => 'Ministry of Government and Consumer Services', 'name_abbreviated'=>'Government and Consumer Services'],
            ['id' => 11, 'acronym' => 'IAO', 'name' => 'Ministry of Indigenous Affairs', 'name_abbreviated'=>'Indigenous Affairs'],
            ['id' => 12, 'acronym' => 'MOI', 'name' => 'Ministry of Infrastructure', 'name_abbreviated'=>'Infrastructure'],
            ['id' => 13, 'acronym' => 'MIA', 'name' => 'Ministry of Intergovernmental Affairs', 'name_abbreviated'=>'Intergovernmental Affairs'],
            ['id' => 14, 'acronym' => 'MMAH', 'name' => 'Ministry of Municipal Affairs and Housing', 'name_abbreviated'=>'Municipal Affairs and Housing'],
            ['id' => 15, 'acronym' => 'MNRF', 'name' => 'Ministry of Natural Resources and Forestry', 'name_abbreviated'=>'Natural Resources and Forestry'],
            ['id' => 16, 'acronym' => 'MAG', 'name' => 'Ministry of the Attorney General', 'name_abbreviated'=>'Attorney General'],
            ['id' => 17, 'acronym' => 'MSAA', 'name' => 'Ministry for Seniors and Accessibility', 'name_abbreviated'=>'Ministry for Seniors and Accessibility'],
            ['id' => 18, 'acronym' => 'MTO', 'name' => 'Ministry of Transportation', 'name_abbreviated'=>'Transportation'],
            ['id' => 19, 'acronym' => 'TBS', 'name' => 'Treasury Board Secretariat', 'name_abbreviated'=>'Treasury Board Secretariat'],
            ['id' => 20, 'acronym' => 'ARD', 'name' => 'Anti-Racism Directorate', 'name_abbreviated'=>'Anti-Racism Directorate'],
            ['id' => 21, 'acronym' => 'CO', 'name' => 'Cabinet Office', 'name_abbreviated'=>'Cabinet Office'],
            ['id' => 22, 'acronym' => 'PO', 'name' => 'Premier\'s Office', 'name_abbreviated'=>'Premier\'s Office'],
            ['id' => 23, 'acronym' => 'WI', 'name' => 'Women\'s Issues', 'name_abbreviated'=>'Women\'s Issues'],
            ['id' => 24, 'acronym' => 'MOH', 'name' => 'Ministry of Health', 'name_abbreviated'=>'Health'],
            ['id' => 25, 'acronym' => 'MLTC', 'name' => 'Ministry of Long-Term Care', 'name_abbreviated'=>'Long-Term Care'],
            ['id' => 26, 'acronym' => 'MCU', 'name' => 'Ministry of Colleges and Universities', 'name_abbreviated'=>'Colleges and Universities'],
            ['id' => 27, 'acronym' => 'MHSTCI', 'name' => 'Ministry of Heritage, Sport, Tourism and Culture Industries', 'name_abbreviated'=>'Heritage, Sport, Tourism and Culture Industries'],
            ['id' => 28, 'acronym' => 'MLTSD', 'name' => 'Ministry of Labour, Training and Skills Development', 'name_abbreviated'=>'Labour, Training and Skills Development'],
            ['id' => 29, 'acronym' => 'GHLO', 'name' => 'Government House Leader\'s Office', 'name_abbreviated'=>'Government House Leader\'s Office']
        ]);
    
        $this->call([
            DummySeeder::class,
        ]);
    
    }
}
