CREATE OR REPLACE FUNCTION rechazar_vuelo (
    cod varchar
) RETURNS void AS $$
BEGIN
    UPDATE vuelo
    SET estado = 'rechazado'
    WHERE vuelo.codigo = cod;
END;
$$ language plpgsql
