var theInt = null;  
        var $crosslink, $navthumb;  
        var curclicked = 0;  
  
        theInterval = function(cur){  
            clearInterval(theInt);  
  
            if( typeof cur != 'undefined' )  
                curclicked = cur;  
            $crosslink.removeClass("active-thumb");  
            jQuery(".the_title").fadeOut("normal");  
            $navthumb.eq(curclicked).parent().addClass("active-thumb");  
            jQuery(".the_title").fadeIn("normal");  
                jQuery(".stripNav ul li a").eq(curclicked).trigger('click');  
  
            theInt = setInterval(function(){  
  
                $crosslink.removeClass("active-thumb");  
                jQuery(".the_title").fadeOut("normal");  
                $navthumb.eq(curclicked).parent().addClass("active-thumb");  
                jQuery(".the_title").fadeIn("normal");  
                jQuery(".stripNav ul li a").eq(curclicked).trigger('click');  
                curclicked++;  
                if( 5 == curclicked )  
                    curclicked = 0;  
            }, 5000);  
        };  
  
        jQuery(function(){  
  
            jQuery("#main-photo-slider").codaSlider();  
  
            $navthumb = jQuery(".nav-thumb");  
            $crosslink = jQuery(".cross-link");  
  
            $navthumb  
            .click(function() {  
                var $this = jQuery(this);  
                theInterval($this.attr('href').slice(1) - 1);  
                return false;  
            });  
  
            theInterval();  
        });  