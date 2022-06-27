CREATE OR REPLACE FUNCTION insertar_reserva (cliente_id integer, persona_id serial, vuelo_id integer)
RETURNS void AS
$$
BEGIN
    INSERT INTO reserva VALUES (cliente_id);
    INSERT INTO ticket VALUES (vuelo_id, persona_id);
END
$$ language plpgsql