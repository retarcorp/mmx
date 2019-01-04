<?php

namespace backend\controllers;

use backend\models\ConstructorSearch;
use common\models\Constructor;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ConstructorController implements the CRUD actions for Constructor model.
 */
class ConstructorController extends Controller
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
     * Lists all Constructor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Constructor();
        $searchModel = new ConstructorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Creates a new Constructor model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     *
     * @return \yii\web\Response
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model = new Constructor();

        if ($model->load(Yii::$app->request->post())) {
            $model->default_name = UploadedFile::getInstance($model, 'default_name');
            if ($model->upload($model->default_name) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Файл успешно загружен');
            } else {
                Yii::$app->session->setFlash('error', 'Произошла ошибка! Попробуйте еще раз');
            }
        }

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Constructor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Constructor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Constructor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Constructor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
