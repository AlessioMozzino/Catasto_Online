<?php
    /* Inclusione file di connessione al database */
    require('./../db/conn.php');
    
    /* Inclusione librerie per PHPMailer */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require('phpmailer/vendor/autoload.php');
    
    /* Funzione per la generazione del token (nel caso di pagamento parziale) */
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
	
	/* Riferimento temporale */
	$timezone = +1;
	
	/* Percorso documenti catastali */
	$percorso_documenti_catastali = './../ordini/catasto/';
	
	/* Estensione PDF */
	$estensione_pdf = '.pdf';
	
	/* Anno in corso */
	$anno_in_corso = gmdate("Y", time() + 3600 * ($timezone));
	
	/* Indirizzi e-mail e nomi utente */
	/* Ordini */
	$indirizzo_ordini = 'ordini@mozzino.it';
	$nome_utente_ordini = 'Mozzino / Ordini';
	/* Ragioneria */
	$indirizzo_ragioneria = 'ragioneria@mozzino.it';
	$nome_utente_ragioneria = 'Mozzino / Ragioneria';

    if($_POST) {
        $req = "cmd=" . urlencode("_notify-validate");
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://ipnpb.paypal.com/cgi-bin/webscr");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("host: www.paypal.com"));
        $res = curl_exec($ch);
        curl_close($ch);
        
        if (strcmp ($res, "VERIFIED") == 0) {
            /* Pagamento verificato */
            /* Recupero valori di ritorno dal server PayPal */
            /* ID transazione */
            $id_transazione = $_POST['txn_id'];
            /* Importo della transazione */
            $importo_transazione = $_POST['mc_gross'];
            /* Data della transazione (variabile non recuperata dal server PayPal) */			
			$data_transazione = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));            
            /* ID ordine */
            $id_ordine = $_POST['custom'];
            
            /* Procedura di controllo esistenza ID ordine nel database */
            $query_controllo_id_ordine = "SELECT COUNT(*) AS controllo_id_ordine FROM tabella_ordini WHERE ord_id = '$id_ordine'";
            $record_controllo_id_ordine = $query_connection->query($query_controllo_id_ordine);
            $campo_controllo_id_ordine = $record_controllo_id_ordine->fetch_assoc();
            $controllo_id_ordine = $campo_controllo_id_ordine['controllo_id_ordine'];
            
            /* Verifica */
            if($controllo_id_ordine >= 1) {
                /* Controllo eseguito con successo: ID ordine verificato */
                /* Procedura di recupero elementi per evasione ordine */
                $query_recupero_elementi_ordine = "SELECT * FROM tabella_ordini WHERE ord_id = '$id_ordine'";
                $record_recupero_elementi_ordine = $query_connection->query($query_recupero_elementi_ordine);
                $campo_recupero_elementi_ordine = $record_recupero_elementi_ordine->fetch_assoc();
                
                /* Recupero elementi */
                /* Token ordine (per invio file) */
                $token_ordine = $campo_recupero_elementi_ordine['ord_tok'];
                /* ID cliente */
                $id_cliente = $campo_recupero_elementi_ordine['cli_ref'];
				/* Data ordine (ord_arr) */
				$ord_arr = $campo_recupero_elementi_ordine['ord_arr'];
				
				/* Modifica data per causale di fatturazione */
				$ord_arr_modificato = str_replace('-', '/', $ord_arr);
				$ricezione_ordine = str_replace(' ', ' ricevuto alle ', $ord_arr_modificato);
				
                /* Stato ordine */
                $stato_ordine = $campo_recupero_elementi_ordine['ord_stat'];
				/* Prezzo iniziale */
				$prezzo_iniziale = $campo_recupero_elementi_ordine['ord_price'];
                /* Prezzo finale effettivo (controllo) */
                $prezzo_effettivo = $campo_recupero_elementi_ordine['ord_price_eff_finale'];
				/* Tributi catastali */
				$tributi_catastali = $campo_recupero_elementi_ordine['ord_price_tributi_catastali'];
                /* Debito contabile */
                $debito_contabile = $campo_recupero_elementi_ordine['ord_deb_cont'];
                
                /* Procedura di controllo esistenza ID cliente nel database */
                $query_controllo_id_cliente = "SELECT COUNT(*) AS controllo_id_cliente FROM tabella_clienti WHERE cli_id = '$id_cliente'";
                $record_controllo_id_cliente = $query_connection->query($query_controllo_id_cliente);
                $campo_controllo_id_cliente = $record_controllo_id_cliente->fetch_assoc();
                $controllo_id_cliente = $campo_controllo_id_cliente['controllo_id_cliente'];
                
                /* Verifica */
                if($controllo_id_cliente >= 1) {
                    /* Controllo eseguito con successo: ID cliente verificato */
                    /* Procedura di recupero dati cliente */
                    $query_recupero_dati_cliente = "SELECT * FROM tabella_clienti WHERE cli_id = '$id_cliente'";
                    $record_recupero_dati_cliente = $query_connection->query($query_recupero_dati_cliente);
                    $campo_recupero_dati_cliente = $record_recupero_dati_cliente->fetch_assoc();
                    
                    /* Recupero dati */
                    /* Nome cliente */
                    $nome_cliente = $campo_recupero_dati_cliente['cli_name'];
                    /* E-mail cliente */
                    $email_cliente = $campo_recupero_dati_cliente['cli_email'];
                    /* Tipologia cliente */
                    $tipologia_cliente = $campo_recupero_dati_cliente['cli_tip'];
                    
                    /* Procedura di controllo dello stato dell'ordine */
                    if($stato_ordine === 'Richiesto pagamento totale') {
                        /* Richiesto pagamento totale: totale pagato dal cliente = prezzo effettivo ordine */
                        /* Verifica */
                        if($importo_transazione == $prezzo_effettivo) {
                            /* Controllo eseguito con successo: totale pagato dal cliente = prezzo effettivo ordine */
                            /* Preliminari per inserimento transazione nel database */
							/* Recupero order_count attuale */
							$query_recupero_order_count_att = "SELECT COUNT(*) AS order_count_att FROM tabella_transazioni WHERE txn_ord_ref = '$id_ordine'";
							$record_recupero_order_count_att = $query_connection->query($query_recupero_order_count_att);
							$campo_recupero_order_count_att = $record_recupero_order_count_att->fetch_assoc();
							$order_count_att = $campo_recupero_order_count_att['order_count_att'];
							
							/* Calcolo order_count successivo (nuova transzione) */
							$order_count_new_txn = $order_count_att + 1;
							
							/* Causale di fatturazione */
							$causale_fatturazione = 'Saldo ordine n. ' . $id_ordine . ' del ' . $ricezione_ordine . ' -- Recupero documentazione catastale';
							
							/* Inserimento transazione nel database */
                            $query_inserimento_transazione = "INSERT INTO tabella_transazioni (txn_id, txn_id_pp, txn_oc, txn_ord_ref, txn_date, txn_price, txn_tc, txn_dcpo, txn_desc, txn_stat) VALUES ('', '$id_transazione', '$order_count_new_txn', '$id_ordine', '$data_transazione', '$importo_transazione', '$tributi_catastali', '', '$causale_fatturazione', '0')";
                            $record_inserimento_transazione = $query_connection->query($query_inserimento_transazione); 
                            
                            /* Trasmissione comunicazine al cliente dell'avvennuta transazione */
                            /* Oggetto e-mail */
						    $oggetto_email = "Il pagamento per l'ordine numero " . $id_ordine . " è stato ricevuto";
							
						    /* Composizione messaggio */
						    /* Preliminare TITOLO */
					    	if($tipologia_cliente === 'PF' || $tipologia_cliente === 'PF-IVA') {
							    $titolo = 'Gentile ';
						    } elseif($tipologia_cliente === 'PG') {
							    $titolo = 'Spettabile ';
						    }
						    
						    /* Calcolo debito contabile residuo */
						    $debito_contabile_residuo = $debito_contabile - $importo_transazione;
							
						    /* Corpo messaggio */
						    $messaggio_conferma_transazione = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $titolo . '<b>' . $nome_cliente . '</b>,<br>';
						    $messaggio_conferma_transazione .= 'grazie per aver effettuato il pagamento. Di seguito riporto i dettagli della transazione:<br>';
						    $messaggio_conferma_transazione .= 'ID transazione → <b>' . $id_transazione . '</b><br>';
							$messaggio_conferma_transazione .= 'Prezzo iniziale → <b>' . number_format("$prezzo_iniziale", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Prezzo finale (effettivo) → <b>' . number_format("$prezzo_effettivo", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Tributi catastali (inclusi) → <b>' . number_format("$tributi_catastali", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Importo pagato → <b>' . number_format("$importo_transazione", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Debito contabile (residuo) → <b>' . number_format("$debito_contabile_residuo", 2, ",", ".") . '</b><br><br>';
						    $messaggio_conferma_transazione .= 'A breve una procedura automatica ti invierà quanto richiesto.<br><br>';
						    $messaggio_conferma_transazione .= 'Grazie per aver scelto il mio servizio.<br><br><b>Mozzino</b> / Ragioneria<br>Recupero documenti catastali<br>';
						    $messaggio_conferma_transazione .= '<a href="https://www.mozzino.it">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it/">Pagina facebook</a></p>';
						
						    $destinatario = $email_cliente;
						
						    $header = "From: Mozzino / Ragioneria <ragioneria@mozzino.it>\r\n";
						    $header .= "MIME-Version: 1.0\r\n";
					    	$header .= "Content-Type: text/html; charset=UTF-8\r\n";					    	
					    	
							/* Invio conferma avvenuto pagamento */							
					    	mail($destinatario, $oggetto_email, $messaggio_conferma_transazione, $header);
							
							/* Trascrizione evento in cronologia ordine */
							/* Determinazione numero sequenziale iniziale */
							$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
							$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
							$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
							$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
							/* Determinazione numero sequenziale successivo (nuovo inserimento) */
							$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
											
							/* Stato ordine */
							$aggiornamento_stato_ordine = 'Ricezione pagamento totale';
											
							/* Note per cronologia */
							$note_cronologia_ordine = 'ID (PayPal): ' . $id_transazione;
						
							/* Procedura di inserimento */
							$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$data_transazione', '$numero_sequenza_successivo', '$aggiornamento_stato_ordine', '$note_cronologia_ordine')";
							$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);							
                            
                            /* Preparazione per invio documenti catastali ed aggiornamento database */
                            $documento_catastale = $percorso_documenti_catastali . $id_ordine . '-' . $anno_in_corso . '/' . $token_ordine . $estensione_pdf;
                            
                            $evasione_ordine = new PHPmailer();
                            $evasione_ordine->IsSMTP();
                            $evasione_ordine->Host = 'mail.mozzino.it';
                            $evasione_ordine->SMTPAuth = true;
                            $evasione_ordine->IsHTML(true);
                            $evasione_ordine->Username = "ordini@mozzino.it";
                            $evasione_ordine->Password = "1qPBL&xb#Xg4%O6";
                            $evasione_ordine->addAttachment($documento_catastale);
                            $evasione_ordine->setFrom($indirizzo_ordini, $nome_utente_ordini);
                            $evasione_ordine->SMTPSecure = 'tls'; 
                            $evasione_ordine->Port = 587;
                            $evasione_ordine->addAddress($email_cliente, $nome_cliente);
                            $evasione_ordine->Subject = 'Evasione ordine numero ' . $id_ordine;
                            
                            $messaggio_evasione_ordine = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $titolo . '<b>' . $nome_cliente . '</b>,<br>';
                            $messaggio_evasione_ordine .= 'in allegato trovi i documenti catastali da te richiesti. Spero soddisfino le tue necessità.<br>';
                            $messaggio_evasione_ordine .= 'Se ciò che hai richiesto non corrisponde a quanto inviato contattami rispondendo direttamente a questa e-mail.<br>';
                            $messaggio_evasione_ordine .= 'Insieme troveremo una soluzione nel più breve tempo possibile.<br><br>';
                            $messaggio_evasione_ordine .= 'Grazie per aver scelto il mio servizio.<br><br><b>Mozzino</b> / Ordini<br>Recupero documenti catastali<br>';
                            $messaggio_evasione_ordine .= '<a href="https://www.mozzino.it">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it/">Pagina facebook</a></p>';
                            
                            $evasione_ordine->Body = $messaggio_evasione_ordine;
                            
                            /* Controllo ed invio e-mail al cliente (ed a me per conferma) */
                            if(!$evasione_ordine->Send()) {
                                mail('ordini@mozzino.it', 'Errore evasione ordine numero ' . $id_ordine, 'Errore in fase di evasione. Controllare.');
                            } else {
                                mail('ordini@mozzino.it', 'Evasione ordine numero ' . $id_ordine . ' completata con successo', 'Ordine evaso con successo.');
								
								/* Aggiornamento elementi ordine nel database (stato, debito contabile) */
								$nuovo_stato_ordine = 'Evaso, da fatturare';
								$nuovo_debito_contabile = $debito_contabile - $importo_transazione;
                            
								$query_aggiornamento_elementi_ordine = "UPDATE tabella_ordini SET ord_stat = '$nuovo_stato_ordine', ord_deb_cont = '$nuovo_debito_contabile' WHERE ord_id = '$id_ordine'";
								$record_aggiornamento_elementi_ordine = $query_connection->query($query_aggiornamento_elementi_ordine);
                        
								/* Aggiornamento debito contabile progressivo ordine nella tabella transazioni */
								$query_aggiornamento_debito_contabile_ordine = "UDPATE tabella_transazioni SET txn_dcpo = '$nuovo_debito_contabile' WHERE txn_id_pp = '$id_transazione'";
								$record_aggiornamento_debito_contabile_ordine = $query_connection->query($query_aggiornamento_debito_contabile_ordine);
								
								/* Trascrizione evento in cronologia ordine */
								/* Determinazione numero sequenziale iniziale */
								$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
								$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
								$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
								$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
								/* Determinazione numero sequenziale successivo (nuovo inserimento) */
								$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
											
								/* Stato ordine */
								$aggiornamento_stato_ordine = 'Evasione ordine';								
						
								/* Procedura di inserimento */
								$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$data_transazione', '$numero_sequenza_successivo', '$aggiornamento_stato_ordine', '')";
								$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);	
                            }
						}
                    } elseif($stato_ordine === 'Richiesto pagamento parziale') {
                        /* Richiesto pagamento parziale: totale pagato dal cliente = prezzo effettivo ordine */
                        /* Verifica */
                        if($importo_transazione == $prezzo_effettivo) {
                            /* Controllo eseguito con successo: totale pagato dal cliente = prezzo effettivo ordine */
                            /* Preliminari per inserimento transazione nel database */
							/* Recupero order_count attuale */
							$query_recupero_order_count_att = "SELECT COUNT(*) AS order_count_att FROM tabella_transazioni WHERE txn_ord_ref = '$id_ordine'";
							$record_recupero_order_count_att = $query_connection->query($query_recupero_order_count_att);
							$campo_recupero_order_count_att = $record_recupero_order_count_att->fetch_assoc();
							$order_count_att = $campo_recupero_order_count_att['order_count_att'];
							
							/* Calcolo order_count successivo (nuova transzione) */
							$order_count_new_txn = $order_count_att + 1;
							
							/* Causale di fatturazione */
							$causale_fatturazione = 'Acconto ordine n. ' . $id_ordine . ' del ' . $ricezione_ordine . ' -- Recupero documentazione catastale';
							
							/* Inserimento transazione nel database */
                            $query_inserimento_transazione = "INSERT INTO tabella_transazioni (txn_id, txn_id_pp, txn_oc, txn_ord_ref, txn_date, txn_price, txn_tc, txn_dcpo, txn_desc, txn_stat) VALUES ('', '$id_transazione', '$order_count_new_txn', '$id_ordine', '$data_transazione', '$importo_transazione', '$tributi_catastali', '', '$causale_fatturazione', '0')";
                            $record_inserimento_transazione = $query_connection->query($query_inserimento_transazione); 
                            
                            /* Trasmissione comunicazine al cliente dell'avvennuta transazione */
                            /* Oggetto e-mail */
						    $oggetto_email = "Il pagamento parziale per l'ordine numero " . $id_ordine . " è stato ricevuto";
							
						    /* Composizione messaggio */
						    /* Preliminare TITOLO */
					    	if($tipologia_cliente === 'PF' || $tipologia_cliente === 'PF-IVA') {
							    $titolo = 'Gentile ';
						    } elseif($tipologia_cliente === 'PG') {
							    $titolo = 'Spettabile ';
						    }
						    
						    /* Calcolo debito contabile residuo */
						    $debito_contabile_residuo = $debito_contabile - $importo_transazione;
							
						    /* Corpo messaggio */
						    $messaggio_conferma_transazione = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $titolo . '<b>' . $nome_cliente . '</b>,<br>';
						    $messaggio_conferma_transazione .= 'grazie per aver effettuato il pagamento. Di seguito riporto i dettagli della transazione:<br>';
						    $messaggio_conferma_transazione .= 'ID transazione → <b>' . $id_transazione . '</b><br>';
							$messaggio_conferma_transazione .= 'Prezzo iniziale → <b>' . number_format("$prezzo_iniziale", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Prezzo finale (effettivo) → <b>' . number_format("$prezzo_effettivo", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Tributi catastali (inclusi) → <b>' . number_format("$tributi_catastali", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Importo pagato → <b>' . number_format("$importo_transazione", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Debito contabile (residuo) → <b>' . number_format("$debito_contabile_residuo", 2, ",", ".") . '</b><br><br>';
						    $messaggio_conferma_transazione .= 'A breve una procedura automatica ti invierà quanto richiesto.<br><br>';
						    $messaggio_conferma_transazione .= 'Grazie per aver scelto il mio servizio.<br><br><b>Mozzino</b> / Ragioneria<br>Recupero documenti catastali<br>';
						    $messaggio_conferma_transazione .= '<a href="https://www.mozzino.it">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it/">Pagina facebook</a></p>';
						
						    $destinatario = $email_cliente;
						
						    $header = "From: Mozzino / Ragioneria <ragioneria@mozzino.it>\r\n";
						    $header .= "MIME-Version: 1.0\r\n";
					    	$header .= "Content-Type: text/html; charset=UTF-8\r\n";					    	
					    	
							/* Invio conferma avvenuto pagamento */
					    	mail($destinatario, $oggetto_email, $messaggio_conferma_transazione, $header);
							
							/* Trascrizione evento in cronologia ordine */
							/* Determinazione numero sequenziale iniziale */
							$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
							$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
							$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
							$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
							/* Determinazione numero sequenziale successivo (nuovo inserimento) */
							$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
											
							/* Stato ordine */
							$aggiornamento_stato_ordine = 'Ricezione pagamento parziale';
											
							/* Note per cronologia */
							$note_cronologia_ordine = 'ID (PayPal): ' . $id_transazione;
						
							/* Procedura di inserimento */
							$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$data_transazione', '$numero_sequenza_successivo', '$aggiornamento_stato_ordine', '$note_cronologia_ordine')";
							$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);		
                            
                            /* Preparazione per invio documenti catastali ed aggiornamento database */
                            $documento_catastale = $percorso_documenti_catastali . $id_ordine . '-' . $anno_in_corso . '/' . $token_ordine . $estensione_pdf;
                            
                            $evasione_ordine = new PHPmailer();
                            $evasione_ordine->IsSMTP();
                            $evasione_ordine->Host = 'mail.mozzino.it';
                            $evasione_ordine->SMTPAuth = true;
                            $evasione_ordine->IsHTML(true);
                            $evasione_ordine->Username = "ordini@mozzino.it";
                            $evasione_ordine->Password = "1qPBL&xb#Xg4%O6";
                            $evasione_ordine->addAttachment($documento_catastale);
                            $evasione_ordine->setFrom($indirizzo_ordini, $nome_utente_ordini);
                            $evasione_ordine->SMTPSecure = 'tls'; 
                            $evasione_ordine->Port = 587;
                            $evasione_ordine->addAddress($email_cliente, $nome_cliente);
                            $evasione_ordine->Subject = 'Evasione parziale ordine numero ' . $id_ordine;
                            
                            $messaggio_evasione_ordine = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $titolo . '<b>' . $nome_cliente . '</b>,<br>';
                            $messaggio_evasione_ordine .= 'in allegato trovi i documenti catastali da te richiesti. Spero soddisfino le tue necessità.<br>';
                            $messaggio_evasione_ordine .= 'Se ciò che hai richiesto non corrisponde a quanto inviato contattami rispondendo direttamente a questa e-mail.<br>';
                            $messaggio_evasione_ordine .= 'Insieme troveremo una soluzione nel più breve tempo possibile.<br><br>';
                            $messaggio_evasione_ordine .= 'Grazie per aver scelto il mio servizio.<br><br><b>Mozzino</b> / Ordini<br>Recupero documenti catastali<br>';
                            $messaggio_evasione_ordine .= '<a href="https://www.mozzino.it">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it/">Pagina facebook</a></p>';
                            
                            $evasione_ordine->Body = $messaggio_evasione_ordine;
                            
                            /* Controllo ed invio e-mail al cliente (ed a me per conferma) */
                            if(!$evasione_ordine->Send()) {
                                mail('ordini@mozzino.it', 'Errore evasione ordine numero ' . $id_ordine, 'Errore in fase di evasione. Controllare.');
                            } else {
                                mail('ordini@mozzino.it', 'Evasione ordine numero ' . $id_ordine . ' completata con successo', 'Ordine evaso con successo.');
								
								/* Aggiornamento elementi ordine nel database (stato, debito contabile) */
								$nuovo_token = getToken($nChar);
								$nuovo_stato_ordine = 'Da evadere parzialmente';
								$nuovo_debito_contabile = $debito_contabile - $importo_transazione;
                            
								$query_aggiornamento_elementi_ordine = "UPDATE tabella_ordini SET ord_tok = '$nuovo_token', ord_stat = '$nuovo_stato_ordine', ord_deb_cont = '$nuovo_debito_contabile' WHERE ord_id = '$id_ordine'";
								$record_aggiornamento_elementi_ordine = $query_connection->query($query_aggiornamento_elementi_ordine);
                        
								/* Aggiornamento debito contabile progressivo ordine nella tabella transazioni */
								$query_aggiornamento_debito_contabile_ordine = "UDPATE tabella_transazioni SET txn_dcpo = '$nuovo_debito_contabile' WHERE txn_id_pp = '$id_transazione'";
								$record_aggiornamento_debito_contabile_ordine = $query_connection->query($query_aggiornamento_debito_contabile_ordine);
								
								/* Trascrizione evento in cronologia ordine */
								/* Determinazione numero sequenziale iniziale */
								$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
								$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
								$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
								$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
								/* Determinazione numero sequenziale successivo (nuovo inserimento) */
								$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
											
								/* Stato ordine */
								$aggiornamento_stato_ordine = 'Evasione ordine';								
						
								/* Procedura di inserimento */
								$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$data_transazione', '$numero_sequenza_successivo', '$aggiornamento_stato_ordine', '')";
								$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);	
                            }
						}
                    } elseif($stato_ordine === 'Richiesto pagamento da debito contabile') {
                        /* Richiesto pagamento parziale: totale pagato dal cliente = debito contabile */
                        /* Verifica */
                        if($importo_transazione == $debito_contabile) {
                            /* Controllo eseguito con successo: totale pagato dal cliente = debito contabile */
                            /* Preliminari per inserimento transazione nel database */
							/* Recupero order_count attuale */
							$query_recupero_order_count_att = "SELECT COUNT(*) AS order_count_att FROM tabella_transazioni WHERE txn_ord_ref = '$id_ordine'";
							$record_recupero_order_count_att = $query_connection->query($query_recupero_order_count_att);
							$campo_recupero_order_count_att = $record_recupero_order_count_att->fetch_assoc();
							$order_count_att = $campo_recupero_order_count_att['order_count_att'];
							
							/* Calcolo order_count successivo (nuova transzione) */
							$order_count_new_txn = $order_count_att + 1;
							
							/* Causale di fatturazione */
							$causale_fatturazione = 'Saldo ordine n. ' . $id_ordine . ' del ' . $ricezione_ordine . ' -- Recupero documentazione catastale';
							
							/* Modifica tributi catastali */
							$tributi_catastali = 0.00;
							
							/* Inserimento transazione nel database */
                            $query_inserimento_transazione = "INSERT INTO tabella_transazioni (txn_id, txn_id_pp, txn_oc, txn_ord_ref, txn_date, txn_price, txn_tc, txn_dcpo, txn_desc, txn_stat) VALUES ('', '$id_transazione', '$order_count_new_txn', '$id_ordine', '$data_transazione', '$importo_transazione', '$tributi_catastali', '', '$causale_fatturazione', '0')";
                            $record_inserimento_transazione = $query_connection->query($query_inserimento_transazione); 
                            
                            /* Trasmissione comunicazine al cliente dell'avvennuta transazione */
                            /* Oggetto e-mail */
						    $oggetto_email = "Il pagamento finale per l'ordine numero " . $id_ordine . " è stato ricevuto";
							
						    /* Composizione messaggio */
						    /* Preliminare TITOLO */
					    	if($tipologia_cliente === 'PF' || $tipologia_cliente === 'PF-IVA') {
							    $titolo = 'Gentile ';
						    } elseif($tipologia_cliente === 'PG') {
							    $titolo = 'Spettabile ';
						    }
						    
						    /* Calcolo debito contabile residuo */
						    $debito_contabile_residuo = $debito_contabile - $importo_transazione;
							
						    /* Corpo messaggio */
						    $messaggio_conferma_transazione = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $titolo . '<b>' . $nome_cliente . '</b>,<br>';
						    $messaggio_conferma_transazione .= 'grazie per aver effettuato il pagamento. Di seguito riporto i dettagli della transazione:<br>';
						    $messaggio_conferma_transazione .= 'ID transazione → <b>' . $id_transazione . '</b><br>';
							$messaggio_conferma_transazione .= 'Prezzo iniziale → <b>' . number_format("$prezzo_iniziale", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Prezzo finale (effettivo) → <b>' . number_format("$prezzo_effettivo", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Tributi catastali (inclusi) → <b>' . number_format("$tributi_catastali", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Importo pagato → <b>' . number_format("$importo_transazione", 2, ",", ".") . '</b><br>';
							$messaggio_conferma_transazione .= 'Debito contabile (residuo) → <b>' . number_format("$debito_contabile_residuo", 2, ",", ".") . '</b><br><br>';
						    $messaggio_conferma_transazione .= 'A breve una procedura automatica ti invierà quanto richiesto.<br><br>';
						    $messaggio_conferma_transazione .= 'Grazie per aver scelto il mio servizio.<br><br><b>Mozzino</b> / Ragioneria<br>Recupero documenti catastali<br>';
						    $messaggio_conferma_transazione .= '<a href="https://www.mozzino.it">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it/">Pagina facebook</a></p>';
						
						    $destinatario = $email_cliente;
						
						    $header = "From: Mozzino / Ragioneria <ragioneria@mozzino.it>\r\n";
						    $header .= "MIME-Version: 1.0\r\n";
					    	$header .= "Content-Type: text/html; charset=UTF-8\r\n";					    	
					    	
							/* Invio conferma avvenuto pagamento */
					    	mail($destinatario, $oggetto_email, $messaggio_conferma_transazione, $header);
							
							/* Trascrizione evento in cronologia ordine */
							/* Determinazione numero sequenziale iniziale */
							$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
							$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
							$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
							$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
							/* Determinazione numero sequenziale successivo (nuovo inserimento) */
							$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
											
							/* Stato ordine */
							$aggiornamento_stato_ordine = 'Ricezione pagamento da debito contabile';
											
							/* Note per cronologia */
							$note_cronologia_ordine = 'ID (PayPal): ' . $id_transazione;
						
							/* Procedura di inserimento */
							$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$data_transazione', '$numero_sequenza_successivo', '$aggiornamento_stato_ordine', '$note_cronologia_ordine')";
							$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);		
                            
                            /* Preparazione per invio documenti catastali ed aggiornamento database */
                            $documento_catastale = $percorso_documenti_catastali . $id_ordine . '-' . $anno_in_corso . '/' . $token_ordine . $estensione_pdf;
                            
                            $evasione_ordine = new PHPmailer();
                            $evasione_ordine->IsSMTP();
                            $evasione_ordine->Host = 'mail.mozzino.it';
                            $evasione_ordine->SMTPAuth = true;
                            $evasione_ordine->IsHTML(true);
                            $evasione_ordine->Username = "ordini@mozzino.it";
                            $evasione_ordine->Password = "1qPBL&xb#Xg4%O6";
                            $evasione_ordine->addAttachment($documento_catastale);
                            $evasione_ordine->setFrom($indirizzo_ordini, $nome_utente_ordini);
                            $evasione_ordine->SMTPSecure = 'tls'; 
                            $evasione_ordine->Port = 587;
                            $evasione_ordine->addAddress($email_cliente, $nome_cliente);
                            $evasione_ordine->Subject = 'Evasione finale ordine numero ' . $id_ordine;
                            
                            $messaggio_evasione_ordine = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $titolo . '<b>' . $nome_cliente . '</b>,<br>';
                            $messaggio_evasione_ordine .= 'in allegato trovi i documenti catastali da te richiesti. Spero soddisfino le tue necessità.<br>';
                            $messaggio_evasione_ordine .= 'Se ciò che hai richiesto non corrisponde a quanto inviato contattami rispondendo direttamente a questa e-mail.<br>';
                            $messaggio_evasione_ordine .= 'Insieme troveremo una soluzione nel più breve tempo possibile.<br><br>';
                            $messaggio_evasione_ordine .= 'Grazie per aver scelto il mio servizio.<br><br><b>Mozzino</b> / Ordini<br>Recupero documenti catastali<br>';
                            $messaggio_evasione_ordine .= '<a href="https://www.mozzino.it">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it/">Pagina facebook</a></p>';
                            
                            $evasione_ordine->Body = $messaggio_evasione_ordine;
                            
                            /* Controllo ed invio e-mail al cliente (ed a me per conferma) */
                            if(!$evasione_ordine->Send()) {
                                mail('ordini@mozzino.it', 'Errore evasione ordine numero ' . $id_ordine, 'Errore in fase di evasione. Controllare.');
                            } else {
                                mail('ordini@mozzino.it', 'Evasione ordine numero ' . $id_ordine . ' completata con successo', 'Ordine evaso con successo.');
								
								/* Aggiornamento elementi ordine nel database (stato, debito contabile) */
								$nuovo_stato_ordine = 'Evaso, da fatturare';
								$nuovo_debito_contabile = $debito_contabile - $importo_transazione;
                            
								$query_aggiornamento_elementi_ordine = "UPDATE tabella_ordini SET ord_stat = '$nuovo_stato_ordine', ord_deb_cont = '$nuovo_debito_contabile' WHERE ord_id = '$id_ordine'";
								$record_aggiornamento_elementi_ordine = $query_connection->query($query_aggiornamento_elementi_ordine);
                        
								/* Aggiornamento debito contabile progressivo ordine nella tabella transazioni */
								$query_aggiornamento_debito_contabile_ordine = "UDPATE tabella_transazioni SET txn_dcpo = '$nuovo_debito_contabile' WHERE txn_id_pp = '$id_transazione'";
								$record_aggiornamento_debito_contabile_ordine = $query_connection->query($query_aggiornamento_debito_contabile_ordine);
								
								/* Trascrizione evento in cronologia ordine */
								/* Determinazione numero sequenziale iniziale */
								$query_recupero_numero_sequenziale_cronologia = "SELECT COUNT(*) AS recupero_numero_sequenziale_cronologia FROM tabella_cronologia_ordini WHERE ord_cro_oid = '$id_ordine'";
								$record_recupero_numero_sequenziale_cronologia = $query_connection->query($query_recupero_numero_sequenziale_cronologia);
								$campo_recupero_numero_sequenziale_cronologia = $record_recupero_numero_sequenziale_cronologia->fetch_assoc();
								$numero_sequenza_iniziale = $campo_recupero_numero_sequenziale_cronologia['recupero_numero_sequenziale_cronologia'];
		
								/* Determinazione numero sequenziale successivo (nuovo inserimento) */
								$numero_sequenza_successivo = $numero_sequenza_iniziale + 1;
											
								/* Stato ordine */
								$aggiornamento_stato_ordine = 'Evasione ordine';								
						
								/* Procedura di inserimento */
								$query_inserimento_cronologia_ordine = "INSERT INTO tabella_cronologia_ordini (ord_cro_id, ord_cro_oid, ord_cro_date, ord_cro_seq, ord_cro_stat, ord_cro_notes) VALUES ('', '$id_ordine', '$data_transazione', '$numero_sequenza_successivo', '$aggiornamento_stato_ordine', '')";
								$record_inserimento_cronologia_ordine = $query_connection->query($query_inserimento_cronologia_ordine);	
                            }
						}
                    }
                }
            }            
        } elseif (strcmp ($res, "INVALID") == 0) {
            /* Pagamento non valido */
            
            /* Recupero valori di ritorno dal server PayPal */
            /* ID transazione */
            $id_transazione = $_POST['txn_id'];
            /* Importo della transazione */
            $importo_transazione = $_POST['mc_gross'];
            /* Data della transazione (variabile non recuperata dal server PayPal) */			
			$data_transazione = gmdate("Y-m-d H:i:s", time() + 3600 * ($timezone));            
            /* ID ordine */
            $id_ordine = $_POST['custom'];
            
			/* Invio comunicazione a ME */
			mail('ragioneria@mozzino.it', 'Errore pagamento ordine numero ' . $id_ordine, 'Errore in fase di pagamento. Controllare.');
        }
    }    
?>