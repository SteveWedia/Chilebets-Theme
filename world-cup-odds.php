<?php /* Template Name: World Cup Odds Tips*/ ?>
<?php get_header(); ?>
<div id="site-wrapper">
    <div id="main-area-casinoliste">
        
            <header id="casinoliste-top" class="world-cup-odds">
                <div id="casinoliste-top-left">
                <h1><?php the_title(); ?></h1>
                <p><span class="ingress"><?php echo the_field('od_description');?></span></p>
                </div>
            </header>
		<div id="casinoliste-inner">
            <?php
            get_template_part( 'template-parts/odds/wc-featured-list', null, $args );
            ?>
            <?php
            get_template_part( 'template-parts/odds/wc-table-list', null, $args );
            ?>
            <div id="content-page">
                <?php $Question1 = get_post_meta($post->ID, 'Question1', true); ?>
                <?php $Question2 = get_post_meta($post->ID, 'Question2', true); ?>
                <?php $Question3 = get_post_meta($post->ID, 'Question3', true); ?>
                <?php $Question4 = get_post_meta($post->ID, 'Question4', true); ?>
                <?php $Answer1 = get_post_meta($post->ID, 'Answer1', true); ?>
                <?php $Answer2 = get_post_meta($post->ID, 'Answer2', true); ?>
                <?php $Answer3 = get_post_meta($post->ID, 'Answer3', true); ?>
                <?php $Answer4 = get_post_meta($post->ID, 'Answer4', true); ?>
                <article>
                <?php while (have_posts()) : the_post();
                    the_content('');
                    endwhile; ?>
                <?php include(TEMPLATEPATH."/faq.php");?>
                </article>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>