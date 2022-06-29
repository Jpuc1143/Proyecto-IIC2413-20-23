CREATE OR REPLACE FUNCTION insertar_reserva (id integer, cliente_id integer, codigo varchar)
RETURNS void AS
$$
BEGIN
    INSERT INTO reserva VALUES (id, cliente_id, codigo);
END
$$ language plpgsql