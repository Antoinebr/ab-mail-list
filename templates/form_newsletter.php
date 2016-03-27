<?php

// Filter form class
$form_class = 'newsletter-form';
$form_class = apply_filters('abml_form_class',$form_class);

// Filter form btn class
$form_btn_class = 'button';
$form_btn_class = apply_filters('abml_form_btn_class',$form_btn_class);


echo "<form action='#' role='form' class='$form_class' novalidate='novalidate'>

<input name='email' type='text' placeholder='Entrez votre email'>

<button id='newsletter-form-btn' class='$form_btn_class'> S'inscrire </button>

</form>";
