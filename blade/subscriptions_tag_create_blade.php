<html>

    <body>

    <h1> Create new Tag</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form action = "{{ route('tag_store') }}" method = "POST">
            @csrf

            <select name="parent_id" id="parent_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for = "name">Name</label>
            <input type = "text" id = "name" name = "name"> 
            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
