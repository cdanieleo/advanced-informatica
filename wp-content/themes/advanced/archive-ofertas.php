<?php get_header(); ?>




<div class="container-fluid bg_internaBlog mg-top100">

    <div class="container">

        <div class="col-md-12 pd-top60 text-center">
        	<h2 class="txt_azul_claro"><strong>OFERTAS</strong></h2>

        </div>
      
        
	</div>
    </div>

 <div class="container mg-top50 pd-bottom40">
 <div class="col-md-9">
     
     <?php if (have_posts()) : ?>
        <?php
        // Start the loop.
        while (have_posts()) : the_post();
        
            $thumb_id = get_post_thumbnail_id();
            $imgSrc = wp_get_attachment_image_src($thumb_id,'ofertas', true);
        
        ?>
     
     <div class="col-md-4 text-center pd-bottom10">
    	<a href="<?php the_permalink(); ?>"><img src="<?php echo $imgSrc[0]; ?>" alt="Oferta" class="img-responsive">
        <p><?php the_title(); ?></p></a>
    </div>
     
       <?php  endwhile;
         else : ?>
         <div class="col-md-4 text-center pd-bottom10">
            <p>Nenhum conteúdo encontrado</p>

        </div>
         <?php endif; ?>
     
    
    </div>
    
    
    
    
    
  
    
    
    <div class="col-md-3 text-center pd-bottom10 ">
    	
        <div class="bg-cinza text-left pd-20  mg-bottom20">
        	
<P class="txt_laranja"><strong>Inscreva-se em nossa Newsletter</strong></P>

    	<input type="text" value="Digite seu E-mail" class="input-sm lg100">
        <br>
  
<a href="" class="btn btn-yellow btn-lg btn-block">Enviar</a>

        </div>
        
        
         <div class="bg-cinza text-left pd-20 mg-bottom20">
    <P class="txt_laranja"><strong>CATEGORIAS</strong></P>

             <?php
             $categories = get_terms( 'categoryoferta', array(
                    'orderby'    => 'count',
                    'hide_empty' => 0
                ) );
             
             foreach($categories as $category) { 
    echo '<a class="link_blog" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Veja todos os posts de %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
}
             //var_export($categories);
             ?>
             
<!--<P class="txt_laranja"><strong>Assunto</strong></P>
<input type="text" class="input-sm lg100">
        <br>
  
<a href="" class="btn btn-yellow btn-lg btn-block">Buscar</a>-->



        </div>
    
    </div>
    
    
   
    
    
    </div>





<?php get_footer(); ?>
