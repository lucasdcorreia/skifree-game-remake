<?php

namespace frontend\controllers;
use common\models\Jogada;
use yii\data\ArrayDataProvider;
use Yii;

class JogoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRanking(){
        $query = Jogada::find()->all();
        $provider = new ArrayDataProvider([
            'allModels' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'attributes' => ['id','pontuacao',''],
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
