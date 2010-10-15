<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => true
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

// Unleash the power of Thematic's dynamic classes
// 
// define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
// define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
//
// define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
//
// define('THEMATIC_COMPATIBLE_FEEDLINKS', true);

// This will create your widget area
function my_widgets_init() {
    register_sidebar(array(
        'name' => 'Header Aside',
        'id' => 'header-aside',
        'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
        'after_widget' => "",
        'before_title' => "<h3 class=\"widgettitle\">",
        'after_title' => "</h3>\n",
    ));

}
add_action( 'init', 'my_widgets_init' );

// adding the widget area to your child theme
function my_header_widgets() {
if ( function_exists('dynamic_sidebar') && is_sidebar_active('header-aside') ) {
    echo '<div id="header-aside" class="aside">'. "\n" . '<ul class="xoxo">' . "\n";
    dynamic_sidebar('header-aside');
    echo '' . "\n" . '</div><!-- #header-aside .aside -->'. "\n";
    echo "\n" . '</div><!-- #header-box -->'. "\n";
}
}
add_action('thematic_header', 'my_header_widgets', 8);

function remove_branding() {
    remove_action('thematic_header','thematic_brandingopen',1);
}
add_action('init', 'remove_branding');

function my_brandingopen() { ?>
    <div id="header_box">
        <div id="branding">
<?php }
add_action('thematic_header','my_brandingopen',1);

?>
