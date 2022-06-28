CREATE OR REPLACE FUNCTION aceptar (
    cod varchar
) RETURNS void AS $$
BEGIN
    UPDATE vuelo
    SET vuelo.estado = 'aceptado'
    WHERE vuelo.codigo = cod;
END;
$$ language plpgsql