<html>

    <h1> Admin Panel - Tags</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>
        <h2>Available Tags: {{ sizeof($tags) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('tag_create') }}"><button type="button">+ Add Another Tag</button></a>
    </div>

    <div>
        <h2>Tags</h2>

        <table>
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            @foreach($tags as $tag)
            <tr id="{{ $tag->id }}" name="{{ $tag->name }}">
                <td>{{ $tag->name }}</td>
                <td>{{ $categories_name[$tag->parent_id] }}</td>
                <td><a href="{{ route('tag_edit', ['tag' => $tag->id]) }}"><button type="button">Edit</button></a></td>
                <td><a href="{{ route('tag_delete', ['tag' => $tag->id]) }}"><button class="delete" type="button">Delete</button></a></td>
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
    
    if (confirm('Do you really want to remove the Tag: ' + name + '?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
