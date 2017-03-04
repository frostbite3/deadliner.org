<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('Scroll_To_Up' ) ):
class Scroll_To_Up {

    private $settings_api;

    function __construct() {
        $this->settings_api = new WeDevs_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }
    function admin_menu() {
        add_options_page( 'Scroll To Up', 'Scroll To Up', 'manage_options', 'scroll-to-up.php', array($this, 'scroll_up_plugin_page') );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id' => 'scroll_to_up_basic',
                'title' => 'Basic Settings',
            ),
            array(
                'id' => 'simple_text_method',
                'title' => 'Simple Text',
            ),
            array(
                'id' => 'fa_method',
                'title' => 'FontAwesome Icon',
            ),
            array(
                'id' => 'image_method',
                'title' => 'Image Arrow',
            ),
            array(
                'id' => 'upload_image_method',
                'title' => 'Your Own Image',
            ),
        );
        return $sections;
    }


    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
			//------------------------------------------------
			//      Basic Settings
			//------------------------------------------------
            'scroll_to_up_basic' => array(
                array(
                    'name'              => 'scrollDistance',
                    'label'             => 'Scroll Distance',
                    'desc'              => 'Distance from top/bottom before showing element (px)',
                    'type'              => 'number',
                    'default'           => '300',
                ),
                array(
                    'name'              => 'scrollSpeed',
                    'label'             => 'Scroll Speed',
                    'desc'              => 'Speed back to top (ms)',
                    'type'              => 'number',
                    'default'           => '300',
                ),
                array(
                    'name'              => 'animation',
                    'label'             => 'Button Animation',
                    'desc'              => 'ScrollUp button show and hide animation',
                    'type'              => 'select',
                    'default'           => 'fade',
					'options' => array(
                        'fade' => 'Fade',
                        'slide'  => 'Slide',
                        'none'  => 'None'
                    )
                ),
                array(
                    'name'    => 'scrollUp_position',
                    'label'   => 'Scroll Up Button position',
                    'desc'    => 'Select Scroll to up button position',
                    'type'    => 'radio',
                    'default'    => '1',
                    'options' => array(
                        '1' => 'Bottom right',
                        '2' => 'Bottom left',
                        '3' => 'Vertically middle left',
                        '4' => 'Vertically middle right'
                    )
                ),
                array(
                    'name'    => 'select_scroll_to_top_style',
                    'label'   => 'Select "Scroll To Up" Method',
                    'desc'    => '',
                    'type'    => 'radio',
                    'default'    => '1',
                    'options' => array(
                        '1' => 'Simple Text',
                        '2' => 'FontAwesome Icon',
                        '3' => 'Image Arrow',
                        '4' => 'Your own Image',
                    )
                ),
            ),
			//------------------------------------------------
			//      Simple Text
			//------------------------------------------------
			'simple_text_method' => array(
				array(
					'name' => 'scrollText',
					'label' => 'Scroll To Up button Label',
					'type' => 'text',
					'default' => 'Scroll To Up'
				),
				array(
					'name' => 'simple_text_method_font_color',
					'label' => 'Font Color',
					'type' => 'color',
					'default' => '#fff',
				),
				array(
					'name' => 'simple_text_method_font_size',
					'label' => 'Font Size',
					'type' => 'number',
					'default' => '18',
					'desc' => 'Scroll to up button font size in (px)'
				),
				array(
					'name' => 'simple_text_method_bg_color',
					'label' => 'Backgrround color',
					'type' => 'color',
					'default' => '#555'
				),
				array(
					'name' => 'simple_text_method_hover_color',
					'label' => 'Hover color',
					'type' => 'color',
					'default' => '#999'
				),
			
			),
			//------------------------------------------------
			//     FontAwesome Icon
			//------------------------------------------------
			'fa_method' => array(
				array(
					'name' => 'fa_method_icon_name',
					'label' => 'FontAwesome Icon name',
					'type' => 'text',
					'default' => 'angle-double-up',
					'desc' => 'Input here FontAwesome icon name. You have to put icon formal here. Suppose you want to put <code>fa-angle-up</code> then you will put here just <code>angle-up</code>. <br /> Here is the of FontAwesome icon list >> <a href="https://fortawesome.github.io/Font-Awesome/icons/">Click Here</a> '
				),
				array(
					'name' => 'fa_method_font_color',
					'label' => 'Font Color',
					'type' => 'color',
					'default' => '#fff',
				),
				array(
					'name' => 'fa_method_font_size',
					'label' => 'Font Size',
					'type' => 'number',
					'default' => '18',
					'desc' => 'Scroll to up button font size in (px)'
				),
				array(
					'name' => 'fa_method_bg_color',
					'label' => 'Background color',
					'type' => 'color',
					'default' => '#555'
				),
				array(
					'name' => 'fa_method_hover_color',
					'label' => 'Hover color',
					'type' => 'color',
					'default' => '#999'
				),
			
			),
			//------------------------------------------------
			//     Image Arrow
			//------------------------------------------------
			'image_method' => array(
				array(
					'name' => 'arrow_image_height',
					'label' => 'Height',
					'type' => 'number',
					'default' => '50',
					'desc' => 'Image arrow height in px'
				),
				array(
					'name' => 'arrow_image_width',
					'label' => 'Width',
					'type' => 'number',
					'default' => '50',
					'desc' => 'Image arrow width in px'					
				),
                array(
                    'name'    => 'select_image_arrow',
                    'label'   => 'Select Image arrow',
                    'desc'    => '',
                    'type'    => 'radio',
                    'default'    => '1',
                    'options' => array(
                        '1' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/1.png" alt="" />','2' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/2.png" alt="" />','3' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/3.png" alt="" />','4' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/4.png" alt="" />','5' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/5.png" alt="" />','6' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/6.png" alt="" />','7' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/7.png" alt="" />','8' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/8.png" alt="" />','9' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/9.png" alt="" />','10' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/10.png" alt="" />','11' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/11.png" alt="" />','12' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/12.png" alt="" />','13' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/13.png" alt="" />','14' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/14.png" alt="" />','15' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/15.png" alt="" />','16' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/16.png" alt="" />','17' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/17.png" alt="" />','18' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/18.png" alt="" />','19' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/19.png" alt="" />','20' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/20.png" alt="" />','21' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/21.png" alt="" />','22' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/22.png" alt="" />','23' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/23.png" alt="" />','24' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/24.png" alt="" />','25' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/25.png" alt="" />','26' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/26.png" alt="" />','27' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/27.png" alt="" />','28' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/28.png" alt="" />','29' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/29.png" alt="" />','30' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/30.png" alt="" />','31' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/31.png" alt="" />','32' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/32.png" alt="" />','33' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/33.png" alt="" />','34' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/34.png" alt="" />','35' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/35.png" alt="" />','36' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/36.png" alt="" />','37' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/37.png" alt="" />','38' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/38.png" alt="" />','39' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/39.png" alt="" />','40' => '<img src="'.plugin_dir_url(__FILE__).'../assets/arrows/40.png" alt="" />',

                    )
                ),
			
			),
			//------------------------------------------------
			//     Your Own Image
			//------------------------------------------------
			'upload_image_method' => array(
				array(
					'name' => 'upload_arrow_image',
					'label' => 'Upload arrow image',
					'type' => 'file',
					'default' => plugin_dir_url(__FILE__).'../assets/arrows/up-128.png',
					'desc' => 'Upload your arrow image.(128px X 128px)',
				),
				array(
					'name' => 'upload_arrow_image_height',
					'label' => 'Height',
					'type' => 'number',
					'default' => '50',
					'desc' => 'Define your arrow image height in pixel(px)'
				),
				array(
					'name' => 'upload_arrow_image_width',
					'label' => 'Width',
					'type' => 'number',
					'default' => '50',
					'desc' => 'Define your arrow image width in pixel(px)'					
				),
			
			)
           
        );

        return $settings_fields;
    }

    function scroll_up_plugin_page() {
        echo '<div class="wrap">'; ?>
		
			<div class="scroll-to-up-setting-page-title">
				<h1>Scroll To Up </h1>
				<p class="description">"Scroll To Up" Plugin Settings Page</p>
			</div>

		<div class="stp-col-left">
			<?php 
			$this->settings_api->show_navigation();
			$this->settings_api->show_forms(); ?>
		</div>

		<div class="stp-col-right">
			<div class="fb-follow-me">
				<h2>Plugin Author: Rayhan</h2>
				<h3 style="color:#43609C">If you love my plugin,then please follow me on facebook</h3>
				<div class="fb-follow" data-href="https://www.facebook.com/rayhan095" data-layout="standard" data-show-faces="true"></div>
			</div>
		</div>


    <?php echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;



/**
 * Get the value of a settings field
 *
 * @param string $option settings field name
 * @param string $section the section name this field belongs to
 * @param string $default default text if it's not found
 * @return mixed
 */
function stp_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
 
    return $default;
}