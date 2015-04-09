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
            ['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['nombre', 'match', 'pattern' => "/^[a-z]+[a-z\s]+[a-z]$/i", 'message' => 'Solo se aceptan letras'],
            ['descripcion', 'match', 'pattern' => "/^.{20,}$/", 'message' => 'Mínimo 20 caracteres'],
            ['telefono', 'match', 'pattern' => "/^.{11}$/", 'message' => 'Mínimo y máximo 11 caracteres'],
            ['telefono', 'match', 'pattern' => "/^[0-9]+$/i", 'message' => 'Sólo se aceptan numeros'],
            ['correo', 'email', 'message' => 'Formato no válido'],
     

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
        $body = "<h3>".$this->nombre."</h3>";
        $body .= "<p>".$this->descripcion."</p>";
        $body .= "<p><b>Telefono: </b>".$this->telefono."</p>";
         $body .= "<p><b>Correo: </b>".$this->correo."</p>";
        return Yii::$app->mailer->compose()
            ->setTo($this->correo)
            ->setFrom($email)
            ->setSubject("Contacto ".$this->nombre )
            ->setHtmlBody($body)
            ->send();
    }
}
