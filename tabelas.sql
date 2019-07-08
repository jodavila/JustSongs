DROP SCHEMA FBD;

CREATE DATABASE IF NOT EXISTS FBD;
 
USE FBD;
 
-- PAÍS
CREATE TABLE pais (
	idpais  INT NOT NULL auto_increment,
    siglaPais CHAR(3) NOT NULL,
	nome 	VARCHAR(60) NOT NULL,
    idioma VARCHAR(60) NOT NULL,
	PRIMARY KEY (idpais),
    UNIQUE(siglaPais,nome,idioma)
);

-- PESSOA
CREATE TABLE pessoa (
	idpessoa  INT NOT NULL auto_increment,
    nome VARCHAR(60) NOT NULL unique,
    nacionalidade INT NOT NULL,
	PRIMARY KEY (idpessoa),
    FOREIGN KEY fk_pais_pessoa(nacionalidade)
	REFERENCES pais(idpais)
	ON UPDATE CASCADE
	ON DELETE RESTRICT 
);


-- MUSICO
CREATE TABLE musico (
	idmusico  INT NOT NULL auto_increment,
	pessoa INT NOT NULL,
    nome VARCHAR(60) NOT NULL,
    PRIMARY KEY (idmusico),

    FOREIGN KEY fk_pessoa_musico(pessoa)
    REFERENCES pessoa(idpessoa)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
    unique(pessoa,nome)
);


-- GÊNERO MUSICAL
CREATE TABLE genero (
	idgenero  INT NOT NULL auto_increment,
    nome VARCHAR(60) NOT NULL,
	PRIMARY KEY (idgenero),
   UNIQUE(nome)
);

-- ARTISTA
CREATE TABLE artista (
	idartista  INT NOT NULL auto_increment,
    nome VARCHAR(60) NOT NULL,
    nacionalidade INT NOT NULL,
	PRIMARY KEY (idartista),
    UNIQUE (nome)
);

