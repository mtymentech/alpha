<?php
/*
Plugin Name:  MymenTech Addons
Plugin URI:   https://www.mymentech.com
Description:  Basic WordPress Plugin to extend WordPress features by MymenTech Developers team.
Version:      1.0
Author:       MymenTech
Author URI:   https://www.mymentech.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  mt-addon
*/

function mt_addon_scripts(){
    wp_enqueue_style('mt_addon_style', plugin_dir_url(__FILE__).'/assets/css/style.css',null,time());
}
add_action('wp_enqueue_scripts','mt_addon_scripts',99);

function mt_addon_button_shortcode($atts,$content){
    $default = array(
        'url'			=> '#',
        'type' 			=> 'rounded',
        'color' 		=> '#000000',
        'background' 	=> '#31c900',
        'font-size' 	=> '22px',
        'border_radius'	=>'100px',
        'font-family'   => 'Arial'
    );

    $atts = shortcode_atts($default,$atts);

    if (strtolower($atts['type'])==='rounded'){
        $radius = '100px';
    }else{
        $radius = '0px';
    }

    $css = sprintf('background-color:%s;font-size:%s;color:%s;border-radius:%s;font-family:%s',
        $atts['background'],
        $atts['font-size'],
        $atts['color'],
        $radius,
        $atts['font-family']
    );


    $button = sprintf('<span class="mt_btn_spc"><a class="mt_addon_btn" href="%s" style="%s">%s</a></span>',$atts['url'],$css,$content);

    return $button;

}
add_shortcode('mt_button', 'mt_addon_button_shortcode');