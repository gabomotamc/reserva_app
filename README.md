
Registro de LOGS

storage > logs > query.log

/* Registro y login */

Crear usuario.
Valida de datos solo como requeridos.


# ===================================== #

DATABASE

(env)

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reserva_app_db
DB_USERNAME=root
DB_PASSWORD=
# ===================================== #

ENTIDADES DE DB

butacas
reservas
usuarios
# ===================================== #

> Butacas (CREATE)

Es una entidad llenada con con un Seeder  ( php artisan db:seed --class=ButacaSeeder  ) 

# ===================================== #

> Reservas (CRUD)

La interfaz trae la información de las butacas para mostrarlas en un formulario.

Hacer reservas:

	- Cambiado el estado de disponibilidad (Libre - Reservada) de las BUTACAS (por su ID).

	- Las RESERVAS tienen estados de (Habilitada - Cancelada)


Ver reservas:

	- El usuario puede ver desde su perfil sus reservas realizadas.

	- Se puede actualizar la reserva (Cancelandola).

	- Solo se puede eliminar una reserva si ya la cancelaste.

# ===================================== #

> Usuario (CREATE - READ)

	- Almacenamos y solo mostramos la información del usuario.

	-Comprobación separada de correo y clave. Para identificar si uno de los datos es correcto o no.

	- Hash de clave al crear la cuenta.

	- Solo datos de requeridos, sin expresiones regulares.





