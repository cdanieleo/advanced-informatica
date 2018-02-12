<?php
/**
 * Template Name: Mavi
 */
get_header(); ?>


<div class="col-principal mavi-page">
 
<?php 
//$args = array('post_type' => 'mavi', "posts_per_page" => 1, "paged" => 1);
//query_posts($args);
//while ( have_posts() ) : the_post(); ?>

    <h1>Canal da Mavi Ferreira</h1>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/foH4fNIZ3sM" frameborder="0" allowfullscreen></iframe>
    <h2>Lorem ipsum dolor sit amet consectetur adipiscing elit.</h2>
    <span class="img-mavi"></span>

<?php //endwhile; ?>
    

</div>
<div class="col-right mavi-col">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/foH4fNIZ3sM" frameborder="0" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/foH4fNIZ3sM" frameborder="0" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/foH4fNIZ3sM" frameborder="0" allowfullscreen></iframe>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/foH4fNIZ3sM" frameborder="0" allowfullscreen></iframe>
</div>
    
    
<?php get_footer(); ?>
