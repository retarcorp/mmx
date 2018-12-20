<?php

namespace frontend\controllers;

use common\models\Articles;
use frontend\models\ContactForm;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ContactForm();
        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionArticle($id)
    {
        $article = Articles::findOne($id);

        return $this->render('article', [
            'article' => $article
        ]);
    }

    /**
     * @return string
     */
    public function actionBlog(): string
    {
        $query = Articles::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 1,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('blog', [
            'posts' => $posts,
            'pages' => $pages
        ]);
    }

    public function actionCart()
    {
        return $this->render('cart');
    }

    public function actionCatalogue()
    {
        return $this->render('catalogue');
    }

    public function actionCategory()
    {
        return $this->render('category');
    }

    public function actionConstructor()
    {
        return $this->render('constructor');
    }

    public function actionPosition()
    {
        return $this->render('position');
    }

    public function actionSendPhone()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sendEmail() === true) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена');
                return $this->renderAjax('_contact_form', ['model' => $model]);
            };
            Yii::$app->session->setFlash('error', 'Произошла ошибка. Попробуйте снова');
            return $this->renderAjax('_contact_form', ['model' => $model]);
        }

        return $this->redirect(Yii::$app->request->referrer);

    }
}
