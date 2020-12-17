<html>

    <body>

    <h1> Create new Category</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form action = "{{ route('category_store') }}" method = "POST">
            @csrf

            <label for = "name">Name</label>
            <input type = "text" id = "name" name = "name"> 
            
            <h3>Add Category to Applications</h3>
            @foreach($applications as $application)
            <div>
            <input type="checkbox" id="app{{ $application->id }}" name="app{{ $application->id }}">
            <label for="{{ $application->name }}">{{ $application->name }}</label>
            </div>
            @endforeach
            
            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
