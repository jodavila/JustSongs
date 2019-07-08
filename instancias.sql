USE FBD;

-- -- PAÍS
INSERT INTO `FBD`.`pais` (`siglaPais`, `nome`, `idioma`) VALUES ('BRA', 'BRASIL', 'PORTUGUES');
INSERT INTO `FBD`.`pais` (`siglaPais`, `nome`, `idioma`) VALUES ('JPN', 'JAPÃO', 'JAPONES');
INSERT INTO `FBD`.`pais` (`siglaPais`, `nome`, `idioma`) VALUES ('KRS', 'COREIA DO SUL', 'COREANO');
INSERT INTO `FBD`.`pais` (`siglaPais`, `nome`, `idioma`) VALUES ('EUA', 'ESTADO UNIDOS', 'INGLES');
INSERT INTO `FBD`.`pais` (`siglaPais`, `nome`, `idioma`) VALUES ('IND', 'INDIA', 'HINDU');

-- -- GÊNERO MUSICAL
INSERT INTO `FBD`.`genero` (`nome`) VALUES ('Gospel');
INSERT INTO `FBD`.`genero` (`nome`) VALUES ('Rock');
INSERT INTO `FBD`.`genero` (`nome`) VALUES ('Pop');
INSERT INTO `FBD`.`genero` (`nome`) VALUES ('Kpop');
INSERT INTO `FBD`.`genero` (`nome`) VALUES ('Classica');
 
-- -- PESSOA
INSERT INTO `FBD`.`pessoa` (`nome`, `nacionalidade`) VALUES ('Aoi', '2');
INSERT INTO `FBD`.`pessoa` (`nome`, `nacionalidade`) VALUES ('Joao Paulo', '1');
INSERT INTO `FBD`.`pessoa` (`nome`, `nacionalidade`) VALUES ('Henry Faith', '4');
INSERT INTO `FBD`.`pessoa` (`nome`, `nacionalidade`) VALUES ('Pedro', '1');
INSERT INTO `FBD`.`pessoa` (`nome`, `nacionalidade`) VALUES ('Kishan', '5');

-- -- MUSICO
INSERT INTO `FBD`.`musico` (`pessoa`, `nome`) VALUES ('2', 'Daniel Ludke');
INSERT INTO `FBD`.`musico` (`pessoa`, `nome`) VALUES ('3', 'Faith');
INSERT INTO `FBD`.`musico` (`pessoa`, `nome`) VALUES ('5', 'Kamakawiwo');
INSERT INTO `FBD`.`musico` (`pessoa`, `nome`) VALUES ('1', 'Moon');
INSERT INTO `FBD`.`musico` (`pessoa`, `nome`) VALUES ('4', 'Rock');

-- -- ARTISTA
INSERT INTO `FBD`.`artista` (`nome`, `nacionalidade`) VALUES ('Adoradores', '1');
INSERT INTO `FBD`.`artista` (`nome`, `nacionalidade`) VALUES ('BTS', '3');
INSERT INTO `FBD`.`artista` (`nome`, `nacionalidade`) VALUES ('Salaam', '5');
INSERT INTO `FBD`.`artista` (`nome`, `nacionalidade`) VALUES ('Bethoven', '2');
INSERT INTO `FBD`.`artista` (`nome`, `nacionalidade`) VALUES ('DestinyChild', '4');

-- -- Álbum
INSERT INTO `FBD`.`album` (`titulo`, `ano`, `genero`, `compositor`, `artista`, `repeticoes`) VALUES ('SeiLa', '2019', '1', '1', '1', '0');
INSERT INTO `FBD`.`album` (`titulo`, `ano`, `genero`, `compositor`, `artista`, `repeticoes`) VALUES ('Talvez', '2019', '3', '1', '4', '0');
INSERT INTO `FBD`.`album` (`titulo`, `ano`, `genero`, `compositor`, `artista`, `repeticoes`) VALUES ('Inspirado', '2019', '1', '5', '1', '0');
INSERT INTO `FBD`.`album` (`titulo`, `ano`, `genero`, `compositor`, `artista`, `repeticoes`) VALUES ('Sora', '2019', '2', '4', '2', '0');
INSERT INTO `FBD`.`album` (`titulo`, `ano`, `genero`, `compositor`, `artista`, `repeticoes`) VALUES ('Re', '2019', '1', '3', '1', '0');

-- -- Musica
INSERT INTO `FBD`.`musica` (`titulo`, `estilo`, `ano`, `repeticoes`) VALUES ('Agua Viva', '1', '2016', '0');
INSERT INTO `FBD`.`musica` (`titulo`, `estilo`, `ano`, `repeticoes`) VALUES ('Niji no sora', '3', '2016', '0');
INSERT INTO `FBD`.`musica` (`titulo`, `estilo`, `ano`, `repeticoes`) VALUES ('Kajra Re', '3', '2016', '0');
INSERT INTO `FBD`.`musica` (`titulo`, `estilo`, `ano`, `repeticoes`) VALUES ('Bohemin Rhapsody', '2', '2016', '0');
INSERT INTO `FBD`.`musica` (`titulo`, `estilo`, `ano`, `repeticoes`) VALUES ('Fur Elise', '5', '1910', '0');

