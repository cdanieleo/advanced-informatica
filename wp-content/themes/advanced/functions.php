<?php

function theme_setup() {


	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	
        
	add_theme_support( 'post-thumbnails' );
        //add_image_size( 'banner', 1366, 468, true );
        add_image_size( 'ofertas', 220, 150, array( 'top', 'center' ) );
        add_image_size( 'blog', 370, 185, array( 'top', 'center' ) );
        add_image_size( 'autor', 88, 88, array( 'top', 'center' ) );
         
        
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'principal' => 'Menu Principal',
	) );

	
	
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function theme_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'theme_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function theme_scripts() {


	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'theme-ie', get_template_directory_uri() . '/css/ie.css', array( 'theme-style' ), '20141010' );
	wp_style_add_data( 'theme-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'theme-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'theme-style' ), '20141010' );
	wp_style_add_data( 'theme-ie7', 'conditional', 'lt IE 8' );
        
        wp_enqueue_style( 'font-1', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700');
         
        
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
        wp_enqueue_style('animation', get_bloginfo("template_url") . "/css/animation.css");
        wp_enqueue_style('jqueryui', "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css");
        wp_enqueue_style( 'selectbox', get_template_directory_uri() . '/js/selectbox/css/jquery.selectbox.css');
        wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css');
        wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css');
        
         
	wp_enqueue_style( 'style', get_stylesheet_uri() );
        


        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', "http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js");

        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
        
        wp_enqueue_script('waypoints', get_bloginfo("template_url") . "/js/waypoints/jquery.waypoints.min.js");
        
        wp_enqueue_script('imagesloaded', get_bloginfo("template_url") . "/js/imagesloaded/imagesloaded.pkgd.min.js");
        
        wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel-3.0.6.min.js');
        wp_enqueue_script( 'selectbox', get_template_directory_uri() . '/js/selectbox/js/jquery.selectbox-0.2.js');
        wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js');
        wp_enqueue_script( 'script', get_template_directory_uri() . '/js/custom.js?v='.date('Ymdhis'));
	
}
//add_action( 'wp_enqueue_scripts', 'theme_scripts' );




add_action( 'init', 'create_book_tax' );

function create_book_tax() {
	register_taxonomy(
		'categoryoferta',
		'book',
		array(
			'label' => __( 'Categorias' ),
			'rewrite' => array( 'slug' => 'categoria-oferta' ),
			'hierarchical' => true,
		)
	);
}



function create_post_type() {

    register_post_type('ofertas', array(
        'labels' => array(
            'name' => __('Ofertas'),
            'singular_name' => __('Oferta')
        ),
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'ofertas'),
        'taxonomies'  => array( 'categoryoferta' )
            )
    );
    
    
    register_post_type('banner', array(
        'labels' => array(
            'name' => __('Banners'),
            'singular_name' => __('Banner')
        ),
        'public' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'supports' => array( 'title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'banners')
            )
    );
    //remove_post_type_support( 'ondeencontrar', 'editor' );
    
    
   /* 
    register_post_type('galeriacolecao', array(
        'labels' => array(
            'name' => __('Coleção'),
            'singular_name' => __('Coleção')
        ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'rewrite' => array('slug' => 'colecao')
            )
    );
    remove_post_type_support( 'galeriacolecao', 'editor' );*/
    
    
    // SE MUDAR AS SLUGS, TEM QUE RODAR O CAMANDO ABAIXO PRA DAR UM REFRESH NELAS
   flush_rewrite_rules();         
}
add_action('init', 'create_post_type');

function urlbase( $atts ){
 return get_bloginfo('template_url');
}
add_shortcode( 'urlbase', 'urlbase' );

function urlsite( $atts ){
 return get_bloginfo('siteurl');
}
add_shortcode( 'urlsite', 'urlsite' );





