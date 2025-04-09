<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="./src/view/css/login.style.css">
  <title>Login | Registro</title>
</head>
<body>
  <header>
    <h1>e-commerce</h1>
  </header>

  <div class="container">
    <div class="logo">
      <img src="./src/view/img/images.jpg" alt="Logo" />
    </div>

    <div class="form-container">
      <div class="tabs">
        <button type="button" class="tab active" onclick="switchTab('login')">Login</button>
        <button type="button" class="tab" onclick="switchTab('register')">Registro</button>
      </div>

      <div class="form-group active" id="login">
        <form method="POST" action="./index.php?action=login" class="form">
          <input type="email" id="email" name="email" placeholder="Correo" required />
          <input type="password" id="password" name="password" placeholder="Contraseña" required />
          <button type="submit" class="submit-btn">Iniciar Sesión</button>

          <?php if (isset($_GET['error'])): ?>
            <p class="error-msg">Correo o contraseña incorrectos</p>
          <?php endif; ?>
        </form>
      </div>

      <div class="form-group" id="register">
        <form method="POST" action="./index.php?action=register" class="form">
          <input type="text" name="name" placeholder="Nombre" required />
          <input type="email" name="email" placeholder="Correo" required />
          <input type="password" name="password" placeholder="Contraseña" required />
          <input type="password" name="repeat_password" placeholder="Repetir Contraseña" required />
          <button type="submit">Registrar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="./src/view/js/script.js"></script>
</body>
</html>