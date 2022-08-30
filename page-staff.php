
<?php get_header(); ?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Наш колектив</h3>
        <div class="d-inline-flex text-white">
            <span><a class="text-white" href="{% url 'index' %}">Головна</a></span>
            <span class="px-2">/</span>
            <span><a class="text-white" href="{% url 'staff' %}">Наш колектив</a></span>
            {% if active_category %}
            <span class="px-2">/</span>
            <span>{{ active_category }}</span>
            {% endif %}
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Team Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Наша команда</span></p>
            <h1 class="mb-4">Зустрічай нашу команду</h1>
        </div>


        <div class="row">
            <div class="col-12 text-center mb-2">
                <div class="list-inline mb-4" id="portfolio-flters">
                    <a class="btn category_link m-1 category_link_active" href="{% url 'staff' %}">Всі</a>
                    <a class="btn category_link m-1" href="{% url 'staff' %}?cat=Адміністрація">Адміністрація</a>
                    <a class="btn category_link m-1" href="{% url 'staff' %}?cat=Вчителі">Вчителі</a>
                    <!-- {% for cat in cat_other_staff %}
                    {% with count=cat.otherstaff_set.count %}
                    {% if count > 1 %}
                    <a class="btn category_link m-1" href="{% url 'staff' %}?cat={{ cat.names }}">{{ cat.names }}</a>
                    {% elif count == 1 %}
                    <a class="btn category_link m-1" href="{% url 'staff' %}?cat={{ cat.name }}">{{ cat.name }}</a>
                    {% endif %}
                    {% endwith %}
                    {% endfor %} -->
                </div>
            </div>
        </div>

        <div class="row">
<?php 
    $staff = get_posts( array(
        'numberposts'   => -1,
        // 'orderby'     => 'date',
        // 'order'       => 'ASC',
        'meta_key'		=> 'is_working',
	    'meta_value'	=> true,
        'post_type'     => 'person',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );
    global $person;

    foreach( $staff as $person ){
        setup_postdata( $person );
        // print_r($person);
        $person_id = $person->ID;
        $fields = get_fields($person);
?>
            <div class="col-md-6 col-lg-3 text-center team mb-5">
                <a href="{% url 'staff_detail' person.pk %}">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="<?php echo $fields['photo']; ?>" alt="person_photo">
                    </div>
                    <h4><?php echo $person->post_title; ?></h4>
                </a>
<?php
        if ($fields['is_administration']) {
?>
                <i><?php echo $fields['position'] ?></i><br>
<?php
        }
        if ($fields['is_teacher']) {
                ?><i><?php
            if ($fields['sex']=='чоловіча') {
                ?>Вчитель <?php 
            } else {
                ?>Вчителька <?php
            }
            echo join(', ', $fields['lessons']);
                ?></i><br><?php
?>

<?php          
            }
?>
                <!-- {% for cat in person.otherstaff.categories.all %}
                <i>{{ cat }}</i><br>
                {% endfor %} -->

            </div>
<?php
    }
    wp_reset_postdata();
?>

        </div>
    </div>
</div>
<!-- Team End -->



<!-- let active_category = '{{ active_category }}';
let children_cat = document.getElementById('portfolio-flters').children;
for (let i = 1; i < children_cat.length; i++) {
if (children_cat[i].text == active_category) {
children_cat[i].classList.toggle('category_link_active');
children_cat[0].classList.toggle('category_link_active');
break;
}
} -->


<?php get_footer(); ?>