<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;
use Elasticsearch\ClientBuilder;

class ElasticApiController extends Controller
{
    /**
     * ElasticSearch GET/PUT/POST/DELETE/SEARCH functionalities
     */
    public function create_index(Request $request)
    {
     	$hosts = [[
                'host'     => env('ES_HOST'),
                'user'     => env('ES_USER'),
                'pass'     => env('ES_PASS'),
                'scheme'   => env('ES_SCHEME'),
                'port'     => env('ES_PORT')
        ]];

        $client = ClientBuilder::create()->setHosts($hosts)->build();
        $params = array();
        $params['body']  = array(
                'cache' => time()
        );
        
        $params['index'] = env('ES_INDEX');
        $params['type']  = env('ES_INDEX_TYPE');
        //var_dump($params);
        $result = $client->index($params);
        return $result;
    }

    public function show_release(Request $request, $release_id)
    {
        $hosts = [[
            'host'     => env('ES_HOST'),
            'user'     => env('ES_USER'),
            'pass'     => env('ES_PASS'),
            'scheme'   => env('ES_SCHEME'),
            'port'     => env('ES_PORT')
        ]];

        $client = ClientBuilder::create()->setHosts($hosts)->build();
        
        $params = array();
        $params = [
            'index' => env('ES_INDEX'),
            'body'  => [
                'query' => [
                    'match' => [
                        'id' => $release_id
                    ]
                ]
            ]
        ];
        
        $result = $client->search($params);

        return $result;
    }

    public function search_index(Request $request)
    {
     	$hosts = [[
                'host'     => env('ES_HOST'),
                'user'     => env('ES_USER'),
                'pass'     => env('ES_PASS'),
                'scheme'   => env('ES_SCHEME'),
                'port'     => env('ES_PORT')
        ]];

        $client = ClientBuilder::create()->setHosts($hosts)->build();
        $params = array();
        $params['body']  = array(
                'cache' => time()
        );
        
        $params = [
            'index' => env('ES_INDEX'),
        ];
        //var_dump($params);
        $result = $client->search($params);
        return $result;
    }

    public function save_release(Request $request)
    {
     	$hosts = [[
                'host'     => env('ES_HOST'),
                'user'     => env('ES_USER'),
                'pass'     => env('ES_PASS'),
                'scheme'   => env('ES_SCHEME'),
                'port'     => env('ES_PORT')
        ]];

        $client = ClientBuilder::create()->setHosts($hosts)->build();
        $params = array();
        $params['body']  = array(
                'cache' => time()
        );
        
        $params['index'] = env('ES_INDEX');
        //$params['type']  = env('ES_INDEX_TYPE');
        //var_dump($params);
        $release_json = '{
            "cache": "2021-02-03 05:10:45",
            "id": 60231,
            "archived_flag": 0,
            "assets": null,
            "cnw_flag": 0,
            "contacts_custom": null,
            "contacts_default": null,
            "contacts": null,
            "content_body": "<p>Test Release, February 10, 2021:<\/p>\r\n",
            "content_lead": "TORONTO - Today, Education Minister Stephen Lecce announced the dates for the return of in-person learning in all remaining Ontario public health units (PHUs). The governments decision was based on the advice of Ontario Chief Medical Officer of Health, the unanimous recommendation of the Council of Medical Officers of Health, and with the support of local Medical Officers of Health. ",
            "content_title": "Enhanced Safety Measures in Place as In-Person Learning Resumes Across Ontario",
            "content_subtitle": null,
            "default_contacts_included_flag": null,
            "keywords": "",
            "language": "en",
            "ministry_id": 6,
            "ministry_acronym": "EDU",
            "ministry_name": "Ministry of Education",
            "ministry_abbreviated": "Education",
            "partner_ministries": [],
            "preview_expires": null,
            "quickfacts": "<ul><li>To date, Ontario has supported:\r\n<ul><li>the hiring of 3,400 teachers (with an additional 890 projected to be hired);<\/li><\/ul>\r\n<ul><li>the hiring of 1,400 custodians (with an additional 400 projected to be hired);<\/li><\/ul>\r\n<ul><li>the hiring of over 500 principals, vice-principals and admin staff to support new virtual schools;<\/li><\/ul>\r\n<ul><li>the hiring of up to 650 educational assistants, mental health workers and professionals to provide special education and mental health supports; and,<\/li><\/ul>\r\n<ul><li>over 23,000 HEPA filters and 20,000 portable HEPA units, and nearly 3,000 other ventilation devices.<\/li><\/ul>\r\n<\/li><li>In recognition of the additional costs facing many families during this period, Ontario is providing support through an expanded <a href=\"https:\/\/www.ontario.ca\/page\/get-support-learners\">Support for Learners<\/a> program. Since the start of the pandemic, Ontario has allocated nearly $900 million in direct financial support to families. Applications under the Support for Learners program close on February 8, 2021.<\/li><li>Since the start of the COVID-19 pandemic, the Government has invested more than $42.5 million in student mental health, including an additional $10 million announced on January 20, 2021, to respond to the extension of virtual learning.<\/li><li>The federal Safe Return to Class Fund is providing funding in two phases. The first installment of $381 million, as <a href=\"https:\/\/news.ontario.ca\/en\/release\/58135\/additional-funds-enhance-ontarios-robust-back-to-school-plan\">announced<\/a> on August 26, 2020, is being used to support a number of priority provincial initiatives related to the safe reopening of schools. The allocations are proposed by Ontario but require federal approval.<\/li><\/ul>",
            "quotes": [],
            "release_date_time": "2021-02-03 16:00:00",
            "release_date_time_formatted": "February 3, 2021",
            "release_id_translated": 60231,
            "release_type_id": 2001,
            "release_type_name": "News Release",
            "release_type_label": "release",
            "release_resources": "<ul><li><a href=\'https:\/\/news.ontario.ca\/en\/statement\/60085\/safety-of-schools-remains-priority-number-one-for-ontario\'>Safety of Schools Remains Priority Number One for Ontario<\/a><\/li><li><a href=\'https:\/\/news.ontario.ca\/en\/release\/59922\/ontario-declares-second-provincial-emergency-to-address-covid-19-crisis-and-save-lives\'>Ontario Declares Second Provincial Emergency to Address COVID-19 Crisis and Save Lives<\/a><\/li><li><a href=\'https:\/\/news.ontario.ca\/en\/release\/59365\/ontario-providing-additional-funding-to-enhance-safety-and-protection-in-schools\'>Ontario Providing Additional Funding to Enhance Safety and Protection in Schools<\/a><\/li><li><a href=\'https:\/\/news.ontario.ca\/en\/backgrounder\/59361\/targeted-testing-for-school-communities\'>Targeted Testing for School Communities <\/a><\/li><li><a href=i\'https:\/\/www.ontario.ca\/page\/get-support-learnersi\'>Get Support for Learners<\/a><\/li><li><a href=i\'https:\/\/covid-19.ontario.ca\/school-screening\/i\'>COVID-19 school and child care screening<\/a><\/li><li>Visit Ontario\u2019s <a href=\"https:\/\/www.ontario.ca\/page\/2019-novel-coronavirus\">website<\/a> to learn more about how the province continues to protect Ontarians from COVID-19.<\/li><\/ul>",
            "slug": "enhanced-safety-measures-in-place-as-in-person-learning-resumes-across-ontario",
            "status_type_id": 3002,
            "streams": null,
            "topics": [{
                "id": 4,
                "name": "Education and Training",
                "description": "Learn about Ontario\u2019s early years, education and training systems. Includes information on child care, elementary schools, secondary schools, colleges, universities, skills training and financial aid.",
                "link": "https:\/\/www.ontario.ca\/page\/education-and-training"
            }],
            "unformatted_slug": "enhanced_safety_measures_in_place_as_in_person_learning_resumes_across_ontario",
            "unformatted_slug_translated": "",
            "release_distribution_id": null,
            "release_language_distribution": null,
            "additional": [{
                "content_notes": null,
                "content_location": null,
                "content_livestream_url": null,
                "content_epk_url": null,
                "content_backgrounders": null,
                "created_section": null,
                "include_photo_flag": null,
                "include_video_flag": null,
                "include_audio_flag": null,
                "include_pdf_flag": null
            }]
        }';
    
