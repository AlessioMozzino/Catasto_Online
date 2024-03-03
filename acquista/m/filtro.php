<?php
	/* Ridirezione per tipologia e quantità documenti multipli */
	if(isset($_POST['filtra-m-documenti-multipli'])) {
		/* Tipologia documento */
		$tipologia_documento = $_POST['tipologia-documenti'];
		/* Numero di documenti */
		$numero_documenti = $_POST['numero-documenti'];
		/* Stesso / Identico comune ?? */
		$stesso_identico_comune = $_POST['form-acquisto-radio-stesso-diverso-comune'];
		
		/* Controllo validità ricorsivo */
		if($tipologia_documento === 'PLN' || $tipologia_documento === 'VIO' || $tipologia_documento === 'VIS' || $tipologia_documento === 'MAP') {
			/* Tipologia documento valida */
			if($numero_documenti === '2' || $numero_documenti === '3') {
				/* Numero di documenti valido */
				/* Fase di ridirezione */
				if($tipologia_documento === 'PLN' && $numero_documenti === '2' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/due/sc/planimetrie-catastali');
				} elseif($tipologia_documento === 'PLN' && $numero_documenti === '2' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/due/dc/planimetrie-catastali');
				} elseif($tipologia_documento === 'PLN' && $numero_documenti === '3' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/tre/sc/planimetrie-catastali');
				} elseif($tipologia_documento === 'PLN' && $numero_documenti === '3' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/tre/dc/planimetrie-catastali');
				} elseif($tipologia_documento === 'VIO' && $numero_documenti === '2' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/due/sc/visure-ordinarie');
				} elseif($tipologia_documento === 'VIO' && $numero_documenti === '2' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/due/dc/visure-ordinarie');
				} elseif($tipologia_documento === 'VIO' && $numero_documenti === '3' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/tre/sc/visure-ordinarie');
				} elseif($tipologia_documento === 'VIO' && $numero_documenti === '3' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/tre/dc/visure-ordinarie');
				} elseif($tipologia_documento === 'VIS' && $numero_documenti === '2' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/due/sc/visure-storiche');
				} elseif($tipologia_documento === 'VIS' && $numero_documenti === '2' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/due/dc/visure-storiche');
				} elseif($tipologia_documento === 'VIS' && $numero_documenti === '3' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/tre/sc/visure-storiche');
				} elseif($tipologia_documento === 'VIS' && $numero_documenti === '3' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/tre/dc/visure-storiche');
				} elseif($tipologia_documento === 'MAP' && $numero_documenti === '2' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/due/sc/estratti-mappa');
				} elseif($tipologia_documento === 'MAP' && $numero_documenti === '2' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/due/dc/estratti-mappa');
				} elseif($tipologia_documento === 'MAP' && $numero_documenti === '3' && $stesso_identico_comune === 's') {
					header('location: https://www.mozzino.it/acquista/m/tre/sc/estratti-mappa');
				} elseif($tipologia_documento === 'MAP' && $numero_documenti === '3' && $stesso_identico_comune === 'n') {
					header('location: https://www.mozzino.it/acquista/m/tre/dc/estratti-mappa');
				}
			}
		}		
	}
?>