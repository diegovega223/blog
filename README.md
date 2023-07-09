# Como levantar este proyecto

**Paso 1: Clonar el repositorio**
- Clonar el repositorio con el comando `git clone`.

**Paso 2: Instalar composer**
- Dentro del proyecto en la consola, ejecuta `composer install`.

**Paso 3: Crear una base de datos**
- Crea una base de datos y asígnale un nombre, por ejemplo, "blog".

**Paso 4: Crear el archivo .env**
- En la raíz del proyecto, ejecuta el siguiente comando: `cp .env.example .env`.
- Configura el archivo `.env` y proporciona el nombre de la base de datos que creaste.

**Paso 5: Generar la clave de aplicación**
- Ejecuta en la consola: `php artisan key:generate`.

**Paso 6: Ejecutar las migraciones**
- Para crear las tablas en la base de datos, ejecuta: `php artisan migrate`.

**Paso 7 (Opcional): Rellenar datos de forma automática**
- Si deseas generar datos de ejemplo, ejecuta: `php artisan db:seed`.
- Esto creará usuarios que ya han realizado publicaciones y han realizado cambios en sus publicaciones, por lo que las publicaciones tendrán un historial de cambios.
- Para ver los usuarios que se generaron, puedes usar un gestor de base de datos y ejecutar: `SELECT name FROM users;`
- La contraseña para todos los usuarios generados es: "Password123".

**Último paso: Iniciar el servidor**
- Inicia el servidor ejecutando: `php artisan serve`.
- En la barra de direcciones del navegador, ingresa: `http://127.0.0.1:8000/home/`.
- ¡Listo!

# Letra de Trabajo Obligatorio

**Introducción**
Este trabajo práctico obligatorio funciona como el segundo parcial en las asignaturas Programación I y Bases de Datos I.

**Objetivo**
Implementar un sitio de blog simple con contenido dinámico.

**Requisitos de Programación**
- Los posts deben contener título, cuerpo, autor y fecha y hora de publicación. Esta información debe mostrarse al listar los posts.
- Se deben mostrar un máximo de 3 posts a la vez. Si hay más posts, se deben paginar.
- Los autores deben poder registrarse automáticamente mediante un formulario.
- Después de iniciar sesión, los autores deben tener la opción de editar y eliminar sus posts.
- Debe mostrarse una lista de meses que tienen publicaciones, y al hacer clic en un mes, se deben mostrar los posts correspondientes a ese mes.
- El desarrollo debe utilizar Git para el control de versiones, subirse a GitHub, seguir una arquitectura MVC y aplicar buenas prácticas de código limpio.
- Las tablas deben implementarse utilizando migraciones de Laravel.
- El sitio debe desarrollarse con PHP 8, Laravel y MySQL como base de datos.

**Requisitos de la Base de Datos**
Realiza el Modelo Entidad-Relación (MER) y su correspondiente pasaje a tablas, según el siguiente requerimiento:
Se solicita una base de datos para un blog.
El blog muestra posts que contienen título, cuerpo, autor y fecha y hora de publicación. Los posts son realizados por autores, quienes son usuarios registrados. Los autores tienen un correo electrónico y un nombre de usuario.
Se desea registrar en la base de datos, para cada post, un historial de cambios que registra las modificaciones realizadas por los autores en cada post.
Además, se desea mostrar publicidad junto a cada post. La publicidad está compuesta por un nombre, una URL y una fecha de expiración. Cada autor decide si su post tendrá publicidad o no.

**Entregas y Calificaciones**
- El trabajo debe ser realizado por equipos de hasta 2 personas.
- La fecha límite de entrega es el Lunes 10/07/2023 a las 19:30 hs.
- Tanto el código fuente como el MER y el pasaje a tablas deben ser entregados mediante el siguiente formulario: [https://forms.gle/W5kDkR7BqUvkmdDNA](https://forms.gle/W5kDkR7BqUvkmdDNA).
- El trabajo tiene una calificación total de 60 puntos para ambas asignaturas.

T/RT Gonzalo Martinez
Tecnicatura en Redes y Software Obligatorio Final
