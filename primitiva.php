<HTML>
<HEAD> <TITLE> Pirmitiva PHP </TITLE>
		<meta charset="utf-8" />
</HEAD>
<BODY>

<?php
$fecha=$_POST["fechasorteo"];
$dinero=$_POST["recaudacion"];
$conbinacion=array();
$boletos1=array();
$conts=array();
$fich1=file("r22_primitiva.txt");
//nombre del fichero 
$p1=strpos($fecha, '/');
$p2=strpos($fecha, '/',$p1+1);
$dia=str_pad(substr($fecha,0,$p1),2,"0",STR_PAD_LEFT);
$mes=str_pad(substr($fecha,$p1+1,($p2-$p1)-1),2,"0",STR_PAD_LEFT);
$año=str_pad(substr($fecha,$p2+1),2,"0",STR_PAD_LEFT);
$fichero="premiosorteo_".$dia.$mes.$año.".txt";

//mostrar la combinacion ganadora
echo "<p color='grey'>Lotería Primitiva de España / Sorteo	".$fecha."</p></br>";

$conbinacion=crearCombinacion();
//$conbinacion=array(17,25,32,14,15,2,32,5);
 for ($h=0; $h<6; $h++){
	echo "<img src='./r22_bolasprimitiva/".$conbinacion[$h].".png'/> ";
}
echo "</br></br> Complementario: ".$conbinacion[6]."</br>";

echo "Reintegro: ".$conbinacion[7]."</br>";

$boletos1=boletos($fich1);

$conts=contadores($boletos1, $conbinacion);

//$contadores=array($cont6, $cont5c, $cont5, $cont4, $cont3, $contR, $cont2, $cont1, $cont0);
echo "Apuestas jugadas: <b>".count($boletos1)."</b></br>";
echo "<ul><li>Acertantes 6 números: <b>".$conts[0]."</b>";
echo "<li>Acertantes 5 números + Complementario: <b>".$conts[1]."</b>";
echo "<li>Acertantes 5 números: <b>".$conts[2]."</b>";
echo "<li>Acertantes 4 números: <b>".$conts[3]."</b>";
echo "<li>Acertantes 3 números: <b>".$conts[4]."</b>";
echo "<li>Acertantes reintegro: <b>".$conts[5]."</b>";
echo "<li>Sin premio 2 números: <b>".$conts[6]."</b>";
echo "<li>Sin premio 1 números: <b>".$conts[7]."</b>";
echo "<li>Sin premio 0 números: <b>".$conts[8]."</b></ul>";

//$porcentajes=array(0.4,0.3,0.15,0.08,0.05,0.02);
$pastaGansa=premios($dinero);

echo "<h2>Premios</h2></br>";
echo "Total del premio recudado: $dinero";
echo "<ul><li>Premio con 6 aciertos: ".$pastaGansa[0]."</b>";
echo "<li>Premio con 5 aciertos + complementario: ".$pastaGansa[1]."</b>";
echo "<li>Premio con 5 aciertos: ".$pastaGansa[2]."</b>";
echo "<li>Premio con 4 aciertos: ".$pastaGansa[3]."</b>";
echo "<li>Premio con 3 aciertos: ".$pastaGansa[4]."</b>";
echo "<li>Premio con el reintegro: ".$pastaGansa[5]."</b></ul>";

crearFichero($fichero, $conts, $pastaGansa);

//Función que nos genera los numeros aleatoreamente del sorteo
function crearCombinacion(){
$array=array();
	for ($i=0; $i<7; $i++){
		$num=rand(1,49);
		while (in_array($num, $array)){
			$num=rand(1,49);
		}
		$array[$i]=$num;
	}
 $numR=rand(0,9);
 
 $array[7]=$numR;
 
return $array;
}

