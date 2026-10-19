<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione Account - ITS Umbria</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: linear-gradient(135deg, #004a99 0%, #002d5c 100%); display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .reg-card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); border-top: 6px solid #f39200; width: 100%; max-width: 350px; }
        h2 { color: #004a99; margin-top: 0; font-size: 22px; text-align: center; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-size: 14px; font-weight: bold; margin-bottom: 5px; color: #333; }
        input { width: 92%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .btn { width: 100%; padding: 10px; background-color: #004a99; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .btn:hover { background-color: #f39200; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>
    <div class="reg-card">
        <h2>📝 Crea il tuo Account DB</h2>
        <form action="index.php" method="GET">
            <div class="form-group">
                <label>Nuovo Nome Utente:</label>
                <input type="text" placeholder="Scegli username" required>
            </div>
            <div class="form-group">
                <label>Nuova Password:</label>
                <input type="password" placeholder="Scegli password" required>
            </div>
            <button type="submit" class="btn">Registra Account</button>
        </form>
        <a href="index.php" class="back-link">Torna al Login</a>
    </div>
</body>
</html>
