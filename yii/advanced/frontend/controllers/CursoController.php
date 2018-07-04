<?php

namespace frontend\controllers;

use Yii;
use common\models\Curso;
use common\models\CursoSearch;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ArrayDataProvider;
use yii\helpers\ArrayHelper;

/**
 * CursoController implements the CRUD actions for Curso model.
 */
class CursoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Curso models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Curso model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id = '5')
    {
        $quant_alunos = User::find()->where('id_curso='.$id)->count();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'quant_alunos' => $quant_alunos,
        ]);
    }

    /**
     * Creates a new Curso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Curso();
//        $model->sigla = "EEEE";
//        $model->nome = "Algum Curso";
//        $model->descricao = "Alguma descrição";
//        $model->save();
//        echo $model->id;
//        die();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_curso]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Curso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_curso]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Curso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionUsers($id = '5'){
        
        $model = new Curso();
        $cursos = Curso::find()->all();
        $array_cursos = ArrayHelper::map($cursos, 'id_curso', 'nome');
        
        $query = User::find()->where('id_curso='.$id)->all();
        $provider = new ArrayDataProvider([
            'allModels' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [
                'attributes' => ['username','pontuacao',''],
            ],
        ]);
            
        if ($model->load(Yii::$app->request->post())) {
            $model = Curso::find()->where(['id_curso'=>Yii::$app->request->post()])->all();
            $query = User::find()->where(['id_curso'=>$model])->all();
            $provider = new ArrayDataProvider([
                'allModels' => $query,
                'pagination' => [
                    'pageSize' => 10
                ],
                'sort' => [
                    'attributes' => ['username','pontuacao',''],
                ],
            ]);
            
            return $this->render('users', ['provider' => $provider, 'model'=>$model]);
        }

        return $this->render('_users', ['array_cursos' => $array_cursos, 'model' => $model]);
        
    }

    /**
     * Finds the Curso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Curso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Curso::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
}
