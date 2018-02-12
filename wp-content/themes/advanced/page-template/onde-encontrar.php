<?php
/**
 * Template Name: Onde Encontrar
 */
get_header(); ?>

 
<?php while ( have_posts() ) : the_post(); ?>
  

<div class=" page-content">
    <h2 class="bloc-title ico-4">encontre linny</h2>
    <div class="text-center">
        <div class="recado"></div>
        <span class="" data-os-animation-delay="1s" data-os-animation="fadeIn" style="margin: auto; float: none; display: inline-block; margin-bottom:80px; margin-top:30px;">
                <select id="country_id" name="uf" onChange="link(this);" style="width:210px; height:33px; border:1px solid #7f7f7f; color:#7f7f7f; font-family: 'Lato', sans-serif">
                	<option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=" <?php if ($_GET['estado'] == '') { ?> selected="selected"<?php } ?> >Selecione por região</option>
                
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=AC" <?php if ($_GET['estado'] == 'AC') { ?> selected="selected"<?php } ?> >AC</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=AL" <?php if ($_GET['estado'] == 'AL') { ?> selected="selected"<?php } ?> >AL</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=AP" <?php if ($_GET['estado'] == 'AP') { ?> selected="selected"<?php } ?> >AP</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=AM" <?php if ($_GET['estado'] == 'AM') { ?> selected="selected"<?php } ?> >AM</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=BA" <?php if ($_GET['estado'] == 'BA') { ?> selected="selected"<?php } ?> >BA</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=CE" <?php if ($_GET['estado'] == 'CE') { ?> selected="selected"<?php } ?> >CE</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=DF" <?php if ($_GET['estado'] == 'DF') { ?> selected="selected"<?php } ?> >DF</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=ES" <?php if ($_GET['estado'] == 'ES') { ?> selected="selected"<?php } ?> >ES</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=GO" <?php if ($_GET['estado'] == 'GO') { ?> selected="selected"<?php } ?> >GO</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=MA" <?php if ($_GET['estado'] == 'MA') { ?> selected="selected"<?php } ?> >MA</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=MT" <?php if ($_GET['estado'] == 'MT') { ?> selected="selected"<?php } ?> >MT</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=MS" <?php if ($_GET['estado'] == 'MS') { ?> selected="selected"<?php } ?> >MS</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=MG" <?php if ($_GET['estado'] == 'MG') { ?> selected="selected"<?php } ?> >MG</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=PA" <?php if ($_GET['estado'] == 'PA') { ?> selected="selected"<?php } ?> >PA</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=PB" <?php if ($_GET['estado'] == 'PB') { ?> selected="selected"<?php } ?> >PB</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=PR" <?php if ($_GET['estado'] == 'PR') { ?> selected="selected"<?php } ?> >PR</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=RJ" <?php if ($_GET['estado'] == 'PE') { ?> selected="selected"<?php } ?> >PE</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=PI" <?php if ($_GET['estado'] == 'PI') { ?> selected="selected"<?php } ?> >PI</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=RJ" <?php if ($_GET['estado'] == 'RJ') { ?> selected="selected"<?php } ?> >RJ</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=RN" <?php if ($_GET['estado'] == 'RN') { ?> selected="selected"<?php } ?> >RN</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=RS" <?php if ($_GET['estado'] == 'RS') { ?> selected="selected"<?php } ?> >RS</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=RO" <?php if ($_GET['estado'] == 'RO') { ?> selected="selected"<?php } ?> >RO</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=RR" <?php if ($_GET['estado'] == 'RR') { ?> selected="selected"<?php } ?> >RR</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=SC" <?php if ($_GET['estado'] == 'SC') { ?> selected="selected"<?php } ?> >SC</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=SP" <?php if ($_GET['estado'] == 'SP') { ?> selected="selected"<?php } ?> >SP</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=SE" <?php if ($_GET['estado'] == 'SE') { ?> selected="selected"<?php } ?> >SE</option>
                        <option value="<?php bloginfo('siteurl'); ?>/onde-encontrar/?estado=TO" <?php if ($_GET['estado'] == 'TO') { ?> selected="selected"<?php } ?> >TO</option>

                        
                </select>
                </span>
    </div>
    
    
        

                <?php 
                if($_GET['estado'] == '')
                    $args = array('post_type' => 'ondeencontrar', "posts_per_page" => -1);
                else
                    $args = array('post_type' => 'ondeencontrar', "posts_per_page" => -1, 'meta_query'=> array(
        array(
            'key'=>'estado',
            'value'=> addslashes(trim($_GET['estado'])),
            'compare' => '='
        )
    ));
                    
                query_posts($args);
                $cont = 0;
                if (have_posts()) { 
                    while (have_posts()) : the_post();
                        $img = get_field('foto');
                    ?>
                        <div class="single-insta">
                            <img src="<?php if ($img['url'] != "") { echo $img['url']; } else { echo get_bloginfo('template_url')."/images/semfoto.png"; } ?>" border="0" alt="" /><br />
                                <span class="name"><?php the_title(); ?></span>
                            <span class="cidade"><?php the_field('cidade'); ?> - <?php the_field('estado'); ?></span>
                            <div class="insta"><span><?php the_field('instagram'); ?><span></div>
                            <div class="tel"><span><?php the_field('telefone'); ?></span></div>
                        </div>
                    <?php 
                        endwhile; 
                }else {
				echo "<center style='font-size:18px;'>Nenhum resultado encontrado.</center>";;
			}
                wp_reset_query();
                ?>
                
                
          
            
   
</div>


<?php endwhile; ?>

<?php get_footer(); ?>
