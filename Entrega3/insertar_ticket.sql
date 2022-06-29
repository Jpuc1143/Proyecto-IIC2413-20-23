CREATE OR REPLACE FUNCTION insertar_ticket (vuelo integer, persona_id integer, clase varchar, comida_y_maleta boolean)
RETURNS void AS
$$
BEGIN
    DECLARE numero integer, numero_asiento varchar, reserva_id integer;
    numero = SELECT MAX(numero) FROM ticket;
    numero = numero + 1;
    numero_asiento = SELECT MAX(numero_asiento) FROM ticket WHERE vuelo_id = vuelo;
    numero_asiento = numero_asiento + 1;
    reserva_id = SELECT id FROM reserva WHERE cliente_id = persona_id;
    INSERT INTO ticket VALUES (numero, reserva_id, vuelo, persona_id, numero_asiento, clase, comida_y_maleta);
END
$$ language plpgsql