<?php global $shortname; ?>
	<!-- jQuery Script -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.7.1.min.js"></script>
 
<!-- Nivo Slider Script -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>
 
<!-- Nivo Slider Function -->
<script type="text/javascript">
$(window).load(function() {
var total = $('#DIVNAME img').length;
var rand = Math.floor(Math.random()*total);
$('#DIVNAME').nivoSlider({
effect:'fade', //Specify sets like: 'fold,fade,sliceDown'
animSpeed:800, //Slide transition speed
pauseTime:8000,
directionNav:false, //Next and Prev
controlNav:false, //1,2,3...
pauseOnHover:false, //Stop animation while hovering
captionOpacity:1, //Universal caption opacity
startSlide:rand
});
});
</script>