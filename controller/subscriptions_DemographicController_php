<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demographic;

class DemographicController extends Controller
{
    public function index()
    {
        // Add that to Constants file
        $constants_demographic_first = 1;
        $demographics = Demographic::where('parent_id', $constants_demographic_first)->where('id', '!=', $constants_demographic_first)->get();
        $subdemographics_demographic = array();
        foreach($demographics as $demographic){
            
            $childdemographics = $demographic->children()->get();
            $demographics_to_count[$demographic->id] = sizeof($childdemographics);
            $demographics_name[$demographic->id][0] = $demographic->name_en;
            $demographics_name[$demographic->id][1] = $demographic->name_fr;
            //$demographics_to_count[$demographic->id] = 0;

            foreach($childdemographics as $subdemographic)
            {
                $subdemographics[$subdemographic->id] = $subdemographic;
                $subdemographics_demographic[$demographic->id][$subdemographic->id][0] = $subdemographic->name_en;
                $subdemographics_demographic[$demographic->id][$subdemographic->id][1] = $subdemographic->name_fr;
            }
        }
        //dd($demographics);
        return view('demographic.index', compact('demographics', 'subdemographics', 'subdemographics_demographic','demographics_to_count', 'demographics_name'));
    }

    public function create()
    {
        
        // Add that to Constants file
        $constants_demographic_first = 1;
        $demographics = Demographic::where('parent_id', $constants_demographic_first)->where('id', '!=', $constants_demographic_first)->get();
        
        // create demographic form
        return view('demographic.create', compact('demographics'));
    }

    public function store(Request $request)
    {
        // request must have parent_id 
        if ($request->parent_id != 0)
        {
            
            // find parent with all children 
            $parent = Demographic::find($request->parent_id);

            // Add that to Constants file
            $constants_demographic_first = 1;

            // does this demographic already exist under parent
            if ($parent->children()->where('name_en',$request->name_en)->first()) {
                return response()->json(['message' => 'Demographic already exists under this parent'], 200);
            }

            // create a new child under this parent 
            $child            = new Demographic; 
            $child->parent_id = $request->parent_id; 
            $child->name_en      = $request->name_en; 
            $child->name_fr      = $request->name_fr; 

            // save child
            //$parent->children()->save($child); 
            $child->save();

            // return child
            //return response($child, 200);
            return view('admin.panel.panel');

        } else {

            $constants_demographic_first = 1;
            // No parent id -> Add it as a Group Demographic!
            // find all parents 
            $parents = Demographic::where('parent_id', $constants_demographic_first)->get();

            if ($parents->where('name_en',$request->name_en)->first()) {
                return response()->json(['message' => 'Parent Demographic already exists'], 200);
            }

            // create a new parent 
            $parent            = new Demographic; 
            $parent->parent_id = $constants_demographic_first; 
            $parent->name_en      = $request->name_en; 
            $parent->name_fr      = $request->name_fr; 
            // Save new Parent
            $parent->save();

            //return response()->json(['message'=>'missing parent_id'], 200);
            //return response()->json(['message'=>'success'], 302);
            return view('admin.panel.panel');
        }
    }

    public function show($demographic_id)
    {
        // show single Demographic
        $demographic =  Demographic::where('id',$demographic_id)->first();

        // Add that to Constants file
        $constants_demographic_first = 1;
        $subdemographics = Demographic::where('parent_id', $demographic_id)->get();
        
        return view('demographic.show', compact('demographic', 'subdemographics'));
    }
    
    public function edit(Demographic $demographic) 
    {
        // edit form 
        $resource = "edit";
        return view('demographic.modify', compact('demographic'));
    }

    public function update(Request $request, Demographic $demographic)
    {
        // update Demographic
        $demographic->name_en = $request->name_en;
        $demographic->name_fr = $request->name_fr;
        $demographic->save();

        return redirect()->route('demographic_edit', ['demographic' => $demographic->id])->with('success', 'Demographic updated');
    } 

    public function remove()
    {
        // delete form
    }

    public function destroy($id)
    {
        // If parent id delete all children (if exist)
        $childrendemographics = Demographic::where('parent_id', $id);
        if (!is_null($childrendemographics)){
            // Delete
            $childrendemographics->delete();
        }

        // delete Demographic
        $demographic = Demographic::find($id);
        $demographic->delete();

        // Go back to admin Panel
        return view('admin.panel.panel');
    } 
}
