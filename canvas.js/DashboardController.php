<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Subscriber;
use App\Distribution;
use App\Tag;

use Config;
use Carbon\Carbon;

use DCPP\Auth\Http\Controllers\SecurityController;

class DashboardController extends Controller
{
    
    private $security;

    public function __construct()
    {

        // Security
        $this->middleware('accounts');
        $this->security = new SecurityController;

    }

    public function index()
    {

        // Get the applications
        $applications = Application::get();

        $num_subscribers = sizeof(Subscriber::where('subscribed_at', '!=', NULL)->where('unsubscribed_at', '=', NULL)->get());
        $num_unsubscribers = sizeof(Subscriber::where('unsubscribed_at', '!=', NULL)->get());

        // Subscribers data per month
        $subscribe_data = '{';
        $subscribe_data .= '"type": "line",';
        $subscribe_data .= '"name": "Subscribers",';
        $subscribe_data .= '"dataPoints": [';
        // unsubscribers data per month
        $unsubscribe_data = '{';
        $unsubscribe_data .= '"type": "line",';
        $unsubscribe_data .= '"name": "Unsubscribers",';
        $unsubscribe_data .= '"dataPoints": [';
        
        // Get the last 6 months growth of subscribers/unsubscribers
        $start_month_num = intval(Carbon::now()->subMonths(6)->format('n'));
        $start_year_num =  intval(Carbon::now()->subMonths(6)->format('Y'));
        $subs_arr = array();
        $dp_subs = '';
        $dp_unsubs = '';
        for ($i=$start_month_num;$i<=$start_month_num+6;$i++)
        {
            // If after December go up 1 year
            if ($i > 12)
            {
                $check_month = $i - 12;
                $check_year = $start_year_num + 1;
            }
            else
            {
                $check_month = $i;
                $check_year = $start_year_num;
            }

            $fdt = new \DateTime('first day of ' . Config::get('app.months_name')[$check_month] . ' ' . $check_year);
            $ldt = new \DateTime('last day of ' . Config::get('app.months_name')[$check_month] . ' ' . $check_year);
            $fd_carbon = Carbon::instance($fdt);
            $ld_carbon = Carbon::instance($ldt);
            $fd_str = $fd_carbon->toDateTimeString(); 
            $ld_str = $ld_carbon->toDateTimeString();

            if (strlen($dp_subs) != 0)
                $dp_subs .= ',';
            if (strlen($dp_unsubs) != 0)
                $dp_unsubs .= ',';

            $num_subs = sizeof(Subscriber::where('subscribed_at', '!=', NULL)->where('unsubscribed_at', '=', NULL)->where('subscribed_at', '>=', $fd_str)->where('subscribed_at', '<=', $ld_str)->get());
            $num_unsubs = sizeof(Subscriber::where('unsubscribed_at', '!=', NULL)->where('unsubscribed_at', '>=', $fd_str)->where('unsubscribed_at', '<=', $ld_str)->get());

            $dp_subs .= '{ "label": "' . Config::get('app.months_name')[$check_month] . '", "y": ' . $num_subs . ' }';
            $dp_unsubs .= '{ "label": "' . Config::get('app.months_name')[$check_month] . '", "y": ' . $num_unsubs . ' }';

        }

        $subscribe_data .= $dp_subs . ']}';
        $unsubscribe_data .= $dp_unsubs . ']}';
        
        $growth_data = '[' . $subscribe_data . ',' . $unsubscribe_data . ']';
        
        return view('dashboard.index', compact('applications','num_subscribers', 'num_unsubscribers','growth_data'));
    }

    public function show_app($application)
    {

        // Get the applications
        $applications = Application::get();
        $app = Application::find($application);
        // Get the last 6 months growth of subscribers
        $start_month_num = intval(Carbon::now()->subMonths(6)->format('n'));
        $start_year_num =  intval(Carbon::now()->subMonths(6)->format('Y'));
        $subs_arr = array();
        for ($i=$start_month_num;$i<=$start_month_num+6;$i++)
        {
            if ($i > 12)
            {
                $check_month = $i - 12;
                $check_year = $start_year_num + 1;
            }
            else
            {
                $check_month = $i;
                $check_year = $start_year_num;
            }
            //$subs_arr[$check_month] = $check_year;
            $subs_arr[$check_month] = Config::get('app.months_name')[$check_month];
        }

        //dd($subs_arr);

        $num_subscribers = sizeof(Subscriber::where('subscribed_at', '!=', NULL)->where('unsubscribed_at', '=', NULL)->get());
        
        /*
        $dt = new \DateTime('last day of January 2008');
        $carbon = Carbon::instance($dt);
        $num_subscribers = $carbon->toDateTimeString(); 
        */
        
        return view('dashboard.application.show', compact('applications','num_subscribers','app'));
    }

    public function show($application_id)
    {
    
        $application = Application::find($application_id)->first();
        $distributions = Distribution::where('application_id', $application_id)->get()->groupBy('subscriber_id');
        
        $parent_tags = $application->tags()->get();
        $tags_to_count = array();
        $tags = array();

        foreach($parent_tags as $parent_tag){
            
            $subscribers_parent_tag = $parent_tag->distributions()->get()->groupBy('subscriber_id');
            $child_tags = $parent_tag->children()->get();

            foreach($child_tags as $tag){
                $subscribers_child_tag = $tag->distributions()->get()->groupBy('subscriber_id');
                $tags_to_count[$tag->id] = sizeof($subscribers_parent_tag) + sizeof($subscribers_child_tag);
                $tags[$tag->id] = $tag;
            }
        }

        arsort($tags_to_count); 
        return view('admin.dashboard.application', compact('application', 'distributions', 'tags_to_count', 'tags'));


    }
}
