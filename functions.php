<?php
add_action( 'after_setup_theme', 'kj_setup' );
function kj_setup() {
load_theme_textdomain( 'kj', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( ! isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'kj' ) ) );
}
add_action( 'wp_enqueue_scripts', 'kj_load_scripts' );
function kj_load_scripts() {
wp_enqueue_style( 'kj-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}
add_action( 'wp_footer', 'kj_footer_scripts' );
function kj_footer_scripts() {
?>
<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'kj_document_title_separator' );
function kj_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'kj_title' );
function kj_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'the_content_more_link', 'kj_read_more_link' );
function kj_read_more_link() {
if ( ! is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
}
}
add_filter( 'excerpt_more', 'kj_excerpt_read_more_link' );
function kj_excerpt_read_more_link( $more ) {
if ( ! is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
}
}
add_filter( 'intermediate_image_sizes_advanced', 'kj_image_insert_override' );
function kj_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
return $sizes;
}
add_action( 'widgets_init', 'kj_widgets_init' );
function kj_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'kj' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'kj_pingback_header' );
function kj_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'kj_enqueue_comment_reply_script' );
function kj_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function kj_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'kj_comment_count', 0 );
function kj_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


//add css file
function kj_add_styles() {
  $url=get_template_directory_uri();
	$styles = array(
	    'styles' => $url . '/web/css/kj.css',
	);
     foreach( $styles as $k => $v ){
        wp_register_style( $k, $v, false );
        wp_enqueue_style($k);
    } 
}
add_action( 'wp_enqueue_scripts', 'kj_add_styles' );  


//add js file
function kj_add_js() {
  $url=get_template_directory_uri();
	$styles = array(
	    'add-to-cart' => $url . '/web/js/kj.js',
	);
     foreach( $styles as $k => $v ){
        wp_enqueue_script($k,$v,array('jquery'),true);
        wp_localize_script($k,'url',$url);
    } 
    
}
add_action( 'wp_enqueue_scripts', 'kj_add_js' );  


//add svg
function my_custom_mime_types( $mimes ) {
 
// New allowed mime types.
$mimes['svg'] = 'image/svg+xml';
 
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );


