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
<?php $CasinoMaxbet = get_post_meta($post->ID, 'Casinomaxbet', true); ?>
<?php $CasinoPercentage = get_post_meta($post->ID, 'Casinopercentage', true); ?>
<?php $CasinoBonus = get_post_meta($post->ID, 'Casinobonus', true); ?>
<?php $CasinoWager = get_post_meta($post->ID, 'Casinowager', true); ?>
<?php $Especial = get_post_meta($post->ID, 'Especial', true); ?>
<?php
$type = $args['type'];
//echo $type;?>

    <tr class="main slim-row" id="row-<?php echo $post->ID; ?>">
        <td class="image-col">
            <a href="<?php echo $Link; ?>" title="Gå til <?php the_title(); ?>" target="_blank" rel="nofollow">
                <?php the_post_thumbnail( 'homepage-post-thumbnail' ); ?>
            </a>
        </td>
        <td class="title title-col">
            <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
            <img class="casino-rating" src="<?php bloginfo('template_url'); ?>/images/<?php echo $Starsimg; ?>-stars.svg" alt="<?php echo $Stars; ?> Stjerner Anmeldelse" width="85px" height="15px">
        </td>
        <td class="info custom sp-bet info-col" style="--field-title: 'PORSENT';">
            <h4><?php 
            if($type == 'casino'){
                echo $CasinoPercentage;
            } else {
                echo $Percentage;
            }?></h4>
        </td>
        <?php
            $fieldTitle = 'MONTO DEL BONO';
            if($type == 'casino'){
                $fieldTitle = 'BONO DE CASINO';
            }
        ?>
        <td class="info custom sp-bet info-col" style="--field-title: '<?php echo $fieldTitle; ?>';">
            <h4>
            <?php
            if($type == 'casino'){
                echo $CasinoBonus;
            } else {
                echo $Bonus;
            }?>
            </h4>
        </td>
        <td class="info custom sp-bet info-col" style="--field-title: 'ROLLOVER';">
            <h4>
            <?php
            if($type == 'casino'){
                echo $CasinoWager;
            } else {
                echo $Wager;
            }?>
            </h4>
        </td>
        <?php
            $fieldTitle = 'ESPECIAL';
            if($type == 'casino'){
                $fieldTitle = 'TIRADAS GRATIS';
            }
        ?>
        <td class="info custom sp-bet info-col" style="--field-title: '<?php echo $fieldTitle ?>';">
            <h4>
                <?php
                if($type == 'casino'){
                    echo $Freespins;
                } else {
                    echo $Especial;
                }?>
            </h4>
        </td>
        <td class="button button-col">
            <a href="<?php echo $Link; ?>" title="Hent bonus fra <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Hent Bonus</a>
        </td>
    </tr>