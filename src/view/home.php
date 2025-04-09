<?php
require_once '../controller/home.controller.php';
$services = new HomeController();
$service = $services->services();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/home.css">
  <title>E-commerce</title>
</head>
<body>
  <header>
    <div class="menu-toggle">☰</div>
    <div class="logo">LOGO / nombre</div>
    <div class="user-icon">⚪</div>
  </header>

  <nav>
    <button class="categoria-btn">Categoría 1</button>
    <button class="categoria-btn">Categoría 2</button>
    <button class="categoria-btn">Categoría 3</button>
    <button class="categoria-btn">Categoría 4</button>
    <button class="categoria-btn">Categoría 5</button>
    <button class="categoria-btn">Categoría 6</button>
  </nav>
  <?php foreach($service as $item):?>
  <section class="productos">
  
    <div class="producto">
      <img src="https://via.placeholder.com/150" alt="Producto" />
      <div><h2><?php echo htmlspecialchars($item['titulo']); ?></h2></div>
      <div><p><?php echo htmlspecialchars($item['descripcion']); ?></p></div>
      <button class="btn-adquirir">Adquirir</button>
    </div>
    <!-- Puedes duplicar este bloque para más productos -->

  </section>
  <?php endforeach ?>

  <footer>
    datos y soporte
  </footer>
</body>
</html>
