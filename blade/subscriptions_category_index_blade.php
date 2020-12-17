<html>

    <h1> Admin Panel - Categories</h1>
    
    <div>
        <a href="{{ route('admin_panel') }}">System Management</a>
    </div>
    
    <div>
        <h2>Available Categories: {{ sizeof($categories) }}</h2>
        
    </div>

    <div>
        <a href="{{ route('category_create') }}"><button type="button">+ Add Another Category</button></a>
    </div>

    <div>
        <h2>Categories</h2>

        <table>
        <thead class="thead-dark">
                <tr>
                    <th style="text-align:center;">Name</th>
                    <th>Tags</th>
                    <th>Applications</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
        @foreach($tags_to_count as $category_id => $count)
            <tr id="{{ $category_id }}" name="{{ $categories_name[$category_id] }}">
                <td>{{ $categories_name[$category_id] }}</td> 
                <td>{{ $count }}</td>
                <td>
                @if (isset($apptags_app[$category_id]))
                    @foreach($apptags_app[$category_id] as $apptag)
                        {{ $apptag }} <br />
                    @endforeach
                @endif
                </td>
                <td><a href="{{ route('category_edit', ['category' => $category_id]) }}"><button type="button">Edit</button></a></td>
                <td><a href="{{ route('category_delete', ['category' => $category_id]) }}"><button class="delete" type="button">Delete</button></a></td>
            </tr>
            <tr>
                <td></td> 
                <td>
                @if ($count != 0)
                    @foreach($tags_category[$category_id] as $tag)
                        {{ $tag }} <br />
                    @endforeach
                    <a href="{{ route('category_show', ['category' => $category_id]) }}">View All Tags</a>
                @else
                    No Tags <a href="{{ route('category_show', ['category' => $category_id]) }}">View</a>
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
    
    if (confirm('Do you really want to remove the Category: ' + name + ' and all its Tags?')) {
        alert('Thanks for confirming');
    } else {
        return false;
    }
    });
});
</script>
