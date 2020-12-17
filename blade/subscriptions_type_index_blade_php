<html>

    <h1> Admin Panel - Types</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>
        <h2>Available Types: {{ sizeof($types) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('type_create') }}"><button type="button">+ Add Another Type</button></a>
    </div>

    <div>
        <h2>Types</h2>

        <table>
        <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Type</th>
                    <th>Sub-Types</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
        @foreach($types_to_count as $type_id => $count)
            <tr id="{{ $type_id }}" name="{{ $types_name[$type_id] }}">
                <td>{{ $types_name[$type_id] }}</td> 
                <td>{{ $count }}</td>
                <td><a href="{{ route('type_edit', ['type' => $type_id]) }}"><button type="button">Edit</button></a></td>
                <td><a href="{{ route('type_delete', ['type' => $type_id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            <tr>
                <td></td> 
                <td>
                @if ($count != 0)
                    @foreach($subtypes_type[$type_id] as $subtype)
                        {{ $subtype }} <br />
                    @endforeach
                    <a href="{{ route('type_show', ['type' => $type_id]) }}">View All</a>
                @else
                    No SubTypes <a href="{{ route('type_show', ['type' => $type_id]) }}">View</a>
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
    
    if (confirm('Do you really want to remove the Type: ' + name + ' and all its Tags?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
