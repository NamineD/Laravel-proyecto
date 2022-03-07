@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{ url('/personas/'.$persona->id ) }}" method="post">
            @csrf 
            {{ method_field('PATCH') }}
            @include('personas.form', ['modo'=>'Editar']);

        </form>
    </div>
@endsection

