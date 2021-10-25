<?php
$hoy = date("Y-m-d");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cumpleaños</title>
</head>
<body style="text-align: center;background-color: black;color:white;">
<h1>Cumpleaños</h1>
<h2>¿Cuántos dias quedan para tu cumpleaños?:</h2>
<form>
    <input type="date" name="nacimiento" max="<?php echo $hoy ?>">
    <input type="submit" value="Enviar">
    <br><br>
	<a href="hola"><input type="button" name="Inicio" value="Inicio"></a>
</form>
<br>

<?php

if(isset($_GET["nacimiento"]) && $_GET["nacimiento"] != ""){
    $nacimiento = new DateTime($_GET["nacimiento"]);
    $datos = explode("-",$_GET["nacimiento"]);

    $proxCumple = new DateTime(date("Y")."-".$datos[1]."-".$datos[2]);
    $hoyDT = new DateTime($hoy);

    //Si tu cumple se ha pasado este año, sumarle 1 año a tu prox cumple
    if($proxCumple < $hoyDT){
        $proxCumple->add(new DateInterval('P1Y'));
    }
    //Si es tu cumpleaños, hacer un echo
    if($proxCumple == $hoyDT){
        echo "Es tu cumpleaños!!!";
    }
    else{
        $diferencia = $hoyDT->diff($proxCumple);
        echo $diferencia->format("Quedan %m meses y %d días para tu cumple");
        echo "tu cumple caerá en un ".$proxCumple->format("l");
    }

    
    //PROBLEMAS: si mi cumple ha pasado, sumar 1 año a mi prox cumple
}
    

?>
</body>
</html>