function formPadrao( $atts ){
    
    $idAleatorio = rand(1,1000);
    
    global $post; 
    
    if($atts['modelo'] == "2"){
        $mensagem="<h2><strong>FAÇA UM ORÇAMENTO!</strong></h2>
			<p>É rápido e sem compromisso.</p>";
    }elseif($atts['modelo'] == "3"){
        $mensagem="<h2><strong>Faça sua transição para a nuvem</strong></h2>
			<p>É rápido e sem compromisso.</p>";
    }elseif($atts['modelo'] == "4"){
        $mensagem="<h3><strong>Entre em contato com o nosso especialista</strong></h3>
			<p>E saiba mais sobre as soluções Symantec:</p>";
    }elseif($atts['modelo'] == "5"){
        $mensagem="<h3><strong>Fale com um especialista e peça agora o seu!</strong></h3>
			<p>Basta preencher o formulário abaixo:</p>";
    }elseif($atts['modelo'] == "6"){
        $mensagem="<p><strong>Consulte-nos para implementar as soluções Lenovo em sua empresa!</strong></p>
			<p>Basta preencher o formulário abaixo:</p>";
    }else{
        $mensagem="<p><strong>Consulte-nos para implementar as soluções em sua empresa!</strong></p>
	<p>Basta preencher o formulário abaixo:</p>";
    }
    
 $html= $mensagem.'
        <input type="hidden" id="txtorigem-'.$idAleatorio.'" value="'.$post->ID.'" />
        <label class="form01">Nome*</label><input type="text" id="txtnome-'.$idAleatorio.'" class="form-control" placeholder="Nome Completo" required><br>
        <label class="form01">Telefone*</label><input type="text" id="txttelefone-'.$idAleatorio.'" class="form-control" placeholder="(xx) xxxx xxxx" required><br>
        <label class="form01">CNPJ <span class="txt-tam-12">(opcional)</span></label><input type="text" id="txtcnpj-'.$idAleatorio.'" class="form-control" placeholder="xx.xxx.xxx/xxxx-xx"><br>
        <label class="form01">E-mail*</label><input type="email" class="form-control" id="txtemail-'.$idAleatorio.'" placeholder="xx@xx.com" required><br>
        <label class="form01">Observações</label><textarea id="txtobservacoes-'.$idAleatorio.'" class=" form-control lg100"></textarea><br>
        <p class="txt-tam-12">*Campos obrigatórios</p>
        <a class="btn btn-default btn-lg btn-block btn-ativaenvio" data-id="'.$idAleatorio.'" data-destino="'.get_bloginfo('siteurl').'/'.$atts['destino'].'"  href="#">ENVIAR</a>';
 
 
     return $html;
 
}
add_shortcode( 'formpadrao', 'formPadrao' );




function formBanner( $atts ){
    
    $idAleatorio = rand(1,1000);
    
    global $post; 
    
 $html= '

        <input type="hidden" id="txtorigembanner-'.$idAleatorio.'" value="'.$post->ID.'" />
        <table class="tab_form">
            <tr>
                <td>Nome*:</td>
                <td><input type="text" id="txtnomebanner-'.$idAleatorio.'" class="form-control" required></td>
            </tr>
            <tr>
                <td>Telefone*:</td>
                <td><input type="text" id="txttelefonebanner-'.$idAleatorio.'" class="form-control" required></td>
            </tr>

            <tr>
                <td>E-mail*:</td>
                <td><input type="text" class="form-control" id="txtemailbanner-'.$idAleatorio.'"  required></td>
            </tr>
             <tr>
                <td>Observações:</td>
                <td><textarea id="txtobservacoesbanner-'.$idAleatorio.'" class=" form-control lg100"></textarea></td>
            </tr>
            <tr>

                <td colspan="2"><button class="btn-ativaenviobanner"  data-id="'.$idAleatorio.'" data-destino="'.get_bloginfo('siteurl').'/'.$atts['destino'].'">ENVIAR</button></td>
            </tr>
        </table>';
 
 
     return $html;
 
}
add_shortcode( 'formbanner', 'formbanner' );





