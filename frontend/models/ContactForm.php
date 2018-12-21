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

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
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
            ->setFrom('no-replay@witm.by')
            ->setSubject('Запрос на сборку устройства')
            ->setTextBody("Номер телефона клиента {$this->phone}")
            ->send();
    }
}
