<?php

namespace App\Enums;

enum StatusChamado: string
{
    case Aberto = 'aberto';
    case EmAndamento = 'em_andamento';
    case Resolvido = 'resolvido';
    case Fechado = 'fechado';

    public static function abertos(): array 
    {
        return [self::Aberto->value, self::EmAndamento->value];
    }

    public function estaEmAberto(): bool 
    {
        return in_array($this->value, self::abertos(), true);
    }
}