# teste-backend
Repositório usado para o teste de back-end do Núcleo de Tecnologia Multimídia.

## O que?
End-point em um API que gere a taxa (média) de ex-alunos do SENAI que continuam estudando por estado e também a taxa nacional.

O resultado (body) do end-point deve ser um JSON exatamente igual a estrutura abaixo:
```json
{
  "regionals": [
    {"description": "AC", "average": 23.30},
    {"description": "AL", "average": 61.00},
    {"description": "AP", "average": 30.10},
    {"description": "AM", "average": 56.30},
    ...
  ],
  "national": 47.50
}
```
[Link para o arquivo completo](data.json)

## Como?
1. Capture o total de ex-alunos que estão estudando "Sim".
2. Divida pelo o total de ex-alunos.
3. Multiple por 100.

## Dados de entrada
Arquivo SQL contendo tabelas e inserts para popular.

[Link para o arquivo](desafio.sql)

## Instruções?
1. Você está livre para escolher (ou não) qualquer framework e linguagem back-end.
2. Apesar de fornecemos o sql para a criação e a população de um banco mysql, você está livre para usar outro banco, desde que você converta o dado fornecido para a sua necessidade.
3. Adicione a esse README, instruções de como executar a sua solução.
4. Envie seu código back-end através de um fork desse repositório github ou envie tudo por email. Lembrando que temos preferência pelo o uso do github e iremos levar isso consideração na hora de avaliar.
5. Você tem uma semana (7 dias) para a finalização do teste, a partir da data de envio do e-mail.
6. Se não conseguir finalizar os testes, não se preocupe, envie a sua solução no estágio de desenvolvimento que estiver.

## Dicionario de dados
students - É a tabela que armazenar os ex-alunos do SENAI

questions - É a tabela que armazenar as perguntas que foram feitas aos alunos.

alternatives - É a tabela que armazenar as alternativas para as perguntas que foram feitas aos alunos.

answers - É a tabela que armazenar as respostas de cada aluno para cada pergunta.

## Instruções de instalação
A API foi desenvolvida com PHP e MYSQL, portanto, é necessário ter Apache, PHP e MYSQL instalados, além de ter instalado o Composer para baixar as dependências.
Foi levado em consideração de que o banco já estaria criado e populado através do dump fornecido.
1. Entre na pasta "api" e execute:
```
composer install
```
2. Ao ser perguntado sobre adicionar permissões das pastas, responda com "Y";
3. Entre na pasta "api/config", crie uma cópia do arquivo ".env.default" dentro da mesma pasta e renomeie para ".env";
4. Modifique o arquivo ".env", adicionando nos valores de "DB_HOST", "DB_DATABASE", "DB_USERNAME" e "DB_PASSWORD" seus dados de banco:
```PHP
  // em config/.env
  export DB_HOST="localhost" // informe seu host
  export DB_DATABASE="my_app" // informe sua base de dados
  export DB_USERNAME="my_app" // informe seu username
  export DB_PASSWORD="secret" // informe sua senha
```
5. O endpoint solicitado encontra-se na rota "/api/v1/statistics/students/keep_studying.json" de onde o servidor estiver rodando (para facilitar a execução do teste front-end, clonar o projeto em /var/www/html/).
