CREATE OR REPLACE FUNCTION aceptar_vuelo (
    cod varchar
) RETURNS void AS $$
BEGIN
    UPDATE vuelo
    SET estado = 'aceptado'
    WHERE vuelo.codigo = cod;
END;
$$ language plpgsql