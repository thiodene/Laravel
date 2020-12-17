<html>

    <h1> Admin Panel - Demographics</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>
        <h2>Available Demographics: {{ sizeof($demographics) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('demographic_create') }}"><button type="button">+ Add Another Demographic</button></a>
    </div>

    <div>
        <h2>Demographics</h2>

        <table>
        <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Name_EN</th>
                    <th style="text-align:center;">Name_FR</th>
                    <th>Sub-Demographics</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
        @foreach($demographics_to_count as $demographic_id => $count)
            <tr id="{{ $demographic_id }}" name="{{ $demographics_name[$demographic_id][0] }}">
                <td>{{ $demographics_name[$demographic_id][0] }}</td> 
                <td>{{ $demographics_name[$demographic_id][1] }}</td> 
                <td>{{ $count }}</td>
                <td><a href="{{ route('demographic_edit', ['demographic' => $demographic_id]) }}"><button type="button">Edit</button></a></td>
                <td><a href="{{ route('demographic_delete', ['demographic' => $demographic_id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            <tr>
                <td></td> 
                <td></td> 
                <td>
                @if ($count != 0)
                    @foreach($subdemographics_demographic[$demographic_id] as $subdemographic)
                        {{ $subdemographic[0] }} <br />
                    @endforeach
                    <a href="{{ route('demographic_show', ['demographic' => $demographic_id]) }}">View All</a>
                @else
                    No SubDemographics <a href="{{ route('demographic_show', ['demographic' => $demographic_id]) }}">View</a>
                @endif
                </td>
                <td colspan="2"></td>
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
    
    if (confirm('Do you really want to remove the Demographic: ' + name + ' and all its Tags?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
