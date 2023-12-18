USE superhero;

SELECT * FROM alignment; 		 -- bandos
SELECT * FROM attribute; 		 -- Atributos/ Características
SELECT * FROM colour;	 		 -- Lista de colores	
SELECT * FROM comic;   			 -- No se utilizará
SELECT * FROM gender;   		 -- Géneros
SELECT * FROM publisher;		 -- Casa publicación / distribuidor
SELECT * FROM race;				 -- Razas	
SELECT * FROM superhero;         -- Super heroes
SELECT * FROM superpower;		--  Nom se utilizará


DELIMITER $$
CREATE PROCEDURE spu_publishes_listar(IN _idpublisher INT)

BEGIN

	SELECT 
    sup.id,
    sup.superhero_name,
    sup.full_name,
    g.gender,
    r.race
    
    FROM publisher pub
    INNER JOIN superhero sup ON sup.publisher_id = pub.id
    INNER JOIN gender g ON g.id = sup.gender_id
    INNER JOIN race r ON r.id = sup.race_id
    Where pub.id= _idpublisher ;
     
END $$
CALL spu_publishes_listar(2)




DELIMITER $$
CREATE PROCEDURE spu_publishe_listar()

BEGIN

	SELECT 
    publisher_name
    
    FROM publisher;
 
END $$