function formoffice365( $atts ){
    
    $idAleatorio = rand(1,1000);
    
    global $post; 
    
    
 $html= '<h2 style="margin-top:0;"><strong>FAÇA UM ORÇAMENTO!</strong></h2>
			<p>É rápido e sem compromisso.</p>
        <input type="hidden" id="txtorigem-'.$idAleatorio.'" value="'.$post->ID.'" />
        <label class="form01">Nome*</label><input type="text" id="txtnome-'.$idAleatorio.'" class="form-control" placeholder="Nome Completo" required><br>
        <label class="form01">Telefone*</label><input type="text" id="txttelefone-'.$idAleatorio.'" class="form-control" placeholder="(xx) xxxx xxxx" required><br>
        <label class="form01">CNPJ <span class="txt-tam-12">(opcional)</span></label><input type="text" id="txtcnpj-'.$idAleatorio.'" class="form-control" placeholder="xx.xxx.xxx/xxxx-xx"><br>
        <label class="form01">E-mail*</label><input type="email" class="form-control" id="txtemail-'.$idAleatorio.'" placeholder="xx@xx.com" required><br>
        <label class="form01">Porte da Empresa*</label><select  id="txtfuncionarios-'.$idAleatorio.'" name="funcionários" class="txt_azul">
            <option value="até 10">Até 10 Funcionários</option>
            <option value="11 a 20">11 a 20 Funcionários</option>
            <option value="21 a 30">21 a 30 Funcionários</option>
            <option value="31 a 60">31 a 60 Funcionários</option>
            <option value="61 a 250">61 a 250 Funcionários</option>
            <option value="acima de 250">Acima de 250 Funcionários</option>
            <option value="Governo">Orgão Público/Governo</option>
        </select><br>
        <label class="form01">Observações</label><textarea id="txtobservacoes-'.$idAleatorio.'" class=" form-control lg100"></textarea><br>
        <p class="txt-tam-12">*Campos obrigatórios</p>
        <a class="btn btn-default btn-lg btn-block btn-ativaenvio-office" data-id="'.$idAleatorio.'" data-destino="'.get_bloginfo('siteurl').'/'.$atts['destino'].'"  href="#">ENVIAR</a>';
 
 
     return $html;
 
}
add_shortcode( 'formoffice365', 'formoffice365' );





function formofficehb365( $atts ){
    
    $idAleatorio = rand(1,1000);
    
    global $post; 
    
    
 $html= '<input type="hidden" id="txtorigem-'.$idAleatorio.'" value="'.$post->ID.'" />
        <label class="form01">Nome*</label><input type="text" id="txtnome-'.$idAleatorio.'" class="form-control" placeholder="Nome Completo" required><br>
        <label class="form01">Telefone*</label><input type="text" id="txttelefone-'.$idAleatorio.'" class="form-control" placeholder="DDD + número de telefone" required><br>
        <label class="form01">E-mail*</label><input type="email" class="form-control" id="txtemail-'.$idAleatorio.'" placeholder="" required><br>
        <label class="form01">CNPJ*</label><input type="text" id="txtcnpj-'.$idAleatorio.'" class="form-control" placeholder=""><br>
        
       


        <label class="form01">Quantidade*</label><input type="number" class="form-control field-qtd" id="txtquantidade-'.$idAleatorio.'" min="0" max="100" step="1"><br>
        <p class="txt-tam-12">*Campos obrigatórios</p>
           <!--<label class="form01">CEP*</label> <input type="email" class="form-control" id="txtcep-'.$idAleatorio.'" ><br>
           
            <label class="form01">Logradouro*</label> <input type="email" class="form-control" id="txtlogradouro-'.$idAleatorio.'" ><br>
            
            <label class="form01">Número*</label> <input type="email" class="form-control" id="txtnumero-'.$idAleatorio.'" ><br>
            
           <label class="form01">Complemento*</label> <input type="email" class="form-control" id="txtcomplemento-'.$idAleatorio.'" ><br>
           
           <label class="form01">Cidade*</label> <input type="email" class="form-control" id="txtcidade-'.$idAleatorio.'" ><br>
           
           <label class="form01">Estado*</label> <input type="email" class="form-control" id="txtestado-'.$idAleatorio.'" >


        <p class="txt-tam-12">*Campos obrigatórios</p> -->
        
        <label class="form01">Observações</label><textarea id="txtobservacoes-'.$idAleatorio.'" rows="6" class=" form-control lg100"></textarea><br>
        <label class="form01">Subtotal</label><input type="text" readonly class="form-control field-subtotal" value="R$ 0,00" id="txtsubtotal-'.$idAleatorio.'" ><br>
            
        <label class="form01">Frete</label><input type="text" readonly class="form-control field-frete" value="R$ 0,00" id="txtfrete-'.$idAleatorio.'" ><br>

        <label class="form01">Valor Total</label><input type="text" readonly class="form-control field-vltot" value="R$ 0,00" id="txtvalortotal-'.$idAleatorio.'" ><br>
        
        <label class="form01">Boleto em:</label> <select class="form-control field-frmpag"  id="txtpagamento-'.$idAleatorio.'">
        <option>28 dias sem juros</option>
</select><br> 
        <p style="padding-top: 10px; padding-bottom: 10px;"><br> <input type="checkbox" value="Autorizo o faturamento da minha compra pela Agis Distribuidora" class="field-autorizo"  id="txtautorizo-'.$idAleatorio.'"> Autorizo o faturamento da minha compra pela Agis Distribuidora.</p>

        
        <p><strong>Termos e condições:</strong><br/>Os produtos serão entregues no endereço cadastrado no CNPJ. <sup>1</sup>Frete Grátis para todo o Brasil, na compra de 3 ou mais unidades. Sujeito a análise de crédito.  </p>


        <a class="btn btn-default btn-lg btn-block btn-ativaenvio-office-hb" data-id="'.$idAleatorio.'" data-destino="'.get_bloginfo('siteurl').'/'.$atts['destino'].'"  href="#">ENVIAR</a>';
 
 
     return $html;
 
}
add_shortcode( 'formofficehb365', 'formofficehb365' );





