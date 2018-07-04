<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CursoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile("css/text-align-center.css");

?>
<div class="curso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Novo Curso', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Usuários por curso', ['curso/users'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome',
            'sigla',
            'descricao:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
        
    ?>
</div>
