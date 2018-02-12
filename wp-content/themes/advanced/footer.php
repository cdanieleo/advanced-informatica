
<footer>
    <div class="container-fluid bg-azul">
        <div class="container pd-bottom60">
            <div class="col-md-4 pd-top60 pull-left">
                <p class="txt_branco">INFORMAÇÕES</p>
                <ul class="txt_branco">

                    <li><a href="<?php echo get_page_link(555); ?>" class="link_branco">Serviços</a></li>
                    <li><a href="<?php echo get_page_link(553); ?>" class="link_branco">Quem somos</a></li>
                    <li> <a href="<?php echo get_page_link(579); ?>" class="link_branco">Ofertas</a></li>
                    <li><a href="<?php echo get_page_link(681); ?>" class="link_branco">Solicitar Orçamento</a></li>
                    <li><a href="<?php echo get_page_link(559); ?>" class="link_branco">Soluções Financeiras</a></li>
                    <li><a href="<?php echo get_page_link(686); ?>" class="link_branco">Contato</a></li>
                    <li> <a href="<?php echo get_page_link(657); ?>" class="link_branco">Blog</a></li>
                </ul>
            </div>
            <div class="col-md-4 pd-top60 pull-left">
                <p class="txt_branco">PRODUTOS EM DESTAQUE</p>
                <ul class="txt_branco">
                    <li> <a href="<?php echo get_page_link(549); ?>" class="link_branco"> Office365</a></li>
                    <li> <a href="<?php echo get_page_link(569); ?>" class="link_branco"> Windows 10 Pro</a></li>
                    <li> <a href="<?php echo get_page_link(543); ?>" target="_blank" class="link_branco"> HPINFRA3</a></li>
                </ul>
            </div>
            <div class="col-md-4 pd-top60 pull-left">
                <p class="txt_branco">FORMAS DE PAGAMENTO</p>
                <ul class="txt_branco">
                    <li> CDC</li>
                    <li> BNDES</li>
                    <li> Leasing</li>
                    <li> Locação</li>
                    <li> Boleto sem juros</li>
                    <li> Microsoft financiamento</li>

                </ul>
            </div>
        </div>
    </div>
    <div class="container pd-bottom60 mg-top50">
        <div class="col-md-4">
            <img src="<?php bloginfo('template_url'); ?>/img/logo_pirata.jpg" alt="Logo Contra Pirataria">
        </div>
        <div class="col-md-2"> <a href="https://www.linkedin.com/company/advanced-informatica-ltda.?trk=top_nav_home" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/rede_linkedin.jpg" alt="Rede Social Linkedin"></a>
            <a href="https://www.facebook.com/advancedinfo/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/rede_facebook.jpg" alt="Rede Social Facebook"></a>
        </div>
        <div class="col-md-6">
            <p class="txt_azul txt-tam-12"><strong>Mais informações: Advanced Informática – Consultoria de TI</strong><br>
                Rua Dr. Olavo Egídio 921 - Santana, São Paulo <br>
                Telefone: (11) 2099-9939 | CNPJ: 58.456.534/0001-07</p>
        </div>
    </div>

    <div class="container-fluid bg-azul-claro">
        <img src="<?php bloginfo('template_url'); ?>/img/logo_advanced-footer.jpg" alt="Logo Advanced Info" class="center-block">
    </div>

</footer>


<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.12.4.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>


<script>
    (function ($) {
        $(document).ready(function () {

            $('ul.dropdown-menu [data-toggle=dropdown] ').on('mouseover', function (event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });

            $('ul.dropdown-menu [data-toggle=dropdown] ').on('click', function (event) {
                document.location.href = $(this).attr('href');
            });
        });
    })(jQuery);
</script>
<script src="<?php bloginfo('template_url'); ?>/js/smooth-scroll.min.js"></script>
<script>
smoothScroll.init();
</script>

<script src="<?php bloginfo('template_url'); ?>/js/counter.js"></script>

