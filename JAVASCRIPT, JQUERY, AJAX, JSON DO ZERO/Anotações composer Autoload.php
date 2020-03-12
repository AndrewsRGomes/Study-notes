<?php
/*para instalar o composer coloque o cd no diretorio da pasta do projeto que desejar
rodar no terminal em sequência
*/
//lembrando que se voce estiver usando o windows no site do composer tem um instalador para fazer isso de maneira automática

// o comando composer-setup.php
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

//O comando abaixo verificará a chave de segurança de instalação SHA-384
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

//Baixando o arquivo composer.phar
php composer-setup.php

//apagar o arquivo do instalador
php -r "unlink('composer-setup.php');"
?>

<?php

//Como instalar a pasta vendor e o criar o arquivo composer.json

//basta usar o comando 
composer init


Informar o Package name Namespace\\Padrao\\

exemplo, get/buscar-tarefas



?>

<?php


composer dumpautoload
// rodando no terminal este comando verificará
//no arquivo composer.json, para atualizar
//novas dependências do projeto

{ "autoload":
	{
	//Com o Class map eu digo para o autoload todos os caminhos que possuem classes, caso o código que eu esteja utilizando nao utilize padrão PSR-4
	"classmap": [".Teste.php"],

	//Para carregar um biblioteca de funções automaticamente
	"files": ["./functions.php"],

	//Comando para colocar no composer JSON usado para criar nosso proprio caminho no autoload caso queira chamar uma classe PHP igual as que são chamadas vi require ou composer install
	"psr-4": {"Alura\\Namespace\\Padrao\\": "src/php/code/" }
	} 
}

?>


<?php 


//O comando --dev serve para instalar uma dependência somente na area do local host
composer require --dev phpunit/phpunit 

// O phpunit serve para fazer testes unitarios em alguma função
// Depóis de criar o arquivo com o teste a ser realizado preferencialmente em uma pasta testes
// basta executar como o comando abaixo 
vendor\bin\phpunit tests\arquivodeteste.php

?>

<?php
//Uma das opções para validar o código é o Codesniffer (verificar se o código esta de acordo com o padrão definido no PSR).

//Executar na linha de comando 
composer require --dev squizlabs/php_codesniffer



//Após instalado definimos o padrão como PSR12 (ou outro) executando na linha de comando:
vendor\bin\phpcs --standard=PSR12 src\Buscador.php

//Tente corrigir os erros relacionado com a estrutura PHP e chame novamente phpcs.

?>


<?php

//Uma das feramentas usadas para analisar erros no código php é o PHAN
composer require --dev phan/phan

//Crie uma pasta na raiz do projeto com o nome .phan
//Crie um novo arquivo neste caminho com o nome config.php com as configurações abaixo:

return [
    "target_php_version" => '7.3',
    'directory_list' => [
        'src',
        'vendor/symfony/dom-crawler',
        'vendor/guzzlehttp/guzzle',
        'vendor/psr/http-message'
    ],
    "exclude_analysis_directory_list" => [
        'vendor/'
    ],
    'plugins' => [
        'AlwaysReturnPlugin',
        'UnreachableCodePlugin',
        'DollarDollarPlugin',
        'DuplicateArrayKeyPlugin',
        'PregRegexCheckerPlugin',
        'PrintfCheckerPlugin',
    ],
];


//Agora vamos executar o Phan na linha de comando
vendor\bin\phan --allow-polyfill-parser

//O resultaod esperado é o apontamento dos erros caso houver.
//Arquivos executáveis fornecidos por componentes instalados pelo composer ficam na pasta vendor/bin




//Rodando Scripts no composer
//Com isso é possivel rodar varios testes e funções automaticamente apenas usando o comando

//Comando terminal
Composer Check

"scripts":{

	"test":"phpunit testes\\TestBuscadorDeCursos.php", 
	"cs": "phpcs --standard=PSR12 src/",
	"phan": "phan --alow-polyfill-parser",

	"check" [
		"@phan",
		"@cs",
		"@test"
	]
}



//para ver os comandos do composer basta dar o comando
Composer list

//Para alterar a descrição dos comandos basta informar

"scripts-descriptions": {
	"check": "Roda as verificações do código"
}


//lembrar que a cada comando diferente dentro do composer.json, precisa por uma virgula

//-------------------//


//o composer é orientado a eventos desta forma é possivel rodar scripts depois de determinados eventos , como por exemplo após realizar o update ou install do composer rodar um teste da seguinte forma

//Dentro a tag script adicionar mais uma opção , 
"post-update-cmd":[
"@test"
"@cs"
]


//Consolidando o conhecimento

//Script completo 
//Incluir no Composer.json

"scripts": {
        "test": "phpunit tests\\TestBuscadorDeCursos.php",
        "cs": "phpcs --standard=PSR12 src/",
        "phan": "phan --allow-polyfill-parser",
        "check": [
            "@phan",
            "@cs",
            "@test"
        ],
        "post-update-cmd": [
            "@test"
        ]
    },
    "scripts-descriptions": {
        "check": "Roda as verificações do código. PHAN, PHPCS e PHPUNIT"
    }


    //scripts que podem ser testados após este código, dentro do diretorio raiz do projeto rodar 

    composr phan
    composer cs
    composer test

    //O check deverá rodar os 3 anteriores
    composer check


//Como o composer funciona
//Cada versão de um pacote do composer

//Elas sao informadas através de tags no sistema de controle de versão.

//Cada nova tag pode ser interpretada como uma nova versão

//Criar repositório Git
git init 

abrir .gitignore
informar as pastas que devem ser ignoradas

vendor/

git add .

git commit -m "Primeiro commit"

git tag -a v1.0.0


//----------------
//semantic versioning


//MAJOR version, mudanças que afetaram a compatibilidade no sistema, alterace o primeiro numero do V1 <-

//MINOR version, novas funcionalidades V1.2<-

//PATCH version, Correções de bugs e coisas menores. v.1.2.3 


//Importando do diretorio para o GIT HUB

//la no site do GIT HUB tem um endereço git remote add origin

//rodar este comando dentro da pasta do meu projeto

//git push origin master

//pedirá login e senha do git hub depois de rodar e obter sucesso verificar no ambiente do git hub se os arquivos constam no diretorio.

/* 
git add origin https://github.com/<seu-usuario>/<seu-repositorio>.git
git push origin master
git push origin v1.0.0
*/

//para colocar o pacote no packagist
//logar com o git hub, copiar o diretorio do pacote no github e colar no packist após isso ele ira pegar do GIT HUB e colocar no packagist

/*para testar se está funcionando corretamente, podemos criar um novo projeto

com o terminal, basta usar o CD e informar o diretório deste novo projeto.

para verificar se tem algum arquivo neste diretório rodar o comando 'DIR'

pra poder baixar o package usar o comando*/

composer require distribuidor/nome-package



//Este comando buscará novas atualizações sobre os packages dentro do composer.json
composer update 

//para criar um executavel
//Informando na primeira linha do arquivo antes da tag php

#!/usr/bin/env php
vendor/bin/buscador-cursos.php
vai criar dois arquivos php e um .bat

