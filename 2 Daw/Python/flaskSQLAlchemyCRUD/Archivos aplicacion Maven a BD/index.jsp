<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<title>Formulario datos</title>
</head>
<body>

   <a href="lisProveedores">Listado de Proveedores</a><br/><br/>

  <form action="Saludos" method="post">
  	Nombre: <input type="text" name="nombre" /><br/>
   	Edad: <input type="numeric" name="edad" /><br/>
   	<input type="submit" value="Enviar" />
  </form>
</body>
</html>