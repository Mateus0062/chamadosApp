<?php

namespace App\Http\Requests;

use App\Enums\Prioridade;
use App\Enums\StatusChamado;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ChamadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string'],
            'prioridade' => ['required', Prioridade::class],
            'status' => ['required', StatusChamado::class],
            'responsavel_id' => ['nullable', 'exists:responsaveis,id'],
            'atribuir_auto' => ['nullable', 'boolean']
        ];
    }
}
