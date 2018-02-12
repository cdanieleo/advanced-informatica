<?php
/**
 * Template Name: Look Book
 */
get_header();

$userid = "1447623703";
    $accessToken = "1447623703.c356d52.961257d6d897473dafda917f288b2b06";
    $instagram = file_get_contents("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=50");
    $instagram = json_decode($instagram);

?> 

<?php while ( have_posts() ) : the_post(); ?>
  

<div class="mosaico">
<h2 class="bloc-title ico-3">instalooks</h2>
   
            <?php
            $cont=0;
                foreach($instagram->data as $post) {
                      ?>
                        <a href="<?php echo $post->link; ?>" target="_blank"><img src="<?php echo $post->images->standard_resolution->url; ?>" alt="" /></a>
                        <?php  
            } ?>
                <div class="clear"></div>
    
</div>


<?php endwhile; ?>

<?php get_footer(); ?>
