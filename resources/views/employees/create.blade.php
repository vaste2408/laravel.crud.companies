@extends('layouts.authorized')

@section('inner')
    {{view('components.markup.form_edit', [
    'header' => 'Create new employee',
    'errors' => $errors,
    'action' => route('employees.store'),
    'method' => 'POST',
    'route_back' => route('employees'),
    'fields' => [
        ['label' => 'Company', 'type' => 'select', 'name' => 'company_id', 'required' => true, 'data' => $companies],
        ['label' => 'Name', 'type' => 'text', 'name' => 'name', 'required' => true],
        ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'required' => false],
        ['label' => 'Phone', 'type' => 'text', 'name' => 'phone', 'required' => false],
    ]
    ])}}
@endsection
