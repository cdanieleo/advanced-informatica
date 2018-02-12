<div class="col-md-2 text-center pd-bottom10 ">
    	
        <div class="bg-cinza text-left pd-20  mg-bottom20">
        	
<P class="txt_laranja"><strong>CATEGORIAS</strong></P>

            <?php 
            
 $defaults = array( array(
    'orderby' => 'name',
    'order'   => 'ASC',
     'hide_empty'       => 0
) );
   $categories = get_categories( $defaults );
foreach($categories as $category) { 
    echo '<a class="link_blog" href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "Veja todos os posts de %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';
}
            ?>


        </div>
        
        
    
    </div>