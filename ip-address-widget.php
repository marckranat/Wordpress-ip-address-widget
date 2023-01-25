<?php
/*
Plugin Name: IP Address Widget
Plugin URI: https://300m.com/
Description: A minimalist widget that shows the browsers's IP address
Version: 1.0
Author: Marc Kranat
Author URI: https://300m.com/
*/

//Retrieves the visitor's IP address
function get_visitor_ip() {
    return $_SERVER['REMOTE_ADDR'];
}

//Widget class
class Ip_Address_Widget extends WP_Widget {

    //Constructor
    public function __construct() {
        parent::__construct(
            'ip_address_widget',
            __('IP Address Widget', 'text_domain'),
            array('description' => __('A minimalist widget that shows the visitor\'s IP address', 'text_domain'))
        );
    }

    //Widget form
    public function form($instance) {
    }

    //Widget update
    public function update($new_instance, $old_instance) {
    }

    //Widget display
    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo '<div class="textwidget">';
        echo 'Your IP Address: ' . get_visitor_ip();
        echo '</div>';
        echo $args['after_widget'];
    }
}

//Register the widget
function register_ip_address_widget() {
    register_widget('Ip_Address_Widget');
}
add_action('widgets_init', 'register_ip_address_widget');
