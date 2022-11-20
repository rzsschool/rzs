<?php get_header(); ?>
<?php $fields = get_fields($post); ?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="container">
        <div class="row py-4 align-items-center">

            <div class="position-relative overflow-hidden col-lg-4 text-center" data-aos="fade-right">
                <img class="img-fluid rounded-circle" src="<?php echo $fields['photo'] ?>" style="width: 300px;"
                     alt="person_photo">
            </div>
            <div class="col-lg-8 text-white text-center" data-aos="flip-left" >
                <h1 class="mb-3 mt-3 text-white"><?php the_title(); ?></h1>
<?php
    if ($fields['is_administration']) {
?>
                <h5 class="text-white"><?php echo $fields['position'] ?></h5>
<?php
    }
?>
<?php  
    $other_staff = get_the_other_staff($post);
    foreach ($other_staff as $person) {
?>
    <h5 class="text-white"><?php echo $person->name; ?></h5>
<?php     
    }
?>
<?php    
    if ($fields['is_teacher']) {
            ?><h5 class="text-white"><?php
        if ($fields['sex']=='чоловіча') {
            ?>Вчитель <?php 
        } else {
            ?>Вчителька <?php
        }
        $lessons = get_the_lessons_arr($post);
        echo join(', ', $lessons);
            ?></h5><?php
?>
<?php          
    }
?>
                <p><?php echo get_about_teacher($post); ?></p>
                <p><?php echo $fields['life_credo']; ?></p>
<?php          
    if ($fields['show_social_networks']) {
?>   
                    <div>
<?php 
        if ($fields['facebook']){
	
?>          
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="<?php echo $fields['facebook'] ?>" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
<?php 
        }
        if ($fields['youtube']){
?>          
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="<?php echo $fields['youtube'] ?>" target="_blank">
                    <i class="fab fa-youtube"></i>
                </a>
<?php 
        }
        if ($fields['blogger']){
?>          
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="<?php echo $fields['blogger'] ?>" target="_blank">
                    <i class="fab fa-blogger-b"></i>
                </a>
<?php 
        } 
        if ($fields['instagram']){
?>          
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="<?php echo $fields['instagram'] ?>" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
<?php 
        }
        if ($fields['twitter']){
?>          
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="<?php echo $fields['twitter'] ?>" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
<?php 
        }
?>
                    </div>
<?php          
    }
?>    
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Detail Start -->
<div class="container pb-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-5">
                <?php the_content() ?>

<!-- Certificates block-->
<?php 
    $certificates = get_posts( array(
        'numberposts' => -1,
        'orderby'     => 'date',
        'order'       => 'DESC',
        // ASC DESC
        'meta_key'		=> 'persone',
	    'meta_value'	=> $post->ID,
        'post_type'   => 'certificate',
        'suppress_filters' => true,
    ) );
    global $certificate;

    if ($certificates) {
?>
				<div style="overflow-x:auto;">
					<table class="table">
						<thead class="bg-primary text-white">
						<tr class="text-center">
							<th scope="col" class="align-middle">Назва</th>
							<th scope="col" class="align-middle">Тип документу</th>
							<th scope="col" class="align-middle">Платформа</th>
							<th scope="col" class="align-middle">К-ть годин</th>
							<th scope="col" class="align-middle">Дата видачі</th>
						</tr>
						</thead>
						<tbody>
<?php
        foreach( $certificates as $certificate ) {
            setup_postdata( $certificate );
            // print_r($certificate);
            // echo '<br>';
            $fields = get_fields($certificate);
            // print_r($fields);
            $platforms = get_the_platform($certificate);
            // print_r(get_the_platform($certificate));
?>
							<tr class="text-center">
							<td class="text-left">
								<a href="<?php echo $fields['link']; ?>" target="_blank"><?php echo $certificate->post_title; ?></a>
							</td>
							<td><?php echo $fields['type_doc']; ?></td>
							<td>
<?php
                            if ($platforms) {
                                $platform_link = get_fields($platforms[0])['link'];
                                if ($platform_link) {
                                    echo '<a href="' . $platform_link . '" target="_blank">' . $platforms[0]->name . '</a>';
                                } else {
                                    echo $platforms[0]->name;
                                } 
                            } else {
                                echo '---';
                            }
?>
							</td>
							<td>
							<?php 
								$number_of_hours = $fields['number_of_hours'];
								if ($fields['number_of_hours']) {
									echo $number_of_hours;
								} else {
									echo '---';
								}
							?>
							</td>
							<td><?php echo get_format_date($certificate->post_date); ?></td>
							
						</tr>
<?php
        }
    ?>
						</tbody>
					</table>
				</div>
<?php
    }
        wp_reset_postdata();
?>
            </div>
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
            
<!-- Lessons List -->
            <div class="mb-5">
                <h2 class="mb-4">Вчителі</h2>
                <ul class="list-group list-group-flush">
<?php
    $lessons_all = get_categories('taxonomy=lessons&type=custom_post_type');
    foreach ($lessons_all as $lesson) {
?>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        <a href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>?lesson=<?php echo $lesson->slug; ?>"><?php echo $lesson->name; ?></a>
                        <span class="badge badge-primary badge-pill"><?php echo $lesson->count; ?><span>
                    </li>
<?php
    }
?>
                </ul>
            </div>

<!-- Category List -->
            <div class="mb-5">
                <h2 class="mb-4">Категорії</h2>
                <ul class="list-group list-group-flush">
<?php
    $cat_teacher_all = get_categories('taxonomy=cat_teacher&type=custom_post_type');
    foreach ($cat_teacher_all as $cat_teacher) {
?>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    <a href="<?php echo get_permalink( get_page_by_path( 'staff' ) ); ?>?cat_teacher=<?php echo $cat_teacher->slug; ?>"><?php echo $cat_teacher->name; ?></a>
                    <span class="badge badge-primary badge-pill"><?php echo $cat_teacher->count; ?><span>
                </li>
<?php
    }
?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Detail End -->

<?php get_footer(); ?>
