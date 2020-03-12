<?php
	//criando a classe
class ContaCorrente{

	public $titular;
	public $agencia
	public $numero
 	public $saldo


 	//primeiro metodo a ser chamado
 	//para ser pupulado obriga inserir todos esses parametros
 	public function __construct($titular, $agencia, $numero, $saldo){
 		
 		//sempre que usa o $this 
 		//ele esta referenciando a um atributo de dentro da classe

 		//a variavel como já esta declarada dentro da classe
 		// nao precisa colocar $ 

 		$this ->titular = $titular;
 		$this ->agencia = $agencia;
 		$this ->numero = $numero;
 		$this ->saldo = $saldo;
     	}

     	public function sacar($valor){

     		$this->saldo = $this ->saldo - $valor;
     		return $this

     		//Não é obrigado a utilizar return neste caso , é uma boa prática porém não obrigatório
     	}


     	public function depositar($valor){

     		$this->saldo = $this ->saldo + $valor;
     		return $this
     	}

     	public function transferir(int $valor, ContaCorrente $conta){

     		if(!is_numeric($valor)){
     			echo "O valor informado nao é válido";
     			exit
     		}
     		$this->sacar($valor);
     		$conta->depositar ($valor);

     		return $this
     	}


     	//retornar o titular  
     	//bom no caso do atributo ser private
     	public function getTitular(){
     		return $this->titular;
     	}

		//retornar o saldo
		//bom no caso do atributo ser private
     	public function getTitular(){
     		return $this->saldo;
     	}

     	//Função para atribuir um novo valor
     	public function setNumero($numero){
			return $this->numero = $numero;    
     	}


     	//MÉTODOS MÁGICOS __GET E __SET

     	//O método Get e utilizado quando eu quero acessar os dados dos atriutos
     	//que estavam em private, deste modo eu tenho acesso a qualquer atributo da classe

     	public function __get($atributo){
     		return $this->$atributo;

     	}

     	public function __set($atributo;$valor){

     		// se(variavel atributo igual string ou variavel atributo = "saldo") retorna falso
     		if($atributo == "titular" || $atributo == "saldo"){

     			throw new Exception ("O atributo $atributo não pode ser alterado");
     		}
     		$this->atributo = $valor;

     	}


	}
?>

<?php

//Criando um novo objeto 
require "ContaCorrente.php";

//Variavel objeto
$contaAndrews = new ContaCorrente("Andrews","1212","347341-7", 2000.00);

//Nao da para imprimir uma variavel objeto
//Exemplo echo $contaAndrews

$contaAndrews->titular = "Andrews";

$contaAndrews->getTitular();

$contaAndrews->sacar (400.90);
$contaAndrews->depositar (400.90);

//Só funciona desta forma caso tenha o return
//return $this na função
$contaAndrews->sacar(400)->depositar(30);

$contaAndrews->setNumero("3000");

$contaAndrews->transferir(20.00, $contaAmanda);

?>

