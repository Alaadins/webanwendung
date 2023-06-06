<?php
session_start(); // Starte die Session

// Überprüfe, ob der Benutzer als Administrator angemeldet ist
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: index.php"); // Weiterleitung zur Startseite, wenn kein Administrator angemeldet ist
    exit;
}

// Verbindung zur SQLite-Datenbank herstellen
require("sqlite.php");

// Funktion zum Bearbeiten eines Benutzers
function bearbeitenBenutzer($id, $username) {
    // Hier kannst du den Code zum Bearbeiten des Benutzers einfügen
    // Zum Beispiel: Aktualisierung des Benutzernamens oder anderer Informationen in der Datenbank
    echo "Benutzer bearbeiten: $username (ID: $id)";
}

// Funktion zum Löschen eines Benutzers
function loeschenBenutzer($id, $username) {
    // Hier kannst du den Code zum Löschen des Benutzers einfügen
    // Zum Beispiel: Löschung des Benutzers aus der Datenbank
    echo "Benutzer löschen: $username (ID: $id)";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin-Ansicht</title>
    <!-- Füge hier deine CSS-Dateien und andere Ressourcen hinzu -->
</head>
<body>
    <h1>Admin-Ansicht</h1>

    <!-- Anzeige der Benutzerliste -->
    <?php
    $stmt = $sqlite->query("SELECT * FROM accounts");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) > 0) {
        echo "<table>";
        echo "<th>Benutzername</th>";
        
        

        foreach ($users as $user) {
           
            echo "<td>".$user['ID']."</td>";
            echo "<td>".$user['USERNAME']."</td>";
            
            echo "<a href='admin.php?action=edit&id=".$user['ID']."'>Bearbeiten</a> ";
            echo "<a href='admin.php?action=delete&id=".$user['ID']."'>Löschen</a>";
           
        }

        echo "</table>";
    } else {
        echo "Keine Benutzer vorhanden.";
    }
    ?>

    <!-- Verarbeite die Aktionen zum Bearbeiten oder Löschen eines Benutzers -->
    <?php
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        switch ($action) {
            case 'edit':
                bearbeitenBenutzer($id, $_SESSION['username']);
                break;
            case 'delete':
                loeschenBenutzer($id, $_SESSION['username']);
                break;
            default:
                echo "Ungültige Aktion.";
                break;
        }
    }
    ?>
</body>
</html>
