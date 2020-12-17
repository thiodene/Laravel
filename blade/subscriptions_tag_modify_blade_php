<html>

    <body>

    <h1> Edit Tag: {{ $tag->name }}</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>

    <div>
        <h2>Category: {{ $categories_name[$tag->parent_id] }}</h2>
        
    </div>

    <div>

        <form method="POST" action="{{ route('tag_update', ['tag' => $tag->id]) }}">
            @method('PUT')
            @csrf
            <label for = "name">Name</label>
            <input type = "text" id = "name" name = "name" value="{{ $tag->name }}"> 

            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
