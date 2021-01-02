<?php

date_default_timezone_set("America/Toronto");

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use Faker\Factory as Faker;

use App\Type;
use App\Ministry;
use App\Requests;
use App\RequestMedia;
use App\RequestWork;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Instantiate faker
        $faker = Faker::create();

        // Set up default data
        $data['number_of_requests'] = 20;
        $data['user_id'] = 1;
        $data['ministries'] = Ministry::get();
        //$data['ministries'] = Ministry::all();
        $data['request_types'] = Type::where('parent_id', Config::get('app.types.request_types'))->get();
        $data['requestor_team_types'] = Type::where('parent_id', Config::get('app.types.requestor_team_types'))->get();
        $data['required_language_types'] = Type::where('parent_id', Config::get('app.types.required_language_types'))->get();
        $data['request_work_types'] = Type::where('parent_id', Config::get('app.types.request_work_types'))->get();

        $data['media_types'] = Type::where('parent_id', Config::get('app.types.media_types'))->get();
        $data['platform_types'] = Type::where('parent_id', Config::get('app.types.platform_types'))->get();
        $data['social_format_types'] = Type::where('parent_id', Config::get('app.types.social_format_types'))->get();
        $data['other_languages'] = array('German', 'Italian', 'Spanish', 'Mandarin','Portuguese');
        
        #######################################################################################################
        # REQUESTS
        #######################################################################################################

        for($i=0;$i<$data['number_of_requests'];$i++)
        {
            
            // Create base request
            #######################################################################################################
           
            $request                    = new Requests;
            $request->request_type_id   = $data['request_types'][rand(0, sizeof($data['request_types'])-1)]->id;
            $request->requestor_name    = $faker->name;
            $request->requestor_email   = $faker->email;
            $request->requestor_team_type_id   = $data['requestor_team_types'][rand(0, sizeof($data['requestor_team_types'])-1)]->id;
            $request->ministry_id   = $data['ministries'][rand(0, sizeof($data['ministries'])-1)]->id;
            $request->project_name  = 'Project ' . $faker->firstNameFemale;
            $request->project_overview  = $faker->paragraph;
            $request->creative_brief  = rand(0,1);
            $req_languages = $data['required_language_types'][rand(0, sizeof($data['required_language_types'])-1)]->id;
            $request->required_language_type_id   = $req_languages;
            if ($req_languages == Config::get('app.types.other_languages_type'))
                $request->other_language  = $data['other_languages'][rand(0, sizeof($data['other_languages'])-1)];
            else
                $request->other_language  = NULL;
            $request->note  = $faker->paragraph;
            $request->delivered_at           = Carbon::now()->addMonths(rand(1, 6));
            $request->user_id           = $data['user_id'];
            $request->save();
            // Use $request->id;


            // Add Medias to each requests
            #######################################################################################################
            if(rand(0,1))
            {   

                $medias = array();

                for($j=0; $j<rand(0,3); $j++)
                {
                    $media_id = $data['media_types'][rand(0, sizeof($data['media_types'])-1)]->id;
                    if(!in_array($media_id, $medias))
                    {

                        $medias[] = $media_id;

                        // New instance of request topic
                        $request_media = new RequestMedia;
                        $request_media->request_id          = $request->id;
                        $request_media->type_id            = $media_id;
                        $request_media->save();

                    }
        
                }

            }

            // Add Platforms to each requests
            #######################################################################################################
            if(rand(0,1))
            {   

                $medias = array();

                for($j=0; $j<rand(0,3); $j++)
                {
                    $media_id = $data['platform_types'][rand(0, sizeof($data['platform_types'])-1)]->id;
                    if(!in_array($media_id, $medias))
                    {

                        $medias[] = $media_id;

                        // New instance of request topic
                        $request_media = new RequestMedia;
                        $request_media->request_id          = $request->id;
                        $request_media->type_id            = $media_id;
                        $request_media->save();

                    }
        
                }

            }

            // Add Social Formats to each requests
            #######################################################################################################
            if(rand(0,1))
            {   

                $medias = array();

                for($j=0; $j<rand(0,3); $j++)
                {
                    $media_id = $data['social_format_types'][rand(0, sizeof($data['social_format_types'])-1)]->id;
                    if(!in_array($media_id, $medias))
                    {

                        $medias[] = $media_id;

                        // New instance of request topic
                        $request_media = new RequestMedia;
                        $request_media->request_id          = $request->id;
                        $request_media->type_id            = $media_id;
                        $request_media->save();

                    }
        
                }

            }

            // Add Request Works to each request
            #######################################################################################################
        
            if(rand(0,1))
            {   

                $works = array();

                for($j=0; $j<rand(0,3); $j++)
                {

                    $work_id = $data['request_work_types'][rand(0, sizeof($data['request_work_types'])-1)]->id;
                    if(!in_array($work_id, $works))
                    {

                        $works[] = $work_id;

                        // New instance of release tag
                        $request_work = new RequestWork;
                        $request_work->request_id          = $request->id;
                        $request_work->work_type_id        = $work_id;
                        $request_work->save();

                    }
        
                }
                
            }

        }

    }
    
}
