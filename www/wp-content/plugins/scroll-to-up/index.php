<?php
/*
Plugin Name: Scroll To Up
Plugin URI: http://plugin.rayhan.info
Description: Scroll To Up is a lightweight plugin that creates a full customizable "Scroll to top / Back to top" feature in your WordPres site
Version: 1.0
Author: Rayhan
Author URI: http://www.facebook.com/rayhan095
License: GPL2
*/

/**
 * Copyright (c) 2015 Rayhan (rayhan095@gmail.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

function scroll_to_up_scripts(){
		
	//----------------------------------------------
	//	Include king Countdowner css file
	//----------------------------------------------
	wp_register_style( 'scroll_to_up', plugin_dir_url(__FILE__).'assets/css/font-awesome.min.css', '', '4.4.0', 'all' );
	wp_enqueue_style('scroll_to_up');
	
	
	//----------------------------------------------
	//	Include king Countdowner javascript file
	//----------------------------------------------
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'scroll_to_up_js',  plugin_dir_url(__FILE__).'assets/jquery.scrollUp.min.js', array('jquery'), '1.0', true );
	
	
}
add_action('wp_enqueue_scripts','scroll_to_up_scripts');
function scroll_to_up_css_controller(){ ?>
<style type="text/css">


#scroll_to_up {padding: 10px 20px;}
<?php 
	/*-------------------------------------------------------------
			Define Scrollup button position
	-------------------------------------------------------------*/
	$position = stp_option('scrollUp_position','scroll_to_up_basic',1);
	
	if($position == 1){ 
		echo '/*position : Bottom right*/#scroll_to_up {bottom: 20px;right: 20px;}';
	}
	if($position == 2){
		echo '/*position : Bottom left*/#scroll_to_up {bottom: 20px;left: 20px;}';
	}
	if($position == 3){
		echo '/*position : Vertically middle left*/#scroll_to_up {top: 45%;left: 20px;}';
	}
	if($position == 4){
		echo '/*position : Vertically middle right*/#scroll_to_up {top: 45%;right: 20px;}';
	}
	/*-------------------------------------------------------------
			Simple Text Method
	-------------------------------------------------------------*/
	$stp_method = stp_option('select_scroll_to_top_style','scroll_to_up_basic');
	$text_method = stp_option('select_scroll_to_top_style','scroll_to_up_basic',1);
	if($text_method == 1){
		echo '#scroll_to_up {
				background-color: '.stp_option('simple_text_method_bg_color','simple_text_method','#555').';
				color: '.stp_option('simple_text_method_font_color','simple_text_method','#fff').';
				font-size: '.stp_option('simple_text_method_font_size','simple_text_method','18').'px;
			}
			#scroll_to_up:hover {
				background-color: '.stp_option('simple_text_method_hover_color','simple_text_method','#999').';
			}
			';
	}
	/*-------------------------------------------------------------
			FontAwesome Icon Method
	-------------------------------------------------------------*/
	if($stp_method == 2){
		echo '#scroll_to_up {
				background-color: '.stp_option('fa_method_bg_color','fa_method','#555').';
				color: '.stp_option('fa_method_font_color','fa_method','#fff').';
				font-size: '.stp_option('fa_method_font_size','fa_method','18').'px;

			}
			#scroll_to_up:hover {
				background-color: '.stp_option('fa_method_hover_color','fa_method','#999').';
			}
			';
	}
	/*-------------------------------------------------------------
		  Image Arrow Method 
	-------------------------------------------------------------*/
	if($stp_method == 3){
		echo '#scroll_to_up{
				background-image: url("'.plugin_dir_url(__FILE__).'assets/arrows/'.stp_option('select_image_arrow','image_method',1).'.png");
				width: '.stp_option('arrow_image_width','image_method',50).'px; 
				height: '.stp_option('arrow_image_height','image_method',50).'px;
				background-size: 100% 100%;
			}';
	}
	/*-------------------------------------------------------------
		  Upload Image Arrow Method
	-------------------------------------------------------------*/
	$default_img = plugin_dir_url(__FILE__).'assets/arrows/up-128.png';
	if( $stp_method == 4){
		echo '#scroll_to_up{
			background-image: url("'.stp_option('upload_arrow_image','upload_image_method',$default_img).'");
			width: '.stp_option('upload_arrow_image_width','upload_image_method',50).'px; 
			height: '.stp_option('upload_arrow_image_height','upload_image_method',50).'px;
			background-size: 100% 100%;
			}';
	}
