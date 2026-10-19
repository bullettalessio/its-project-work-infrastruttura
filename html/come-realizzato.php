<?php
// come-realizzato.php
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Come abbiamo realizzato il sito</title>
    <style>
        body {
            background-color: #0b2545; /* Sfondo tutto blu scuro */
            color: #ffffff; /* Testo interamente bianco */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #13315c; /* Box blu leggermente più chiaro per staccare dal fondo */
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
        .step {
            margin-bottom: 30px;
        }
        h3 {
            color: #ffaa00; /* Titoli dei paragrafi in arancione acceso */
            font-size: 1.4rem;
            margin-top: 0;
            margin-bottom: 12px;
        }
        p {
            margin: 0 0 15px 0;
            color: #ffffff; /* Testo dei paragrafi bianco */
        }
        strong {
            color: #ffcc00; /* Evidenziazione in giallo/arancione chiaro */
        }
        code {
            background-color: #0b2545;
            padding: 2px 6px;
            border-radius: 4px;
            color: #ffaa00;
        }
        .arrow {
            text-align: center;
            font-size: 2.5rem;
            color: #f48c06; /* Freccia verso giù arancione */
            margin: 20px 0;
            font-weight: bold;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f48c06;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .back-btn:hover {
            background-color: #e07a00;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🚀 Il Percorso di Realizzazione del Nostro Progetto</h1>

    <div class="step">
        <h3>1. Pianificazione, Organizzazione del Team e Metodologia Agile</h3>
        <p><strong>Cosa abbiamo fatto:</strong> Abbiamo aperto il progetto definendo i requisiti tecnici e funzionali del sito, suddividendo i compiti tra i membri del team (Zakaria, Alessio, Francesco, Mattia) in base alle nostre specializzazioni. Per coordinare il lavoro e gestire le scadenze in modo flessibile ed efficiente, abbiamo adottato la metodologia Agile, strutturando i rilasci in base alle priorità.</p>
        <p><strong>Materia coinvolta:</strong> PRJ-01 Gestione dei Progetti (Metodologia)</p>
    </div>

    <div class="arrow">↓</div>

    <div class="step">
        <h3>2. Analisi dei Requisiti e Progettazione dell'Architettura del Database</h3>
        <p><strong>Cosa abbiamo fatto:</strong> Abbiamo analizzato la struttura delle informazioni necessarie all'applicazione, come i dati dei componenti del team e il registro delle attività didattiche. Abbiamo quindi progettato lo schema logico del database relazionale, definendo le tabelle (<code>partecipanti</code> e <code>registro_attivita</code>), le chiavi primarie, i tipi di dato corretti (come <code>DATE</code> e <code>VARCHAR</code>) e le relazioni tra di essi.</p>
        <p><strong>Materia coinvolta:</strong> INF-01 Database Relazionali (MySQL)</p>
    </div>

    <div class="arrow">↓</div>

    <div class="step">
        <h3>3. Sviluppo del Codice PHP e Implementazione del Front-End</h3>
        <p><strong>Cosa abbiamo fatto:</strong> Abbiamo scritto la logica applicativa in linguaggio PHP per connettere dinamicamente il sito web al database server tramite l'estensione PDO, eseguendo query SQL per estrarre e mostrare i dati in tempo reale. Parallelamente, abbiamo strutturato l'interfaccia utente in HTML5 e stilizzato il layout grafico con CSS3 (utilizzando Flexbox per l'allineamento dei blocchi e del footer), garantendo una navigazione fluida e l'apertura di nuove schede per gli approfondimenti.</p>
        <p><strong>Materia coinvolta:</strong> INF-02 Sviluppo Web App (PHP & Front-End)</p>
    </div>

    <div class="arrow">↓</div>

    <div class="step">
        <h3>4. Containerizzazione dell'Ambiente e Orchestrazione con Docker</h3>
        <p><strong>Cosa abbiamo fatto:</strong> Per superare i problemi di configurazione manuale e garantire la portabilità assoluta del software, abbiamo isolato i singoli componenti (il server web Apache con runtime PHP, il database MySQL 8.0 e il pannello di gestione phpMyAdmin) all'interno di container Docker indipendenti. Abbiamo scritto e ottimizzato il file di configurazione <code>docker-compose.yml</code> per orchestrare l'avvio simultaneo e coordinato dell'intero stack con un solo comando nel terminale Linux.</p>
        <p><strong>Materia coinvolta:</strong> VIR-01 Virtualizzazione Linux & Container Docker</p>
    </div>

    <div class="arrow">↓</div>

    <div class="step">
        <h3>5. Configurazione del Networking, Instradamento e Sicurezza Perimetrale</h3>
        <p><strong>Cosa abbiamo fatto:</strong> Abbiamo configurato i parametri di rete interni a Docker per consentire una comunicazione sicura tra il container web e il database (risolvendo i conflitti di binding sulle porte di rete locali come la <code>3306</code>). Abbiamo gestito l'esposizione delle porte esterne (<code>80</code> per il sito e <code>8080</code> per phpMyAdmin) per rendere raggiungibile l'applicazione all'interno della sottorete locale tramite indirizzamento IP statico, prestando attenzione ai criteri di sicurezza perimetrale e al controllo degli accessi.</p>
        <p><strong>Materia coinvolta:</strong> NET-01 Reti di Calcolatori & DNS Locale e concetti di Cybersecurity applicata.</p>
    </div>

    <div style="text-align: center;">
        <a href="index.php" class="back-btn">← Torna alla Pagina Principale</a>
    </div>
</div>

</body>
</html>