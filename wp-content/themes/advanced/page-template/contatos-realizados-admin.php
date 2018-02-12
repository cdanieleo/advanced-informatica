

<h1>Contatos realizados pelo site</h1>
<div style="display: block; margin-top:5vw;">
<div style="float:left; width :96%; margin-right:4%;">
    <h2>Lista de contatos</h2>
<table class="wp-list-table widefat fixed striped posts">
    <thead>
    <tr>
         <td>Nome</td>
        <td>Telefone</td>
        <td>CNPJ</td>
        <td>E-mail</td>
        <td>Observações</td>
        
        <td>Nº Func.</td>
        <td>Quantidade</td>
        <td>Endereço</td>
        <td>Subtotal</td>
        <td>Frete</td>
        <td>Valor Total</td>
        <td>Pagamento</td>
        
        
        <td>Data Hora</td>
        <td>Origem</td>
    </tr>
    </thead>
   
<?php
global $wpdb;
$fivesdrafts = $wpdb->get_results( 
	"SELECT *, DATE_FORMAT(datahora, '%d/%m/%Y %T') as data FROM contato_padrao order by id desc"
); 


	echo "Lista de resultados";
	foreach ( $fivesdrafts as $r ) 
	{ 
            
            $post = get_post( $r->origem);
		
		?>
    <tr>
        
        <td><?php echo $r->nome ?></td>
        <td><?php echo $r->telefone ?></td>
        <td><?php echo $r->cnpj ?></td>
        <td><?php echo $r->email ?></td>
        <td><?php echo $r->observacoes ?></td>
        
        <td><?php echo $r->funcionarios ?></td>
        <td><?php echo $r->quantidade ?></td>
        
        <td><?php if($r->logradouro){ echo $r->logradouro ?>, <?php echo $r->numero ?> <?php echo $r->complemento ?>, <?php echo $r->cidade ?>/<?php echo $r->estado; } ?></td>
        
        <td><?php echo $r->subtotal ?></td>
        <td><?php echo $r->frete ?></td>
        <td><?php echo $r->valortotal ?></td>
        <td><?php echo $r->pagamento ?></td>
        
        <td><?php echo $r->data ?></td>
        <td><a target="_blank" href="<?php the_permalink($post) ?>"><?php echo $post->post_title; ?></a></td>
        
    </tr>
		<?php
	} 


?>

</table>
</div>
    </div>

