<?php get_header(); ?>
<?php include(TEMPLATEPATH."/loadpostmeta.php");?>
<div id="site-wrapper">
	<div class="breadcrumb"><?php get_breadcrumb(); ?></div>
   <header id="review-top">
      <div id="review-top-wrapper">
         <div id="review-top-left">
            <a href="<?php echo $Link; ?>" target="_blank" rel="nofollow"><?php the_post_thumbnail( 'post-thumbnail', array( 'loading' => '' ) ); ?></a>
            <a href="<?php echo $Link;?>" title="Obtenga bonos de <?php the_title(); ?>" class="button-3" target="_blank" rel="nofollow">Obtener Bono</a>
         </div>
         <div id="review-top-right">
            <div id="review-top-right-over">
               <div id="review-top-right-over-first">
                  <h1><?php the_title(); ?><img src="<?php bloginfo('template_url'); ?>/images/18-plus.webp" class="plus-18" alt="Mayores de 18" width="24" height="24">
				   </h1>
				   <div class="rating-container">
					   <img src="<?php bloginfo('template_url'); ?>/images/<?php echo $Starsimg; ?>-stars.svg" alt="<?php echo $Stars; ?> Estrellas" width="175" height="30" title="<?php echo $Stars; ?> Estrellas"> <span class="rating"><?php echo $Stars; ?>/5.0</span>
				   </div>
               </div>
               <div id="review-top-right-over-second">
                  <div class="casino-features-review">
                     <div class="feature-review"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature1; ?></div>
                     <div class="feature-review"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature2; ?></div>
                     <div class="feature-review"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature3; ?></div>
                     <div class="feature-review"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24" height="24"><?php echo $Feature4; ?></div>
                  </div>
               </div>
            </div>
            <?php if(  $Specialpromo ){ ?>
            <span class="special-promo-review"><?php echo $Specialpromo; ?></span>
            <?php } ?>
			 <?php if(  $Specialpromo2 ){ ?>
            <span class="special-promo-review-2"><?php echo $Specialpromo2; ?></span>
            <?php } ?>
			 <div class="tags-review">
			 <?php include(TEMPLATEPATH."/review-tags.php");?>
           </div>
            <div id="review-top-right-under">
				
				
				
                  <div class="freespins-info">
                     <img src="<?php bloginfo('template_url'); ?>/images/percentage.webp" alt="Porcentaje" width="30" height="30">
                     <span class="offer-title">Porcentaje</span>
                     <span class="offer-description"><?php echo $Percentage;?></span>
                  </div>
                 
               <div class="freespins-info">
                  <img src="<?php bloginfo('template_url'); ?>/images/bono.webp" alt="Bono" width="30" height="30">
                  <span class="offer-title">Monto del bono</span>
                  <span class="offer-description"><?php echo $Bonus;?></span>
               </div>
              <div class="freespins-info">
                  <img src="<?php bloginfo('template_url'); ?>/images/rollover.webp" alt="Rollover" width="30" height="30">
                  <span class="offer-title">Rollover</span>
                  <span class="offer-description"><?php echo $Wager;?></span>
               </div>
				 <div class="freespins-info">
                  <img src="<?php bloginfo('template_url'); ?>/images/especial.webp" alt="Especial" width="30" height="30">
                  <span class="offer-title">Especial</span>
                  <span class="offer-description"><?php echo $Especial;?></span>
               </div>
             
           
            </div>
         </div>
      </div>
   </header>
   <div id="main-area">
      <div id="content-wrapper-review">
         <div id="content-review">
            <div id="content-review-left">
               <div class="bonus-details">
                  <div class="bonus-element">
                     <span class="step-title"> Métodos de depósito: </span>
                     <div class="bonus-content review-details">
                        <span class="step-detail"><?php echo $Deposit1;?></span>
                        <span class="step-detail"><?php echo $Deposit2;?></span>
                        <?php if(  $Deposit3 ){ ?>
                        <span class="step-detail"><?php echo $Deposit3;?></span>
                        <?php } ?>
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
               <article>
                  <?php while (have_posts()) : the_post();
                     the_content('');
                     endwhile; ?>
                  <p><em>Última actualización: <?php the_modified_time('j F Y'); ?> </em></p>
                  <p><em>Revisado por Chilebets - Puntaje: <?php echo $Stars; ?></em></p>
                  <?php include(TEMPLATEPATH."/faq.php");?>
                  <div class="bottom-bar">
                     <div class="bottom-bar-inner">
                        <a href="<?php echo $Link;?>" class="button-3" target="_blank" rel="nofollow" title="Obtenga bonos de <?php the_title(); ?>">Obtener Bono</a>
                     </div>
                  </div>
               </article>
              
               </div>
			  <div id="content-review-sidebar">
                  <h2 class="similar">También recomendamos</h2>
                     <?php
                     $id = get_the_ID();
                     $args['posts_per_page'] = '4';
                     $args['orderby'] = 'rand';
					 $args['cat'] = '3';
			         $args['post__not_in'] = array( $id, );
                     $args['meta_query'] = [['key' => 'Stars', 'value' => '4.6', 'compare' => '>=', 'type' => 'DECIMAL(10,3)']];
                     $result = new WP_Query( $args );
                     //shuffle($result);
                     ?>
                     <?php 
                     while ($result->have_posts()) : $result->the_post();
                        get_template_part( 'template-parts/casino/item-row-sidebar' );
                     endwhile;
                     wp_reset_postdata(); 
                     ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>