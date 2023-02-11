
CERES - v.0.0.1 - aplha

Ceres fue el nombre escogido para el desarrollo del prototipo entregado para la prueba establecida
por la empresa.

-----
Contexto del proyecto en el archivo Reto Tecnico PHP

Estas son las especificaciones identificadas: Aquí hay un resumen paso a paso de lo que debes hacer para completar el ejercicio:

LA DB debe ser esta; Tabla de ingredientes: esta tabla incluirá los ingredientes disponibles, con su nombre y cantidad actual. Tabla de recetas: esta tabla incluirá las recetas disponibles, con su nombre, los ingredientes que la componen y la cantidad requerida de cada uno. Tabla de órdenes: esta tabla incluirá los platos pedidos por el gerente del restaurante, con su estado (en preparación, preparado, entregado) y el plato seleccionado aleatoriamente por la cocina. Tabla de compras de la plaza de mercado: esta tabla incluirá los ingredientes comprados en la plaza de mercado, con el nombre del ingrediente, fecha de compra y cantidad compradas.

Crear una aplicación de microservicios que incluya una interfaz de usuario, un servicio de cocina, un servicio de bodega de alimentos y un servicio de plaza de mercado.
En la interfaz de usuario, crea un botón que permita al gerente del restaurante pedir un nuevo plato.
En el servicio de cocina, crea una lista de 6 recetas disponibles y un mecanismo para seleccionar aleatoriamente una receta cuando se recibe un pedido de un plato. Primero, debes tener una tabla en tu base de datos para almacenar los platos disponibles. Por ejemplo, podrías tener una tabla llamada "platos" con los siguientes campos: id, nombre y descripción. En el controlador recién creado, agrega una función para obtener todos los platos disponibles desde la base de datos usando la función array_rand de PHP en Laravel para seleccionar un elemento de un arreglo de platos de manera aleatoria. Envia el plato a cola de preparacion
Crea un controlador en Laravel para manejar la selección de platos.

En el servicio de bodega de alimentos, crea una lógica para almacenar una cantidad inicial de 5 unidades por ingrediente y para responder a las solicitudes de ingredientes desde el servicio de cocina. Si no tiene un ingrediente en existencias, debe solicitarlo en la plaza de mercado.
En el servicio de plaza de mercado, crea una API que acepte un parámetro de ingrediente y retorne una cantidad de ingredientes vendidos. Puede haber una posibilidad de que el ingrediente no esté disponible.
En la interfaz de usuario, muestra las órdenes en preparación en la cocina, los ingredientes y sus cantidades disponibles en la bodega de alimentos, el historial de compras en la plaza de mercado y el historial de pedidos realizados a la cocina.
Finalmente, contenedorice los microservicios utilizando Docker para cumplir con los requisitos del gerente de la empresa de mantenerse a la moda.

----

Notas de la version:

1. Se crearon migraciones respectivas a las tablas de la DB
1. Se implementó la creación de ingredientes, recetas y la asignación de ingredientes a recetas.
3. Se implementó la selección aleatoria de recetas y la resta de ingredientes del inventario segun la receta seleccionada.

Archivos de interes
-Asignacion de ingredientes en la receta seleccionada

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

- Crear Dockerfile
- Desplegar en PaaS (Heroku, AWS, etc)
