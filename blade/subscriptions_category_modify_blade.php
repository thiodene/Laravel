<html>

    <body>

    <h1> Edit Category: {{ $category->name }}</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form method="POST" action="{{ route('category_update', ['category' => $category->id]) }}">
            @method('PUT')
            @csrf
            <label for = "name">Name</label>
            <input type = "text" id = "name" name = "name" value="{{ $category->name }}"> 

            <h3>Tagged Applications</h3>
            @foreach($applications as $application)
            <div>
            <input type="checkbox" id="app{{ $application->id }}" name="app{{ $application->id }}" {{ $tagged_applications[$application->id] }}>
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
