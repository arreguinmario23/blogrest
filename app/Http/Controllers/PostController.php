<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //Funcion Consultar Post
    public function index(Request $req){
        return Post::all();
    }
    //Funcion de Consultar uno por uno
    public function get($post){
        $result = Post::find($post);
        if($result)
            return $result;
        else
            return response()->json(['status'=>'failed'], 404);
    }
    //Funcion de Crear uno nuevo
    public function create(Request $req){
        $this->validate($req, [
            'id'=>'required', 
            'user'=>'required',
            'topics_id'=>'required']);
        $datos = new Post;
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
    //Modificar Campo
    public function update(Request $req, $post){
        $this->validate($req, [
            'user'=>'filled']);
        $datos = Post::find($post);
        $result = $datos->fill($req->all())->save();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
    public function destroy($post){
        $datos = Post::find($post);
        if(!$datos) return response()->json(['status'=>'failed'], 404);
        $result = $datos->delete();
        if($result)
            return response()->json(['status'=>'success'], 200);
        else
            return response()->json(['status'=>'failed'], 404);
    }
}