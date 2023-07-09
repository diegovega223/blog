# Como levantar este proyecto

**Paso1: Clonar el repositorio**
- Clonar el repositorio con el comando git clone.
**Paso2: Instalar composer**
- Dentro del proyecto en la consola escribi composer install.
**Paso3: Crear un base de datos**
- Crear una base de datos y ponerle por ej: blog
**Paso4: Crear el .env**
- Dentro del proyecto en la raíz, ejecutar este comando cp .env.example .env.
- Configurar el archivo .env, poner el nombre de la bd que creaste.
**Paso5: Generar clave de aplicación**
- Simplemetne ejecuta en la consola php artisan key:generate
**Paso6: Ejecutar las migraciones**
- Para crear las tablas ejecuta el siguiente comando : php artisan migrate
**Paso7 (Opcional): Rellanar datos de forma automatica**
- Para esto hay que ejecutar el siguiente comando: php artisan db:seed
- Esto generara usuarios que ya realizaron posts, y ya realizaron cambios en sus posts, por lo que los post tiene historial de cambio.
- Para ver los usuarios que se generaron usar un gestor de bd y ejecutar: select name from users;
- La contraseña sera para todos los usarios: Password123
**Ultimo paso: Inicia el servidor**
- Inica el el servidor ejecutando: php artisan serve
- En la bara del navegador escribe: http://127.0.0.1:8000/home/
- Y listo.

# Letra de Trabajo Obligatorio

**Introducción**
Este trabajo práctico obligatorio oficia como segundo parcial en las asignaturas Programación I y Bases de Datos I.

**Objetivo**
Implementar un sitio de blog simple, con contenido dinámico.

**Requisitos de Programación**
- Los posts deben contener título, cuerpo, autor y fecha y hora de publicación. Esta información tiene que mostrarse al momento de listar los posts.
- Se deben mostrar un máximo de 3 posts a la vez. Al existir más, debe paginarse el sitio.
- Los autores deben poder registrarse automáticamente con un formulario.
- Luego de iniciar sesión, un autor debe tener una opción para editar el post en el mismo lugar donde se visualiza, así como una opción para eliminarlo.
- Debe mostrarse los meses que tienen publicaciones, y al momento de cliqueralos, debe mostrar los posts de ese mes correspondiente.
- El desarrollo debe versionarse con Git, subirse a Github, contemplar arquitectura en capas con el modelo MVC, y aplicar criterios de código limpio.
- Las tablas deben implementarse usando migraciones de Laravel.
- El sitio debe estar desarrollado con PHP 8, Laravel, y usar MySQL como base de datos.

**Requisitos de Base de Datos**
Realizar el MER y pasaje a tablas, acorde al siguiente requerimiento:
Se desea solicitar la base de datos para un blog.
El blog muestra posts, que contienen título, cuerpo, autor y fecha y hora de publicación. Los posts son realizados por autores, los cuales son usuarios que se registran. De los autores tienen simplemente un correo electrónico y un nombre de usuario.
Se desea registrar en la base de datos, para cada post, y además, un historial de cambios para cada publicación, que registra cuando un autor modifica un post.
Por otro lado, también se desea mostrar publicidad con cada post. La publicidad está compuesta por un nombre, una URL y una fecha de expiración. Cada autor decide si su post tendrá publicidad o no.

**Entregas y calificaciones**
- El trabajo debe ser realizado hasta 2 personas.
- La fecha límite de entrega es el Lunes 10/07/2023 a las 19:30 hs.
- Tanto el código fuente, como el MER y pasaje a tablas, se deben entregar mediante el siguiente formulario: [https://forms.gle/W5kDkR7BqUvkmdDNA](https://forms.gle/W5kDkR7BqUvkmdDNA).
- El trabajo otorga una calificación de 60 puntos para ambas asignaturas.

T/RT Gonzalo Martinez
Tecnicatura en Redes y Software Obligatorio Final
