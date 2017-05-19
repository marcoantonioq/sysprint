# Servidor de Impressão
# Introdução

Este trabalho aborda os serviços CUPS com autenticação integrada ao AD, através de um serviço web, para gestão das impressoras da rede em um servidor de impressão centralizado e com relatórios de impressão por impressora e por usuário.

# Requisitos

- HTTP Server. Por exemplo: Apache. De preferência com mod_rewrite ativo, mas não é obrigatório.
- PHP 5.6.0 ou superior.
- extensão php mbstring
- extensão php intl
- servidor cups configurado
- servidor lampp

Suporta uma variedade de mecanismos de armazenamento de banco de dados

- MySQL (5.1.10 ou superior)
- PostgreSQL
- Microsoft SQL Server (2008 ou superior)
- SQLite 3

# Configuração

- Alterando o limite de memória 
	1. Acesse arquivo config/PHP.ini;
	2. Acesse arquivo config/sysprint.ini;
	3. Abra o arquivo baixado utilizando um editor de textos de sua preferência e procure pela diretiva "memory_limit";
	Altere a diretiva conforme sua necessidade(recomendado 256M);

# Utilização

![alt text](https://s1.postimg.org/sc7buvhqj/image_6.png)

![alt text](https://s1.postimg.org/5owo2grkb/image_5.png)

![alt text](https://s1.postimg.org/qn2u0jrez/image_4.png)

![alt text](https://s1.postimg.org/647xvhdhn/image_3.png)

![alt text](https://s1.postimg.org/xg36wti8b/image_2.png)

![alt text](https://s1.postimg.org/ec9vgh5e3/image_1.png)

![alt text](https://s1.postimg.org/fftzsfq17/image.png)

...