//Función para buscar las lineas de las combinaciones de las primitivas 
function boletos($fich){
$arrayBoleto=array();
$boleto=array();
	for ($i=1; $i<count($fich); $i++){
		//busco los separadores
		$n1=strpos($fich[$i], '-');
		$n2=strpos($fich[$i], '-',$n1+1);
		$n3=strpos($fich[$i], '-',$n2+1);
		$n4=strpos($fich[$i], '-',$n3+1);
		$n5=strpos($fich[$i], '-',$n4+1);
		$n6=strpos($fich[$i], '-',$n5+1);
		$n7=strpos($fich[$i], '-',$n6+1);
		$n8=strpos($fich[$i], '-',$n7+1);
		//saco los datos
		$id=substr($fich[$i], 0, $n1);
		$num1=substr($fich[$i],$n1+1,($n2-$n1)-1);
		$num2=substr($fich[$i],$n2+1,($n3-$n2)-1);
		$num3=substr($fich[$i],$n3+1,($n4-$n3)-1);
		$num4=substr($fich[$i],$n4+1,($n5-$n4)-1);
		$num5=substr($fich[$i],$n5+1,($n6-$n5)-1);
		$num6=substr($fich[$i],$n6+1,($n7-$n6)-1);
		$complementario=substr($fich[$i],$n7+1,($n8-$n7)-1);
		$reintegro=substr($fich[$i],$n8+1);
		//creamos un array multidimensional
		$boleto[0]=$id;
		$boleto[1]=$num1;
		$boleto[2]=$num2;
		$boleto[3]=$num3;
		$boleto[4]=$num4;
		$boleto[5]=$num5;
		$boleto[6]=$num6;
		$boleto[7]=$complementario;
		$boleto[8]=$reintegro;
		
		$arrayBoleto[$i-1]=$boleto;
	}
	return $arrayBoleto;
}

//Función que nos muestre los ganadores
function contadores($boletos1, $conbinacion){

$cont6=0; $cont5=0;	$cont5c=0; $cont4=0;$cont3=0;$cont2=0;$cont1=0;$cont0=0;$contR=0;	

for ($i=0; $i<count($boletos1); $i++){
	$cont=0;
	for ($j=1; $j<7; $j++){
		if ($boletos1[$i][$j]==$conbinacion[$j-1]){
			$cont++;
		}
	}
	switch($cont){
		case 0:
			if($boletos1[$i][8]==$conbinacion[7]){
				$contR++;
				$cont0++;
			}else {
				$cont0++;
			}
			break;
		case 1:
			if($boletos1[$i][8]==$conbinacion[7]){
				$contR++;
				$cont1++;
			}else {
				$cont1++;
			}
			break;
		case 2:
			if($boletos1[$i][8]==$conbinacion[7]){
				$contR++;
				$cont2++;
			}else {
				$cont2++;
			}
			break;
		case 3:
			$cont3++;
			break;
		case 4:
			$cont4++;
			break;
		case 5:
			if ($boletos1[$i][7]==$conbinacion[6]){
				$cont5c++;
			}else{
				$cont5++;
			}
			break;
		case 6:
			$cont6++;
			break;
		
	}
}
$contadores=array($cont6, $cont5c, $cont5, $cont4, $cont3, $contR, $cont2, $cont1, $cont0);
return $contadores;	
}

//Función calcular total premios
function premios($dinero){
	$dinerofinal=$dinero*0.8;
	$porcentajes=array(0.4,0.3,0.15,0.08,0.05,0.02);
	$premios=array();
	for ($i=0;$i<6;$i++){
		$premios[$i]=$dinerofinal*$porcentajes[$i];
	}
	return $premios;
}

//Funcion para crear el fichero donde se guarda el premio premio a recibir cada ganadora
function crearFichero($fichero, $conts, $pastaGansa){
$resultados=array();
for ($i=0;$i<6;$i++){
	if ($conts[$i]==0){
		$resultado[$i]=0;
	}else{
		$resultado[$i]=$pastaGansa[$i]/$conts[$i];
	}
}	
$f1=fopen($fichero, "a+");
fwrite($f1,"C6#$resultado[0]"."\n");
fwrite($f1,"C5+#$resultado[1]"."\n");
fwrite($f1,"C5#$resultado[2]"."\n");
fwrite($f1,"C4#$resultado[3]"."\n");
fwrite($f1,"C3#$resultado[4]"."\n");
fwrite($f1,"CR#$resultado[5]"."\n"."\n");

fclose($f1);
}
?>
</BODY>
</HTML>
