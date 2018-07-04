<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CursoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="_users">

    <?php $form = ActiveForm::begin([
        'action' => ['curso/users'],
        'method' => 'post',
    ]); ?>

    <?= $form->field($model, 'id_curso')->dropDownList($array_cursos) ?>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>