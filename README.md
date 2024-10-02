# 📚 TP - Révisions POO en PHP avec PDO

## 📝 Contexte

Dans ce TP, vous allez créer une petite application **console** qui permet de gérer une bibliothèque de livres. L'application permettra d'ajouter, de supprimer et de lister des livres en mémoire et dans une base de données.  
L'objectif est de réviser la Programmation Orientée Objet (POO) en PHP tout en manipulant PDO pour interagir avec une base de données MySQL.

**⏳ Durée estimée : 4 heures**

## 🎯 Objectifs pédagogiques

1. Revoir la POO en PHP (classes, objets, méthodes, propriétés, typage...).
2. Revoir l'utilisation de PDO pour manipuler une base de données.
3. Appliquer les bonnes pratiques : séparation des responsabilités, utilisation des namespaces, et gestion des erreurs.

---

## 🔨 Partie 1 : Modélisation des classes (1h30 - 2h)

### 🏗️ Étape 1 : Créer la classe `Book`

1. Créez une classe **Book** avec les attributs **privés** suivants (vous devrez déduire leur type vous-même) :
   - `title`
   - `author`
   - `pages`
   - `isbn`
2. Implémentez le constructeur pour initialiser ces propriétés.
3. Ne créez pas de **getters** ou **setters**, tout de suite pour chaque propriété ! Attendez de savoir si vous avez besoin d'afficher ou de modifier la valeur de la propriété !
4. Utilisez la **méthode magique** `__toString` qui affiche les détails d'un livre.

**💡 Exemple de code :**

```php
<?php

namespace Classes;

class Book {
    private string $title;

    public function __construct(string $title) 
    {
        $this->title = $title;
    }

    public function __toString(): string 
    {
        return "Title: {$this->title}, ..." . PHP_EOL;
    }
}
```

**Note :** Un **namespace** en PHP sert à organiser le code et éviter les conflits de noms entre les classes, fonctions, ou constantes. C'est particulièrement utile lorsque tu travailles sur des projets avec plusieurs bibliothèques ou des morceaux de code provenant de différentes sources, car cela permet de gérer les classes ayant des noms identiques sans entrer en conflit.

### 🏛️ Étape 2 : Créer la classe `Library`

Créez une classe Library pour gérer plusieurs livres. Elle aura les responsabilités suivantes :

* 📥 Stocker un tableau de livres (Il va falloir utiliser ce que l'on appelle la composition en POO 😉).
* ➕ Ajouter un livre.
* 🗑️ Supprimer un livre par son ISBN.
* 📜 Lister tous les livres.

**💡 Exemple de code :**

Essayez de voir si vous arrivez à concevoir le code ! Je vous montrerais un exemple si vous bloquez ! 🚀

## 🗄️ Partie 2 : Introduction à PDO et interaction avec la base de données (2h)

### 🛠️ Étape 3 : Configurer la base de données

1. Créez une base de données MySQL nommée `library_db`.

2. Créez une table `books` avec les colonnes suivantes :
* `id` (int, auto_increment, clé primaire)
* `title` (varchar)
* `author` (varchar)
* `pages` (int)
* `isbn` (varchar)

### 💾 Étape 4 : Créer la classe `LibraryDB`

Cette classe devra hériter de **Library** et ajouter des méthodes pour interagir avec la base de données via PDO :

* ➕ Ajouter un livre à la base de données.
* 🗑️ Supprimer un livre de la base.
* 📜 Lister tous les livres à partir de la base.

**💡 Exemple de code :**
```php
<?php

namespace Classes;

class LibraryDB extends Library {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Vos méthodes customs ci-dessous
}
```

### 🧪 Étape 5 : Tester l'application

* ➕ Ajoutez des livres à la bibliothèque et à la base de données.
* 🗑️ Supprimez des livres en mémoire et dans la base de données.
* 📜 Listez les livres depuis la base de données.

**Exemple d'utilisation des commandes :** 
* `add` : `php script.php add "Le Petit Prince" "Antoine de Saint-Exupéry" 96 "978-3-16-148410-0"` 
* `remove` : `php script.php remove "978-3-16-148410-0"`
* `list` : `php script.php list`

