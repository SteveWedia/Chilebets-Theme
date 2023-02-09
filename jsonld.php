    <?php
    $Question1 = get_post_meta($post->ID, 'Question1', true);
    $Question2 = get_post_meta($post->ID, 'Question2', true);
    $Question3 = get_post_meta($post->ID, 'Question3', true);
    $Question4 = get_post_meta($post->ID, 'Question4', true);
    $Answer1 = get_post_meta($post->ID, 'Answer1', true);
    $Answer2 = get_post_meta($post->ID, 'Answer2', true);
    $Answer3 = get_post_meta($post->ID, 'Answer3', true);
    $Answer4 = get_post_meta($post->ID, 'Answer4', true);
    if ($Question1):
        $json = '';
        $jsonQuestion1 = '';
        $jsonQuestion2 = '';
        $jsonQuestion3 = '';
        $jsonQuestion4 = '';

        $jsonQuestion1 = '{"@type":"Question","name":"'.$Question1.'","acceptedAnswer":{"@type":"Answer","text":"'.$Answer1.'"}}';
        //echo $jsonQuestion1;
        if ($Question2):
            $jsonQuestion2 = ',{"@type":"Question","name":"'.$Question2.'","acceptedAnswer":{"@type":"Answer","text":"'.$Answer2.'"}}';
        endif;
        if ($Question3):
            $jsonQuestion3 = ',{"@type":"Question","name":"'.$Question3.'","acceptedAnswer":{"@type":"Answer","text":"'.$Answer3.'"}}';
        endif;
        if ($Question4):
            $jsonQuestion4 = ',{"@type":"Question","name":"'.$Question4.'","acceptedAnswer":{"@type":"Answer","text":"'.$Answer4.'"}}';
        endif;
        $json = $jsonQuestion1.$jsonQuestion2.$jsonQuestion3.$jsonQuestion4;
    ?>
    <!-- / Custom Schema -->
    <script type="application/ld+json">
        {"@context":"https://schema.org","type":"FAQPage","mainEntity":[<?php echo $json; ?>]}
    </script>
    <?php
    endif;
    ?>
<?php
// If Casino Review
if( in_category( 'anmeldelser' ) ):
?>
<?php 
    $StarsRank = get_post_meta($post->ID, 'Stars', true); 
?>
    <!-- / Custom Schema -->
    <script type="application/ld+json">
        {"@context":"https://schema.org","@type":"Review","itemReviewed":{"@type":"Organization","name":"<?php echo htmlentities(get_the_title(), ENT_QUOTES); ?>"},"reviewRating":{"@type":"Rating","ratingValue":"<?php echo $StarsRank; ?>", "bestRating":"5", "worstRating": "1"},"datePublished":"<?php echo htmlentities(get_the_date("Y-m-d\TH:i:s+Z"), ENT_QUOTES); ?>", "dateModified": "<?php echo htmlentities(get_the_modified_date("Y-m-d\TH:i:s+Z"), ENT_QUOTES); ?>","author":{"@type":"Organization","name":"Kongebonus","sameAs":"https://www.kongebonus.com"},"publisher":{"@type":"Organization","name":"Kongebonus","sameAs":"https://www.kongebonus.com"}}
    </script>
<?php
endif;
?>
<?php
// If post is Casino List
if( $post->ID == 98) {
?>
    <!-- / Custom Schema -->
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Table",
        "about": "Casinoliste"
        }
    </script>
<?php
}
?>