<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Mail\UserSendRecover;
use App\Models\Publication;
use App\Mail\EmergencyCallReceived;
use Validator, Hash, Auth, Mail, Str;


class desafioController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Publicar(){
        $publication = Comment::where('content', 'hola')->where('status', 'aprobado')->get();
        $data = ['publication' => $publication];
        return view ('Publicaciones', $data);
        
    }

    public function postPublicar( Request $request){
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $messages = [
            'title.required' => "El titulo es obligatorio",
            'content.required' => "El contenido es obligatorio"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        else :
            $publication = new Publication;
            $publication->title = e($request->input('title'));
            $publication->content = e($request->input('content'));
            $publication->user_id = Auth::user()->id;
    
            if ($publication->save()) :
                return redirect('/Publicaciones')->with(
                    'message', 'Se ha publicado con exito'
                )->with('typealert', 'success');
            endif;
        endif;

    }

    public function verPublicaciones(){
        $publication = Publication::get();
        $data = ['publication' => $publication];
        return view ('VerPublicaciones', $data);
    }
   public function Visualizar(  $id){
   
    $publication = Publication::findOrFail($id);
    $data = ['publication' => $publication];
    return view ('Visualizar', $data);
   }

   public function Publicar_Comentario($id,Request $request){
    $id_usuario = $request->input('id_usuario');
    $email = $request->input('email');
    $comentarios = Comment::where('publication_id', $id)->where('user_id', $id_usuario)->count();
    if($comentarios == "0"):
     
        $rules = [
            'content' => 'required'
        ];
    
        $messages = [
            'content.required' => "Por favor escriba su contraseña"
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) :
            return back()->withErrors($validator)->with('message', 'Se ha producido un error')->with('typealert', 'danger');
        else :
          
            $Comment = new Comment;
            $Comment->publication_id = ($request->input('publication_id'));
            $Comment->user_id = Auth::user()->id;
            $Comment->content = e($request->input('content'));
            $Comment->status = e($request->input('status'));
            if ($Comment->save()) :
                return back()->with(
                    'message', 'Se ha publicado con exito su comentario'
                )->with('typealert', 'success');
            endif;
        endif;
    else:
        return back()->with('message', 'No puedes comentar nuevamente.')->with('typealert', 'danger');
    endif;

  
    

   }

   public function ObtenerComentario( $id){
    $Comment = Comment::where('publication_id', $id)->get();
    $data = ['Comentarios' => $Comment];
    return view ('Comentarios', $data);
   }
}
