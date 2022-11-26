@extends('master')

@section('title', 'Publicacion')

@section('content')

{{-- Creación del box que contiene el registro--}}
<div class="box  box-register shadow-lg">
    <div class="box-table">
        <div class="header shadow">
            <h2>TWGroup</h2> 
            <h3>Todas los comentarios hasta ahora</h3> 
    </div>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col"><strong >#</strong></th>
          <th scope="col"><strong >Comentarios</strong></th>
          <th scope="col"><strong >Usuario</strong></th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($Comentarios as $p)
        <tr>
          <th>{{$p->user_id}}</th>
          <th>{{$p->content}}</th>
          <th>{{$p->user->name}}</th>
        </tr>
        @endforeach
      </tbody>
    </table>
     
     

      <div class="footer mtop16 ">
        <a href="{{url('/Publicaciones')}}">Hacer una Publicación</a>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="{{url('/VerPublicaciones')}}">Ver Todas las publicaciones</a>
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