<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Введите код с картинки',
            'name'=>'Ваше имя',
            'email'=>'Ваш E-mail',
            'subject'=>'Ваш телефон',
            'body'=>'Ваше сообщение',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        //$email==Yii::$app->params['adminEmail'];
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom(['no-reply@magnet.kg' => 'Magnet.kg mailer'])
            ->setSubject('Посетител оставил сообщение на сайте magnet.kg')
            ->setTextBody('Имя: '.$this->name.'. Телефон: '.$this->subject.' E-mail: '.$this->email.' Сообщение: '.$this->body)
            ->send();
    }
}