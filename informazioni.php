<?php
	require('./db/conn.php');
	include('./acquista/include/importi.php');
?>

<!DOCTYPE html>
<html>
  <head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133909830-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-133909830-1');
</script>
<link rel="apple-touch-icon" sizes="57x57" href="https://www.mozzino.it/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://www.mozzino.it/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://www.mozzino.it/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://www.mozzino.it/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://www.mozzino.it/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://www.mozzino.it/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://www.mozzino.it/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://www.mozzino.it/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://www.mozzino.it/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="https://www.mozzino.it/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://www.mozzino.it/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://www.mozzino.it/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://www.mozzino.it/favicon/favicon-16x16.png">
<link rel="manifest" href="https://www.mozzino.it/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="https://www.mozzino.it/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="documenti catastali, catasto, planimetria catastale, visura planimetrica, visura per immobile, estratto di mappa, visura storica, sister, agenzia delle entrate, visura catastale online, planimetria catastale online, mappa catastale, mappa, agenzia del territorio">
    <meta name="description" content="Potrai richiedere i seguenti documenti: planimetrie catastali, visure catastali (ordinarie o storiche) estratti di mappa. Decidi tu il metodo di pagamento che preferisci: PayPal (carta di pagamento) oppure bonifico bancario.">
	<title>Scopri di più sul servizio di recupero dei documenti catastali: funzionamento, prezzi, modalità di pagamento</title>
    <!-- Fogli di stile bootstrap -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap/bootstrap.min.css">
    <!-- Fogli di stile personali -->
    <link rel="stylesheet" type="text/css" href="./css/personal/personal.css">
    <!-- Integrazione Google Fonts -->
    <!-- Logo -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <!-- Menu orizzontale header -->
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <!-- Testo home page main -->
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <!-- Testo prezzi servizi -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500&display=swap" rel="stylesheet">
	<!-- Banner IUBENDA -->
	<script type="text/javascript">
