<?php
namespace App\Services;

use App\Models\Responsavel;
use App\Enums\StatusChamado;

class AtribuirResponsavelService  
{
    public function atribuir(): Responsavel
    {
        return Responsavel::query()->withCount(['chamados' => function ($query) {
            $query->whereIn('status', StatusChamado::abertos());
        }])->orderBy('chamados_count')->orderBy('id')->firstOrFail();
    }
}