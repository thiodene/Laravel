<html>

    <h1> Admin Panel - {{ $demographic->name_en }}</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>

        <h2>Demographic</h2>

        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name_EN</th>
                    <th class="bg-info text-white" style="text-align:center;">Name_FR</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            <tr id="{{ $demographic->id }}" name="{{ $demographic->name_en }}">
                <td style="text-align:center;vertical-align:top;">{{ $demographic->name_en }}</td>
                <td style="text-align:center;vertical-align:top;">{{ $demographic->name_fr }}</td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('demographic_edit', ['demographic' => $demographic->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('demographic_delete', ['demographic' => $demographic->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            
        </table>

        <h2>Available Sub-Demographics: {{ sizeof($subdemographics) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('demographic_create') }}"><button type="button">+ Add Another Demographic</button></a>
    </div>

    <div>
        <h2>Sub-Demographics</h2>
        @if (sizeof($subdemographics) != 0)
        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name_FR</th>
                    <th class="bg-info text-white" style="text-align:center;">Name_EN</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            @foreach($subdemographics as $subdemographic)
            <tr id="{{ $subdemographic->id }}" name="{{ $subdemographic->name_en }}">
                <td style="text-align:center;vertical-align:top;">{{ $subdemographic->name_en }}</td>
                <td style="text-align:center;vertical-align:top;">{{ $subdemographic->name_fr }}</td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('demographic_edit', ['demographic' => $subdemographic->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('demographic_delete', ['demographic' => $subdemographic->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            @endforeach
            
        </table>
        @else

            No Demographics <a href="{{ route('demographic_create') }}">+ Add Demographic</a>
        @endif
        
    </div>
    <br />

</html>


<script src="{{ asset('js/app.js') }}"></script>
<script>
$(function() {
    $(".delete").click(function()
  {
    var name = $(this).parent().parent().parent().attr("name");
    
    if (confirm('Do you really want to remove the Demographic: ' + name + '?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
