@extends('layouts.authorized')

@section('inner')
    {{view('components.markup.form_edit', [
    'header' => 'Edit company',
    'errors' => $errors,
    'action' => route('companies.update', $company),
    'method' => 'POST',
    'route_back' => route('companies'),
    'fields' => [
        ['label' => 'Name', 'type' => 'text', 'name' => 'name', 'value' => $company->name, 'required' => true],
        ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'value' => $company->email, 'required' => false],
        ['label' => 'Address', 'type' => 'text', 'name' => 'address', 'value' => $company->address, 'required' => false],
        ['label' => 'New logo', 'type' => 'file', 'name' => 'logo', 'value' => '', 'required' => false],
        ['label' => 'Old logo', 'type' => 'text', 'name' => 'old_logo', 'value' => $company->logo, 'required' => false, 'hidden' => 'hidden'],
        ['label' => '', 'type' => 'image', 'name' => '', 'value' => $company->logo, 'required' => false],
    ],
    'data' => $company
    ])}}
@endsection
