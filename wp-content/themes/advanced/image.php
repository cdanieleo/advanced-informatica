<?php
get_header(); 
?>
<div class="box-image">
    <a href="javascript:history.back()" class="close-image"></a>
<?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            $image_size = apply_filters( 'twentyfifteen_attachment_size', 'large' );

            echo wp_get_attachment_image( get_the_ID(), $image_size );
 
        // End the loop.
        endwhile;
?>
    <a href="#" class="share"></a>
</div>
<?php get_footer(); ?>
