<?php
/**
 * Template Name: Contatos
 */
get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>
  

<div class="content-page">

    <h2 class="bloc-title ico-5">Contato</h2>
    <div class="row">
        <div class="form-contact ">
            <h2 class="bloc-title small">fale fonosco</h2>
            <?php the_content(); ?>
        </div>
        <div class="mapa">
            <h2 class="bloc-title small">como chegar</h2>   
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3658.011444057771!2d-46.640477!3d-23.5320908!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce585d76ba4eed%3A0x159dc587e712ed!2sR.+Aimor%C3%A9s%2C+22+-+Bom+Retiro%2C+S%C3%A3o+Paulo+-+SP%2C+01122-010!5e0!3m2!1spt-BR!2sbr!4v1458305439658" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            <a href="" class="revendas">REVENDAS LINNY</a>
            
        </div>
        
    </div>
            
       
    
    
</div>
            
       
    
    


<?php endwhile; ?>

<?php get_footer(); ?>
