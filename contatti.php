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
		<meta name="description" content="Hai dei dubbi? Contattami inserendo nel dettaglio il tuo problema. Cercherò di risolverlo nel più breve tempo possibile.">
		<title>Contattami per richiedere informazioni aggiuntive</title>
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
			<form action="contatti" method="post">
				<div class="container">				
					<!-- Inizio titolo homepage -->
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 text-center" id="main-div-home-page">
							<h1 class="main-h1-home-page">Contattami per richiedere informazioni.<br>
								<?php
									if(isset($_POST['contatti-pulsante'])) {
										/* Recupero valori */
										$nome_richiedente_informazioni = $_POST['contatti-nome'];
										$cognome_richiedente_informazioni = $_POST['contatti-cognome'];
										$motivo_richiesta = $_POST['contatti-motivo-richiesta'];
										
										/* Scelta dinamica per ricezione richiesta di informazioni (gestione interna) */
										if($motivo_richiesta === '-' || $motivo_richiesta === 'informazioni-generiche') {
											$destinatario_richiesta_informazioni = 'info@mozzino.it';
											$nome_destinatario_richiesta_informazioni = 'Informazioni';
										} elseif($motivo_richiesta === 'informazioni-ordini') {
											$destinatario_richiesta_informazioni = 'ordini@mozzino.it';
											$nome_destinatario_richiesta_informazioni = 'Ordini';
										} elseif($motivo_richiesta === 'informazioni-contabili') {
											$destinatario_richiesta_informazioni = 'ragioneria@mozzino.it';
											$nome_destinatario_richiesta_informazioni = 'Ragioneria';
										}
										
										$messaggio_richiesta_informazioni = '<p style="font-family: Arial, Helvetica, sans-serif;">' . $_POST['contatti-messaggio-richiesta'] . '</p>';
										$mittente_richiesta_informazioni = $_POST['contatti-email'];
										
										/* Verifica check normativa privacy */
										if(isset($_POST['check-normativa-privacy'])) {
											/* Preparazione per invio e-mail */
											$header = "From: " . $nome_richiedente_informazioni . " " . $cognome_richiedente_informazioni ."<" . $mittente_richiesta_informazioni . ">\r\n";
											$header = "Reply-To: " . $nome_richiedente_informazioni . " " . $cognome_richiedente_informazioni ."<" . $mittente_richiesta_informazioni . ">\r\n";
											$header .= "MIME-Version: 1.0\r\n";
											$header .= "Content-Type: text/html; charset=UTF-8\r\n";
											
											$oggetto_email = $nome_richiedente_informazioni . ' ' . $cognome_richiedente_informazioni . ' ha bisogno di informazioni';
											
											if(!mail($destinatario_richiesta_informazioni, $oggetto_email, $messaggio_richiesta_informazioni, $header)) {
												echo '';
											} else {
												echo '<i>Grazie per avermi contattato.</i>';
											}
											
											/* Verifica spunta per ricezione copia del messaggio */
											if(isset($_POST['check-invio-copia-messaggio'])) {
												/* Preparazione per invio e-mail */
												$header = "From: " . $nome_destinatario_richiesta_informazioni . "<" . $destinatario_richiesta_informazioni . ">\r\n";		
												$header .= "MIME-Version: 1.0\r\n";
												$header .= "Content-Type: text/html; charset=UTF-8\r\n";
												
												$oggetto_email = 'Copia richiesta informazioni';
												
												$messaggio_copia_cliente = '<p style="font-family: Arial, Helvetica, sans-serif;">Gentile <b>' . $nome_richiedente_informazioni . ' ' . $cognome_richiedente_informazioni . '</b>,<br>';
												$messaggio_copia_cliente .= 'di seguito la copia del messaggio di richiesta informazioni:<br><br>### Inizio messaggio ###<b>' . $messaggio_richiesta_informazioni . '</b>### Fine messaggio ###<br><br>Grazie per aver scelto il mio servizio';
												$messaggio_copia_cliente .= '<br><br><b>Mozzino</b> / ' . $nome_destinatario_richiesta_informazioni . '</b><br>Recupero documenti catastali<br><a href="https://www.mozzino.it/">Sito internet</a><br><a href="https://www.facebook.com/mozzino.it">Pagina facebook</a></p>';
											
												mail($mittente_richiesta_informazioni, $oggetto_email, $messaggio_copia_cliente, $header);
											}
										}										
									} 
								?>
							</h1>
						</div>
					</div>
				</div>
				<!-- Fine titolo homepage -->               
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 text-center">
							<p class="description-price-service">Compila il modulo sottostante per metterti in contatto direttamente con me.<br>Sarò lieto di poterti aiutare.</b></p>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-left">
								<h4 class="form-acquista-titolo-settore">Come ti chiami?</h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label class="form-acquista-label-input" for="contatti-nome">Nome</label>
								<input class="form-control" type="text" name="contatti-nome" placeholder="Inserisci il nome" required>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label class="form-acquista-label-input" for="contatti-cognome">Cognome</label>
								<input class="form-control" type="text" name="contatti-cognome" placeholder="Inserisci il cognome" required>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-left">
								<h4 class="form-acquista-titolo-settore">Di cosa hai bisogno?</h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-left">
								<select class="form-control" name="contatti-motivo-richiesta" required>
									<option value="-" selected>-</option>
									<option value="informazioni-generiche">Informazioni generiche</option>
									<option value="informazioni-ordini">Informazioni sugli ordini</option>
									<option value="informazioni-contabili">Informazioni contabili</option>
								</select>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-left">
								<h4 class="form-acquista-titolo-settore">Inserisci il messaggio</h4>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-12 col-md-12 col-sm-12 text-left">
								<textarea class="form-control" name="contatti-messaggio-richiesta" rows="4" style="resize: none;" required></textarea>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<input class="form-check-input" type="checkbox" name="check-normativa-privacy" required>
								<label class="form-check-label" for="check-normativa-privacy"><a class="link-footer" href="https://www.iubenda.com/privacy-policy/56591471/full-legal" target="_blank">Normativa privacy</a></label>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<input class="form-check-input" type="checkbox" name="check-invio-copia-messaggio">
								<label class="form-check-label" for="check-invio-copia-messaggio">Copia del messaggio</label>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 text-justify">
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label class="form-acquista-label-input" for="contatti-email">E-mail</label>
								<input class="form-control" type="email" name="contatti-email" placeholder="Inserisci la tua e-mail" required>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label class="form-acquista-label-input" for="contatti-pulsante">Clicca per contattarmi</label>
								<input id="form-acquisto-pulsante-ordina-servizio" class="form-control" type="submit" name="contatti-pulsante" value="Contattami">
							</div>
						</div>
					</div>
				</div>		
			</form>
			<br>
			<br>
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
