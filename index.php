<!DOCTYPE html>
<html>
<head>
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;    
}

.container {
  width: 400px;
  background-color: rgb(191, 232, 255);
  padding: 40px;
  border-radius: 8px;
  position: relative;
}

h1 {
  margin-bottom: 20px;
  font-size: 24px;
  color: rgb(0, 0, 0);
  text-align: top;
}

form {
  width: 70%;
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="text"], input[type="email"], select, textarea, input[type="submit"], button {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"], button {
  background-color: rgb(255, 0, 0);
  color: black;
  border: none;
  cursor: pointer;
}

input[type="submit"]:hover, button:hover {
  background-color: rgb(233, 3, 3);
}

.header {
  position: absolute;
  top: 10px;
  right: 10px;
}

.header a {
  background-color: rgb(0, 123, 255);
  color: white;
  padding: 10px 15px;
  text-decoration: none;
  border-radius: 5px;
  font-size: 14px;
}

.header a:hover {
  background-color: rgb(0, 100, 200);
}
</style>
</head>
<body>

<div class="container">
  <div class="header">
    <a href="ListarUsuarios.php">Lista de usuarios</a>
  </div>

  <h1>Formulario de Registro</h1>

  <?php if (isset($_GET['mensaje'])): ?>
    <p style="color: green;"><?= htmlspecialchars($_GET['mensaje']); ?></p>
  <?php endif; ?>

  <form action="NuevoUsuario.php" method="POST">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="correo">Correo:</label>
      <input type="email" id="correo" name="correo" placeholder="Ejemplo@ejemplo.ss" required>

      <label for="edad">Edad:</label>
      <input type="number" id="edad" name="edad" min="1" required>

      <label for="plan">Tipo de plan:</label>
      <select id="plan" name="plan_base">
          <option value="Básico">Básico</option>
          <option value="Estándar">Estándar</option>
          <option value="Premium">Premium</option>
      </select>

      <label for="paquetes">Paquetes adicionales:</label>
      <div id="paquetes">
          <input type="checkbox" name="paquetes[]" value="Deporte"> Deporte<br>
          <input type="checkbox" name="paquetes[]" value="Cine"> Cine<br>
          <input type="checkbox" name="paquetes[]" value="Infantil"> Infantil<br>
      </div>

      <label for="suscripcion">Duración de la suscripción:</label>
      <select id="suscripcion" name="duracion">
          <option value="Anual">Anual</option>
          <option value="Mensual">Mensual</option>
      </select>

      <input type="submit" value="Registrar">
  </form>

  <form action="ActualizarUsuarios.php" method="GET">
      <label for="id_actualizar">Actualizar usuario:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
      <button type="submit">Actualizar</button>
  </form>

  <form action="EliminarUsuario.php" method="POST">
      <label for="id_eliminar">Eliminar usuario:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre" required>
      <button type="submit">Eliminar</button>
  </form>
</div>

</body>
</html>
