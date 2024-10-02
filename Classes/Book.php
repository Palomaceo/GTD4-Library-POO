<?php

namespace Classes;

class Book {
    private string $title;
    private string $author;
    private int $pages;
    private int $isbn;

    public function __construct(string $title, string $author, int $pages, int $isbn) 
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

}