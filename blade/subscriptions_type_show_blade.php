<html>

    <h1> Admin Panel - {{ $type->name }}</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>

        <h2>Type</h2>

        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            <tr id="{{ $type->id }}" name="{{ $type->name }}">
                <td style="text-align:center;vertical-align:top;">{{ $type->name }}</td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('type_edit', ['type' => $type->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('type_delete', ['type' => $type->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            
        </table>

        <h2>Available Sub-Types: {{ sizeof($subtypes) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('type_create') }}"><button type="button">+ Add Another Type</button></a>
    </div>

    <div>
        <h2>Sub-Types</h2>
        @if (sizeof($subtypes) != 0)
        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            @foreach($subtypes as $subtype)
            <tr id="{{ $subtype->id }}" name="{{ $subtype->name }}">
                <td style="text-align:center;vertical-align:top;">{{ $subtype->name }}</td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('type_edit', ['type' => $subtype->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('type_delete', ['type' => $subtype->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            @endforeach
            
        </table>
        @else

            No SubTypes <a href="{{ route('type_create') }}">+ Add Sub-Type</a>
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
    
    if (confirm('Do you really want to remove the Type: ' + name + '?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
