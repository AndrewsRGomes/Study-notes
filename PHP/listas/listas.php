<!--LISTA-->

<?php

$idadeList = [20,30,40,50,60,70,80,90]; //NAO PRECISA COLOCAR ARRAY , DESDE A VERSÃO DO PHP 5.4 SÓ COLOCAR COLCHETES
$umaIdade = $idadeList[0]; //O ARRAY CRIA AUTOMATICAMENTE UM CÓDIGO APARTIR DO NUMERO 0 CASO NAO SEJA INFORMADO O INDEX

echo $umaIdade;//SAIDA DA LISTA NA TELA
?>


<!--LOOP NA LISTA-->
<?php
$idadeList = [20,30,40,50,60,70,80,90]; 


//Definiu que $i a variavel é = 0, e 
//que enquanto a variavel for menor que
//zero acrescentará mais 1 a variavel
For ($i = 0; $i < count($idadeList) ; $i++){ //Forma limitada a 7

For ($i = 0; $i <7 ; $i++){ //Forma limitada a 7
//Exibir o valor da variavel		
echo $idadeList[$i] .PHP_EOL; //PHP_EOL QUEBRA LINHA
}
?>

<!--RETORNA A QUANTIDADE DE ITENS DENTRO DE UM ARRAY/LISTA-->
<?php
$idadeList = [20,30,40,50,60,70,80,90]; 
echo count($idadeList); //A FUNÇÃO COUNT É NATIVA DO PHP


?>

<!--ARRAYS ASSOCIATIVOS-->
<?PHP

$conta1 = ['titular' =>'Vinicius','saldo' => 1000];
$conta2 = ['titular' =>'Marcelo','saldo' => 2000];
$conta3 = ['titular' =>'Wilson','saldo' => 3000];

$contasCorrentes = [$conta1, $conta2, $conta3];

for ($i = 0; $i < count($contasCorrentes); $i++) {
	echo $contasCorrentes[$i]['titular'] .PHP_EOL; //EXIBE TODOS OS TITULARES DOS ARRAYS
}
?>

<!--FOREACH & ARRAY ASSOCIATIVO-->
<?PHP

$conta1 = ['titular' =>'Vinicius','saldo' => 1000];
$conta2 = ['titular' =>'Marcelo','saldo' => 2000];
$conta3 = ['titular' =>'Wilson','saldo' => 3000];

$contasCorrentes = [$conta1, $conta2, $conta3];

foreach ($contasCorrentes as $conta){
	echo $conta['titular'] .PHP_EOL;
}
?>


<!--FOREACH & ARRAY ASSOCIATIVO-->
<!--MUDANDO O INDICE AUTOMATICO-->
<?PHP

$contasCorrentes = [
	12345678910 => ['titular' =>'Vinicius','saldo' => 1000], 
	12345678911 => ['titular' =>'Marcelo','saldo' => 2000], 
	12345678912 => ['titular' =>'Wilson','saldo' => 3000]
];

foreach ($contasCorrentes as $cpf => $conta){ 
	echo $cpf .PHP_EOL;
}
?>


<!--adicionando um item no array-->
<?php

$idadeList = [21, 23, 19, 25, 30, 41, 18];
$idadeList[] = 20;

foreach ($idadeList as $idade) {
    echo $idade . PHP_EOL;
}

?>

<?php 
// uma função ou sub-rotina pode retornar um valor. Quando ela retorna, a chamada da função passa a representar o valor retornado. Em outros casos, ela pode não retornar nada, simplesmente executa algum código.
function exibeMensagem($mensagem){
    echo $mensagem . PHP_EOL;
}
?>

<?php 
//Função que retorna um valor 
function sacar($conta, $valorASacar)
{
    if ($valorASacar > $conta['saldo']) {
        exibeMensagem("Você não pode sacar este valor");
    } else {
        $conta['saldo'] -= $valorASacar;
    }
}
?>

<?php 
//PODE DECLARAR O TIPO DA VARIAVEL A SER USADA DIRETO USANDO , ARRAY, FLOAT, STRING ETC NO PHP7
function depositar(array $conta, float $valorADepositar): array {
    if ($valorADepositar > 0) {
        $conta['saldo'] += $valorADepositar;
    } else {
        exibeMensagem("Depósitos precisam ser positivos");
    }
    return $conta;
}
?>

<?php  //chamar um arquivo na página
include 'funções.php' //deixa passar caso o arquivo nao exista
require_once 'funções.php' //da erro no php caso nao exista o arquivo

/*
Para acessar um valor de um array associativo dentro de string devemos omitir as aspas da chave, por exemplo " conta[titular] "
e alternativamente podemos usar chaves em volta do array, por exemplo: " {conta['titular']} "
*/

/*
include não dá erro (apenas avisa) se o arquivo não existe, require dá erro
require_once garante que o arquivo será incluído apenas uma vez
Conhecemos que existem níveis de mensagens entre eles:

E_NOTICE, PHP dá um aviso mas "se vira" e continua com a execução
E_ERROR, PHP dá erro e para a execução do programa
*/
?>

<?php// A função em si é para passar os dados para leta maiscula
//mb_strtoupper pode ser substituido por strtoupper porém o A função strtoupper não colocaria letras com acento em maiúsculo, enquanto a mb_strtoupper consegue fazer isso sem problemas.
//Esse & informa que estamos recebendo a variável em si, e não uma cópia dela.
function titularComLetrasMaiusculas(array &$conta)
{
    $conta['titular'] = mb_strtoupper($conta['titular']);

}
?>

<?php
// A função UNSET serve para poder remover uma variavel da memoria do PHP
// por exemplo pode usar uma variavel para executar um código depois excluir ela com o unset
unset($contasCorrentes['123.456.689-11']);
unset($variavel1, $variavel2);
unset($variavel1);
unset($variavel2);

?>

<?php //se a função list para simplificar a atribuição de valores:

foreach ($contasCorrentes as $cpf => $conta) {
	    list('titular' => $titular, 'saldo' => $saldo) = $conta;
	    //ou
	    //['titular' => $titular, 'saldo' => $saldo] = $conta;
	    exibeMensagem(
	        "$cpf $titular $saldo"
	    );
	}

?>