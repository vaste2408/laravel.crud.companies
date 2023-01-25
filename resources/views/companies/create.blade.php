@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Create company</h3>
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

                <form action="{{ route('companies.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" required name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" required name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                            <div class="form-group">
                                <strong>Address:</strong>
                                <input type="text" required name="address" class="form-control" placeholder="Address">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                            <div class="form-group">
                                <strong>Logo:</strong>
                                <input type="file" required name="logo" class="form-control" placeholder="Logo">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-between">
                            <a href="{{route('companies')}}" class="btn btn-light col-2">Back</a>
                            <button type="submit" class="btn btn-primary col-2">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
