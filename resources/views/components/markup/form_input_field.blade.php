<div class="col-xs-12 col-sm-12 col-md-12 mb-2">
    <div class="form-group">
        <strong>{{$label}}</strong>
        <input type="{{$type ?? 'text'}}" {{$required ? 'required' : ''}}
            name="{{$name}}" class="form-control" placeholder="{{$label}}" value="{{$value ?? ''}}" />
    </div>
</div>
