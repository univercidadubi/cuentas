# Instalacion del sistema
## Contenido
Pasos para la instalacion
* Base de datos
* Configurar conexiones
* Desplegar

## Base de datos
Ejecutar es cuentas (1).sql en la base de datos seleccionada.

## Configurar conexiones
Editar el archivo utils/conexion.php
```php
...
    protected $manejador = "mysql"; //defina el tipo de conector
    private static $servidor = "localhost"; //Cambie localhost por  la direccion del servidor de su base de datos
    private static $usuario = "root";// Cambie root por el usuario de su base de datos
    private static $pass = "123"; //cambie 123 por la contrasenia de su base de datos
    protected $db_name = "bd"; //cambie bd por el nombre de la base de datos
...

```

## Desplegar
Los servicios se encuentran en la direccion http://servidor/cuentas/