<?php
/**
 * Template Name: Home
 */
get_header(); ?>

 <div class="form_home">
     <div class="form_medidas mg-20 pd-bottom40">
    	<div class="bg-azul-claro pd-20 txt_branco">
            
            <?php echo do_shortcode('[formpadrao destino="confirmacao-home" modelo="2"]'); ?>
             
        </div>
    </div>
    </div>
    
    <div class="container-fluid bg_home mg-top110">
    	
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
<li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
      
      <?php
        $args = array('post_type' => 'banner', "posts_per_page" => -1);
        query_posts($args);

        if (have_posts()) { $cont=0;
            while (have_posts()) : the_post();
            $cont++;
            if($cont == 1) $c ="active"; else $c="";
                ?>
                <div class="item <?php echo $c; ?>">
                     <?php the_post_thumbnail(); ?>
                     <div class="txt_tilt_home">
                         <a href="<?php the_field('link'); ?>" target="<?php the_field('target'); ?>">
                            <?php echo get_the_content(); ?>
                         </a>
                         
                       </div>
                   </div>


                <?php
            endwhile;
        }
        wp_reset_query();
    ?>
      
      
      
    
    <!--<div class="item">
      <img src="<?php bloginfo('template_url'); ?>/img/slide02.png" alt="Software Microsoft">
      <div class="txt_tilt_home">
       <h2><span class="txt_azul_claro"><strong>PROTEJA SUA EMPRESA</strong></span> COM O SOFTWARE ORIGINAL!</h2>
        <br><div class="linha_home"></div>
      A Advanced vai ajudá-lo com o licenciamento atual de sua empresa e indicar soluções fáceis, caso não tenha as licenças apropriadas ou tenha adquirido software falsificado de forma não intencional. 

      </div>
    </div>
    
     <div class="item">
      <img src="<?php bloginfo('template_url'); ?>/img/slide03.png" alt="Office 365">
      <div class="txt_tilt_home">
       <h2><span class="txt_azul_claro"><strong> REINVENTE SUA EMPRESA </strong></span>COM A MICROSOFT</h2>
        <br><div class="linha_home"></div>
       <strong> O Office 365</strong> é um pacote de soluções composto por software e serviços conectados à nuvem que fornecem total mobilidade e flexibilidade para o negócio.
      </div>
    </div>-->
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

  
    	
    
    </div>
    

<div class="container text-center">
	<h2 class="txt_azul_claro text-center">A ADVANCED INFO É SUA MELHOR OPÇÃO</h2>
    <p>A Advanced Informática está no mercado de tecnologia desde 1987, atuando com projetos de hardware e software em empresas de todas as regiões do Brasil.</p>
    <div class="linha_central"></div>
    <div class="row">
    <div class="col-md-6 mg-top50 text-center">
    	<div class="col-md-5 col-md-offset-5"><img src="<?php bloginfo('template_url'); ?>/img/icon_home01.jpg" alt="Diferencial 1" class="img-responsive" style="max-height:226px; max-width:226px;">
       <br> <p><strong class="txt_laranja">NOSSOS DIFERENCIAIS</strong><br>
Consultoria de TI com profissionais qualificados e transparência ao avaliar as necessidades de software e hardware de sua empresa.
</p></div>
    </div>
     <div class="col-md-6 mg-top50 text-center">
    	<div class="col-md-5 col-md-offset-2"><img src="<?php bloginfo('template_url'); ?>/img/icon_home02.jpg" alt="Diferencial 1" class="img-responsive" style="max-height:226px; max-width:226px;">
       <br> <p><strong class="txt_laranja">CONSULTORIA</strong><br>
Apoiamos sua empresa em todas as etapas do projeto.

</p></div>
    </div>
    </div>
    <div class="row">
     <div class="col-md-6 mg-top50 text-center">
    	<div class="col-md-5 col-md-offset-5"><img src="<?php bloginfo('template_url'); ?>/img/icon_home03.jpg" alt="Diferencial 1" class="img-responsive" style="max-height:226px; max-width:226px;">
       <br><p><strong class="txt_laranja">ESPECIALISTAS</strong><br>
Conte com um time focado nas melhores soluções em TI.
</p></div>
    </div>
     <div class="col-md-6 mg-top50 text-center">
    	<div class="col-md-5 col-md-offset-2"><img src="<?php bloginfo('template_url'); ?>/img/icon_home04.jpg" alt="Diferencial 1" class="img-responsive" style="max-height:226px; max-width:226px;">
       <br> <p><strong class="txt_laranja">FLEXIBILIDADE</strong><br>
Pagamentos em até 48x via CDC, Leasing ou BNDES.
</p></div>
    </div>
    </div><br>
    <p>A Advanced implanta novas tecnologias capazes de facilitar e agilizar processos na sua empresa.</p>
 </div>
<br>

<div class="container-fluid bg-cinza pd-bottom40">
  <div class="container text-center">
    	<h2>Certificações</h2>
        <div class="row">
            <div class="col-md-12">
                <img src="http://www.advancedinfo.com.br/wp-content/uploads/2016/10/logo_partner_microsoft.jpg" alt="Logo Microsoft Partner" class="img-responsive">
            </div>
        </div><br>
        <div class="row ">
            <div class="col-md-2 mg-top10">
             <img src="<?php bloginfo('template_url'); ?>/img/logo_partner_hp.jpg" alt="Logo Hewlett Packard">
            </div>
             <div class="col-md-2 mg-top10">
             <img src="<?php bloginfo('template_url'); ?>/img/logo_partner_lenovo.jpg" alt="Logo Lenovo">
            </div>
            <div class="col-md-2 mg-top10">
             <img src="<?php bloginfo('template_url'); ?>/img/logo_partner_adobe.jpg" alt="Logo Adobe">
            </div>
             <div class="col-md-2 mg-top10">
             <img src="<?php bloginfo('template_url'); ?>/img/logo_partner_hp2.jpg" alt="Logo HP">
            </div>
             <div class="col-md-2 mg-top10">
             <img src="<?php bloginfo('template_url'); ?>/img/logo_partner_vmware.jpg" alt="Logo VMware">
            </div>
            <div class="col-md-2 mg-top10">
             <img src="<?php bloginfo('template_url'); ?>/img/logo_partner_symantec.jpg" alt="Logo Symantec">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-azul-claro">
	<div class="container pd-bottom60">
    <h2 class="text-center">A Advanced em números</h2>
     <div class="linha_central2"></div>
  
    <div id="contador">
    
        <div class="col-md-3 pd-top20">
       <div id="numero"><span class="count"><?php the_field('clientes_cloud',11); ?></span> <p class="txt_numeros">Clientes Cloud </p></div>
       
       </div>
       <div class="col-md-3 pd-top20">
            <div id="numero"><span class="count"><?php the_field('office_365_vendidos',11); ?></span><p class="txt_numeros">Office 365 vendidos </p></div>
       </div>
        <div class="col-md-3 pd-top20">
            <div id="numero"><span class="count"><?php the_field('novos_clientes_no_ultimo_ano',11); ?></span> <p class="txt_numeros">novos clientes no último ano</p></div>
        </div>
         <div class="col-md-3 pd-top20">
            <div id="numero"><span class="count"><?php the_field('milhões_em_faturamento_microsoft_ultimos_12_meses',11); ?></span> <p class="txt_numeros"> anos de mercado<!--milhões em faturamento Microsoft últimos 12 meses--></p></div>
        </div>
    
      </div>
    
    </div>
    </div>


<?php get_footer(); ?>
