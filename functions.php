<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_style');
function theme_enqueue_style()
{
    wp_enqueue_style('parent-style', get_stylesheet_directory_uri() . '/style.css');
}



// ajout de hook admin


function add_admin_link($items, $args) {
    if (is_user_logged_in()) {
        $admin_link = '<a href="' . admin_url() . '" class="admin-link">Admin</a>';
        // Trouver la première occurrence de '</li>' dans $items
        $position = strpos($items, '</li>') + strlen('</li>');
        // Insérer le lien vers l'administration juste après la première balise </li>
        $items = substr_replace($items, $admin_link, $position, 0);
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);

?>