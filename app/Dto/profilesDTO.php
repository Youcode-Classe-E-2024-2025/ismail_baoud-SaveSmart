<?php

namespace App\Dto;
class profilesDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $image,
        public string $created_at
    ) {}
}
