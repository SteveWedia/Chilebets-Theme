<?php /* Template Name: Casinoliste*/ ?>
<?php get_header(); ?>
<?php $Description= get_post_meta($post->ID, 'Description', true); ?>
<div id="site-wrapper">
   <div id="main-area-casinoliste">
      <div id="casinoliste-inner">
         <header id="casinoliste-top" class="casino">
            <div id="casinoliste-top-left">
               <h1><?php the_title(); ?></h1>
               <p><span class="ingress"><?php echo $Description;?></span></p>
            </div>
         </header>
         <div id="casinoliste-list-section">
            <p>Sorter etter:</p>
            <div id="current-casinolist-selection" class="default"></div>
            <ul id="casinoliste-tabs">
               <li ><button id="rank" class="focus" href="#" type="button">Topp vurdering</button></li>
               <li><button id="newlyadded" href="#" type="button">Nylig lagt til</button></li>
               <li><button id="crypto" href="#" type="button">Crypto</button></li>
               <li><button id="exclusive" type="button">Eksklusive Bonuser</button></li>
            </ul>
            <?php //query_posts('meta_key=Rank&orderby=meta_value_num&order=ASC&cat=7&posts_per_page=10');  ?>
            <?php
            $args['posts_per_page'] = '20';
            $args['meta_key'] = 'Stars';
            $args['orderby'] = 'meta_value_num';
            $args['cat'] = '7';
//             $args['meta_query'] = [
//                'relation' => 'AND',
//                'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
//                'first' => array('key' => 'custom_order', 'compare' => 'EXISTS', 'type'=>'NUMERIC'),
//            ];
			 $args['meta_query'] = [
               'relation' => 'AND',
               'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
           ];
          //$args['orderby'] = ['first' => 'ASC', 'stars' => 'DESC', 'post_date' => 'DESC' ];
          $args['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];
            $result = new WP_Query( $args );
            ?>
            <table id="toplist-boxes-new">
               <thead class="toplist-box-new">
                  <tr class="main">
                     <th class="vanish-mobile ninth">
                     </th>
                     <th class="title vanish-mobile twoninth">
                        Casino
                     </th>
                     <th class="vanish-mobile center ninth">
                        Prosent
                     </th>
                     <th class="vanish-mobile center ninth">
                        OPPTIL
                     </th>
                     <th class="vanish-mobile center ninth">
                        FREESPINS
                     </th>
                     <th class="vanish-mobile center ninth">
                        WAGER
                     </th>
                     <th class="vanish-mobile twoninth">
                        Lenke
                     </th>
                  </tr>
               </thead>
               <tbody class="toplist-box-new">
               <?php 
               while ($result->have_posts()) : $result->the_post();
                  get_template_part( 'template-parts/casino/item-row-new' );
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