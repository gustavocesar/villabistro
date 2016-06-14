<?php
$usuarioLogado = AuthComponent::user();
$arrName = explode(" ", $usuarioLogado["name"]);

echo "
<h4>Olá ".$arrName[0].". Seja bem vindo(a)!</h4>
<h5>Seu primeiro acesso? Clique ".$this->Html->link('aqui',['controller'=>'pages', 'action'=>'documentation'])." e confira a documentação do sistema.</h5>
<br />
<br />
<br />
<br />
";
?>

<hr />

