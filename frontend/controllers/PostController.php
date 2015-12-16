<?php

namespace frontend\controllers;

use common\models\Comment;
use Yii;
use common\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->orderBy('updated_at DESC'),
            'pagination' => ['pagesize' => 5], // количество постов на странице
        ]);

        //$dataProvider = Post::find()->with('author','category')->where(['status'=>1])->orderBy('updated_at DESC')->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $list_comment = new ActiveDataProvider([
            'query'=>Comment::find()->where(['post_id'=>$id, 'status'=>1]),
        ]);
        $model_comment = new Comment();

        if ($model_comment->load(Yii::$app->request->post())){
            $model_comment->post_id = $id;
            $model_comment->status = 0;
            if($model_comment->save()) {
                Yii::$app->session->setFlash('success', 'Ваш комментарий был отправлен администраторам сайта и будет опубликован после проверки..');
            }else{
                Yii::$app->session->setFlash('error', 'Ваш комментарий не был отправлен по техническим причинам. Попробуйте ещё раз.');
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'list_comment'=>$list_comment,
            'model_comment'=>$model_comment,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
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
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
