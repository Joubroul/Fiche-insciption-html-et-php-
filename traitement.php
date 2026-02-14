<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Récupération et sécurisation des données
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $password = htmlspecialchars($_POST['password']); 

    // 2. Création de la ligne à sauvegarder avec les nouvelles infos
    // Format : Prénom | Nom | Email | Tél | Date
    $ligne = "Prénom: $prenom | Nom: $nom | Email: $email | Tél: $tel | Date: " . date('Y-m-d H:i:s') . "\n";

    // 3. Sauvegarde dans le fichier
    $fichier = 'inscriptions.txt';

    if (file_put_contents($fichier, $ligne, FILE_APPEND)) {
        echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "<h1 style='color: green;'>Inscription réussie !</h1>";
        echo "<p>Merci <strong>$prenom $nom</strong>, nous vous contacterons au <strong>$tel</strong>.</p>";
        echo "<a href='index.html' style='display: inline-block; margin-top: 20px; padding: 10px 20px; background: #333; color: white; text-decoration: none; border-radius: 5px;'>Retour</a>";
        echo "</div>";
    } else {
        echo "Erreur technique lors de l'enregistrement.";
    }
} else {
    header("Location: index.html");
    exit();
}
?>
