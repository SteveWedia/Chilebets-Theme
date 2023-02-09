<?php get_header(); ?>
<div id="site-wrapper">
	<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
   <div id="main-area-page">
      <div id="content-wrapper-page">
         <div id="content-page">
            <div class="inner-page">
              
               <h1><?php single_cat_title(); ?></h1>
              
				<?php
					// get the current taxonomy term
					$term = get_queried_object();


					// get custom fields
					$introTitle = get_field('ci_title', $term);
					$introDescription = get_field('ci_introduction', $term);
				?>
				<?php if( !is_paged() ): ?>
					<?php if( $introDescription ): ?>
					<section class="intro">
						<?php if( $introTitle ): ?>
						<h2>
							<?php echo $introTitle; ?>
						</h2>
						<?php endif; ?>
						<div class="content">
							<?php echo $introDescription; ?>
						</div>
					</section>
					<?php endif; ?>
				<?php endif; ?>
               <?php while (have_posts()) : the_post(); ?>
               <section>
                  <div class="wp-block-columns has-background" style="background-color:#f5f5f5">
                     <div class="wp-block-column" style="flex-basis:260px">
                        <figure class="wp-block-image size-thumbnail"><?php the_post_thumbnail('post-thumbnail', array( 'loading' => '' ) ); ?></figure>
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
				 <?php 
				if( !is_paged() ):
				$catID = get_the_category();
				echo category_description( $catID[0] );
				endif;
				?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>