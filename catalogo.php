<?php
include 'config/conn.php';
$conn = $pdo->open();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CO & SIP | Catalogo</title>

    <!-- Iconos -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="page-portafolio">
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
                    <li><a href="catalogo.php" class="avtice">Catalogo</a></li>
                    <li><a href="tienda/">Comprar</a></li>
                    <li><a href="blog.php">Noticias</a></li>
                    <li><a href="contacto.php">Contactanos</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/portfolio-header.jpg');">
            <div class="container position-relative d-flex flex-column align-items-center">

                <h2>Catalogo</h2>
                <ol>
                    <li><a href="./">Inicio</a></li>
                    <li>Catalogo</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                    <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="300">
                        <?php
                        try {
                            $stm = $conn->prepare("SELECT * FROM products");
                            $stm->execute();
                            foreach ($stm as $row) {
                                $image = (!empty($row['productImage1'])) ? 'tienda/admin/product_images/' . $row['id'] . '/' . $row['productImage1'] : 'tienda/admin/product_images/noimage.jpg';
                                echo "
                                <div class='col-lg-4 col-md-6 portfolio-item'>
                                    <img src='" . $image . "' class='img-fluid' alt='Producto-Image'>
                                    <div class='portfolio-info'>
                                        <h4>" . $row['productName'] . "</h4>
                                        <a href='" . $image . "' title='" . $row['productName'] . "' data-gallery='portfolio-gallery-product' class='glightbox preview-link'><i class='bi bi-zoom-in'></i></a>
                                        <a href='tienda/product-details.php?pid=" . $row['id'] . "' title='Mas detalles' class='details-link'><i class='bi bi-link-45deg'></i></a>
                                </div>
                            </div><!-- End Portfolio Item -->
	       						";
                            }
                        } catch (PDOException $e) {
                            echo "There is some problem in connection: " . $e->getMessage();
                        }

                        ?>

                    </div><!-- End Portfolio Container -->

                </div>

            </div>
        </section><!-- End Portfolio Section -->
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
                            <li><i class="bi bi-dash"></i> <a href="tienda/">Comprar</a></li>
                            <li><i class="bi bi-dash"></i> <a href="blog.php">Noticias</a></li>
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

    <!-- JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>