<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Application;

class TagController extends Controller
{
    
    public function index(){
    
        // Add that to Constants file
        $constants_tag_first = 1;
        $tags = Tag::where('parent_id', '!=', $constants_tag_first)->get();
        $constants_tag_first = 1;
        $categories = Tag::where('parent_id', $constants_tag_first)->where('id', '!=', $constants_tag_first)->get();
        foreach($categories as $category)
        {
            $categories_name[$category->id] = $category->name;
        }
        return view('tag.index', compact('tags','categories_name'));

    }
    
    public function index_cat()
    {
        // Add that to Constants file
        $constants_tag_first = 1;
        $categories = Tag::where('parent_id', $constants_tag_first)->where('id', '!=', $constants_tag_first)->get();
        $tags_category = array();
        $apptags_app = array();
        foreach($categories as $category)
        {
            $tags = $category->children()->get();
            $tags_to_count[$category->id] = sizeof($tags);
            $categories_name[$category->id] = $category->name;
            
            // List Applications Tagged by this Category
            $cat = Tag::find($category->id);
            $apps = $cat->applications()->get();

            //dd($apps);
            foreach($apps as $app)
            {
                //Get all the Apps tagged by this Category
                $apptags_app[$category->id][$app->id] = $app->name;
            }


            foreach($tags as $tag){
                $tags[$tag->id] = $tag;
                $tags_category[$category->id][$tag->id] = $tag->name;
            }
        }
        //dd($types);
        return view('category.index', compact('categories', 'tags', 'tags_category', 'tags_to_count', 'categories_name', 'apptags_app'));
    }

    public function create()
    {
        
        // Add that to Constants file
        $constants_type_first = 1;
        $categories = Tag::where('parent_id', $constants_type_first)->where('id', '!=', $constants_type_first)->get();

        // create Category/Tag form
        return view('tag.create', compact('categories'));
    }

    public function create_cat()
    {
        
        // Add that to Constants file
        $constants_type_first = 1;
        $categories = Tag::where('parent_id', $constants_type_first)->where('id', '!=', $constants_type_first)->get();
        
        $applications = Application::get();

        // create Category/Tag form
        return view('category.create', compact('categories', 'applications'));
    }

    public function store(Request $request)
    {
        // find parent with all children 
        $parent = Tag::find($request->parent_id);

        // Add that to Constants file
        $constants_tag_first = 1;

        // does this type already exist under parent
        if ($parent->children()->where('name',$request->name)->first()) {
            return response()->json(['message' => 'Type already exists under this parent'], 200);
        }

        // create a new child under this parent 
        $child            = new Tag; 
        $child->parent_id = $request->parent_id; 
        $child->name      = $request->name; 

        // save child
        //$parent->children()->save($child); 
        $child->save();

        // return child
        //return response($child, 200);
        $tags = Tag::where('parent_id', '!=', $constants_tag_first)->get();
        $categories = Tag::where('parent_id', $constants_tag_first)->where('id', '!=', $constants_tag_first)->get();
        foreach($categories as $category)
        {
            $categories_name[$category->id] = $category->name;
        }
        return view('tag.index', compact('tags','categories_name'));
    }


    public function store_cat(Request $request)
    {
        $constants_tag_first = 1;
        // No parent id -> Add it as a Group Type!
        // find all categories
        $categories = Tag::where('parent_id', $constants_tag_first)->get();

        if ($categories->where('name',$request->name)->first()) {
            return response()->json(['message' => 'Category already exists'], 200);
        }

        // create a new category
        $parent            = new Tag; 
        $parent->parent_id = $constants_tag_first; 
        $parent->name      = $request->name; 
        // Save new Parent
        $parent->save();

        // Get the new Category ID
        //$new_category = Tag::where('name', $request->name)->get();
        $new_category = Tag::where('name', $request->name)->first();
        $tag_id = $new_category->id;

        //dd($request->{"app" . 1});
        //dd($request->app1);
        
        $applications = Application::get();
        foreach($applications as $application){
            if (isset($request->{"app" . $application->id}))
            {
                // Link Application to this new category
                $new_category->applications()->attach($application->id);
            }
        }

        return view('admin.panel.panel');
    }

    public function show($type_id)
    {
        // show single type
    }

    public function show_cat($category_id)
    {
        // show single category
        $category =  Tag::where('id',$category_id)->first();

        // List Applications Tagged this Category
        $cat = Tag::find($category_id);
        $apps = $cat->applications()->get();
        //dd($apptags);

        $apptags_app = array();
        foreach($apps as $app)
        {
            $apptags_app[$app->id] = $app->name;
            //$tags_to_count[$tag->id] = 0;
        }

        // Add that to Constants file
        $constants_type_first = 1;
        $tags = Tag::where('parent_id', $category_id)->get();
        
        return view('category.show', compact('category', 'tags', 'apptags_app'));
    }
    
    public function edit(Tag $tag) 
    {
        // edit form 
        $resource = "edit";

        $constants_tag_first = 1;
        $categories = Tag::where('parent_id', $constants_tag_first)->where('id', '!=', $constants_tag_first)->get();
        foreach($categories as $category)
        {
            $categories_name[$category->id] = $category->name;
        }

        return view('tag.modify', compact('tag','categories_name'));
    }

    public function edit_cat($category_id) 
    {
        // show single category
        $category =  Tag::where('id',$category_id)->first();
        
        $applications = Application::get();
        $tagged_applications = array();

        // List Applications Tagged this Category
        $cat = Tag::find($category_id);

        foreach($applications as $application){
            if ($cat->applications()->where('application_id',$application->id)->first())
                $tagged_applications[$application->id] = 'checked';
            else
                $tagged_applications[$application->id] = '';
        }

        // edit form 
        $resource = "edit";
        return view('category.modify', compact('category','applications', 'tagged_applications'));
    }

    public function update(Request $request, $category)
    {
        // Check if Tag is a category (if yes, look for Tagged applications)
        $constants_tag_first = 1;
        // find all categories
        $categories = Tag::where('parent_id', $constants_tag_first)->get();
        // check applications
        $applications = Application::get();

        // List Applications Tagged by this Category
        $cat = Tag::find($category);

        if ($categories->where('id',$category)->first())
        {
            // Update the tagged Applications
            foreach($applications as $application)
            {
                if (isset($request->{"app" . $application->id}))
                {
                    if (!$cat->applications()->where('application_id',$application->id)->first()) 
                    { //this is stored already don't do anything
                        // Link Application to this new category
                        $new_category = Tag::where('id', $category)->first();
                        $new_category->applications()->attach($application->id);

                    }
                }
                else
                {
                    // If this was stored and it's been removed, delete the app tag
                    // Delete Applications linked to this Tag
                    $old_category = Tag::where('id', $category)->first();
                    $old_category->applications()->detach($application->id);

                }
            }

        }
        // show single category
        $tag =  Tag::where('id',$category)->first();

        // update type
        $tag->name = $request->name;
        $tag->save();

        //return redirect()->route('category_edit', ['tag' => $tag->id])->with('success', 'Tag updated');
        return view('admin.panel.panel');
    } 

    public function remove()
    {
        // delete form
    }

    public function destroy($id)
    {
        // If category delete all tags (if exist)
        $tags = Tag::where('parent_id', $id);
        if (!is_null($tags)){
            // Delete
            $tags->delete();
        }

        // Delete Applications linked to this Tag
        $old_category = Tag::where('id', $id)->first();
        $old_category->applications()->detach();

        // delete Type
        $category = Tag::find($id);
        $category->delete();

        return view('admin.panel.panel');
    } 
}
