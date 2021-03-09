@extends('master')

@section('title', 'Publica Algo')

@section('content')

<div class="box box-register shadow-lg">
    <div class="header shadow">
            <h2>TWGroup</h2> 
            <h3>Publica algo nuevo!!</h3> 
    </div>
{{-- Creación de los campos de texto e inserción de 
    iconos para dar forma al registro de usuarios --}}
    <div class="inside">
    {!! Form::open(['url' => '/Publicaciones'])!!}
    <label for="name">Titulo</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i>
            </div>
        </div>
    {!! Form::text('title',null, ['class' => 'form-control', 'required'])!!}
    </div>

    <label for="email" class="mtop16">Contenido</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-envelope"></i>
            </div>
        </div>
    {!! Form::text('content',null, ['class' => 'form-control', 'class' => 'tamañoCuadro','required'])!!}
    </div>

   
    {{-- Inserción del boton y accesos a registo y recuperación de contraseña --}}
    {!! Form::submit('Publicar', ['class' => 'btn btn-success mtop16'])!!}
    {!! Form::close() !!}

    <div class="footer mtop16 ">
       <a href="{{url('/VerPublicaciones')}}">Ver Todas las Publicaciones</a>

        @if(Session::has('message'))
        <div class="container">
            <div class="alert alert-{{ Session::get('typealert')}}" style="display=none;">
              {{Session::get('message')}}
              @if ($errors->any())
              <ul>
                  @foreach($errors->all() as $error)
                  <li>{{$error}} </li>
                  @endforeach
              </ul>
              @endif
              <script>
                  $('.alert').slideDown();
                  setTimeout(function(){$('.alert').slideUp();}, 10000);
              </script>
            </div>
        </div>
      @endif
    </div>
    </div>
</div>

@stop