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
          <th scope="col"><strong class="centrar">Comentarios</strong></th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($Comentarios as $p)
        <tr>
          <th>{{$p->content}}</th>
        </tr>
        @endforeach
      </tbody>
    </table>
     
     

      <div class="footer mtop16 ">
        <a href="{{url('/Publicaciones')}}">Hacer una Publicación</a>
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