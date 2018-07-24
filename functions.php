<?php

require_once get_theme_file_path('/inc/tgmpa.php');


function alpha_init(){
    load_theme_textdomain('alpha');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-header');
    add_theme_support('woocommerce');

    register_nav_menu("topmenu", __("Top Menu","alpha"));
    register_nav_menu("footermenu", __("Footer Menu","alpha"));
}

add_action('after_setup_theme','alpha_init');


function alpha_assets(){
    wp_enqueue_style('aplha-css',get_stylesheet_uri());
    wp_enqueue_style('bootstrap','//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style('featherlight-css','//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css');
    wp_enqueue_script('featherlight-js','//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js',array('jquery'),'0.0.1',true);
    wp_enqueue_script('vue-js',get_theme_file_uri('/assets/js/vue.js'), Null, '2.5.16',false);
    wp_enqueue_script('alpha-js',get_theme_file_uri('/assets/js/main.js'), array('jquery','vue-js'), time(),true);
}
add_action('wp_enqueue_scripts','alpha_assets');

function alpha_sidebar(){
    register_sidebar(
        array(
            'name'=>'Right Sidebar',
            'id'=>'sidebar-1',
            'description'=>__('Single Post Sidebar','alpha'),
            'before_widget'=>'<section id="%1$s" class="widget %2$s">',
            'after_widget'=>'</section>',
            'before_title'=>'<h2 class="widget-title">',
            'after_title'=>'</h2>'
        )
    );
    register_sidebar(
        array(
            'name'=>'Footer left',
            'id'=>'footer-left',
            'description'=>__('Footer widget area','alpha'),
            'before_widget'=>'<section id="%1$s" class="widget %2$s">',
            'after_widget'=>'</section>',
            'before_title'=>'',
            'after_title'=>''
        )
    );
    register_sidebar(
        array(
            'name'=>'Footer Right',
            'id'=>'footer-right',
            'description'=>__('Footer widget area','alpha'),
            'before_widget'=>'<section id="%1$s" class="widget %2$s">',
            'after_widget'=>'</section>',
            'before_title'=>'',
            'after_title'=>''
        )
    );
}
add_action('widgets_init','alpha_sidebar');

function alpha_formatted_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        return get_the_password_form();
    }
}
add_filter('the_excerpt','alpha_formatted_excerpt');

function alpha_protected_title_format(){
    return "Locked: %s";
}
add_filter('protected_title_format','alpha_protected_title_format');

function alpha_menu_item_class($classes,$item){
    $classes[]='list-inline-item';
    return $classes;
}
add_filter('nav_menu_css_class','alpha_menu_item_class', 10, 2);
