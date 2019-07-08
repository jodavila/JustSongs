use FBD;

--  2a)-- Consultas
-- 2a)a)-- Para cada Artista, seu nome e o nome de suas musicas
SELECT titulo, nome
FROM musica 
JOIN ArtistaMusica on (idmusica = musica) 
JOIN artista on (artista = idartista)
GROUP BY nome,titulo;

-- 2a)b)-- Nome dos artistas(banda/stage name) com nacionalidade 'Brasil' com albuns na data de 2019-6-1
Select artista.nome
FROM artista JOIN pais on (nacionalidade = idpais)
WHERE pais.nome = 'Brasil' and
 idartista IN (Select distinct idartista
          FROM album
          WHERE ano = '2019-6-1');

-- 2a)b)-- Nome dos albuns de genero Rock performados por artistas de nacionalidade 'Coreia do Sul'
Select album.titulo
FROM album JOIN genero on (genero = idgenero)
WHERE genero.nome = 'Rock' and
idalbum IN (Select distinct idalbum
          FROM album JOIN ArtistaAlbum on (idalbum = album) JOIN artista on (idartista = ArtistaAlbum.artista)
            JOIN pais on (nacionalidade = idpais)
          WHERE pais.nome = 'Coreia do Sul');

-- 2a)c)-- Nome das playlists com todas as musicas na Playlist 1 (e talvez outras) [no momento retorna nada, adicionar instancias]
Select titulo
FROM playlist p
WHERE idplaylist <> '1' and
 NOT EXISTS (
 Select *
 FROM musica JOIN ListaItem on (idmusica = ListaItem.musica) JOIN playlist on (idplaylist = ListaItem.lista)
 WHERE idplaylist = '1' and idmusica not in
  (Select distinct idmusica
   FROM musica JOIN ListaItem on (idmusica = ListaItem.musica) JOIN playlist on (idplaylist = ListaItem.lista)
   WHERE idplaylist = p.idplaylist)
   );

-- Nome dos musicos, seus nomes civeis(civis?) e suas nacionalidades
Select musico.nome, pessoa.nome, pais.nome
FROM musico JOIN pessoa on (idpessoa = pessoa) JOIN pais on (nacionalidade = idpais)
GROUP BY musico.nome, pessoa.nome, pais.nome;

-- Nome das musicas, o genero delas e nacionalidade dos artistas que a performam.

Select musica.titulo, genero.nome, pais.nome  FROM ArtistaMusica 
JOIN musica on (idmusica = ArtistaMusica.musica)  JOIN artista on (idartista = ArtistaMusica.artista) 
JOIN genero on (idgenero = musica.estilo)  JOIN pais on (idpais = artista.nacionalidade );

-- 2)b) -- Visoes
-- Visao das musicas de genero Pop
Create view MusicasDeGeneroPop AS
	Select *
	FROM musica JOIN genero on (estilo = idgenero)
	WHERE genero.nome = 'Pop';

--  -- Consultas da visão acima
-- Nome de Playlists que contenham musicas do genero Pop
Select distinct playlist.titulo
FROM playlist JOIN ListaItem on (idplaylist = lista) JOIN MusicasDeGeneroPop on (idmusica = musica);

--  Nome dos compositores de musicas de genero Pop <CONFERIR>
Select distinct m.nome
FROM album a JOIN ArtistaAlbum aa on (a.idalbum = aa.album) JOIN artista ar on (ar.idartista = aa.artista)
JOIN ArtistaMusica am on (am.artista = ar.idartista) JOIN MusicasDeGeneroPop on (idmusica = am.musica)
JOIN musico m on (m.idmusico = a.compositor);