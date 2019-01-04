<?php

namespace frontend\controllers;

use common\models\Articles;
use common\models\Category;
use common\models\Products;
use frontend\models\ContactForm;
use Yii;
use yii\base\Module;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function __construct(string $id, Module $module, array $config = [])
    {
        Yii::$app->params['products'] = new Products();
        Yii::$app->params['contacts'] = new ContactForm();
        parent::__construct($id, $module, $config);
    }

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
                    'send-phone' => ['post'],
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
     * Displays main page.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new ContactForm();
        $products = Products::find()
            ->orderBy("RAND()")
            ->limit(8)
            ->asArray()
            ->all();
        return $this->render('index', [
            'model' => $model,
            'products' => $products
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
            'pageSize' => 10,
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
        $model = new Products();
        if ($model->load(Yii::$app->request->post())) {
            $result = [];
            $sum = 0;
            foreach ($model->id as $key => $item) {
                if ($key !== 0 && !empty($item)) {
                    $product = Products::findOne($key);
                    $result[$key]['product'] = $product;
                    $result[$key][] = $item;
                    $sum += $product->price * $item;
                }
            }


            return $this->render('cart', [
                'posts' => $result,
                'sum' => $sum,
                'model' => $model
            ]);
        }

        return $this->redirect(Yii::$app->request->referrer);

    }

    /**
     * @return string
     */
    public function actionCatalogue()
    {
        $posts = Category::find()->all();

        return $this->render('catalogue', [
            'posts' => $posts
        ]);
    }

    /**
     * @return string
     */
    public function actionCategory()
    {
        $query = Products::find()
            ->where(['status' => Products::STATUS_ACTIVE]);


        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 12,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('category', [
            'posts' => $posts,
            'pages' => $pages
        ]);
    }

    public function actionPosition($id)
    {
        $post = Products::findOne($id);
        return $this->render('position', [
            'post' => $post
        ]);
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    /**
     * @return string|\yii\web\Response
     */
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

    public function actionOrder()
    {
        $model = new Products();
        if ($model->load(Yii::$app->request->post())) {
            $sum = 0;
            $text = "Заказ:\n\n";
            foreach ($model->id as $key => $value) {
                $product = Products::findOne($key);
                $price = $product->price * $value;
                $text .= "Артикул: {$product->vendor_code}\n
Название продукта: {$product->product_name}\n
Цена: {$product->price}  руб.\n
Количество: {$value}\n
Итого: {$price} руб. \n\n
";
                $sum += $price;
            }
            $text .= "Общая сумма заказа: {$sum}\n\n";
            $text .= "Данные покупателя:\n";
            $text .= "Имя: {$model->name}\n";
            $text .= "Телефон: {$model->phone}\n\n\n";

            $model->sendEmailOrder($text);

            return $this->render('order');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionSendCall()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sendOrderCall() === true) {
                Yii::$app->session->setFlash('success', 'Ваша заявка отправлена');
                return $this->renderAjax('_call_form', ['model' => $model]);
            };
            Yii::$app->session->setFlash('error', 'Произошла ошибка. Попробуйте снова');
            return $this->renderAjax('_call_form', ['model' => $model]);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

}
