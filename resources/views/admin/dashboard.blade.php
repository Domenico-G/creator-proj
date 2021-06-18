@extends('layouts.app')

@section('content')
    <div class="container-fluid dashboard-section">
        <div class="container header">
            <div class="dashboard-title">
                <h1>Ciao {{ Auth::user()->name }}</h1>
                <h3>Gestisci i Creators</h3>
            </div>
            <div class="add-button">
                <a href="{{ route('admin.create') }}"><button type="button" class="btn btn-success">Aggiungi</button></a>
            </div>
        </div>
        <div class="container body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Intro</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Stato</th>
                        <th scope="col">Foto Profilo</th>
                        <th scope="col">Gestisci</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($creators as $creator)
                        <tr>
                            <th scope="row">{{ $creator->id }}</th>
                            <td>{{ $creator->name }}</td>
                            <td>{{ $creator->subtitle }}</td>
                            <td>{{ $creator->description }}</td>
                            <td>{{ $creator->state[0]->state_name }}</td>
                            <td><img src="{{ $creator->image }}" width="250px" alt="Creator pic"></td>
                            <td>
                                <a href="{{ route('guest.show', ['name' => $creator->name]) }}"><button type="button"
                                        class="btn btn-primary">Visualizza</button></a>
                                <a href="{{ route('admin.edit', compact('creator')) }}"><button type="button"
                                        class="btn btn-warning">Modifica</button></a>
                                <form action="{{ route('admin.destroy', compact('creator')) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger" type="submit">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
