<!DOCTYPE html>
<html>
<head>
	<title>Edad</title>
</head>
<body style="text-align: center;background-color: black;color:white;">
<h1>Edad</h1>
<h2>Introduce tu fecha de nacimiento:</h2>
<form method="POST" action="edad" id="a">
    @csrf
    <input type="date" max= {{$hoy}}  name="nacimientoE">
    <input type="submit" value="Enviar">
    <br><br>
	<a href="hola"><input type="button" name="Inicio" value="Inicio"></a>
</form>
<br>
<h3>{{$output}}</h3>


</body>
</html>