-- MÚSICA
CREATE TABLE musica (
	idmusica  INT NOT NULL auto_increment,
    titulo VARCHAR(60) NOT NULL,
    estilo INT NOT NULL,
	ano year,
    repeticoes INT NULL,
    UNIQUE(titulo),
    PRIMARY KEY (idmusica),
    FOREIGN KEY fk_genero_musica(estilo)
    REFERENCES genero(idgenero)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

-- Álbum
CREATE TABLE album(
   idalbum INT NOT NULL auto_increment,
   titulo VARCHAR(60) NOT NULL,
    ano year,
    genero INT NOT NULL,
    compositor INT NULL,
    artista INT NULL,
    repeticoes INT NULL,

    PRIMARY KEY (idalbum),
    UNIQUE(artista,titulo,ano),
  
    FOREIGN KEY fk_genero_album(genero)
    REFERENCES genero(idgenero)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    
    FOREIGN KEY fk_musico_album(compositor)
    REFERENCES musico(idmusico)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_artista_album(artista)
    REFERENCES artista(idartista)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

-- Playlist
CREATE TABLE playlist(
  idplaylist  INT NOT NULL auto_increment,
    titulo VARCHAR(60) NOT NULL,
    data_criacao date NULL,
    repeticoes INT NULL,
    descricao text NULL,
    criador INT NOT NULL,
    genero INT NOT NULL,
    
    PRIMARY KEY (idplaylist),
	UNIQUE(criador,titulo,data_criacao),
    FOREIGN KEY fk_genero_playlist(genero)
    REFERENCES genero(idgenero)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_pessoa_playlist(criador)
    REFERENCES pessoa(idpessoa)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

-- SugestaoUSer
CREATE TABLE sugestaoUsuario(
  idsuguser  INT NOT NULL auto_increment,
    pessoa INT NOT NULL,
    musica INT NOT NULL,
    
    PRIMARY KEY (idsuguser),

    FOREIGN KEY fk_pessoa_sugestaoU(pessoa)
    REFERENCES pessoa(idpessoa)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musica_sugestaoU(musica)
    REFERENCES musica(idmusica)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

-- SugestaoLista
CREATE TABLE sugestaoLista(
  idsuglist  INT NOT NULL auto_increment,
    genero INT NOT NULL,
    lista INT NOT NULL,
    
    PRIMARY KEY (idsuglist),

    FOREIGN KEY fk_genero_sugestaoL(genero)
    REFERENCES genero(idgenero)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_lista_sugestaoL(lista)
    REFERENCES playlist(idplaylist)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE sugestaoAlbum(
  idsugal  INT NOT NULL auto_increment,
    genero INT NOT NULL,
    album INT NOT NULL,
    
    PRIMARY KEY (idsugal),

    FOREIGN KEY fk_genero_sugestaoA(genero)
    REFERENCES genero(idgenero)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_album_sugestaoA(album)
    REFERENCES album(idalbum)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE sugestaoGenero(
  idsugal  INT NOT NULL auto_increment,
    genero INT NOT NULL,
    musica INT NOT NULL,
    
    PRIMARY KEY (idsugal),

    FOREIGN KEY fk_genero_sugestaoG(genero)
    REFERENCES genero(idgenero)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musica_sugestaoG(musica)
    REFERENCES musica(idmusica)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE HistoricoMusicaOuvida(
  idhistorico  INT NOT NULL auto_increment,
    pessoa INT NOT NULL,
    musica INT NOT NULL,
    hdata datetime,
    PRIMARY KEY (idhistorico),
    UNIQUE (pessoa,musica,hdata),

    FOREIGN KEY fk_pessoa_historico(pessoa)
    REFERENCES pessoa(idpessoa)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musica_historico(musica)
    REFERENCES musica(idmusica)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE PessoaAlbum(
  idpessoaalbum  INT NOT NULL auto_increment,
    pessoa INT NOT NULL,
    album INT NOT NULL,

     PRIMARY KEY (idpessoaalbum),
     UNIQUE(pessoa,album),

    FOREIGN KEY fk_pessoa_pessoaalbum(pessoa)
    REFERENCES pessoa(idpessoa)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_album_pessoaalbum(album)
    REFERENCES album(idalbum)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE ArtistaAlbum(
  idartistaalbum  INT NOT NULL auto_increment,
    artista INT NOT NULL,
    album INT NOT NULL,

     PRIMARY KEY (idartistaalbum),
     UNIQUE(artista,album),

    FOREIGN KEY fk_artista_artistaalbum(artista)
    REFERENCES artista(idartista)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_album_artistaalbum(album)
    REFERENCES album(idalbum)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE MusicoAlbum(
  idmusicoalbum  INT NOT NULL auto_increment,
    musico INT NOT NULL,
    album INT NOT NULL,

     PRIMARY KEY (idmusicoalbum),
     UNIQUE(musico,album),

    FOREIGN KEY fk_musico_MusicoAlbum(musico)
    REFERENCES musico(idmusico)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_album_MusicoAlbum(album)
    REFERENCES album(idalbum)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE ArtistaMusica(
  idartistamusica  INT NOT NULL auto_increment,
    artista INT NOT NULL,
    musica INT NOT NULL,

     PRIMARY KEY (idartistamusica),
     UNIQUE(artista,musica),

    FOREIGN KEY fk_artista_artistamusica(artista)
    REFERENCES artista(idartista)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musica_artistamusica(musica)
    REFERENCES musica(idmusica)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE MusicoMusica(
  idmusicomusica  INT NOT NULL auto_increment,
    musico INT NOT NULL,
    musica INT NOT NULL,

     PRIMARY KEY (idmusicomusica),
     UNIQUE(musico,musica),

    FOREIGN KEY fk_musico_MusicoMusica(musico)
    REFERENCES musico(idmusico)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musica_MusicoMusica(musica)
    REFERENCES musica(idmusica)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);


CREATE TABLE Membro(
  idmembro  INT NOT NULL auto_increment,
    musico INT NOT NULL,
    artista INT NOT NULL,

     PRIMARY KEY (idmembro),
     UNIQUE(musico,artista),

    FOREIGN KEY fk_artista_membro(musico)
    REFERENCES musico(idmusico)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musico_membro(artista)
    REFERENCES artista(idartista)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);

CREATE TABLE ListaItem(
  idListaItem  INT NOT NULL auto_increment,
    lista INT NOT NULL,
    musica INT NOT NULL,

     PRIMARY KEY (idListaItem),
     UNIQUE(lista,musica),

    FOREIGN KEY fk_playlist_listaItem(lista)
    REFERENCES playlist(idplaylist)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,

    FOREIGN KEY fk_musica_listaItem(musica)
    REFERENCES musica(idmusica)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
);