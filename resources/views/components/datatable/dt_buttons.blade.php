<div class="d-flex">
    <a class="btn btn-sm btn-outline-primary me-2" href="{{route($routeShowName, $id)}}">Info</a>
    <a class="btn btn-sm btn-outline-dark me-2" href="{{route($routeEditName, $id)}}">Edit</a>
    {{view('components.markup.form_delete', ['route_name' => $routeDestroyName, 'id' => $id])}}
</div>
