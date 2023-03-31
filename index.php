<?php
include 'config/conn.php';
$conn = $pdo->open();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>CO & SIP | Inicio</title>

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

<body class="page-index">
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
                    <li><a href="./" class="active">Inicio</a></li>
                    <li><a href="nosotros.html">Sobre Nosotros</a></li>
                    <li><a href="catalogo.php">Catalogo</a></li>
                    <li><a href="tienda/">Comprar</a></li>
                    <li><a href="blog.php">Noticias</a></li>
                    <li><a href="contacto.php">Contactanos</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h2 data-aos="fade-up">Concentrarse en lo que importa</h2>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p>Ahora con CO&SIP puedes experimentar una mayor comodidad y durabilidad en tus prendas.</p>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="nosotros.html" class="btn-get-started">Empezar</a>
                        <!--<a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Ver Video</span></a>-->
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">
        <!-- ======= Why Choose Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Porque elegirnos</h2>

                </div>

                <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-xl-5 img-bg" style="background-image: url('assets/img/why-us-bg.jpg')"></div>
                    <div class="col-xl-7 slides  position-relative">

                        <div class="slides-1 swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Hagamos crecer tu negocio juntos</h3>
                                        <h4 class="mb-3">Una vestimenta a juego</h4>
                                        <p> La imagen de tu empresa la creean las personas que trabajan contigo,
                                            por ello es importate que vayan a juego con tu marca.</p>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Prometemos lo que podemos cumplir</h3>
                                        <h4 class="mb-3">Prometer es cumplir</h4>
                                        <p>Si creemos que algo de lo que Ud. solicita, no lo podemos cumplir por la
                                            razón que sea, se lo diremos y buscaremos una alternativa que le sea de
                                            utilidad para lograr su objetivo.</p>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Construimos relacionea a largo plazo</h3>
                                        <h4 class="mb-3">Mantener a nuestros clientes es la priodidad</h4>
                                        <p>Algunos de nuestros clientes trabajan con nosotros desde el día que fundamos
                                            , y otros desde que iniciaron la relación con nuestra empresa. Es una
                                            satisfacción atenderlos y ayudarlos en cada nuevo proyecto que encaran.</p>
                                    </div>
                                </div><!-- End slide item -->

                                <div class="swiper-slide">
                                    <div class="item">
                                        <h3 class="mb-3">Vamos mas allá</h3>
                                        <h4 class="mb-3">Buscamos la excelencia.</h4>
                                        <p>Nuestros trabajos y negocios son muy importantes para nosotros, por lo tanto,
                                            todo lo que hacemos por nuestros clientes lo consideramos muy valioso. No
                                            dudamos en tomar su éxito como nuestro, así que sepa que haremos todo lo
                                            posible para que Ud. desarrolle negocios exitosos con nuestra colaboración.
                                        </p>
                                    </div>
                                </div><!-- End slide item -->

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                </div>

            </div>
        </section><!-- End Why Choose Us Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="details">
                <div class="container align-items-center justify-content-between" data-aos="fade-up" data-aos-delay="300">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Conozca nuestro catalogo</h4>
                            <p>No vendemos ropa, vendemos armaduras para conquistar al mundo.</p>
                            <a href="catalogo.php" class="btn-get-started">Catalogo</a>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- End Features Section -->

        <!-- ======= Recent Posts Section ======= -->
        <section id="recent-posts" class="recent-posts">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Noticias Recientes</h2>
                </div>

                <div class="row gy-5">

                    <?php
                    try {
                        $stm = $conn->prepare("SELECT * FROM blog WHERE published = (SELECT MAX(published) FROM blog)");
                        $stm->execute();
                        foreach ($stm as $row) {
                            $image = (!empty($row['image'])) ? 'tienda/admin/blog_images/' . $row['id'] . '/' . $row['image'] : 'tienda/admin/blog_images/noimage.jpg';
                            echo "
                            <div class='col-xl-3 col-md-6' data-aos='fade-up' data-aos-delay='100'>
                                <div class='post-box'>
                                    <div class='post-img'><img src='" . $image . "' class='img-fluid' alt='Noticia Image'></div>
                                        <div class='meta'>
                                            <span class='post-date'>" . $row['published'] . "</span>
                                            <span class='post-author'> / " . $row['autor'] . "</span>
                                        </div>
                                        <h3 class='post-title'>" . $row['title'] . "</h3>
                                        <p>" . $row['short'] . "</p>
                                        <a href='blog-details.php?id=" . $row['id'] . "' class='readmore stretched-link'><span>Leer mas</span><i class='bi bi-arrow-right'></i></a>
                                    </div>
                                 </div>
	       					</div>	
                            ";
                        }
                    } catch (PDOException $e) {
                        echo "There is some problem in connection: " . $e->getMessage();
                    }

                    ?>
                </div>
            </div>
        </section><!-- End Recent Blog Posts Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
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
                            <li><i class="bi bi-dash"></i> <a href="nosotros.html">Sobre Nosotros</a></li>
                            <li><i class="bi bi-dash"></i> <a href="catalogo.php">Catalogo</a></li>
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
                <div class="credits">
                    Designed by <a href="#">Gemini Solutions</a>
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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>