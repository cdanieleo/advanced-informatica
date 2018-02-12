 

 
<?php
       wp_list_comments( array(
                'short_ping'  => true,
                'avatar_size' => 56,
        ) );
?>
 
                <form id="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

    <div class="bg-cinza pd-20 mg-top50 text-left">
    <h2 class="txt_laranja">Deixe um comentário</h2>
    <div class="col-md-6 mg-top20">
        <input id="author" name="author" placeholder="Nome*:" class="input-sm lg100" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" />
        
    </div>
    <div class="col-md-6 mg-top20">
        <input id="email" name="email" class="input-sm lg100" placeholder="E-mail*" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" />
    </div>

    <div class="col-md-12 mg-top20">
    	<p class="txt-tam-12">Escreva sua Mensagem:</p>
        <textarea id="comment" class="lg100" placeholder="Mensagem*:" name="comment" cols="45" rows="6" tabindex="6"></textarea>
    </div>
            <?php do_action('comment_form', $post->ID); ?>

     <div class="col-md-12 mg-top20 text-right">
         <input id="submit" name="submit" class="tn btn-yellow btn-lg btn-block" type="submit" value="<?php _e('Enviar', 'seu-template') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
         
                             <?php comment_id_fields(); ?>  

    </div>
     <div class="cf"></div>
    </div>
                </form>




<style>
    
.reply { 
    display: none;
}

.comment{
    display: block;
    width:100%;
    margin-top:2vw;
    margin-bottom:2vw;
    text-align: left;
    list-style: none;   
}
.avatar{
    display: none;
}

    </style>