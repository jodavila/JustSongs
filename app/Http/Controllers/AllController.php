<?php

namespace app\Http\Controllers;

use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AllController extends Controller
{
    
	 public function inicial_artista(){

	        $lista = DB::table('musica')
	        ->select('titulo', 'nome')
	        ->join('ArtistaMusica','idmusica','=','ArtistaMusica.musica')
	        ->join('artista','ArtistaMusica.artista','=','idartista')
	        ->groupBy('nome','titulo')
	        ->get();

	        return view('/artista')
	        ->with([
	         'itens' => $lista,
	     ]);           	    
	 }
	
	 public function pesq_artista(){ 

	 		$art =  Input::get('artista');
	 		$mus =  Input::get('musica');
	    	
	 		$art = ($art <> '') ? '%'.$art.'%' : '' ;
	 		$mus = ($mus <> '') ? '%'.$mus.'%' : '' ;
	    	
	        $lista = DB::table('musica')
		        ->select('titulo','nome')
		        ->join('ArtistaMusica','idmusica','=','ArtistaMusica.musica')
		        ->join('artista','ArtistaMusica.artista','=','idartista')
		        ->where('nome','like',$art)
		        ->orWhere('titulo','like',$mus)
		        ->groupBy('nome','titulo')
		        ->get();

	
	        return view('/artista')
	        ->with([
	         'itens' => $lista,
	     ]);           	    
	 }

	 public function inicial_album(){

			$lista1 = DB::table('pais')->get();

			$lista2 = DB::table('artista')
			->where('nome','')
			->get();

	        return view('/album')
	        ->with([
	         'itens' => $lista2,
	         'paramts' => $lista1,
	     ]);           	    
	 }
	
	 public function pesq_album(){ 

			$lista1 = DB::table('pais')->get();

	        $pais =   Input::get('onde');

			$lista2 = DB::table('artista')
			->select('artista.nome')
			->join('pais','nacionalidade','=','idpais')
			->where('idpais',$pais)
			->whereIn('idartista',function($subquery){
				$ano =   Input::get('ano');

				$subquery->select('artista')->distinct()
				->from('album')->where('ano',$ano)->get();
				}
			)
			->get();

	        return view('/album')
	        ->with([
	         'itens' => $lista2,
	         'paramts' => $lista1,
	     ]);           	    
	 }

	 public function inicial_genero(){

			$lista1 = DB::table('pais')->get();
			
			$lista3 = DB::table('genero')->get();
			
			$lista2 = DB::table('artista')
			->where('nome','')
			->get();

	        return view('/genero')
	        ->with([
	         'itens' => $lista2,
	         'paramts' => $lista1,
	         'collection' => $lista3,
	     ]);           	    
	 }
	
	 public function pesq_genero(){ 

			$lista1 = DB::table('pais')->get();
			
			$lista3 = DB::table('genero')->get();
			
	        $tipo =   Input::get('tipo');

			$lista2 = DB::table('album')
			->select('album.titulo')
			->join('genero','genero','=','idgenero')
			->where('idgenero',$tipo)
			->whereIn('idalbum',function($subquery){
				$pais =   Input::get('onde');

				$subquery->select('idalbum')->distinct()
				->from('album')
				->join('ArtistaAlbum','idalbum','=','album')
				->join('artista','idartista','=','ArtistaAlbum.artista')
				->join('pais','nacionalidade','=','idpais')
				->where('idpais',$pais)
				->get();
				}
			)
			->get();

	       return view('/genero')
	        ->with([
	         'itens' => $lista2,
	         'paramts' => $lista1,
	         'collection' => $lista3,
	     ]);           	    
	 }

	 public function inicial_play(){

	        $lista = DB::table('artista')
			->where('nome','')
			->get();

			$lista1 = DB::table('playlist')
	        ->get();

	        return view('/play')
	        ->with([
	         'itens' => $lista,
	         'paramts' => $lista1
	     ]);           	    
	 }
	
	 public function pesq_play(){ 

			$lista1 = DB::table('playlist')->get();
					
	        $qual =   Input::get('qual');

			$lista = DB::table('playlist AS p')
			->select('titulo')
			->where('idplaylist','<>',$qual)
			->whereNotExists(function($subquery)
				{
					$pais =   Input::get('onde');
					$qual =   Input::get('qual');
					
					$subquery->select('*')->from('musica')
					->join('ListaItem','idmusica','=','ListaItem.musica')
					->join('playlist','idplaylist','=','ListaItem.lista')
					->where('idplaylist',$qual)
					->whereNotIn('idmusica',function($subquery)
						{
							$pais =   Input::get('onde');
							$qual =   Input::get('qual');

							$subquery->select('idmusica')
							->distinct()->from('musica')
							->join('ListaItem','idmusica','=','ListaItem.musica')
							->join('playlist','idplaylist','=','ListaItem.lista')
							->where('idplaylist','p.idplaylist')
							->get();
						}
					)
					->get();
				}
			)
			->get();

	       return view('/play')
	        ->with([
	         'itens' => $lista,
	         'paramts' => $lista1
	     	]);           	    
	 }

	 public function inicial_musico(){

			$lista1 = DB::table('pais')->get();

	        $lista = DB::table('musico')
	        ->select('musico.nome as stagename','pessoa.nome as razaosocial','pais.nome as pais')
	        ->join('pessoa','idpessoa','=','musico.pessoa')
	        ->join('pais','nacionalidade','=','idpais')
	         ->groupBy('musico.nome','pessoa.nome','pais.nome')
	        ->get();

	        return view('/musico')
	        ->with([
	         'itens' => $lista,
	         'paramts' => $lista1
	     ]);           	    
	 }
	
	 public function pesq_musico() { 


	 		$pais =  Input::get('onde');

			$musico =  Input::get('musico');
	 		$pessoa =  Input::get('pessoa');
	    	
	 		$musico = ($musico <> '') ? '%'.$musico.'%' : '' ;
	 		$pessoa = ($pessoa <> '') ? '%'.$pessoa.'%' : '' ;
	    	
	    	$pais = ($pais <> '') ?  $pais : '' ;

			$lista1 = DB::table('pais')->get();

	        $lista = DB::table('musico')
	        ->select('musico.nome as stagename','pessoa.nome as razaosocial','pais.nome as pais')
	        ->join('pessoa','idpessoa','=','musico.pessoa')
	        ->join('pais','nacionalidade','=','idpais')
	        ->groupBy('musico.nome','pessoa.nome','pais.nome')
	        ->where('idpais',$pais)
			->orWhere('musico.nome','like',$musico)
			->orWhere('pessoa.nome','like',$pessoa)
	        ->get();

	        return view('/musico')
	        ->with([
	         'itens' => $lista,
	         'paramts' => $lista1
	     ]);           	    
	 }

	 public function inicial_musica(){

			$lista1 = DB::table('pais')->get();
			$lista2 = DB::table('genero')->get();

	        $lista = DB::table('ArtistaMusica')
	        ->select('musica.titulo as song','genero.nome as estilo','pais.nome as pais')
	        
	        ->join('musica','idmusica','=','ArtistaMusica.musica')
	        ->join('artista','idartista','=','ArtistaMusica.artista')
	        ->join('genero','idgenero','=','musica.estilo')
	        ->join('pais','idpais','=','artista.nacionalidade')

	         ->groupBy('song','estilo','pais')
	        ->get();

	        return view('/musica')
	        ->with([
	         'itens' => $lista,
	         'paramts' => $lista1,
	         'collection' =>$lista2
	     ]);           	    
	 }
	
	 public function pesq_musica() { 


	 		$tipo =  Input::get('tipo');
	    	$pais =  Input::get('onde');
			$musico =  Input::get('musica');
	 		
	 		$musico = ($musico <> '') ? '%'.$musico.'%' : '' ;
	 		$pais = ($pais <> '') ?  $pais : '' ;
			$tipo = ($tipo <> '') ?  $tipo : '' ;


			$lista1 = DB::table('pais')->get();
			$lista2 = DB::table('genero')->get();


	       	$lista = DB::table('ArtistaMusica')
	        ->select('musica.titulo as song','genero.nome as estilo','pais.nome as pais')
	        
	        ->join('musica','idmusica','=','ArtistaMusica.musica')
	        ->join('artista','idartista','=','ArtistaMusica.artista')
	        ->join('genero','idgenero','=','musica.estilo')
	        ->join('pais','idpais','=','artista.nacionalidade')

         	->groupBy('song','estilo','pais')	
	        
	        ->where('idpais',$pais)
			->orWhere('estilo',$tipo)
			->orWhere('musica.titulo','like',$musico)
	        ->get();

	        return view('/musica')
	        ->with([
	         'itens' => $lista,
	         'paramts' => $lista1,
	         'collection' =>$lista2
	     ]);           	    
	 }
	
	 public function inicial_compor(){

	    	$lista2 = DB::table('genero')->get();

	        $lista = [];

	        return view('/compositor')
	        ->with([
	         'itens' => $lista,
 	         'collection' =>$lista2
	     ]);           	    
	 }
	
	 public function pesq_compor(){ 
	 		
	 		$tipo = Input::get('tipo');

	    	$lista2 = DB::table('genero')->get();

	    	$lista = [];

	    	if ($tipo == 3) {
	    		$lista= DB::table('album AS a')
		        ->join('ArtistaAlbum AS aa','a.idalbum','=','aa.album')
				->join('artista AS ar','ar.idartista','=','aa.artista')
		        ->join('ArtistaMusica AS am','am.artista','=','ar.idartista')
		        ->join('MusicasDeGeneroPop AS mgp','mgp.idMusica','=','am.musica')
		        ->join('musico AS m','m.idmusico','=','a.compositor')
				->select('m.nome as musiconome')->distinct()
				->get();

	    	} else {
		    	$lista = DB::table('album AS a')
		        ->join('ArtistaAlbum AS aa','a.idalbum','=','aa.album')
				->join('artista AS ar','ar.idartista','=','aa.artista')
		        ->join('ArtistaMusica AS am','am.artista','=','ar.idartista')
		        ->join('musico AS m','m.idmusico','=','a.compositor')

		        ->join('musica AS ma','ma.idmusica','=','am.musica')
		        ->join('genero AS g' ,'ma.estilo','=','g.idgenero')
		        
				->select('m.nome as musiconome')->distinct()
				->where('ma.estilo',$tipo)
				->get();
	    	}
	    
	    	//$lista = $temp;

	        return view('/compositor')
	        ->with([
	         'itens' => $lista,
 	         'collection' =>$lista2
	     ]);           	    
           	    
	 }

}
