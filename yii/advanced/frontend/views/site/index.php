<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Ski Free';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bem vindo ao jogo Ski Free!</h1>
        
        <?= Html::img('@web/img/SkiFreeLogo.jpg',['width'=>'400']) ?>

        <!--<p class="lead">You have successfully created your Yii-powered application.</p>-->
        <br>
        <br>
        <br>
        <p><?= Html::a('Iniciar Jogo', ['jogo/index'], ['class' => 'btn btn-success']) ?></p>
    

        <div class="body-content">

            <div class="row">
                
                <div align="justify">
            
                    <h2 align="justify">Ski Free</h2>

                    <p align="justify">Ski Free é um jogo de computador originalmente criado por Chris Pirih e lançado com o Microsoft Entertainment Pack em 1991. 
                        É um jogo simples em que o jogador controla um esquiador evitando obstáculos em uma encosta de montanha. 
                        Muitas vezes é surpreendido pelo Abominável Monstro das Neves, que persegue o jogador a cada 2000 metros 
                        percorridos. Quanto maior a distância percorrida, maior será sua pontuação. Faça seu cadastro no sistema e registre sua pontuação.
                    </p>
                    <br>
                    <h2>Controles</h2>
                    <p>
                        Esquerda - A<br>
                        Direita - D<br>
                        Modo rápido - F
                    </p>
                </div>
                <!--<p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
            
            </div>

        </div>
    </div>
</div>
