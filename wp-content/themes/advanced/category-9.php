<?php
get_header(); ?>


<div class="col-principal">
    <div class="ad-inner">
<?php echo adrotate_ad(4); ?>
    </div>

 
        <h1 class="page-title"><?php single_cat_title(); ?></h1>
<?php 
 $imagem= get_field('imagem', 'category_'.get_query_var('cat'));
 if($imagem)echo'<img class="category-img" src="'.$imagem['url'].'">';
 ?>
<?php while ( have_posts() ) : the_post(); ?>

    <div class="single-box cat-9">
        <?php
        $imagemDestacada = get_the_post_thumbnail($post->ID, 'listagem');
        if($imagemDestacada) echo $imagemDestacada;
        ?>
        <div class="content-box">
        <div class="date">
            <?php
            $dia = substr(get_field('data_do_evento'), 6, 2);
            $mes = substr(get_field('data_do_evento'), 4, 2);
            $ano = substr(get_field('data_do_evento'), 0, 4);
            ?>
            
            <?php echo $dia; ?>.<?php echo $mes; ?><br/><span><?php echo $ano; ?></span>
        </div>
            <span class="cat"><?php echo the_excluded_category(array(1),'depois'); ?></span>
            <a class="more" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1>
                <div class="content-by-admin"><?php the_content(); ?></div>
           </a>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
    
    
<?php endwhile; wp_reset_query(); ?>
    

</div>

    <?php get_sidebar(); ?>
    
    
<?php get_footer(); ?>
