<?php
/* @var $this yii\web\View */

use yii\helpers\Url;


$this->registerJsFile("SkiFree\js\skifree.js");

//Obs: O endereço do arquivo css só 
//funciona corretamente quando usado 
//com barra "/".
$this->registerCssFile("SkiFree/css/estilos.css");


//$this->registerJs("
//    var pontuacao = 6000;
//    $.ajax({
//        url: '" . Url::to(['jogo/save']) . "',
//        type: 'GET',
//        data: {
//            'pontuacao': pontuacao,
//        },
//        error: function() {
//            console.log('Não deu certo');
//        },
//        success: function(data) {
//            console.log(data);
//        },
//    });
//");

?>

<!DOCTYPE html>
<h1>jogo/index</h1>
<div id="montanha">
    <div id="skier"></div>
</div>
<div id="painel"></div>

<!--
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
-->
