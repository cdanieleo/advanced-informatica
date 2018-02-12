<div class="clear"></div>
<footer id="footer">
    
  
    <div class="newsletter"><?php echo do_shortcode('[contact-form-7 id="238" title="Formulário Newsletter"]'); ?></div>
    
    
    <nav id="footer-nav">
        <?php
        wp_nav_menu(array(
            'menu' => 'Footer',
            'theme_location' => 'footer',
            'container' => 'ul',
            'container_class' => '',
            'container_id' => '',
            'menu_class' => '',
            'echo' => true,
            'menu_id' => '',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 0,
            'walker' => '',
        ));
        ?>
        </nav>
    
    
    <p class="copy">R. Aimorés, 22 - bom retiro, São Paulo - SP, CEP 01122-010 - TEL:(11) 3362-2658 - <a href="mailto:contato@karmani.com.br">contato@karmani.com.br</a></p>
    
    <ul class="social">
        <li><a href="#" target="_blank" class="karmani"></a></li>
        <li><a href="https://instagram.com/karmanioficial" target="_blank" class="instagram"></a></li>
        <li><a href="#" target="_blank" class="youtube"></a></li>
        <li><a href="https://www.facebook.com/karmanioficial" target="_blank" class="facebook"></a></li>
        
    </ul>
    <div class="clear"></div>
</footer>


<?php wp_footer(); ?>
<script src="<?php echo bloginfo('template_url'); ?>/js/lightbox.js"></script>
</body>
</html>
