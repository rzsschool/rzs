<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Розсошенська гімназія - Головна сторінка</title>
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
        // 'after'=>' /'
    ) );
?>
            <!-- <a href="" class="btn btn-primary px-4">Join Class</a> -->
        </div>
    </nav>



<?php 
// wp_nav_menu( array(

// 	'menu_class'    =>'navbar-nav font-weight-bold mx-auto py-0',
//     'menu_id'       => 'mainMenu',
//     'container'     => '',
//     'link_class'     => '789456',
// 	'theme_location'=>'top',
// 	'after'=>' /'
//     // 'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее 
// 										  // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
// 	// 'container'       => 'div',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
// 	// 'container_class' => '',              // (string) class контейнера (div тега)
// 	// 'container_id'    => '',              // (string) id контейнера (div тега)
// 	// 'menu_class'      => 'menu',          // (string) class самого меню (ul тега)
// 	// 'menu_id'         => '',              // (string) id самого меню (ul тега)
// 	// 'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
// 	// 'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
// 	// 'before'          => '',              // (string) Текст перед <a> каждой ссылки
// 	// 'after'           => '',              // (string) Текст после </a> каждой ссылки
// 	// 'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
// 	// 'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
// 	// 'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
// 	// 'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
// 	// 'theme_location'  => ''   
// ) );
?>
</div>
<!-- Navbar End -->