<?php
    /* Inclusione collegamento al database */
    require('./../../db/conn.php');
	/* Inclusione file prezzi */
	include('./../include/importi.php');
    /* Ordinazione visure ordinarie */
    if(isset($_POST['ordina-m-tre-dc-visure-ordinarie'])) {
		/* Definizione anno in corso per creazione cartella ordine */
		$anno_in_corso = date('Y');
		
		/* Recupero email cliente */
		$email_cliente = addslashes($_POST['email-cliente']);
	  
		/* Tipologia cliente PERSONAL */
		$cli_tip_pb = "P";
			
		/* Data di acquisizione del cliente */
		$timezone = +1;
		$cli_data_acq = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));

		/* Recupero riferimenti geografici */
		/* Provincia ID immobile 1 */
		$riferimenti_geografici_pro_id_immobile_1 = $_POST['rif-geografici-provincia-immobile-1'];

		/* Recupero nome provincia da ID */
		$query_recupero_nome_provincia_immobile_1 = "SELECT pro_name FROM tabella_province WHERE pro_id = '$riferimenti_geografici_pro_id_immobile_1'";
		$record_recupero_nome_provincia_immobile_1 = $query_connection->query($query_recupero_nome_provincia_immobile_1);
		$campo_recupero_nome_provincia_immobile_1 = $record_recupero_nome_provincia_immobile_1->fetch_assoc();
		$riferimenti_geografici_ord_pro_db_immobile_1 = addslashes($campo_recupero_nome_provincia_immobile_1['pro_name']);

		/* Comune ID immobile 1 */
		$riferimenti_geografici_com_id_immobile_1 = $_POST['rif-geografici-comune-immobile-1'];

		/* Recupero nome comune da ID */
		$query_recupero_nome_comune_immobile_1 = "SELECT com_name FROM tabella_comuni WHERE com_id = '$riferimenti_geografici_com_id_immobile_1'";
		$record_recupero_nome_comune_immobile_1 = $query_connection->query($query_recupero_nome_comune_immobile_1);
		$campo_recupero_nome_comune_immobile_1 = $record_recupero_nome_comune_immobile_1->fetch_assoc();
		$riferimenti_geografici_ord_com_db_immobile_1 = addslashes($campo_recupero_nome_comune_immobile_1['com_name']);

		/* Provincia ID immobile 2 */
		$riferimenti_geografici_pro_id_immobile_2 = $_POST['rif-geografici-provincia-immobile-2'];

		/* Recupero nome provincia da ID */
		$query_recupero_nome_provincia_immobile_2 = "SELECT pro_name FROM tabella_province WHERE pro_id = '$riferimenti_geografici_pro_id_immobile_2'";
		$record_recupero_nome_provincia_immobile_2 = $query_connection->query($query_recupero_nome_provincia_immobile_2);
		$campo_recupero_nome_provincia_immobile_2 = $record_recupero_nome_provincia_immobile_2->fetch_assoc();
		$riferimenti_geografici_ord_pro_db_immobile_2 = addslashes($campo_recupero_nome_provincia_immobile_2['pro_name']);

		/* Comune ID immobile 2 */
		$riferimenti_geografici_com_id_immobile_2 = $_POST['rif-geografici-comune-immobile-2'];

		/* Recupero nome comune da ID */
		$query_recupero_nome_comune_immobile_2 = "SELECT com_name FROM tabella_comuni WHERE com_id = '$riferimenti_geografici_com_id_immobile_2'";
		$record_recupero_nome_comune_immobile_2 = $query_connection->query($query_recupero_nome_comune_immobile_2);
		$campo_recupero_nome_comune_immobile_2 = $record_recupero_nome_comune_immobile_2->fetch_assoc();
		$riferimenti_geografici_ord_com_db_immobile_2 = addslashes($campo_recupero_nome_comune_immobile_2['com_name']);
		
		/* Provincia ID immobile 3 */
		$riferimenti_geografici_pro_id_immobile_3 = $_POST['rif-geografici-provincia-immobile-3'];

		/* Recupero nome provincia da ID */
		$query_recupero_nome_provincia_immobile_3 = "SELECT pro_name FROM tabella_province WHERE pro_id = '$riferimenti_geografici_pro_id_immobile_3'";
		$record_recupero_nome_provincia_immobile_3 = $query_connection->query($query_recupero_nome_provincia_immobile_3);
		$campo_recupero_nome_provincia_immobile_3 = $record_recupero_nome_provincia_immobile_3->fetch_assoc();
		$riferimenti_geografici_ord_pro_db_immobile_3 = addslashes($campo_recupero_nome_provincia_immobile_3['pro_name']);

		/* Comune ID immobile 3 */
		$riferimenti_geografici_com_id_immobile_3 = $_POST['rif-geografici-comune-immobile-3'];

		/* Recupero nome comune da ID */
		$query_recupero_nome_comune_immobile_3 = "SELECT com_name FROM tabella_comuni WHERE com_id = '$riferimenti_geografici_com_id_immobile_3'";
		$record_recupero_nome_comune_immobile_3 = $query_connection->query($query_recupero_nome_comune_immobile_3);
		$campo_recupero_nome_comune_immobile_3 = $record_recupero_nome_comune_immobile_3->fetch_assoc();
		$riferimenti_geografici_ord_com_db_immobile_3 = addslashes($campo_recupero_nome_comune_immobile_3['com_name']);
		
		$riferimenti_geografici_provincia_immobili_1_2_3 = $riferimenti_geografici_ord_pro_db_immobile_1 . ' / ' . $riferimenti_geografici_ord_pro_db_immobile_2 . ' / ' . $riferimenti_geografici_ord_pro_db_immobile_3;
		$riferimenti_geografici_comune_immobili_1_2_3 = $riferimenti_geografici_ord_com_db_immobile_1 . ' / ' . $riferimenti_geografici_ord_com_db_immobile_2 . ' / ' . $riferimenti_geografici_ord_com_db_immobile_3;
		
		/* Recupero riferimenti catastali */
		/* Sezione urbana ID immobile 1 */
		$riferimenti_catastali_su_id_immobile_1 = $_POST['rif-catastali-su-immobile-1'];

		/* Recupero nome sezione urbana da ID */
		$query_recupero_nome_su_immobile_1 = "SELECT su_name FROM tabella_su WHERE su_id = '$riferimenti_catastali_su_id_immobile_1'";
		$record_recupero_nome_su_immobile_1 = $query_connection->query($query_recupero_nome_su_immobile_1);
		$campo_recupero_nome_su_immobile_1 = $record_recupero_nome_su_immobile_1->fetch_assoc();
		$riferimenti_catastali_ord_su_db_immobile_1 = addslashes($campo_recupero_nome_su_immobile_1['su_name']);

		$riferimenti_catastali_fgl_immobile_1 = addslashes($_POST['rif-catastali-foglio-immobile-1']);
		$riferimenti_catastali_par_immobile_1 = addslashes($_POST['rif-catastali-particella-immobile-1']);
		$riferimenti_catastali_sub_immobile_1 = addslashes($_POST['rif-catastali-subalterno-immobile-1']);
		
		if(!$riferimenti_catastali_sub_immobile_1) {
			$riferimenti_catastali_sub_immobile_1 = '0';
		}
		
		/* Sezione urbana ID immobile 2 */
		$riferimenti_catastali_su_id_immobile_2 = $_POST['rif-catastali-su-immobile-2'];

		/* Recupero nome sezione urbana da ID */
		$query_recupero_nome_su_immobile_2 = "SELECT su_name FROM tabella_su WHERE su_id = '$riferimenti_catastali_su_id_immobile_2'";
		$record_recupero_nome_su_immobile_2 = $query_connection->query($query_recupero_nome_su_immobile_2);
		$campo_recupero_nome_su_immobile_2 = $record_recupero_nome_su_immobile_2->fetch_assoc();
		$riferimenti_catastali_ord_su_db_immobile_2 = addslashes($campo_recupero_nome_su_immobile_2['su_name']);

		$riferimenti_catastali_fgl_immobile_2 = addslashes($_POST['rif-catastali-foglio-immobile-2']);
		$riferimenti_catastali_par_immobile_2 = addslashes($_POST['rif-catastali-particella-immobile-2']);
		$riferimenti_catastali_sub_immobile_2 = addslashes($_POST['rif-catastali-subalterno-immobile-2']);
		
		if(!$riferimenti_catastali_sub_immobile_2) {
			$riferimenti_catastali_sub_immobile_2 = '0';
		}
		
		/* Sezione urbana ID immobile 3 */
		$riferimenti_catastali_su_id_immobile_3 = $_POST['rif-catastali-su-immobile-3'];

		/* Recupero nome sezione urbana da ID */
		$query_recupero_nome_su_immobile_3 = "SELECT su_name FROM tabella_su WHERE su_id = '$riferimenti_catastali_su_id_immobile_3'";
		$record_recupero_nome_su_immobile_3 = $query_connection->query($query_recupero_nome_su_immobile_3);
		$campo_recupero_nome_su_immobile_3 = $record_recupero_nome_su_immobile_3->fetch_assoc();
		$riferimenti_catastali_ord_su_db_immobile_3 = addslashes($campo_recupero_nome_su_immobile_3['su_name']);

		$riferimenti_catastali_fgl_immobile_3 = addslashes($_POST['rif-catastali-foglio-immobile-3']);
		$riferimenti_catastali_par_immobile_3 = addslashes($_POST['rif-catastali-particella-immobile-3']);
		$riferimenti_catastali_sub_immobile_3 = addslashes($_POST['rif-catastali-subalterno-immobile-3']);
		
		if(!$riferimenti_catastali_sub_immobile_3) {
			$riferimenti_catastali_sub_immobile_3 = '0';
		}
		
		$su_immobili_1_2_3 = $riferimenti_catastali_ord_su_db_immobile_1 . ' / ' . $riferimenti_catastali_ord_su_db_immobile_2 . ' / ' . $riferimenti_catastali_ord_su_db_immobile_3;
		$fgl_immobili_1_2_3 = $riferimenti_catastali_fgl_immobile_1 . ' / ' . $riferimenti_catastali_fgl_immobile_2 . ' / ' . $riferimenti_catastali_fgl_immobile_3;
		$par_immobili_1_2_3 = $riferimenti_catastali_par_immobile_1 . ' / ' . $riferimenti_catastali_par_immobile_2 . ' / ' . $riferimenti_catastali_par_immobile_3;
		$sub_immobili_1_2_3 = $riferimenti_catastali_sub_immobile_1 . ' / ' . $riferimenti_catastali_sub_immobile_2 . ' / ' . $riferimenti_catastali_sub_immobile_3;

		$tipologia_cliente = $_POST['adempimenti-contabili-tipologia-richiedente'];

		/* Recupero riferimenti fiscali */
		if($tipologia_cliente == "PF") {
			$adempimenti_contabili_pf_nome = addslashes($_POST['adempimenti-contabili-pf-nome']);
			$adempimenti_contabili_pf_cognome = addslashes($_POST['adempimenti-contabili-pf-cognome']);
			$adempimenti_contabili_pf_name_db = $adempimenti_contabili_pf_nome . " " . $adempimenti_contabili_pf_cognome;
			$adempimenti_contabili_pf_pro_id = $_POST['adempimenti-contabili-pf-provincia'];

			/* Recupero nome provincia da ID */
			$query_adempimenti_contabili_pf_recupero_nome_provincia = "SELECT pro_name FROM tabella_province WHERE pro_id = '$adempimenti_contabili_pf_pro_id'";
			$record_adempimenti_contabili_pf_recupero_nome_provincia = $query_connection->query($query_adempimenti_contabili_pf_recupero_nome_provincia);
			$campo_adempimenti_contabili_pf_recupero_nome_provincia = $record_adempimenti_contabili_pf_recupero_nome_provincia->fetch_assoc();
			$adempimenti_contabili_pf_pro_db = addslashes($campo_adempimenti_contabili_pf_recupero_nome_provincia['pro_name']);

			$adempimenti_contabili_pf_com_id = $_POST['adempimenti-contabili-pf-comune'];

			/* Recupero nome comune da ID */
			$query_adempimenti_contabili_pf_recupero_nome_comune = "SELECT com_name FROM tabella_comuni WHERE com_id = '$adempimenti_contabili_pf_com_id'";
			$record_adempimenti_contabili_pf_recupero_nome_comune = $query_connection->query($query_adempimenti_contabili_pf_recupero_nome_comune);
			$campo_adempimenti_contabili_pf_recupero_nome_comune = $record_adempimenti_contabili_pf_recupero_nome_comune->fetch_assoc();
			$adempimenti_contabili_pf_com_db = addslashes($campo_adempimenti_contabili_pf_recupero_nome_comune['com_name']);

			$adempimenti_contabili_pf_indirizzo = addslashes($_POST['adempimenti-contabili-pf-indirizzo']);
			$adempimenti_contabili_pf_civico = addslashes($_POST['adempimenti-contabili-pf-civico']);
			$adempimenti_contabili_pf_cap = $_POST['adempimenti-contabili-pf-cap'];
			$adempimenti_contabili_pf_codice_fiscale = strtoupper(addslashes($_POST['adempimenti-contabili-pf-codice-fiscale']));
			$adempimenti_contabili_pf_sdi = '0000000';
			
			/* Controllo esistenza cliente */
			$query_controllo_cliente = "SELECT COUNT(*) AS campo FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_cf = '$adempimenti_contabili_pf_codice_fiscale' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pf_pro_db' AND cli_fis_com = '$adempimenti_contabili_pf_com_db' AND cli_fis_cap = '$adempimenti_contabili_pf_cap'";
			$campo_controllo_cliente = mysqli_query($query_connection, $query_controllo_cliente);
			$count_controllo_cliente = mysqli_fetch_assoc($campo_controllo_cliente);

			if($count_controllo_cliente['campo'] == 0) {			
				/* Definizione prezzo fittizio totale ordini effettuati cliente "X" */
				$cli_count_price_tot_iniziale = 0.00;
				
				/* Definizione prezzo fittizio totale effettivo ordini effettuati cliente "X" */
				$cli_count_price_tot_eff_finale = 0.00;
				
				/* Definizione profitto netto fittizio totale riferito al cliente "X" */
				$cli_ord_price_margine_netto_tot = 0.00;
			
				/* Data di primo ed ultimo ordine coincidenti con la data di acquisizione */
				$cli_dpo = $cli_data_acq;
				$cli_duo = $cli_data_acq;
				
				/* Riferimento recensione */
				$cli_rate = 4;
			
				/* Inserimento nel database */
				$query_inserimento_cliente = "INSERT INTO tabella_clienti (cli_id, cli_name, cli_tip, cli_tip_pb, cli_data_acq, cli_fis_pro, cli_fis_com, cli_fis_ind, cli_fis_civ, cli_fis_cap, cli_cf, cli_iva, cli_sdi, cli_email, cli_pec, cli_ord_count_tot, cli_ord_price_tot, cli_ord_price_tot_eff_finale, cli_ord_price_margine_netto_tot, cli_dpo, cli_duo, cli_rate)
				VALUES ('', '$adempimenti_contabili_pf_name_db', '$tipologia_cliente', '$cli_tip_pb', '$cli_data_acq', '$adempimenti_contabili_pf_pro_db', '$adempimenti_contabili_pf_com_db', '$adempimenti_contabili_pf_indirizzo', '$adempimenti_contabili_pf_civico', '$adempimenti_contabili_pf_cap', '$adempimenti_contabili_pf_codice_fiscale', '', '$adempimenti_contabili_pf_sdi', '$email_cliente', '', '', '$cli_count_price_tot_iniziale', '$cli_count_price_tot_eff_finale', '$cli_ord_price_margine_netto_tot', '$cli_dpo', '$cli_duo', '$cli_rate')";

				if (!$query_connection->query($query_inserimento_cliente)) {
					die($query_connection->error);
				}

				/* Recupero ID cliente per inserimento nella tabella ordini */
				$query_recupero_id_cliente = "SELECT cli_id FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_cf = '$adempimenti_contabili_pf_codice_fiscale' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pf_pro_db' AND cli_fis_com = '$adempimenti_contabili_pf_com_db' AND cli_fis_cap = '$adempimenti_contabili_pf_cap'";
				$record_recupero_id_cliente = $query_connection->query($query_recupero_id_cliente);
				$campo_recupero_id_cliente = $record_recupero_id_cliente->fetch_assoc();
				$cli_id = $campo_recupero_id_cliente['cli_id'];

			} elseif($count_controllo_cliente['campo'] >= 1) {          
				/* Recupero ID cliente per inserimento nella tabella ordini */
				$query_recupero_id_cliente = "SELECT cli_id FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_cf = '$adempimenti_contabili_pf_codice_fiscale' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pf_pro_db' AND cli_fis_com = '$adempimenti_contabili_pf_com_db' AND cli_fis_cap = '$adempimenti_contabili_pf_cap'";
				$record_recupero_id_cliente = $query_connection->query($query_recupero_id_cliente);
				$campo_recupero_id_cliente = $record_recupero_id_cliente->fetch_assoc();
				$cli_id = $campo_recupero_id_cliente['cli_id'];
				
				/* Aggiornamento data ultimo ordine */
				$cli_duo_aggiornata = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));
			
				/* Aggiornamento database */
				$query_aggiornemento_data_ultimo_ordine = "UPDATE tabella_clienti SET cli_duo = '$cli_duo_aggiornata' WHERE cli_id = '$cli_id'";
				$record_aggiornamento_data_ultimo_ordine = $query_connection->query($query_aggiornemento_data_ultimo_ordine);
			}
		} elseif($tipologia_cliente == "PF-IVA") {
			$adempimenti_contabili_pf_iva_nome = addslashes($_POST['adempimenti-contabili-pf-iva-nome']);
			$adempimenti_contabili_pf_iva_cognome = addslashes($_POST['adempimenti-contabili-pf-iva-cognome']);
			$adempimenti_contabili_pf_iva_name_db = $adempimenti_contabili_pf_iva_nome . " " . $adempimenti_contabili_pf_iva_cognome;
			$adempimenti_contabili_pf_iva_pro_id = $_POST['adempimenti-contabili-pf-iva-provincia'];

			/* Recupero nome provincia da ID */
			$query_adempimenti_contabili_pf_iva_recupero_nome_provincia = "SELECT pro_name FROM tabella_province WHERE pro_id = '$adempimenti_contabili_pf_iva_pro_id'";
			$record_adempimenti_contabili_pf_iva_recupero_nome_provincia = $query_connection->query($query_adempimenti_contabili_pf_iva_recupero_nome_provincia);
			$campo_adempimenti_contabili_pf_iva_recupero_nome_provincia = $record_adempimenti_contabili_pf_iva_recupero_nome_provincia->fetch_assoc();
			$adempimenti_contabili_pf_iva_pro_db = addslashes($campo_adempimenti_contabili_pf_iva_recupero_nome_provincia['pro_name']);

			$adempimenti_contabili_pf_iva_com_id = $_POST['adempimenti-contabili-pf-iva-comune'];

			/* Recupero nome comune da ID */
			$query_adempimenti_contabili_pf_iva_recupero_nome_comune = "SELECT com_name FROM tabella_comuni WHERE com_id = '$adempimenti_contabili_pf_iva_com_id'";
			$record_adempimenti_contabili_pf_iva_recupero_nome_comune = $query_connection->query($query_adempimenti_contabili_pf_iva_recupero_nome_comune);
			$campo_adempimenti_contabili_pf_iva_recupero_nome_comune = $record_adempimenti_contabili_pf_iva_recupero_nome_comune->fetch_assoc();
			$adempimenti_contabili_pf_iva_com_db = addslashes($campo_adempimenti_contabili_pf_iva_recupero_nome_comune['com_name']);

			$adempimenti_contabili_pf_iva_indirizzo = addslashes($_POST['adempimenti-contabili-pf-iva-indirizzo']);
			$adempimenti_contabili_pf_iva_civico = addslashes($_POST['adempimenti-contabili-pf-iva-civico']);
			$adempimenti_contabili_pf_iva_cap = $_POST['adempimenti-contabili-pf-iva-cap'];
			$adempimenti_contabili_pf_iva_codice_fiscale = strtoupper(addslashes($_POST['adempimenti-contabili-pf-iva-codice-fiscale']));
			$adempimenti_contabili_pf_iva_partita_iva = addslashes($_POST['adempimenti-contabili-pf-iva-partita-iva']);
			$adempimenti_contabili_pf_iva_pec = addslashes($_POST['adempimenti-contabili-pf-iva-pec']);
			$adempimenti_contabili_pf_iva_sdi = addslashes($_POST['adempimenti-contabili-pf-iva-sdi']);
			
			if(!$adempimenti_contabili_pf_iva_sdi) {
				$adempimenti_contabili_pf_iva_sdi = '0000000';
			}

			/* Controllo esistenza cliente */
			$query_controllo_cliente = "SELECT COUNT(*) AS campo FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_cf = '$adempimenti_contabili_pf_iva_codice_fiscale' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pf_iva_pro_db' AND cli_fis_com = '$adempimenti_contabili_pf_iva_com_db' AND cli_fis_cap = '$adempimenti_contabili_pf_iva_cap' AND cli_iva = '$adempimenti_contabili_pf_iva_partita_iva'";
			$campo_controllo_cliente = mysqli_query($query_connection, $query_controllo_cliente);
			$count_controllo_cliente = mysqli_fetch_assoc($campo_controllo_cliente);

			if($count_controllo_cliente['campo'] == 0) {
				/* Definizione prezzo fittizio totale ordini effettuati cliente "X" */
				$cli_count_price_tot_iniziale = 0.00;
				
				/* Definizione prezzo fittizio totale effettivo ordini effettuati cliente "X" */
				$cli_count_price_tot_eff_finale = 0.00;
				
				/* Definizione profitto netto fittizio totale riferito al cliente "X" */
				$cli_ord_price_margine_netto_tot = 0.00;
			
				/* Data di primo ed ultimo ordine coincidenti con la data di acquisizione */
				$cli_dpo = $cli_data_acq;
				$cli_duo = $cli_data_acq;
				
				/* Riferimento recensione */
				$cli_rate = 4;
			
				/* Inserimento nel database */
				$query_inserimento_cliente = "INSERT INTO tabella_clienti (cli_id, cli_name, cli_tip, cli_tip_pb, cli_data_acq, cli_fis_pro, cli_fis_com, cli_fis_ind, cli_fis_civ, cli_fis_cap, cli_cf, cli_iva, cli_sdi, cli_email, cli_pec, cli_ord_count_tot, cli_ord_price_tot, cli_ord_price_tot_eff_finale, cli_ord_price_margine_netto_tot, cli_dpo, cli_duo, cli_rate)
				VALUES ('', '$adempimenti_contabili_pf_iva_name_db', '$tipologia_cliente', '$cli_tip_pb', '$cli_data_acq', '$adempimenti_contabili_pf_iva_pro_db', '$adempimenti_contabili_pf_iva_com_db', '$adempimenti_contabili_pf_iva_indirizzo', '$adempimenti_contabili_pf_iva_civico', '$adempimenti_contabili_pf_iva_cap', '$adempimenti_contabili_pf_iva_codice_fiscale', '$adempimenti_contabili_pf_iva_partita_iva', '$adempimenti_contabili_pf_iva_sdi', '$email_cliente', '$adempimenti_contabili_pf_iva_pec', '', '$cli_count_price_tot_iniziale', '$cli_count_price_tot_eff_finale', '$cli_ord_price_margine_netto_tot', '$cli_dpo', '$cli_duo', '$cli_rate')";

				if (!$query_connection->query($query_inserimento_cliente)) {
					die($query_connection->error);
				}

				/* Recupero ID cliente per inserimento nella tabella ordini */
				$query_recupero_id_cliente = "SELECT cli_id FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_cf = '$adempimenti_contabili_pf_iva_codice_fiscale' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pf_iva_pro_db' AND cli_fis_com = '$adempimenti_contabili_pf_iva_com_db' AND cli_fis_cap = '$adempimenti_contabili_pf_iva_cap' AND cli_iva = '$adempimenti_contabili_pf_iva_partita_iva'";
				$record_recupero_id_cliente = $query_connection->query($query_recupero_id_cliente);
				$campo_recupero_id_cliente = $record_recupero_id_cliente->fetch_assoc();
				$cli_id = $campo_recupero_id_cliente['cli_id'];

			} elseif($count_controllo_cliente['campo'] >= 1) {
				/* Recupero ID cliente per inserimento nella tabella ordini */
				$query_recupero_id_cliente = "SELECT cli_id FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_cf = '$adempimenti_contabili_pf_iva_codice_fiscale' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pf_iva_pro_db' AND cli_fis_com = '$adempimenti_contabili_pf_iva_com_db' AND cli_fis_cap = '$adempimenti_contabili_pf_iva_cap' AND cli_iva = '$adempimenti_contabili_pf_iva_partita_iva'";
				$record_recupero_id_cliente = $query_connection->query($query_recupero_id_cliente);
				$campo_recupero_id_cliente = $record_recupero_id_cliente->fetch_assoc();
				$cli_id = $campo_recupero_id_cliente['cli_id'];
				
				/* Aggiornamento data ultimo ordine */
				$cli_duo_aggiornata = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));
			
				/* Aggiornamento database */
				$query_aggiornemento_data_ultimo_ordine = "UPDATE tabella_clienti SET cli_duo = '$cli_duo_aggiornata' WHERE cli_id = '$cli_id'";
				$record_aggiornamento_data_ultimo_ordine = $query_connection->query($query_aggiornemento_data_ultimo_ordine);
			}
		} elseif($tipologia_cliente == "PG") {
			$adempimenti_contabili_pg_ragione_sociale = addslashes($_POST['adempimenti-contabili-pg-ragione-sociale']);
			$adempimenti_contabili_pg_leg_rap_nome = addslashes($_POST['adempimenti-contabili-pg-leg-rap-nome']);
			$adempimenti_contabili_pg_leg_rap_cognome = addslashes($_POST['adempimenti-contabili-pg-leg-rap-cognome']);
			$adempimenti_contabili_pg_name_db = $adempimenti_contabili_pg_ragione_sociale . " di " . $adempimenti_contabili_pg_leg_rap_nome . " " . $adempimenti_contabili_pg_leg_rap_cognome;
			$adempimenti_contabili_pg_pro_id = $_POST['adempimenti-contabili-pg-provincia'];

			/* Recupero nome provincia da ID */
			$query_adempimenti_contabili_pg_recupero_nome_provincia = "SELECT pro_name FROM tabella_province WHERE pro_id = '$adempimenti_contabili_pg_pro_id'";
			$record_adempimenti_contabili_pg_recupero_nome_provincia = $query_connection->query($query_adempimenti_contabili_pg_recupero_nome_provincia);
			$campo_adempimenti_contabili_pg_recupero_nome_provincia = $record_adempimenti_contabili_pg_recupero_nome_provincia->fetch_assoc();
			$adempimenti_contabili_pg_pro_db = addslashes($campo_adempimenti_contabili_pg_recupero_nome_provincia['pro_name']);

			$adempimenti_contabili_pg_com_id = $_POST['adempimenti-contabili-pg-comune'];

			/* Recupero nome comune da ID */
			$query_adempimenti_contabili_pg_recupero_nome_comune = "SELECT com_name FROM tabella_comuni WHERE com_id = '$adempimenti_contabili_pg_com_id'";
			$record_adempimenti_contabili_pg_recupero_nome_comune = $query_connection->query($query_adempimenti_contabili_pg_recupero_nome_comune);
			$campo_adempimenti_contabili_pg_recupero_nome_comune = $record_adempimenti_contabili_pg_recupero_nome_comune->fetch_assoc();
			$adempimenti_contabili_pg_com_db = addslashes($campo_adempimenti_contabili_pg_recupero_nome_comune['com_name']);

			$adempimenti_contabili_pg_indirizzo = addslashes($_POST['adempimenti-contabili-pg-indirizzo']);
			$adempimenti_contabili_pg_civico = addslashes($_POST['adempimenti-contabili-pg-civico']);
			$adempimenti_contabili_pg_cap = $_POST['adempimenti-contabili-pg-cap'];
			$adempimenti_contabili_pg_partita_iva = addslashes($_POST['adempimenti-contabili-pg-partita-iva']);
			$adempimenti_contabili_pg_pec = addslashes($_POST['adempimenti-contabili-pg-pec']);
			$adempimenti_contabili_pg_sdi = addslashes($_POST['adempimenti-contabili-pg-sdi']);
			
			if(!$adempimenti_contabili_pg_sdi) {
				$adempimenti_contabili_pg_sdi = '0000000';
			}

			/* Controllo esistenza cliente */
			$query_controllo_cliente = "SELECT COUNT(*) AS campo FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pg_pro_db' AND cli_fis_com = '$adempimenti_contabili_pg_com_db' AND cli_fis_cap = '$adempimenti_contabili_pg_cap' AND cli_iva = '$adempimenti_contabili_pg_partita_iva'";
			$campo_controllo_cliente = mysqli_query($query_connection, $query_controllo_cliente);
			$count_controllo_cliente = mysqli_fetch_assoc($campo_controllo_cliente);

			if($count_controllo_cliente['campo'] == 0) {
				/* Definizione prezzo fittizio totale ordini effettuati cliente "X" */
				$cli_count_price_tot_iniziale = 0.00;
				
				/* Definizione prezzo fittizio totale effettivo ordini effettuati cliente "X" */
				$cli_count_price_tot_eff_finale = 0.00;
				
				/* Definizione profitto netto fittizio totale riferito al cliente "X" */
				$cli_ord_price_margine_netto_tot = 0.00;
			
				/* Data di primo ed ultimo ordine coincidenti con la data di acquisizione */
				$cli_dpo = $cli_data_acq;
				$cli_duo = $cli_data_acq;
				
				/* Riferimento recensione */
				$cli_rate = 4;
			
				/* Inserimento nel database */
				$query_inserimento_cliente = "INSERT INTO tabella_clienti (cli_id, cli_name, cli_tip, cli_tip_pb, cli_data_acq, cli_fis_pro, cli_fis_com, cli_fis_ind, cli_fis_civ, cli_fis_cap, cli_cf, cli_iva, cli_sdi, cli_email, cli_pec, cli_ord_count_tot, cli_ord_price_tot, cli_ord_price_tot_eff_finale, cli_ord_price_margine_netto_tot, cli_dpo, cli_duo, cli_rate)
				VALUES ('', '$adempimenti_contabili_pg_name_db', '$tipologia_cliente', '$cli_tip_pb', '$cli_data_acq', '$adempimenti_contabili_pg_pro_db', '$adempimenti_contabili_pg_com_db', '$adempimenti_contabili_pg_indirizzo', '$adempimenti_contabili_pg_civico', '$adempimenti_contabili_pg_cap', '', '$adempimenti_contabili_pg_partita_iva', '$adempimenti_contabili_pg_sdi', '$email_cliente', '$adempimenti_contabili_pg_pec', '', '$cli_count_price_tot_iniziale', '$cli_count_price_tot_eff_finale', 'cli_ord_price_margine_netto_tot', '$cli_dpo', '$cli_duo', '$cli_rate')";

				if (!$query_connection->query($query_inserimento_cliente)) {
					die($query_connection->error);
				}

				/* Recupero ID cliente per inserimento nella tabella ordini */
				$query_recupero_id_cliente = "SELECT cli_id FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pg_pro_db' AND cli_fis_com = '$adempimenti_contabili_pg_com_db' AND cli_fis_cap = '$adempimenti_contabili_pg_cap' AND cli_iva = '$adempimenti_contabili_pg_partita_iva'";
				$record_recupero_id_cliente = $query_connection->query($query_recupero_id_cliente);
				$campo_recupero_id_cliente = $record_recupero_id_cliente->fetch_assoc();
				$cli_id = $campo_recupero_id_cliente['cli_id'];

			} elseif($count_controllo_cliente['campo'] >= 1) {			
				/* Recupero ID cliente per inserimento nella tabella ordini */
				$query_recupero_id_cliente = "SELECT cli_id FROM tabella_clienti WHERE cli_email = '$email_cliente' AND cli_tip = '$tipologia_cliente' AND cli_fis_pro = '$adempimenti_contabili_pg_pro_db' AND cli_fis_com = '$adempimenti_contabili_pg_com_db' AND cli_fis_cap = '$adempimenti_contabili_pg_cap' AND cli_iva = '$adempimenti_contabili_pg_partita_iva'";
				$record_recupero_id_cliente = $query_connection->query($query_recupero_id_cliente);
				$campo_recupero_id_cliente = $record_recupero_id_cliente->fetch_assoc();
				$cli_id = $campo_recupero_id_cliente['cli_id'];
				
				/* Aggiornamento data ultimo ordine */
				$cli_duo_aggiornata = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));
			
				/* Aggiornamento database */
				$query_aggiornemento_data_ultimo_ordine = "UPDATE tabella_clienti SET cli_duo = '$cli_duo_aggiornata' WHERE cli_id = '$cli_id'";
				$record_aggiornamento_data_ultimo_ordine = $query_connection->query($query_aggiornemento_data_ultimo_ordine);
			}
		}

		/* Definizione prezzo iniziale ordine */
		$prezzo_visura_ordinaria = $price_vio * 3;
		$tributo_catastale_visura_ordinaria = $price_tc_vio * 3;

		/* Controllo spunte servizi aggiuntivi per conferma prezzo finale ordine */
		/* Estratto di mappa immobile 1 */
		if(isset($_POST['ordine-visura-ordinaria-mappa-immobile-1'])) {
			$prezzo_estratto_mappa = $price_map;
			/* Determinazione tributo catastale */
			$tributo_catastale_estratto_mappa = $price_tc_map;
			/* Definizione ord_vio (S / N) */
			$ord_map = "S / ";
		} else {
			$prezzo_estratto_mappa = 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_estratto_mappa = 0.00;
			/* Definizione ord_vio (S / N) */
			$ord_map = "N / ";
		}
		
		/* Estratto di mappa immobile 2 */
		if(isset($_POST['ordine-visura-ordinaria-mappa-immobile-2'])) {
			$prezzo_estratto_mappa += $price_map;
			/* Determinazione tributo catastale */
			$tributo_catastale_estratto_mappa += $price_tc_map;
			/* Definizione ord_vio (S / N) */
			$ord_map .= "S / ";
		} else {
			$prezzo_estratto_mappa += 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_estratto_mappa += 0.00;
			/* Definizione ord_vio (S / N) */
			$ord_map .= "N / ";
		}
		
		/* Estratto di mappa immobile 3 */
		if(isset($_POST['ordine-visura-ordinaria-mappa-immobile-3'])) {
			$prezzo_estratto_mappa += $price_map;
			/* Determinazione tributo catastale */
			$tributo_catastale_estratto_mappa += $price_tc_map;
			/* Definizione ord_vio (S / N) */
			$ord_map .= "S";
		} else {
			$prezzo_estratto_mappa += 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_estratto_mappa += 0.00;
			/* Definizione ord_vio (S / N) */
			$ord_map .= "N";
		}

		/* Visura storica immobile 1 */
		if(isset($_POST['ordine-visura-ordinaria-visura-storica-immobile-1'])) {
			$prezzo_visura_storica = $price_vis;
			/* Determinazione tributo catastale */
			$tributo_catastale_visura_storica = $price_tc_vis;
			/* Definizione ord_vis (S / N) */
			$ord_vis = "S / ";
		} else {
			$prezzo_visura_storica = 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_visura_storica = 0.00;
			/* Definizione ord_vis (S / N) */
			$ord_vis = "N / ";
		}
		
		/* Visura storica immobile 2 */
		if(isset($_POST['ordine-visura-ordinaria-visura-storica-immobile-2'])) {
			$prezzo_visura_storica += $price_vis;
			/* Determinazione tributo catastale */
			$tributo_catastale_visura_storica += $price_tc_vis;
			/* Definizione ord_vis (S / N) */
			$ord_vis .= "S / ";
		} else {
			$prezzo_visura_storica += 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_visura_storica += 0.00;
			/* Definizione ord_vis (S / N) */
			$ord_vis .= "N / ";
		}
		
		/* Visura storica immobile 3 */
		if(isset($_POST['ordine-visura-ordinaria-visura-storica-immobile-3'])) {
			$prezzo_visura_storica += $price_vis;
			/* Determinazione tributo catastale */
			$tributo_catastale_visura_storica += $price_tc_vis;
			/* Definizione ord_vis (S / N) */
			$ord_vis .= "S";
		} else {
			$prezzo_visura_storica += 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_visura_storica += 0.00;
			/* Definizione ord_vis (S / N) */
			$ord_vis .= "N";
		}

		/* Planimetria catastale immobile 1 */
		if(isset($_POST['ordine-visura-ordinaria-planimetria-immobile-1'])) {
			$prezzo_planimetria_catastale = $price_pln;
			/* Determinazione tributo catastale */
			$tributo_catastale_planimetria = $price_tc_pln;
			/* Definizione ord_map (S / N) */
			$ord_pln = "S / ";
		} else {
			$prezzo_planimetria_catastale = 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_planimetria = 0.00;
			/* Definizione ord_map (S / N) */
			$ord_pln = "N / ";
		}
		
		/* Planimetria catastale immobile 2 */
		if(isset($_POST['ordine-visura-ordinaria-planimetria-immobile-2'])) {
			$prezzo_planimetria_catastale += $price_pln;
			/* Determinazione tributo catastale */
			$tributo_catastale_planimetria += $price_tc_pln;
			/* Definizione ord_map (S / N) */
			$ord_pln .= "S / ";
		} else {
			$prezzo_planimetria_catastale += 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_planimetria += 0.00;
			/* Definizione ord_map (S / N) */
			$ord_pln .= "N / ";
		}
		
		/* Planimetria catastale immobile 3 */
		if(isset($_POST['ordine-visura-ordinaria-planimetria-immobile-3'])) {
			$prezzo_planimetria_catastale += $price_pln;
			/* Determinazione tributo catastale */
			$tributo_catastale_planimetria += $price_tc_pln;
			/* Definizione ord_map (S / N) */
			$ord_pln .= "S";
		} else {
			$prezzo_planimetria_catastale += 0.00;
			/* Determinazione tributo catastale */
			$tributo_catastale_planimetria += 0.00;
			/* Definizione ord_map (S / N) */
			$ord_pln .= "N";
		}

		/* Calcolo prezzo finale ordine */
		$ord_price = round($prezzo_estratto_mappa + $prezzo_visura_ordinaria + $prezzo_visura_storica + $prezzo_planimetria_catastale, 2);

		/* Calcolo prezzo finale effettivo ordine - Identico al prezzo finale in fase di inserimento dell'ordine */
		$ord_price_eff_finale = $ord_price;
		
		/* Calcolo debito contabile - Identico al presso finale in fase di inserimento dell'ordine */
		$ord_deb_cont = $ord_price;
		
		/* Calcolo tributi catastali da pagare */
		$tributi_catastali_totali = round($tributo_catastale_estratto_mappa + $tributo_catastale_visura_ordinaria + $tributo_catastale_visura_storica + $tributo_catastale_planimetria, 2);
		
		/* Calcolo spese finanziarie da sostenere per il ricevimento del pagamento sulla base del metodo di pagamento */
		$metodo_pagamento = $_POST['metodo-pagamento'];
		$spese_finanziarie = 0.00;
		if($metodo_pagamento === 'paypal') {
			$spese_finanziarie += round((float)(($ord_price_eff_finale * 0.034) + 0.35), 2);
		} elseif($metodo_pagamento === 'bonifico') {
			$spese_finanziarie += 0.00;
		}

		/* Calcolo importo stimato di tasse e contributi da versare */
		$tasse_contributi = round((float)($ord_price_eff_finale * 0.30), 2);
		
		/* Calcolo profitto netto (stima) */
		$profitto_netto = round($ord_price_eff_finale - ($tributi_catastali_totali + $spese_finanziarie + $tasse_contributi), 2);
		
		/* Verifica se il cliente è il proprietario o il delegato */
		$cliente_titolare_delegato = $_POST['form-acquisto-radio-titolare-delegato'];

		/* Recupero ID livello di urgenza */
		$livello_urgenza_id = $_POST['gestione-interna-livello-urgenza'];

		/* Recupero nome livello urgenza da ID */
		$query_recupero_livello_urgenza = "SELECT urg_name FROM tabella_urgenza WHERE urg_id = '$livello_urgenza_id'";
		$record_recupero_livello_urgenza = $query_connection->query($query_recupero_livello_urgenza);
		$campo_recupero_livello_urgenza = $record_recupero_livello_urgenza->fetch_assoc();
		$urg_name = addslashes($campo_recupero_livello_urgenza['urg_name']);

		/* Definizione di ordine PERSONAL */
		$ord_pb = "P";

		/* Definizione di ordine SINGOLO */
		$ord_sm = "M";

		/* Definizione ord_vio (S / N) */
		$ord_vio = "S / S / S";

		/* Definizione ord_arr (arrivo del documento - data e ora) */
		$ord_arr = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));

		/* Controllo livello di urgenza e calcolo ore da aggiungere ad ord_sca */
		if($livello_urgenza_id == 1) {
			/* Calcolo ord_sca (scadenza della richiesta - data e ora) */
			$ord_sca = date("Y-m-d H:i:s", strtotime('+25 hours'));
		} elseif($livello_urgenza_id == 2) {
			/* Calcolo ord_sca (scadenza della richiesta - data e ora) */
			$ord_sca = date("Y-m-d H:i:s", strtotime('+13 hours'));
		} elseif($livello_urgenza_id == 3) {
			/* Calcolo ord_sca (scadenza della richiesta - data e ora) */
			$ord_sca = date("Y-m-d H:i:s", strtotime('+3 hours'));
		}

		/* Funzione per la generazione del token */
		$nChar = 25;
		function getToken($nChar) {
			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $nChar; $i++) {
				$index = rand(0, strlen($characters) - 1);
				$randomString .= $characters[$index];
			}
			return $randomString;
		}

		/* Definizione ord_token */
		$ord_token = getToken($nChar);

		/* Definizione ord_stat */
		$ord_stat = "Da evadere";
		
		/* Definizione di catasto immobile 1 */
		$ord_catasto_immobile_1 = $_POST['tip-catasto-immobile-1'];
		/* Definizione di catasto immobile 2 */
		$ord_catasto_immobile_2 = $_POST['tip-catasto-immobile-2'];
		/* Definizione di catasto immobile 3 */
		$ord_catasto_immobile_3 = $_POST['tip-catasto-immobile-3'];
		
		/* Tipo catasto immobili 1 e 2 */
		$ord_catasto_immobili_1_2_3 = $ord_catasto_immobile_1 . ' / ' . $ord_catasto_immobile_2 . ' / ' . $ord_catasto_immobile_3;

		/* Caricamento ordine nel database */
		$query_inserimento_nuovo_ordine = "INSERT INTO tabella_ordini (ord_pb, ord_sm, ord_id, ord_catasto, ord_pln, ord_vio, ord_vis, ord_map, ord_arr, ord_urg, ord_sca, ord_tok, cli_ref, cli_td, ord_pro, ord_com, ord_su, ord_fgl, ord_par, ord_sub, ord_stat, ord_price, ord_price_eff_finale, ord_price_tributi_catastali, ord_price_spese_finanziarie, ord_price_tasse_contributi, ord_price_margine_netto, ord_deb_cont, ord_met_pag)
		VALUES ('$ord_pb', '$ord_sm', '', '$ord_catasto_immobili_1_2_3', '$ord_pln', '$ord_vio', '$ord_vis', '$ord_map', '$ord_arr', '$urg_name', '$ord_sca', '$ord_token', '$cli_id', '$cliente_titolare_delegato', '$riferimenti_geografici_provincia_immobili_1_2_3', '$riferimenti_geografici_comune_immobili_1_2_3', '$su_immobili_1_2_3', '$fgl_immobili_1_2_3', '$par_immobili_1_2_3', '$sub_immobili_1_2_3', '$ord_stat', '$ord_price', '$ord_price_eff_finale', '$tributi_catastali_totali', '$spese_finanziarie', '$tasse_contributi', '$profitto_netto', '$ord_deb_cont', '$metodo_pagamento')";

		if (!$query_connection->query($query_inserimento_nuovo_ordine)) {
			die($query_connection->error);
		}

		/* Inizio procedura per il conteggio del numero di ordini fatti dai clienti */
		/* Recupero dalla tabella ordini il numero di ordini fatti finora dal cliente "X" sulla base del cli_id recuperato */
		$query_recupero_numero_ordini_cliente_x = "SELECT COUNT(*) AS numero_ordini_cliente_x FROM tabella_ordini WHERE cli_ref = '$cli_id'";
		$campo_recupero_numero_ordini_cliente_x = mysqli_query($query_connection, $query_recupero_numero_ordini_cliente_x);
		$count_recupero_numero_ordini_cliente_x = mysqli_fetch_assoc($campo_recupero_numero_ordini_cliente_x);
		$cli_ord_count_tot = (int)$count_recupero_numero_ordini_cliente_x['numero_ordini_cliente_x'];

		/* Aggiornamento cli_ord_count_tot cliente X nella tabella_clienti */
		$query_aggiornamento_ordini_effettuati_cliente_x = "UPDATE tabella_clienti SET cli_ord_count_tot = '$cli_ord_count_tot' WHERE cli_id = '$cli_id'";
		$record_aggiornamento_ordini_effettuati_cliente_x = $query_connection->query($query_aggiornamento_ordini_effettuati_cliente_x);
	  
		/* Procedimento per il calcolo dell'importo totale degli ordini fatti da un determinato cliente */
		$query_somma_importo_ordini_cliente_x = "SELECT SUM(ord_price) AS importo_ordini_cliente_x FROM tabella_ordini WHERE cli_ref = '$cli_id'";
		$record_somma_importo_ordini_cliente_x = $query_connection->query($query_somma_importo_ordini_cliente_x);
		$campo_somma_importo_ordini_cliente_x = $record_somma_importo_ordini_cliente_x->fetch_assoc();
		$cli_ord_importo_tot = $campo_somma_importo_ordini_cliente_x['importo_ordini_cliente_x'];
	  	  
		/* Aggiornamento cli_ord_price_tot cliente X nella tabella_clienti */
		$query_aggiornamento_prezzo_ordini_effettuati_cliente_x = "UPDATE tabella_clienti SET cli_ord_price_tot = '$cli_ord_importo_tot' WHERE cli_id = '$cli_id'";
		$record_aggiornamento_prezzo_ordini_effettuati_cliente_x = $query_connection->query($query_aggiornamento_prezzo_ordini_effettuati_cliente_x);
    
		/* Procedimento per il calcolo dell'importo totale effettivo degli ordini fatti da un determinato cliente */
		$query_somma_importo_effettivo_ordini_cliente_x = "SELECT SUM(ord_price_eff_finale) AS importo_effettivo_ordini_cliente_x FROM tabella_ordini WHERE cli_ref = '$cli_id'";
		$record_somma_importo_effettivo_ordini_cliente_x = $query_connection->query($query_somma_importo_effettivo_ordini_cliente_x);
		$campo_somma_importo_effettivo_ordini_cliente_x = $record_somma_importo_effettivo_ordini_cliente_x->fetch_assoc();
		$cli_ord_importo_effettivo_tot = $campo_somma_importo_effettivo_ordini_cliente_x['importo_effettivo_ordini_cliente_x'];
	  	  
		/* Aggiornamento cli_ord_price_tot cliente X nella tabella_clienti */
		$query_aggiornamento_prezzo_effettivo_ordini_effettuati_cliente_x = "UPDATE tabella_clienti SET cli_ord_price_tot_eff_finale = '$cli_ord_importo_effettivo_tot' WHERE cli_id = '$cli_id'";
		$record_aggiornamento_prezzo_effettivo_ordini_effettuati_cliente_x = $query_connection->query($query_aggiornamento_prezzo_effettivo_ordini_effettuati_cliente_x);
	
		/* Procedimento per il calcolo del profitto netto totale degli ordini fatti da un determinato cliente */
		$query_somma_profitto_netto_ordini_cliente_x = "SELECT SUM(ord_price_margine_netto) AS profitto_netto_ordini_cliente_x FROM tabella_ordini WHERE cli_ref = '$cli_id'";
		$record_somma_profitto_netto_ordini_cliente_x = $query_connection->query($query_somma_profitto_netto_ordini_cliente_x);
		$campo_somma_profitto_netto_ordini_cliente_x = $record_somma_profitto_netto_ordini_cliente_x->fetch_assoc();
		$cli_ord_price_margine_netto_tot = $campo_somma_profitto_netto_ordini_cliente_x['profitto_netto_ordini_cliente_x'];
	
		/* Aggiornamento cli_ord_price_margine_netto_tot cliente X nella tabella_clienti */
		$query_aggiornamento_profitto_netto_ordini_cliente_x = "UPDATE tabella_clienti SET cli_ord_price_margine_netto_tot = '$cli_ord_price_margine_netto_tot' WHERE cli_id = '$cli_id'";
		$record_aggiornamento_profitto_netto_ordini_cliente_x = $query_connection->query($query_aggiornamento_profitto_netto_ordini_cliente_x);
	
		/* Recupero ID ordine per invio e-mail di conferma */
		$query_recupero_id_ordine = "SELECT ord_id FROM tabella_ordini WHERE ord_pb = '$ord_pb' AND ord_sm = '$ord_sm' AND ord_arr = '$ord_arr' AND ord_urg = '$urg_name' AND ord_sca = '$ord_sca' AND ord_tok = '$ord_token' AND cli_ref = '$cli_id' AND ord_price = '$ord_price'";
		$record_recupero_id_ordine = $query_connection->query($query_recupero_id_ordine);
		$campo_recupero_id_ordine = $record_recupero_id_ordine->fetch_assoc();
		$id_ordine = $campo_recupero_id_ordine['ord_id'];
		
		/* Trascrizione ordine nella tabella cronologica */
		/* Determinazione numero sequenziale iniziale */
		$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
		$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
		$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
		$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
		/* Determinazione numero sequenziale successivo (nuovo inserimento) */
		$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
		
		/* Stato nuovo ordine */
		$stato_nuovo_ordine = 'Nuovo ordine';
		
		/* Procedura di inserimento */
		$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$ord_arr', '$numero_sequenza_successivo', '$stato_nuovo_ordine', '')";
		$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);
		
		/* Passaggi preliminare per l'invio della e-mail di conferma */
		/* Determinazione GENTILE/SPETTABILE in base alla tipologia del cliente (PF, PF+IVA, PG) */
		if($tipologia_cliente === 'PF' || $tipologia_cliente === 'PF-IVA') {
			$titolo_cliente_intestazione_email_conferma = 'Gentile '; 
		} elseif($tipologia_cliente === 'PG') {
			$titolo_cliente_intestazione_email_conferma = 'Spettabile ';
		}
		
		/* Recupero nome cliente completo */
		if($tipologia_cliente === 'PF') {
			$nome_cliente_completo = $adempimenti_contabili_pf_name_db;
		} elseif($tipologia_cliente === 'PF-IVA') {
			$nome_cliente_completo = $adempimenti_contabili_pf_iva_name_db;
		} elseif($tipologia_cliente === 'PG') {
			$nome_cliente_completo = $adempimenti_contabili_pg_name_db;
		}
		
		mkdir('./../../ordini/catasto/' . $id_ordine . '-' . $anno_in_corso, 0704);
		
		$oggetto_email = 'Il tuo ordine è stato confermato';
		
		/* Formazione del messaggio di conferma */
		$messaggio_conferma_ordine = '<p style="font-family: Arial, Helvetica, sans-serif;">Questa e-mail viene generata automaticamente. ';
		$messaggio_conferma_ordine .= 'Eventuali risposte potrebbero non essere lette. Non rispondere a questa e-mail.<br><br>';
		$messaggio_conferma_ordine .= $titolo_cliente_intestazione_email_conferma . $nome_cliente_completo . ',<br>';
		$messaggio_conferma_ordine .= 'il tuo ordine è stato confermato e registrato con il numero ' . $id_ordine . '.<br>';
		$messaggio_conferma_ordine .= 'Se tutti i documenti richiesti saranno disponibili spenderai al massimo ' . number_format("$ord_price", 2, ",", ".") . ' EUR.<br>';
		$messaggio_conferma_ordine .= 'Recuperato il tutto ti verrà trasmessa una e-mail per procedere con il pagamento.<br>';
		$messaggio_conferma_ordine .= 'Conclusa la procedura di acqusto un sistema automatico ti invierà quanto richiesto.<br><br>Grazie per aver scelto il mio servizio.';
		$messaggio_conferma_ordine .= '<br><br><b>Mozzino</b> / Conferma ordini<br>Recupero documenti catastali<br><a href="https://www.mozzino.it/">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it">Pagina facebook</a></p>';
		
		$header = "From: Mozzino / Conferma ordini <conferma-ordini@mozzino.it>\r\n";		
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-Type: text/html; charset=UTF-8\r\n";
		
		$destinatario = $email_cliente;
		
		mail($destinatario, $oggetto_email, $messaggio_conferma_ordine, $header);
		
		header('location: https://www.mozzino.it/acquista/ordine-confermato');
	}
?>