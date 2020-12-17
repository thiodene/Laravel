<html>

    <body>

    <h1> Edit Application: {{ $application->name }}</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form method="POST" action="{{ route('application_update', ['application' => $application->id]) }}">
            @method('PUT')
            @csrf
            <label for = "name">Name</label>
            <input type = "text" id = "name" name = "name" value="{{ $application->name }}"> 

            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
