# Proyecto Base PHP

## Configuraciones iniciales
- Configuración de Base de datos: /config/DB.php
```
$mysqli = new mysqli(   'host',
                        'usuario',
                        'password',
                        'BD');
```

- Configuración de token: /config/config.php

```
$conf_key = "PediTuCarta2020";
$conf_algorithm = "HS512";
$conf_serverName = "http://control.peditucarta.com";
```

- Pagina de inicio para fallo de token: /middleware/JWT.php
```
public static $index = "../views/login.php";
```

 
