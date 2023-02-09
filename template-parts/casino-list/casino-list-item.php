<tr class="table-row">
    <td class="vanish-mobile ninth">  
        <a href="<?php echo $Link; ?>" title="Gå til <?php the_title(); ?>" target="_blank" rel="nofollow">
            <?php the_post_thumbnail( 'homepage-post-thumbnail' ); ?>
        </a>
    </td>
	<?php 
	$stars = get_field('c_stars');
	//echo $stars;
	$stars = str_replace(".", "", number_format($stars,2,'.',''));
	$stars = str_replace("00", "0", $stars);
	if (strlen($stars) > 2){
		//echo "greater";
		$stars = str_replace("0", "", $stars);
	}?>
    <td class="title vanish-mobile twoninth expand">
        <h3><a href="<?php echo the_field('c_link'); ?>" target="_blank" rel="nofollow" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        <img class="casino-rating" src="<?php bloginfo('template_url'); ?>/images/<?php echo $stars; ?>-stars.svg" alt="<?php echo get_field('c_stars'); ?> Stjerner Anmeldelse" width="85px" height="15px"></h3>
        <div class="tags">
			<?php
			$taxonomy = 'casino_tags';
			$args1=array(
				);

			$terms = get_terms('casino_tags',$args1 );
			$terms = get_the_terms($post->ID, 'casino_tags');
			if  ($terms) {
			  foreach ($terms as $term ) {
				?>
				<span class="tag"><?php echo $term->name; ?></span>
				<?php
			  }
			}
			?>
        </div>
    </td>
	<?php
	
	$features = array();

	// Check rows exists.
	if( have_rows('c_features') ):

	// Loop through rows.
	while( have_rows('c_features') ) : the_row();

		// Load sub field value.
		$sub_value = get_sub_field('feature');
		array_push($features,$sub_value);
		// Do something...

	// End loop.
	endwhile;

	// No value.
	else :
	// Do something...
	endif;
	
	$details = get_field('c_details');
	?>
    <td class="vanish-mobile ninth info bonus expand sp-bet">
        <h4><?php echo $details['c_detail_1'];?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/checkmark.svg" alt="Trekk" width="15px" height="24px"><?php echo $features[0]; ?></div>
    </td>
    <td class="vanish-mobile ninth info wager expand sp-bet">
        <h4><?php echo $details['c_detail_2'];?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/checkmark.svg" alt="Trekk" width="15px" height="24px"><?php echo $features[1]; ?></div>
    </td>
    <td class="vanish-mobile ninth info special-feature expand sp-bet">
        <h4><?php echo $details['c_detail_3'];?></h4>
        <div class="feature"><img src="<?php bloginfo('template_url'); ?>/images/checkmark.svg" alt="Trekk" width="15px" height="24px"><?php echo $features[2]; ?></div>
    </td>
    <td class="vanish-mobile twoninth button">
        <a href="<?php echo the_field('c_link'); ?>" title="Hent bonus fra <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Obtener Bono</a>
    </td>
</tr>