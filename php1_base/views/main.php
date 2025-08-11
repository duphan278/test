<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Base MVC PHP 1' ?></title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold text-uppercase" href="<?= BASE_URL ?>">phaun</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse justify-content-between" id="mainNav">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>HOME</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase" href="<?= BASE_URL ?>"><b>LIÊN HỆ</b></a>
      </li>
    </ul>

    <div class="d-flex align-items-center">
      <?php if (isset($message)) echo $message; ?>
      <?php if (isset($_SESSION['msg'])): ?>
        <p class="mb-0 me-3 text-<?= $_SESSION['status'] ? 'success' : 'danger' ?>">
          <?= $_SESSION['msg']; unset($_SESSION['msg'], $_SESSION['status']); ?>
        </p>
      <?php endif; ?>

      <?php if (empty($_SESSION['user'])): ?>
        <a href="<?= BASE_URL . '?action=login' ?>" class="btn btn-outline-light me-2">Đăng nhập</a>
        <a href="<?= BASE_URL . '?action=register' ?>" class="btn btn-primary">Đăng ký</a>
      <?php else: ?>
        <span class="text-success me-3">Chào, <strong><?= $_SESSION['user'] ?>_san</strong>!</span>
        <a href="<?= BASE_URL . '?action=infor' ?>" class="btn btn-outline-info me-2">Hồ sơ</a>
        <a href="<?= BASE_URL . '?action=logout' ?>" class="btn btn-outline-danger">Đăng xuất</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<!-- NỘI DUNG CHÍNH -->
<div class="container mt-4">
  <h2 class="mb-4"><?= $title ?? 'Base MVC PHP 1' ?></h2>

  <div class="row">
    <?php
    if (isset($view)) {
      require_once PATH_VIEW . $view . '.php';
    }
    ?>
  </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-5">
  Follow us
</footer>

</body>
</html>
