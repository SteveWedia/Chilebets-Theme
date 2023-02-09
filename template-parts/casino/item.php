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
<?php $category = get_the_category( $post->ID ) ?>
<div class="toplist-box <?php if(  $Crypto == "Ja" ){ echo "crypto"; } ?><?php if(  $Exclusive == "Ja" ){ echo "exclusive"; } ?>">
    <section id="postid-<?php the_ID(); ?>">
        <div class="toplist-box-inner">
        <div class="toplist-box-first-section">
            <div class="toplist-box-top">
                <div class="toplist-box-top-first">
                    <div class="toplist-box-top-left">
                    <a href="<?php echo $Link; ?>" title="Gå til <?php the_title(); ?>" target="_blank" rel="nofollow"><?php the_post_thumbnail( 'homepage-post-thumbnail' ); ?></a>
                    </div>
                    <div class="toplist-box-top-right">
                    <span class="casino-name"><span class="rank-number"><?php echo $args['count']; ?>. </span><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
                    <img class="casino-rating" src="<?php bloginfo('template_url'); ?>/images/<?php echo $Starsimg; ?>-stars.svg" alt="<?php echo $Stars; ?> Stjerner Anmeldelse" width="85px" height="15px">
                    <div class="tags">
                            <?php include(TEMPLATEPATH."/review-tags.php");?>
                        
                    </div>
                    </div>
                </div>
                <div class="toplist-box-top-second">
                    <div class="casino-features">
                    <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Trekk" width="24px" height="24px"><?php echo $Feature1; ?></div>
                    <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Trekk" width="24px" height="24px"><?php echo $Feature2; ?></div>
                    <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Trekk" width="24px" height="24px"><?php echo $Feature3; ?></div>
                    <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Trekk" width="24px" height="24px"><?php echo $Feature4; ?></div>
                    </div>
                </div>
            </div>
            <div class="toplist-box-bottom">
                <div class="casin-bonus-info">
                    <div class="sub-info">
					<span class="sub-info-title">Prosent</span>
					<span class="sub-info-content"><?php echo $Percentage;?></span>
                    </div>
                    <div class="sub-info">
                    <span class="sub-info-title">OPPTIL</span>
                    <span class="sub-info-content"><?php echo $Bonus;?></span>
                    </div>
                    <div class="sub-info">
                    <span class="sub-info-title">FREESPINS</span>
                    <span class="sub-info-content"><?php echo $Freespins;?></span>
                    </div>
                    <div class="sub-info">
                    <span class="sub-info-title">WAGER</span>
                    <span class="sub-info-content"><?php echo $Wager;?></span>
                    </div>
                </div>
                <a class="collapsible"><img src="<?php bloginfo('template_url'); ?>/images/dropdown.webp" alt="Trekk" width="35px" height="35px"></a>
                <div class="fold-content">
                    <div class="bonus-details">
                    <div class="bonus-element">
                        <span class="step-title"> Innskuddsbonus: </span>
                        <div class="bonus-content">
                            <span class="step-detail"><?php echo $Deposit1;?></span>
                            <span class="step-detail"><?php echo $Deposit2;?></span>
                            <span class="step-detail"><?php echo $Deposit3;?></span>
                        </div>
                    </div>
                    <div class="bonus-element">
                        <span class="step-title"> Uttaksmetoder: </span>
                        <div class="bonus-content review-details">
                            <span class="step-detail"><?php echo $Withdraw1;?></span>
                            <?php if(  $Withdraw2 ){ ?>
                            <span class="step-detail"><?php echo $Withdraw2;?></span>
                            <?php } ?><?php if(  $Withdraw3 ){ ?>
                            <span class="step-detail"><?php echo $Withdraw3;?></span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bonus-element">
                        <span class="step-title">Velkomstbonus: </span>
                        <div class="bonus-content">
                            <span class="step-detail">Prosent: <?php echo $Percentage;?></span>
                            <span class="step-detail">Bonus: <?php echo $Bonus;?></span>
                            <span class="step-detail">Max bet: <?php echo $Maxbet;?></span>
                        </div>
                    </div>
                    </div>
                    <div class="casino-description">
                    <p><?php echo $Description; ?></p>
                    </div>
                    <div class="sub-info">
                    <span class="sub-info-title">Etablert år</span>
                    <span class="sub-info-content"><?php echo $Year;?></span>
                    </div>
                    <div class="review-link">
                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?> anmeldelse"><?php the_title(); ?> anmeldelse</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="toplist-box-second-section">
            <a href="<?php echo $Link; ?>" title="Hent bonus fra <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Hent Bonus</a>
            <a href="<?php the_permalink() ?>" title="Les mer om <?php the_title(); ?>" class="button-4">Les mer</a>
        </div>
        </div>
    </section>
</div>