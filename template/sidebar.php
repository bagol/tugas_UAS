<?php
session_start();
    if($_SESSION['role'] == 'murid'){ ?>
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <b><h2>SIAKAD</h2></b>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="murid_nilai.php"><i class="fas fa-print"></i>Nilai</a>
                        </li>
                        <li>
                            <a href="cek_jadwal.php"><i class="fas fa-calendar"></i>Jadwal</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                <b><h2>SIAKAD</h2></b>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="murid_nilai.php"><i class="fas fa-print"></i>Nilai</a>
                        </li>
                        <li>
                            <a href="cek_jadwal.php"><i class="fas fa-calendar"></i>Jadwal</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
    <?php }else if($_SESSION['role'] == 'guru'){ ?>
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <b><h2>SIAKAD</h2></b>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="cek_jadwal.php"><i class="fas fa-calendar"></i>Jadwal Mengajar</a>
                        </li>
                        <li>
                            <a href="input_nilai.php"><i class="fas fa-pencil-square-o"></i>Input Nilai</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                <b><h2>SIAKAD</h2></b>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="cek_jadwal.php"><i class="fas fa-calendar"></i>Jadwal Mengajar</a>
                        </li>
                        <li>
                            <a href="input_nilai.php"><i class="fas fa-pencil-square-o"></i>Input Nilai</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
    <?php }else if($_SESSION['role'] == 'staff'){ ?>
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <b><h2>SIAKAD</h2></b>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li><li>
                            <a href="tambah_murid.php"><i class="fas fa-users"></i>Tambah Murid</a>
                        </li>
                        <li>
                            <a href="tambah_guru.php"><i class="fas fa-user"></i>Tamabh Guru</a>
                        </li>
                        <li>
                            <a href="buat_jadwal.php"><i class="fas fa-calendar"></i>Buat Jadwal</a>
                        </li>
                        <li>
                            <a href="tambah_mapel.php"><i class="fas fa-book"></i>Buat Mapel</a>
                        </li>
                        <li>
                            <a href="tambah_kelas.php"><i class="fas fa-hospital-o"></i>Kelas</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                <b><h2>SIAKAD</h2></b>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="tambah_murid.php"><i class="fas fa-users"></i>Tambah Murid</a>
                        </li>
                        <li>
                            <a href="tambah_guru.php"><i class="fas fa-user"></i>Tamabh Guru</a>
                        </li>
                        <li>
                            <a href="buat_jadwal.php"><i class="fas fa-calendar"></i>Buat Jadwal</a>
                        </li>
                        <li>
                            <a href="tambah_mapel.php"><i class="fas fa-book"></i>Buat Mapel</a>
                        </li>
                        <li>
                            <a href="tambah_kelas.php"><i class="fas fa-hospital-o"></i>Kelas</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
    <?php }?>