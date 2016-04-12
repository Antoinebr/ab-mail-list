<h1> Exportez les emails </h1>

<a href="<?php bloginfo('url');?>/wp-admin/admin-ajax.php?action=export_email"> Cliquez ici pour exporter les emails</a>

<br /> <br />


<?php $complete_url = wp_nonce_url( get_bloginfo('url').'/wp-admin/admin-ajax.php?action=delete_all','delete_all_email'); ?>

<a href="<?php echo $complete_url; ?>"> Cliquez ici pour supprimer les enregistrements</a>
