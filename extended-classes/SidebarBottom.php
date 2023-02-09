<?php
class SidebarBottomMenu extends Walker_Nav_Menu {
    // Your custom code goes here
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Build the HTML for the menu item
        $output .= '<li class="menu-item">';
        $output .= '<a href="' . $item->url . '">' . $item->title . '</a>';
        $output .= '</li>';
    }
}
?>