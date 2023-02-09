<?php get_header(); ?>
<?php $Giveaway= get_post_meta($post->ID, 'Giveaway', true); ?>
<?php $Casino1= get_post_meta($post->ID, 'Casino1', true); ?>
<?php $Casino2= get_post_meta($post->ID, 'Casino2', true); ?>
<?php $Casino3= get_post_meta($post->ID, 'Casino3', true); ?>
<?php $Casino4= get_post_meta($post->ID, 'Casino4', true); ?>
<?php $Promo1= get_post_meta($post->ID, 'Promo1', true); ?>
<?php $Promo2= get_post_meta($post->ID, 'Promo2', true); ?>
<?php $Promo3= get_post_meta($post->ID, 'Promo3', true); ?>
<?php $Promo4= get_post_meta($post->ID, 'Promo4', true); ?>
<?php $SliderLink1= get_post_meta($post->ID, 'SliderLink1', true); ?>
<?php $SliderLink2= get_post_meta($post->ID, 'SliderLink2', true); ?>
<?php $SliderLink3= get_post_meta($post->ID, 'SliderLink3', true); ?>
<?php $SliderLink4= get_post_meta($post->ID, 'SliderLink4', true); ?>
<?php $Button1= get_post_meta($post->ID, 'Button1', true); ?>
<?php $Button2= get_post_meta($post->ID, 'Button2', true); ?>
<?php $Button3= get_post_meta($post->ID, 'Button3', true); ?>
<?php $Button4= get_post_meta($post->ID, 'Button4', true); ?>
<div id="site-wrapper">
   <div id="top-area-wrapper">
      <div id="top-area">
         <nav id="top-left-nav">
            <h4>Navegar a</h4>
            <?php
            require_once('extended-classes/SidebarTop.php');
            wp_nav_menu( array(
                'theme_location' => 'sidebar-top-menu',
                'walker'         => new SidebarTopMenu()
            ) );
            ?>
            <?php if(  $Giveaway ){ ?>
            <a href="/giveaway/" class="button-1"><?php echo $Giveaway;?></a>
            <?php } ?>
         </nav>
         <header id="banner-area">
            <div id="slideshow-container">
				<?php
               $bannerClasses = ["", "", "", "", "", "", "", ""];
				$bannerClasses[rand(0,7)] = "slide-show";
               ?>
               <div class="slides slide-fade first-slide <?php echo $bannerClasses[0]; ?>" id="BannerA">
                  <div class="slide-text slideInUp">
                     <div class="slide-title"><?php echo $Casino1;?></div>
                     <div class="slide-description"><?php echo $Promo1;?></div>
                     <a href="<?php echo $SliderLink1;?>" class="button-2" rel="nofollow" target="_blank"><?php echo $Button1;?></a>
                  </div>
               </div>
               <div class="slides slide-fade second-slide <?php echo $bannerClasses[1]; ?>" id="BannerB">
                  <div class="slide-text slideInUp">
                     <div class="slide-title"><?php echo $Casino2;?></div>
                     <div class="slide-description"><?php echo $Promo2;?></div>
                     <a href="<?php echo $SliderLink2;?>" class="button-2" rel="nofollow" target="_blank"><?php echo $Button2;?></a>
                  </div>
               </div>
               <div class="slides slide-fade third-slide <?php echo $bannerClasses[2]; ?>" id="BannerC">
                  <div class="slide-text slideInUp">
                     <div class="slide-title"><?php echo $Casino3;?></div>
                     <div class="slide-description"><?php echo $Promo3;?></div>
                     <a href="<?php echo $SliderLink3;?>" class="button-2" rel="nofollow" target="_blank"><?php echo $Button3;?></a>
                  </div>
               </div>
            
             
               <div class="slide-arrows">
                  <a href="#" class="arrow-prev" id="arrow-prev"></a>
                  <a href="#" class="arrow-next" id="arrow-next"></a>
               </div>
            </div>
         </header>
      </div>
      <div id="top-mid-area">
         <nav id="top-mid-left-nav">
            <section class="game-of-the-week">
               <?php
               $args['posts_per_page'] = '1';
               $args['post_type'] = 'post';
               $args['post_status'] = 'publish';
               $args['category_name'] = 'slots-anmeldelser';
               $args['meta_key'] = 'daniels_pick';
               $args['orderby'] = 'meta_value';
               $args['orderby'] = ['meta_value' => 'DESC', 'date' => 'DESC' ];
               $result = new WP_Query( $args );
				//print_r($result);
                  while ($result->have_posts()) : $result->the_post();
                     get_template_part( 'template-parts/slots-list/slot-list-item', null, $post);
                  endwhile;
                  wp_reset_postdata(); 
                  ?>
            </section>
            <h4>Categorías populares</h4>
			<?php
            require_once('extended-classes/SidebarBottom.php');
            wp_nav_menu( array(
                'theme_location' => 'sidebar-bottom-menu',
                'walker'         => new SidebarBottomMenu()
            ) );
            ?>
           

         </nav>
         <div id="top-mid-box-area">
            <h1><?php the_field('list_title'); ?></h1>
			 <span class="tagline contract" id="main-tagline">
				 <?php the_field('list_description'); ?>
			 </span>
			
            <div class="center-content">
               <a href="javascript:;" id="mt-button">Lee mas</a>
            </div>
            <?php include(TEMPLATEPATH."/boxes.php");?>
         </div>
      </div>
   </div>
 
   <div id="main-area">
      <div id="content-wrapper-homepage">
         <div id="content">
            <article>
               <?php while (have_posts()) : the_post();
                  the_content('');
                  endwhile; ?>
				 <?php wp_reset_query(); ?>
            <?php $Question1 = get_post_meta($post->ID, 'Question1', true); ?>
			<?php $Question2 = get_post_meta($post->ID, 'Question2', true); ?>
			<?php $Question3 = get_post_meta($post->ID, 'Question3', true); ?>
			<?php $Question4 = get_post_meta($post->ID, 'Question4', true); ?>
			<?php $Answer1 = get_post_meta($post->ID, 'Answer1', true); ?>
			<?php $Answer2 = get_post_meta($post->ID, 'Answer2', true); ?>
			<?php $Answer3 = get_post_meta($post->ID, 'Answer3', true); ?>
			<?php $Answer4 = get_post_meta($post->ID, 'Answer4', true); ?>
			 <?php include(TEMPLATEPATH."/faq.php");?></article>
         </div>
      </div>
   </div>
</div>
<?php get_footer(); ?>