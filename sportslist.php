<?php /* Template Name: Odds Casino List*/ ?>
<?php get_header(); ?>
<div id="site-wrapper" class="oddsliste-template">
<?php get_template_part( 'template-parts/casino-list/casino-list-header', null, $post ); ?>
            <?php //query_posts('meta_key=Rank&orderby=meta_value_num&order=ASC&cat=7&posts_per_page=10');  ?>
            <?php
            $args['posts_per_page'] = '20';
            $args['post_type'] = 'casino';
			$args['post_status'] = 'publish';
			$args['meta_key'] = 'c_stars';
			$args['orderby'] = 'meta_value';
			$args['order'] = 'DESC';
            $result = new WP_Query( $args );
            ?>
            <table id="toplist-boxes-new">
               <thead class="toplist-box-new">
                  <tr class="main">
                     <th class="vanish-mobile ninth">
                     </th>
                     <th class="title vanish-mobile twoninth">
                        Bettingside
                     </th>
                     <th class="vanish-mobile center ninth">
                        Bonus
                     </th>
                     <th class="vanish-mobile center ninth">
                        WAGER
                     </th>
                     <th class="vanish-mobile center ninth">
                        Spesial
                     </th>
                     <th class="vanish-mobile twoninth">
                        Lenke
                     </th>
                  </tr>
               </thead>
               <tbody class="toplist-box-new">
               <?php 
               while ($result->have_posts()) : $result->the_post();
                  get_template_part( 'template-parts/casino-list/casino-list-item' , null, $post);
               endwhile;
               wp_reset_postdata(); 
               ?>
               </tbody>
            </table>
            <div class="toplist-loading" id="toplist-loading">
               <div class="inner">
                  <img src="<?php bloginfo('template_url'); ?>/images/loading.svg" alt="loading" height="150" width="150">
                  <p>Loading More</p>
               </div>
            </div>
         </div>
   <?php get_template_part( 'template-parts/casino-list/casino-list-footer' , null, $post ); ?>
</div>
<?php get_footer(); ?>