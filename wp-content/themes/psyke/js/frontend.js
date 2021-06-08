( function($) {
    
    'use strict';
  	/* CODE GOES HERE */

    console.log('frontend');

    // jQuery to collapse the navbar on scroll
    function collapseNavbar() {
        if ($('body').hasClass('home')) {
            
        } else {
            
            if ($("#main-nav").offset().top > 92) {
                $("#main-nav").addClass("top-nav-collapse");
            } else {
                $("#main-nav").removeClass("top-nav-collapse");
            }
        }
    }

    //scrollTo
    $(function() {
        $('a.page-scroll').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });

    function setPaddingBottomBody () {
        var paddingBottom = $('#wrapper-footer').height();
        var windownHeight = $(window).height() - $('#main-nav').height();
        if(paddingBottom > windownHeight) {
            $('#wrapper-footer').removeClass('footer-fixed');
            $('body').css({
                'padding-bottom' : 0
            });
        } else {
            $('#wrapper-footer').addClass('footer-fixed');
            $('body').css({
                'padding-bottom' : paddingBottom 
            });
        }
        
    }

    function watchComponentValores() {
        if($('.component-valores').length > 0) {
            if ($(window).width() > 991) {
                $('.component-valores--support').addClass('d-flex');
                $('.card-valores .card-valores-content').hide();
            } else {
                $('.component-valores--support').removeClass('d-flex');
                
            }
        }    
    }

    jQuery(document).ready(function() {

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        setPaddingBottomBody();

        if($('.slick-frases').length > 0) {
            $('.slick-frases').slick({
                dots: true,
                arrows: false,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000
            });
            
        }
        if($('.slick-posts').length > 0) {
            $('.slick-posts').slick({
                dots: true,
                arrows: false,
                slidesToShow: 3,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
                ]
            });
        }
        if($('.slick-meditaciones').length > 0) {
            $('.slick-meditaciones').slick({
                dots: true,
                arrows: false,
                slidesToShow: 4,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
                ]
            });
        }
        if($('.slick-terapias--vertical').length > 0) {
            $('.slick-terapias--vertical').each( function() {
                $(this).slick({
                    dots: true,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            });
        }
        if($('.slick-testimonials').length > 0) {
            $('.slick-testimonials').each( function() {
                $(this).slick({
                    dots: false,
                    arrows: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000
                });
            });
        }
        
        if($('.slick-brands').length > 0) {
            $('.slick-brands').slick({
                dots: false,
                arrows: true,
                slidesToShow: 4,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 2,
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
                ]
            });
        }
        

        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

        /*
        gsap.utils.toArray(".hero-slide").forEach((panel, i) => {
            ScrollTrigger.create({
                trigger: panel,
                start: "top top", 
                pin: true, 
                pinSpacing: false
            });
        });
         ScrollTrigger.create({
            snap: 1/3 // snap whole page to the closest section!
        });
        */


        /* WORKS
        ScrollTrigger.create({
            trigger: "#slide-01",
            start: "top top", 
            end: "bottom 150px",
            pin: "#hero-content-01"
            //pinReparent: true
          });
          
          ScrollTrigger.create({
            trigger: "#slide-02",
            start: "top top", 
            end: "bottom 150px",
            pin: "#hero-content-02"
            //pinReparent: true
          });

          ScrollTrigger.create({
            trigger: "#slide-03",
            start: "top top", 
            end: "bottom 150px",
            pin: "#hero-content-03"
            //pinReparent: true
          });

          ScrollTrigger.create({
            snap: 1 / 3 // snap whole page to the closest section!
         });

         */

         if ($('body').hasClass('home')) {
            ScrollTrigger.create({
                trigger: "#slide-01",
                start: "top top", 
                end: "bottom 150px",
                pin: "#hero-content-01",
                pinSpacing: false,
                onEnter: () => setStamp("onEnter"),
                //pinReparent: true
            });
          
            ScrollTrigger.create({
                trigger: "#slide-02",
                start: "top top", 
                end: "bottom 150px",
                pin: "#hero-content-02",
                pinSpacing: false
                //pinReparent: true
            });

            ScrollTrigger.create({
                trigger: "#slide-03",
                start: "top top", 
                end: "bottom bottom",
                pin: "#hero-content-03",
                pinSpacing: false
                //onEnter: () => setStamp("onEnter03"),
                //onLeave: () => setStamp("onLeave")
                //pinReparent: true
            });

            function setStamp(status) {
                if(status == 'onLeave') {
                    gsap.to('.stamp', { scale: 0, duration: 0.5});
                    $("#main-nav").addClass("top-nav-collapse");
                } else {
                    gsap.to('.stamp', { scale: 1, duration: 0.5});
                    $("#main-nav").removeClass("top-nav-collapse");
                }
            }


            var heightAllSliders = 3 * $(window).height();
            var last_known_scroll_position = 0;
            var ticking = false;

            function doSomething(scroll_pos) {
                if (scroll_pos > heightAllSliders) {
                    setStamp('onLeave');
                } else {
                    setStamp('onEnter');
                }
            }
    
            window.addEventListener('scroll', function(e) {
                last_known_scroll_position = window.scrollY;
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        doSomething(last_known_scroll_position);
                        ticking = false;
                    });
                }
                ticking = true;
            });

        }
        //END HOME PIN

        
        function activePsykeValue(slide) {
            console.log(`Este é o slide: ${slide}`);
            var slideElementPrevious = $('.valores-support--item.active');
            var slideActualIndex = slide.attr('data-valores');
            var slideElementNextTxt = '.valores-support--item[data-slide="'+slideActualIndex+'"]';
            var slideElementNext = $(slideElementNextTxt);
            if ( slideActualIndex == slideElementPrevious.attr('data-slide')) {
                console.log('Mesmo slide');
            } else {
                console.log('Muda Slide');
                slideElementPrevious.removeClass('active');
                slideElementNext.addClass('active');

                console.log(slideElementNext);
                gsap.set(slideElementNext, {y: 150, autoAlpha: 0});
                gsap.to(slideElementPrevious, {y: 150, autoAlpha: 0, duration: 0.5, ease: "power4.out"});
                gsap.to(slideElementNext, {y: 0, autoAlpha: 1, duration: 0.5, delay: 0.2, ease: "power4.out"});
            }
        } 
        
        watchComponentValores();

        if($('.component-valores').length > 0) {
            $('.card-valores').each( function() {
                var cardTitle = $(this).find('.card-valores-title').text();
                var cardContent = $(this).find('.card-valores-content').html();
                var active = '';
                var index = $(this).attr('data-valores');
                if($(this).attr('data-valores') === '0') {
                    active = 'active';
                    $(this).addClass('active');
                    if ($(window).width() < 992) {
                        $(this).find('.card-valores-content').show();            
                    } else {
                        $(this).find('.card-valores-content').hide();    
                    }
                } else {
                    $(this).find('.card-valores-content').hide();
                }
                
                var supportContent = `<div class="valores-support--item ${active}" id="" data-slide="${index}"><div class="valores-support--content">${cardContent}</div></div>`;
                $('.component-valores--support').append(supportContent);

                //set gsap anim
                var supportItemTXT = '.valores-support--item[data-slide="'+index+'"]';
                var supportItem = $(supportItemTXT);
                if($(this).attr('data-valores') > 0) {
                    gsap.set(supportItem, {y: 150, autoAlpha: 0});
                }
                
            });
        }
        $('.card-valores').on('click', function(e) {
            $('.card-valores.active').removeClass('active');
            $(this).addClass('active');
            if ($(window).width() > 991) {
                $(this).find('.card-valores-content').hide();
                var actualSlide = $(this);
                activePsykeValue(actualSlide); 
            } else {
                $(this).find('.card-valores-content').slideToggle();    
            }
        });


          // FOLLOW MOUSE 
          // CURSOR
            var cursor = $(".cursor"),
            follower = $(".cursor-follower");

            var posX = 0,
                posY = 0;

            var mouseX = 0,
                mouseY = 0;

            TweenMax.to({}, 0.016, {
            repeat: -1,
            onRepeat: function() {
                posX += (mouseX - posX) / 9;
                posY += (mouseY - posY) / 9;

                TweenMax.set(follower, {
                    css: {
                    left: posX - 12,
                    top: posY - 12
                    }
                });

                TweenMax.set(cursor, {
                    css: {
                    left: mouseX,
                    top: mouseY
                    }
                });
            }
            });

            $(document).on("mousemove", function(e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });
            // yellow circle
            $(".link").on("mouseenter", function() {
                cursor.addClass("active");
                follower.addClass("active");
            });
            $(".link").on("mouseleave", function() {
                cursor.removeClass("active");
                follower.removeClass("active");
            });
          // .FOLLOW MOUSE

          function inOutAnimation(elementToShow, delayElement, offSetElement) {
            gsap.to(elementToShow, { y: 150, autoAlpha: 0});
            elementToShow.waypoint(function(direction) {
                if (direction === 'down') {
                    gsap.to(elementToShow, { y: 0, autoAlpha: 1, duration: 0.7, delay: delayElement, ease: "power4.out"});
                }
                else {
                    gsap.to(elementToShow, { y: 150, autoAlpha: 0, duration: 0.7, ease: "power4.out"});
                }
            }, {
                offset: offSetElement
            })
        }
        function showSection(elementToShow, delayElement, offSetElement) {
            gsap.to(elementToShow, { y: 150, autoAlpha: 0});
            elementToShow.waypoint(function(direction) {
                if (direction === 'down') {
                    gsap.to(elementToShow, { y: 0, autoAlpha: 1, duration: 0.7, delay: delayElement, ease: "power4.out"});
                }
            }, {
                offset: offSetElement
            })
        }
        function showElement(elementToShow, delayElement, durationAnimation, offSetElement) {
            gsap.to(elementToShow, { y: 150, autoAlpha: 0});
            elementToShow.waypoint(function(direction) {
                if (direction === 'down') {
                    gsap.to(elementToShow, { y: 0, autoAlpha: 1, duration: durationAnimation, delay: delayElement, ease: "power4.out"});
                }
            }, {
                offset: offSetElement
            })
        }
        if($('.section-frases').length > 0) {
            var element = $('.section-frases--inner');
            showSection(element, 0 , 'bottom-in-view');
        }
        
        if($('.section-blog').length > 0) {
            var elementBlog = $('.anim-blog-block-01');
            var elementBlog2 = $('.anim-blog-block-02');
            var elementBlog3 = $('.anim-blog-block-03');
            var elementBlog4 = $('.section-blog .btn-outline--primary');

            
            var elementBlogSlick = $('.slick-posts');

            showSection(elementBlog, 0, 'bottom-in-view');
            showSection(elementBlog2, 0.25, 'bottom-in-view');
            showSection(elementBlog3, 0.5, 'bottom-in-view');
            showSection(elementBlog4, 0, 'bottom-in-view');
            showSection(elementBlogSlick, 0, '100%');
        }
        if($('.section-meditaciones-slider').length > 0) {
            var elementMind = $('.section-meditaciones-slider .title-smile');
            var elementMind2 = $('.section-meditaciones-slider .bg-primary p');
            var elementMind3 = $('.section-meditaciones-slider .intro-meditation');
            var elementMind4 = $('.section-meditaciones-slider .slick-meditaciones');
            var elementMind5 = $('.section-meditaciones-slider .btn-outline--primary');
            
            showSection(elementMind, 0.25, 'bottom-in-view');
            showSection(elementMind2, 0.5, 'bottom-in-view');
            showSection(elementMind3, 0, 'bottom-in-view');
            showSection(elementMind4, 0, '100%');
            showSection(elementMind5, 0, '100%');
        }

        $('[data-animation=true]').each( function() {
            var elementToAnimate = $(this);
            var animationDuration = $(this).attr('data-duration');
            var animationDelay = $(this).attr('data-delay');
            var animationOffset = $(this).attr('data-offSet');
            
            showElement(elementToAnimate, animationDelay, animationDuration, animationOffset);
        });

       
        if($('.card-terapias').length > 0) {
            $('.card-terapias').each( function() {
                var thisElement = $(this).find('.collumn-color');
                var thisCard = $(this);
                console.log(thisCard);
                thisElement.waypoint(function(direction) {
                    if (direction === 'down') {
                        thisCard.addClass('in');
                        gsap.to(thisElement, { height: 0, duration: 0.65, ease: "power4.out"});
                    } else {
                        thisCard.removeClass('in');
                        gsap.to(thisElement, { height: '100%', duration: 0.65, ease: "power4.out"});
                    }
                }, {
                    offset: '50%'
                })
            });
        }

        $('.trigger-course').on('click', function(){
            $(this).toggleClass('active');
            var elementToTogglePointer = $(this).attr('data-tab');
            var elementToToggle = $(elementToTogglePointer);
            console.log(elementToToggle);
            elementToToggle.slideToggle('slow');

            if(elementToTogglePointer == '#company-tab') {
                $('.slick-brands').slick('reinit');
            }
        });

        $('.tab-button').on('click', function() {
            $(this).toggleClass('active');
        });
        
        
       
        

          

    });	//ready

    $(window).scroll(collapseNavbar);
    $(document).ready(collapseNavbar);
	

    $( window ).resize(function() {
        collapseNavbar();  
        watchComponentValores();
        setPaddingBottomBody();
    });

} ) ( jQuery );
