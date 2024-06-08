<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Datenbankverbindung herstellen
$host = 'db';
$dbname = 'autoverleih';
$username = 'root';
$password = 'macintosh';
$port = 3306;

try {
    $dsn = "mysql:host=$host;dbname=$dbname;port=$port;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

// Daten abrufen
$status = isset($_GET['status']) ? $_GET['status'] : 'all';
$queryStr = "SELECT * FROM autos";
$params = [];

if ($status === 'available') {
    $queryStr .= " WHERE status = :status";
    $params[':status'] = 'Available';
} elseif ($status === 'rented') {
    $queryStr .= " WHERE status = :status";
    $params[':status'] = 'Rented';
}

$query = $pdo->prepare($queryStr);
$query->execute($params);
$autos = $query->fetchAll(PDO::FETCH_ASSOC);

// Debugging-Informationen anzeigen
/*echo "<pre>";
print_r($autos);
echo "</pre>";
*/
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoverleih Übersicht</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 20px auto;
        }
        .filter-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .filter-bar select, .filter-bar button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Autoverleih Übersicht</h1>
    </header>
    <div class="container">
        <div class="filter-bar">
            <form method="GET" action="index.php">
                <select name="status">
                    <option value="all" <?php if ($status === 'all') echo 'selected'; ?>>Alle Autos</option>
                    <option value="available" <?php if ($status === 'available') echo 'selected'; ?>>Verfügbar</option>
                    <option value="rented" <?php if ($status === 'rented') echo 'selected'; ?>>Vermietet</option>
                </select>
                <button type="submit">Filtern</button>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Modell</th>
                    <th>Marke</th>
                    <th>Kennzeichen</th>
                    <th>Status</th>
                    <th>Bild</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($autos) > 0): ?>
                    <?php foreach ($autos as $auto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($auto['modell']); ?></td>
                            <td><?php echo htmlspecialchars($auto['marke']); ?></td>
                            <td><?php echo htmlspecialchars($auto['kennzeichen']); ?></td>
                            <td><?php echo htmlspecialchars($auto['status']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($auto['bild_url']); ?>" alt="<?php echo htmlspecialchars($auto['modell']); ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Keine Autos gefunden.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
