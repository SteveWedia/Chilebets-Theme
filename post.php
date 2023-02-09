<?php get_header(); ?>
<?php include(TEMPLATEPATH."/loadpostmeta.php");?>
<div id="site-wrapper">
	<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
   <div id="main-area-page">
      <div id="content-wrapper-page">
         <div id="content-page">
            <div class="inner-page">
               <?php //the_post_thumbnail('full', array( 'loading' => '' )); ?>
				<?php //echo the_field('do_not_show_featured_image'); ?>
				<?php if( !get_field('do_not_show_featured_image') ): ?>
                  <?php the_post_thumbnail('full', array( 'loading' => '' )); ?>
               <?php endif;?>
               <h1><?php the_title(); ?></h1>
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
</div>
<?php get_footer(); ?>