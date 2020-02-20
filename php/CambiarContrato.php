< h1 > Empleado cambia departamento </ h1 >
<? php

/ * Conexión BD * /
define ( 'DB_SERVER' , '10 .129.9.210 ' );
define ( 'DB_USERNAME' , 'root' );
define ( 'DB_PASSWORD' , 'rootroot' );
define ( 'DB_DATABASE' , 'empleadosnn' );
$ db = mysqli_connect ( DB_SERVER , DB_USERNAME , DB_PASSWORD , DB_DATABASE );
   
   si (! $ db ) {
		morir ( "Error de conexión:" . mysqli_connect_error ());
	}

/ * Se muestra el formulario la primera vez * /
if (! isset ( $ _POST ) || empty ( $ _POST )) {

	/ * Función que obtiene los departamentos de la empresa * /
	$ departamentos = obtenerDepartamentos ( $ db );
	$ empleados = obtenerDni ( $ db );
	
    / * Se inicializa la lista de valores * /
	echo  '<form action = "" method = "post">' ;
?>
	< div >
	< label  for = " dni " > Empleados: </ label >
	< select  name = " dni " >
		<? php  foreach ( $ empleados  como  $ empleado ): ?>
			< opción >  <? php  echo  $ empleado  ?>  </ opción >
		<? php  endforeach ; ?>
	</ select >
	< label  for = " departamento " > Departamentos: </ label >
	< select  name = " departamento " >
		<? php  foreach ( $ departamentos  como  $ departamento ): ?>
			< opción >  <? php  echo  $ departamento  ?>  </ opción >
		<? php  endforeach ; ?>
	</ select >
	</ div >
	</ BR >
<? php
	echo  '<div> <input type = "submit" value = "Mostrar Empleados"> </div>
	</form> ' ;
} más {
	$ dni = $ _POST [ 'dni' ];
	$ dp = $ _POST [ 'departamento' ];
	cambiarContrato ( $ db , $ dni );
	contratoNuevo ( $ db , $ dp );
}
?>

<? php
// Funciones utilizadas en el programa

// Obtengo todos los departamentos para mostrarlos en la lista de valores
función  obtenerDepartamentos ( $ db ) {
	$ departamentos = array ();
	
	$ sql = "SELECCIONAR cod_dpto, nombre_dpto DE departamento" ;
	
	$ resultado = mysqli_query ( $ db , $ sql );
	if ( $ resultado ) {
		while ( $ row = mysqli_fetch_assoc ( $ resultado )) {
			$ departamentos [] = $ fila [ 'nombre_dpto' ];
		}
	}
	devolver  $ departamentos ;
}
función  obtenerDni ( $ db ) {
	$ empleados = array ();
	
	$ sql = "SELECCIONAR dni DE empleado" ;
	
	$ resultado = mysqli_query ( $ db , $ sql );
	if ( $ resultado ) {
		while ( $ row = mysqli_fetch_assoc ( $ resultado )) {
			$ empleados [] = $ fila [ 'dni' ];
		}
	}
	devolver  $ empleados ;
}
función  cambiarContrato ( $ db , $ dni ) {
	$ fecha = gmdate ( 'Ym-d' );
	$ sql = "SELECCIONE cod_dpto de empleado_dpto donde dni = $ dni y fecha_fin = '0000-00-00 00:00:00'" ;
	$ resultado = mysqli_query ( $ db , $ sql );
	if ( $ resultado ) {
		$ fila = mysqli_fetch_assoc ( $ resultado );
		$ sql1 = "ACTUALIZAR empleado_dpto SET fecha_fin = '$ fecha' WHERE dni = '$ dni' y cod_dpto = '" . $ fila [ 'cod_dpto' ]. "'" ;
		mysqli_query ( $ db , $ sql1 );
	}
}
función  contratoNuevo ( $ db , $ dp ) {
$ fecha_inc = getdate ();
	$ fecha = $ fecha_inc [ 'año' ]. "-" . $ fecha_inc [ 'mon' ]. "-" . $ fecha_inc [ 'mday' ];
	$ sql = "SELECCIONE cod_dpto DESDE departamento DONDE nombre_dpto = '$ dp'" ;
	$ resultado = mysqli_query ( $ db , $ sql );
	if ( $ resultado ) {
		$ fila = mysqli_fetch_assoc ( $ resultado );
		$ sql1 = "INSERTAR EN empleado_dpto (dni, cod_dpto, fecha_inic, fecha_fin) VALORES ('" . $ _POST [ ' dni ' ]. "', '" . $ row [ ' cod_dpto ' ]. "', '$ fecha' , '') " ;
		mysqli_query ( $ db , $ sql1 );
	}
}

	