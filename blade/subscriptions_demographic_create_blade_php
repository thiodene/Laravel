<html>

    <body>

    <h1> Create new Demographic</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form action = "{{ route('demographic_store') }}" method = "POST">
            @csrf

            <select name="parent_id" id="parent_id">
                <option value="0">Parent Type (if applicable)</option>
                @foreach($demographics as $demographic)
                    <option value="{{ $demographic->id }}">{{ $demographic->name_en }}</option>
                @endforeach
            </select>

            <label for = "name_en">Name_EN</label>
            <input type = "text" id = "name_en" name = "name_en"> 
            <label for = "name_en">Name_FR</label>
            <input type = "text" id = "name_fr" name = "name_fr"> 
            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
