<?php
include 'config/conn.php';
$conn = $pdo->open();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CO & SIP | Noticias</title>

    <!-- Iconos -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

<body class="page-blog">
    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="./" class="logo d-flex align-items-center">
                <!--<img src="assets/img/logo.png" alt="">-->
                <h1 class="d-flex align-items-center">CO & SIP</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="./">Inicio</a></li>
                    <li><a href="nosotros.html">Sobre Nosotros</a></li>
                    <li><a href="catalogo.php">Catalogo</a></li>
                    <li><a href="tienda/">Comprar</a></li>
                    <li><a href="blog.php" class="active">Noticias</a></li>
                    <li><a href="contacto.php">Contactanos</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>Noticias</h2>
                <ol>
                    <li><a href="blog.php">Noticias</a></li>
                    <li>Detalle de noticia</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <article class="blog-details">

                            <?php
                            try {
                                $stm = $conn->prepare("SELECT * FROM blog");
                                $stm->execute();
                                foreach ($stm as $row) {
                                    $image = (!empty($row['image'])) ? 'tienda/admin/blog_images/' . $row['id'] . '/' . $row['image'] : 'tienda/admin/blog_images/noimage.jpg';
                                    echo "
                                    <div class='post-img'>
                                        <img src='" . $image . "' alt='' class='img-fluid'>
                                    </div>
                                    <h2 class='title'>" . $row['title'] . "</h2>
                                    <div class='meta-top'>
                                    <ul>
                                        <li class='d-flex align-items-center'><i class='bi bi-person'></i> <a href='#'> " . $row['autor'] . "</a></li>
                                        <li class='d-flex align-items-center'><i class='bi bi-clock'></i> <a href='#'><time datetime='2020-01-01'> " . $row['published'] . "</time></a></li>
                                    </ul>
                                    </div><!-- End meta top -->
                                    <div class='content'>
                                        " . $row['content'] . "
                                    </div><!-- End post content -->
                                    ";
                                }
                            } catch (PDOException $e) {
                                echo "There is some problem in connection: " . $e->getMessage();
                            }
                            ?>

                        </article><!-- End blog post -->
                    </div>

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="sidebar ps-lg-4">
                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Noticias Recientes</h3>
                                <div class="mt-3">
                                    <?php
                                    try {
                                        $stmt = $conn->prepare("SELECT * FROM blog WHERE published = (SELECT MAX(published) FROM blog)");
                                        $stmt->execute();
                                        foreach ($stmt as $row) {
                                            $image = (!empty($row['image'])) ? 'tienda/admin/blog_images/' . $row['id'] . '/' . $row['image'] : 'tienda/admin/blog_images/noimage.jpg';
                                            echo "
                                            <div class='post-item'>
                                                <img src = '" . $image . "' alt='Noticia Image' class='flex-shirk-0'>
                                                <div>
                                                    <h4><a href ='blog-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h4>
                                                    <time datetime='2020-01-01'>" . $row['published'] . "</time>
                                                </div>
                                            </div>
                                            ";
                                        }
                                    } catch (PDOException $ex) {
                                        echo "Error de tipo:" . $ex->getMessage();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">

        <div class="footer-content">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="./" class="logo d-flex align-items-center">
                            <span>CO & SIP</span>
                        </a>
                        <p>También puede seguirnos en nuestas redes sociales</p>
                        <div class="social-links d-flex  mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Enlaces útiles</h4>
                        <ul>
                            <li><i class="bi bi-dash"></i> <a href="./">Inicio</a></li>
                            <li><i class="bi bi-dash"></i> <a href="nosotros.html">Sobre Nosotros</a></li>
                            <li><i class="bi bi-dash"></i> <a href="catalogo.php">Catalogo</a></li>
                            <li><i class="bi bi-dash"></i> <a href="tienda/">Comprar</a></li>
                            <li><i class="bi bi-dash"></i> <a href="contacto.php">Contactanos</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contactanos</h4>
                        <p>
                            Progreso No°31 <br>
                            Puebla, Pue. 72210<br>
                            México <br><br>
                            <strong>Telefono: </strong> +52 222-730-9435<br>
                            <strong>Email: </strong>pabloreyesjuarez77@outlook.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="footer-legal">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>CO & SIP</span></strong>. All Rights Reserved
                </div>
                <div class="credits">Designed by <a href="#">Gemini Solutions</a>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>