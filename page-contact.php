<?php get_header(); ?>


<!-- Start End -->
<header class="container-fluid bg-primary mb-3">
    <div class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 400px" data-aos="fade-up" >
        <h3 class="display-3 font-weight-bold text-white"><?php the_title();?></h3>
        <div class="d-inline-flex text-white">
            <span><a class="text-white" href="<?php echo get_permalink( get_page_by_path( 'main' ) ); ?>">Головна</a></span>
            <span class="px-2">/</span>
            <span><?php the_title(); ?></span>
        </div>
    </div>
</header>
<!-- Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2" data-aos="fade-down" >
            <p class="section-title px-5"><span class="px-2">зв'язатись</span></p>
            <h1 class="mb-4">Зв’яжіться з нами з будь-якого питання</h1>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
<?php echo do_shortcode('[contact-form-7 id="121" title="зворотній зв\'язок"]'); ?>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <p>Якщо у вас виникли запитання до вчителів, адміністрації, директора, можете поставити їх, використовуючи наявну форму. Будемо докладати всіх зусиль, аби надіслати відповідь на вказану Вами електронну пошту протягом 5 робочих днів.</p>
                <div class="d-flex">
                    <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>адреса</h5>
                        <p>38751 вул. Шкільна, 18<br>с. Розсошенці<br> Полтавського району<br> Полтавської області</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="min-width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>email</h5>
                        <p>rzsgymn@gmail.com</p>
                        
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>телефон</h5>
                        <p>0532 590214</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>години роботи</h5>
                        <strong>Понеділок - П'ятниця:</strong>
                        <p class="m-0">08:00 - 17:00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

    
<?php get_footer(); ?>