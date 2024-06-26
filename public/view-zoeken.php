<?php
require_once '../src/inc/session_check.php'; 
view('header', ['title' => 'Dashboard']); 

// Controleer of resultaten in de sessie zijn opgeslagen

require_once '../src/inc/session_check.php'; 
view('header', ['title' => 'Dashboard']);

class ResultatenWeergave {

    public function toonResultaten() {
        if (isset($_SESSION['resultaten'])) {
            $resultaten = $_SESSION['resultaten'];
            unset($_SESSION['resultaten']); // Verwijder resultaten uit de sessie om opschonen

            // Toon de resultaten in een tabel
            echo "<h1>Zoekresultaten</h1>";
            echo "<table border='1'>";
            foreach ($resultaten as $tabel => $resultaat) {
                if (!empty($resultaat)) { // Controleer of het resultaat niet leeg is
                    echo "<tr><th colspan='" . (count($resultaat[0]) + 1) . "'>$tabel</th></tr>";
                    foreach ($resultaat as $row) {
                        echo "<tr>";
                        foreach ($row as $kolom => $waarde) {
                            echo "<td>$waarde</td>";
                        }
                        // Haal het ID op uit de rij
                        $id = $row['id'];
                        // Bewerkingslink toevoegen met het juiste ID en de juiste bewerkingspagina
                        $this->toonBewerkingslink($tabel, $id);
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Geen resultaten gevonden voor $tabel</td></tr>";
                }
            }
            echo "</table>";
        } else {
            header('Location: dashboard.php');
            exit();
        }
    }

    private function toonBewerkingslink($tabel, $id) {
        if ($tabel == 'products') {
            echo "<td>
                    <a class='edit-data' href='editProduct.php?id=$id'>
                        <ion-icon name='pencil-outline'></ion-icon>
                    </a>
                  </td>";
        } elseif ($tabel == 'customers') {
            echo "<td>
                    <a class='edit-data' href='editcustomers.php?id=$id'>
                        <ion-icon name='pencil-outline'></ion-icon>
                    </a>
                  </td>";
        } elseif ($tabel == 'suppliers') {
            echo "<td>
                    <a class='edit-data' href='editSupplier.php?id=$id'>
                        <ion-icon name='pencil-outline'></ion-icon>
                    </a>
                  </td>";
        }
    }
}

$weergave = new ResultatenWeergave();
$weergave->toonResultaten();

?>






