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

            <form action="{{$action}}" method="{{$method ?? 'GET'}}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    @foreach($fields as $field)
                        @if($field['type'] == 'select')
                        {{view('components.markup.form_select_field',
                            ['label' => $field['label'], 'data' => $field['data'], 'disabled' => $field['disabled'] ?? '',
                            'hidden' => $field['hidden'] ?? '',
                            'name' => $field['name'], 'value' => $field['value']??'', 'required' => $field['required']])}}
                        @elseif($field['type'] == 'image')
                            @if ($field['value']??false)
                                <img class="p-0 ms-3" style="min-width: 100px; min-height: 100px; max-width:300px; max-height: 300px;" src="{{'/images/'.$field['value']}}" />
                            @endif
                        @else
                            {{view('components.markup.form_input_field',
                            ['label' => $field['label'], 'type' => $field['type'], 'disabled' => $field['disabled'] ?? '',
                            'hidden' => $field['hidden'] ?? '',
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
