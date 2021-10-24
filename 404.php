<?php
require_once 'head.php';
?>

<body>
    <div class="page-wrapper">
        <?php require_once 'header.php'; ?>
        <!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">404</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="error-content text-center">
                <div class="container">
                    <h1 class="error-title">Error 404</h1><!-- End .error-title -->
                    <p>We are sorry, the page you've requested is not available.</p>
                    <a href="index.php" class="btn btn-outline-primary-2 btn-minwidth-lg">
                        <span>BACK TO HOMEPAGE</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .container -->
            </div><!-- End .error-content text-center -->
        </main><!-- End .main -->

        <?php require_once 'footer.php'; ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <?php require_once 'mobile-menu.php'; ?>
    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <?php require_once("./signin-modal.php") ?>
    <!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/404.html  22 Nov 2019 10:04:04 GMT -->

</html>