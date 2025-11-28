<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Carteiras Técnicos de Saúde')</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <!-- IMPORTAÇÃO DOS ÍCONES DO GOOGLE -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=info" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Importação dos links do fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    @yield('styles')
</head>
<body>

    <!-- MENU COM SUBMENUS -->
   <nav class="navbar">
    <ul class="menu">

        <li>
            <a href="{{ url('/') }}">
                <img src="{{ asset('imagens/associação-logo.jpg') }}" class="logo" alt="logo">
            </a>
        </li>

        <li><a href="{{ url('/') }}"><span class="material-icons">home</span> Início</a></li>
        
        <li class="has-submenu"><span class="material-icons">business</span> Institucional
            <ul class="submenu">
                <li><a href="#">Histórico</a></li>
                <li><a href="#">Missão e Visão</a></li>
                <li><a href="#">Estatuto</a></li>
                <li><a href="#">Quem somos</a></li>
                <li><a href="#">Visão</a></li>
                <li><a href="#">Estatutos</a></li>
                <li><a href="#">Mensagem do presidente</a></li>
                <li><a href="#">Princípios Fundamentais</a></li>
                <li><a href="#">Princípios FundamentaisAtribuições</a></li>
                <li><a href="#">Planos de Actividade</a></li>
                <li><a href="#">Historial da AATDSPA</a></li>
                <li><a href="#">Tomada de Posse | 2013 2020 - Actual</a></li>
                <li><a href="#">Tomada de Posse | 2020 - Actual</a></li>
                <li><a href="#">Parcerias: Nacionais e Internacionais</a></li>
            </ul>
        </li>
        <li class="has-submenu"><span class="material-icons">groups</span> Órgãos Sociais
            <ul class="submenu">
                <li><a href="#">Direção</a></li>
                <li><a href="#">Assembleia</a></li>
                <li><a href="#">Conselhos</a></li>
                <li><a href="">Assembleia Geral</a></li> 
                <li><a href="">presidente</a></li>
                <li><a href="">Conselho Nacional</a></li>
                <li><a href="#">Conselhos Regionais</a></li> 
                <li><a href="#">Órgãos Consultivos Nacionais</a></li>
                <li><a href="#">Estatuto da aatdspa</a></li>
                <li><a href="#">Perfil dos Membros</a></li>
                <li><a href="#">Organograma</a></li>
                <li><a href="#">Consulta dos membros da Aatdspa</a></li>
            </ul>
        </li>
        <li class="has-submenu"><span class="material-icons">person</span> A Profissão
            <ul class="submenu">
                <li><a href="#">Perfil Profissional</a></li>
                <li><a href="#">Áreas de Atuação</a></li>
                <li><a href="#">Exercício da Profissão</a></li> 
                <li><a href="#">Áreas de Actuação</a></li> 
                <li><a href="#">Áreas de Actuação em Angola</a></li>
                <li><a href="#">Carteira Profissional</a></li> 
                <li><a href="#">História da associação aatdspa - Angola</a></li>
            </ul>
        </li>
        <li class="has-submenu"><span class="material-icons">gavel</span> Regulamentos
            <ul class="submenu">
                <li><a href="#">Código Deontológico</a></li>
                <li><a href="#">Normas</a></li>

                <li><a href="#">Deliberações – Aatdspa</a></li>
                <li><a href="#">Regulamentos – Aatdspa</a></li>
                <li><a href="#">Documentos em Consulta Pública</a></li>
            </ul>
        </li>
        <li class="has-submenu"><span class="material-icons">medical_services</span> Informação D. Terapeutica
            <ul class="submenu">
                <li><a href="/informacao">Boletins</a></li>
                <li><a href="#">Estudos</a></li>
                <li><a href="#">Legislação</a></li>
                <li><a href="#">Formação e Qualidade</a></li>
                <li><a href="">Links utéis</a></li>
                <li><a href="#">Publicações</a></li>
            </ul>
        </li>

            <li class="pagamento">
                <a href="/pagamento"><span class="material-icons">payments</span> Pagamento</a>
            </li>
        </ul>
        <a id="area_restrita" href="/login">Área Restrita</a>
    </nav>


        <!-- CONTEÚDO PRINCIPAL -->
        <div class="main-content">
         @yield('content')
        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <div class="footer-column">
                <h4><span class="material-icons">account_balance</span> AATDSPA</h4>
                <section class="seccao"></section>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.jpeg') }}" class="logo" alt="logo">
                </a><br>
                <h1>Download AATDSPA App</h1>
          
                    <a href="#" class="app-logo">
                        <img src="{{ asset('fotos/icone-play-store-c.png') }}" class="app" alt="logo">
                    </a>
                    <a href="#" class="app-logo">
                        <img src="{{ asset('fotos/icone-app-store.svg') }}" class="app" alt="logo">
                    </a>
                
            </div>
            <div class="footer-column">
                <h4><span class="material-icons">contact_phone</span> Contactos</h4>
                <section class="seccao"></section>
                <p id="sinza">Em caso de dúvidas ou sugestões, <br>contate-nos</p>
                <br>
                <a id="link_footer" href="#">Endereço e Telefones</a>
            </div>
            <div class="footer-column">
                <h4><span class="material-icons">campaign</span> Comunicação</h4>
                <section class="seccao"></section>
                <p id="sinza">Comunicados, discursos e eventos.</p>
                <a id="link_footer" href="#">Agenda da AATDSPA </a><br>
                <a id="link_footer" href="#">Discursos</a> <br>
                <a id="link_footer" href="#">Eventos</a> <br>
                <a id="link_footer" href="#">Galeria de Imagens</a>
            </div>
            <div class="footer-column">
                <h4><span class="material-icons">share</span> Redes Sociais</h4>
                <section class="seccao"></section>
                <p>Para facilitar o contato e disseminação das informações, a AATDSPA dispõe de algumas redes sociais:</p>
                <div id="redes-container">
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="rede-social-card">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="TIKTOK" class="rede-social-card">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="rede-social-card">
                      <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Whatsapp" class="rede-social-card">
                      <i class="fa-brands fa-square-whatsapp"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="rede-social-card" class="rede-social-card">
                        <i class="fa-brands fa-square-instagram"></i>
                    </a>
                </div>
                <p id="sinza">Siga nossas redes sociais e mantenha-se informado(a).</p>
            </div>
        </footer>
    

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const items = document.querySelectorAll('.has-submenu');

                items.forEach(item => {
                    item.addEventListener('click', function (e) {
                        // Evita abrir todos ao mesmo tempo
                        items.forEach(i => {
                            if (i !== item) i.classList.remove('active');
                        });

                        // Toggle da classe
                        item.classList.toggle('active');
                        e.stopPropagation();
                    });
                });

                // Fecha submenu clicando fora
                document.body.addEventListener('click', function () {
                    items.forEach(i => i.classList.remove('active'));
                });
            });

            document.addEventListener('DOMContentLoaded', () => {
                const slides = document.querySelectorAll('.slide');
                const dots = document.querySelectorAll('.dot');
                let index = 0;
                let interval = setInterval(nextSlide, 5000); // 5 segundos

                function showSlide(i) {
                    slides.forEach((slide, idx) => {
                        slide.classList.toggle('active', idx === i);
                        dots[idx].classList.toggle('active', idx === i);
                    });
                    index = i;
                }

                function nextSlide() {
                    index = (index + 1) % slides.length;
                    showSlide(index);
                }

                dots.forEach(dot => {
                    dot.addEventListener('click', () => {
                        clearInterval(interval);
                        showSlide(parseInt(dot.dataset.index));
                        interval = setInterval(nextSlide, 5000); // reinicia intervalo
                    });
                });
            });
        </script>


    </body>
</html>
