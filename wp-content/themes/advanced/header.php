<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head><meta name="google-site-verification" content="Km6kvoL87UziXmMWL2GcA6UzRUTPTB1hHdgpyhKskX8" />
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <!--[if lt IE 9]>
        <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>


        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.min.css"/>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/estilo.css"/>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/counter.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">

        
        <script>

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-74954062-7', 'auto');
        ga('send', 'pageview');



      </script>

    </head>

    <body <?php body_class(); ?>>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
' https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TZX9CVQ');</script> 
<!-- End Google Tag Manager --> 
        
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid bg-top">
                <div class="container">
                    <a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo_advanced-top.png" alt="Logo Advanced Info"></a>
                    <div class="pull-right tel">
                        <img src="<?php bloginfo('template_url'); ?>/img/icon_tel.png" alt="Telefone">
                        <span class="txt_branco">Ligue já! </span><span class="txt_laranja txt_tam20"><strong>(11) 2099-9939</strong></span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="container-menu cf">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Advanced Info</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Conheça os nossos produtos!<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li  class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">MICROSOFT</a>
                                        <ul class="dropdown-menu lateral">
                                            <li  class="dropdown-submenu"><a href="<?php echo get_page_link(549); ?>" class="dropdown-toggle" data-toggle="dropdown">Office 365 </a>
                                                <ul class="dropdown-menu lateral-interna">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu01.jpg" alt="Office365"><br><br><p><strong>Obtenha o Office mais seguro para sua empresa</strong><br>
                                                            Atualizações mensais, segurança e acesso 
                                                            em qualquer lugar.</p><a href="<?php echo get_page_link(549); ?>" class="link_azul">Office365 <span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>

                                            </li>
                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(551); ?>" class="dropdown-toggle" data-toggle="dropdown">Office H&B 2016 </a>
                                                <ul class="dropdown-menu lateral-interna dois">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu02.jpg" alt="Office H&B 2016"><br><br><p><strong>Faça tudo com o Office e tenha os melhores resultados.</strong><br>
                                                            Administre a vida e o trabalho com mais eficiência. Ideal para aqueles que querem o Office com Outlook em um PC.</p><a href="<?php echo get_page_link(551); ?>" class="link_azul">Office Home & Business 2016 <span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>

                                            </li>
                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(569); ?>" class="dropdown-toggle" data-toggle="dropdown">Windows 7, 8 e 10 Pro</a>
                                                <ul class="dropdown-menu lateral-interna tres">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu03.jpg" alt="Windows 10"><br><br><p><strong>Escolha o Windows ideal para você!</strong><br>
                                                            A Advanced Info comercializa Windows 7, 8 e 10. 
                                                            Confira como regularizar a sua empresa de maneira segura e econômica.


                                                        </p><a href="<?php echo get_page_link(569); ?>" class="link_azul">Windows 7, 8 e 10 Pro <span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>

                                            </li>
                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(571); ?>" class="dropdown-toggle" data-toggle="dropdown">Windows Server</a>
                                                <ul class="dropdown-menu lateral-interna quatro">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu04.jpg" alt="Windows Server 2016"><br><br><p><strong>Windows Server 2016: Otimize a sua empresa com a nuvem Microsoft</strong><br>
                                                            O Windows Server 2016 permite usufruir os conjuntos de habilidades e os investimentos existentes para otimizar o seu negócio para a nuvem.

                                                        </p><a href="<?php echo get_page_link(571); ?>" class="link_azul">Windows Server  <span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(561); ?>" class="dropdown-toggle" data-toggle="dropdown">SQL Server 2016</a>
                                                <ul class="dropdown-menu lateral-interna cinco">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu05.jpg" alt="SQL Server"><br><br><p><strong>Desempenho inovador e insights mais rápidos na nuvem e no local</strong><br>
                                                            O SQL Server 2016 usa um conjunto comum de ferramentas para implantar e gerenciar bancos de dados no local e na nuvem.

                                                        </p><a href="<?php echo get_page_link(561); ?>" class="link_azul">SQL Server 2016<span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(536); ?>" class="dropdown-toggle" data-toggle="dropdown">Azure</a>
                                                <ul class="dropdown-menu lateral-interna seis">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu06.jpg" alt="Azure"><br><br><p><strong>A nuvem para a empresa moderna</strong><br>
                                                            Reduza já seus custos com gestão de TI com a plataforma na nuvem mais flexível que se integra com seu ambiente local já existente: o Microsoft Azure. 

                                                        </p><a href="<?php echo get_page_link(536); ?>" class="link_azul">Microsoft Azure <span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>
                                            </li>

                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(541); ?>" class="dropdown-toggle" data-toggle="dropdown">Drive Shipping</a>
                                                <ul class="dropdown-menu lateral-interna sete">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu11.jpg" alt="Azure"><br><br><p><strong>Uma solução exclusiva Advanced</strong><br>
                                                            Migre os seus dados locais com muito mais facilidade para a nuvem Microsoft!

                                                        </p><a href="<?php echo get_page_link(541); ?>" class="link_azul">Drive Shipping<span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>
                                            </li>

                                            <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">+ Soluções Microsoft</a>
                                                <ul class="dropdown-menu lateral-interna oito">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu07.jpg" alt="Azure"><br><br><p><strong>Conheça mais Soluções Microsoft na Advanced</strong><br>
                                                            Aproveite todo nosso conhecimento como Parceiro Gold Microsoft para renovar ou legalizar seus softwares, com segurança e rapidez. 

                                                        </p><a href="<?php echo get_page_link(557); ?>" class="link_azul">+ Soluções Microsoft<span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>

                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="<?php echo get_page_link(524); ?>">ADOBE</a> </li>
                                    <li><a href="<?php echo get_page_link(539); ?>">COREL</a> </li>
                                    <li><a href="<?php echo get_page_link(534); ?>">AUTODESK</a> </li>
                                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">SYMANTEC</a>
                                        <ul class="dropdown-menu lateral cinco">
                                            <li  class="dropdown-submenu"><a href="<?php echo get_page_link(565); ?>" class="dropdown-toggle" data-toggle="dropdown">Symantec Endpoint Protection</a>
                                                <ul class="dropdown-menu lateral-interna ">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu08.jpg" alt="Azure"><br><br><p><strong>Symantec Endpoint Protection </strong><br>
                                                            Somente o Symantec Endpoint Protection oferece a segurança de que você precisa com um único agente de alta potência para proporcionar a proteção mais eficaz disponível. Confira!

                                                        </p><a href="<?php echo get_page_link(565); ?>" class="link_azul">Symantec Endpoint Protection<span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu"><a href="<?php echo get_page_link(563); ?>" class="dropdown-toggle" data-toggle="dropdown">BACKUP EXEC</a>
                                                <ul class="dropdown-menu lateral-interna dois">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu09.jpg" alt="Azure"><br><br><p><strong>O Melhor Backup</strong><br>
                                                            Confira o Software de backup e recuperação robusto, flexível e fácil de usar, criado para ambientes físicos e virtuais.

                                                        </p><a href="<?php echo get_page_link(563); ?>" class="link_azul">Symantec Backup Exec<span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li ><a href="<?php echo get_page_link(567); ?>">VMWARE</a></li>
                                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">HP</a>
                                        <ul class="dropdown-menu lateral sete">
                                            <li  class="dropdown-submenu"><a href="<?php echo get_page_link(543); ?>" class="dropdown-toggle" data-toggle="dropdown">#HPEINFRA3 </a>
                                                <ul class="dropdown-menu lateral-interna ">
                                                    <li><img src="<?php bloginfo('template_url'); ?>/img/img_menu10.jpg" alt="Azure"><br><br><p><strong>Acelere seus negócios com uma super oferta de Servidores! </strong><br>
                                                            #HPEINFRA3 é a solução completa de TI, flexível e pensada pela Hewlett Packard Enterprise para sua empresa.

                                                        </p><a href="<?php echo get_page_link(543); ?>" class="link_azul">Conheça a Solução<span style="font-size:20px;">&raquo;</span></a></li>
                                                </ul>

                                            </li>


                                        </ul>
                                    </li>
                                    <li ><a href="<?php echo get_page_link(545); ?>" >LENOVO</a></li>
                                    <li ><a href="<?php echo get_page_link(529); ?>" >APC</a></li>
                                    <li ><a href="http://www.linkfibra.com.br" target="_blank">TELECOM</a></li>
                                    <li class="dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">LICENCIAMENTOS</a>
                                        <ul class="dropdown-menu lateral dez">
                                            <li><a href="<?php echo get_page_link(547); ?>">Microsoft</a></li>
                                            <li><a href="<?php echo get_page_link(524); ?>">Adobe</a></li>
                                            <li><a href="<?php echo get_page_link(539); ?>">Corel</a></li> 
                                            <li><a href="<?php echo get_page_link(534); ?>">Autodesk</a></li>
                                            <li><a href="<?php echo get_page_link(565); ?>">Symantec</a></li>
                                            <li><a href="<?php echo get_page_link(567); ?>">VMware</a></li>
                                        </ul>
                                    </li>
                                    <li ><a target="_blank" href="http://www.advancedinfo.com.br/wp-content/uploads/2016/12/Portfolio_advanced.pdf" >PORTFÓLIO</a></li>
                                        
                                        
                                </ul>

                            </li>
                            <li><a href="<?php echo get_page_link(555); ?>">Serviços</a></li>
                            <li><a href="<?php echo get_page_link(553); ?>">Quem somos</a></li>
                            <li><a href="<?php echo get_page_link(579); ?>">Ofertas</a></li>
                            <li><a href="<?php echo get_page_link(681); ?>">Solicitar Orçamento</a></li>
                            <li><a href="<?php echo get_page_link(559); ?>">Soluções Financeiras</a></li>
                            <li><a href="<?php echo get_page_link(686); ?>">Contato</a></li>
                            <li><a href="<?php echo get_page_link(657); ?>">Blog</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
            <?php the_field('header_adicional'); ?>
        </nav>