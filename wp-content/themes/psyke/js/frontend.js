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

    function setPaddingBottomBody () {
        var paddingBottom = $('#wrapper-footer').height();
        $('body').css({
            'padding-bottom' : paddingBottom 
        });
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

          

    });	//ready

    $(window).scroll(collapseNavbar);
    $(document).ready(collapseNavbar);
	

    $( window ).resize(function() {
        collapseNavbar();  
        setPaddingBottomBody();
    });

} ) ( jQuery );
