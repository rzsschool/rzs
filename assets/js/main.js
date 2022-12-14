(function ($) {
    "use strict";
    AOS.init();
    // Dropdown on mouse hover
    // $(document).ready(function () {
    //     function toggleNavbarMethod() {
    //         if ($(window).width() > 992) {
    //             $('.navbar .dropdown').on('mouseover', function () {
    //                 $('.dropdown-toggle', this).trigger('click');
    //             }).on('mouseout', function () {
    //                 $('.dropdown-toggle', this).trigger('click').blur();
    //             });
    //         } else {
    //             $('.navbar .dropdown').off('mouseover').off('mouseout');
    //         }
    //     }
    //     toggleNavbarMethod();
    //     $(window).resize(toggleNavbarMethod);
    // });
    $(document).ready(function () {
        /* MENU */
        let menuItem = document.getElementsByClassName('menu-item-has-children');
        
        const notShow = (i=-1) => {
            for (let index = 0; index < menuItem.length; index++) {
                let element = menuItem[index].lastElementChild;
                if (i == index) {
                    continue;
                }
                if (element.classList.contains('show')){
                    element.classList.remove('show');
                }
            }
        }

        for (let index = 0; index < menuItem.length; index++) {
            
            let element = menuItem[index];
     
            element.firstElementChild.classList.add('dropdown-toggle');
            element.addEventListener('click', ()=>{
                if (window.innerWidth <= 991) {
                    let subMenu = element.getElementsByClassName('sub-menu');
                    notShow(index);
                    subMenu[0].classList.toggle('show');                
                } else {
                    notShow();
                }
            });
        }
        /* MENU FOTER */
    
        const strTagI = '<i class="fa fa-angle-right mr-2"></i>';
        let footer = document.getElementsByClassName('footer-menu');
        for (let index = 0; index < footer.length; index++) {
            const footerList = footer[index].children;
            // console.log(footerList);
            for (let index = 0; index < footerList.length; index++) {
                let footerLink = footerList[index];

                // footerLink.appendChild(elemI);
                let elemA = footerLink.firstChild;
                footerLink.firstChild.innerHTML = strTagI + elemA.textContent;

            }
        }
    });

    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });

    $('#portfolio-flters li').on('click', function () {
        $("#portfolio-flters li").removeClass('active');
        $(this).addClass('active');

        portfolioIsotope.isotope({filter: $(this).data('filter')});
    });


    // Post carousel
    $(".post-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:2
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        center: true,
        autoplay: true,
        smartSpeed: 2000,
        dots: true,
        loop: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

