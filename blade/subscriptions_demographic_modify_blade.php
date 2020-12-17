<html>

    <body>

    <h1> Edit Demographic: {{ $demographic->name_en }}</h1>

    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    <br />
    <div>

        <form method="POST" action="{{ route('demographic_update', ['demographic' => $demographic->id]) }}">
            @method('PUT')
            @csrf
            <label for = "name_en">Name_EN</label>
            <input type = "text" id = "name_en" name = "name_en" value="{{ $demographic->name_en }}"> 
            <label for = "name_fr">Name_FR</label>
            <input type = "text" id = "name_fr" name = "name_fr" value="{{ $demographic->name_fr }}"> 

            <div>
                <input type = 'submit' value = "Submit"></input>
            </div>
        
        </form>

    </div>

    </body>
    
</html>
