# Ejercicios UD 3

Este repositorio contiene los ejercicios para la UD3 de la asignatura Acceso a Datos, con integración de Docker para Laravel y MariaDB.

# Respuestas Ejercicios

4.-
1. ¿Qué crees que hace el método create de la clase Schema?
    Define la estructura de una tabla en la base de datos.
2. ¿Qué crees que hace $table->string('email')->primary();?
    Crea una columna de texto llamada email y la establece como clave primaria.
3. ¿Cuántas tablas hay definidas?
     Generalmente, las tablas por defecto son users, cache, y jobs.  

5.- ¿Cuántas tablas aparecen?
    Aparecen 9 tablas.

    MariaDB [test1]> SHOW TABLES;
        +-----------------------+
        | Tables_in_test1       |
        +-----------------------+
        | cache                 |
        | cache_locks           |
        | failed_jobs           |
        | job_batches           |
        | jobs                  |
        | migrations            |
        | password_reset_tokens |
        | sessions              |
        | users                 |
        +-----------------------+
        9 rows in set (0.003 sec)

6.- Indica qué realiza los siguientes comandos:
    php artisan migrate: Aplica las migraciones pendientes.
    php artisan migrate:status: Muestra el estado de las migraciones.
    php artisan migrate:rollback: Revierte las últimas migraciones aplicadas.
    php artisan migrate:reset: Revierte todas las migraciones.
    php artisan migrate:refresh: Revierte y vuelve a aplicar todas las migraciones.
    php artisan make:migration: Crea un nuevo archivo de migración.
    php artisan migrate --seed: Aplica las migraciones y ejecuta los seeders.

8.- ¿Qué pasos debemos dar si queremos añadir el campo $table->string('apellido');a    
    la tabla alumnos del ejercicio anterior?
    1- Creamos una nueva migracion
        php artisan make:migration add_apellido_to_alumnos
    2- En el método up() añadimos:
                Schema::table('alumnos', function (Blueprint $table) {
            $table->string('apellido');
        });
    3- En el método down() añadimos:
                Schema::table('alumnos', function (Blueprint $table) {
            $table->dropColumn('apellido');
        });
    4- Aplicamos la migración:
        php artisan migrate

9.- Muestra el contenido de la tabla alumnos y comprueba que se han creado correctamente.

    MariaDB [test2]> SELECT * FROM alumnos;
    +----+------------------+----------------------------+---------------------+---------------------+
    | id | nombre           | email                      | created_at          | updated_at          |
    +----+------------------+----------------------------+---------------------+---------------------+
    |  1 | Juan Pérez       | juan.perez@example.com     | 2025-01-05 10:47:40 | 2025-01-05 10:47:40 |
    |  2 | María González   | maria.gonzalez@example.com | 2025-01-05 10:47:40 | 2025-01-05 10:47:40 |
    |  3 | Carlos López     | carlos.lopez@example.com   | 2025-01-05 10:47:40 | 2025-01-05 10:47:40 |
    +----+------------------+----------------------------+---------------------+---------------------+

10.- Crea una base de datos llamada gestion_notas e implementa las tablas mediante migraciones de Laravel.    
Añade algunos datos de prueba mediante Seeder.

        MariaDB [gestion_notas]> select * from alumnos;
    +----+------------------+----------------------------+---------------------+---------------------+
    | id | nombre           | email                      | created_at          | updated_at          |
    +----+------------------+----------------------------+---------------------+---------------------+
    |  1 | Juan Pérez       | juan.perez@example.com     | 2025-01-05 15:50:29 | 2025-01-05 15:50:29 |
    |  2 | María González   | maria.gonzalez@example.com | 2025-01-05 15:50:29 | 2025-01-05 15:50:29 |
    |  3 | Carlos López     | carlos.lopez@example.com   | 2025-01-05 15:50:29 | 2025-01-05 15:50:29 |
    +----+------------------+----------------------------+---------------------+---------------------+
    3 rows in set (0.001 sec)

        MariaDB [gestion_notas]> select * from notas;
    +----+-----------+---------------+------+------------+------------+
    | id | alumno_id | asignatura_id | nota | created_at | updated_at |
    +----+-----------+---------------+------+------------+------------+
    |  1 |         1 |             1 |  8.5 | NULL       | NULL       |
    |  2 |         2 |             2 |  7.3 | NULL       | NULL       |
    |  3 |         3 |             3 |    9 | NULL       | NULL       |
    +----+-----------+---------------+------+------------+------------+
    3 rows in set (0.000 sec)

        MariaDB [gestion_notas]> select * from asignaturas;
    +----+--------------+-------------------------------+
    | id | nombre       | descripcion                   |
    +----+--------------+-------------------------------+
    |  1 | Matemáticas  | Curso básico de matemáticas   |
    |  2 | Historia     | Historia mundial              |
    |  3 | Ingles       | Lengua extranjera             |
    +----+--------------+-------------------------------+
    3 rows in set (0.001 sec)