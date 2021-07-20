<?php

/*
Plugin Name: School System Plugin
Plugin URL: 
Description: Example plugin for Schools
Version: 1.0
Author: Shilpi
Author URI: https://achimo.in/


*/

//define variable for path to this plugin file.

if(! defined('ABSPATH')){
die; 
};

global $plugin;
$plugin = plugin_basename(__FILE__);

add_action("admin_menu","addMenu");
add_action('init', 'shortcode_functions_init');
add_filter("plugin_action_links_$plugin", 'settings_link');

function settings_link($links){
    //add custom links
    $settings_link = '<a href="admin.php?page=sc_system">Settings</a>';
    array_push($links, $settings_link);

    return $links;
}

function addMenu(){
    $my_hook = add_menu_page('School_System', 'School_System','manage_options','sc_system', 'schoolmenu','dashicons-store',4);
//add_submenu_page('sc_system', null, 'submenuitem', 'manage_options', 'submenuitemslug','addhomepage');
    add_action( 'load-'.$my_hook, 'load_scripts' );
}

function load_scripts ()
{
  add_action( 'admin_enqueue_scripts', 'enqueue_bootstrap' );
}

function enqueue_bootstrap()
{
  wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');

  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, false);
    
  wp_enqueue_script('bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), null, true);
}

function schoolmenu(){
    require_once plugin_dir_path(__FILE__).'home.php';
}

function addhomepage(){
echo "This is a home page.";
}

function shortcode_functions_init() {
add_shortcode('myshortcode', 'shortcode_funct1');
}



function shortcode_funct1($atts){

$wporg_atts = shortcode_atts(
array(
'title' => 'demoinst',
), $atts
);
echo $wporg_atts['title'];
$url = 'http://'.$wporg_atts['title'].'.ruhcom.in/course-service/api/popular_courses';
$arguments = array(
'method' => 'GET',
);

$response = wp_remote_get($url, $arguments);

if(is_wp_error($response)){
$error_message = $response->get_error_message();
echo 'Wrong';
}

$results = json_decode(wp_remote_retrieve_body($response));
$results = $results->data;

$results = json_decode(wp_remote_retrieve_body($response));
$results = $results->data;
$html = '';
$html .= '<div class="top-content">';
$html .= '<div class="container-fluid">';
$html .= '<div id="carousel-example" class="carousel slide" data-ride="carousel">';
$html .= '<div class="carousel-inner row w-100 mx-auto" role="listbox">';
$i=0;
foreach( $results as $result => $i_value){
if($i == 0) {
$activeClass = 'active';
}
else {
$activeClass = '';
}
$html .= '<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 '.$activeClass.'">';
$html .= '<img src= "https://i.picsum.photos/id/0/300/180.jpg?hmac=_3gnK7IIm3bRbABtTJh41u27cpANFCexVXzR32STMeg" class="img-fluid mx-auto d-block" alt="img1"/>';
$html .= '<div style="padding:10px"><div><span>'.$i_value->name.'</span></div>';
$html .= '<div><span class="text-dark"> By '.$i_value->owner->firstName.' '.$i_value->owner->lastName.'</span></div>';
$html .= '<div><span><img style="width:58%; height:40px; padding:10px 10px 10px 0px" src="http://demoinst.ruhcom.in/_next/static/images/rating-1b73b09b3aaef0327024e78a866ba4f7.png"/></span></div>';
$html .= '<div style= "display:flex; color:#404040; font-size:12px">
<div style="margin:0 4px 0 0">
<div>Live batches</div>
<div><b>2</b></div>
</div>
<div style="margin:0 4px 0 0">
<div>Batches open</div>
<div><b>2</b></div>
</div>
<div>
<div>Students enrolled</div>
<div><b>2</b></div>
</div>
</div>';
$html .= '<div><span>'.$i_value->fees->pricings[0]->currency.' '.$i_value->fees->pricings[0]->amount.'</span></div></div>';
$html .= '<div><a href="http://demoinst.ruhcom.in/course/'.$i_value->slug.'" class="text-decoration-none" target="_blank"><input type="button" class="btn btn-primary btn-lg btn-block text-white" value="View Course"/></a></div>';
$html .= '</div>';
$i++;
}

$html .= '</div>';
$html .= '<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">';
$html .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
$html .= '<span class="sr-only">Previous</span>';
$html .= '</a>';
$html .= '<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">';
$html .= '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
$html .= '<span class="sr-only">Next</span>';
$html .= '</a>';
$html .= '</div>';
$html .= '</div>';
$html .= '</div>';
return $html;

}

?>

