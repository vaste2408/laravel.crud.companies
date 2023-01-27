<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>{{$header ?? 'Creation form'}}</h3>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{$action}}" method="{{$method ?? 'GET'}}">
                @csrf

                <div class="row">
                    @foreach($fields as $field)
                        @if($field['type'] == 'select')
                        {{view('components.markup.form_select_field',
                            ['label' => $field['label'], 'data' => $field['data'],
                            'name' => $field['name'], 'value' => $field['value']??'', 'required' => $field['required']])}}
                        @else
                            {{view('components.markup.form_input_field',
                            ['label' => $field['label'], 'type' => $field['type'],
                            'name' => $field['name'], 'value' => $field['value']??'', 'required' => $field['required']])}}
                        @endif
                    @endforeach

                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2 d-flex justify-content-between">
                        <a href="{{$route_back}}" class="btn btn-outline-dark col-2">Back</a>
                        <button type="submit" class="btn btn-primary col-2">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
