<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactos".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $telefono
 * @property string $correo
 * @property string $descripcion
 */
class Contactos extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'correo', 'descripcion'], 'required'],
            [['nombre', 'telefono', 'correo', 'descripcion'], 'safe'],
            [['descripcion'], 'string'],
            [['nombre'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 20],
            [['correo'], 'email'],
     

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'descripcion' => 'Descripcion',
            'verifyCode' => 'Verification Code',

        ];
    }

     /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom($this->correo)
            ->setSubject($this->nombre)
            ->setTextBody($this->descripcion)
            ->send();
    }
}
