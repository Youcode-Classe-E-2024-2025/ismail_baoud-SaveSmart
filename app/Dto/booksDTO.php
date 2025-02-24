<?php

namespace App\Dto;
class booksDTO
{
public function __construct(
public int $id,
public string $title,
public string $author,
public string $image,
public string $description,
public string $price,
public string $created_at,
    public $status
) {}
}
