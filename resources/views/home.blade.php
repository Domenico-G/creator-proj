@extends('layouts.app')


@section('content')
    <div class="container">
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
                    <th scope="row">{{$creator->id}}</th>
                    <td>{{$creator->name}}</td>
                    <td>{{$creator->subtitle}}</td>
                    <td>{{$creator->description}}</td>
                    <td>{{$creator->state[0]->state_name}}</td>
                    <td><img src="{{$creator->image}}" width="250px" alt="Creator pic"></td>
                    <td><a href="{{route('guest.show', ['name'=>$creator->name])}}"><button  type="button" class="btn btn-primary">Visualizza</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
