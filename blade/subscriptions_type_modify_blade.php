<html>

    <body>

    <h1> Edit Type: {{ $type->name }}</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form method="POST" action="{{ route('type_update', ['type' => $type->id]) }}">
            @method('PUT')
            @csrf
            <label for = "name">Name</label>
            <input type = "text" id = "name" name = "name" value="{{ $type->name }}"> 

            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
