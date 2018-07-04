<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>Dia e hora atual: <?= $data?></p>

    <p align="justify">SkiFree é um jogo de computador originalmente criado por Chris Pirih e lançado com o Microsoft Entertainment Pack em 1991. 
        É um jogo simples em que o jogador controla um esquiador evitando obstáculos em uma encosta de montanha. 
        Muitas vezes é surpreendido pelo Abominável Monstro das Neves, que persegue o jogador a cada 2000 metros 
        percorridos.</p>
    <p align="justify">O jogador controla um esquiador através de um fundo branco que representa a neve em uma montanha. O objetivo do jogo é 
        esquiar numa encosta sem fim e evitar os obstáculos.</p>
    <?= Html::img('@web/img/skifree2.png',['width'=>'400']) ?>
    
    
</div>
