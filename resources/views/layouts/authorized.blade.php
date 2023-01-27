@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if(Route::current()->getName() == 'companies') active @endif" aria-current="page" href="{{route('companies')}}">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(Route::current()->getName() == 'employees') active @endif" aria-current="page" href="{{route('employees')}}">Employees</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @yield('inner')
@endsection
