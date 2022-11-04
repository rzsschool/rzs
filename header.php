<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
	<?php 
		if(is_page('main')){ 
	?>
		<title>Розсошенська гімназія - Головна сторінка</title>
	<?php 
		} else if(is_home()) {
	?>
		<title>Розсошенська гімназія - Новини</title>
	<?php  
		} else {
	 ?>
	 	<title>Розсошенська гімназія</title>
	<?php } ?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Розсошенська гімназія" name="keywords">
    <meta content="12  вересня 1993 року була відкрита Розсошенська загальноосвітня школа І-ІІІ ступенів. Із 2002 року вона реорганізована у Розсошенську гімназію, а з 2019 року – Комунальний заклад «Розсошенська гімназія Щербанівської сільської ради Полтавського району Полтавської області»" name="description">

    <!-- Favicon -->
    <link href="<?php echo get_template_directory_uri(); ?>/assets/img/favicons/favicon.ico" rel="icon">
    <?php wp_head(); ?>
</head>

<body>

<!-- Navbar Start -->
<div class="container-fluid bg-light position-relative shadow">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
        <a href="<?php echo get_permalink( get_page_by_path( 'main' ) ); ?>" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="logo">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
           
<?php 
    wp_nav_menu( array(
        'menu_class'    =>'navbar-nav font-weight-bold mx-auto py-0',
        'menu_id'       => 'mainMenu',
        'container'     => '',
        'theme_location'=> 'top',
    ) );
?>
            <!-- <a href="" class="btn btn-primary px-4">Join Class</a> -->
        </div>
    </nav>

</div>
<!-- Navbar End -->