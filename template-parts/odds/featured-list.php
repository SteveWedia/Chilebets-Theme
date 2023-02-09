<?php
$args['posts_per_page'] = '30';
$args['post_type'] = 'odd';
$args['post_status'] = 'publish';
$args['meta_key'] = 'od_datetime';
$args['orderby'] = 'meta_value';
$args['order'] = 'ASC';
$args['meta_query'] = [['key' => 'od_featured', 'value' => true], ['key'=>'od_datetime', 'value' => date("Y-m-d H:i:s", strtotime('+2 hours')), 'compare' => '>=', 'type' => 'DATETIME']];
//$args['meta_value'] = true;
$result = new WP_Query( $args );
//print_r($result);
if($result->have_posts()){
?>
<section class="featured-list">
    <ul class="featured-odds">
		<?php 
		while ($result->have_posts()) : $result->the_post();
		get_template_part( 'template-parts/odds/item-featured-list', null, $post );
		endwhile;
		wp_reset_postdata(); 
		?>
    </ul>
</section>
<?php
}
?>