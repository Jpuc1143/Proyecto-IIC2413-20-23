DROP TABLE IF EXISTS Usuarios;

CREATE TABLE Usuarios(
	id serial PRIMARY KEY,
	usuario varchar UNIQUE NOT NULL,
	contrasena varchar NOT NULL, -- En realidad debería ser un has de la contraseña, no la misma en plaintext.
	tipo varchar NOT NULL CHECK(tipo = 'admin' OR tipo = 'compania_aerea' OR tipo = 'pasajero')
)
