@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/personas') }}" method="post">

             @csrf 
             @include('personas.form', ['modo'=>'Crear']);
             
        </form>
    </div>
@endsection