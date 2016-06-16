<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Rent;
use frontend\models\RentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * RentController implements the CRUD actions for Rent model.
 */
class RentController extends Controller
{
    /**
     * @inheritdoc
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
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['delete','create','update','index','imgDelete'],
                'rules' => [
                    [
                        'actions' => ['delete','create','index','imgDelete'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if(Yii::$app->user->identity->role=='admin') $return=true;
                            else $return=false;
                            return $return;
                        }
                    ],
                ],
            ],
        ];
    }


    public function actionImgDelete($id)
    {
        $key=Yii::$app->request->post('key');
        $webroot=Yii::getAlias('@webroot');
        if(is_dir($dir=$webroot.'/images/design/'.$id))
        {
            if(is_file($dir.'/'.$key)){
                $expl=explode('_',$key);
                $full=$expl[1];
                @unlink($dir.'/'.$key);
                @unlink($dir.'/'.$full);
            }
        }
        Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        return true;
    }

    /**
     * Lists all Rent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $webroot=Yii::getAlias('@webroot');
        if(is_dir($dir=$webroot.'/images/rent/'.$id)){
            $scaned_images = scandir($dir, 1);
            foreach($scaned_images as $file )
            {
                if(is_file($dir.'/'.$file)) @unlink($dir.'/'.$file);
            }
            @rmdir($dir);
        }

        $this->findModel($id)->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Rent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
