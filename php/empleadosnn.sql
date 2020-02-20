- Descarga de SQL phpMyAdmin
- versión 3.5.1
- http://www.phpmyadmin.net
-
- Servidor: localhost
- Tiempo de generación: 16-01-2020 a las 12:04:37
- Versión del servidor: 5.5.24-log
- Versión de PHP: 5.4.3

SET SQL_MODE = " NO_AUTO_VALUE_ON_ZERO " ;
SET time_zone =  " +00: 00 " ;


/ * ! 40101 SET @OLD_CHARACTER_SET_CLIENT = @@ CHARACTER_SET_CLIENT * / ;
/ * ! 40101 SET @OLD_CHARACTER_SET_RESULTS = @@ CHARACTER_SET_RESULTS * / ;
/ * ! 40101 SET @OLD_COLLATION_CONNECTION = @@ COLLATION_CONNECTION * / ;
/ * ! 40101 SET NOMBRES utf8 * / ;

-
- Base de datos: `empleadosnn`
-

- ------------------------------------------------ --------

-
- Estructura de tabla para la tabla `departamento`
-

CREAR  TABLA  SI  NO  EXISTE  ` Departamento ` (
  ` Cod_dpto `  varchar ( 4 ) NO  NULL DEFAULT ' ' ,
  ` Nombre_dpto `  varchar ( 40 ) DEFAULT NULL ,
  PRIMARIA  CLAVE ( ` cod_dpto ` )
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-
- Volcado de datos para la tabla `departamento`
-

INSERT  INTO  ` Departamento ` ( ` cod_dpto ` , ` nombre_dpto ` ) VALORES
( ' D004' , ' PENSIONES' ),
( ' D005' , ' GAMMER' );

- ------------------------------------------------ --------

-
- Estructura de tabla para la tabla `empleado`
-

CREAR  TABLA  SI  NO  EXISTE  ` empleado ` (
  ` DNI `  varchar ( 9 ) NO  NULL DEFAULT ' ' ,
  ` Nombre `  varchar ( 40 ) DEFAULT NULL ,
  ` Apellidos `  varchar ( 40 ) DEFAULT NULL ,
  ` Fecha_nac `  fecha DEFAULT NULL ,
  ` Salario ` doble DEFAULT NULL ,
  PRIMARIA  CLAVE ( ` DNI ` )
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-
- Volcado de datos para la tabla `empleado`
-

INSERT  EN  ` empleado ` ( ` DNI ` , ` nombre ` , ` apellidos ` , ` fecha_nac ` , ` salario ` ) VALORES
( ' 51111112N' , ' IZHAR' , ' ARIAS' , ' 2020-01-22' , 10000 ),
( ' 51111113N' , ' IZHAR' , ' ARIAS' , ' 2020-01-22' , 10000 ),
( ' 51111114N' , ' IZHAR' , ' ARIAS' , ' 2020-01-22' , 10000 ),
( ' 51111115N' , ' IZHAR' , ' ARIAS' , ' 2020-01-22' , 10000 ),
( ' 51111116N' , ' IZHAR' , ' ARIAS' , ' 2020-01-14' , 10000 ),
( ' 51111214N' , ' Izhar' , ' Arias' , ' 2004-01-20' , 10000 );

- ------------------------------------------------ --------

-
- Estructura de tabla para la tabla `empleado_dpto`
-

CREAR  TABLA  SI  NO  EXISTE  ` empleado_dpto ` (
  ` DNI `  varchar ( 9 ) NO  NULL DEFAULT ' ' ,
  ` Cod_dpto `  varchar ( 4 ) NO  NULL DEFAULT ' ' ,
  ` Fecha_inic `  datetime  NOT  NULL DEFAULT ' 0000-00-00 00:00:00' ,
  ` Fecha_fin `  fecha y hora DEFAULT NULL ,
  PRIMARIA  CLAVE ( ` DNI ` , ` cod_dpto ` , ` fecha_inic ` ),
  CLAVE  ` fk_departamento ` ( ` cod_dpto ` )
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-
- Volcado de datos para la tabla `empleado_dpto`
-

INSERT  EN  ` empleado_dpto ` ( ` DNI ` , ` cod_dpto ` , ` fecha_inic ` , ` fecha_fin ` ) VALORES
( ' 51111112N' , ' D004' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111112N' , ' D005' , ' 2010-10-10 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111112N' , ' D005' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111113N' , ' D004' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111113N' , ' D005' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111115N' , ' D004' , ' 2020-01-10 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111115N' , ' D005' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111116N' , ' D004' , ' 0000-00-00 00:00:00' , ' 2020-01-13 00:00:00' ),
( ' 51111116N' , ' D004' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111116N' , ' D005' , ' 2020-01-13 00:00:00' , ' 0000-00-00 00:00:00' ),
( ' 51111214N' , ' D004' , ' 2020-01-13 00:00:00' , ' 2020-01-13 00:00:00' ),
( ' 51111214N' , ' D005' , ' 2020-01-13 00:00:00' , ' 2019-01-13 00:00:00' );

-
- Restricciones para tablas volcadas
-

-
- Filtros para la tabla `empleado_dpto`
-
ALTER  TABLE  ` empleado_dpto `
  ADD CONSTRAINT  ` fk_departamento `  clave externa ( ` cod_dpto ` ) Referencias  ` departamento ` ( ` cod_dpto ` ),
  ADD CONSTRAINT  ` fk_empreado `  FOREIGN KEY ( ` DNI ` ) Referencias  ` empleado ` ( ` DNI ` );

/ * ! 40101 SET CHARACTER_SET_CLIENT = @ OLD_CHARACTER_SET_CLIENT * / ;
/ * ! 40101 SET CHARACTER_SET_RESULTS = @ OLD_CHARACTER_SET_RESULTS * / ;
/ * ! 40101 SET COLLATION_CONNECTION = @ OLD_COLLATION_CONNECTION * / ;