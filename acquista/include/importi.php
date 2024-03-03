<?php	
	/* Recupero prezzi documenti e tributi catastali collegati */
	/* Planimetria catastale */
	$query_recupero_prezzo_tc_pln = "SELECT imp_price, imp_price_tc FROM tabella_importi WHERE imp_class_id = 'PLN'";
	$record_recupero_prezzo_tc_pln = $query_connection->query($query_recupero_prezzo_tc_pln);
	$campo_recupero_prezzo_tc_pln = $record_recupero_prezzo_tc_pln->fetch_assoc();
	$price_pln = $campo_recupero_prezzo_tc_pln['imp_price'];
	$price_tc_pln = $campo_recupero_prezzo_tc_pln['imp_price_tc'];
		
	/* Visura per immobile ordinaria */
	$query_recupero_prezzo_tc_vio = "SELECT imp_price, imp_price_tc FROM tabella_importi WHERE imp_class_id = 'VIO'";
	$record_recupero_prezzo_tc_vio = $query_connection->query($query_recupero_prezzo_tc_vio);
	$campo_recupero_prezzo_tc_vio = $record_recupero_prezzo_tc_vio->fetch_assoc();
	$price_vio = $campo_recupero_prezzo_tc_vio['imp_price'];
	$price_tc_vio = $campo_recupero_prezzo_tc_vio['imp_price_tc'];
		
	/* Visura per immobile storica */
	$query_recupero_prezzo_tc_vis = "SELECT imp_price, imp_price_tc FROM tabella_importi WHERE imp_class_id = 'VIS'";
	$record_recupero_prezzo_tc_vis = $query_connection->query($query_recupero_prezzo_tc_vis);
	$campo_recupero_prezzo_tc_vis = $record_recupero_prezzo_tc_vis->fetch_assoc();
	$price_vis = $campo_recupero_prezzo_tc_vis['imp_price'];
	$price_tc_vis = $campo_recupero_prezzo_tc_vis['imp_price_tc'];
		
	/* Estratto di mappa */
	$query_recupero_prezzo_tc_map = "SELECT imp_price, imp_price_tc FROM tabella_importi WHERE imp_class_id = 'MAP'";
	$record_recupero_prezzo_tc_map = $query_connection->query($query_recupero_prezzo_tc_map);
	$campo_recupero_prezzo_tc_map = $record_recupero_prezzo_tc_map->fetch_assoc();
	$price_map = $campo_recupero_prezzo_tc_map['imp_price'];
	$price_tc_map = $campo_recupero_prezzo_tc_map['imp_price_tc'];
?>