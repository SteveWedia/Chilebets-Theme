<?php /* Template Name: Slots Review List*/ ?>
<?php get_header(); ?>
<div id="site-wrapper" class="slots-review-template">
    <div class="content-wrapper-page">
        <div class="content-page">
            <div class="inner-page">
                <?php
                $args['posts_per_page'] = '20';
                $args['post_type'] = 'post';
                $args['post_status'] = 'publish';
                $args['category_name'] = 'slots-anmeldelser';
                $args['meta_key'] = 'show_first';
		        $args['orderby'] = 'meta_value';
		        $args['order'] = 'ASC';
                $result = new WP_Query( $args );
                ?>
                <h1><?php the_title(); ?></h1>
                <div class="lede">
                    <?php echo the_field('srp_description'); ?>
                </div>
                <section class="slot-list-section">
                    <?php 
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
                </section>
                <article>
                    <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(''); ?>
                    <?php endwhile; ?>
                </article>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>