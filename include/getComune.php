<?php
  require('./../db/conn.php');

  /* Elenco comuni */
  $pro_id = $_POST['pro_id'];
  $query_stampa_comuni = "SELECT * FROM tabella_comuni WHERE pro_ref = '$pro_id' AND com_stat = '1' ORDER BY com_name ASC";
  $record_stampa_comuni = $query_connection->query($query_stampa_comuni);

  while ($campo_stampa_comuni = $record_stampa_comuni->fetch_assoc()) {
    $dropdown_stampa_comuni = "<option value=".$campo_stampa_comuni['com_id'].">".$campo_stampa_comuni['com_name']."</option>";
    echo $dropdown_stampa_comuni;
  }
?>
