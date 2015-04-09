<?php

namespace  app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Postulantes extends Model
{
    public $categoria;
    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['categoria','file'], 'required'],
            // email has to be a valid email address
            [['file'], 'file'],
            [['file'], 'file', 'extensions' => 'pdf, doc, docx','wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}'],
            [['file'], 'file', 'maxSize' => 1024*1024*1,'tooBig' => 'El tamaño máximo permitido es 1MB'],
            [['file'], 'file', 'minSize' => 10*1024*1,'tooSmall' => 'El tamaño minimo permitido es 10 KB']
        
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoria' => 'Categoria',
            'file'=> 'Curriculum',
        ];
    }
    public function obtenercategorias(){
      $categ= [
    ['nombre' => 'Diseñador Web'],
    ['nombre' => 'Programador Web'],
    ['nombre' => 'Base de Datos'],
    ];
        return $categ;
    }
     public function sendEmail($email)
    {
        $body = "<h3> Postulante ".$this->categoria."</h3>";
        return Yii::$app->mailer->compose()
            ->setTo("raul0115@gmail.com")
            ->setFrom($email)
            ->setSubject("Postulante ".$this->categoria )
            ->setHtmlBody($body)
            ->attach($this->file)
            ->send();
    }

}
