
<!-- Footer Start -->
<footer class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Головна ідея</h3>
            <!-- <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                <i class="flaticon-043-teddy-bear"></i>
                <img src="img/logo.svg" alt="logo">
                <span class="text-white">KidKinder</span>
            </a> -->
            <p>Labore dolor amet ipsum ea, erat sit ipsum duo eos. Volup amet ea dolor et magna dolor, elitr rebum duo
                est sed diam elitr. Stet elitr stet diam duo eos rebum ipsum diam ipsum elitr.</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                   style="width: 38px; height: 38px;" href="https://www.facebook.com/profile.php?id=100037746100748"
                   target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <!--                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"-->
                <!--                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>-->
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                   style="width: 38px; height: 38px;" href="https://www.youtube.com/user/RzsGymn" target="_blank"><i
                        class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Наші Координати</h3>
            <div class="d-flex">
                <i class="fa fa-map-marker-alt text-primary footer-ico"></i>
                <div class="pl-3">
                    <h5 class="text-white">адреса</h5>
                    <p>
                        38751 вул. Шкільна, 18
                        с. Розсошенці
                        Полтавського району
                        Полтавської області
                    </p>
                </div>
            </div>
            <div class="d-flex">
                <i class="fa fa-envelope text-primary footer-ico"></i>
                <div class="pl-3">
                    <h5 class="text-white">email</h5>
                    <p><a href="mailto:rzsgymn@gmail.com" style="color:white">rzsgymn@gmail.com</a></p>
                </div>
            </div>
            <div class="d-flex">
                <i class="fa fa-phone-alt text-primary footer-ico"></i>
                <div class="pl-3">
                    <h5 class="text-white">телефон</h5>
                    <p><a href="tel:0532590214" style="color:white">0532 590214</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Учням та батькам</h3>
<?php 
    wp_nav_menu( array(
        'menu_class'    =>'d-flex flex-column justify-content-start footer-menu',
        'container'     => '',
        'theme_location'=> 'bottom_left',
    ) );
?>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Публічна інформація</h3>
            <?php 
    wp_nav_menu( array(
        'menu_class'    =>'d-flex flex-column justify-content-start footer-menu',
        'container'     => '',
        'theme_location'=> 'bottom_right',
    ) );
?>
        </div>
    </div>
    <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
        <p class="m-0 text-center text-white">
            &copy; <a class="text-primary font-weight-bold" href="#">Розсошенська гімназія</a>. Всі права захищені.
            Спроектований
            <a class="text-primary font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
        </p>
    </div>
</footer>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->

<!-- Contact Javascript File -->
<!--    <script src="mail/jqBootstrapValidation.min.js"></script>-->
<!--    <script src="mail/contact.js"></script>-->

<?php wp_footer(); ?>

</body>
</html>