function variavel( $atts ){
    
    return get_field($atts['nome'], 11);
 
}
add_shortcode( 'variavel', 'variavel' );





add_action('wp_ajax_nopriv_salva_contato', 'salva_contato');
add_action('wp_ajax_salva_contato', 'salva_contato');
 

function salva_contato() {

    
    global $wpdb;
    if($_POST['email']){

            $rows = $wpdb->insert( 
                'contato_padrao', 
                array( 
                    'nome' => $_POST['nome'], 
                    'telefone' => $_POST['telefone'], 
                    'cnpj' => $_POST['cnpj'], 
                    'email' => $_POST['email'],
                    'observacoes' => $_POST['observacoes'],
                    'origem' => $_POST['origem'],
                    'funcionarios' => $_POST['funcionarios'],
                    
                    'quantidade' => $_POST['quantidade'],
                    'cep' => $_POST['cep'],
                    'logradouro' => $_POST['logradouro'],
                    'numero' => $_POST['numero'],
                    'complemento' => $_POST['complemento'],
                    'cidade' => $_POST['cidade'],
                    'estado' => $_POST['estado'],
                    'valortotal' => $_POST['valortotal'],
                    'frete' => $_POST['frete'],
                    'subtotal' => $_POST['subtotal'],
                    'pagamento' => $_POST['pagamento']
                )
            );
     
        if($wpdb->insert_id){
            
            setcookie( 'contato_'.$_POST['origem'], 1, time()+3600*24*100, COOKIEPATH, COOKIE_DOMAIN, false);
            
            
           function wpse27856_set_content_type(){
                return "text/html";
            }
            add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );
 
            $post = get_post( $_POST['origem']);
            
            $to = 'felipe.almeida@advancedinfo.com.br';
            //$to = 'andre@visiondeveloper.com.br';
            
            
            $subject = 'Contato Advanced Info';
            
            $body ='<body><p>Contato realizado pelo site:</br>'.
            '<br/><b>Nome</b>: '. $_POST['nome'].
            '<br/><b>Telefone</b>: '.  $_POST['telefone'].
            '<br/><b>CNPJ</b>: '.  $_POST['cnpj'].
            '<br/><b>E-mail</b>: '.  $_POST['email'].
            '<br/><b>Observacoes</b>: '.  $_POST['observacoes'].
            '<br/><b>Página de Origem</b>:  <a target="_blank" href="'.get_the_permalink($post).'">'.$post->post_title.'</a>'.
            '<br/><b>Funcionarios</b>: '.  $_POST['funcionarios'].

            '<br/><b>Quantidade</b>: '.  $_POST['quantidade'].
            /*'<br/><b>CEP</b>: '.  $_POST['cep'].
            '<br/><b>Logradouro</b>: '.  $_POST['logradouro'].
            '<br/><b>Número</b>: '.  $_POST['numero'].
            '<br/><b>Complemento</b>: '.  $_POST['complemento'].
            '<br/><b>Cidade</b>: '.  $_POST['cidade'].
            '<br/><b>Estado</b>: '.  $_POST['estado'].*/
            '<br/><b>Subtotal</b>: '.  $_POST['subtotal'].
            '<br/><b>Frete</b>: '.  $_POST['frete'].
            '<br/><b>Valor Total</b>: '.  $_POST['valortotal'].
            '<br/><b>Pagamento</b>: '.  $_POST['pagamento'].
            '<br/><b>Faturamento</b>: '.  $_POST['autorizacao']
                    .'</p></body>'; 
            

            
            $headers[] = array('Content-Type: text/html; charset=UTF-8');
            $headers[] = 'Cc: P2B <maira@p2b.com.br>';
            //$headers[] = 'Cc: iluvwp@wordpress.org';
            
            wp_mail( $to, $subject, $body, $headers  );

            remove_filter( 'wp_mail_content_type','wpse27856_set_content_type' );
            
            $r = array(
                'status' => 'ok',
                'id' => $wpdb->insert_id
            );
        }else{
            $r = array(
                'status' => 'error',
                'teste' => '1'
            );
        }
        echo json_encode( $r );
    }
    exit;
}





