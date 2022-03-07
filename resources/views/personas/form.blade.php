
<h1> {{$modo}} dato </h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error )
               <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>

@endif


    <div class="form-group mb-3">
        <label for="Nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="Nombre" value="{{ isset($persona->Nombre)?$persona->Nombre:old('Nombre') }}" id="Nombre">
    </div>

    <div class="form-group mb-3">
        <label for="Apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="Apellido" value="{{ isset($persona->Apellido)?$persona->Apellido:old('Apellido') }}" id="Apellido">
    </div>

    <div class="form-group mb-3">   
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" name="Email" value="{{ isset($persona->Email)?$persona->Email:old('Email') }}" id="Email">
    </div>

    <div class="form-group mb-3"> 
        <label for="Telefono" class="form-label">Teléfono</label>
        <input type="tel" class="form-control" name="Telefono" value="{{ isset($persona->Telefono)?$persona->Telefono:old('Telefono') }}" id="Telefono">
    </div>

    <div class="form-group mb-3"> 
        <input type="submit" class="btn btn-outline-success" value="{{$modo}} datos">
    </div>

    <div class="form-group mb-3"> 
        <a href="{{ url('personas/') }}" class="btn btn-outline-primary"> Inicio </a>
    </div>