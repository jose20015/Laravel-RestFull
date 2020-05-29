<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
    
    public function get()
    {
    	return response()->json(Post::get());
    }

    public function getId($id)
    {
    	//validando 
    	if( !empty($id) && is_numeric($id) ){

    		$post = Post::find($id);

    		if( empty($post) ){
    			return response()->json("verifica seu valor");
    		}
    		else{
    			return response()->json($post);
    		}
    	}
    	else{
    		return response()->json("informe valor válido");
    	}
    }

    public function postSave(Request $req)
    {
    	$p = Post::create($req->all());
    	return response()->json($p, 201);
    }

    public function postPut(Request $request, $id)
    {

    	if(!empty($id) && is_numeric($id)){
    	
    		$post = Post::find($id);

    		if( empty($post) ){
    			return response()->json("verifica seu valor");
    		}
    		else{
    			//return response()->json("valor válido");
    			$validateData = $request->validate([
    				'title' => 'required',
    				'description' = 'required',
    			]);
    			Post::whereId($id)->update($validateData);
    		}
    	}
    	else{

    		return response()->json("informe um válor valido");
    	}
    }

    public function postDelete($id)
    {
    	if(!empty($id) && is_numeric($id))
    	{
    		$post = Post::find($id);
    		$post->delete();
    		if( empty($post))
    		{
    			return response()->json("verifica seu valor");
    		}
    		//return response()->json("delete sucess !");	
    	}
    	return response()->json("error delete", 201);
    }
}
