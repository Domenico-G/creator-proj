@extends('layouts.app')

@section('title', 'Modifica creator')

@section('content')

@include('admin.create', ['edit' => true])

@endsection
