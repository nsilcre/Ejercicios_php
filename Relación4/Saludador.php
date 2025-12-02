<?php
namespace App\Util;

class Saludador
{
    public function __construct(private string $nombre) {}

    public function saludar(): string
    {
        return 'Hola, ' . $this->nombre . ' desde un namespace.';
    }
}