add_action('wp_ajax_nopriv_envia_newsletter', 'envia_newsletter');
add_action('wp_ajax_envia_newsletter', 'envia_newsletter');
 

function envia_newsletter() {
        

    if($_POST['email']){
        function wpse27856_set_content_type(){
             return "text/html";
         }
         add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );


         $to = 'felipe.almeida@advancedinfo.com.br';

         $subject = 'Newsletter Advanced Info';

         $body ='<body><p> Cadastro de newsletter na página de ofertas:</br>'.
         '<br/><b>E-mail</b>: '. $_POST['email'].'</p></body>'; 



         $headers[] = array('Content-Type: text/html; charset=UTF-8');
         $headers[] = 'Cc: P2B <maira@p2b.com.br>';
         //$headers[] = 'Cc: iluvwp@wordpress.org';

         wp_mail( $to, $subject, $body, $headers  );

         remove_filter( 'wp_mail_content_type','wpse27856_set_content_type' );
         
         $r = array(
              'status' => 'ok',
          );
         
        }else{
          $r = array(
              'status' => 'error',
          );
      }
    echo json_encode( $r );
    exit;
}



//Adiciona um script para o WordPress
add_action( 'wp_enqueue_scripts', 'secure_enqueue_script' );
function secure_enqueue_script() {
    wp_register_script( 'secure-ajax-access', esc_url( add_query_arg( array( 'js_global' => 1 ), site_url() ) ) );
    wp_enqueue_script( 'secure-ajax-access' );
}
 
//Joga o nonce e a url para as requisições para dentro do Javascript criado acima
add_action( 'template_redirect', 'javascript_variaveis' );
function javascript_variaveis() {
  if ( !isset( $_GET[ 'js_global' ] ) ) return;

  $variaveis_javascript = array(
    'xhr_url' => admin_url('admin-ajax.php') // Forma para pegar a url para as consultas dinamicamente.
  );
 
  $new_array = array();
  foreach( $variaveis_javascript as $var => $value ) $new_array[] = esc_js( $var ) . " : '" . esc_js( $value ) . "'";
 
  header("Content-type: application/x-javascript");
  printf('var %s = {%s};', 'js_global', implode( ',', $new_array ) );
  exit;
}



function prefixo_funcao_menu()
{
   
 
    add_menu_page( 'Contatos', 'Contatos', 10, 'contatos-realizados', 'prefixo_funcao_conteudo');
    add_submenu_page(  'pasta-plugin/treinamentos.php', 'Ver Contatos', 'Ver Contatos', 10, 'contatos-realizados', 'prefixo_funcao_conteudo' );
 
}
function prefixo_funcao_conteudo()
{
    echo '<div class="wrap">';
    require('page-template/contatos-realizados-admin.php');
}
add_action( 'admin_menu', 'prefixo_funcao_menu' );