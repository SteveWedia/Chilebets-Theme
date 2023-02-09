<?php 
$result = new WP_Query( $args );
$count = 0;
while ($result->have_posts()) : $result->the_post();
    if($count == 0){
        //print_r($post);
        //echo $post->ID;
        $post->is_first = true;
    }
    get_template_part( 'template-parts/slots-list/slot-list-item', null, $post);
    $count++;
endwhile;
wp_reset_postdata(); 
?>