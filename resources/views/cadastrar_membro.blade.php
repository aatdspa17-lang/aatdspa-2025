@extends('admin')

@section('content')
<div class="form-container">
    <h2>Cadastrar Técnico</h2>

    <!-- Mensagem de sucesso -->
    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulário -->
    <form action="{{ route('tecnico.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="bi">Nº do Bilhete:</label>
            <input type="text" id="bi" name="bi" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>

        <div class="form-group">
            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="especialidade" required>
                <option value="">Selecione...</option>
                <option value="Laboratório">Laboratório</option>
                <option value="Radiologia">Radiologia</option>
                <option value="Farmácia">Farmácia</option>
                <option value="Enfermagem">Enfermagem</option>
            </select>
        </div>

        <button type="submit" class="btn">Cadastrar</button>
    </form>
</div>

<style>
.form-container {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    max-width: 600px;
    margin: auto;
    box-shadow: 0 4px 6px rgba(0,0,0,0.2);
}
.form-group {
    margin-bottom: 15px;
}
.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}
.form-group input, 
.form-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
.btn {
    background: #0a0434;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}
.btn:hover {
    background: #1a155a;
}
.alert.success {
    background: #d4edda;
    color: #155724;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 15px;
}
</style>
@endsection
