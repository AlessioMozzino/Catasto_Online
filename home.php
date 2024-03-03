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
		<meta name="description" content="Evita le lunghe code al catasto per recuperare un documento catastale. Potrai ordinare: planimetrie catastali, visure catastali ed estratti di mappa. Il tutto comodamente online.">
		<title>Documenti catastali on line: planimetrie catastali, visure catastali, estratti di mappa</title>
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
				<!-- Inizio titolo homepage -->
				<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page">
					<h1 class="main-h1-home-page">Recuperare un documento catastale non è mai stato così semplice.</h1>
				</div>
				</div>
			</div>
			<div class="container-fluid" style="background-color: #616A6B; height: auto;">
				<div class="row" style="margin: 20px auto 20px auto;">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page" style="height: auto; margin-bottom: 0px;;">            
						<h3 style="font-family: 'Archivo Black', sans-serif; color: white; margin: 10px auto 10px auto;">Hai la possibilità di richiedere: planimetrie catastali, visure catastali (ordinarie e/o storiche) ed estratti di mappa. Il tutto evitando le lunghe code di attesa all'Agenzia delle Entrate.</h3>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="container">
			    
			    <!-- Inizio Modal -->
			    <!--
			    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="text-align: center;">
                                <h3 class="modal-title" id="exampleModalLabel" style="font-family: 'Sawarabi Mincho', sans-serif;"><b>Attenzione</b></h3>
                            </div>
                            <div class="modal-body" style="text-align: justify;">
                                <p style="font-family: 'Sawarabi Mincho', sans-serif;">Nella giornata di oggi (<?php echo date('d/m/Y') ?>) dalle ore 14:00 alle ore 18:00 sarò fuori ufficio causa impegni di lavoro per cui non sarò in grado di evadere in tempo le vostre richieste. Ogni vostro ordine verrà comunque preso in considerezione ed evaso appena possibile.<br><br><span style="text-align: center;"><b>Mi scuso in anticipo per il disguido, a presto.</b></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-family: 'Sawarabi Mincho', sans-serif;">Chiudi</button>
                            </div>
                        </div>
                    </div>
                </div>
                -->
			    <!-- Fine Modal -->
			    
			    
			    
			    
			     <style>
/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 5px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s}
</style>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
  ❅
  </div>
  <div class="snowflake">
  ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
  <div class="snowflake">
    ❅
  </div>
  <div class="snowflake">
    ❆
  </div>
