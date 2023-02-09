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
<?php $Especial= get_post_meta($post->ID, 'Especial', true); ?>
<?php $Odds= get_post_meta($post->ID, 'Odds', true); ?>

<tr class="table-row">
    <td class="image-col">  
        <a href="<?php echo $Link; ?>" title="Ir a <?php the_title(); ?>" target="_blank" rel="nofollow">
            <?php the_post_thumbnail( 'homepage-post-thumbnail' ); ?>
        </a>
    </td>
    <td class="title title-col expand">
        <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        <img class="casino-rating" src="<?php bloginfo('template_url'); ?>/images/<?php echo $Starsimg; ?>-stars.svg" alt="<?php echo $Stars; ?> Estrellas" width="85px" height="15px"></h3>
        <div class="tags">
            <?php include(TEMPLATEPATH."/review-tags.php");?>
        </div>
    </td>
    <td class="info-col info prosent expand sp-bet">
        <h4><?php echo $Percentage;?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24px" height="24px"><?php echo $Feature1; ?></div>
    </td>
    <td class="info-col info opptil expand sp-bet">
        <h4><?php echo $Bonus;?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24px" height="24px"><?php echo $Feature2; ?></div>
    </td>
    <td class="info-col info freespins expand sp-bet">
        <h4><?php echo $Wager;?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24px" height="24px"><?php echo $Feature3; ?></div>
    </td>
    <td class="info-col info wager expand sp-bet">
        <h4><?php echo $Especial;?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/check.webp" alt="Destacado" width="24px" height="24px"><?php echo $Feature4; ?></div>
    </td>
    <td class="button-col button">
        <a href="<?php echo $Link; ?>" title="Obtenga bonos de <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Obtener Bono</a>
        <a href="<?php the_permalink() ?>" title="Lee más de <?php the_title(); ?>" class="button-4">Ver más</a>
    </td>
</tr>