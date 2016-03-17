<?php
$adresses = new AbListEmail();
$emails = $adresses->get_all_email();

if (!empty($emails)) {


  $data = array(
    0 => array('Id', 'Email','Date')
  );

  foreach ($emails as $email)
  {

    $data[] = array($email->id, $email->email, $email->date);

  }

  #  print_r($data);

  $xls = new Excel_XML;
  $xls->addWorksheet('Emails', $data); // nom de l'onglet
  $xls->sendWorkbook('emails.xml');

}
?>
