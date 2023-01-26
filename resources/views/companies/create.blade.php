@extends('layouts.app')

@section('content')
    {{view('components.markup.form_edit', [
    'header' => 'Create new company',
    'errors' => $errors,
    'action' => route('companies.store'),
    'method' => 'POST',
    'route_back' => route('companies'),
    'fields' => [
        ['label' => 'Name', 'type' => 'text', 'name' => 'name', 'required' => true],
        ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'required' => false],
        ['label' => 'Address', 'type' => 'text', 'name' => 'address', 'required' => false],
        ['label' => 'Logo', 'type' => 'file', 'name' => 'logo', 'required' => false],
    ]
    ])}}
@endsection
