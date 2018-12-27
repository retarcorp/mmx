<?php

namespace frontend\models;

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
        $to = "levchuk08@gmail.com";

        $subject = "Запрос на сборку устройства";

        $message = "Номер телефона клиента {$this->phone}";

        $headers = "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "From: <no-replay@щитм.бел>\r\n";

        return mail($to, $subject, $message, $headers);
    }
}
