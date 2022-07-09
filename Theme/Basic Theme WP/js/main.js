jQuery(document).ready(function() {
    
    // Initiate the wowjs animation library
    new WOW().init();
  
    // Header scroll class
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('#header').addClass('header-scrolled');
      } else {
        $('#header').removeClass('header-scrolled');
      } 
    });
  
    if ($(window).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    }
  
    // Smooth scroll for the navigation and links with .scrollto classes
    $('.main-nav a, .mobile-nav a, .scrollto').on('click', function() {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        if (target.length) {
          var top_space = 0;
  
          if ($('#header').length) {
            top_space = $('#header').outerHeight();
  
            if (! $('#header').hasClass('header-scrolled')) {
              top_space = top_space - 40;
            }
          }
  
          $('html, body').animate({
            scrollTop: target.offset().top - top_space
          }, 1500, 'easeInOutExpo');
  
          if ($(this).parents('.main-nav, .mobile-nav').length) {
            $('.main-nav .active, .mobile-nav .active').removeClass('active');
            $(this).closest('li').addClass('active');
          }
  
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('fa-times fa-bars');
            $('.mobile-nav-overly').fadeOut();
          }
          return false;
        }
      }
    });

    var PortfolioPage = function () {
        return {
            init: function () {
                $('.sorting-grid').mixitup();
            }
        };
    }();
  
    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.main-nav, .mobile-nav');
    var main_nav_height = $('#header').outerHeight();
  
    $(window).on('scroll', function () {
      var cur_pos = $(this).scrollTop();
    
      nav_sections.each(function() {
        var top = $(this).offset().top - main_nav_height,
            bottom = top + $(this).outerHeight();
    
        if (cur_pos >= top && cur_pos <= bottom) {
          main_nav.find('li').removeClass('active');
          main_nav.find('a[href="#'+$(this).attr('id')+'"]').parent('li').addClass('active');
        }
      });
    });

    $('.banner').revolution({
      delay:9000,
      startwidth:960,
      startheight:500,
      startWithSlide:0,

      fullScreenAlignForce:"off",
      autoHeight:"off",

      shuffle:"off",

      onHoverStop:"on",

      thumbWidth:100,
      thumbHeight:50,
      thumbAmount:3,

      hideThumbsOnMobile:"off",
      hideNavDelayOnMobile:1500,
      hideBulletsOnMobile:"off",
      hideArrowsOnMobile:"off",
      hideThumbsUnderResoluition:0,

      hideThumbs:0,
      hideTimerBar:"off",

      keyboardNavigation:"on",

      navigationType:"bullet",
      navigationArrows:"solo",
      navigationStyle:"round",

      navigationHAlign:"center",
      navigationVAlign:"bottom",
      navigationHOffset:30,
      navigationVOffset:30,

      soloArrowLeftHalign:"left",
      soloArrowLeftValign:"center",
      soloArrowLeftHOffset:20,
      soloArrowLeftVOffset:0,

      soloArrowRightHalign:"right",
      soloArrowRightValign:"center",
      soloArrowRightHOffset:20,
      soloArrowRightVOffset:0,


      touchenabled:"on",
      swipe_velocity:"0.7",
      swipe_max_touches:"1",
      swipe_min_touches:"1",
      drag_block_vertical:"false",

      parallax:"mouse",
      parallaxBgFreeze:"on",
      parallaxLevels:[10,7,4,3,2,5,4,3,2,1],

      stopAtSlide:-1,
      stopAfterLoops:-1,
      hideCaptionAtLimit:0,
      hideAllCaptionAtLilmit:0,
      hideSliderAtLimit:0,

      dottedOverlay:"none",

      spinned:"spinner4",

      fullWidth:"on",
      forceFullWidth:"off",
      fullScreen:"on",
      fullScreenOffsetContainer:"#topheader-to-offset",

      shadow:0

   });
   
    $('.counter').counterUp({
      delay: 10,
      time: 4000
    });
    $(window).on('load', function () {
      var portfolioIsotope = $('.portfolio-container').isotope({
      itemSelector: '.portfolio-item'
      });
      $('#portfolio-flters li').on( 'click', function() {
      $("#portfolio-flters li").removeClass('filter-active');
      $(this).addClass('filter-active');
  
      portfolioIsotope.isotope({ filter: $(this).data('filter') });
      });
  });
    $('.techno_wrappr').owlCarousel({
        loop:true,
        nav:true,
        margin:10,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:2000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:4
            },
            1000:{
                items:8
            }
        }
    });
    $('.testi_wrapr').owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    $('.home_blog').owlCarousel({
        loop:true,
        nav:true,
        margin:10,
        dots:false,
        navText : ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });
    
  });
  