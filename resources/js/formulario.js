 // Elementos do DOM
        const photoUpload = document.getElementById('photoUpload');
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const progressSteps = document.querySelectorAll('.progress-step');
        const form = document.getElementById('registrationForm');

        // Upload de foto
        photoUpload.addEventListener('click', () => {
            photoInput.click();
        });

        photoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file && file.type.match('image.*')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    photoPreview.src = e.target.result;
                    photoPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Validações
        function validarBI(bi) {
            const regex = /^[0-9]{9}[A-Z]{2}[0-9]{3}$/;
            return regex.test(bi);
        }

        function validarTelefone(telefone) {
            const regex = /^(?:\+244)?9\d{8}$/;
            return regex.test(telefone);
        }

        function calcularIdade(nascimento) {
            const hoje = new Date();
            const nascimentoDate = new Date(nascimento);
            let idade = hoje.getFullYear() - nascimentoDate.getFullYear();
            const m = hoje.getMonth() - nascimentoDate.getMonth();
            if (m < 0 || (m === 0 && hoje.getDate() < nascimentoDate.getDate())) {
                idade--;
            }
            return idade;
        }

        function validarDatasBI(emissaoBI, validadeBI) {
            const hoje = new Date();
            const emissao = new Date(emissaoBI);
            const validade = new Date(validadeBI);
            if (emissao > hoje) return 'A data de emissão não pode ser no futuro.';
            if (validade <= hoje) return 'A data de validade deve ser maior que a data atual.';
            return null;
        }

        // Validação do formulário antes de enviar
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nome = document.getElementById('nome').value.trim();
            const bi = document.getElementById('bi').value.trim();
            const telefone = document.getElementById('telefone').value.trim();
            const dataNascimento = document.getElementById('nascimento').value;
            const dataEmissao = document.getElementById('emissaoBI').value;
            const dataValidade = document.getElementById('validadeBI').value;
            const estadoCivil = document.getElementById('estadoCivil').value;
            const nacionalidade = document.getElementById('nacionalidade').value;
            const pai = document.getElementById('pai').value.trim();
            const mae = document.getElementById('mae').value.trim();
            const provincia = document.getElementById('provincia').value;
            const naturalidade = document.getElementById('naturalidade').value.trim();
            const municipio = document.getElementById('municipio').value.trim();
            const bairro = document.getElementById('bairro').value.trim();
            const contribuinte = document.getElementById('contribuinte').value.trim();

            if (nome === '') {
                alert('Por favor, preencha seu nome completo.');
                return;
            }

            if (estadoCivil === '') {
                alert('Por favor, selecione estado cívil.');
                return;
            }

            if (nacionalidade === '') {
                alert('Por favor, selecione nacionalidade.');
                return;
            }

            if (pai === '') {
                alert('Por favor, preencha nome completo do teu pai.');
                return;
            }

            if (mae === '') {
                alert('Por favor, preencha nome completo da sua mãe.');
                return;
            }

            if (provincia === '') {
                alert('Por favor, selecione província.');
                return;
            }

            if (naturalidade === '') {
                alert('Por favor, preencha naturalidade');
                return;
            }

            if (municipio === '') {
                alert('Por favor, preencha municipio');
                return;
            }

            if (bairro === '') {
                alert('Por favor, preencha bairro');
                return;
            }

            if (contribuinte === '') {
                alert('Por favor, preencha o número de contribuinte.');
                return;
            }

            if (!validarBI(bi)) {
                alert('Número de B.I. inválido. Use o formato 000000000XX000.');
                return;
            }

            if (!validarTelefone(telefone)) {
                alert('Número de telefone inválido. Use 900000000 ou +244900000000.');
                return;
            }

            if (!dataNascimento) {
                alert('Por favor, informe sua data de nascimento.');
                return;
            }

            if (calcularIdade(dataNascimento) < 18) {
                alert('É necessário ter pelo menos 18 anos.');
                return;
            }

            if (!dataEmissao || !dataValidade) {
                alert('Informe as datas de emissão e validade do B.I.');
                return;
            }

            const erroDatas = validarDatasBI(dataEmissao, dataValidade);
            if (erroDatas) {
                alert(erroDatas);
                return;
            }

            // Se todas as validações passarem, envia o formulário
            this.submit();
        });

        // Botão voltar
        document.querySelector('.btn-back').addEventListener('click', function() {
            window.location.href = '/inscricao';
        });

        document.querySelectorAll('input[type="date"]').forEach(input => {
            input.addEventListener('change', () => {
                if (input.value) {
                    input.classList.add('filled');
                } else {
                    input.classList.remove('filled');
                }
            });
        });