var _iub = _iub || [];
_iub.csConfiguration = {"cookiePolicyInOtherWindow":true,"askConsentAtCookiePolicyUpdate":true,"whitelabel":false,"lang":"it","siteId":1552736,"cookiePolicyId":56591471, "banner":{ "slideDown":false,"acceptButtonDisplay":true,"customizeButtonDisplay":true,"acceptButtonColor":"#707b7c","acceptButtonCaptionColor":"white","customizeButtonColor":"#212121","customizeButtonCaptionColor":"white","position":"float-top-center","textColor":"#17202a","backgroundColor":"#d6dbdf","content":"<div id=\"iubenda-cs-title\">Informativa</div><div id=\"iubenda-cs-paragraph\">Io ed alcuni partner selezionati utilizziamo cookie o tecnologie simili come specificato nella <a href=\"/privacy-policy/56591471/cookie-policy?an=no&s_ck=false&newmarkup=yes\" class=\"iubenda-cs-cookie-policy-lnk\">cookie policy</a>.<br />Puoi acconsentire all’utilizzo di tali tecnologie chiudendo questa informativa, proseguendo la navigazione di questa pagina,  interagendo con un link o un pulsante al di fuori di questa informativa o continuando a navigare in altro modo.</div>" }};
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
	<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>
  </head>
  <body>
    <!-- Inizio header -->
    <header><?php include('./template/header.php'); ?></header>
    <!-- Fine header -->
    <!-- Inizio main -->
    <main>
		<div class="container">
		    <div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-center">
					<h4 class="form-acquista-titolo-settore" id="preventivo"><b>Vuoi scoprire in anticipo quanto spenderai? Fai un preventivo!</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-center">
					<form action="informazioni" method="post">
						<table border="0" style="width: 100%;">
							<thead>
								<tr>
									<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
										<p class="card-body-p-descrizione-servizio">Documento</p>
									</td>
									<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
										<p class="card-body-p-descrizione-servizio">Quantità</p>
									</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
										<p class="card-body-p-descrizione-servizio"><b>Planimetria catastale</b></p>
									</td>
									<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
										<select name="numero-planimetrie" style="width: 50%; border: 0px; border-bottom: 1px solid grey; color: black; font-family: 'Sawarabi Mincho', sans-serif;">
											<option value="0" selected>0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
										<p class="card-body-p-descrizione-servizio"><b>Visura ordinaria</b></p>
									</td>
									<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
										<select name="numero-visure-ordinarie" style="width: 50%; border: 0px; border-bottom: 1px solid grey; color: black; font-family: 'Sawarabi Mincho', sans-serif;">
											<option value="0" selected>0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
										<p class="card-body-p-descrizione-servizio"><b>Visura storica</b></p>
									</td>
									<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
										<select name="numero-visure-storiche" style="width: 50%; border: 0px; border-bottom: 1px solid grey; color: black; font-family: 'Sawarabi Mincho', sans-serif;">
											<option value="0" selected>0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
										<p class="card-body-p-descrizione-servizio"><b>Estratto di mappa</b></p>
									</td>
									<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
										<select name="numero-mappe" style="width: 50%; border: 0px; border-bottom: 1px solid grey; color: black; font-family: 'Sawarabi Mincho', sans-serif;">
											<option value="0" selected>0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: center; padding: 10px 15px; vertical-align: top;">
										<input id="form-acquisto-pulsante-ordina-servizio" class="form-control" type="submit" name="richiedi-preventivo" value="Richiedi preventivo" style="width: auto; margin: 20px auto auto auto;">
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align: center; padding: 10px 15px; vertical-align: middle;">
										<h4 class="form-acquista-titolo-settore" id="prezzo-preventivo">
											<?php
												if(isset($_POST['richiedi-preventivo'])) {
													/* Recupero valori */
													$numero_planimetrie = $_POST['numero-planimetrie'];
													$numero_visure_ordinarie = $_POST['numero-visure-ordinarie'];
													$numero_visure_storiche = $_POST['numero-visure-storiche'];
													$numero_mappe = $_POST['numero-mappe'];
													
													/* Calcolo prezzo e tributi catastali */
													$prezzo_preventivo = (float)($numero_planimetrie * $price_pln) + ($numero_visure_ordinarie * $price_vio) + ($numero_visure_storiche * $price_vis) + ($numero_mappe * $price_map);
													
													echo 'EURO <b>' . number_format("$prezzo_preventivo", 2, ",", ".") . '</b>';													
											        
												} else {
													echo 'EURO <b>0,00</b>';
												}
											?>
										</h4>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
			<!-- Inizio titolo homepage -->
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page">
					<h1 class="main-h1-home-page" id="come-funziona">Scopri il funzionamento di questo servizio.</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<p class="card-body-p-descrizione-servizio">
						Sprecare il proprio tempo è la cosa peggiore del mondo: ecco perchè, con questo servizio, hai la possibilità di recuperare un documento catastale senza perdere una giornata intera all'interno di un ufficio. Evita le lunghe attese in coda, e compila un semplice modulo per richiedere ciò di cui hai bisogno. Il documento richiesto ti verrà trasmesso comodamente nella tua casella di posta elettronica. Il tutto ad un prezzo molto vantaggioso.
					</p>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<h4 class="form-acquista-titolo-settore">Domande frequenti</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<div class="accordion">
						<div class="domanda-frequente" style="margin: 10px auto 10px auto;">
							<div class="card-header" id="headingUno">
								<label class="form-acquista-label-input">
									<a class="link-domande-frequenti" data-toggle="collapse" data-target="#collapseUno" aria-expanded="false" aria-controls="collapseUno" style="color: black; text-decoration: none;">Quali documenti posso richiedere?</a>
								</label>      
							</div>
							<div id="collapseUno" class="collapse" aria-labelledby="headingUno" data-parent="#accordion" style="border-bottom: 1px solid lightgrey; text-align: justify; margin-bottom: 10px;">
								<div class="card-body">
									<p class="card-body-p-descrizione-servizio">Hai la possibilità di recuperare quattro tipologie di documenti: le planimetrie catastali, le visure catastali (sia ordinarie che storiche), e gli estratti di mappa.</p>
								</div>
							</div>
						</div>	
						<div class="domanda-frequente" style="margin: 10px auto 10px auto;">
							<div class="card-header" id="headingDue">
								<label class="form-acquista-label-input">
									<a class="link-domande-frequenti" data-toggle="collapse" data-target="#collapseDue" aria-expanded="false" aria-controls="collapseDue" style="color: black; text-decoration: none;">Posso richiedere più documenti contemporaneamente?</a>
								</label>      
							</div>
							<div id="collapseDue" class="collapse" aria-labelledby="headingDue" data-parent="#accordion" style="border-bottom: 1px solid lightgrey; text-align: justify; margin-bottom: 10px;">
								<div class="card-body">
									<p class="card-body-p-descrizione-servizio">Assolutamente si: una volta scelto il documento principale hai la possibilità di selezionare altri documenti dalla sezione "servizi aggiuntivi". I documenti saranno riferiti ad uno stesso immobile (che sia esso un terreno oppure un fabbricato).</p>
								</div>
							</div>
						</div>
						<div class="domanda-frequente" style="margin: 10px auto 10px auto;">
							<div class="card-header" id="headingTre">
								<label class="form-acquista-label-input">
									<a class="link-domande-frequenti" data-toggle="collapse" data-target="#collapseTre" aria-expanded="false" aria-controls="collapseTre" style="color: black; text-decoration: none;">Come faccio a pagare?</a>
								</label>      
							</div>
							<div id="collapseTre" class="collapse" aria-labelledby="headingTre" data-parent="#accordion" style="border-bottom: 1px solid lightgrey; text-align: justify; margin-bottom: 10px;">
								<div class="card-body">
									<p class="card-body-p-descrizione-servizio">Una volta che tutta la documentazione da te richiesta sarà disponibile ti verrà inviata una e-mail: nel caso tu abbia scelto di pagare tramite PayPal (carta di pagamento) l'e-mail conterrà un link per procedere con l'acquisto direttamente sul sito di PayPal; nel caso invece tu abbia optato per saldare l'importo tramite bonifico bancario l'e-mail conterrà le coordinate bancarie (inclusi importo e causale) per procedere con il pagamento.</p>
								</div>
							</div>
						</div>
						<div class="domanda-frequente" style="margin: 10px auto 10px auto;">
							<div class="card-header" id="headingQuattro">
								<label class="form-acquista-label-input">
									<a class="link-domande-frequenti" data-toggle="collapse" data-target="#collapseQuattro" aria-expanded="false" aria-controls="collapseQuattro" style="color: black; text-decoration: none;">Come funziona l'evasione di un ordine?</a>
								</label>      
							</div>
							<div id="collapseQuattro" class="collapse" aria-labelledby="headingQuattro" data-parent="#accordion" style="border-bottom: 1px solid lightgrey; text-align: justify; margin-bottom: 10px;">
								<div class="card-body">
									<p class="card-body-p-descrizione-servizio">L'evasione di un ordine, nel caso in cui tu abbia deciso di pagare tramite PayPal (carta di pagamento), avviene attraverso una procedura automatizzata: completato l'acquisto il server trasmetterà la documentazione direttamente alla casella di posta elettronica fornita durante la fase di ordinazione. Se invece hai optato per pagare tramite bonifico bancario il processo di evasione di un ordine verrà fatto manualmente: una volta che l'importo richiesto verrà effettivamente accreditato sul mio conto corrente ti verranno trasmessi i documenti.</p>
								</div>
							</div>
						</div>
						<div class="domanda-frequente" style="margin: 10px auto 10px auto;">
							<div class="card-header" id="headingCinque">
								<label class="form-acquista-label-input">
									<a class="link-domande-frequenti" data-toggle="collapse" data-target="#collapseCinque" aria-expanded="false" aria-controls="collapseCinque" style="color: black; text-decoration: none;">Quali sono i tempi di consegna?</a>
								</label>      
							</div>
							<div id="collapseCinque" class="collapse" aria-labelledby="headingCinque" data-parent="#accordion" style="border-bottom: 1px solid lightgrey; text-align: justify; margin-bottom: 10px;">
								<div class="card-body">
									<p class="card-body-p-descrizione-servizio">Durante la fase di ordinazione all'utente verrà data la possibilità di indicare il tempo limite entro il quale intende ricevere i documenti. Il tempo limite verrà rispettato, salvo imprevisti, nel caso in cui l'ordine venga fatto durante l'orario d'ufficio, vale a dire dalle 09:00 alle 18:00. Nel caso in cui un ordine venga fatto al di fuori di questo orario verrà evaso alla successiva riapertura.</p>
								</div>
							</div>
						</div>
						<div class="domanda-frequente" style="margin: 10px auto 10px auto;">
							<div class="card-header" id="headingSei">
								<label class="form-acquista-label-input">
									<a class="link-domande-frequenti" data-toggle="collapse" data-target="#collapseSei" aria-expanded="false" aria-controls="collapseSei" style="color: black; text-decoration: none;">Posso annullare un ordine fatto per sbaglio?</a>
								</label>      
							</div>
							<div id="collapseSei" class="collapse" aria-labelledby="headingSei" data-parent="#accordion" style="border-bottom: 1px solid lightgrey; text-align: justify; margin-bottom: 10px;">
								<div class="card-body">
									<p class="card-body-p-descrizione-servizio">Assolutamente si: nel caso tu abbia fatto per sbaglio un ordine dovrai comunicarmelo via e-mail entro e non oltre un'ora dalla data di ordinazione. Nel caso in cui la richiesta di annullamento venga effettuata dopo il tempo massimo di un'ora, ovvero dopo aver ricevuto l'email di richiesta del pagamento, sarai tenuto comunque al pagamento dell'importo. Quest'ultima misura è necessaria in quanto devo sostenere dei costi per poter recuperare ciò di cui hai bisogno.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page">
					<h1 class="main-h1-home-page" id="metodi-pagamento">Scopri i metodi di pagamento che puoi utilizzare.</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
					<table border="0">
						<tbody>
							<tr>
								<td style="text-align: center; width: 50%;">
									<img alt="bonifico bancario" src="https://www.mozzino.it/img/bonifico-bancario.png" style="width: 50%; height: auto; filter: grayscale(100%);">
								</td>
								<td style="text-align: center; width: 50%;">
									<img alt="pagamento con paypal" src="https://www.mozzino.it/img/pagamento-paypal.webp" style="width: 50%; height: auto; filter: grayscale(100%);">
								</td>
							</tr>
							<tr>
								<td style="text-align: justify; width: 50%; padding: 10px 15px; vertical-align: top;">
									<p class="card-body-p-descrizione-servizio">Se preferisci pagare attraverso un bonifico bancario ti basterà selezionarlo come metodo di pagamento durante la fase di ordinazione: ti verranno trasmesse le coordinate bancarie al quale effettuare il pagamento.<br>Ricordati di seguire alla lettera le istruzioni contenute nell'e-mail. Una volta inoltrata la richiesta di pagamento avrò bisogno della ricevuta contabile (distinta di bonifico) in formato PDF. Attraverso questa procedura i tempi di evasione degli ordini subiranno variazioni di uno o due giorni.</p>
								</td>
								<td style="text-align: justify; width: 50%; padding: 10px 15px; vertical-align: top;">
									<p class="card-body-p-descrizione-servizio">Come strumento di pagamento standard utilizzo PayPal, uno dei più famosi ed utilizzati per l'invio e la ricezione di denaro. Attraverso questo servizio sarà possibile pagare con carta di credito/debito anche senza necessariamente avere un conto PayPal.</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page">
					<h1 class="main-h1-home-page" id="prezzi">Scopri quali sono i prezzi applicati al servizio.</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
					<table border="0" style="width: 100%;">
						<tbody>
							<tr>
								<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
									<p class="card-body-p-descrizione-servizio"><b>Planimetria catastale</b></p>
								</td>
								<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
									<p class="card-body-p-descrizione-servizio"><?php echo 'EURO ' . number_format("$price_pln", 2, ",", ".") . ' a documento (imposte incluse)<br>inclusi EURO ' . number_format("$price_tc_pln", 2, ",", ".") . ' di tributi catastali'; ?></p>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
									<p class="card-body-p-descrizione-servizio"><b>Visura ordinaria</b></p>
								</td>
								<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
									<p class="card-body-p-descrizione-servizio"><?php echo 'EURO ' . number_format("$price_vio", 2, ",", ".") . ' a documento (imposte incluse)<br>inclusi EURO ' . number_format("$price_tc_vio", 2, ",", ".") . ' di tributi catastali'; ?></p>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
									<p class="card-body-p-descrizione-servizio"><b>Visura storica</b></p>
								</td>
								<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
									<p class="card-body-p-descrizione-servizio"><?php echo 'EURO ' . number_format("$price_vis", 2, ",", ".") . ' a documento (imposte incluse)<br>inclusi EURO ' . number_format("$price_tc_vis", 2, ",", ".") . ' di tributi catastali'; ?></p>
								</td>
							</tr>
							<tr>
								<td style="text-align: right; width: 50%; padding: 10px 15px; vertical-align: top; border-right: 1px solid grey;">
									<p class="card-body-p-descrizione-servizio"><b>Estratto di mappa</b></p>
								</td>
								<td style="text-align: left; width: 50%; padding: 10px 15px; vertical-align: top;">
									<p class="card-body-p-descrizione-servizio"><?php echo 'EURO ' . number_format("$price_map", 2, ",", ".") . ' a documento (imposte incluse)<br>inclusi EURO ' . number_format("$price_tc_map", 2, ",", ".") . ' di tributi catastali'; ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page">
					<h1 class="main-h1-home-page" id="documenti">Scopri di più sui documenti che puoi richiedere.</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<h4 class="form-acquista-titolo-settore" id="planimetria-catastale"><b>Planimetria catastale</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<p class="card-body-p-descrizione-servizio">
						La planimetria è un documento riferito alla sezione fabbricati del catasto. Altro non è che una semplice rappresentazione grafica di un'unità immobiliare.<br>Al suo interno, a differenza di una qualsiasi planimetria urbanistica, non contiene quote plano-altimetriche, nè tantomeno altre misure specifiche (esempio dimensioni finestre). Ciò che invece contiene è, ad esempio: la destinazione d'uso di un locale, le altezze interne, l'orientamento, riferimenti ad eventuali vie pubbliche.<br>Questo documento deve essere redatto da un professionista iscritto ad un ordine professionale (geometra, ingegnere, architetto) ogniqualvolta, l'unità immobiliare di riferimento, subisce variazioni.<br>Viene utilizzata soprattutto in ambito immobiliare per verificare la corretta conformità con lo stato attuale dell'immobile.<br><br>
						<a class="form-acquisto-link-esempio-documento" target="_blank" href="https://www.mozzino.it/esempio/planimetria-catastale.pdf" style="padding: 5px 5px; margin: 0px 5px; border-radius: 5px; border: 1px solid grey;">Vedi un esempio</a> oppure <a class="form-acquisto-link-esempio-documento" href="https://www.mozzino.it/acquista/s/planimetria-catastale" style="padding: 5px 5px; margin: 0px 5px; background-color: lightgrey; border-radius: 5px;">richiedila</a>
					</p>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<h4 class="form-acquista-titolo-settore" id="visura-ordinaria"><b>Visura catastale ordinaria</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<p class="card-body-p-descrizione-servizio">
						La visura ordinaria è un documento che contiene diverse informazioni su un immobile, che sia esso un terreno oppure un fabbricato. Si compone di tre colonne principali: <b>dati identificativi</b>, <b>dati di classamento</b>, <b>note (dati derivanti da)</b>. All'interno dei dati identificativi troviamo la <b>sezione urbana</b> (ulteriore suddivisione del territorio comunale - solo per il catasto fabbricati), il <b>foglio</b>, la <b>particella</b> ed il <b>subalterno</b>. Nei dati di classamento vengono inseriti la <b>zona censuaria</b> (ulteriore suddivisione del territorio comunale - solo per il catasto terreni), <b>categoria</b> (tipologia dell'immobile), <b>classe</b> (parametro che identifica il grado di produttività dell'immobile - solo per il catasto fabbricati), <b>consistenza</b> (dimensione dell'immobile - solo per il catasto fabbricati), <b>rendita</b> (determinata moltiplicando la consistenza per la tariffa unitaria specifica per comune, zona censuaria e corrispondente alla categoria e classe - solo per il catasto fabbricati), <b>qualità</b> (tipologia di coltura - solo per il catasto terreni), <b>Ha</b> (superficie in ettari del terreno, ossia 10.000 m<sup>2</sup> - solo per il catasto terreni), <b>Are</b> (superficie pari a 100 m<sup>2</sup> - solo per il catasto terreni), <b>Ca</b> (superficie pari ad 1 m<sup>2</sup> - solo per il catasto terreni), <b>reddito dominicale</b> (parte del reddito medio ordinario ritraibile dall’esercizio delle attività agricole, che spetta al proprietario del terreno - solo per il catasto fabbricati), <b>reddito agrario</b> (parte del reddito medio ordinario dei terreni imputabile al capitale di esercizio e al lavoro - solo per il catasto terreni). Nella parte delle note (dati derivanti da) viene invece riportata la motivazione che ha condotto alla variazione dell'immobile (oppure di alcuni dati). Nella parte sottostante è presente una tabella nella quale sono riportati i dati anagrafici e fiscali dell'intestatario dell'immobile, nonchè il diritto di cui è titolare (proprietà, usufrutto). A partire dal 2015 nelle visure, sia ordinarie che storiche, viene riportata la superficie in metri quadri di un immobile (solo per il catasto fabbricati). A differenza della visura storica, essa contiene le informazioni di un immobile (terreno oppure fabbricato) solamente alla data in cui viene fatta la richiesta.<br><br>
						<a class="form-acquisto-link-esempio-documento" target="_blank" href="https://www.mozzino.it/esempio/visura-ordinaria.pdf" style="padding: 5px 5px; margin: 0px 5px; border-radius: 5px; border: 1px solid grey;">Vedi un esempio</a> oppure <a class="form-acquisto-link-esempio-documento" href="https://www.mozzino.it/acquista/s/visura-ordinaria" style="padding: 5px 5px; margin: 0px 5px; background-color: lightgrey; border-radius: 5px;">richiedila</a>
					</p>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<h4 class="form-acquista-titolo-settore" id="visura-storica"><b>Visura catastale storica</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<p class="card-body-p-descrizione-servizio">
						La visura storica contiene gli stessi dati di una qualunque visura ordinaria. La differenza con quest'ultima è che la visura storica riporta in ordine cronologico tutte le variazioni riguardanti l'immobile a partire dal primo accatastamento.<br><br>
						<a class="form-acquisto-link-esempio-documento" target="_blank" href="https://www.mozzino.it/esempio/visura-storica.pdf" style="padding: 5px 5px; margin: 0px 5px; border-radius: 5px; border: 1px solid grey;">Vedi un esempio</a> oppure <a class="form-acquisto-link-esempio-documento" href="https://www.mozzino.it/acquista/s/visura-storica" style="padding: 5px 5px; margin: 0px 5px; background-color: lightgrey; border-radius: 5px;">richiedila</a>
					</p>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<h4 class="form-acquista-titolo-settore" id="estratto-mappa"><b>Estratto di mappa catastale</b></h4>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 text-justify">
					<p class="card-body-p-descrizione-servizio">
						L'estratto di mappa catastale è la rappresentazione grafica del terreno. In esso vengono individuate e descritte graficamente le particelle censite al catasto terreni. Vengono inoltre rappresentati (distinguibili da un diverso tratteggio) i fabbricati. Così come per la planimetria non contiene quote plano-altimetriche. Contiene, ad esempio: la posizione dei punti fiduciali (particolare topografico utilizzato per le misurazioni), i riferimenti a pubbliche vie e/o strade.<br><br>
						<a class="form-acquisto-link-esempio-documento" target="_blank" href="https://www.mozzino.it/esempio/estratto-mappa.pdf" style="padding: 5px 5px; margin: 0px 5px; border-radius: 5px; border: 1px solid grey;">Vedi un esempio</a> oppure <a class="form-acquisto-link-esempio-documento" href="https://www.mozzino.it/acquista/s/estratto-mappa" style="padding: 5px 5px; margin: 0px 5px; background-color: lightgrey; border-radius: 5px;">richiedilo</a>
					</p>
				</div>
			</div>
		</div>
		<br><br>
    </main>
    <!-- Fine main -->
    <!-- Inizio footer -->
    <footer><?php require('./template/footer.php') ?></footer>
    <!-- Fine footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/1d7b862aa74aa906fa0a8893f1c40ae214ba1128cbb36eb98becfe42868cdb82.js"></script>
  </body>
</html>
