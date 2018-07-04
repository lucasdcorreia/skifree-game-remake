<?php
/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\grid\GridView;
use common\models\User;

$this->registerCssFile("css/text-align-center.css");
?>
<h1>Ranking</h1>

<?= GridView::widget([
        'dataProvider' => $listDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Jogador',
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($data) {
                    return User::findOne($data->id_user)->username; // $data['name'] for array data, e.g. using SqlDataProvider.
                    
                },
            ],
            'pontuacao',
        ],
    ]); ?>


