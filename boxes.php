<?php //query_posts('meta_key=Stars&orderby=meta_value_num&order=DESC&cat=7&posts_per_page=8');  ?>
<?php

$args2['posts_per_page'] = '8';
$args2['meta_key'] = 'Stars';
$args2['orderby'] = 'meta_value_num';
$args2['cat'] = '3';
$args2['meta_query'] = [
   'relation' => 'AND',
   'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
];
$args2['orderby'] = ['stars' => 'DESC', 'post_date' => 'DESC' ];
// $args2['meta_query'] = [
//    'relation' => 'AND',
//    'stars' => array('key' => 'Stars', 'compare' => 'EXISTS'),
//    'first' => array('key' => 'custom_order', 'compare' => 'EXISTS', 'type'=>'NUMERIC'),
// ];
// $args2['orderby'] = ['first' => 'ASC', 'stars' => 'DESC', 'post_date' => 'DESC' ];

$results = new WP_Query( $args2 );
//print_r($result);
?>
<div id="boxes">
	
   <?php while ($results->have_posts()) : $results->the_post(); ?>
	<?php include(TEMPLATEPATH."/loadpostmeta.php");?>
   <div class="box">
      <section  id="<?php the_ID(); ?>" >
         <div class="box-top">
            <div class="box-top-left">
               <a href="<?php echo $Link; ?>" title="Ir a <?php the_title(); ?>" target="_blank" rel="nofollow"><?php the_post_thumbnail( 'homepage-post-thumbnail' ); ?></a>
            </div>
            <div class="box-top-right">
               <span class="casino-name"><span class="rank-number"><?php echo $Rank; ?>. </span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
               <img class="casino-rating" src="<?php bloginfo('template_url'); ?>/images/<?php echo $Starsimg; ?>-stars.svg" alt="<?php echo $Stars; ?> Estrellas" width="85" height="15" title="<?php echo $Stars; ?> Estrellas">
            </div>
            <?php if(  $Specialpromo ){ ?>
            <div class="special-promo">
				
               <img src="<?php bloginfo('template_url'); ?>/images/special-promo-<?php global $post; echo $post->post_name; ?>.webp" alt="Promoción especial <?php the_title(); ?>" width="304" height="164">
            </div>
            <?php } ?>
			   <?php if(  $Specialpromo2 ){ ?>
            <div class="special-promo-2">
               <img src="<?php bloginfo('template_url'); ?>/images/special-promo-2-<?php the_title(); ?>.webp" alt="Promoción especial <?php the_title(); ?>" width="304" height="164">
            </div>
            <?php } ?>
         </div>
         <?php if(  $Specialpromo ){ ?>
         <span class="special-promo-text"><?php echo $Specialpromo; ?></span>
         <?php } ?>
		   <?php if(  $Specialpromo2 ){ ?>
         <span class="special-promo-text-2"><?php echo $Specialpromo2; ?></span>
         <?php } ?>
		   <div class="tags">
		  <?php include(TEMPLATEPATH."/review-tags.php");?>
	   </div>
         <div class="casino-features">
            <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature1; ?></div>
            <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature2; ?></div>
            <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature3; ?></div>
            <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature4; ?></div>
         </div>
         <div class="casin-bonus-info">
            <div class="sub-info">
               <span class="sub-info-title">Porcentaje</span>
               <span class="sub-info-content"><?php echo $Percentage;?></span>
            </div>
            <div class="sub-info">
               <span class="sub-info-title">Monto del bono</span>
               <span class="sub-info-content"><?php echo $Bonus;?></span>
            </div>
            <div class="sub-info">
               <span class="sub-info-title">Rollover</span>
               <span class="sub-info-content"><?php echo $Wager;?></span>
            </div>
            <div class="sub-info">
               <span class="sub-info-title">Especial</span>
               <span class="sub-info-content"><?php echo $Especial;?></span>
            </div>
         </div>
         <a href="<?php echo $Link; ?>" title="Obtenga bonos de <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Obtener Bono</a>
         <div class="fold">
            <a class="collapsible">Mostrar Detalles</a>
            <div class="fold-content">
               <div class="bonus-details">
                  <div class="bonus-element">
                     <span class="step-title">Métodos de depósito: </span>
                     <div class="bonus-content">
                        <span class="step-detail"><?php echo $Deposit1;?></span>
                        <span class="step-detail"><?php echo $Deposit2;?></span>
                        <span class="step-detail"><?php echo $Deposit3;?></span>
                     </div>
                  </div>
                  <div class="bonus-element">
                     <span class="step-title"> Bono de deporte: </span>
                     <div class="bonus-content review-details">
                        <span class="step-detail">Porcentaje: <?php echo $Percentage;?></span>
                        <span class="step-detail">Bono: <?php echo $Bonus;?></span>
                        <span class="step-detail">Apuesta máx <?php echo $Maxbet;?></span>
                     </div>
                  </div>
                  <div class="bonus-element">
                     <span class="step-title">Bono de casino: </span>
                     <div class="bonus-content review-details">
                        <span class="step-detail">Porcentaje: <?php echo $CasinoPercentage;?></span>
                        <span class="step-detail">Bono: <?php echo $CasinoBonus;?></span>
                        <span class="step-detail">Apuesta máx <?php echo $CasinoMaxbet;?></span>
                     </div>
                  </div>
               </div>
               <div class="casino-description">
                  <p><?php echo $Description;?></p>
               </div>
               <div class="sub-info">
                  <span class="sub-info-title">Establecido</span>
                  <span class="sub-info-content"><?php echo $Year;?></span>
               </div>
               <div class="review-link">
                  <a href="<?php the_permalink() ?>" title="Reseña de <?php the_title(); ?>">Reseña de <?php the_title(); ?></a>
               </div>
            </div>
         </div>
      </section>
   </div>
   <?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>
<div id="boxes-under-button">
   <a href="/casas-de-apuestas/" class="button-1">Ver todas las casas de apuestas aqui</a>
</div>