</div>
			    
			    
				<!-- Fine titolo homepage -->
				<!-- Inizio schede servizi -->
				<div class="row">
					<!-- Inizio scheda servizio: planimetria catastale -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="section-card-planimetria">
						<div class="card">
							<div class="main-card-left-img-servizio">
								<img src="https://www.mozzino.it/img/planimetria-catastale-rasterizzata.png" class="card-img-top" alt="planimetria catastale online">
							</div>
							<div class="main-card-right-prezzo-servizio">                
								<div class="main-card-div-decimal-price">
									<h4 class="main-card-h4-decimal-price"><?php echo number_format("$price_pln", 2, ",", ".") . ' €' ?><sup>*</sup></h4>
								</div>
							</div>
							<div class="card-body">
								<div class="card-body-title-servizio">
									<h4 class="card-body-h4-title-servizio"><b>Planimetria catastale</b></h4>
								</div>
								<div class="card-body-description-servizio">
									<p class="card-body-p-descrizione-servizio">La planimetria catastale è il disegno tecnico di un’unità immobiliare registrata in catasto, da cui è possibile ricavare contorni, suddivisione e destinazione dei locali interni, e altre informazioni.</p>
								</div>
								<hr>
								<div class="card-body-button-acq-inf-servizio">
									<div class="card-body-button-acquista-servizio">
										<a href="https://www.mozzino.it/acquista/s/planimetria-catastale" class="card-body-link-acquista-servizio">Acquista</a>
									</div>
									<div class="card-body-button-informazioni-servizio">
										<a href="https://www.mozzino.it/informazioni#planimetria-catastale" class="card-body-link-informazioni-servizio">Scopri di più</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Fine scheda servizio: planimetria catastale -->
					<!-- Inizio scheda servizio: visura per immobile ordinaria -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="section-card-visura-ordinaria">
						<div class="card">
							<div class="main-card-left-img-servizio">
								<img src="https://www.mozzino.it/img/visura-immobile-ordinaria.png" class="card-img-top" alt="visura per immobile ordinaria">
							</div>
							<div class="main-card-right-prezzo-servizio">                
								<div class="main-card-div-decimal-price">
									<h4 class="main-card-h4-decimal-price"><?php echo number_format("$price_vio", 2, ",", ".") . ' €' ?><sup>*</sup></h4>
								</div>
							</div>
							<div class="card-body">
								<div class="card-body-title-servizio">
									<h4 class="card-body-h4-title-servizio"><b>Visura ordinaria</b></h4>
								</div>
								<div class="card-body-description-servizio">
									<p class="card-body-p-descrizione-servizio">La visura catastale permette di acquisire i dati identificativi e reddituali dei beni immobili, i dati anagrafici delle persone, fisiche o giuridiche, intestatarie dei beni immobili, i dati metrici dell'immobile e molto altro ancora.</p>
								</div>
								<hr>
								<div class="card-body-button-acq-inf-servizio">
									<div class="card-body-button-acquista-servizio">
										<a href="https://www.mozzino.it/acquista/s/visura-ordinaria" class="card-body-link-acquista-servizio">Acquista</a>
									</div>
									<div class="card-body-button-informazioni-servizio">
										<a href="https://www.mozzino.it/informazioni#visura-ordinaria" class="card-body-link-informazioni-servizio">Scopri di più</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Fine scheda servizio: visura per immobile ordinaria -->
					<!-- Inizio scheda servizio: visura per immobile storica -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="section-card-visura-storica">
						<div class="card">
							<div class="main-card-left-img-servizio">
								<img src="https://www.mozzino.it/img/visura-immobile-storica.png" class="card-img-top" alt="visura per immobile storica">
							</div>
							<div class="main-card-right-prezzo-servizio">                
								<div class="main-card-div-decimal-price">
									<h4 class="main-card-h4-decimal-price"><?php echo number_format("$price_vis", 2, ",", ".") . ' €' ?><sup>*</sup></h4>
								</div>
							</div>
							<div class="card-body">
								<div class="card-body-title-servizio">
									<h4 class="card-body-h4-title-servizio"><b>Visura storica</b></h4>
								</div>
								<div class="card-body-description-servizio">
									<p class="card-body-p-descrizione-servizio">La visura storica contiene i medesimi dati della visura ordinaria. Tuttavia, a differenza di quest'ultima, i dati fanno riferimento a partire dal primo censimento in catasto dell'immobile a cui fa riferimento.</p>
								</div>
								<hr>
								<div class="card-body-button-acq-inf-servizio">
									<div class="card-body-button-acquista-servizio">
										<a href="https://www.mozzino.it/acquista/s/visura-storica" class="card-body-link-acquista-servizio">Acquista</a>
									</div>
									<div class="card-body-button-informazioni-servizio">
										<a href="https://www.mozzino.it/informazioni#visura-storica" class="card-body-link-informazioni-servizio">Scopri di più</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Fine scheda servizio: visura per immobile storica -->
					<!-- Inizio scheda servizio: estratto di mappa -->
					<div class="col-lg-3 col-md-6 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="section-card-estratto-mappa">
						<div class="card">
							<div class="main-card-left-img-servizio">
								<img src="https://www.mozzino.it/img/estratto-mappa-catastale.png" class="card-img-top" alt="estratto di mappa catastale">
							</div>
							<div class="main-card-right-prezzo-servizio">                
								<div class="main-card-div-decimal-price">
									<h4 class="main-card-h4-decimal-price"><?php echo number_format("$price_map", 2, ",", ".") . ' €' ?><sup>*</sup></h4>
								</div>
							</div>
							<div class="card-body">
								<div class="card-body-title-servizio">
									<h4 class="card-body-h4-title-servizio"><b>Estratto mappa</b></h4>
								</div>
								<div class="card-body-description-servizio">
									<p class="card-body-p-descrizione-servizio">L’estratto di mappa fornisce i dati di una particella censita nel catasto terreni relativa alla cartografia e ai punti fiduciali, dati anagrafici e codice fiscale dei soggetti intestatari e molto altro ancora.</p>
								</div>
								<hr>
								<div class="card-body-button-acq-inf-servizio">
									<div class="card-body-button-acquista-servizio">
										<a href="https://www.mozzino.it/acquista/s/estratto-mappa" class="card-body-link-acquista-servizio">Acquista</a>
									</div>
									<div class="card-body-button-informazioni-servizio">
										<a href="https://www.mozzino.it/informazioni#estratto-mappa" class="card-body-link-informazioni-servizio">Scopri di più</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Fine scheda servizio: estratto di mappa -->
				</div>
				<!-- Fine schede servizi -->
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1 text-justify">
						<p class="description-price-service">(*) I prezzi sopra riportati sono comprensivi di imposte, tasse e rivalse contributive.</p>
						<p class="description-price-service">(**) Una volta selezionato ciò di cui hai bisogno, durante la fase di ordinazione, potrai selezionare anche altri documenti a titolo di servizi aggiuntivi.</p>
					</div>
				</div>
			</div>
			<div class="container">
				<!-- Inizio secondo titolo homepage -->
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="second-main-div-home-page">
						<h1 class="main-h1-home-page">Scegliere me significa affidarsi ad un professionista del settore.</h1>
					</div>
				</div>
			</div>
			<br>
			<div class="container-fluid" style="background-color: #616A6B; height: auto;">
				<div class="row" style="margin: 20px auto 20px auto;">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page" style="height: auto; margin-bottom: 0px;;">            
						<h3 style="font-family: 'Archivo Black', sans-serif; color: white; margin: 10px auto 10px auto;">Lavoro da ormai cinque anni come libero professionista nel settore tecnico ed immobiliare. Inoltre collaboro con uno studio di ingegneria civile. Scopri di più su di me nella sezione CHI SONO.</h3>
					</div>
				</div>
			</div>
			<br>
			<div class="container">
				<!-- Fine secondo titolo homepage -->
				<!-- Inizio caratteristiche servizio -->
				<div class="row">
					<!-- Inizio caratteristiche servizio: rapido -->
					<div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="second-main-div-servizio-rapido">
						<div class="second-main-div-tit-desc-caratteristiche-servizio">
							<div class="second-main-div-titolo-caratteristiche-servizio">
								<h4 class="second-main-h4-titolo-caratteristiche-servizio"><b>Rapido</b></h4>
								<hr>
							</div>
							<div class="second-main-div-img-caratteristiche-servizio">
								<img class="main-img-caratteristiche-servizio" src="https://www.mozzino.it/img/servizio-rapido.jpg" alt="servizio rapido">
							</div>
							<div class="second-main-div-descrizione-caratteristiche-servizio">
								<p class="second-main-p-descrizione-caratteristiche-servizio">Ottieni i documenti di cui hai bisogno in tempi rapidi. Sei tu a dirmi entro quando inviarti il tutto: entro 2 ore, 12 ore o 24 ore. Il tutto senza costi aggiuntivi.</p>
							</div>
						</div>
					</div>
					<!-- Fine caratteristiche servizio: rapido -->
					<!-- Inizio caratteristiche servizio: economico -->
					<div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="second-main-div-servizio-rapido">
						<div class="second-main-div-tit-desc-caratteristiche-servizio">
							<div class="second-main-div-titolo-caratteristiche-servizio">
								<h4 class="second-main-h4-titolo-caratteristiche-servizio"><b>Economico</b></h4>
								<hr>
							</div>
							<div class="second-main-div-img-caratteristiche-servizio">
								<img class="main-img-caratteristiche-servizio" src="https://www.mozzino.it/img/servizio-economico.jpg" alt="servizio economico">
							</div>
							<div class="second-main-div-descrizione-caratteristiche-servizio">
								<p class="second-main-p-descrizione-caratteristiche-servizio">Un servizio economico non è sempre sinonimo di scarsità: con i miei prezzi il risultato finale sarà lo stesso che otteresti pagando il doppio o, addirittura, il triplo.</p>
							</div>
						</div>
					</div>
					<!-- Fine caratteristiche servizio: economico -->
					<!-- Inizio caratteristiche servizio: presente -->
					<div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="second-main-div-servizio-presente">
						<div class="second-main-div-tit-desc-caratteristiche-servizio">
							<div class="second-main-div-titolo-caratteristiche-servizio">
								<h4 class="second-main-h4-titolo-caratteristiche-servizio"><b>Presente</b></h4>
								<hr>
							</div>
							<div class="second-main-div-img-caratteristiche-servizio">
								<img class="main-img-caratteristiche-servizio" src="https://www.mozzino.it/img/servizio-presente.jpg" alt="servizio presente">
							</div>
							<div class="second-main-div-descrizione-caratteristiche-servizio">
								<p class="second-main-p-descrizione-caratteristiche-servizio">Sarà possibile effettuare un ordine in ogni momento della giornata. Inoltre garantisco un servizio di assistenza completamente gratuito nel caso tu abbia dei problemi.</p>
							</div>
						</div>
					</div>
					<!-- Fine caratteristiche servizio: presente -->
				</div>
			</div>
			<div class="container">
				<div class="row">
					<!-- Inizio recensioni clienti -->
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="third-main-div-home-page">
						<h1 class="main-h1-home-page" id="recensioni">Unisciti alla cerchia delle persone soddisfatte.</h1>
					</div>
				</div>
			</div>
			<div class="container-fluid" style="background-color: #616A6B; height: auto;">
				<div class="row" style="margin: 20px auto 20px auto;">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-justify" id="main-div-home-page" style="height: auto; margin-bottom: 0px;;">            
						<h3 style="font-family: 'Archivo Black', sans-serif; color: white; margin: 10px auto 10px auto;">Scopri cosa pensano i miei clienti del servizio di recupero dei documenti catastali: ogni recensione positiva dimostra l'impegno che metto nel mio lavoro.</h3>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="main-descrizione-recensioni-clienti">
						<p class="main-p-descrizione-recensioni-clienti">Per me la raccolta delle recensioni dei clienti è una cosa fondamentale: quelle negative mi permettono di capire quello che non va e ciò che può essere migliorato; quelle positive mi spronano a dare il meglio e a continuare a lavorare nel modo migliore possibile.</p>
						<br>
						<p class="main-p-descrizione-recensioni-clienti">Queste sono solo alcune delle recensioni. Clicca qui sotto per vederle tutte o per lasciarmi un tuo giudizio.</p>
						<div style="width: 100%;">
							<table border="0">
								<tbody>
									<tr>
										<td style="width: 50%; text-align: center;"><a href="https://bit.ly/2Xc3Fih" target="_blank"><img src="https://www.mozzino.it/img/recensioni-trustpilot.png" style="width: 50%; filter: grayscale(100%);"></a></td>
										<td style="width: 50%; text-align: center;"><a href="https://bit.ly/3pSnp6Y" target="_blank"><img src="https://www.mozzino.it/img/recensioni-google.png" style="width: 50%; filter: grayscale(100%);"></a></td>
									</tr>
								</tbody>
							</table>
						</div>
						<br>
					</div>
					<div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-10 col-xs-offset-1" id="main-recensioni-clienti">
						<!-- DA NON MODIFICARE - RECENSIONI CLIENTI -->
						<div class="content-slider">
							<div class="slider">
								<div class="mask">
									<ul>
										<li class="anim1">
											<div class="quote">
												<p class="main-p-recensioni-clienti-giudizio">È stato veramente veloce. Benché avessi chiesto la planimetria non in modalità veloce In 2 ore dalla richiesta mi è stata consegnata. Inoltre molto economico, lo consiglio vivamente.</p>
											</div>
											<br>
											<div class="source">
												<p class="main-p-recensioni-clienti-cliente">Roberto C.</p>
											</div>
										</li>
										<li class="anim2">
											<div class="quote">
												<p class="main-p-recensioni-clienti-giudizio">È stato velocissimo. In 5 minuti dalla richiesta mi ha consegnato le planimetrie. Inoltre molto economico rispetto ad altri prezzi che si trovano in rete. Consiglio vivamente.</p>
											</div>
											<br>
											<div class="source">
												<p class="main-p-recensioni-clienti-cliente">Piero B.</p>
											</div>
										</li>
										<li class="anim3">
											<div class="quote">
												<p class="main-p-recensioni-clienti-giudizio">Servizio veloce ed economico, sicuramente le prossime richieste le faremo da voi, grazie infinite.</p>
											</div>
											<br>
											<div class="source">
												<p class="main-p-recensioni-clienti-cliente">Alfio N.</p>
											</div>
										</li>
										<li class="anim4">
											<div class="quote">
												<p class="main-p-recensioni-clienti-giudizio">Grande Mozzino. Ho richiesto una planimetria catastale: arrivata molto prima del previsto ad un prezzo che nessuno fa. Lo consiglio vivamente. Un grazie a Mozzino per la cortesia.</p>
											</div>
											<br>
											<div class="source">
												<p class="main-p-recensioni-clienti-cliente">Claudio P.</p>
											</div>
										</li>
										<li class="anim5">
											<div class="quote">
												<p class="main-p-recensioni-clienti-giudizio">Servizio veloce conforme alle aspettative, Mozzino è una persona affidabile.</p>
											</div>
											<br>
											<div class="source">
												<p class="main-p-recensioni-clienti-cliente">A&T S.r.l.</p>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- DA NON MODIFICARE - RECENSIONI CLIENTI -->
					</div>
				</div>
				<!-- Fine recensioni clienti -->
			</div>
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
		
		<!-- Inizio modal -->
		<!--
		<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
-->
		<!-- Fine modal -->
		
	</body>
</html>
