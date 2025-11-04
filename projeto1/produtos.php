<?php
require_once "admin/config.inc.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM paginas WHERE id = $id";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
    } else {
        echo "<p>Produto não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID inválido.</p>";
    exit;
}
?>

<?php include_once "menu.php"; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($row['produto']) ?> | Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Roboto', sans-serif;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .container.mt-4 {
      max-width: 1200px;
      margin: 40px auto;
      padding: 0 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.15);
    }

    h1 {
      font-family: 'Merriweather', serif;
      font-weight: 700;
      color: #222;
      border-left: 5px solid #dc3545;
      padding-left: 15px;
      margin-top: 30px;
      margin-bottom: 20px;
    }

    p em {
      color: #666;
      font-size: 1.05rem;
      display: block;
      margin-bottom: 20px;
    }

    img {
      width: 100%;
      max-height: 500px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 30px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    img:hover {
      transform: scale(1.02);
    }

    .content {
      font-size: 1.05rem;
      line-height: 1.8;
      color: #444;
      margin-bottom: 40px;
    }

    .btn-secondary {
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 5px;
      background-color: #6c757d;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
      background-color: #5a6268;
    }

    @media (max-width: 768px) {
      .container.mt-4 {
        padding: 20px;
      }

      h1 {
        font-size: 1.8rem;
      }

      img {
        max-height: 300px;
      }

      .content {
        font-size: 1rem;
      }
    }
  </style>
</head>

<body>

  <div class="container mt-4">
    <h1><?= htmlspecialchars($row['produto']) ?></h1>
    <p><em><?= htmlspecialchars($row['descricao']) ?></em></p>

    <?php if (!empty($row['imagem'])): ?>
      <img src="<?= htmlspecialchars($row['imagem']) ?>" alt="<?= htmlspecialchars($row['produto']) ?>">
    <?php endif; ?>

    <h1>R$<?= htmlspecialchars($row['preco']) ?></h1>
    <div class="content">
      <?= nl2br(htmlspecialchars($row['texto'])) ?>
    </div>
    <h2><a href="?pg=sucesso" class="btn btn-secondary mb-4">Comprar</a></h2>
    <hr>
    <a href="index.php" class="btn btn-secondary mb-4">← Voltar</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
