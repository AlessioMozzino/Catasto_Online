<?php
  require('./../db/conn.php');

  /* Elenco sezioni urbane */
  $com_id = $_POST['com_id'];
  $query_stampa_su = "SELECT su_id, su_name FROM tabella_su WHERE com_ref = '$com_id'";
  $record_stampa_su = $query_connection->query($query_stampa_su);

  while ($campo_stampa_su = $record_stampa_su->fetch_assoc()) {
    $dropdown_stampa_su = "<option value=".$campo_stampa_su['su_id'].">".$campo_stampa_su['su_name']."</option>";
    echo $dropdown_stampa_su;
  }
?>
