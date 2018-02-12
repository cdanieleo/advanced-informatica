<?php
get_header(); ?>


<div class="container-fluid bg_internaBlog mg-top100">

    <div class="container">

        <div class="col-md-12 pd-top60 text-center">
        	<h2 class="txt_azul_claro"><strong>BLOG</strong></h2>

        </div>
      
        
	</div>
    </div>

 <div class="container mg-top50 pd-bottom40">
 
    <div class="col-md-10 text-center pd-bottom10">
        <!-- INICIO POST -->
        <?php  while ( have_posts() ) : the_post(); ?>
            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
        
        
        
        
        <div class="col-md-2 mg-top20 text-left">
        	<img src="<?php bloginfo('template_url'); ?>/img/blog/icon_calendar.png" alt="Ícone de calendário">
           <span class=" pd-10 txt_cinza"><?php the_date('d/m/Y'); ?></span>
        </div>
         <div class="col-md-3 mg-top20 text-left">
        	<img src="<?php bloginfo('template_url'); ?>/img/blog/icon_autor.png" alt="Ícone de Pessoa">
           <span class=" pd-10 txt_cinza"> Postado por <?php the_author(); ?></span>
        </div>
         <div class="col-md-7 mg-top20 text-left">
        	<img src="<?php bloginfo('template_url'); ?>/img/blog/icon_coments.png" alt="Ícone de calendário">
           <span class=" pd-10 txt_cinza"> <?php echo get_comments_number(); ?> comentários</span>
        </div>
        
        <div class="cf"></div>
        <div class="linhaBlog "></div>
        <div class="text-left pd-20">
<h2 class="txt_laranja"><strong><?php the_title(); ?></strong></h2>
<?php the_content(); ?>

        </div>
        
         
    <div class="linhaBlog "></div>
  
    
    <?php
    $foto = get_field('foto', 'user_'.get_the_author_ID());
    if($foto){
    ?>
   <div class=" col-md-2 mg-top20"> <img src="<?php echo $foto['sizes']['autor']; ?>" alt="Avatar Autor"></div>
    <?php } ?>
    <div class=" col-md-10 text-left"><h2 class="txt_laranja">Sobre o autor <?php the_author_meta( 'display_name' ); ?></h2>
        <p><?php echo nl2br(get_the_author_meta('description')); ?></p> <?php if(get_field('link_linkedin', 'user_'.get_the_author_ID())){ ?><a href="<?php the_field('link_linkedin', 'user_'.get_the_author_ID()) ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/blog/rede_linkedin.jpg" alt="Rede Social Linkedin"></a> <?php } ?></div>
    <div class="cf"></div>
    <div class="linhaBlog "></div>
    
<?php comments_template(); ?>    
     
 
    <?php endwhile; ?>
    <!-- FIM POST --->
    </div>
    
    
  
    
    
    <?php get_sidebar(); ?>
    
    
   
    
    
    </div>




 
    

<?php get_footer(); ?>
