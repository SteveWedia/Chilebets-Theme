<?php

function slotslist_function($atts){
    $default = array(
    );

    // Create Query
    $args['posts_per_page'] = '11';
    $args['post_type'] = 'post';
    $args['post_status'] = 'publish';
    $args['category_name'] = 'slots-anmeldelser';
    // $args['meta_key'] = 'sf_stars';
	// $args['orderby'] = 'meta_value_num';
    // $args['order'] = 'DESC';
    $args['meta_query'] = [
        'relation' => 'AND',
        'stars' => array('key' => 'sf_stars', 'compare' => 'EXISTS'),
        'first' => array('key' => 'show_first', 'compare' => 'EXISTS'),
    ];
	$args['orderby'] = ['first' => 'DESC', 'stars' => 'DESC' ];

    // Display List
    ob_start();
    ?>
    <section class="slot-list-section">
        <?php
            get_template_part( 'template-parts/slots-list/slots-list', null, $args );
        ?>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('slotslist', 'slotslist_function');

?>