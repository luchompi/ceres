
CERES - v.0.0.1 - aplha
Direccion URL de Prueba: <https://ceres.solosystem.com.co/home>

Ceres fue el nombre escogido para el desarrollo del prototipo entregado para la prueba establecida
por la empresa.

El prototipo fue desarrollado en el framework Laravel 9, utilizando el motor de base de datos MySQL
Fue un reto muy grande en vista de que no tengo experiencia desarrollando con php, y menos con laravel. Además de que fue dificil encontrar una PaaS que permitiera el despliegue de un proyecto con Dockerfile de forma gratuita y con soporte nativo.
El proyecto ha sido desplegado en una VPS privada y tiene un lifetime de 15 días.
Para mayor iformación sobre el proyecto, puede consultar las notas de la versión listadas a continuación.
-----

Notas de la version:

1. Se crearon migraciones respectivas a las tablas de la DB
1. Se implementó la creación de ingredientes, recetas y la asignación de ingredientes a recetas.
3. Se implementó la selección aleatoria de recetas y la resta de ingredientes del inventario segun la receta seleccionada.

Archivos de interes
-Asignacion de ingredientes en la receta seleccionada
￼￼

1. app/Http/Controllers/RecipeController.php
    Métodos:
    - addIngredient, args : $recipe_id
    - removeIngredient, args : $recipe_id, $ingredient_id
    - saveIngredient, args : $recipe_id, $ingredient_id, $quantity
    - show (muestra los datos de la receta con sus respectivos ingredientes), args : $recipe_id

CERES - v.0.0.2 - aplha

- Asignacion de ordenes y restauración de ingredientes en el inventario

2. app/Http/Controllers/OrderController.php
    Métodos:
    - create (crea una orden con una receta seleccionada aleatoriamente), No recibe ningun argumento
    - delete (elimina una orden), args : $order_id NOTA: Elimina la orden y restaura los ingredientes en el inventario. Si la preparación se encontraba como "No preparado", se vuelve a poner disponible para ser seleccionado.

PENDIENTE:

- Alimentar datos desde API  (implementada extension guzzlehttp/guzzle, composer require guzzlehttp/guzzle)
NOTA: La API require credenciales para ser consumidas, es imposible consumirla sin autenticación.
