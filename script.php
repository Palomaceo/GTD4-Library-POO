<?php

// Inclure les classes ici (Book, LibraryDB)
use Classes\Book;
use Classes\Library;
use Classes\LibraryDB;

require_once "./Classes/Book.php";
require_once "./Classes/Library.php";
require_once "./Classes/LibraryDB.php";

$dsn = 'mysql:host=localhost;dbname=library_db;charset=utf8';
$username = 'root'; // Ajouter votre nom d'utilisateur de bdd local (Exemple : root)
$password = ''; // Ajouter votre mot de passe de bdd local

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Instance de PDO pour manipuler la base de données
// Question, pourquoi avoir créé cette classe LibraryDB et pas directement avoir tout fais dans PDO ?
$libraryDb = new LibraryDB($pdo);

// Vérifier si des arguments sont passés dans la ligne de commande
if (isset($_SERVER['argv']) && count($_SERVER['argv']) > 1) {
    
    // Le premier argument après le nom du script est la commande
    $command = $_SERVER['argv'][1];

    switch ($command) {
        case 'add':
            // Vérifier que tous les arguments nécessaires pour add un livre sont passés
            if (count($_SERVER['argv']) === 6) {
                $title = $_SERVER['argv'][2];
                $author = $_SERVER['argv'][3];
                $pages = (int) $_SERVER['argv'][4];
                $isbn = $_SERVER['argv'][5];

                $book = new Book($title, $author, $pages, $isbn);
                $libraryDb->addBookToDB($book);
                echo "Livre ajouté : {$title}\n";
            } else {
                echo "Utilisation : php script.php add \"Titre\" \"Auteur\" Pages ISBN\n";
            }
            break;

        case 'remove':
            if (count($_SERVER['argv']) === 3) {
                $isbn = $_SERVER['argv'][2];
                $libraryDb->removeBookFromDB($isbn);
                echo "Livre supprimé avec ISBN : {$isbn}\n";
            } else {
                echo "Utilisation : php script.php remove ISBN\n";
            }
            break;

        case 'list':
            echo "Liste des livres dans la base de données :\n";
            $libraryDb->listBooksFromDB();
            break;

        default:
            echo "Commande inconnue. Utilisez 'add', 'remove', ou 'list'.\n";
    }
} else {
    echo "Aucune commande détectée. Utilisez 'add', 'remove', ou 'list'.\n";
}
