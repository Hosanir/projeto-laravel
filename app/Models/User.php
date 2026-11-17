<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    // Campos liberados para preenchimento em massa
    protected $fillable = ['name', 'email', 'password', 'nivel_acesso'];
    // Campos que nunca aparecem quando o model vira array/JSON
    protected $hidden = ['password', 'remember_token'];   
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // grava a senha já criptografada
            'nivel_acesso' => 'integer', // sempre devolve número, não texto
        ];
    }

    public function isAdmin(): bool
    {

        return $this->nivel_acesso === 2;
    }
}
