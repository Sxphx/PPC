<?php require_once '../config/db.php'; ?>
<?php include '../config/in.php'; ?>
<?php require_once '../app/class/Alert.php'; ?>
<?php require_once '../app/class/Date.php'; ?>
<?php include '../config/style.php'; ?>
<style>
  a.nav-link-1 {
    color: white;
  }

  i.fa-solid.fa-house {
    color: aliceblue;
  }

  nav {
    display: flex;
  }
</style>

<head>
  <link rel="icon" href="favicon.ico">
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="icon" href="./bg/bg.png" type="image/png">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <div class="navbar-brand">
        <a href="../read.php"><i class="fa-solid fa-house">&nbsp; ระบบแจ้งซ่อมคอมพิวเตอร์สาขาคอมพิวเตอร์ธุรกิจ</i></a>
      </div>
      <div class="d-flex">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../read.php"><i class="fa-solid fa-list-ol"> รายการแจ้งซ่อม &nbsp;</i></a>
          </li>
        </ul>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] != 'รอการอนุมัติ') { ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../add.php" style="color:white;"><i class="fa-solid fa-toolbox"> แจ้งปัญหา &nbsp;</i></a>
            </li>
          </ul>
        <?php } ?>
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-user"> <?= $_SESSION['role']; ?></i></a>
            </li>
          </ul>
        <?php } ?>
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                <div class="row">
                  <div class="col">
                    <h5><i class="fa-solid fa-user"></i> | <?= $_SESSION['email'] ?></h5>
                  </div>
                  <div class="w-100"></div>
                  <div class="col">
                    <h5><i class="fa-solid fa-user"></i> | <?= $_SESSION['name'] ?></h5>
                  </div>
              </h5>
              <button type="button" class="btn-close btn-close-white align-self-start" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] === 'ผู้ดูแลระบบ') { ?>
                  <li class="nav-item">
                    <a class="nav-link-1" href="../admin/dashboard.php">แผงควบคุม</a>
                  </li>
                  <br>
                  <li class="nav-item">
                    <a class="nav-link-1" href="../admin/dashboard_user.php">จัดการผู้ใช้</a>
                  </li>
                <?php } ?>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true && $_SESSION['role'] === 'ครู') { ?>
                  <li class="nav-item">
                    <a class="nav-link-1" href="../teacher/dashboard.php">แผงควบคุม</a>
                  </li>
                  <br>
                  <li class="nav-item">
                    <a class="nav-link-1" href="../teacher/dashboard_user.php">จัดการผู้ใช้</a>
                  </li>
                <?php } ?>
                <hr class="my-divider">
                <li class="nav-item">
                  <a class="nav-link-1" href="../backend/logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        <?php } else { ?>
          <ul class="navbar-nav ms-auto">
            <div class="me-3">
              <li class="nav-item">
                <a class="nav-link" href="../login.php"><i class="fa-solid fa-arrow-right-to-arc">Login</i></a>
              </li>
            </div>
          </ul>
        <?php } ?>
      </div>
    </div>
  </nav>
</head>