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

CREATE PROCEDURE spu_contar_superheroes_por_alineacion()
BEGIN

    SELECT alignment.alignment, COUNT(superhero.id) AS cantidad
    FROM superhero
    INNER JOIN alignment ON superhero.alignment_id = alignment.id
    GROUP BY alignment.alignment;
END $$
CALL spu_contar_superheroes_por_alineacion()
DELIMITER ;




DELIMITER $$

CREATE PROCEDURE spu_alignment_por_publisher(IN publisher_id INT)
BEGIN
    SELECT
        a.alignment,
        COUNT(s.id) AS cantidad
    FROM superhero.superhero s
    INNER JOIN superhero.alignment a ON s.alignment_id = a.id
    WHERE s.publisher_id = publisher_id
    GROUP BY a.alignment;
END $$


DELIMITER ;





DELIMITER $$

CREATE PROCEDURE spu_superheroes_por_publisher(IN publisher_id INT)
BEGIN
    SELECT 
        s.id,
        s.superhero_name AS name,
        s.full_name,
        g.gender,
        r.race
    FROM superhero.superhero s
    INNER JOIN superhero.gender g ON s.gender_id = g.id
    INNER JOIN superhero.race r ON s.race_id = r.id
    WHERE s.publisher_id = publisher_id;
END $$

CALL  spu_superheroes_por_publisher(3)


DELIMITER ;






DELIMITER $$
CREATE PROCEDURE spu_publisher_listar()
BEGIN
    SELECT * FROM superhero.publisher;
END $$
CALL spu_publisher_listar()
















