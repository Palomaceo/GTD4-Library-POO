<?php

namespace Classes;

use PDO;

class LibraryDB extends Library {
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Vos méthodes customs ci-dessous

    public function addBookToDB(Book $book): self
    {
        $req = "INSERT INTO books (title, author, pages, isbn) VALUES (:title, :author, :pages, :isbn)";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute([
            ":title" => $book->getTitle(),
            ":author" => $book->getAuthor(),
            ":pages" => $book->getPages(),
            ":isbn" => $book->getIsbn(),
        ]);
        return $this;
    }

    public function removeBookFromDB(string $isbn): self
    {
        $req = "DELETE FROM books WHERE isbn = :isbn";
        $stmt = $this->pdo->prepare($req);
        $stmt->execute([
            ":isbn" => $isbn,
        ]);
        return $this;
    }

    public function listBooksFromDB() : self
    {
        $req = "SELECT * FROM books";
        $stmt = $this->pdo->query($req);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($books as $book) {
            echo "Title: {$book['title']}, Author: {$book['author']}, Pages: {$book['pages']}, ISBN: {$book['isbn']}" . PHP_EOL;
        }
        return $this;
    }
}