<script>
               $(document).ready(function () {
// hide #back-top first

                    $('.field-qtd').on('input keyup',function(e){ $(this).val($(this).val().replace( /[^\d]/g ,'')); });
                    $('.field-qtd').on('input keyup change',function(){
                        
                        $(".field-subtotal").val($('.field-qtd').val() * <?php the_field('valor_do_produto',11); ?>);
                        
                        if($('.field-qtd').val() >= 3){
                            $(".field-frete").val("GRÁTIS");
                            $(".field-vltot").val($('.field-qtd').val() * <?php the_field('valor_do_produto',11); ?>);
                            
                            $(".field-frmpag").html("<option>28 dias sem juros</option><option>4X sem juros (10/30/60/90)</option>");
                            
                            
                        }else{
                            $(".field-frete").val("R$ 42,00");
                            var valor = ($('.field-qtd').val() * <?php the_field('valor_do_produto',11); ?>) + 42;
                            $(".field-vltot").val(valor);
                            $(".field-frmpag").html("<option>28 dias sem juros</option>");
                            
                        }
                        $(".field-subtotal").val("R$ "+$(".field-subtotal").val()+",00");
                        $(".field-vltot").val("R$ "+$(".field-vltot").val()+",00");
                        
                    });
                    $(".verifica-contato").on("click", function(e){
                       <?php global $post;  ?>
                       var contato = "<?php echo $_COOKIE['contato_'.$post->ID]; ?>";
                       if(contato != '1'){
                           e.preventDefault();
                           alert('Para fazer download você deve preencher o formulário de contato.');
                       }
                       
                    });

                   $("#back-top").hide();

                   // fade in #back-top
                   $(function () {
                       $(window).scroll(function () {
                           if ($(this).scrollTop() > 500) {
                               $('#back-top').fadeIn();
                           } else {
                               $('#back-top').fadeOut();
                           }
                       });

                       // scroll body to 0px on click
                       $('#back-top a').click(function () {
                           $('body,html').animate({
                               scrollTop: 0
                           }, 800);
                           return false;
                       });
                   });



                   $(".btn-ativaenvio").on("click", function (e) {
                       e.preventDefault();
                       var id = $(this).data("id");
                       
                       if($("#txtnome-"+id).val()){
                           if($("#txttelefone-"+id).val()){
                               if($("#txtemail-"+id).val()){
                      
                      console.log(js_global.xhr_url);
                          $(".btn-ativaenvio").val('Aguarde...');
                          $(".btn-ativaenvio").html('Aguarde...');
                          var destino = $(this).data("destino");
                           $.ajax({
                               url: js_global.xhr_url,
                               type: 'POST',
                               data: {
                                   'action': 'salva_contato',
                                   'nome': $("#txtnome-"+id).val(),
                                   'telefone': $("#txttelefone-"+id).val(),
                                   'cnpj': $("#txtcnpj-"+id).val(),
                                   'email': $("#txtemail-"+id).val(),
                                   'observacoes': $("#txtobservacoes-"+id).val(),
                                   'origem': $("#txtorigem-"+id).val()
                               },
                               dataType: 'JSON',
                               //dataType:'text',
                               success: function (response) {
                                   console.log(response);
                                   if (response.status == 'ok') {
                                       document.location.href = destino;
                                   } else {
                                       alert('Contato não pode ser realizado, tente novamente mais tarde ou por outros meios de comunicação.');
                                   }
                               },
                               error: function (response) {
                                   console.log('erro');
                                   console.log(response);
                                   $(".btn-ativaenvio").val('Enviar');
                                   $(".btn-ativaenvio").html('Enviar');

                               }
                           });
                           
                               }else{
                                   alert('Favor preencher o campo e-mail');
                               }
                           }else{
                                alert('Favor preencher o campo telefone');
                            }
                        }else{
                            alert('Favor preencher o campo nome');
                        }
                      
                   });
                   
                   
                   
                   
                   
                   
                   $(".btn-ativaenviobanner").on("click", function (e) {
                       e.preventDefault();
                       var id = $(this).data("id");
                       
                       if($("#txtnomebanner-"+id).val()){
                           if($("#txttelefonebanner-"+id).val()){
                               if($("#txtemailbanner-"+id).val()){
                                   if($("#txtobservacoesbanner-"+id).val()){
                                   
                      
                      console.log(js_global.xhr_url);
                          $(".btn-ativaenviobanner").val('Aguarde...');
                          $(".btn-ativaenviobanner").html('Aguarde...');
                          var destino = $(this).data("destino");
                           $.ajax({
                               url: js_global.xhr_url,
                               type: 'POST',
                               data: {
                                   'action': 'salva_contato',
                                   'nome': $("#txtnomebanner-"+id).val(),
                                   'telefone': $("#txttelefonebanner-"+id).val(),
                                   'email': $("#txtemailbanner-"+id).val(),
                                   'observacoes': $("#txtobservacoesbanner-"+id).val(),
                                   'origem': $("#txtorigembanner-"+id).val()
                               },
                               dataType: 'JSON',
                               //dataType:'text',
                               success: function (response) {
                                   console.log(response);
                                   if (response.status == 'ok') {
                                       document.location.href = destino;
                                   } else {
                                       alert('Contato não pode ser realizado, tente novamente mais tarde ou por outros meios de comunicação.');
                                   }
                               },
                               error: function (response) {
                                   console.log('erro');
                                   console.log(response);
                                   $(".btn-ativaenviobanner").val('Enviar');
                                   $(".btn-ativaenviobanner").html('Enviar');

                               }
                           });
                                    }else{
                                        alert('Favor preencher o campo observações');
                                    }
                               }else{
                                   alert('Favor preencher o campo e-mail');
                               }
                           }else{
                                alert('Favor preencher o campo telefone');
                            }
                        }else{
                            alert('Favor preencher o campo nome');
                        }
                      
                   });
                   
                   
                   
                   
                   
                   
                   
                   
                   $(".btn-ativaenvio-office").on("click", function (e) {
                       e.preventDefault();
                       var id = $(this).data("id");
                       
                       if($("#txtnome-"+id).val()){
                           if($("#txttelefone-"+id).val()){
                               if($("#txtemail-"+id).val()){
                                   if($("#txtfuncionarios-"+id).val()){
                      
                          $(".btn-ativaenvio-office").val('Aguarde...');
                                   $(".btn-ativaenvio-office").html('Aguarde...');
                          var destino = $(this).data("destino");
                           $.ajax({
                               url: js_global.xhr_url,
                               type: 'POST',
                               data: {
                                   'action': 'salva_contato',
                                   'nome': $("#txtnome-"+id).val(),
                                   'telefone': $("#txttelefone-"+id).val(),
                                   'cnpj': $("#txtcnpj-"+id).val(),
                                   'email': $("#txtemail-"+id).val(),
                                   'observacoes': $("#txtobservacoes-"+id).val(),
                                   'funcionarios': $("#txtfuncionarios-"+id).val(),
                                   'origem': $("#txtorigem-"+id).val()
                               },
                               dataType: 'JSON',
                               //dataType:'text',
                               success: function (response) {
                                   if (response.status == 'ok') {
                                       document.location.href = destino;
                                   } else {
                                       alert('Contato não pode ser realziado, tente novamente mais tarde ou por outros meios de comunicação.');
                                   }
                               },
                               error: function (response) {
                                   console.log('erro');
                                   console.log(response);
                                   $(".btn-ativaenvio-office").val('Enviar');
                                   $(".btn-ativaenvio-office").html('Enviar');

                               }
                           });
                                    }else{
                                   alert('Favor preencher o campo Porta da empresa');
                               }
                               }else{
                                   alert('Favor preencher o campo e-mail');
                               }
                           }else{
                                alert('Favor preencher o campo telefone');
                            }
                        }else{
                            alert('Favor preencher o campo nome');
                        }
                      
                   });
                   
                   
                   
                   
                   $(".btn-ativaenvio-office-hb").on("click", function (e) {
                       e.preventDefault();
                       var id = $(this).data("id");
                       
                       if($("#txtnome-"+id).val()){
                           if($("#txttelefone-"+id).val()){
                               if($("#txtemail-"+id).val()){
                                   if($("#txtcnpj-"+id).val()){
                                   if($("#txtautorizo-"+id).is(':checked')){
                          $(".btn-ativaenvio-office-hb").val('Aguarde...');
                                   $(".btn-ativaenvio-office-hb").html('Aguarde...');
                          var destino = $(this).data("destino");
                           $.ajax({
                               url: js_global.xhr_url,
                               type: 'POST',
                               data: {
                                   'action': 'salva_contato',
                                   'nome': $("#txtnome-"+id).val(),
                                   'telefone': $("#txttelefone-"+id).val(),
                                   'cnpj': $("#txtcnpj-"+id).val(),
                                   'email': $("#txtemail-"+id).val(),
                                   'observacoes': $("#txtobservacoes-"+id).val(),
                                   'quantidade': $("#txtquantidade-"+id).val(),
                                   /*'cep': $("#txtcep-"+id).val(),
                                   'logradouro': $("#txtlogradouro-"+id).val(),
                                   'numero': $("#txtnumero-"+id).val(),
                                   'complemento': $("#txtcomplemento-"+id).val(),
                                   'cidade': $("#txtcidade-"+id).val(),
                                   'estado': $("#txtestado-"+id).val(),*/
                                   'valortotal': $("#txtvalortotal-"+id).val(),
                                   'subtotal': $("#txtsubtotal-"+id).val(),
                                   'frete': $("#txtfrete-"+id).val(),
                                   'pagamento': $("#txtpagamento-"+id).val(),
                                   'autorizacao': $("#txtautorizo-"+id).val(),
                                   
                                   'origem': $("#txtorigem-"+id).val()
                               },
                               dataType: 'JSON',
                               //dataType:'text',
                               success: function (response) {
                                   if (response.status == 'ok') {
                                       document.location.href = destino;
                                   } else {
                                       alert('Contato não pode ser realziado, tente novamente mais tarde ou por outros meios de comunicação.');
                                   }
                               },
                               error: function (response) {
                                   console.log('erro');
                                   console.log(response);
                                   $(".btn-ativaenvio-office-hb").val('Enviar');
                                   $(".btn-ativaenvio-office-hb").html('Enviar');

                               }
                           });
                                        }else{
                                            alert('Autorização de faturamento obrigatória');
                                        }
                                    }else{
                                        alert('Favor preencher o campo CNPJ');
                                    }
                               }else{
                                   alert('Favor preencher o campo e-mail');
                               }
                           }else{
                                alert('Favor preencher o campo telefone');
                            }
                        }else{
                            alert('Favor preencher o campo nome');
                        }
                      
                   });
                   
                   
                   
                   
                    $("#enviaNewsletter").on("click", function (e) {
                       e.preventDefault();
                       if($("#emailNewsletter").val()){
                      
                           $.ajax({
                               url: js_global.xhr_url,
                               type: 'POST',
                               data: {
                                   'action': 'envia_newsletter',
                                   'email': $("#emailNewsletter").val(),
                               },
                               dataType: 'JSON',
                               //dataType:'text',
                               success: function (response) {
                                   if (response.status == 'ok') {
                                       alert('E-mail salvo com sucesso!');
                                   } else {
                                       alert('Contato não pode ser realizado, tente novamente mais tarde ou por outros meios de comunicação.');
                                   }
                               },
                               error: function (response) {
                                   console.log('erro');
                                   console.log(response); 

                               }
                           });
                        }else{
                            alert('Favor preencher o campo e-mail');
                        }
                      
                   });

               });

</script>

<?php wp_footer(); ?>


</body>
</html>
