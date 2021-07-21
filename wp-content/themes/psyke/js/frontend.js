(function ($) {

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
    $(function () {
        $('a.page-scroll').bind('click', function (event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    });

    function setPaddingBottomBody() {
        var paddingBottom = $('#wrapper-footer').height();
        var windownHeight = $(window).height() - $('#main-nav').height();
        if (paddingBottom > windownHeight) {
            $('#wrapper-footer').removeClass('footer-fixed');
            $('body').css({
                'padding-bottom': 0
            });
        } else {
            $('#wrapper-footer').addClass('footer-fixed');
            $('body').css({
                'padding-bottom': paddingBottom
            });
        }

    }

    function watchComponentValores() {
        if ($('.component-valores').length > 0) {
            if ($(window).width() > 991) {
                $('.component-valores--support').addClass('d-flex');
                $('.card-valores .card-valores-content').hide();
            } else {
                $('.component-valores--support').removeClass('d-flex');

            }
        }
    }

    function mainMenuMobile() {
        var menuSupport = $('#setOnMainMenu').html();
        $('.navbar-collapse').append(menuSupport);
    }

    jQuery(document).ready(function () {

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        setPaddingBottomBody();
        mainMenuMobile();

        if ($('.slick-frases').length > 0) {
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
        if ($('.slick-posts').length > 0) {
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
        if ($('.slick-posts--style2').length > 0) {
            $('.slick-posts--style2').slick({
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
        
        if ($('.slick-collumns').length > 0) {
            $('.slick-collumns').slick({
                dots: false,
                arrows: true,
                slidesToShow: 2,
                autoplay: true,
                autoplaySpeed: 5000,
                prevArrow:'<button class="prev slick-prev"><svg width="51" height="102" viewBox="0 0 51 102" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M-3.73721e-05 51.0416L50.2045 0.837051L50.9117 1.54416L1.30936 51.1464L50.9117 100.749L50.2045 101.456L-3.73721e-05 51.2513L0.104775 51.1464L-3.73721e-05 51.0416Z" fill="black"/></svg></button>',
                nextArrow:'<button class="next slick-next"><svg width="52" height="102" viewBox="0 0 52 102" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M51.4558 51.0416L1.25125 0.837051L0.544159 1.54416L50.1464 51.1465L0.544159 100.749L1.25125 101.456L51.4558 51.2513L51.351 51.1465L51.4558 51.0416Z" fill="black"/></svg></button>',
                responsive: [
                    {
                        breakpoint: 640,
                        settings: {
                            dots: true,
                            arrows: false,
                            slidesToShow: 1,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        }
        if ($('.slick-meditaciones').length > 0) {
            $('.slick-meditaciones').slick({
                dots: true,
                arrows: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        }
        if ($('.slick-terapias--vertical').length > 0) {
            $('.slick-terapias--vertical').each(function () {
                $(this).slick({
                    dots: true,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
                $(this).on('beforeChange', function(event, slick, currentSlide, nextSlide){
                    console.log(`Este é o slider atual: ${currentSlide}`);
                    console.log(`Este é o próximo slider: ${nextSlide}`);
                    
                    var cardPointer = $(this).attr('card-terapia-slick');
                    var cardElement = '#card-terapias-' + cardPointer;
                    
                    var thisCard = $(cardElement);
                    var thisElement = $(cardElement).find('.collumn-color');
                    
                    /*
                    var cardID = $(this);
                    console.log(cardID);
                    */

                    if(currentSlide) {
                        //Value 0 - 
                        console.log('Close animation');
                        thisCard.removeClass('in');
                        gsap.to(thisElement, { height: '100%', duration: 0.65, ease: "power4.out" });
                    } else {
                        console.log('Open animation');
                        thisCard.addClass('in');
                        gsap.to(thisElement, { height: 0, duration: 0.65, ease: "power4.out" });
                    }
                });
            });
        }



        if ($('.slick-testimonials').length > 0) {
            $('.slick-testimonials').each(function () {
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

        
        if ($('.modal-course--container').length > 0) {
            $('.modal-course--container').each( function() {
                var htmlCourseModal = $(this).html();
                $(this).remove();
                $('#insertModalCourses').append(htmlCourseModal);
            });
        }

        if ($('.slick-brands').length > 0) {
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
                if (status == 'onLeave') {
                    gsap.to('.stamp', { scale: 0, duration: 0.5 });
                    $("#main-nav").addClass("top-nav-collapse");
                } else {
                    gsap.to('.stamp', { scale: 1, duration: 0.5 });
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

            window.addEventListener('scroll', function (e) {
                last_known_scroll_position = window.scrollY;
                if (!ticking) {
                    window.requestAnimationFrame(function () {
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
            var slideElementNextTxt = '.valores-support--item[data-slide="' + slideActualIndex + '"]';
            var slideElementNext = $(slideElementNextTxt);
            if (slideActualIndex == slideElementPrevious.attr('data-slide')) {
                console.log('Mesmo slide');
            } else {
                console.log('Muda Slide');
                slideElementPrevious.removeClass('active');
                slideElementNext.addClass('active');

                console.log(slideElementNext);
                gsap.set(slideElementNext, { y: 150, autoAlpha: 0 });
                gsap.to(slideElementPrevious, { y: 150, autoAlpha: 0, duration: 0.5, ease: "power4.out" });
                gsap.to(slideElementNext, { y: 0, autoAlpha: 1, duration: 0.5, delay: 0.2, ease: "power4.out" });
            }
        }

        watchComponentValores();

        if ($('.component-valores').length > 0) {
            $('.card-valores').each(function () {
                var cardTitle = $(this).find('.card-valores-title').text();
                var cardContent = $(this).find('.card-valores-content').html();
                var active = '';
                var index = $(this).attr('data-valores');
                if ($(this).attr('data-valores') === '0') {
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
                var supportItemTXT = '.valores-support--item[data-slide="' + index + '"]';
                var supportItem = $(supportItemTXT);
                if ($(this).attr('data-valores') > 0) {
                    gsap.set(supportItem, { y: 150, autoAlpha: 0 });
                }

            });
        }
        $('.card-valores').on('click', function (e) {
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


        function inOutAnimation(elementToShow, delayElement, offSetElement) {
            gsap.to(elementToShow, { y: 150, autoAlpha: 0 });
            elementToShow.waypoint(function (direction) {
                if (direction === 'down') {
                    gsap.to(elementToShow, { y: 0, autoAlpha: 1, duration: 0.7, delay: delayElement, ease: "power4.out" });
                }
                else {
                    gsap.to(elementToShow, { y: 150, autoAlpha: 0, duration: 0.7, ease: "power4.out" });
                }
            }, {
                offset: offSetElement
            })
        }
        function showSection(elementToShow, delayElement, offSetElement) {
            gsap.to(elementToShow, { y: 150, autoAlpha: 0 });
            elementToShow.waypoint(function (direction) {
                if (direction === 'down') {
                    gsap.to(elementToShow, { y: 0, autoAlpha: 1, duration: 0.7, delay: delayElement, ease: "power4.out" });
                }
            }, {
                offset: offSetElement
            })
        }
        function showElement(elementToShow, delayElement, durationAnimation, offSetElement) {
            gsap.to(elementToShow, { y: 150, autoAlpha: 0 });
            elementToShow.waypoint(function (direction) {
                if (direction === 'down') {
                    gsap.to(elementToShow, { y: 0, autoAlpha: 1, duration: durationAnimation, delay: delayElement, ease: "power4.out" });
                }
            }, {
                offset: offSetElement
            })
        }
        if ($('.section-frases').length > 0) {
            var element = $('.section-frases--inner');
            //showSection(element, 0, 'bottom-in-view');
            gsap.set(element, { opacity: 0 });
            //gsap.to(element, { opacity: 0 });
            element.waypoint(function (direction) {
                if (direction === 'down') {
                    gsap.to(element, { opacity: 1, duration: 0.5, delay: 0, ease: "power4.out" });
                }
            }, {
                offset: '50%'
            })
        }

        if ($('.section-blog').length > 0) {
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
        if ($('.section-meditaciones-slider').length > 0) {
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

        $('[data-animation=true]').each(function () {
            var elementToAnimate = $(this);
            var animationDuration = $(this).attr('data-duration');
            var animationDelay = $(this).attr('data-delay');
            var animationOffset = $(this).attr('data-offSet');

            showElement(elementToAnimate, animationDelay, animationDuration, animationOffset);
        });


        if ($('.card-terapias').length > 0) {
            /*
            $('.card-terapias').each(function () {
                var thisElement = $(this).find('.collumn-color');
                var thisCard = $(this);
                console.log(thisCard);
                thisElement.waypoint(function (direction) {
                    if (direction === 'down') {
                        thisCard.addClass('in');
                        gsap.to(thisElement, { height: 0, duration: 0.65, ease: "power4.out" });
                    } else {
                        thisCard.removeClass('in');
                        gsap.to(thisElement, { height: '100%', duration: 0.65, ease: "power4.out" });
                    }
                }, {
                    offset: '50%'
                })
            });
            */
        }

        function checkFunctionSlider(el) {
            console.log('trigger Slick');
            var elSlick = el + ' .slick-card-courses';
            //console.log(el);
            //console.log(el.find('.slick-card-courses'));

            var cardsSize = elSlick.length;
            console.log(cardsSize);
            
            if ($(elSlick).length > 0) {
                setTimeout( function() {
                    $(elSlick).each(function () {
                        console.log($(this));
                        if ($(this).hasClass('slick-initialized')) {
                            $(this).slick('unslick');
                        }
                        
                        $(this).not('.slick-initialized').slick({
                            dots: false,
                            arrows: true,
                            infinite: false,
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            prevArrow:'<button class="prev slick-prev slick-circle"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-left fa-w-14"><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z" class="" fill="#89b1b7"></path></svg></button>',
                            nextArrow:'<button class="next slick-next slick-circle"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-arrow-right fa-w-14"><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z" class="" fill="#89b1b7"></path></svg></button>',
                            responsive: [
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 2,
                                    }
                                },
                                {
                                    breakpoint: 640,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                    }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                            ]
                        });
                    });
                }, 500);
                
            }
        }

        $('.trigger-course').on('click', function () {
            $(this).toggleClass('active');
            var elementToTogglePointer = $(this).attr('data-tab');
            var elementToToggle = $(elementToTogglePointer);
            console.log(elementToToggle);
            elementToToggle.slideToggle('slow');

            if (elementToTogglePointer == '#company-tab') {
                $('.slick-brands').slick('reinit');
            }
            checkFunctionSlider(elementToTogglePointer);
        });

        $('.course-tab .tab-button').on('click', function () {
            $(this).toggleClass('active');
        });

        $('.list-tabs .tab-button').on('click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                console.log('escape');
            } else {
                console.log('set tab');
                var tabToActive = $(this).attr('href');

                $('#custom-collpase .collapse.show').slideUp('fast');
                $('#custom-collpase .collapse.show').removeClass('show');
                $('.list-tabs .tab-button').removeClass('active');
                setTimeout(function () {
                    $(tabToActive).slideDown('fast');
                    $(tabToActive).addClass('show');
                }, 200);

                $(this).addClass('active');
            }

        });

        $('.trigger-search').on('click', function () {
            $('.search--wrapper').toggle('fast');
            $('#page').addClass('pageBlur');
            $('body').addClass('searchOpened');
        });
        $('#triggerCloseSearchForm').on('click', function () {
            $('.search--wrapper').toggle('fast');
            $('#page').removeClass('pageBlur');
            $('body').removeClass('searchOpened');
        });

        var $grid = $('.grid-masonry').masonry({
                    columnWidth: '.grid-sizer',
                    itemSelector: '.grid-item',
                    percentPosition: true,
                    horizontalOrder: true
                });

        $('.grid-masonry--container').imagesLoaded().done( function( instance ) {
            setTimeout( function(){
                 $grid.masonry('layout');
            }, 300);
        });

        if($('#setModalCV').length > 0) {
            var modalHTML = $('#setModalCV').html();
            $('#setModalCV').remove();
            $('#insertModal').html(modalHTML);
        }


        function arrayRemove(arr, value) { 
            return arr.filter(function(ele){ 
                return ele != value; 
            });
        }
        
        var cursosArray = [];
        var retirosArray = [];
        var setCursos = false;
        var setRetiros = false;
        $('.checkbox-component').on('click', function() {
            $(this).toggleClass('active');
            if($(this).hasClass('active')) {
                console.log('Add');
                if ($(this).attr('data-type') == 'curso') {
                    cursosArray.push($(this).find('.checkbox-text').text());
                    $('#cursos').val(cursosArray);
                }
                if ($(this).attr('data-type') == 'retiro') {
                    retirosArray.push($(this).find('.checkbox-text').text());
                    $('#retiros').val(retirosArray);
                }
            } else {
                console.log('Remove');
                if ($(this).attr('data-type') == 'curso') {
                    cursosArray = arrayRemove(cursosArray, $(this).find('.checkbox-text').text());
                    $('#cursos').val(cursosArray);
                }
                if ($(this).attr('data-type') == 'retiro') {
                    retirosArray = arrayRemove(retirosArray, $(this).find('.checkbox-text').text());
                    $('#retiros').val(retirosArray);
                }
            }
        });

        $('.trigger-courses').on('click', function() {
            $(this).toggleClass('active');
            if(!setCursos) {
                setCursos = true;
            } else {
                setCursos = false;
            }
            console.log(setCursos);
            $('.select-courses').toggle('fast');

            if(!setCursos) {
                $('.checkbox-component[data-type="curso"]').removeClass('active');
                cursosArray = [];
                $('#cursos').val(cursosArray);
            }
        });

        $('.trigger-retiros').on('click', function() {
            $(this).toggleClass('active');
            if(!setRetiros) {
                setRetiros = true;
            } else {
                setRetiros = false;
            }
            console.log(setRetiros);
            $('.select-retiros').toggle('fast');

            if(!setRetiros) {
                $('.checkbox-component[data-type="retiro"]').removeClass('active');
                retirosArray = [];
                $('#retiros').val(retirosArray);
            }
        });

        /*
        // animate logo Psyke page
        */
        if($('body').hasClass('page-id-39')) {
            //console.log('Page ID = 39');
            var logotype = $('.anim-logotipo-psyke');
            var logotypeNavbar = $('.page-id-39 .navbar-brand');
            var logotypeWidth = 720;

            if ($(window).width() > 340 && $(window).width() < 768) {
                logotypeWidth = 320;
            } else {
                logotypeWidth = 240;
            }

            var positionFinal = $('#main-nav .navbar-brand').offset();
            var finalX = positionFinal.left - 48;
            console.log(`FinalX ${finalX}`);
            var finalY = positionFinal.top - 48;
            var initialX = finalX;
            console.log(`FinalY ${finalY}`);

            var initialY = $('.hero-psyke').height() - logotypeWidth - 42;
            var initialYStart = initialY + 250;

            gsap.set(logotype, { y: initialYStart, x: initialX, width: logotypeWidth, transformOrigin: "50% 50%"});
            gsap.set(logotypeNavbar, {opacity: 0, transformOrigin: "50% 50%"}); 

            gsap.to(logotype, {autoAlpha: 1, y: initialY, duration: 0.75, delay: 1.5, ease: "power2.out"});
            //gsap.to(logotype, {y: finalY, width: 96, duration: 0.3, delay: 2.75, ease: "power4.out"});
            gsap.to(logotype, {autoAlpha: 0, y: initialYStart, duration: 0.75, delay: 4, ease: "power2.out"});

            gsap.to(logotypeNavbar, {opacity: 1, duration: 0.75, delay: 4, ease: "power2.out"});

        }

        if($('body').hasClass('no-touchevents')) {
            if($('.follow-thumbnail').length > 0) {
                var cursor = $(".follow-thumbnail");
                console.log(`Cursor ${cursor}`);
                var posX = 0,
                    posY = 0;

                var mouseX = 0,
                    mouseY = 0;

                //TweenMax.to({}, 0.016, {
                gsap.to({}, 0.016, {
                    repeat: -1,
                    onRepeat: function () {
                        posX += (mouseX - posX) / 9;
                        posY += (mouseY - posY) / 9;

                        gsap.set(cursor, {
                            css: {
                                left: mouseX,
                                top: mouseY
                            }
                        });
                    }
                });

                $(document).on("mousemove", function (e) {
                    mouseX = e.clientX;
                    mouseY = e.clientY;
                });
                // yellow circle
                $(".wpp-list li").on("mouseenter", function () {
                    cursor.addClass("active");
                    var elImageSource = $(this).find('img').attr('src');
                    console.log(`URL image: ${elImageSource}`);
                    cursor.css({
                        'background-image' : elImageSource
                    });
                });
                $(".wpp-list li").on("mouseleave", function () {
                    cursor.removeClass("active");
                });
                // .FOLLOW MOUSE
            }
        }
 
        /*
        // LOADING AJAX
        //
        // List of Contact Form 7 Custom DOM Events
        // wpcf7invalid — Fires when an Ajax form submission has completed successfully, but mail hasn’t been sent because there are fields with invalid input.
        // wpcf7spam — Fires when an Ajax form submission has completed successfully, but mail hasn’t been sent because a possible spam activity has been detected.
        // wpcf7mailsent — Fires when an Ajax form submission has completed successfully, and mail has been sent.
        // wpcf7mailfailed — Fires when an Ajax form submission has completed successfully, but it has failed in sending mail.
        // wpcf7submit — Fires when an Ajax form submission has completed successfully, regardless of other incidents.
        //
        */


        /*
        // REDIRECT AND LOADING EFFECTS
        */

        var baseURL = (window.location.hostname == 'developlaclave.es') ? `https://${window.location.hostname}/develop/psyke` : `https://${window.location.hostname}`;

        //form user
        if ($('#wpcf7-f443-p445-o1').length > 0) {
            document.addEventListener('wpcf7mailsent', function (event) {
                location = `${baseURL}/gracias-por-ponerte-en-contacto/`;
            }, false);
        }

        //form contact
        if ($('#wpcf7-f5-p80-o1').length > 0) {
            document.addEventListener('wpcf7mailsent', function (event) {
                location = `${baseURL}/gracias-por-ponerte-en-contacto/`;
            }, false);
        }

        //form retiro
        if ($('#form-retiro').length > 0) {
            
            var courseDatesSpaces = $('.info-item--dates .info-item--body').text();
            var courseDates = $.trim(courseDatesSpaces);

            var courseLanguageSpaces = $('.info-item--language .info-item--body').text();
            var courseLanguage = $.trim(courseLanguageSpaces);

            var coursePlaceSpaces = $('.info-item--place .info-item--body').text();
            var coursePlace = $.trim(coursePlaceSpaces);

            var coursePriceSpaces = $('.info-item--price .info-item--body').text();
            var coursePrice = $.trim(coursePriceSpaces);

            var courseTitle = $('.card-header h3').text()
            
            $('#courseID').val($('.card-default--retreat').attr('data-retiro'));
            $('#courseTitle').val(courseTitle);
            $('#courseDates').val(courseDates);
            $('#courselanguage').val(courseLanguage);
            $('#coursePlace').val(coursePlace);
            $('#coursePrice').val(coursePrice);

            var payment = $('#retreatPaymentMethod').attr('data-payment');
            if (payment) {
                $('#payment-method--info .payment-method--info-text').html($('#retreatPaymentMethod').html());
            } else {
                $('#payment-method--info').remove();
            }
            
            var classRoom = $('#retreatClassroom').attr('data-classroom');
            var online = $('#retreatOnline').attr('data-online');

            if (classRoom === 'true' && online === 'true') {
                
            } else {
                if (classRoom === 'true') {
                   $('#modeRetreat .wpcf7-list-item.last input').click();
                } 
                if (online === 'true') {
                   $('#modeRetreat .wpcf7-list-item.first input').click();
                } 
                $('#modeRetreat').css({
                    'display' : 'none'
                });
            }

            //submit form
            document.addEventListener('wpcf7mailsent', function (event) {
                var courseTitleURL = encodeURI(courseTitle);
                location = `${baseURL}/gracias-retiros/?retiro=${courseTitleURL}`;
            }, false);
            
        }
        //form curso
        if ($('#form-curso').length > 0) {
            
            var courseDatesSpaces = $('.info-item--dates .info-item--body').text();
            var courseDates = $.trim(courseDatesSpaces);

            var courseLanguageSpaces = $('.info-item--language .info-item--body').text();
            var courseLanguage = $.trim(courseLanguageSpaces);

            var coursePlaceSpaces = $('.info-item--place .info-item--body').text();
            var coursePlace = $.trim(coursePlaceSpaces);

            var coursePriceSpaces = $('.info-item--price .info-item--body').text();
            var coursePrice = $.trim(coursePriceSpaces);

            var courseTitle = $('.card-header h3').text()
            
            $('#courseID').val($('.card-default--course').attr('data-course'));
            $('#courseTitle').val(courseTitle);
            $('#courseDates').val(courseDates);
            $('#courselanguage').val(courseLanguage);
            $('#coursePlace').val(coursePlace);
            $('#coursePrice').val(coursePrice);

            var payment = $('#coursePaymentMethod').attr('data-payment');
            if (payment) {
                $('#payment-method--info .payment-method--info-text').html($('#coursePaymentMethod').html());
            } else {
                $('#payment-method--info').remove();
            }
            
            var classRoom = $('#courseClassroom').attr('data-classroom');
            var online = $('#courseOnline').attr('data-online');

            if (classRoom === 'true' && online === 'true') {
                
            } else {
                if (classRoom === 'true') {
                   $('#modeCourse .wpcf7-list-item.last input').click();
                } 
                if (online === 'true') {
                   $('#modeCourse .wpcf7-list-item.first input').click();
                } 
                $('#modeCourse').css({
                    'display' : 'none'
                });
            }

            //submit form
            document.addEventListener('wpcf7mailsent', function (event) {
                var courseTitleURL = encodeURI(courseTitle);
                location = `${baseURL}/gracias-cursos/?curso=${courseTitleURL}`;
            }, false);
            
        }


        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
        
        
        if ($('body').hasClass('page-id-3812')) {
            var retreatName = getUrlParameter('retiro');
            $('#retiroName').text(decodeURI(retreatName));
        }

        if ($('body').hasClass('page-id-3922')) {
            var courseName = getUrlParameter('curso');
            $('#courseName').text(decodeURI(courseName));
        }
        

    });	//ready

    $(window).scroll(collapseNavbar);
    $(document).ready(collapseNavbar);


    $(window).resize(function () {
        collapseNavbar();
        watchComponentValores();
        setPaddingBottomBody();
    });

})(jQuery);
