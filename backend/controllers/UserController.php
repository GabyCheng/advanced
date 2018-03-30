<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */

    public function microtime_float()
    {
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);
    }
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
       $model = $this->findModel($id);

        $post = Yii::$app->request->post();      
        if($model->load($post)){
            $model->status = 1;
            $model->password_hash = md5($model->password_hash);
            $model->updated_at = time();

        if(!empty($_FILES['User']['tmp_name']['avatar'])){
            $key = $this->microtime_float();
            $qiniu = Yii::$app->qiniu;
        if($model->avatar){
            $deleteKey = substr($model->avatar,-15);
            $qiniu->delete($delete);
        }
            $fileInfo = $qiniu->uploadFile($_FILES['User']['tmp_name']['avatar'],$key);

            if($fileInfo['key']){
                $model->avatar =$qiniu->getLink($fileInfo['key']);
            }
        }else{
            $model->avatar = User::find()->where(['id'=>$id])->select('avatar')->scalar();
        }

        if ($model->save()){

            return $this->redirect(['view', 'id' => $model->id]);
                      
        }
        }else{

            return $this->render('view', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();


        $post = Yii::$app->request->post();
        
        if($model->load($post)){
            $model->status = 1;
            $model->password_hash = md5($model->password_hash);
            $model->created_at = time();
            $model->updated_at = time();
        if(!empty($_FILES['User']['tmp_name']['avatar'])){
               
            $key = $this->microtime_float();
            $qiniu = Yii::$app->qiniu;
            $fileInfo = $qiniu->uploadFile($_FILES['User']['tmp_name']['avatar'],$key);

            if($fileInfo['key']){
                $model->avatar =$qiniu->getLink($fileInfo['key']);
            }
        }

        if ($model->save()){

            return $this->redirect(['view', 'id' => $model->id]);
                      
        }
        }else{

            return $this->render('create', ['model' => $model]);
        }
    
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post();      
        if($model->load($post)){
            $model->status = 1;
            $model->password_hash = md5($model->password_hash);
            $model->updated_at = time();

        if(!empty($_FILES['User']['tmp_name']['avatar'])){
            $key = $this->microtime_float();
            $qiniu = Yii::$app->qiniu;
        if($model->avatar){
            $deleteKey = substr($model->avatar,-15);
            $qiniu->delete($delete);
        }
            $fileInfo = $qiniu->uploadFile($_FILES['User']['tmp_name']['avatar'],$key);

            if($fileInfo['key']){
                $model->avatar =$qiniu->getLink($fileInfo['key']);
            }
        }else{
            $model->avatar = User::find()->where(['id'=>$id])->select('avatar')->scalar();
        }

        if ($model->save()){

            return $this->redirect(['view', 'id' => $model->id]);
                      
        }
        }else{

            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
         $model = $this->findModel($id);

         if($model->avatar){
            $qiniu = Yii::$app->qiniu;
            $deleteKey = substr($model->avatar,-15);
            $qiniu->delete($deleteKey);
         }
         $model->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
