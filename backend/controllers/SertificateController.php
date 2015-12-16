<?php

namespace backend\controllers;

use Yii;
use common\models\Sertificate;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * SertificateController implements the CRUD actions for Sertificate model.
 */
class SertificateController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sertificate models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sertificate::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sertificate model.
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
     * Creates a new Sertificate model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
       // $model = new Sertificate();

       // if ($model->load(Yii::$app->request->post()) && $model->save()) {
       //     return $this->redirect(['view', 'id' => $model->id]);
       // } else {
       //     return $this->render('create', [
       //         'model' => $model,
       //     ]);
        //}

        $dir = Yii::getAlias('@frontend/web/images/');
        $uploaded = false;
        $model = new Sertificate();

        if ($model->load($_POST)) {
            //$file = UploadedFile::getInstances($model, 'image');
            $file = UploadedFile::getInstance($model, 'image');



            $model->image = $file;
            //$model->image_s = 'sm_'.$file;
            //$model->on = 1;

            if ($model->validate()) {
               // $uploaded = $file->saveAs( $dir . $model->image->name );
            $uploaded = $file->saveAs($dir.'tmp/'.$file);
                $name_img = uniqid().'.jpg';
                $waterfile=$dir.'watermark.png';
                Image::thumbnail($dir.'tmp/'.$file, 150, 240)->save(Yii::getAlias($dir.$name_img), ['quality' => 60]);
                Image::thumbnail($dir.'tmp/'.$file, 400, 560)->save(Yii::getAlias($dir.'tmp/big_'.$name_img), ['quality' => 60]);
                Image::watermark($dir.'tmp/big_'.$name_img, $waterfile, [250,450])->save(Yii::getAlias($dir.'big_'.$name_img));
                unlink($dir.'tmp/'.$file);
                unlink($dir.'tmp/big_'.$name_img);

                $model->image = 'big_'.$name_img;
                $model->image_s = $name_img;
                $model->on = 1;
            $model->save();

                return $this->render('view',[
                    'model' => $model,
                    'uploaded' => $uploaded,
                    'dir' => $dir,
                ]);

            }
        }

        return $this->render('create',[
            'model' => $model,
            'uploaded' => $uploaded,
            'dir' => $dir,
        ]);
    }

    /**
     * Updates an existing Sertificate model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

       // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //    return $this->redirect(['view', 'id' => $model->id]);
        //} else {
         //   return $this->render('update', [
         //       'model' => $model,
          //  ]);
        //}

        $dir = Yii::getAlias('@frontend/web/images/');
        $uploaded = false;

        if ($model->load($_POST)) {
            //$file = UploadedFile::getInstances($model, 'image');
            $file = UploadedFile::getInstance($model, 'image');



            $model->image = $file;
            //$model->image_s = 'sm_'.$file;
            //$model->on = 1;

            if ($model->validate()) {
                // $uploaded = $file->saveAs( $dir . $model->image->name );
                $uploaded = $file->saveAs($dir.'tmp/'.$file);
                $name_img = uniqid().'.jpg';
                $waterfile=$dir.'watermark.png';
                Image::thumbnail($dir.'tmp/'.$file, 150, 210)->save(Yii::getAlias($dir.$name_img), ['quality' => 60]);
                Image::thumbnail($dir.'tmp/'.$file, 400, 560)->save(Yii::getAlias($dir.'tmp/big_'.$name_img), ['quality' => 60]);
                Image::watermark($dir.'tmp/big_'.$name_img, $waterfile, [250,450])->save(Yii::getAlias($dir.'big_'.$name_img));
                unlink($dir.'tmp/'.$file);
                unlink($dir.'tmp/big_'.$name_img);

                $model->image = 'big_'.$name_img;
                $model->image_s = $name_img;
                $model->on = 1;
                $model->save();

                return $this->render('view',[
                    'model' => $model,
                    'uploaded' => $uploaded,
                    'dir' => $dir,
                ]);

            }
        }

        return $this->render('update',[
            'model' => $model,
            'uploaded' => $uploaded,
            'dir' => $dir,
        ]);
    }

    /**
     * Deletes an existing Sertificate model.
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
     * Finds the Sertificate model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sertificate the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sertificate::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
