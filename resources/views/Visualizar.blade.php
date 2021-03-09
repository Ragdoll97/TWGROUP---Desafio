@extends('master')

@section('title', 'Publicacion')

@section('content')

{{-- Creación del box que contiene el registro--}}
<div class="box  box-register shadow-lg">
    <div class="box-table">
        <div class="header shadow">
            <h2>TWGroup</h2> 
            <h3>Todas las publicaciones hasta ahora</h3> 
    </div>

    
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titulo</th>
            <th scope="col">Contenido</th>
            <th scope="col">Usuario</th>
            
          </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>{{$publication->title}}</td>
                <td>{{$publication->content}}</td>
                <td>{{$publication->user->name}}</td>
            </tr>
        </tbody>
      </table>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Comentarios</th>
            <th><a href="/Comentarios/{{$publication->id}}">Ver Todos los comentarios</a></th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
      <div class="inside">
        {!! Form::open(['url' => '/Visualizar/'.$publication->id.''])!!}
        <label for="name">Comentario</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i>
                </div>
            </div>
        {!! Form::number('publication_id',$publication->id, ['hidden'])!!}
        {!! Form::hidden('id_usuario',auth()->user()->id , ['class' => 'form-control'])!!}
        {!! Form::hidden('email',$publication->user->email, ['class' => 'form-control'])!!}
        {!! Form::text('content',null, ['class' => 'form-control','class' => 'tamañoCuadro', 'required'])!!}
        </div>
        <label for="name">Estado:</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i>
                </div>
            </div>
        {!! Form::text('status','Aprobado', ['class' => 'form-control', 'disabled'])!!}
        </div>
        {!! Form::submit('Publicar Comentario', ['class' => 'btn btn-success mtop16'])!!}
        {!! Form::close() !!}
      </div>

      <div class="footer mtop16 ">
        <a href="{{url('/Publicaciones')}}">Hacer una Publicación</a>
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