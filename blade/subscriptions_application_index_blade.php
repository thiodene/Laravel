<html>

    <h1> Admin Panel - Applications</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>
        <h2>Available Applications: {{ sizeof($applications) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('application_create') }}"><button type="button">+ Add Another Application</button></a>
    </div>

    <div>
        <h2>Applications</h2>

        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            @foreach($applications as $application)
            <tr id="{{ $application->id }}" name="{{ $application->name }}">
                <td style="text-align:center;vertical-align:top;">{{ $application->name }}</td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('application_edit', ['application' => $application->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('application_delete', ['application' => $application->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            @endforeach
            
        </table>
        
    </div>
    <br />

</html>


<script src="{{ asset('js/app.js') }}"></script>
<script>
$(function() {
    $(".delete").click(function()
  {
    var name = $(this).parent().parent().parent().attr("name");
    
    if (confirm('Do you really want to remove the App: ' + name + '?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
