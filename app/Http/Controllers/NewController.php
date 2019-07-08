<?php

namespace app\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewController extends Controller
{

	public function inicial_Genero(){

		$lista3 = DB::table('genero')->get();

		return view('/novoGenero')->with(['itens' => $lista3]);           	    
    }

    public function novo_Genero(){

	 	$nome =  Input::get('genero');

	 	$lista = DB::table('genero')
	 		->select('nome')
	 		->where('nome',$nome)
	        ->get();

	     if (count($lista) == 0) 
	     {
			DB::table('genero')
			->insert([
				'nome'=>$nome,
				]);
	     } 

		$lista3 = DB::table('genero')->orderBy('idGenero')->get();

		return view('/novoGenero')
		->with([
			'itens' => $lista3,
		]);     
	}


	public function inicial_ItemLista(){
		
		$lista = DB::table('playlist')->get();
		
		$lista2 = DB::table('ListaItem')
		->join('musica as M','ListaItem.musica','=','M.idmusica')
		->select('ListaItem.lista','M.titulo','M.repeticoes')
		->get();

		$lista3 = DB::table('musica')->get();


		return view('/novoListaItem')
		->with([
			'dados' => $lista,
			'collection' => $lista3,
			'itens' => $lista,
			'paramets' => $lista2,
		]);     
		
    }

    public function novo_ItemLista(){


		$mus =  Input::get('musica');
	 	$list =  Input::get('lista');

	 	$consulta = DB::table('ListaItem')
    	->where('lista',$list)
    	->where('musica',$mus)
    	->get();

    	if(count($consulta) ==0 ){

			DB::table('ListaItem')
			->insert(
				[
					'lista'=>$list,
					'musica'=>$mus,
				]
			);

	   	}

    	$lista = DB::table('playlist')->get();
		
		$lista2 = DB::table('ListaItem')
		->join('musica as M','ListaItem.musica','=','M.idmusica')
		->select('ListaItem.lista','M.titulo','M.repeticoes')
		->get();
		
		$lista3 = DB::table('musica')->get();

		return view('/novoListaItem')
		->with([
			'dados' => $lista,
			'collection' => $lista3,
			'itens' => $lista,
			'paramets' => $lista2,
		]);       
	}

	public function inicial_Musica(){
		
		$lista2 = DB::table('genero')->get();

		$lista = DB::table('musica')
		->join('genero','musica.estilo','=','genero.idgenero')
		->select('titulo','ano','repeticoes','nome')
		->get();

		return view('/novoMusica')
		->with([
			'itens' => $lista,
			'collection' => $lista2,
		]);     	
    }

    public function novo_Musica(){


		$var1 =  Input::get('nome');
	 	$var2 =  Input::get('tipo');
		$var3 =  Input::get('ano');
	 	$var4 =  Input::get('vezes');


	 	$consulta = DB::table('musica')
    	->where('titulo',$var1)
    	->get();

    	if(count($consulta) == 0 ){

			DB::table('musica')
			->insert(
				[
					'titulo'=>$var1,
					'estilo'=>$var2,
					'ano'=>$var3,
					'repeticoes'=>$var4,
				]
			);

	   	}

    	$lista2 = DB::table('genero')->get();

		$lista = DB::table('musica')
		->join('genero','musica.estilo','=','genero.idgenero')
		->select('titulo','ano','repeticoes','nome')
		->get();

		return view('/novoMusica')
		->with([
			'itens' => $lista,
			'collection' => $lista2
		]);     
	}

	public function inicial_play(){
		
		$lista3 = DB::table('pessoa')->get();

    	$lista2 = DB::table('genero')->get();

		$lista = DB::table('playlist')->get();

		return view('/novoPlay')
		->with([
			'itens' => $lista,
			'collection' => $lista2,
			'dados' => $lista3,
		]);     

		
    }

    public function novo_play(){


		$nome =  Input::get('nome');
	 	$tipo =  Input::get('tipo');
	 	$desc =  Input::get('texto');
	 	$rept =  Input::get('vezes');
		$quem =  Input::get('quem');
		$dataNova = date("Y-m-d");
	
		


	 	$consulta = DB::table('playlist')
	 	->where('criador',$quem)
    	->where('titulo',$nome)
    	->where('data_criacao',$dataNova)
    	->get();

    	if(count($consulta) == 0 ){

			DB::table('playlist')
			->insert(
				[
					'titulo'=>$nome,
					'data_criacao' => $dataNova,
					'repeticoes'=>$rept,
					'descricao'=> $desc,
					'criador'=>$quem,
					'genero'=>$tipo,
				]
			);

	   	}

		$lista3 = DB::table('pessoa')->get();

    	$lista2 = DB::table('genero')->get();

		$lista = DB::table('playlist')->get();

		return view('/novoPlay')
		->with([
			'itens' => $lista,
			'collection' => $lista2,
			'dados' => $lista3,
		]);     

	}
	
}
