<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        // show all types
        //$types =  Type::all();
        //return view('type.index', compact('types', 'subtypes'));

        // Add that to Constants file
        $constants_type_first = 1;
        $types = Type::where('parent_id', $constants_type_first)->where('id', '!=', $constants_type_first)->get();
        $subtypes_type = array();
        foreach($types as $type){
            
            $childtypes = $type->children()->get();
            $types_to_count[$type->id] = sizeof($childtypes);
            $types_name[$type->id] = $type->name;
            //$types_to_count[$type->id] = 0;
            //$subtypes_text = '';
            //$subtypes_type = array();
            foreach($childtypes as $subtype)
            {
                $subtypes[$subtype->id] = $subtype;
                $subtypes_type[$type->id][$subtype->id] = $subtype->name;

            }
        }
        //dd($subtypes_type);
        return view('type.index', compact('types', 'subtypes', 'subtypes_type','types_to_count', 'types_name'));
    }

    public function create()
    {
        
        // Add that to Constants file
        $constants_type_first = 1;
        $types = Type::where('parent_id', $constants_type_first)->where('id', '!=', $constants_type_first)->get();
        
        // create type form
        return view('type.create', compact('types'));
    }

    public function store(Request $request)
    {
        // request must have parent_id 
        if ($request->parent_id != 0)
        {
            
            // find parent with all children 
            $parent = Type::find($request->parent_id);

            // Add that to Constants file
            $constants_type_first = 1;

            // does this type already exist under parent
            if ($parent->children()->where('name',$request->name)->first()) {
                return response()->json(['message' => 'Type already exists under this parent'], 200);
            }

            // create a new child under this parent 
            $child            = new Type; 
            $child->parent_id = $request->parent_id; 
            $child->name      = $request->name; 

            // save child
            //$parent->children()->save($child); 
            $child->save();

            // return child
            //return response($child, 200);
            return view('admin.panel.panel');

        } else {

            $constants_type_first = 1;
            // No parent id -> Add it as a Group Type!
            // find all parents 
            $parents = Type::where('parent_id', $constants_type_first)->get();

            if ($parents->where('name',$request->name)->first()) {
                return response()->json(['message' => 'Parent Type already exists'], 200);
            }

            // create a new parent 
            $parent            = new Type; 
            $parent->parent_id = $constants_type_first; 
            $parent->name      = $request->name; 
            // Save new Parent
            $parent->save();

            //return response()->json(['message'=>'missing parent_id'], 200);
            //return response()->json(['message'=>'success'], 302);
            return view('admin.panel.panel');
        }
    }

    public function show($type_id)
    {
        // show single type
        $type =  Type::where('id',$type_id)->first();

        // Add that to Constants file
        $constants_type_first = 1;
        $subtypes = Type::where('parent_id', $type_id)->get();
        
        return view('type.show', compact('type', 'subtypes'));
    }
    
    public function edit(Type $type) 
    {
        // edit form 
        $resource = "edit";
        return view('type.modify', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        // update type
        $type->name = $request->name;
        $type->save();

        //return redirect()->route('type_edit', ['type' => $type->id])->with('success', 'Type updated');
        return view('admin.panel.panel');
    } 

    public function remove()
    {
        // delete form
    }

    public function destroy($id)
    {
        // If parent id delete all children (if exist)
        $childrentypes = Type::where('parent_id', $id);
        if (!is_null($childrentypes)){
            // Delete
            $childrentypes->delete();
        }

        // delete Type
        $type = Type::find($id);
        $type->delete();

        // List all Types
        //$types =  Type::all();
        //return view('type.index', compact('types'));
        return view('admin.panel.panel');
    } 
}
