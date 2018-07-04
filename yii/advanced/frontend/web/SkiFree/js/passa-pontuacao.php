<?php
use yii\helpers\Url;

$this->registerJs("
    console.log('executando o passa-pontuacao.php');
    $.ajax({
        url: '" . Url::to(['jogo/save']) . "',
        type: 'GET',
        data: {
            'pontuacao': pontuacao,
        },
        error: function() {
            console.log('Não deu certo');
        },
        success: function(data) {
            console.log(data);
        },
    });

");


?>