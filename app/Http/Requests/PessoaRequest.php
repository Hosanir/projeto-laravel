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
            'name' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'max:2048'],
    }
    // Mensagens em português
    public function messages(): array
    {
        return [
            'name.required' => 'Informe o nome.',
            'name.max' => 'O nome pode ter no máximo 255 caracteres.',
            'foto.image' => 'O arquivo precisa ser uma imagem (jpg, png, webp...).',
            'foto.max' => 'A foto pode ter no máximo 2 MB.',
        ];
    }
}
