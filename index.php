<?php
// ==========================================
// KONFIGURACJA POŁĄCZEŃ (MARIADB / MYSQL)
// ==========================================
$host = '127.0.0.1';
$port = '3306';
$db   = 'potyczki';
$user = 'potyczki';
$pass = 'potyczki';
$charset = 'utf8mb4';

$host2 = '127.0.0.1';
$port2 = '3306';
$db2   = 'sql56';
$user2 = 'tester';
$pass2 = 'SuperTajneHasloKonkursowe123';
$charset2 = 'utf8mb4';

// ==========================================
// TESTOWANIE POŁĄCZENIA
// ==========================================
$statusMsg = "";
try {
    // Budowanie Data Source Name
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
    
    // Próba połączenia z bazą
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 2 // 2 sekundy timeoutu, aby strona nie ładowała się w nieskończoność
    ]);
    
    // Sukces
    $statusMsg = "<span style='color: green; font-weight: bold;'>OK</span>";

} catch (PDOException $e) {
    // Błąd połączenia
    $statusMsg = "<span style='color: red; font-weight: bold;'>ERROR</span>";
    
    // Opcjonalnie: odkomentuj poniższą linię, aby wyświetlić dokładny powód błędu
    // $statusMsg .= " <span style='color: #777; font-size: 0.8em;'>(" . htmlspecialchars($e->getMessage()) . ")</span>";
}

$statusMsg2 = "";
try {
    // Budowanie Data Source Name
    $dsn2 = "mysql:host=$host2;port=$port2;dbname=$db2;charset=$charset2";
    
    // Próba połączenia z bazą
    $pdo = new PDO($dsn2, $user2, $pass2, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 2 // 2 sekundy timeoutu, aby strona nie ładowała się w nieskończoność
    ]);
    
    // Sukces
    $statusMsg2 = "<span style='color: green; font-weight: bold;'>OK</span>";

} catch (PDOException $e) {
    // Błąd połączenia
    $statusMsg2 = "<span style='color: red; font-weight: bold;'>ERROR</span>";
    
    // Opcjonalnie: odkomentuj poniższą linię, aby wyświetlić dokładny powód błędu
    // $statusMsg2 .= " <span style='color: #777; font-size: 0.8em;'>(" . htmlspecialchars($e->getMessage()) . ")</span>";
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Healthcheck Dash</title>
    <style>
        body { font-family: monospace; background-color: #f4f4f9; color: #333; padding: 40px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        h1 { font-size: 1.5em; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        .result { font-size: 1.2em; margin-top: 20px; padding: 15px; background: #f9f9f9; border-left: 5px solid #ccc; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weryfikacja bazy danych</h1>
        <div class="result">
            Status połączenia MariaDB: <?php echo $statusMsg; ?><br />
            Status połączenia MySQL 5.6: <?php echo $statusMsg2; ?>
        </div>
    </div>
</body>
</html>