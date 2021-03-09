@extends('master')

@section('title', 'Todas las publicaciones')

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
            <th scope="col">Ver Publicacion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($publication as $p)
            <tr>
                <td></td>
                <td>{{$p->title}}</td>
                <td>{{$p->content}}</td>
                <td>{{$p->user->name}}</td>
                <td><a href="/Visualizar/{{$p->id}}">Ver</a></td>
            </tr>
            @endforeach
        </tbody>
      </table>


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