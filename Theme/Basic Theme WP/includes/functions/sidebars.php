<?php

if ( function_exists('register_sidebar') )

    register_sidebar(array(

		'name' => 'Sidebar',

		'before_widget' => '<div id="%1$s" class="widget sidebar-block %2$s">',

		'after_widget' => '</div> <!-- end .widget -->',

		'before_title' => '<h3 class="widgettitle">',

		'after_title' => '</h3>',

    ));

	

if ( function_exists('register_sidebar') )

    register_sidebar(array(

		'name' => 'Sidebar-Home',

		'before_widget' => '<div id="%1$s" class="widget sidebar-block %2$s">',

		'after_widget' => '</div> <!-- end .widget -->',

		'before_title' => '<h3 class="widgettitle">',

		'after_title' => '</h3>',

    ));

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer-One',
		'before_widget' => '<div id="%1$s" class="col-md-3 md-margin-bottom-40">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<div class="headline"><h2>',
		'after_title' => '</h2></div>',
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer-Links',
		'before_widget' => '<div id="%1$s" class="col-md-2 md-margin-bottom-40">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<div class="headline"><h2>',
		'after_title' => '</h2></div>',
    ));
if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Footer-ContactUS',
		'before_widget' => '<div id="%1$s" class="col-md-3 md-margin-bottom-40">',
		'after_widget' => '</div> <!-- end .widget -->',
		'before_title' => '<div class="headline"><h2>',
		'after_title' => '</h2></div>',
    ));

?>