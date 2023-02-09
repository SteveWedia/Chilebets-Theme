<?php $Question1 = get_post_meta($post->ID, 'Question1', true); ?>
<?php $Question2 = get_post_meta($post->ID, 'Question2', true); ?>
<?php $Question3 = get_post_meta($post->ID, 'Question3', true); ?>
<?php $Question4 = get_post_meta($post->ID, 'Question4', true); ?>
<?php $Answer1 = get_post_meta($post->ID, 'Answer1', true); ?>
<?php $Answer2 = get_post_meta($post->ID, 'Answer2', true); ?>
<?php $Answer3 = get_post_meta($post->ID, 'Answer3', true); ?>
<?php $Answer4 = get_post_meta($post->ID, 'Answer4', true); ?>
<?php $Rank = get_post_meta($post->ID, 'Rank', true); ?>
<?php $Link = get_post_meta($post->ID, 'Link', true); ?>
<?php $Stars = get_post_meta($post->ID, 'Stars', true); ?>
<?php $Starsimg = str_replace(array('.'), '', $Stars);?>
<?php $Freespins = get_post_meta($post->ID, 'Freespins', true); ?>
<?php $Maxbet = get_post_meta($post->ID, 'Maxbet', true); ?>
<?php $Feature1 = get_post_meta($post->ID, 'Feature1', true); ?>
<?php $Feature2 = get_post_meta($post->ID, 'Feature2', true); ?>
<?php $Feature3 = get_post_meta($post->ID, 'Feature3', true); ?>
<?php $Feature4 = get_post_meta($post->ID, 'Feature4', true); ?>
<?php $Wager = get_post_meta($post->ID, 'Wager', true); ?>
<?php $Percentage = get_post_meta($post->ID, 'Percentage', true); ?>
<?php $Bonus = get_post_meta($post->ID, 'Bonus', true); ?>
<?php $Deposit1 = get_post_meta($post->ID, 'Deposit1', true); ?>
<?php $Deposit2 = get_post_meta($post->ID, 'Deposit2', true); ?>
<?php $Deposit3 = get_post_meta($post->ID, 'Deposit3', true); ?>
<?php $Withdraw1 = get_post_meta($post->ID, 'Withdraw1', true); ?>
<?php $Withdraw2 = get_post_meta($post->ID, 'Withdraw2', true); ?>
<?php $Withdraw3 = get_post_meta($post->ID, 'Withdraw3', true); ?>
<?php $Recommended = get_post_meta($post->ID, 'Recommended', true); ?>
<?php $Exclusive= get_post_meta($post->ID, 'Exclusive', true); ?>
<?php $Nosticky= get_post_meta($post->ID, 'Nosticky', true); ?>
<?php $Crypto= get_post_meta($post->ID, 'Crypto', true); ?>
<?php $Unlockbonus= get_post_meta($post->ID, 'Unlockbonus', true); ?>
<?php $Description= get_post_meta($post->ID, 'Description', true); ?>
<?php $Year= get_post_meta($post->ID, 'Year', true); ?>
<?php $Specialpromo= get_post_meta($post->ID, 'Specialpromo', true); ?>
<?php $Specialpromo2= get_post_meta($post->ID, 'Specialpromo2', true); ?>
<?php $Odds= get_post_meta($post->ID, 'Odds', true); ?>
<?php $Klient= get_post_meta($post->ID, 'Klient', true); ?>
<?php $infoBox1Title = "Prosent"; ?>
<?php $infoBox2Title = "OPPTIL"; ?>
<?php $infoBox3Title = "FREESPINS"; ?>
<?php $infoBox4Title = "WAGER"; ?>
<?php $infoBox1Data = $Percentage; ?>
<?php $infoBox2Data = $Bonus; ?>
<?php $infoBox3Data = $Freespins; ?>
<?php $infoBox4Data = $Wager; ?>
<?php if ( in_category('9') ) { ?>
<?php $infoBox1Title = "Klient"; ?>
<?php $infoBox2Title = "Wager"; ?>
<?php $infoBox3Title = "Cashback"; ?>
<?php $infoBox4Title = "Bonus"; ?>
<?php $infoBox1Data = $Klient; ?>
<?php $infoBox2Data = $Wager; ?>
<?php $infoBox3Data = $Percentage; ?>
<?php $infoBox4Data = $Bonus; ?>
<?php } ?>
<div class="box box-full">
      <section  id="<?php the_ID(); ?>" >
         <div class="box-top">
            <div class="box-top-left">
               <a href="<?php the_field('c_link'); ?>" title="Gå til <?php the_title(); ?>" target="_blank" rel="nofollow"><?php the_post_thumbnail( 'homepage-post-thumbnail' ); ?></a>
            </div>
            <div class="box-top-right">
               <?php 
               $stars = get_field('c_stars');
               //echo $stars;
               $stars = str_replace(".", "", number_format($stars,2,'.',''));
               $stars = str_replace("00", "0", $stars);
               if (strlen($stars) > 2){
                  //echo "greater";
                  $stars = str_replace("0", "", $stars);
               }?>
               <span class="casino-name"><span class="rank-number"><?php echo $Rank; ?>. </span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
               <img class="casino-rating" src="<?php bloginfo('template_url'); ?>/images/<?php echo $stars; ?>-stars.svg" alt="<?php echo get_field('c_stars'); ?> Stjerner Anmeldelse" width="85px" height="15px"></h3>
            </div>
         </div>
         <?php $details = get_field('c_details'); ?>
         <div class="casin-bonus-info"><div class="sub-info">
			 <span class="sub-info-title">BONO</span>
			 <span class="sub-info-content"><?php echo $details['c_detail_1'];?></span>
			 </div>
            <div class="sub-info">
               <span class="sub-info-title">ROLLOVER</span>
               <span class="sub-info-content"><?php echo $details['c_detail_2'];?></span>
            </div>
            <div class="sub-info">
               <span class="sub-info-title">ESPECIAL</span>
               <span class="sub-info-content"><?php echo $details['c_detail_3'];?></span>
            </div>
         </div>
         <a href="<?php the_field('c_link'); ?>" title="Obtenga bonos de <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Obtener Bono</a>
      </section>
   </div>