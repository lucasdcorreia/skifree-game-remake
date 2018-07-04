<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Curso;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jogadores do curso '.$model[0]->nome;//.Curso::find()->where(['id_curso'=>$model])->$nome ;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-users">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            'created_at',
            //'updated_at',
            //'id_curso',
        ],
    ]); 
    ?>
</div>