    $release_obj = json_decode($release_json);
    
    //echo $release_obj->cache;
    
    
    // Save News Release-----------------------------------------------
    $params['body']  = array(
      'cache' => $release_obj->cache,
      'id' => $release_obj->id,
      'archived_flag' => $release_obj->archived_flag,
      'assets' =>  $release_obj->assets,
      'cnw_flag' =>  $release_obj->cnw_flag,
      //'contacts_custom' =>  $release_obj->contacts_custom,
      //'contacts_default' =>  $release_obj->contacts_default,
      //'contacts' => $release_obj->contacts,
      'content_body' => $release_obj->content_body,
      'content_lead' => $release_obj->content_lead,
      'content_title' => $release_obj->content_title,
      //'content_subtitle' => $release_obj->content_subtitle,
      //'default_contacts_included_flag' => $release_obj->default_contacts_included_flag,
      'keywords' => $release_obj->keywords,
      'language' => $release_obj->language,
      'ministry_id' => $release_obj->ministry_id,
      'ministry_acronym' => $release_obj->ministry_acronym,
      'ministry_abbreviated' => $release_obj->ministry_abbreviated,
      'partner_ministries' => $release_obj->partner_ministries,
      //'preview_expires' => $release_obj->preview_expires,
      'quickfacts' => $release_obj->quickfacts,
      'quotes' => $release_obj->quotes,
      'release_date_time' => $release_obj->release_date_time,
      'release_date_time_formatted' => $release_obj->release_date_time_formatted,
      'release_id_translated' =>  $release_obj->release_id_translated,
      'release_type_id' =>  $release_obj->release_type_id,
      'release_type_name' =>  $release_obj->release_type_name,
      'release_type_label' =>  $release_obj->release_type_label,
      'release_resources' => $release_obj->release_resources,
      'slug' => $release_obj->slug,
      'status_type_id' => $release_obj->status_type_id,
      //'streams' => $release_obj->streams,
      'topics' => $release_obj->topics,
      'unformatted_slug' => $release_obj->unformatted_slug,
      'unformatted_slug_translated' => $release_obj->unformatted_slug_translated,
      //'release_distribution_id' => $release_distribution_id,
      //'release_language_distribution' => $release_language_distribution,
      'additional' => $release_obj->additional,
    
    );
    
    $result = $client->index($params);
    return $result;
    }
}
