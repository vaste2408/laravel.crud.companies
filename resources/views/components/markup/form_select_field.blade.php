<div class="col-xs-12 col-sm-12 col-md-12 mb-2">
    <div class="form-group">
        <strong>{{$label}}</strong>
        <select {{$required ? 'required' : ''}} name="{{$name}}" class="form-control"
                placeholder="{{$label}}">
            <option></option>
            @foreach($data as $option)
                <option value="{{$option['id']}}" {{$option['id'] == $value ? 'selected' : ''}}>
                    {{$option['name']}}
                </option>
            @endforeach
        </select>
    </div>
</div>
