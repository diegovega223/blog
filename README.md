# Trabajo Obligatorio
## Programación I y Bases de Datos I

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
