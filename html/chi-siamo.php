<?php
// chi-siamo.php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Siamo - Team Cloud Infrastructure</title>
    <style>
        body {
            background-color: #0b2545; /* Sfondo blu scuro */
            color: #ffffff; /* Testo bianco */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #13315c; /* Box blu per contrasto */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        h1 {
            color: #f48c06; /* Titolo principale arancione */
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 40px;
            border-bottom: 2px solid #f48c06;
            padding-bottom: 15px;
        }
        .section {
            margin-bottom: 30px;
        }
        h3 {
            color: #ffaa00; /* Titoli paragrafi arancioni */
            font-size: 1.5rem;
            margin-top: 0;
            margin-bottom: 12px;
        }
        p {
            margin: 0 0 15px 0;
            color: #ffffff;
        }
        strong {
            color: #ffcc00;
        }
        .arrow {
            text-align: center;
            font-size: 2.5rem;
            color: #f48c06; /* Freccia arancione */
            margin: 20px 0;
            font-weight: bold;
        }
        .footer-buttons {
            text-align: center;
            margin-top: 40px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: opacity 0.3s;
        }
        .btn-orange {
            background-color: #f48c06;
        }
        .btn-blue {
            background-color: #007bff;
        }
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>👥 Chi Siamo</h1>

    <div class="section">
        <h3>Il Nostro Team</h3>
        <p>Siamo <strong>quattro ragazzi</strong> (Zakaria, Alessio, Francesco e Mattia) appassionati di tecnologia, attualmente iscritti al corso di <strong>Infrastrutture Digitali e Cloud Management</strong> presso l'<strong>ITS Umbria Academy</strong> per il biennio <strong>2025-2027</strong>.</p>
        <p>Questo progetto nasce dalla nostra collaborazione e dalla voglia di mettere in pratica le competenze acquisite durante le ore di laboratorio e di teoria, affrontando sfide reali di programmazione e gestione sistemistica.</p>
    </div>

    <div class="arrow">↓</div>

    <div class="section">
        <h3>Il Corso: Cloud Infrastructure Management</h3>
        <p>Il nostro percorso di studi è focalizzato sulla progettazione, configurazione e gestione di architetture informatiche moderne e scalabili. Ma cosa facciamo esattamente?</p>
        <p>Il corso spazia dalla <strong>gestione di server Linux e Windows</strong> alla configurazione di <strong>reti di calcolatori avanzate</strong>. Ultimamete abbiamo studiato ed affrontato approfonditamente la <strong>virtualizzazione</strong> (Docker, Kubernetes) e l'automazione dei processi tramite metodologie <strong>DevOps</strong>.</p>
        <p>L'obiettivo è diventare esperti nella gestione del <strong>Cloud</strong> (IaaS, PaaS, SaaS) e nella messa in sicurezza delle infrastrutture (Cybersecurity), garantendo che i servizi web siano sempre disponibili, veloci e protetti.</p>
    </div>

    <div class="arrow">↓</div>

    <div class="section">
        <h3>Il Nostro Project Work</h3>
        <p>In questa dashboard abbiamo integrato tutto ciò che abbiamo imparato: dalla creazione di un database SQL solido allo sviluppo di un'interfaccia web dinamica, il tutto orchestrato tramite container Docker.</p>
        <p>Spiegheremo dettagliatamente ogni singolo passaggio tecnico e le tecnologie utilizzate nella nostra <strong>pagina appositamente dedicata</strong>.</p>
    </div>

    <div class="footer-buttons">
        <a href="index.php" class="btn btn-blue">← Dashboard</a>
        <a href="come-realizzato.php" class="btn btn-orange">Vedi il Progetto →</a>
    </div>
</div>

</body>
</html>