@extends('admin')

@section('content')
    <div class="dashboard">
        <div class="card blue">
            <div class="card-header">
                <span class="material-icons">groups</span>
                <h3>TOTAL DE TÉCNICOS</h3>
            </div>
            <p>{{ $totalTecnicos }}</p>
        </div>

        <div class="card green">
            <div class="card-header">
                <span class="material-icons">verified</span>
                <h3>TÉCNICOS ACTIVOS</h3>
            </div>
            <p>0</p>
        </div>

        <div class="card marron">
            <div class="card-header">
                <span class="material-icons">assignment</span>
                <h3>SOLICITAÇÕES <br>PENDENTES</h3>
            </div>
            <p>0</p>
        </div>

        <div class="card darkblue">
            <div class="card-header">
                <span class="material-icons">badge</span>
                <h3>CARTEIRAS EMITIDAS</h3>
            </div>
            <p>0</p>
        </div>
    </div>










    <div class="panel">
        <!-- Aqui pode entrar gráficos, tabelas, relatórios etc. -->
    </div>
@endsection
