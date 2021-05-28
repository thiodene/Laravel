<?php
namespace Database\Seeds;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\Tag;
use App\Application;
use App\Subscriber;
use App\Distribution;
use App\Region;
use App\Type;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($num_sub=50, $max_distr=1)
    {

        ##################################################
        ##  SETTING UP MAX NUMBER OF DUMMY DB ENTRIES   ##
        ##################################################
        /** ----- SUBSCRIPTIONS/SUBSCRIBERS/TOPICS -----*/
        // set the number of subscribers and the
        // maximum # of subscriptions per subscriber
        global $max_distributions, $faker, $num_subscribers, $app, $period;
        $num_subscribers = $num_sub;
        $max_distributions = $max_distr;

        $faker = Faker::create();

        ##################################################
        ##    CREATING SUBSCRIBERS AND DISTRIBUTIONS    ##
        ##################################################

        //create some subcribers and associated distributions
        $applications = Application::all();
        foreach ($applications as $application)
        {

            $app = $application->id;
            factory(Subscriber::class, $num_subscribers)->create()->each(function($subscriber)
            {
                // Change the subscribed_at value within the last 6 months
                if ($subscriber->subscribed_at)
                    $subscriber->subscribed_at           = Carbon::now()->subMonths(rand(0, 6));
                // Create a few unsubscribers within the last 6 months
                if ($subscriber->subscribed_at)
                {
                    if (rand(0,10) >= 8)
                        $subscriber->unsubscribed_at           = Carbon::now()->subMonths(rand(0, 6));
                    else
                        $subscriber->unsubscribed_at           = NULL;
                }
                
                $subscriber->save();
                global $faker, $max_distributions, $app, $period;
                for($i=0; $i < $faker->numberBetween(1, $max_distributions); ++$i)
                { 
                    $subscriber->distributions()->save(
                        factory(Distribution::class)->make(['application_id' => $app])
                   );
                }
            });
        }
        

    }

    public function distribution_tags_seed($sole_tag_id=null)
    {
        $tag_id = $sole_tag_id;
        $distributions = Distribution::all();
        foreach($distributions as $distribution){
            if ($tag_id != null)
            {
                $distribution->tags()->save(Tag::find($tag_id));
            }
        }
    }
}
