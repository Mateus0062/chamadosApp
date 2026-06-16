<?php
namespace App\Models;

use App\Enums\Prioridade;
use App\Enums\StatusChamado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chamado extends Model
{
    protected $table = 'chamados';
    protected $fillable = ['titulo', 'descricao', 'prioridade', 'status', 'responsavel_id'];

    protected function casts(): array 
    {   
        return [
            'prioridade' => Prioridade::class,
            'status' => StatusChamado::class,
        ];
    }
    
    public function responsavel(): BelongsTo
    {
        return $this->belongsTo(Responsavel::class, 'responsavel_id');
    }
}