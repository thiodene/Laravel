<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;

class ApplicationController extends Controller
{
    public function index(){
    
        $applications =  Application::all();
        
        return view('application.index', compact('applications'));


    }

    public function show($application_id){
    
        $applications =  Application::all();
        
        return view('application.index', compact('applications'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $application = new Application;
        $application->name = $request->name;
        $application->save();

        // List all Applications
        $applications =  Application::all();
        return view('application.index', compact('applications'));
    }

    public function create()
    {
        return view('application.create');
    }

    
    public function edit(Application $application) 
    {
        // edit form for Application

        $resource = "edit";
        return view('application.modify', compact('application'));
        
    }

    public function update(Request $request, Application $application)
    {
        // update Application
        $application->name = $request->name;
        $application->save();

        return redirect()->route('application_edit', ['application' => $application->id])->with('success', 'Application updated');
    } 

    public function remove()
    {
        // delete form
    }

    public function destroy($id)
    {
        // delete application
        $application = Application::find($id);

        $application->delete();

        // List all Applications
        $applications =  Application::all();
        return view('application.index', compact('applications'));
    } 

}
