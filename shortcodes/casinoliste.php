<?php

function casinoliste_function($atts){
    $default = array(
        'light_dark' => 'light',
        'crypto' => '',
        'no_sticky' => '',
        'exclusive' => '',
        'number' => 0,
        'freespins' => '',
        'year' => '',
		'recently_added' => '',
        'ordered_posts' => '',
        'casino' => '',
    );
    $a = shortcode_atts($default, $atts);

    $totalNumber = 10;

    $number_of_ordered_posts = 0;
    $ordered_posts_ids = [];
    $exclude_posts = [];
    //if ( !$attribute['id'] || !$attribute['text'] )
    if($a['ordered_posts'] != ''){
        //print_r($a['ordered_posts']);
        $no_whitespaces_ids = preg_replace( '/\s*,\s*/', ',', filter_var( $a['ordered_posts'], FILTER_SANITIZE_STRING ) ); 
        $ordered_posts_ids_within = explode( ',', $no_whitespaces_ids );

        if(count( $ordered_posts_ids_within ) > 0){
            $ordered_posts_ids = $ordered_posts_ids_within;
            $number_of_ordered_posts = count(array_filter($ordered_posts_ids));
            //echo $number_of_ordered_posts;
            foreach ($ordered_posts_ids as $post) {
                array_push($exclude_posts, (int)$post);
            }
        }

    }

    // Create Query
    $args['posts_per_page'] = '10';
    if($a['number'] > 0){
        $args['posts_per_page'] = $a['number'];
        $totalNumber = (int)$a['number'];
        if($number_of_ordered_posts > 0){
            $args['posts_per_page'] = (int)$a['number'] - $number_of_ordered_posts;
        }
    }

	$metaAdditionalQuery = [];
    if($a['crypto'] == 'Ja'){
        //$args['meta_query'] = [['key' => 'Crypto', 'value' => 'Ja']];
        array_push($metaAdditionalQuery, ['key' => 'Crypto', 'value' => 'Ja']);
    }
    if($a['no_sticky'] == 'Ja'){
        //$args['meta_query'] = [['key' => 'Nosticky', 'value' => 'Ja']];
        array_push($metaAdditionalQuery, ['key' => 'Nosticky', 'value' => 'Ja']);
    }
    if($a['exclusive'] == 'Ja'){
        //$args['meta_query'] = [['key' => 'Exclusive', 'value' => 'Ja']];
        array_push($metaAdditionalQuery, ['key' => 'Exclusive', 'value' => 'Ja']);
    }
    if($a['freespins'] == 'Ja'){
        //$args['meta_query'] = [['key' => 'Exclusive', 'value' => 'Ja']];
        array_push($metaAdditionalQuery, ['key' => 'Freespins', 'value' => 'Nei', 'compare' => '!=']);
		array_push($metaAdditionalQuery, ['key' => 'Freespins', 'value' => 'N/A', 'compare' => '!=']);
		array_push($metaAdditionalQuery, ['key' => 'Freespins', 'value' => '0', 'compare' => '!=']);
    }
    if($a['year'] != ''){
        array_push($metaAdditionalQuery, ['key' => 'Year', 'value' => $a['year']]);
    }
//     $metaSubQuery =	array(
// 		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
// 		'first' => array('key' => 'custom_order', 'compare' => 'EXISTS', 'type'=>'NUMERIC'),
//         $metaAdditionalQuery,
// 	);
    if($a['recently_added'] == 'Ja'){
		$args['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];	
	}else{
		$args['meta_query'] = [
		'relation' => 'AND',
		//$metaSubQuery,
		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
		$metaAdditionalQuery,
	];
    //$args['orderby'] = ['first' => 'ASC', 'stars' => 'DESC', 'post_date' => 'DESC' ];
	$args['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];	
	}
// 			$args['meta_query'] = [
// 		'relation' => 'AND',
// 		//$metaSubQuery,
// 		'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
// 	];
//     //$args['orderby'] = ['first' => 'ASC', 'stars' => 'DESC', 'post_date' => 'DESC' ];
// 	$args['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];	
    $args['cat'] = '3';
    if($a['casino'] != ''){
        $args['cat'] = '4';
    }
	
    if(count( $exclude_posts ) > 0){
        $args['post__not_in'] = $exclude_posts;
        $allArgs['args'] = $args;
        $argsOrdered['cat'] = '3';
        if($a['casino'] != ''){
            $argsOrdered['cat'] = '4';
        }
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
            if($a['casino'] != ''){
                get_template_part( 'template-parts/casino/table-list-4', null, $args );
            }else{
                get_template_part( 'template-parts/casino/table-list', null, $args );
            }
        ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('casinoliste', 'casinoliste_function');

?>