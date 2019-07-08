use FBD;

DROP procedure IF EXISTS `resetRepeticao`;
DROP trigger IF EXISTS `novaMusicaEmPlaylist`;

-- -- Procedimento -- atualiza o numero de repeticoes da lista para 0
DELIMITER $$
USE `FBD`$$
CREATE PROCEDURE `resetRepeticao` (IN id_p int)
BEGIN
	UPDATE playlist SET repeticoes = 0
    WHERE idplaylist = id_p;
END$$

DELIMITER ;


-- --Trigger 
-- Quando uma nova musica é adicionado a uma playlist, reseta-se suas repetições
DELIMITER $$
USE `FBD`$$
 CREATE TRIGGER novaMusicaEmPlaylist AFTER INSERT ON ListaItem
      FOR EACH ROW
      BEGIN
       CALL resetRepeticao(NEW.lista);
      END$$
DELIMITER ;
