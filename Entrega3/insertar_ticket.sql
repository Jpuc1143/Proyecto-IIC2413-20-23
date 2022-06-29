CREATE OR REPLACE FUNCTION insertar_ticket (numero integer, reserva_id integer, vuelo_id integer, persona_id integer, numero_asiento varchar, clase varchar, comida_y_maleta boolean)
RETURNS void AS
$$
BEGIN
    INSERT INTO ticket VALUES (numero, reserva_id, vuelo_id, persona_id, numero_asiento, clase, comida_y_maleta);
END
$$ language plpgsql