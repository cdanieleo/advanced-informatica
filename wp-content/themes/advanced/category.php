<?php 
get_header(); ?>

<div class="container-fluid bg_internaBlog mg-top100">

    <div class="container">

        <div class="col-md-12 pd-top60 text-center">
        	<h2 class="txt_azul_claro"><strong>BLOG - <?php single_cat_title(); ?></strong></h2>

        </div>
      
        
	</div>
    </div>

 <div class="container mg-top50 pd-bottom40">
     
     <div class="col-md-10">
     <?php if ( have_posts() ) : ?>
			<?php
			// Start the Loop. 
                        $cont=0;
			while ( have_posts() ) : the_post(); $cont++;

				?>
                            <div class="col-md-6 text-center pd-bottom10">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog', array('class' => 'img-responsive width100')); ?></a>
                               <!--<img src="img/blog/solucoesMicrosoft01.jpg" alt="Soluções Microsoft" class="img-responsive">-->
                               <div class="bg-cinza text-left pd-20">
                                       <p class="txt_cinza txt-tam-12"><?php the_date('d/m/Y'); ?></p>
                                       <a href="<?php the_permalink(); ?>"><P class="txt_laranja"><strong><?php the_title(); ?></strong></P></a>
                       <p><?php the_excerpt(); ?></p>

                       <a href="<?php the_permalink(); ?>" class="link_laranja">Leia mais >></a>
                               </div>

                           </div>
     
                            <?php
                            if($cont == 2){$cont=0; echo'<div style="clear:both;"></div>'; }
			// End the loop.
			endwhile;

		endif;
		?>
     
     
 
    
    
    
   <!-- <div class="col-md-4 text-center pd-bottom10">
    	<img src="img/blog/solucoesMicrosoft02.jpg" alt="Soluções Microsoft" class="img-responsive">
        <div class="bg-cinza text-left pd-20">
        	<p class="txt_cinza txt-tam-12">00/00/00</p>
<P class="txt_laranja"><strong>Gerencie uma empresa rentável e eficiente</strong></P>
<p>Com a concorrência por toda a parte, a eficiência dos negócios é essencial. As soluções de tecnologia flexíveis da Microsoft ...</p>

<a href="blog_interna.html" class="link_laranja">Leia mais >></a>
        </div>
    
    </div>
    
    
    <div class="col-md-4 text-center pd-bottom10">
    	<img src="img/blog/solucoesMicrosoft03.jpg" alt="Soluções Microsoft" class="img-responsive">
        <div class="bg-cinza text-left pd-20">
        	<p class="txt_cinza txt-tam-12">00/00/00</p>
<P class="txt_laranja"><strong>Gerencie uma empresa rentável e eficiente</strong></P>
<p>Com a concorrência por toda a parte, a eficiência dos negócios é essencial. As soluções de tecnologia flexíveis da Microsoft ...</p>

<a href="blog_interna.html" class="link_laranja">Leia mais >></a>
        </div>
    
    </div>-->
    
    
    </div> 
<?php get_sidebar('listagem'); ?>
     </div>

<?php get_footer(); ?> 