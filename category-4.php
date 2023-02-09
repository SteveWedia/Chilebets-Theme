<?php
// Template similar to category-3.php but queries for category 4. 
// Path: wp-content/themes/kongebonuscjh/category-4.php
// Compare this snippet from wp-content/themes/kongebonuscjh/category-3.php:
?>
<?php get_header(); ?>
<?php $Description= get_post_meta($post->ID, 'Description', true); ?>
<div id="site-wrapper">
	<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
   <div id="main-area-casinoliste">
      <div id="casinoliste-inner">
         <header id="casinoliste-top" class="casino-4">
            <div id="casinoliste-top-left">
               <h1>Casinos Online</h1>
               <p><span class="ingress">Aquí encontrará una descripción general de los mejores sitios de apuestas para jugadores chilenos en línea. Le brindan las mejores cuotas y las ofertas más lucrativas, para que pueda concentrarse en lo más importante: apostar. La lista se puede ordenar de acuerdo con varios criterios para que pueda encontrar lo que más le convenga.</span></p>
            </div>
         </header>
         <div id="casinoliste-list-section">
            <p>Ordenar por:</p>
            <div id="current-casinolist-selection" class="default"></div>
            <ul id="casinoliste-tabs">
               <li ><button id="rank" class="focus" href="#" type="button">Más valorados</button></li>
               <li><button id="newlyadded" href="#" type="button">Recientes</button></li>
               <li><button id="crypto" href="#" type="button">Cripto</button></li>
            </ul>
            <?php //query_posts('meta_key=Rank&orderby=meta_value_num&order=ASC&cat=3&posts_per_page=10');  ?>
            <?php
            $posts_per_page = 20;
            $args['posts_per_page'] = $posts_per_page;
            $args['meta_key'] = 'Stars';
            $args['orderby'] = 'meta_value_num';
            $args['cat'] = '4';
			 $args['meta_query'] = [
               'relation' => 'AND',
               'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
           ];
          $args['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];
            $result = new WP_Query( $args );
            // Get the total number of posts in the database
            $total_posts = $result->found_posts;
            if( $total_posts < $posts_per_page ) {
               ?>
               <div id="stop_querying"></div>
               <?php
            }
            ?>
            <table id="toplist-boxes-new">
               <thead class="toplist-box-new">
                  <tr class="main">
                     <th class="image-col">
                     </th>
                     <th class="title title-col">
                        Casinos Online
                     </th>
                     <th class="center info-col">
                        Prosent
                     </th>
                     <th class="center info-col">
                        Bono de Casino
                     </th>
                     <th class="center info-col">
                        Rollover
                     </th>
                     <th class="center info-col">
                        Tiradas gratis
                     </th>
                     <th class="button-col">
                        ENLACE
                     </th>
                  </tr>
               </thead>
               <tbody class="toplist-box-new">
               <?php 
               while ($result->have_posts()) : $result->the_post();
                  get_template_part( 'template-parts/casino/item-row-casino' );
               endwhile;
               wp_reset_postdata(); 
               ?>
               </tbody>
            </table>
            <div class="toplist-loading" id="toplist-loading">
               <div class="inner">
                  <img src="<?php bloginfo('template_url'); ?>/images/loading.svg" alt="cargando" height="150" width="150">
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
              
            </article>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>