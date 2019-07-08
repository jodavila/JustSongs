<?php


Route::get('/', function () { return view('welcome'); });

// só cadastra

// consulta algo

	Route::get('/Artista', 'AllController@inicial_artista');
	Route::POST('/Artista',  'AllController@pesq_artista');

	/*
	por nome do artista e por nome da musica
	default traz todos                    
	*/

	Route::get('/Album', 'AllController@inicial_album');
	Route::POST('/Album',  'AllController@pesq_album');
	/* 
	colocar por pais do cara e ano do album 
	default traz nenhum
	*/

	Route::get('/Genero', 'AllController@inicial_genero');
	Route::POST('/Genero',  'AllController@pesq_genero');
	/* 
	colocar por genero do album e pais do artista
	default traz nenhum
	se genero pop usar a visão
	*/

	Route::get('/play', 'AllController@inicial_play');
	Route::POST('/play',  'AllController@pesq_play');
	/* 
	buscar playlists - retornas suas musicas
	default traz nenhum
	*/

	Route::get('/Musico', 'AllController@inicial_musico');
	Route::POST('/Musico',  'AllController@pesq_musico');
	/* 
	buscar nome de musico ou da pessoa  - algumas infos
	default traz todo mundo
	*/

	Route::get('/Musica', 'AllController@inicial_musica');
	Route::POST('/Musica',  'AllController@pesq_musica');
	/* 
	buscar nome de musica, genero ou nacionalidade - algumas infos
	default traz todas
	*/

	Route::get('/Compositor', 'AllController@inicial_compor');
	Route::POST('/Compositor',  'AllController@pesq_compor');
	/* 
	buscar genero - retorna nome de compositores 
	default traz nenhum
	se genero pop usar consulta da visão
	*/

	Route::get('/novoGenero', 'NewController@inicial_Genero');
	Route::POST('/novoGenero',  'NewController@novo_Genero');

	Route::get('/novoListaItem', 'NewController@inicial_ItemLista');
	Route::POST('/novoListaItem',  'NewController@novo_ItemLista');


	Route::get('/novoMusica', 'NewController@inicial_Musica');
	Route::POST('/novoMusica',  'NewController@novo_Musica');


	Route::get('/novoplay', 'NewController@inicial_play');
	Route::POST('/novoplay',  'NewController@novo_play');

