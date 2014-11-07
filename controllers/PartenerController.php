<?php

/**
 * @copyright (c) 2014, Armand Niculescu <armand.niculescu@gmail.com>
 */

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\Partener;
use app\models\PartenerForm;
use app\models\Util;

class PartenerController extends Controller
{

    public $layout = 'admin';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Partener::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new PartenerForm();
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model,'partener_poza');
            $model->partener_poza = $file;
            if ($post = $model->add()) {
                if ($file) {
                    $file->saveAs('images/parteneri/' . $post->partener_data . "_" . Util::formatFileName($file->name));
                }
                Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                return $this->redirect('/partener');
            }
        }
        return $this->render('add_partener', [
            'model' => $model
        ]);
    }

    public function actionDelete()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        if ($partener = Partener::findOne(['partener_id' => $id]))
        {
            unlink("images/parteneri/" . $partener->partener_poza);
            $partener->delete();
            Yii::$app->getSession()->setFlash('success', \Yii::t('app','Stergere cu success!'));
        }

        return $this->redirect('/partener');
    }

    public function actionEdit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";

        if ($partener = Partener::findOne(['partener_id' => $id]))
        {
            $model = new PartenerForm();
            if ($model->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($model,'partener_poza');
                $model->partener_poza = $file;
                if ($post = $model->update($partener)) {
                    if ($file) {
                        $file->saveAs('images/parteneri/' . $partener->partener_data . "_" . Util::formatFileName($file->name));
                    }
                    Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                    return $this->redirect('/partener');
                }
            }
            return $this->render('edit_partener', [
                'model' => $model,
                'partener' => $partener,
            ]);
        }
        return $this->redirect('[/partener]');
    }
}
