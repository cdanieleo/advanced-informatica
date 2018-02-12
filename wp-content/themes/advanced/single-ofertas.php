<?php
get_header(); ?>

<div class="container-fluid bg_internaBlog mg-top100">

    <div class="container">

        <div class="col-md-12 pd-top60 text-center">
        	<h2 class="txt_azul_claro"><strong>OFERTAS</strong></h2>

        </div>
      
        
	</div>
    </div>

 <div class="container mg-top50 pd-bottom40">
 <div class="col-md-9">
    
   
        <?php  while (have_posts()) : the_post();  ?>
     
            <?php the_content(); ?>
     
       <?php  endwhile; ?>
        
   
   
   
    <br>
    <a href="ofertas.html" class="btn btn-yellow btn-lg btn-block">Voltar</a>
    
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
