<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class PessoaRequest extends FormRequest
{
    // A permissão já é checada na rota (can:admin), então aqui liberamos
    public function authorize(): bool
    {
        return true;
    }
    // Regras de validação
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:255'],
        ];
    }
    // Mensagens em português
    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome.',
            'nome.max' => 'O nome pode ter no máximo 255 caracteres.',
        ];
    }
}