@extends('layouts.app')

@section('title', 'Aggiungi un creator')

@section('content')

@include('admin.creator-form', ['create' => true])

@endsection
