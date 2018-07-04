<?php

namespace frontend\controllers;
use common\models\Jogada;
use Yii;

class JogoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRanking(){}
        $provider = new ArrayDataProvider([
            'allModels' => Jogada::find()->all(),
            'pagination' => [
                'pageSize' => 5
            ],
            'sort' => [
                'attributes' => ['id'],
            ],
        ]);

        return $this->render('ranking', ['listDataProvider' => $provider]);
    }

    public function actionSave($pontuacao)
    {
        if(!Yii::$app->user->isGuest){
            $jogada = new Jogada;
            $jogada->pontuacao = $pontuacao;
            $jogada->id_user = Yii::$app->user->id;
            $jogada->save();
            return 'Deu certo!!!';
        }
        
    }

}
