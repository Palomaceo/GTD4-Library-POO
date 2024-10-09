<?php

namespace Classes;

class Book {
    private string $title;
    private string $author;
    private int $pages;
    private string $isbn;

    public function __construct(string $title, string $author, int $pages, string $isbn)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
        $this->isbn = $isbn;
    }
    
    public function __toString(): string
    {
        return "Title: {$this->title}, Author: {$this->author}, Pages: {$this->pages}, ISBN: {$this->isbn}" . PHP_EOL;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getPages(): string
    {
        return $this->pages;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }
}