Sistema de Gerenciamento de Oficina
Este projeto é um sistema web criado para facilitar a organização de oficinas mecânicas. Ele ajuda no registro e acompanhamento de serviços realizados em veículos, no controle dos clientes e no gerenciamento de históricos de manutenções, tudo de forma simples e eficiente.

Funcionalidades do Sistema:
O sistema permite que os usuários realizem várias tarefas importantes. Primeiramente, é possível registrar novas manutenções, detalhando informações como o nome do cliente, quilometragem do veículo, custo do serviço e o que foi feito no carro, como troca de óleo ou checagem do motor. Além disso, há um histórico detalhado de todos os serviços realizados, que pode ser consultado por cliente ou veículo.
Outro ponto útil é o controle de veículos. Nele, você pode cadastrar e gerenciar os carros associados aos clientes da oficina. Também existe um sistema de login que garante a segurança, permitindo que apenas usuários cadastrados acessem as informações. Após fazer o login, o sistema dá as boas-vindas ao usuário e exibe os recursos disponíveis de forma organizada.
A interface foi projetada para ser simples e fácil de usar. Os menus são claros, e as informações aparecem em cartões bem organizados, com efeitos visuais para destacar elementos importantes.

Como o Sistema Funciona:
Este sistema foi desenvolvido utilizando tecnologias bem conhecidas. O visual foi feito com HTML5 e CSS3, incluindo ícones do Font Awesome para melhorar a aparência. O funcionamento do sistema no servidor utiliza PHP, e os dados são armazenados em um banco de dados MySQL. O uso de PDO (PHP Data Objects) ajuda na comunicação segura entre o sistema e o banco de dados.

O que Você Precisa para Usar:
Antes de começar a usar, você precisa de um ambiente de servidor local, como o XAMPP, WAMP ou MAMP. Além disso, é necessário que o servidor tenha suporte a PHP (versão 7.4 ou superior) e MySQL (versão 5.7 ou superior). Um navegador atualizado também é essencial para acessar o sistema.

Como Instalar:
Configure o Servidor Local:
Instale e configure o XAMPP ou outro programa semelhante. Certifique-se de que os serviços do Apache e MySQL estejam rodando.

Prepare o Banco de Dados:
Abra o phpMyAdmin no seu navegador. Crie um banco de dados chamado oficina e importe o arquivo SQL fornecido com o projeto para configurar as tabelas e os dados necessários.

Ajuste as Configurações do Projeto:
No arquivo login/db_connect.php, configure os dados de acesso ao banco de dados, se necessário:

php
Copiar código
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "oficina";
Inicie o Sistema:
Copie os arquivos do projeto para a pasta htdocs do XAMPP. Depois, abra o navegador e acesse http://localhost/<nome-da-pasta-do-projeto> para começar a usar.

Como Usar o Sistema
Após acessar o sistema, faça login utilizando seu usuário e senha. Uma vez logado, você verá o menu principal com as seguintes opções:
Nova manutenção: Cadastre os serviços realizados em um veículo.
Controle de veículos: Consulte ou gerencie os veículos cadastrados.
Histórico de serviços: Veja o histórico completo das manutenções realizadas.
Quando terminar de usar, clique no botão de Logout para sair do sistema com segurança.
Este projeto foi desenvolvido para tornar o trabalho em oficinas mecânicas mais organizado e prático, ajudando no atendimento aos clientes e na gestão das atividades diárias. 🚗⚙️

