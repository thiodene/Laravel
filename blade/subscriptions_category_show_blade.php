<html>

    <h1> Admin Panel - {{ $category->name }}</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>

        <h2>Category</h2>

        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name</th>
                    <th>Applications</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            <tr id="{{ $category->id }}" name="{{ $category->name }}">
                <td style="text-align:center;vertical-align:top;">{{ $category->name }}</td>
                <td style="text-align:center;vertical-align:top;">
                    @foreach($apptags_app as $apptag)
                        {{ $apptag }} <br />
                    @endforeach
                </td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('category_edit', ['category' => $category->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('category_delete', ['category' => $category->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            
        </table>

        <h2>Available Tags: {{ sizeof($tags) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('tag_create') }}"><button type="button">+ Add Another Tag</button></a>
    </div>

    <div>
        <h2>Tags</h2>
        @if (sizeof($tags) != 0)
        <table>
            <thead class="thead-dark">
                <tr>
                    <th class="bg-info text-white" style="text-align:center;">Name</th>
                    <th class="bg-info text-white"></th>
                    <th class="bg-info text-white"></th>
                </tr>
            </thead>
            @foreach($tags as $tag)
            <tr id="{{ $tag->id }}" name="{{ $tag->name }}">
                <td style="text-align:center;vertical-align:top;">{{ $tag->name }}</td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('tag_edit', ['tag' => $tag->id]) }}"><button type="button">Edit</button></a></td>
                <td style="text-align:center;vertical-align:top;"><a href="{{ route('tag_delete', ['tag' => $tag->id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            @endforeach
            
        </table>
        @else

            No Tags <a href="{{ route('tag_create') }}">+ Add Tag</a>
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
    
    if (confirm('Do you really want to remove the Category: ' + name + '?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
