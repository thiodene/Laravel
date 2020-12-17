<html>

    <body>

    <h1> Create new Type</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form action = "{{ route('type_store') }}" method = "POST">
            @csrf

            <select name="parent_id" id="parent_id">
                <option value="0">Parent Type (if applicable)</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
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
