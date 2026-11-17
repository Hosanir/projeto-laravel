{{-- $pessoa é null ao criar e o objeto Pessoa ao editar --}}
<div class="mb-3">
<label for="nome" class="form-label">Nome</label>
<input type="text" id="nome" name="nome"
value="{{ old('nome', $pessoa?->nome) }}"
class="form-control @error('nome') is-invalid @enderror" required autofocus>
@error('nome')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>