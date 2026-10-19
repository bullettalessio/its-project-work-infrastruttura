<?php
// Avvia la sessione per gestire la sicurezza della pagina
session_start();

// Simulazione di una sessione attiva
/*
if (!isset($_SESSION['login_effettuato'])) {
    header("Location: index.php");
    exit();
}
*/
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Amministrativa - DB_ITS</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            color: #333;
            min-height: 100vh;
        }

        /* Header Stile Dashboard */
        header {
            background-color: #004a99;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .header-title {
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 0;
        }

        .header-title span {
            color: #f39200;
        }

        .logout-btn {
            background-color: #f39200;
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background-color: #d78100;
        }

        /* Container Principale */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            position: relative;
        }

        .welcome-msg {
            font-size: 24px;
            color: #004a99;
            margin-bottom: 20px;
        }

        .pw-duration-notice {
            background-color: #e0f2fe;
            border-left: 5px solid #0369a1;
            color: #0369a1;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 30px;
        }

        /* Grid delle Card di Riepilogo rapide */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-left: 5px solid #004a99;
        }

        .stat-card.orange {
            border-left-color: #f39200;
        }

        .stat-title {
            font-size: 14px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #1e293b;
        }

        /* Contenitore per le Tabelle */
        .analytics-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            border-top: 8px solid #f39200;
            margin-bottom: 40px;
            position: relative;
        }

        .analytics-container.blue-top {
            border-top: 8px solid #004a99;
        }

        .analytics-title {
            color: #004a99;
            font-size: 22px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .analytics-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: left;
        }

        .analytics-table th {
            background-color: #004a99;
            color: white;
            padding: 14px 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 3px solid #f39200;
        }

        .analytics-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #e2e8f0;
            color: #333;
        }

        .analytics-table tr:nth-of-type(even) {
            background-color: #f8fafc;
        }

        .analytics-table tr:hover {
            background-color: #f1f5f9;
            transition: background-color 0.2s ease;
        }

        /* Link interattivi sui Nomi e sulle Materie */
        .interactive-link {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            border-bottom: 1px dashed transparent;
            transition: border-color 0.2s, color 0.2s;
        }

        .interactive-link:hover {
            color: #004a99;
            border-bottom-color: #004a99;
        }

        /* Variante specifica per i link delle materie che erano blu */
        .subject-link {
            color: #004a99;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            border-bottom: 1px dashed transparent;
            transition: border-color 0.2s, opacity 0.2s;
        }

        .subject-link:hover {
            border-bottom-color: #004a99;
            opacity: 0.8;
        }

        /* Badge di Stato Modulo */
        .status-badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            display: inline-block;
        }
        .status-completato { background-color: #d1fae5; color: #065f46; }
        .status-in-corso { background-color: #fef3c7; color: #92400e; }

        /* Barra di Avanzamento Grafica */
        .progress-bar-bg {
            background-color: #e2e8f0;
            border-radius: 10px;
            width: 100px;
            height: 8px;
            display: inline-block;
            vertical-align: middle;
            margin-right: 8px;
        }
        .progress-bar-fill {
            height: 100%;
            border-radius: 10px;
            background-color: #f39200;
        }

        .role-badge {
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 4px 8px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 13px;
        }

        /* STILE POPUP / MINI PAGINA INFORMATIVA (MODAL) */
        .info-modal {
            display: none; /* Nascosto di default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Sfondo semi-trasparente */
            backdrop-filter: blur(3px);
        }

        .modal-content {
            background-color: #ffffff;
            margin: 10% auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.25);
            border-top: 8px solid #004a99;
            width: 80%;
            max-width: 900px;
            animation: fadeIn 0.3s ease-out;
            position: relative;
        }

        .modal-content.orange-top {
            border-top: 8px solid #f39200;
        }

        @keyframes fadeIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .close-modal-btn {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 8px 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            float: right;
            transition: background 0.2s;
        }

        .close-modal-btn:hover {
            background-color: #dc2626;
        }

        .modal-header-title {
            color: #004a99;
            font-size: 22px;
            margin-top: 0;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .modal-role-subtitle {
            font-size: 15px;
            color: #f39200;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .modal-body-text {
            font-size: 15px;
            line-height: 1.6;
            color: #475569;
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #f39200;
            margin-bottom: 15px;
        }

        .modal-synergy-text {
            font-size: 15px;
            line-height: 1.6;
            color: #475569;
            background-color: #f0fdf4;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #16a34a;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #64748b;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <header>
        <div class="header-title">ITS UMBRIA <span>ACADEMY</span> // Pannello Controllo</div>
        <a href="index.php" class="logout-btn">🚪 Esci dal Sistema</a>
    </header>

    <div class="container">
        <div class="welcome-msg">Benvenuto nell'area di gestione del <strong>Project Work</strong>!</div>
        
        <div class="pw-duration-notice">
            ⏱️ <strong>Nota di Monitoraggio:</strong> La durata complessiva pianificata per le attività laboratoriali di questo Project Work è impostata a <strong>40 ore</strong>.
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-title">Moduli Totali</div>
                <div class="stat-value">6 Corsi</div>
            </div>
            <div class="stat-card orange">
                <div class="stat-title">Ore complessive moduli</div>
                <div class="stat-value">Ore 288/296</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Stato Infrastruttura</div>
                <div class="stat-value" style="color: #059669;">Attiva (Docker)</div>
            </div>
            <div class="stat-card orange">
                <div class="stat-title">Membri del Team</div>
                <div class="stat-value">4 Studenti</div>
            </div>
        </div>

        <div class="analytics-container blue-top">
            <div class="analytics-title">👥 Registro Componenti & Ruoli Team di Progetto <span style="font-size: 13px; font-weight: normal; color: #64748b; margin-left: 10px;">(Clicca su un nome per vedere i dettagli pratici)</span></div>
            
            <table class="analytics-table">
                <thead>
                    <tr>
                        <th>ID_Studente</th>
                        <th>Nome</th>
                        <th>Cognome</th>
                        <th>Data di Nascita</th>
                        <th>Ruolo Assegnato nel PW</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">01</td>
                        <td><a class="interactive-link" onclick="openStudentModal('zakaria')">Zakaria</a></td>
                        <td>Hamrich</td>
                        <td>11/10/2004</td>
                        <td><span class="role-badge">Gestore Container</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">02</td>
                        <td><a class="interactive-link" onclick="openStudentModal('alessio')">Alessio</a></td>
                        <td>Bulletta</td>
                        <td>04/10/2006</td>
                        <td><span class="role-badge">Creazione e manutenzione Sito Web ed Infrastruttura</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">03</td>
                        <td><a class="interactive-link" onclick="openStudentModal('francesco')">Francesco</a></td>
                        <td>Marini</td>
                        <td>31/12/2004</td>
                        <td><span class="role-badge">Database Administrator</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">04</td>
                        <td><a class="interactive-link" onclick="openStudentModal('mattia')">Mattia</a></td>
                        <td>Campanino</td>
                        <td>04/04/2006</td>
                        <td><span class="role-badge">Gestore firewall e instradamento</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="analytics-container">
            <div class="analytics-title">📊 Stato Avanzamento Moduli & Registro Attività <span style="font-size: 13px; font-weight: normal; color: #64748b; margin-left: 10px;">(Clicca su una materia per i dettagli di coesistenza)</span></div>
            
            <table class="analytics-table">
                <thead>
                    <tr>
                        <th>Codice</th>
                        <th>Unità Formativa / Ambito</th>
                        <th>Docente Titolare</th>
                        <th>Ore Totali</th>
                        <th>Progresso PW</th>
                        <th>Stato Rilascio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">INF-01</td>
                        <td><a class="subject-link" onclick="openSubjectModal('mysql')">Database Relazionali (MySQL)</a></td>
                        <td style="font-style: italic;">Pinchi Michael</td>
                        <td>40 ore</td>
                        <td>
                            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 100%;"></div></div>
                            <span style="font-weight: 600;">100%</span>
                        </td>
                        <td><span class="status-badge status-completato">Completato</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">INF-02</td>
                        <td><a class="subject-link" onclick="openSubjectModal('php')">Sviluppo Web App (PHP & Front-End)</a></td>
                        <td style="font-style: italic;">Blasi Domenico</td>
                        <td>72 ore</td>
                        <td>
                            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 100%;"></div></div>
                            <span style="font-weight: 600;">100%</span>
                        </td>
                        <td><span class="status-badge status-completato">Completato</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">NET-01</td>
                        <td><a class="subject-link" onclick="openSubjectModal('networks')">Reti di Calcolatori & DNS Locale</a></td>
                        <td style="font-style: italic;">Marinello Marco</td>
                        <td>36 ore</td>
                        <td>
                            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 100%;"></div></div>
                            <span style="font-weight: 600;">100%</span>
                        </td>
                        <td><span class="status-badge status-completato">Completato</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">VIR-01</td>
                        <td><a class="subject-link" onclick="openSubjectModal('docker')">Virtualizzazione Linux & Container Docker</a></td>
                        <td style="font-style: italic;">Perri Damiano</td>
                        <td>92 ore</td>
                        <td>
                            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 100%;"></div></div>
                            <span style="font-weight: 600;">100%</span>
                        </td>
                        <td><span class="status-badge status-completato">Completato</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">PRJ-01</td>
                        <td><a class="subject-link" onclick="openSubjectModal('project')">Gestione dei Progetti (Metodologia)</a></td>
                        <td style="font-style: italic;">Montegiove Sonia</td>
                        <td>16 ore</td>
                        <td>
                            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 100%;"></div></div>
                            <span style="font-weight: 600;">100%</span>
                        </td>
                        <td><span class="status-badge status-completato">Completato</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #64748b;">CLD-01</td>
                        <td><a class="subject-link" onclick="openSubjectModal('cloud')">Cloud Technologies (IaaS/PaaS/SaaS)</a></td>
                        <td style="font-style: italic;">Blasi Domenico</td>
                        <td>40 ore</td>
                        <td>
                            <div class="progress-bar-bg"><div class="progress-bar-fill" style="width: 100%;"></div></div>
                            <span style="font-weight: 600;">100%</span>
                        </td>
                        <td><span class="status-badge status-completato">Completato</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="generalModal" class="info-modal" onclick="closeModalOnOutsideClick(event)">
        <div id="modalContainer" class="modal-content">
            <button class="close-modal-btn" onclick="closeGeneralModal()">❌ Chiudi</button>
            <h3 id="modalTitle" class="modal-header-title">Titolo</h3>
            <div id="modalSubtitle" class="modal-role-subtitle">Sottotitolo</div>
            <div id="modalBody" class="modal-body-text">Testo principale...</div>
            <div id="modalSecondSection" class="modal-synergy-text">Testo di coesistenza...</div>
        </div>
    </div>

    <div class="footer">© 2026 Project Work - Corso Cloud & Server Administrator</div>

    <script>
        // Database 1: Dati dei Partecipanti
        const studentData = {
            zakaria: {
                title: "Zakaria Hamrich",
                role: "🐋 Gestore Container",
                body: "Zakaria si è occupato dell'ingegnerizzazione e del deployment dell'intera architettura tramite <strong>Docker</strong>. In pratica, ha preso il codice dell'applicazione web e il database e li ha isolati all'interno di container leggeri e indipendenti. Ha configurato i file <code>Dockerfile</code> e orchestrato i servizi tramite <code>docker-compose</code>, assicurando che il server web (PHP/Apache) e il DBMS (MySQL) potessero comunicare in modo sicuro all'interno di una rete virtuale isolata.",
                synergy: "Grazie al suo lavoro, l'applicazione è scalabile, facilmente replicabile su qualsiasi macchina Linux Server e pronta per ambienti Cloud."
            },
            alessio: {
                title: "Alessio Bulletta",
                role: "🌐 Creazione e manutenzione Sito Web ed Infrastruttura",
                body: "Alessio ha curato lo sviluppo del <strong>Front-End</strong> e del <strong>Back-End</strong> della Web App, oltre alla configurazione del sistema operativo ospitante. In pratica, ha scritto il codice PHP per la gestione logica delle sessioni, dei login e delle dashboard, e ha strutturato il layout grafico con CSS avanzato, rendendo l'interfaccia responsive e coerente con la palette colori dell'ITS Umbria Academy.",
                synergy: "Sul fronte infrastrutturale, ha configurato l'ambiente Linux Server, gestendo i permessi dei file, i demoni di sistema e assicurando che la macchina virtuale operasse correttamente in modalità Bridge per l'accesso esterno."
            },
            francesco: {
                title: "Francesco Marini",
                role: "🗄️ Database Administrator",
                body: "Francesco è stato il responsabile della persistenza e dell'integrità dei dati, gestendo l'intero ciclo di vita del database <strong>DB_ITS</strong>. In pratica, ha tradotto i requisiti del progetto in uno schema logico relazionale (tabelle, chiavi primarie e chiavi esterne per i partecipanti e per i moduli IT).",
                synergy: "Ha scritto gli script SQL per la creazione del database, gestito l'inserimento iniziale dei dati e ottimizzato le query per le pagine dinamiche della dashboard. Inoltre, ha impostato le credenziali di sicurezza per proteggere l'accesso ai dati sensibili."
            },
            mattia: {
                title: "Mattia Campanino",
                role: "🛡️ Gestore firewall e instradamento",
                body: "Mattia si è focalizzato sulla sicurezza perimetrale e sulla connettività di rete del server. In pratica, ha lavorato sulla configurazione delle regole del <strong>Firewall</strong> (tramite strumenti Linux come UFW o iptables) per bloccare gli accessi non autorizzati e consentire il traffico solo sulle porte necessarie, come la porta <code>80</code> per il traffico web HTTP.",
                synergy: "Ha inoltre gestito le tabelle di routing (instradamento) e la risoluzione dei nomi tramite il servizio <strong>DNS locale</strong>, assicurandosi che le richieste esterne venissero indirizzate correttamente verso il container della Web App senza esporre direttamente i dati critici del database."
            }
        };

        // Database 2: Dati delle Materie
        const subjectData = {
            mysql: {
                title: "Database Relazionali (MySQL)",
                role: "Focus: Ingegneria dei Dati & SQL",
                body: "<strong>Perché riguarda il progetto:</strong> Ogni applicazione web moderna ha bisogno di memorizzare i dati in modo persistente e sicuro (es. credenziali di login dei partecipanti, dati di monitoraggio delle ore, registri). Questa materia fornisce le competenze per progettare lo schema logico e implementare fisicamente il database relazionale <code>DB_ITS</code>.",
                synergy: "<strong>Perché coesiste con il progetto:</strong> Coesiste come 'motore dei dati' dell'applicazione. Non lavora da solo: riceve le query inviate dal codice di backend (PHP) sviluppato nel modulo Web App e risiede in totale isolamento all'interno di un container dedicato per garantire la sicurezza informatica."
            },
            php: {
                title: "Sviluppo Web App (PHP & Front-End)",
                role: "Focus: Programmazione Applicativa & UX/UI",
                body: "<strong>Perché riguarda il progetto:</strong> È il cuore visivo e logico del Project Work. Il front-end (HTML/CSS) permette di realizzare l'interfaccia utente grafica (la dashboard), mentre il back-end (PHP) implementa la logica di business, le sessioni utente e la comunicazione dinamica con la base di dati.",
                synergy: "<strong>Perché coesiste con il progetto:</strong> Rappresenta lo strato intermedio applicativo (middleware). Coesiste con la materia dei Database, da cui estrae le informazioni da mostrare a schermo, e dipende strettamente dall'infrastruttura di rete e di containerizzazione che ospita fisicamente il server per essere visibile."
            },
            networks: {
                title: "Reti di Calcolatori & DNS Locale",
                role: "Focus: Networking & Instradamento",
                body: "<strong>Perché riguarda il progetto:</strong> Un'applicazione web non può essere raggiunta se non esiste un'infrastruttura di rete che instrada correttamente i pacchetti dati. Questa materia permette di configurare l'indirizzamento IP all'interno del server e il <strong>DNS locale</strong> affinché gli utenti possano digitare un nome a dominio comprensibile (es. <code>dashboard.its</code>).",
                synergy: "<strong>Perché coesiste con il progetto:</strong> È il collante che permette l'interconnessione. Consente ai container Docker (database e applicativo) di comunicare su una rete virtuale interna isolata e, al tempo stesso, permette il corretto instradamento dei client esterni che tentano di visualizzare il sito web."
            },
            docker: {
                title: "Virtualizzazione Linux & Container Docker",
                role: "Focus: Architettura Sistemistica & DevOps",
                body: "<strong>Perché riguarda il progetto:</strong> Fornisce l'ambiente di hosting moderno (l'infrastruttura basata su Docker). Invece di installare i software direttamente sul sistema operativo principale, ogni componente viene pacchettizzato in container leggeri (uno per MySQL, uno per PHP/Apache), garantendo portabilità e facilità di deployment.",
                synergy: "<strong>Perché coesiste con il progetto:</strong> Coesiste come 'guscio protettivo e standardizzato'. Ospita fisicamente sia il codice scritto per la Web App sia le tabelle del Database, sfruttando le configurazioni sistemistiche di Linux Server per l'assegnazione dei permessi e l'isolamento dei servizi."
            },
            project: {
                title: "Gestione dei Progetti (Metodologia)",
                role: "Focus: Project Management & Framework Agile",
                body: "<strong>Perché riguarda il progetto:</strong> Un team composto da più persone con ruoli diversi (System Admin, DB Admin, WebSite Developer) necessita di coordinamento, scadenze e metodologie. Questo modulo serve a pianificare le attività laboratoriali, monitorare lo stato di avanzamento dei rilasci e suddividere i compiti in modo efficiente.",
                synergy: "<strong>Perché coesiste con il progetto:</strong> È la materia organizzativa trasversale. Non produce codice o configurazioni sistemistiche dirette, ma regola le modalità e i tempi con cui tutte le altre materie tecniche vengono integrate tra loro nel tempo, garantendo il rispetto degli obiettivi."
            },
            cloud: {
                title: "Cloud Technologies (IaaS/PaaS/SaaS)",
                role: "Focus: Cloud Computing & Virtualizzazione Evoluta",
                body: "<strong>Perché riguarda il progetto:</strong> Rappresenta l'evoluzione naturale del deployment locale. Le competenze acquisite sulle tipologie di Cloud (IaaS, Paas, SaaS) servono a comprendere come migrare la propria infrastruttura Docker e il database da un server locale a un'infrastruttura Cloud scalabile e resiliente.",
                synergy: "<strong>Perché coesiste con il progetto:</strong> Coesiste come orizzonte architetturale finale. L'applicazione web e i relativi container sono progettati fin dall'inizio seguendo logiche <em>cloud-native</em>; questo modulo assicura che il backend e il frontend siano pronti per coesistere in ambienti cloud distribuiti."
            }
        };

        // Funzione per aprire il popup dei PARTECIPANTI (Top Bordo Blu)
        function openStudentModal(studentKey) {
            const data = studentData[studentKey];
            if (data) {
                document.getElementById('modalContainer').className = "modal-content"; // Reset a bordo blu
                document.getElementById('modalTitle').innerHTML = data.title;
                document.getElementById('modalSubtitle').innerHTML = data.role;
                document.getElementById('modalBody').innerHTML = data.body;
                document.getElementById('modalSecondSection').innerHTML = "🚀 <strong>Integrazione Pratica:</strong> " + data.synergy;
                document.getElementById('generalModal').style.display = 'block';
            }
        }

        // Funzione per aprire il popup delle MATERIE (Top Bordo Arancione)
        function openSubjectModal(subjectKey) {
            const data = subjectData[subjectKey];
            if (data) {
                document.getElementById('modalContainer').className = "modal-content orange-top"; // Cambia a bordo arancione
                document.getElementById('modalTitle').innerHTML = data.title;
                document.getElementById('modalSubtitle').innerHTML = data.role;
                document.getElementById('modalBody').innerHTML = data.body;
                document.getElementById('modalSecondSection').innerHTML = "🔗 <strong>Coesistenza nel Sistema:</strong> " + data.synergy;
                document.getElementById('generalModal').style.display = 'block';
            }
        }

        // Funzione per chiudere il popup generico
        function closeGeneralModal() {
            document.getElementById('generalModal').style.display = 'none';
        }

        // Chiude il popup se l'utente clicca fuori dal riquadro bianco
        function closeModalOnOutsideClick(event) {
            const modal = document.getElementById('generalModal');
            if (event.target === modal) {
                closeGeneralModal();
            }
        }
    </script>
</body>
</html>