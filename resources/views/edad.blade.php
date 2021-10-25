<?php
$hoy = date('Y-m-d');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edad</title>
</head>
<body style="text-align: center;background-color: black;color:white;">
<h1>Edad</h1>
<h2>Introduce tu fecha de nacimiento:</h2>
<form>
    <input type="date" max="<?php echo $hoy; ?>" name="nacimiento">
    <input type="submit" value="Enviar">
    <br><br>
	<a href="hola"><input type="button" name="Inicio" value="Inicio"></a>
</form>
<br>

<?php
    if(isset($_GET["nacimiento"]) && $_GET["nacimiento"] != ""){

            $nacimiento = new DateTime($_GET["nacimiento"]);
            $actual = new DateTime('today');

            $diferencia = $nacimiento->diff($actual);
            $output = $diferencia->format("Tienes %y años, %m meses y %d días");

            print($output);
    }
?>

</body>
</html>

