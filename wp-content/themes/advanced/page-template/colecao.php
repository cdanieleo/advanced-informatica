<?php
/**
 * Template Name: Coleção
 */
get_header();
?>
 


<?php while (have_posts()) : the_post(); ?>

<h2 class="bloc-title ico-2">colecao</h2>
<div class="sliderlinny">
<div class="swiper-container ">
<div class="swiper-wrapper">
<?php
    $args = array('post_type' => 'galeriacolecao', "posts_per_page" => 1);
    query_posts($args);

    if (have_posts()) {
        while (have_posts()) : the_post();
            $galeria = get_field('galeria_de_fotos');
            ?>

            <?php if ($galeria):
                $cont=0;?>
                <?php foreach ($galeria as $image): $cont++;
                //var_export($image);
                ?>
                    <div class="swiper-slide">
                        <a href="<?php echo get_attachment_link($image['id']); ?>"> 
                            <img src="<?php echo $image['sizes']['thumb-colgal']; ?>" >
                        </a>
                    </div>            
                <?php 
                endforeach; ?>
            <?php endif; ?>



            <?php
        endwhile;
    }
    wp_reset_query();
?>
</div>
    
    </div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
</div>

<div class="mosaico">
<h2 class="bloc-title">mosaico</h2>
    <?php
    $args = array('post_type' => 'galeriacolecao', "posts_per_page" => 1);
    query_posts($args);

    if (have_posts()) {
        while (have_posts()) : the_post();
            $galeria = get_field('galeria_de_fotos');
             if ($galeria): ?>
                <?php foreach ($galeria as $image): ?>
                    <a href="<?php echo get_attachment_link($image['id']); ?>"> 
                        <img src="<?php echo $image['sizes']['thumb-listacol']; ?>" >
                    </a>
                <?php endforeach;
            endif; 
        endwhile;
    }
    wp_reset_query();
    ?>
</div>


<div class="instalook-box">
    <h2 class="bloc-title"><span>instalooks</span></h2>
    
    <?php
    $userid = "1447623703";
    $accessToken = "1447623703.c356d52.961257d6d897473dafda917f288b2b06";
    $instagram = file_get_contents("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=50");
    $instagram = json_decode($instagram);
    ?>
    <?php
            $cont=0;
            foreach($instagram->data as $post) {
                $cont++;
                if($cont <= 4){
                  ?>
                    <a href="<?php echo $post->link; ?>" target="_blank"><img src="<?php echo $post->images->standard_resolution->url; ?>" alt="" /></a>
                    <?php  
                }else{
                    break;
                }

        } ?>
    
    
</div>
<div class="ondeencontrar-box">
    <h2 class="bloc-title"><span>onde encontrar</span></h2><span>Revendas Linny</span>
    <a href="<?php bloginfo('siteurl'); ?>/encontre-linny"><img src="<?php bloginfo('template_url'); ?>/images/onde-encontrar.jpg"/> </a>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>

          
