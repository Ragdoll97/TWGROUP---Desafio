@extends('master')

@section('title', 'Login')

@section('content')

<div class="box box-login shadow-lg">
    <div class="header shadow">
        <h2>TWGroup</h2>  
    </div>
    
    <div class="inside">
    {!! Form::open(['url' => '/Login'])!!}
    <label for="email">Correo Electronico</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-envelope"></i>
            </div>
        </div>
    {!! Form::email('email',null, ['class' => 'form-control', 'required'])!!}
    </div>

    <label for="email" class="mtop16">Contraseña</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-key"></i>
            </div>
        </div>
    {!! Form::password('password', ['class' => 'form-control', 'required'])!!}
    </div>
    {!! Form::submit('ingresar', ['class' => 'btn btn-success mtop16'])!!}
    {!! Form::close() !!}

    <div class="footer mtop16">
        <a href="{{url('/register')}}">Registrate</a>

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