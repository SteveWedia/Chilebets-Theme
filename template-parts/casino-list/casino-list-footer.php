<div id="content-page">
            <?php $Question1 = get_post_meta($post->ID, 'Question1', true); ?>
            <?php $Question2 = get_post_meta($post->ID, 'Question2', true); ?>
            <?php $Question3 = get_post_meta($post->ID, 'Question3', true); ?>
            <?php $Question4 = get_post_meta($post->ID, 'Question4', true); ?>
            <?php $Answer1 = get_post_meta($post->ID, 'Answer1', true); ?>
            <?php $Answer2 = get_post_meta($post->ID, 'Answer2', true); ?>
            <?php $Answer3 = get_post_meta($post->ID, 'Answer3', true); ?>
            <?php $Answer4 = get_post_meta($post->ID, 'Answer4', true); ?>
            <article>
               <?php while (have_posts()) : the_post();
                  the_content('');
                  endwhile; ?>
               <?php include(TEMPLATEPATH."/faq.php");?>
            </article>
         </div>
      </div>
   </div>