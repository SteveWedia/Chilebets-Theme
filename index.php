<?php get_header(); ?>
<div id="site-wrapper">
   <div id="main-area">
      <div id="content-wrapper">
         <div id="content">
            <?php while (have_posts()) : the_post();
               the_content('');
               endwhile; ?>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>