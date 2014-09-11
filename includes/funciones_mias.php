<?php
	
	//LIMPIAR URL FOTO FLEXICONTENT
	function limpiarURLdeFoto($URLinicial){
	if ($URLinicial!=''){
	$posicionDELinicioBusqueda = strpos($URLinicial,":\"",18);
	$posicionDELfinalBusqueda = strpos($URLinicial,".jpg",18);
	$longitudrestada=(($posicionDELfinalBusqueda+2)-$posicionDELinicioBusqueda);
	$limpiado = substr($URLinicial,($posicionDELinicioBusqueda+2),$longitudrestada);
	return $limpiado;}
	}
	
	//RESIZE YOUTUBE VIMEO
	function resizeYoutube($embed){
	$embed = preg_replace('/(width)=("[^"]*")/i', 'width="188"', $embed);
	$embed = preg_replace('/(height)=("[^"]*")/i', 'height="142"', $embed);
	return $embed;
	}
	
	//CHEQUEO NULL
	function chequeoNULL($valorchequeo,$contenidoaImprimir){
	if ($valorchequeo!=''){
	} else {$contenidoaImprimir='';}
	return $contenidoaImprimir;
	}
	
	//FORMATEAR TEXTO UTF8
	function fixEncoding($in_str) 
	{	 
 	$cur_encoding = mb_detect_encoding($in_str) ; 
  	if($cur_encoding == "UTF-8" && mb_check_encoding($in_str,"UTF-8")) 
    return $in_str; 
  	else 
    return utf8_encode($in_str); 
	} // fixEncoding 
	
	//CALCULAR PORCENTAJE
	function porcentaje($valorInicial,$porcentaje){
	settype ($valorInicial,'integer');
	settype ($porcentaje,'integer');
	$procentj = $valorInicial * ($porcentaje / 100);
	$resultado = ($valorInicial-$procentj);
	settype ($resultado,'integer');
	return $resultado;
	}
	
	//FUNCION EXTRAEMOS TODOS LOS DATOS UTILES DE CADA PRODUCTO//
	function extraerTodo($campo,$itemID){
	global $mysqli;
	$sql = "SELECT value FROM jos_flexicontent_fields_item_relations WHERE item_id = $itemID AND field_id = $campo";
	$res = mysqli_query($mysqli, $sql);
	if ($res) {
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		$valor = $newArray['value'];
		//echo "<br>Valor devuelto".$valor ."<br>";
		}
	} else {
	//echo "Consulta Item id = $itemID con FIeld id = $campo<br>";
	//printf("Could not retrieve records EN CONSULTA: %s", mysqli_error($mysqli));
	}//FIN CONSULTA
	return $valor;
	}
	
	//FUNCION EXTRACCION TOTAL DE DATOS FLEXICONTENT FIELD ITEM RELATIONS DE TODA LA TABLA//
	function extraccionTotal($array,$ColumnaID){
	$numeroCampos=count($array[1]);
	$numeroItems=(count($array));
	for ($k=0;$k<$numeroItems;$k++){
	$prodis++;
	for ($e=0;$e<$numeroCampos;$e++){
	$valoris++;
		$valorcete = extraerTodo($array[1][$e],$array[$k][$ColumnaID]);
		if ($valorcete==null) {
		$arrayOut[$k][$e] = $array[$k][$e];}
		else{
		$arrayOut[$k][$e] = $valorcete;
		}
		//echo extraerTodo($array[1][$e],$array[$k][2])."<br>";
	}}
	return $arrayOut;
	//echo "Productos : ".$prodis."  Valoris : ".$valoris;
	}
	
	//FUNCION SUBSTITUIR ID POR TITLE//
	function substituirIDxTitulo($id){
	global $mysqli;
	//$mysqli = mysqli_connect("localhost", "apaapac1_pucci", "guapus", "apaapac1_joomla");
	$sql = "SELECT title FROM jos_content WHERE id = $id";
	$res = mysqli_query($mysqli, $sql);
	if ($res) {
		while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {	
		$titulo = $newArray['title'];
		}
	} else {
		//printf("Could not retrieve records EN CONSULTA 1: %s", mysqli_error($mysqli));
	}return $titulo;}
	
	
	
	//TABLA DE CONTENIDOS
	//GUIA CONTENIDOS//
function tablaContenidos($array){
$numeroItems=count($array);
echo "<br><br><table float='left' border='1' cellspacing='0' cellpadding='0' style='font:Verdana, Arial, Helvetica, sans-serif; font-size:12px;'>";
for ($i=0;$i<($numeroItems);$i++){
echo "<tr><td><strong>".$i."</strong></td><td>".$array[$i][1]."</td><td>".$array[$i][2]."</td><td>".$array[$i][3]."</td><td>".$array[$i][4]."</td><td>".$array[$i][5]."</td><td>".$array[$i][6]."</td><td>".$array[$i][7]."</td><td>".$array[$i][8]."</td><td>".$array[$i][9]."</td><td>".$array[$i][10]."</td><td>".$array[$i][11]."</td><td>".$array[$i][12]."</td><td>".$array[$i][13]."</td><td>".$array[$i][14]."</td><td>".$array[$i][15]."</td><td>".$array[$i][16]."</td><td>".$array[$i][17]."</td><td>".$array[$i][18]."</td><td>".$array[$i][19]."</td><td>".$array[$i][20]."</td></tr>";
}}
	//PRINT NICE
	function print_nice($elem,$max_level=10,$print_nice_stack=array()){ 
    if(is_array($elem) || is_object($elem)){ 
        if(in_array($elem,$print_nice_stack,true)){ 
            echo "<font color=red>RECURSION</font>"; 
            return; 
        } 
        $print_nice_stack[]=&$elem; 
        if($max_level<1){ 
            echo "<font color=red>nivel maximo alcanzado</font>"; 
            return; 
        } 
        $max_level--; 
        echo "<table border=1 cellspacing=0 cellpadding=3 width=100%>"; 
        if(is_array($elem)){ 
            echo '<tr><td colspan=2 style="background-color:#333333;"><strong><font color=white>ARRAY</font></strong></td></tr>'; 
        }else{ 
            echo '<tr><td colspan=2 style="background-color:#333333;"><strong>'; 
            echo '<font color=white>OBJECT Type: '.get_class($elem).'</font></strong></td></tr>'; 
        } 
        $color=0; 
        foreach($elem as $k => $v){ 
            if($max_level%2){ 
                $rgb=($color++%2)?"#888888":"#BBBBBB"; 
            }else{ 
                $rgb=($color++%2)?"#8888BB":"#BBBBFF"; 
            } 
            echo '<tr><td valign="top" style="width:40px;background-color:'.$rgb.';">'; 
            echo '<strong>'.$k."</strong></td><td>"; 
            print_nice($v,$max_level,$print_nice_stack); 
            echo "</td></tr>"; 
        } 
        echo "</table>"; 
        return; 
    } 
    if($elem === null){ 
        echo "<font color=green>NULL</font>"; 
    }elseif($elem === 0){ 
        echo "0"; 
    }elseif($elem === true){ 
        echo "<font color=green>TRUE</font>"; 
    }elseif($elem === false){ 
        echo "<font color=green>FALSE</font>"; 
    }elseif($elem === ""){ 
        echo "<font color=green>EMPTY STRING</font>"; 
    }else{ 
        echo str_replace("\n","<strong><font color=red>*</font></strong><br>\n",$elem); 
    } 
} 
?>
