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
use app\models\Oferta;
use app\models\OfertaForm;
use app\models\Util;

class OfertaController extends Controller
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
            'query' => Oferta::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd()
    {
        $model = new OfertaForm();
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model,'oferta_poza');
            $model->oferta_poza = $file;
            if ($post = $model->add()) {
                if ($file) {
                    $file->saveAs('images/oferte/' . $post->oferta_data . "_" . Util::formatFileName($file->name));
                }
                Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                return $this->redirect('/oferta');
            }
        }
        return $this->render('add_oferta', [
            'model' => $model
        ]);
    }

    public function actionDelete()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        if ($oferta = Oferta::findOne(['oferta_id' => $id]))
        {
            unlink("images/oferte/" . $oferta->oferta_poza);
            $oferta->delete();
            Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
        }

        return $this->redirect('/oferta');
    }

    public function actionEdit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : "";

        if ($oferta = Oferta::findOne(['oferta_id' => $id]))
        {
            $model = new OfertaForm();
            if ($model->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstance($model,'oferta_poza');
                $model->oferta_poza = $file;
                if ($post = $model->update($oferta)) {
                    if ($file) {
                        $file->saveAs('images/oferte/' . $oferta->oferta_data . "_" . Util::formatFileName($file->name));
                    }
                    Yii::$app->getSession()->setFlash('success', \Yii::t('app','Salvare cu success!'));
                    return $this->redirect('/oferta');
                }
            }
            return $this->render('edit_oferta', [
                'model' => $model,
                'oferta' => $oferta,
            ]);
        }
        return $this->redirect('[/oferta]');
    }
}