?>
</style>

<?php } add_action('wp_head','scroll_to_up_css_controller');



function scroll_to_up_activation(){ ?>
	
<script type="text/javascript">
jQuery(function () {
      jQuery.scrollUp({
		// Element ID
        scrollName: 'scroll_to_up', 
		// Distance from top/bottom before showing element (px)
        scrollDistance: <?php echo stp_option('scrollDistance','scroll_to_up_basic',300); ?>,
		// 'top' or 'bottom'
        scrollFrom: 'top',     
		// Speed back to top (ms)	
        scrollSpeed: <?php echo stp_option('scrollSpeed','scroll_to_up_basic',300); ?>, 
		// Scroll to top easing (see http://easings.net/)	
        easingType: 'linear',        
		// Fade, slide, none
        animation: '<?php echo stp_option('animation','scroll_to_up_basic','fade'); ?>',      
		// Animation speed (ms)	
        animationSpeed: 200,   
		// Text for element, can contain HTML
		
		scrollText: '<?php 
		if( stp_option('select_scroll_to_top_style','scroll_to_up_basic',1) == 1){
			echo stp_option('scrollText','simple_text_method','Scroll To Up');
		}
		if( stp_option('select_scroll_to_top_style','scroll_to_up_basic') == 2){
			echo '<i class="fa fa-'.stp_option('fa_method_icon_name','fa_method','angle-double-up').'"></i>';
		}	
		?>',
		
        scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
        scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
        scrollTitle: false,          // Set a custom <a> title if required.
        scrollImg: false,            // Set true to use image
        activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647           // Z-Index for the overlay
    });
	
});
</script>
	
<?php } add_action('wp_footer','scroll_to_up_activation');


//-----------------------------------------------------------------------------------
//  Scroll To Up Settings page
//-----------------------------------------------------------------------------------
require_once dirname( __FILE__ ) . '/admin/class.settings-api.php';
require_once dirname( __FILE__ ) . '/admin/scroll-to-up-settings.php';
new Scroll_To_Up();

//-----------------------------------------------------------------------------------
//  Add Follow Button in Settings page
//-----------------------------------------------------------------------------------

function scroll_to_up_admin_header_script(){?>
<!-- Facebook header from scroll-to-up plugin -->

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=580763681972670";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
<style type="text/css">
.settings_page_scroll-to-up .metabox-holder h3 {
    font-size: 28px !important;
    border: 1px solid #ccc;
    display: inline-block;
    margin-top: 30px;
	background-color:#fff;
}
.settings_page_scroll-to-up .fb-follow-me{
	border: 3px solid #43609C;
	padding: 20px;
	display:inline-block;
	background-color: #fff;
}
.settings_page_scroll-to-up .stp-col-left {
    width: 68%;
    float: left;
    overflow: hidden;
    margin-right: 2%;
}
.settings_page_scroll-to-up .stp-col-right{
	
}


label[for^="wpuf-scroll_to_up_basic"]{
	display:block !important;
}

.settings_page_scroll-to-up label[for^="wpuf-image_method[select_image_arrow]"] {
	padding: 10px;
}
.settings_page_scroll-to-up label[for^="wpuf-image_method[select_image_arrow]"] input[checked="checked"]{

}

</style>
<?php }add_action('admin_head','scroll_to_up_admin_header_script');



//-----------------------------------------------------------------------------------
//  Show setting page link under plugin at plugin menu
//-----------------------------------------------------------------------------------
function scroll_to_up_settings_link( $links ) {
    $settings_link = '<a href="options-general.php?page=scroll-to-up.php">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'scroll_to_up_settings_link' );



//-----------------------------------------------------------------------------------
//  Redirect to plugin setting page after plugin activation
//-----------------------------------------------------------------------------------
register_activation_hook(__FILE__, 'scroll_to_up_plugin_activate');
add_action('admin_init', 'scroll_to_up_plugin_redirect');

function scroll_to_up_plugin_activate() {
    add_option('scroll_to_up_plugin_do_activation_redirect', true);
}

function scroll_to_up_plugin_redirect() {
    if (get_option('scroll_to_up_plugin_do_activation_redirect', false)) {
        delete_option('scroll_to_up_plugin_do_activation_redirect');
        wp_redirect('options-general.php?page=scroll-to-up.php');
    }
}