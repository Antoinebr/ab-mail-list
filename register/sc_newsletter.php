<?php

function abml_newsletter() {
  include_once(ABML.'templates/form_newsletter.php');
}

add_shortcode('ab-newsletter', 'abml_newsletter');
