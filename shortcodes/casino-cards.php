<?php

function casino_cards_function($atts){
    $default = array(
        'ordered_posts' => '',
        'number' => 0,
    );
    $a = shortcode_atts($default, $atts);

    $totalNumber = 3;

    // Ordered Posts
    $number_of_ordered_posts = 0;
    $ordered_posts_ids = [];
    $exclude_posts = [];
    if($a['ordered_posts'] != ''){
        $no_whitespaces_ids = preg_replace( '/\s*,\s*/', ',', filter_var( $a['ordered_posts'], FILTER_SANITIZE_STRING ) ); 
        $ordered_posts_ids_within = explode( ',', $no_whitespaces_ids );
        if(count( $ordered_posts_ids_within ) > 0){
            $ordered_posts_ids = $ordered_posts_ids_within;
            $number_of_ordered_posts = count(array_filter($ordered_posts_ids));
            foreach ($ordered_posts_ids as $post) {
                array_push($exclude_posts, (int)$post);
            }
        }

    }

    // Number of posts
    $args['posts_per_page'] = '3';
    if($a['number'] > 0){
        $args['posts_per_page'] = $a['number'];
        $totalNumber = (int)$a['number'];
        if($number_of_ordered_posts > 0){
            $args['posts_per_page'] = (int)$a['number'] - $number_of_ordered_posts;
        }
    }
	$args['meta_query'] = ['stars' => array('key' => 'Stars', 'compare' => 'EXISTS')];
    $args['cat'] = '7';
    //$args['meta_query'] = [['key' => 'Stars', 'value' => '4.6', 'compare' => '>=', 'type' => 'DECIMAL(10,3)']];
	//$args['orderby'] = 'rand';
	$args['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];
    if(count( $exclude_posts ) > 0){
        $args['post__not_in'] = $exclude_posts;
        $allArgs['args'] = $args;
        $argsOrdered['cat'] = '7';
        $argsOrdered['post__in'] = $exclude_posts;
        $argsOrdered['orderby'] = 'post__in';
        $allArgs['argsOrdered'] = $argsOrdered;
    }else{
        $allArgs['args'] = $args;
    }

    $allArgs['total'] = $totalNumber;
    $allArgs['exclude'] = $exclude_posts;

    
    $args = $allArgs;

    // Display List
    ob_start();
    ?>
    <div id="casinoliste-list-section" class="">
        <?php
            get_template_part( 'template-parts/casino/card-row', null, $args );
        ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('casinocards', 'casino_cards_function');

?>