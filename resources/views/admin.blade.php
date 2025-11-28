<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ORDEPDITA - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">
                <a href="{{ route('dashbord') }}">
                    <img src="{{ asset('images/logo.jpg') }}" class="logo" alt="logo">
                    <h2 class="ordemNome">ORDEPDITA</h2>
                </a>
            </div>
            <div class="vazio"></div>

            <nav class="menu">
                <a href="{{ route('dashbord') }}"><span class="material-icons">home</span> Página principal</a>

                <!-- Gestão de Técnicos -->
                <div class="submenu-toggle">
                    <span class="left">
                        <span class="material-icons">group</span>
                        Gestão de Técnicos
                    </span>
                    <span class="material-icons arrow">expand_more</span>
                </div>
                <ul class="submenu">
                    <li><a href="{{ route('cadastrar_membro') }}">Cadastrar Técnico</a></li>
                    <li><a href="{{ route('tecnicos.indexs') }}">Listar Técnicos</a></li>
                    <li><a href="#">Relatórios</a></li>
                </ul>

                <!-- Gestão de Carteiras -->
                <div class="submenu-toggle">
                    <span class="left">
                        <span class="material-icons">badge</span>
                        Gestão de Carteiras
                    </span>
                    <span class="material-icons arrow">expand_more</span>
                </div>
                <ul class="submenu">
                    <li><a href="#">Emitir Carteira</a></li>
                    <li><a href="#">Renovar Carteira</a></li>
                </ul>

                <!-- Solicitações -->
                <div class="submenu-toggle">
                    <span class="left">
                        <span class="material-icons">assignment</span>
                        Solicitações
                    </span>
                    <span class="material-icons arrow">expand_more</span>
                </div>
                <ul class="submenu">
                    <li><a href="#">Solicitações Pendentes</a></li>
                    <li><a href="#">Histórico de Solicitações</a></li>
                </ul>

                <!-- Finanças -->
                <div class="submenu-toggle">
                    <span class="left">
                        <span class="material-icons">account_balance</span>
                        Finanças
                    </span>
                    <span class="material-icons arrow">expand_more</span>
                </div>
                <ul class="submenu">
                    <li><a href="#">Pagamentos</a></li>
                    <li><a href="#">Relatórios Financeiros</a></li>
                </ul>

                <span class="menu-title">Admin</span>
                <a href="#"><span class="material-icons">settings</span> Configurações</a>
                <!-- Link Logout -->
                <!-- Botão Logout -->
                <a href="#" class="logout"><span class="material-icons">logout</span> Logout</a>

                <!-- Form de Logout escondido -->
                <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>

            </nav>
        </aside>

        <!-- Conteúdo -->
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    <!-- Modal de confirmação -->
    <div class="modal" id="logoutModal">
    <div class="modal-content">
        <h3>Tem certeza que deseja terminar a sessão?</h3>
        <div class="modal-buttons">
            <button class="btn-confirm" id="confirmLogout">Sim</button>
            <button class="btn-cancel" id="cancelLogout">Cancelar</button>
        </div>
    </div>
</div>
    <script>
        // Script para abrir/fechar submenu
        document.querySelectorAll('.submenu-toggle').forEach(toggle => {
            toggle.addEventListener('click', () => {
                toggle.classList.toggle('active');
                const submenu = toggle.nextElementSibling;
                submenu.classList.toggle('open');
            });
        });

         // Modal de logout
        const logoutBtn = document.querySelector('.logout');
    const modal = document.getElementById('logoutModal');
    const confirmBtn = document.getElementById('confirmLogout');
    const cancelBtn = document.getElementById('cancelLogout');

    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();
        modal.style.display = 'flex';
    });

    cancelBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    confirmBtn.addEventListener('click', () => {
        document.getElementById('logoutForm').submit();
    });

    </script>
</body>
</html>
