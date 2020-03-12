
<?php
//PÁGINA autoload.php

function load($namespace){

     $namespace = str_replace("\\"."/", $namespace);

     $caminhoAbsoluto = __DIR__ . "/". $namespace . ".php";

     return include_once $caminhoAbsoluto;

}

spl_autoload_register(__namespace__ . "\load");

//FIM da página autoload.php
?>

<?php


require_once "autoload.php";

use classes\funcionarios\Diretor;
use classes\funcionarios\Designer;


//Colocando o "as teste" é possivel  dar um apelido qualquer para o namespace para nao haver conflitos com nomes de classes iguais
use classes\funcionarios\Diretor as teste;

//chamando a classe pelo apelido
$diretor2 = new teste();


$diretor = new Diretor();
$designer = new Designer();


?>

<?php 
	//o nome do arquivo, que precisa ser exatamente o nome da classe. Por exemplo, na criação da nossa classe Diretor, o nome do arquivo também é Diretor. Do contrário, nosso autoload não funcionará, pois procurará por um diretório que não existe.


	//nome da classe precisa ser igual ao nome do arquivo para o autoload nao se perder
	//Criar arquivo com a classe que eu desejo usar
	namespace classes\funcionarios;
	class Diretor{

}
//Sempre que criar uma página e for chamar as classes precisa colcoar o namespace


?>

<?php

//o extends faz a classe herdar os atributos de uma outra classe
	//Exemplo
	class Diretor extends Funcionario{
	//Nesta classe está sendo informado que a classe diretor receberá os atributos da classe funcionario
	//Como esta chamando uma nova classe precisa informar o nasmespace e o use
	}

?>

<?php
//Exemplo Funcional de Herança com extends

namespace classes\funcionarios;

use classes\abstratas\Funcionario;

class Designer extends Funcionario
{

}

?>

<?php
//

protected $salario; //Com o protected, é possível manipular o atributo por meio de um método, mas não a partir de uma instância.
public $salario; //Qualquer instancia pode alterar 
private $salario; //Só é possivel alterar a variavel de dentro da propria classe


?>


<?php 
//Polimorfismo

class Designer extends Funcionario
{
	//é criado uma função filho dentro da classe para quando for determinada condição sobescrever a função.
    public function aumentarSalario() 
    {
        $this->salario *= 1.3;
    }

    public function getBonificacao()
    {
       return $this->salario * 0.3;
    }

}

?>