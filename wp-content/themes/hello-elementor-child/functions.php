<?php
function hello_elementor_child_enqueue_scripts(){
wp_enqueue_style(
    'hello-elementor-child-style',
    get_stylesheet_directory_uri() . '/style.css',[
        'hello-elementor-theme-style',
    ],
    '1.0.0'
);
}
add_action('wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts',20);


function get_login_page_url() {
    return get_permalink(get_page_by_path('login'));
}

function get_insert_page_url(){
    return get_permalink(get_page_by_path('insert-data'));
}

function get_dashboard_page_url(){
    return get_permalink(get_page_by_path('dashboard'));
}
function get_edit_page_url() {
    $edit_page = get_page_by_path('edit');
    if ($edit_page) {
        return get_permalink($edit_page->ID);
    } else {
        return home_url(); 
    }
}

function enqueue_additional_styles() {
    if (is_page_template('template-landing-page.php')) { // Check if the current page is using the landing page template
        wp_enqueue_style(
            'landing-page-style', // Handle for the stylesheet
            get_stylesheet_directory_uri() . '/css/landing-page-style.css', // Correct path to the stylesheet
            [], // Dependencies
            'all' // Media type
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_additional_styles');