-- -- Playlist
INSERT INTO `FBD`.`playlist` (`titulo`, `data_criacao`, `repeticoes`, `descricao`, `criador`, `genero`) VALUES ('SoBrasil', '2019-3-13', '0', 'Só musicas de cantores brasileiros', '1', '1');
INSERT INTO `FBD`.`playlist` (`titulo`, `data_criacao`, `repeticoes`, `descricao`, `criador`, `genero`) VALUES ('Animadas', '2019-3-13', '0', 'Musicas com ritmo mais rapido', '4', '3');
INSERT INTO `FBD`.`playlist` (`titulo`, `data_criacao`, `repeticoes`, `descricao`, `criador`, `genero`) VALUES ('Estrangeiras', '2019-3-13', '0', 'Musicas Estrangeiras', '2', '5');
INSERT INTO `FBD`.`playlist` (`titulo`, `data_criacao`, `repeticoes`, `descricao`, `criador`, `genero`) VALUES ('Nacionais', '2019-3-13', '0', 'Musicas da minha terra', '2', '2');
INSERT INTO `FBD`.`playlist` (`titulo`, `data_criacao`, `repeticoes`, `descricao`, `criador`, `genero`) VALUES ('Favoritas', '2019-2-19', '0', 'Só musicas de cantores brasileiros', '5', '3');

-- -- ArtistaMusica
INSERT INTO `FBD`.`ArtistaMusica` (`artista`, `musica`) VALUES ('1', '1');
INSERT INTO `FBD`.`ArtistaMusica` (`artista`, `musica`) VALUES ('4', '2');
INSERT INTO `FBD`.`ArtistaMusica` (`artista`, `musica`) VALUES ('5', '4');
INSERT INTO `FBD`.`ArtistaMusica` (`artista`, `musica`) VALUES ('3', '3');
INSERT INTO `FBD`.`ArtistaMusica` (`artista`, `musica`) VALUES ('4', '5');

-- -- Membro
INSERT INTO `FBD`.`Membro` (`musico`, `artista`) VALUES ('1', '1');
INSERT INTO `FBD`.`Membro` (`musico`, `artista`) VALUES ('2', '4');
INSERT INTO `FBD`.`Membro` (`musico`, `artista`) VALUES ('3', '3');
INSERT INTO `FBD`.`Membro` (`musico`, `artista`) VALUES ('4', '2');
INSERT INTO `FBD`.`Membro` (`musico`, `artista`) VALUES ('5', '5');

-- -- ListaItem
INSERT INTO `FBD`.`ListaItem` (`lista`, `musica`) VALUES ('1', '1');
INSERT INTO `FBD`.`ListaItem` (`lista`, `musica`) VALUES ('2', '2');
INSERT INTO `FBD`.`ListaItem` (`lista`, `musica`) VALUES ('2', '3');
INSERT INTO `FBD`.`ListaItem` (`lista`, `musica`) VALUES ('3', '2');
INSERT INTO `FBD`.`ListaItem` (`lista`, `musica`) VALUES ('3', '5');
INSERT INTO `FBD`.`ListaItem` (`lista`, `musica`) VALUES ('3', '1');
-- -- PessoaAlbum
INSERT INTO `FBD`.`PessoaAlbum` (`pessoa`, `album`) VALUES ('5', '5');
INSERT INTO `FBD`.`PessoaAlbum` (`pessoa`, `album`) VALUES ('1', '4');
INSERT INTO `FBD`.`PessoaAlbum` (`pessoa`, `album`) VALUES ('3', '2');
INSERT INTO `FBD`.`PessoaAlbum` (`pessoa`, `album`) VALUES ('3', '3');
INSERT INTO `FBD`.`PessoaAlbum` (`pessoa`, `album`) VALUES ('2', '1');

-- -- ArtistaÁlbum
INSERT INTO `FBD`.`ArtistaAlbum` (`artista`, `album`) VALUES ('1', '3');
INSERT INTO `FBD`.`ArtistaAlbum` (`artista`, `album`) VALUES ('2', '4');
INSERT INTO `FBD`.`ArtistaAlbum` (`artista`, `album`) VALUES ('3', '5');
INSERT INTO `FBD`.`ArtistaAlbum` (`artista`, `album`) VALUES ('4', '1');
INSERT INTO `FBD`.`ArtistaAlbum` (`artista`, `album`) VALUES ('5', '2');

-- -- MusicoMusica
INSERT INTO `FBD`.`MusicoMusica` (`musico`, `musica`) VALUES ('4', '5');