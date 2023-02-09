<?php /* Template Name: Page with Boxes*/ ?>
<?php get_header(); ?>
<?php include(TEMPLATEPATH."/loadpostmeta.php");?>
<div id="site-wrapper">
   <div id="main-area-page">
      <div id="content-wrapper-page">
         <div id="content-page">
            <div class="inner-page">
               <?php the_post_thumbnail('full'); ?>
               <h1><?php the_title(); ?></h1>
               <article>
                  <?php while (have_posts()) : the_post();
                     the_content('');
                     endwhile; ?>
                  <?php include(TEMPLATEPATH."/faq.php");?>
				   <?php include(TEMPLATEPATH."/boxes.php");?>
               </article>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>