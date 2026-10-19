<?php
// Avvia la sessione per gestire l'autenticazione
session_start();

$errore = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "admin" && $password === "progetto") {
        $_SESSION['login_effettuato'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $errore = "Credenziali non valide! Riprova.";
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITS UMBRIA ACADEMY - Accesso Portale</title>
    <style>
        /* Reset e occupazione totale dello schermo */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #004a99; /* Sfondo blu istituzionale */
            overflow-x: hidden;
        }

        /* Header Istituzionale superiore */
        .top-banner {
            background-color: #ffffff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .top-banner-title {
            font-size: 18px;
            font-weight: bold;
            color: #004a99;
            letter-spacing: 1px;
        }
        .top-banner-title span {
            color: #f39200;
        }

        /* Layout Principale a Schermo Intero */
        .full-page-wrapper {
            display: flex;
            flex-direction: row;
            width: 100%;
            box-sizing: border-box;
            padding: 30px 30px 10px 30px;
            gap: 30px;
        }

        /* Colonna di Sinistra: Presentazione e Mappatura Competenza */
        .left-column {
            flex: 1.3;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Colonna di Destra: Login Box e Immagine */
        .right-column {
            flex: 0.8;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        /* Stile delle Card bianche */
        .card-panel {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            border-top: 6px solid #f39200;
        }

        .card-panel.blue-border {
            border-top-color: #004a99;
        }

        .panel-title {
            color: #004a99;
            font-size: 22px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .panel-text {
            color: #333;
            font-size: 14.5px;
            line-height: 1.6;
        }

        .panel-list {
            padding-left: 20px;
            margin: 15px 0;
        }

        .panel-list li {
            margin-bottom: 12px;
            font-size: 14px;
        }

        /* Form di Login */
        .login-box {
            width: 100%;
            max-width: 380px;
        }

        .login-title {
            font-size: 15px;
            font-weight: bold;
            color: #004a99;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 8px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .login-btn {
            width: 100%;
            background-color: #004a99;
            color: white;
            border: none;
            padding: 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }

        .login-btn:hover {
            background-color: #003366;
        }

        .register-link {
            display: block;
            margin-top: 15px;
            font-size: 13px;
            color: #004a99;
            text-decoration: none;
            font-weight: 500;
        }

        /* Box contenitore per l'immagine */
        .image-container {
            width: 100%;
            max-width: 380px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            border: 3px solid white;
            display: flex;
        }

        .image-container img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }

        /* Tabella Competenze */
        .competence-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            text-align: left;
            background: white;
        }

        .competence-table th {
            background-color: #004a99;
            color: white;
            padding: 10px;
            font-weight: 600;
            border-bottom: 2px solid #f39200;
        }

        .competence-table td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
            color: #333;
            vertical-align: top;
        }

        .competence-table tr:nth-of-type(even) {
            background-color: #f8fafc;
        }

        .code-col { font-weight: bold; color: #f39200; width: 10%; }
        .subject-col { font-weight: 600; color: #004a99; width: 25%; }
        .desc-col { width: 45%; }
        .teacher-col { font-style: italic; width: 20%; }

        .error-message {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 5px;
            font-size: 13px;
            margin-bottom: 15px;
            text-align: left;
        }

        /* SEZIONE NUOVA: Footer Campus (Perugia & Terni) */
        .campus-news-section {
            display: flex;
            flex-direction: row;
            padding: 10px 30px 40px 30px;
            gap: 30px;
            box-sizing: border-box;
            width: 100%;
        }

        .campus-card {
            flex: 1;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: inherit;
            border-top: 6px solid #004a99;
            transition: transform 0.2s, box-shadow 0.2s, border-top-color 0.2s;
        }

        .campus-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            border-top-color: #f39200; /* Vira all'arancione al passaggio */
        }

        .campus-title {
            font-size: 20px;
            font-weight: bold;
            color: #004a99;
            margin: 0 0 8px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .campus-subtitle {
            font-size: 13px;
            color: #64748b;
            margin: 0;
        }

        /* Ottimizzazione per tablet/mobile */
        @media (max-width: 900px) {
            .full-page-wrapper {
                flex-direction: column;
            }
            .right-column {
                order: -1;
            }
            .campus-news-section {
                flex-direction: column;
                padding-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="top-banner">
        <div class="top-banner-title">ITS UMBRIA <span>ACADEMY</span></div>
    </div>

    <div class="full-page-wrapper">
        
        <div class="left-column">
            
            <div class="card-panel">
                <h2 class="panel-title">Il Nostro Progetto</h2>
                <div class="panel-text">
                    Questo portale rappresenta il risultato pratico del nostro <strong>Project Work</strong>, un percorso strutturato in fasi sequenziali che ci ha permesso di simulare la progettazione e il deployment di un'infrastruttura IT aziendale reale.
                    <br><br>
                    Il lavoro si è sviluppato attraverso tre passaggi chiave:
                    <ul class="panel-list">
                        <li><strong>Analisi e Design di Rete:</strong> Configurazione iniziale della macchina virtuale Linux in modalità Bridge e strutturazione del servizio DNS locale.</li>
                        <li><strong>Sviluppo e Gestione Dati:</strong> Creazione della Web App dinamica in PHP e progettazione del database relazionale.</li>
                        <li><strong>Ottimizzazione e DevOps:</strong> Modernizzazione dell'architettura tramite fogli di stile avanzati e isolamento nei container.</li>
                    </ul>
                </div>
            </div>

            <div class="card-panel">
                <h2 class="panel-title" style="font-size: 18px;">Mappatura Competenze (Database Moduli IT)</h2>
                <table class="competence-table">
                    <thead>
                        <tr>
                            <th>ID_MODULO</th>
                            <th>UNITÀ FORMATIVA / AMBITO</th>
                            <th>CONTENUTI ED OBIETTIVI DI PROGETTO</th>
                            <th>DOCENTE TITOLARE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="code-col">INF-01</td>
                            <td class="subject-col">Database Relazionali</td>
                            <td class="desc-col">Progettazione dello schema logico, gestione tabelle partecipanti ed esecuzione di interrogazioni SQL.</td>
                            <td class="teacher-col">Pinchi Michael</td>
                        </tr>
                        <tr>
                            <td class="code-col">INF-02</td>
                            <td class="subject-col">Informatica / Ingegneria del Software</td>
                            <td class="desc-col">Sviluppo logico della Web App in ambiente PHP e strutturazione dell'interfaccia responsive (Front-End).</td>
                            <td class="teacher-col">Blasi Domenico</td>
                        </tr>
                        <tr>
                            <td class="code-col">NET-01</td>
                            <td class="subject-col">Reti di Calcolatori & Amministrazione</td>
                            <td class="desc-col">Configurazione dell'adattatore di rete a livello Bridge e gestione della Docenza sul servizio DNS locale.</td>
                            <td class="teacher-col">Marinello Marco</td>
                        </tr>
                        <tr>
                            <td class="code-col">VIR-01</td>
                            <td class="subject-col">Tecnologie di Virtualizzazione</td>
                            <td class="desc-col">Isolamento dell'applicazione e del database in microservizi leggeri gestiti tramite architettura di container Docker.</td>
                            <td class="teacher-col">Perri Damiano</td>
                        </tr>
                        <tr>
                            <td class="code-col">SYS-01</td>
                            <td class="subject-col">Gestione Sistemi Linux Server</td>
                            <td class="desc-col">Amministrazione dell'ambiente operativo ospitante tramite shell Bash, permessi e gestione dei demoni di sistema.</td>
                            <td class="teacher-col">Perri Damiano</td>
                        </tr>
                        <tr>
                            <td class="code-col">PRJ-01</td>
                            <td class="subject-col">Gestione dei Progetti</td>
                            <td class="desc-col">Pianificazione del workflow del Project Work e implementazione delle metodologie di sviluppo incrementale.</td>
                            <td class="teacher-col">Montegiove Sonia</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="right-column">
            
            <div class="card-panel blue-border login-box">
                <div class="login-title">🔑 Accesso al Sistema ITS</div>
                
                <?php if (!empty($errore)): ?>
                    <div class="error-message">❌ <?php echo htmlspecialchars($errore); ?></div>
                <?php endif; ?>

                <form action="index.php" method="POST">
                    <div class="input-group">
                        <label for="username">Nome Utente:</label>
                        <input type="text" id="username" name="username" placeholder="Es. admin" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="login-btn">Accedi al Sistema</button>
                </form>
                
                <a href="#" class="register-link">+ Non hai un account? Registrati</a>
            </div>

            <div class="image-container">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT65WW_Q5rYt-OeYhMW06xik2ZKJFzIX9mNqoPfZwBPMzrVBFmWdRA8r_9k&s=10" alt="ITS Umbria Academy Decorazione">
            </div>

        </div>

    </div>

    <div class="campus-news-section">
<a href="notizie.php?sede=perugia" class="campus-card">
        <h3 class="campus-title">📍 ITS Campus Perugia</h3>
        <p class="campus-subtitle">Clicca per visualizzare articoli, rassegna stampa e novità della sede</p>
    </a>

    <a href="notizie.php?sede=terni" class="campus-card">
        <h3 class="campus-title">📍 ITS Campus Terni</h3>
        <p class="campus-subtitle">Clicca per scoprire i bandi attivi, i progetti locali e le novità</p>
    </a>

</div> <div class="footer-container">
    
    <div class="footer-links">
        <a href="chi-siamo.php" target="_blank" class="testo-medio">Chi siamo?</a>
        <div class="link-logo-wrapper">
            <a href="come-realizzato.php" target="_blank" class="testo-medio">Come abbiamo realizzato il sito?</a>
            <img src="https://wp-notiziario.confindustria.umbria.it/wp-content/uploads/2023/09/Its-Umbria-Academy_logo-definitivo.png" alt="ITS Umbria Logo" class="logo-its">
        </div>
    </div>

    <div class="footer-emails">
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=allievo_bulletta.a@itsumbria.it" target="_blank" class="email-item">allievo_bulletta.a@itsumbria.it</a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=allievo_hamrich.z@itsumbria.it" target="_blank" class="email-item">allievo_hamrich.z@itsumbria.it</a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=allievo_marini.f@itsumbria.it" target="_blank" class="email-item">allievo_marini.f@itsumbria.it</a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=allievo_campanino.m@itsumbria.it" target="_blank" class="email-item">allievo_campanino.m@itsumbria.it</a>
    </div>

</div>

<style>
.footer-container {
    display: flex;
    width: 100%;
    margin-top: 30px;
    padding: 20px 0;
    border-top: 1px solid #444; 
    font-family: sans-serif;
    box-sizing: border-box;
}

.footer-links {
    display: flex;
    width: 75%; 
    justify-content: flex-start;
    gap: 45px;
    align-items: center;
}

.link-logo-wrapper {
    display: flex;
    align-items: center;
    gap: 12px; 
}

.logo-its {
    height: 35px; 
    width: auto;
    object-fit: contain;
}

.testo-medio {
    font-size: 1.2rem;
    font-weight: bold;
    color: #ffffff; 
    text-decoration: none;
}

.testo-medio:hover {
    text-decoration: underline;
    color: #ffffff;
}

.footer-emails {
    display: flex;
    flex-direction: column;
    width: 25%; 
    justify-content: center;
    gap: 5px;
    border-left: 1px solid #444; 
    padding-left: 15px;
}

.email-item {
    display: block;
    font-size: 0.95rem;
    color: #ffffff; 
    text-decoration: none; 
}

.email-item:hover {
    text-decoration: underline; 
    color: #ffffff;
}
</style>
</body>
</html>