

/**
Express é a ferramenta usada para fazer requisições HTTP
Baixar o NPM
	
npm -v (Ver se esta instalado)

npm install nome_do_pacote --save
npm install express --save
*/

const express = require("express");

//Essa variavel abaixo é a mais importante tudo do express será chamado por aqui
const app = express();


//rec = requisição e res = objeto que sera usado para mandar mensagens para clientes
app.get("/", function(rec, res){
	res.send("Seja bem vindo ao meu app");
});

app.get("/Sobre", function(rec, res){
	res.send("Minha página sobre");
});

app.get("/Blog", function(rec, res){
	res.send("Bem vindo ao meu blog");
});

/*:nome é um parametro é igual uma variavel se eu 
nao informar nada na variavel não ira abrir */

//Só pode chamar o Send uma vez dentro de uma função em uma rota
app.get("/ola/:cargo/:nome/:cor", function(rec, res){
	res.send("<h1>Olá"+req.params.nome+"</h1>" + "<h2>Seu cargo é:"+req.params.cargo+"</h1> + <h3>Sua cor favorita é "+req.params.cor+"</h1>");
});

//essa função tem que sera ultima do código
app.listen(numero da porta, function(){
});


app.listen(8081, function(){
	console.log("Servidor rodando na url http://localhost:8081");
});

/*
ir no terminal e abrir o arquivo do 
sistema via cmd ou abrir o servidor no localhost na web
erro na página Cannot GET / significa que não tem nenhuma rota definida
Sempre que quizer ver uma alteração na aplicação 
fechar o servidor no terminal dano cntrl c e iniciar novamente

Para poder parar de ficar tendo que fechar o servidor e abrindo varias vezes
Usar o comando

| npm install nodemon -g

Instalado dopois no terminal escrever nodemon

quando for rodar o app no terminal colocar 

| nodemon app.js

para rodar o servidor


Para mandar arquivos HTML ja prontos
*/


//__dirname é onde sera informado qual é o diretório do sistema.
app.get("/", function(rec, res){
	res.sendFile(_dirname + "/html/index.html")
});

/*
sequelize é a ferramenta utilizada para poder conectar no mysql
ele é um ORM ou seja o usuario nao vai escrever a query SELECT , UPDATE ETC
o ORM entrega tudo isso e vai ser possivel escrever o código direto no NODE

//npm install --save sequelize
//npm install --save mysql2
*/
const Sequelize  = require('sequelize')
const sequelize = new Sequelize('nome_do_banco','usuario','senha',{
	host:"localhost",
	dialect:"mysql"
})

sequelize.authenticate().then (function(){
	console.log("Conectado com sucesso!")
}).catch(function(erro){
	console.log("falha ao se conectar:" +erro)
})

//Depois só rodar no terminal

//nodemon conexao_banco.js
//Retornara um console.log com o erro

/*
parei neste video
Victor Lima - Guia do Programador
Curso de Node.js - Models no Sequelize #18
//https://www.youtube.com/watch?v=4ktEr1rbhx8&list=PLJ_KhUnlXUPtbtLwaxxUxHqvcNQndmI4B&index=18