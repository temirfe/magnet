<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Web;
use frontend\models\WebSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

/**
 * WebController implements the CRUD actions for Web model.
 */
class WebController extends Controller
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
                'only' => ['delete','create','update','admin','imgDelete'],
                'rules' => [
                    [
                        'actions' => ['delete','create','update','admin','imgDelete'],
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
        if(is_dir($dir=$webroot.'/images/web/'.$id))
        {
            if(is_file($dir.'/'.$key)){
                $expl=explode('_',$key);
                $full=$expl[1];
                @unlink($dir.'/'.$key);
                @unlink($dir.'/'.$full);
                Yii::$app->db->createCommand()->update('web', ['main_img' => ''], ['id'=>$id, 'main_img'=>$full])->execute();
            }
        }
        Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        return true;
    }

    /**
     * Lists all Web models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Web::find()->orderBy('id DESC'),
            'pagination' => array('pageSize' => 30),
        ]);

        return $this->render('index', [
            'dataProvider'=>$dataProvider
        ]);
    }


    public function actionAdmin()
    {
        $searchModel = new WebSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Web model.
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
     * Creates a new Web model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Web();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Web model.
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
     * Deletes an existing Web model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $webroot=Yii::getAlias('@webroot');
        if(is_dir($dir=$webroot.'/images/web/'.$id)){
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
     * Finds the Web model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Web the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Web::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
