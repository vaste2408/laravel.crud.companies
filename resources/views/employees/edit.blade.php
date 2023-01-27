@extends('layouts.authorized')

@section('inner')
    {{view('components.markup.form_edit', [
    'header' => 'Edit employee',
    'errors' => $errors,
    'action' => route('employees.update', $employee),
    'method' => 'POST',
    'route_back' => route('employees'),
    'fields' => [
        ['label' => 'Company', 'value' => $employee->company_id, 'type' => 'select', 'name' => 'company_id', 'required' => true, 'data' => $companies],
        ['label' => 'Name', 'value' => $employee->name, 'type' => 'text', 'name' => 'name', 'required' => true],
        ['label' => 'Email', 'value' => $employee->email, 'type' => 'email', 'name' => 'email', 'required' => false],
        ['label' => 'Phone', 'value' => $employee->phone, 'type' => 'text', 'name' => 'phone', 'required' => false],
    ]
    ])}}
@endsection
