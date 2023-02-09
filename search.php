<?php get_header(); ?>
<div id="site-wrapper">
   <div id="main-area-page">
      <div id="content-wrapper-page">
         <div id="content-page">
            <div class="inner-page">
               <h1><?php wp_title('',true);  ?></h1>
               <?php while (have_posts()) : the_post(); ?>
               <section>
                  <div class="wp-block-columns">
                     <div class="wp-block-column" style="flex-basis:260px">
                        <figure class="wp-block-image size-thumbnail"><?php the_post_thumbnail( 'post-thumbnail', array( 'loading' => '' ) ); ?></figure>
                     </div>
                     <div class="wp-block-column">
                        <h2 class="category-hl2"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <span class="post-info">Publicado por Chilebets | <?php the_date(); ?> | <?php the_category(' , '); ?></span>
                        <?php the_excerpt();?>
                     </div>
                  </div>
               </section>
               <?php  endwhile; ?>
               <p><?php posts_nav_link(); ?></p>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>