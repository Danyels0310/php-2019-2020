< h1 > Crear empleados </ h1 >
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
	
    / * Se inicializa la lista de valores * /
	echo  '<form action = "" method = "post">' ;
?>
	< div >
	Dni: < input  type = ' text ' name = ' d ' value = '' size = 15 > </ br > </ br >
	Nombre: < input  type = ' text ' name = ' n ' value = '' size = 15 > </ br > </ br >
	Apellido: < input  type = ' text ' name = ' a ' value = '' size = 15 > </ br > </ br >
	Fecha Nacimiento: < input  type = ' date ' name = ' fn ' value = '' size = 15 > </ br > </ br >
	Salario: < input  type = ' text ' name = ' s ' value = '' size = 15 > </ br > </ br >
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
	crearEmpleado ( $ db );
	$ nombredp = $ _POST [ 'departamento' ];
	crearRelacion ( $ db , $ nombredp );
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
función  crearEmpleado ( $ db ) {
	$ sql = "INSERTAR EN empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES ('" . $ _POST [ ' d ' ]. "', '" . $ _POST [ ' n ' ]. "', '" . $ _POST [ 'a' ]. "','" . $ _POST [ 'fn' ]. "','" . $ _POST [ 's' ]. "')" ;
	mysqli_query ( $ db , $ sql );
	
}
función  crearRelacion ( $ db , $ nombredp ) {
	$ fecha_inc = getdate ();
	$ fecha = $ fecha_inc [ 'año' ]. "-" . $ fecha_inc [ 'mon' ]. "-" . $ fecha_inc [ 'mday' ];
	$ sql = "SELECCIONE cod_dpto DESDE departamento DONDE nombre_dpto = '$ nombredp'" ;
	$ resultado = mysqli_query ( $ db , $ sql );
	if ( $ resultado ) {
		$ fila = mysqli_fetch_assoc ( $ resultado );
		$ sql1 = "INSERTAR EN empleado_dpto (dni, cod_dpto, fecha_inic, fecha_fin) VALORES ('" . $ _POST [ ' d ' ]. "', '" . $ row [ ' cod_dpto ' ]. "', '$ fecha' , '') " ;
		mysqli_query ( $ db , $ sql1 );
	}
}
	




?>