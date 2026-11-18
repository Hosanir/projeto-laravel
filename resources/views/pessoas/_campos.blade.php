{{-- $pessoa é null ao criar e o objeto Pessoa ao editar --}}
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" id="nome" name="name"
        value="{{ old('nome', $pessoa?->name) }}"
        class="form-control @error('name') is-invalid @enderror" required autofocus>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>