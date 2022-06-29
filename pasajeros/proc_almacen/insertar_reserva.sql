CREATE OR REPLACE FUNCTION insertar_reserva (cliente_id integer, codigo varchar)
RETURNS void AS
$$
BEGIN
    DECLARE id integer;
    id = SELECT MAX(id) FROM reserva;
    id = id + 1;
    INSERT INTO reserva VALUES (id, cliente_id, codigo);
END
$$ language plpgsql