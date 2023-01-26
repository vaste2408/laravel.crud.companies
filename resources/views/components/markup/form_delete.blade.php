<form action="{{route($route_name, $id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
</form>
