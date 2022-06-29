CREATE OR REPLACE FUNCTION insertar_ticket (reserva_id integer, vuelo integer, persona_id integer, clase varchar, comida_y_maleta boolean)
RETURNS void AS
$$
BEGIN
    DECLARE numero integer, numero_asiento varchar;
    numero = SELECT numero FROM ticket ORDER BY numero DESC;
    numero_asiento = SELECT numero_asiento FROM ticket WHERE vuelo_id = vuelo ORDER BY numero DESC ;
    INSERT INTO ticket VALUES (numero, reserva_id, vuelo, persona_id, numero_asiento, clase, comida_y_maleta);
END
$$ language plpgsql