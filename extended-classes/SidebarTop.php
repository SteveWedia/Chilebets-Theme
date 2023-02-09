<?php
class SidebarTopMenu extends Walker_Nav_Menu {
    // Your custom code goes here
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Build the HTML for the menu item
        $icon = get_field('menu_icon', $item);
        $output .= '<li>';
        $output .= '<a href="' . $item->url . '"><img src="'. $icon .'" alt="' . $item->title . '" title="' . $item->title . '" width="32" height="32">' . $item->title . '</a>';
        $output .= '</li>';
    }
}
?>