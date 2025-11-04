<?php
require_once "admin/config.inc.php";

$sql = "SELECT * FROM paginas ORDER BY id ASC";
$resultado = mysqli_query($conexao, $sql);
$total = mysqli_num_rows($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Roboto', sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }

    #newsCarousel {
      max-width: 1200px;
      margin: 40px auto;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .carousel-item img {
      width: 100%;
      height: 500px;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .carousel-item img:hover {
      transform: scale(1.05);
    }

    .carousel-caption-link {
      display: block;
      position: absolute;
      bottom: 40px;
      left: 50px;
      width: 1150px;
      text-decoration: none;
      color: inherit;
      z-index: 10;
    }

    .carousel-caption-link:hover .btn {
      background-color: #f8f9fa;
    }

    .carousel-caption {
      background: rgba(0,0,0,0.5);
      padding: 20px;
      border-radius: 8px;
      bottom: 20px;
      left: 20px;
      right: 20px;
      max-width: 90%;
    }

    .carousel-caption h3 {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
      color: #fff;
    }

    .carousel-caption p {
      font-size: 1rem;
      margin-bottom: 10px;
      color: #eee;
    }

    .carousel-caption .btn {
      font-weight: 600;
      border-radius: 4px;
    }

    .carousel-indicators [data-bs-target] {
      background-color: #fff;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      opacity: 0.8;
    }

    .carousel-indicators .active {
      background-color: #dc3545;
      opacity: 1;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: rgba(0,0,0,0.5);
      border-radius: 50%;
      padding: 15px;
    }

    .container.mt-4 {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .container h3 {
      font-family: 'Merriweather', serif;
      font-weight: 700;
      color: #222;
      border-left: 4px solid #dc3545;
      padding-left: 10px;
      margin-bottom: 10px;
    }

    .container p {
      font-size: 1rem;
      color: #555;
    }

    @media (max-width: 768px) {
      .carousel-caption {
        bottom: 10px;
        left: 10px;
        right: 10px;
        padding: 15px;
      }

      .carousel-caption h3 {
        font-size: 1.4rem;
      }

      .carousel-caption p {
        font-size: 0.9rem;
      }

      .carousel-item img {
        height: 300px;
      }
    }
  </style>
</head>

<body>

<?php if($total > 0): ?>
  <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
    
    <div class="carousel-indicators">
      <?php for($j = 0; $j < $total; $j++): ?>
        <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="<?= $j ?>" class="<?= $j === 0 ? 'active' : '' ?>"></button>
      <?php endfor; ?>
    </div>

    <div class="carousel-inner">
      <?php $i = 0; ?>
      <?php while($row = mysqli_fetch_assoc($resultado)): ?>
        <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
          <img src="<?= htmlspecialchars($row['imagem']) ?>" class="d-block w-100" alt="<?= htmlspecialchars($row['produto']) ?>">
          <a href="?pg=produtos&id=<?= $row['id'] ?>" class="carousel-caption-link" onclick="event.stopPropagation();">
            <div class="carousel-caption text-start">
              <h3><?= htmlspecialchars($row['produto']) ?></h3>
              <p>R$<?= htmlspecialchars($row['preco']) ?></p>
              <span class="btn btn-light btn-sm">Comprar agora</span>
            </div>
          </a>
        </div>
        <?php $i++; ?>
      <?php endwhile; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>

  </div>
<?php else: ?>
  <p class="text-center mt-5">Nenhuma página criada.</p>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
