<?php

// *******************
// block direct access
// *******************
ecp_check_access();

?>

<div class="uk-accordion" data-uk-accordion>
    <h3 class="uk-accordion-title"><?php echo _e( 'Where do I get the Shortcode from?', 'easy-code-placement' ); ?></h3>
    <div class="uk-accordion-content"><?php echo _e( 'You only need to Click on the "Copy" Button in the Row with your Shortcode you need. When you click on the Button the Shortcode is copied to your Clipoard. Now you only need to Press "Strg + V" on your Keyboard or Right-Click on your Mouse and click on "Insert" at the place you want to have the Shortcode.', 'easy-code-placement' ); ?></div>
    <h3 class="uk-accordion-title"><?php echo _e( 'The "Copy" Button don´t work or I want to write the Code manually!', 'easy-code-placement' ); ?></h3>
    <div class="uk-accordion-content"><?php echo _e( 'Just type [ecp code="%PLACEHOLDER%"] at the place you want to have the Shortcode. Replace %PLACEHOLDER% with the Name of your Shortcode.', 'easy-code-placement' ); ?></div>
    <h3 class="uk-accordion-title"><?php echo _e( 'Where can I place the Shortcode?', 'easy-code-placement' ); ?></h3>
    <div class="uk-accordion-content"><?php echo _e( 'At the moment you can place the Shortcode at the following Areas: Widget Title and Content, Title of Posts and Pages (only Text and without alignement), Content of Posts and Pages, Menu (in the Link-Text and the URL must be "#" if you dont want to link it somewhere), Tags and Excerpts.', 'easy-code-placement' ); ?></div>
    <h3 class="uk-accordion-title"><?php echo _e( 'The Output doesn´t look right or it has a colored Background!', 'easy-code-placement' ); ?></h3>
    <div class="uk-accordion-content"><?php echo _e( 'Be sure to use the "Copy" Button to get your Shortcode or write in manually. Otherwise it can happen that you Copy HTML Code that´s around the Shortcode. You couldn´t see see it but you can Copy it!', 'easy-code-placement' ); ?></div>
</div>