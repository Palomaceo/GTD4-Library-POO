<?php

namespace Classes;

class Library {
    private array $books;

    public function getAll() : array
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        $this->books[] = $book;
        return $this;
    }

    public function removeBook(string $isbn): self
    {
        foreach ($this->books as $key => $book) {
            if ($book->getIsbn() === $isbn) {
                unset($this->books[$key]);
            }
        }
        return $this;
    }
}