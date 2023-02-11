
CERES - v.0.0.1 - aplha

Ceres fue el nombre escogido para el desarrollo del prototipo entregado para la prueba establecida
por la empresa.

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

2. app/Http/Controllers/OrderController.php
    Métodos:
    - create (crea una orden con una receta seleccionada aleatoriamente), No recibe ningun argumento
    - delete (elimina una orden), args : $order_id NOTA: Elimina la orden y restaura los ingredientes en el inventario. Si la preparación se encontraba como "No preparado", se vuelve a poner disponible para ser seleccionado.

PENDIENTE:

- Alimentar datos desde API  (implementada extension guzzlehttp/guzzle, composer require guzzlehttp/guzzle)
NOTA: La API require credenciales para ser consumidas, es imposible consumirla sin autenticación.

Direccion URL de Prueba: <https://ceres.solosystem.com.co/home>
