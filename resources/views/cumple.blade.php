<!DOCTYPE html>
<html>
<head>
	<title>Cumpleaños</title>
</head>
<body style="text-align: center;background-color: black;color:white;">
<h1>Cumpleaños</h1>
<h2>¿Cuántos dias quedan para tu cumpleaños?:</h2>
<form method="POST" action="cumple" id="a">
    @csrf
    <input type="date" name="nacimientoC" max={{$hoy}}>
    <input type="submit" value="Enviar">
    <br><br>
	<a href="hola"><input type="button" name="Inicio" value="Inicio"></a>
</form>
<br>
<h2>{{$output1}}</h2>
<h2>{{$output2}}</h2>

</body>
</html>

