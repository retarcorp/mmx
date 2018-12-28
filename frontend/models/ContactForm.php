<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $phone;
    public $name;

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'safe'],
            [['phone'], 'required'],
            [['phone'], 'match', 'pattern' => '^(\+375|80)\s(29|25|44|33|17)\s(\d{3})\s(\d{2})\s(\d{2})$',
                'message' => 'Телефон должен быть в формате +375/80 ХХ ХХХ ХХ ХХ'
            ]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'phone' => 'Ваш телефон',
            'name' => 'Ваше имя'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail(): bool
    {
        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom('levchuk08@gmail.com')
            ->setSubject('Заказ с сайта')
            ->setTextBody("Номер телефона клиента: {$this->phone}")
            ->send();
    }

    public function sendOrderCall()
    {
        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom('levchuk08@gmail.com')
            ->setSubject('Заказать звонок')
            ->setTextBody("Имя: {$this->name}\nНомер телефона: {$this->phone}")
            ->send();
    }
}
