<?php
$class = "";
if ($post->is_first){
    $class="large";
}
?>
<a class="slot-item <?php echo $class; ?>" href="<?php the_permalink(); ?>"><?php if ( is_front_page() ) { ?><h2><?php the_field('slot_pick_text', 28); ?></h2><?php } ?>
    <div class="slot-item-wrapper">
        <?php
        $featuredImage = get_field('sf_featured_image'); ?>
        <div class="image-container" 
            style="background-image: url(<?php echo $featuredImage; ?>);"
            alt="React Toons Slots Banner">
            <?php 
            $stars = get_field('sf_stars');
            //echo $stars;
            $stars = str_replace(".", "", number_format($stars,2,'.',''));
            $stars = str_replace("00", "0", $stars);
            if (strlen($stars) > 2){
                //echo "greater";
                $stars = str_replace("0", "", $stars);
            }?>
            <div class="stars">
                <img 
                src="<?php bloginfo('template_url'); ?>/images/<?php echo $stars; ?>-stars.svg" 
                alt="<?php echo get_field('sf_stars'); ?> Stjerner Anmeldelse"
                width="85px">
            </div>
        </div>
        <div class="content-container">
            <div class="rtp">
                <?php echo the_field('rtp'); ?> <span>RTP</span>
            </div>
            <div class="max-win">
                <?php echo the_field('max_win'); ?> <span>Max Win</span>
            </div>
            <div class="button-wrapper">
                <div class="button-3-small">
                    Les mer
                </div>
                <!-- <a href="<?php echo the_field('c_link'); ?>" title="Hent bonus fra <?php the_title(); ?>" target="_blank" class="button-3" rel="nofollow">Hent Bonus</a> -->
            </div>
        </div>
    </div>
</a>