## Demo
Reto planteado  https://www.hackerrank.com/challenges/cube-summation.
realizado con php mas exactamente laravel
<br>
<a href="http://cube.johinsdev.com/">Demo cube summation</a>

## Capas de la aplicacion

<h4>Capa del cliente</h4>
Es la capa presente en los navegadores y es que finalmente se presenta al usaurio, consiste basicamente
en js, css y html, aqui se encuentra la parte inrectivca con el usaurio.

Herramientas:
Bootstrap y Jquery para el css y diseño.

<h4>Capa del servidor</h4>
Es la capa del backend es la que se encarga de la conexion a los datos y al procesamiento de
este para el usaurio es menos interactiva que la del cliente, para la informacion radica en esta.

Herramientas:
Php y laravel, cube.php y cubecontroller hay son las capas donde radica la logica


Herramientas:
Bootstrap y Jquery para el css y diseño.

<h4>Capa de persistencia</h4>
Capa que guarda la informacion del cliente procesada a traves del servidor

Herramientas:
Sessions laravel . sesion.php helper con la logica de esta capa.

##Ejemplo

Tests: 2
4 5

UPDATE 2 2 2 4

QUERY 1 1 1 3 3 3

UPDATE 1 1 1 23

QUERY 2 2 2 4 4 4

QUERY 1 1 1 3 3 3

2 4

UPDATE 2 2 2 1

QUERY 1 1 1 1 1 1

QUERY 1 1 1 2 2 2

QUERY 2 2 2 2 2 2

##Tests

phpunit