@extends('layouts.app')

@section('title', 'ORDEPDITA HOME')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

    <div class="carrossel-container">
        <div class="carrossel" id="carrossel">
            <img src="{{ asset('imagens/exemplo.jpg') }}" class="slide active" alt="Imagem 1">
            <img src="{{ asset('imagens/conselho.jpg') }}" class="slide" alt="Imagem 2">
            <img src="{{ asset('imagens/3.jpg') }}" class="slide" alt="Imagem 3">
            <img src="{{ asset('imagens/licenca-frente.jpg') }}" class="slide" alt="Imagem 4">
            <img src="{{ asset('imagens/licenca-tras.jpg') }}" class="slide" alt="Imagem 5">
            <img src="{{ asset('imagens/6.jpg') }}" class="slide" alt="Imagem 6">
            <img src="{{ asset('imagens/7.jpg') }}" class="slide" alt="Imagem 7">
            <img src="{{ asset('imagens/8.jpg') }}" class="slide" alt="Imagem 8">
        </div>
        <div class="dots" id="dots">
            @for($i = 0; $i < 8; $i++)
                <span class="dot @if($i === 0) active @endif" data-index="{{ $i }}"></span>
            @endfor
        </div>
    </div>

    <div class="cards-section">
        <a href="/inscricao">
            <div class="card">
                    <span>
                        <img src="{{ asset('imagens/info.svg') }}" alt="ícone de pesquisa" width="60px">
                    </span>
                <h3>Info</h3>
            </div>
        </a>
        <a href="/consultar">
        <div class="card">
            <span>
                <img src="{{ asset('imagens/search.svg') }}" alt="ícone de info" width="60px">
            </span>
            <h3>Consultor</h3>
    
        </div>
        </a>
        <a href="#">
            <div class="card">
                <span><img src="{{ asset('imagens/update.svg') }}" alt="ícone de atualização" width="60px"></span>
                <h3>Actualização</h3>
            </div>
        </a>
        <a href="/consultar">
        <div class="card">
            <span>
            <img src="{{ asset('imagens/intituicao.svg') }}" alt="ícone de instituição" width="60px">
            </span>
            <h3>Instituição</h3>
    
        </div>
        </a>
        <a href="#">
            <div class="card">
                <span><img src="{{ asset('imagens/dislike.svg') }}" alt="ícone de dislike" width="60px"></span>
                <h3>Reclamação</h3>
            </div>
        </a>
        <a href="/consultar">
        <div class="card">
            <span><img src="{{ asset('imagens/inscricao.svg') }}" alt="ícone de incrição" width="60px"></span>
            <h3>Inscrição</h3>
    
        </div>
        </a>  
    </div>
    
    <h1 id="noticia"> NOTÍCIAS </h1>
    <div class="news-section">
        <a href="{{ route('noticias.show', ['noticia' => 'noticia']) }}" rel="next" class="news-card">
            <div class="news-image">
                <img src="{{ asset('imagens/3.jpg') }}" alt="Notícia 1">
            </div>
            <p class="news-description">
                Comissão Instaladora
                <br><br><br><br><br>
                <span class="material-icons clock-icon">schedule</span> {{ date('d/m/Y') }}
            </p>
        </a>

        <a href="#" rel="next" class="news-card">
            <div class="news-image">
                <img src="{{ asset('imagens/7.jpg') }}" alt="Notícia 2">
            </div>
            <p class="news-description">
                Comissão Instaladora
                <br><br><br><br><br>
                <span class="material-icons clock-icon">schedule</span> {{ date('d/m/Y') }}
            </p>
        </a>

        <a href="#" rel="next" class="news-card">
            <div class="news-image">
                <img src="{{ asset('imagens/8.jpg') }}" alt="Notícia 1">
            </div>
            <p class="news-description">
                Comissão Instaladora
                <br><br><br><br><br>
                <span class="material-icons clock-icon">schedule</span> {{ date('d/m/Y') }}
            </p>
        </a> 
    </div>

    <section id="amarela">
        <div id="image">
            <img src="{{ asset('imagens/conselho.jpg') }}" alt="Notícia 1">
        </div>
        <div id="conteudo">    
            <h1>SOBRE A NOSSA INSTITUIÇÃO</h1>
            <p>
                A AATDSPA é uma associação angolana criada desde 17 de Setembro de 2017, com o propósito de representar, apoiar e valorizar os Técnicos de Diagnóstico e Terapêutica, bem como os profissionais da Saúde Pública, promovendo a formação contínua, ética profissional e a defesa dos seus direitos e deveres em todo o território nacional e Internacional.
            </p>
            <details>
                <summary>Ver mais</summary>
                <h2>Missão</h2>
                <p>
                    Contribuir para o fortalecimento e reconhecimento dos técnicos de Diagnóstico e Terapeutica bem como os profissionais de saúde pública em Angola, promovendo ações de apoio, formação técnica, representação institucional e desenvolvimento profissional contínuo.
                </p>
                <h2>Visão</h2>
                <p>
                    Ser uma entidade de referência nacional na valorização, organização e defesa dos profissionais das áreas de Diagnóstico e Terapeutica,  como os da saúde pública, promovendo a excelência, dignidade e credibilidade da classe.
                </p>
                <h2>Valores</h2>
                           <ul>
                    <li>Compromisso com a saúde pública</li>
                    <li>Ética e transparência</li>
                    <li>Valorização do profissional</li>
                    <li>Justiça e igualdade</li>
                    <li>Inovação e responsabilidade social</li>
                 </ul>
                 <h2>Objectivos</h2>
                    <ul>
                        <li>Representar os associados junto das autoridades e instituições competentes.  </li>
                        <li>Promover formações, workshops e seminários de capacitação.</li>
                    </ul>
            </details>
        </div>
    </section>
    <secion id="agendar-visita-container">
        <div id="agendar-visita-disclaimer">
            <p>caso queira contactar-nos agendar visita</p>
        </div>
        <div id="agendar-visita-btn">
            <a href="#">Agendar visita</a>
        </div>
    </secion>

    <section id="gps">
        <img src="{{ asset('imagens/5.jpg') }}" alt="mapa mundo">
    </section>

@endsection