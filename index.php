<?php
// ==========================================
// KONFIGURACJA POŁĄCZEŃ
// ==========================================

// PostgreSQL Prod
$pg_host = '127.0.0.1';
$pg_port = '5432';
$pg_db   = 'konkurs_db';
$pg_user = 'konkurs_user';
$pg_pass = 'TajneHasloDB123';

// PostgreSQL Test
$pg2_host = '127.0.0.1';
$pg2_port = '15432';
$pg2_db   = 'postgres15';
$pg2_user = 'postgres';
$pg2_pass = 'SuperTajneHasloKonkursowe123';

// ==========================================
// TESTOWANIE POŁĄCZEŃ
// ==========================================

// 1. Test PostgreSQL 18
$dbStatus = "<span style='color: red;'>BŁĄD</span>";
$dbError = "";
try {
    $dsn = "pgsql:host=$pg_host;port=$pg_port;dbname=$pg_db";
    $pdo = new PDO($dsn, $pg_user, $pg_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $dbStatus = "<span style='color: green;'>OK</span>";
} catch (PDOException $e) {
    $dbError = " (" . htmlspecialchars($e->getMessage()) . ")";
}
// 2. Test PostgreSQL 15
$dbStatus2 = "<span style='color: red;'>BŁĄD</span>";
$dbError2 = "";
try {
    $dsn2 = "pgsql:host=$pg2_host;port=$pg2_port;dbname=$pg2_db";
    $pdo2 = new PDO($dsn2, $pg2_user, $pg2_pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $dbStatus2 = "<span style='color: green;'>OK</span>";
} catch (PDOException $e) {
    $dbError2 = " (" . htmlspecialchars($e->getMessage()) . ")";
}

// ==========================================
// WIDOK (HTML)
// ==========================================
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Status Systemu</title>
    <style>
        body { font-family: monospace; background-color: #f4f4f9; color: #333; padding: 40px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
        h1 { font-size: 1.5em; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
        ul { list-style-type: none; padding: 0; font-size: 1.2em; }
        li { margin-bottom: 15px; padding: 10px; background: #f9f9f9; border-left: 5px solid #ccc; }
        .error-msg { font-size: 0.8em; color: #777; display: block; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Status systemu</h1>
        <ul>
            <li>
                <strong>Prod Database (PostgreSQL 18):</strong> <?php echo $dbStatus; ?>
                <?php if($dbError) echo "<span class='error-msg'>$dbError</span>"; ?>
            </li>
            <li>
                <strong>Test Database (PostgreSQL 15):</strong> <?php echo $dbStatus2; ?>
                <?php if($dbError2) echo "<span class='error-msg'>$dbError2</span>"; ?>
            </li>
        </ul>
    </div>
</body>
</html>