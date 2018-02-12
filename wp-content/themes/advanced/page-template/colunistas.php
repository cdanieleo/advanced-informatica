<?php
/**
 * Template Name: Colunistas
 */
get_header(); ?>
<div class="col-principal">
 <?php  while ( have_posts() ) : the_post(); ?>
<h1 class="page-title"><?php the_title(); ?></h1>
    <div class="cont-page">
    

    <?php
    $allUsers = get_users('orderby=post_count&order=DESC');
    $users = array();
    // Remove subscribers from the list as they won't write any articles
    foreach ($allUsers as $currentUser) {
        if (!in_array('subscriber', $currentUser->roles) && !in_array('administrator', $currentUser->roles)) {
            $users[] = $currentUser;
        }
    }

    $contador=0;
    foreach ($users as $user) {
        ?>
        <div class="single-col">
            <div class="info-col">
                <?php $img = get_field('foto', 'user_'.$user->ID);  ?>
                <?php if($img){ ?>
                <img class="photo" src="<?php echo $img['url']; ?>"/>
                <?php } ?>
                <h2><?php echo $user->display_name; ?></h2>
                <span class="col-name"><?php 
                $cat = get_field('coluna', 'user_'.$user->ID);
                echo get_cat_name($cat[0]); ?></span>
                <?php the_field('descricao','user_'.$user->ID); ?>
                
            </div>
            <div class="last-post">
        <?php
        $args = array(
            'author' => $user->ID,
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'caller_get_posts' => 1
        );
        $my_query = null;
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) : $my_query->the_post();
                ?>
                        <?php
                        $imagemDestacada = defaultImage($my_query->ID, 'galeria-principal');
                        echo $imagemDestacada;
                        
                        ?>
                        <div class="infos">
                            <span class="cat"><?php echo the_excluded_category(array(1),'depois'); ?></span>
                            <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                        </div>
            <?php

        endwhile;
        }
    wp_reset_query();?>
         </div><div class="clear"></div>
        </div>
        <div class="clear"></div>
    <?php 
    }
    ?>
                
   
    <?php the_content(); ?>
    

<?php  endwhile; ?>
 
</div><div class="clear"></div>
    </div>
<?php get_footer(); ?>
