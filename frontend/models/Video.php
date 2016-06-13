<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "video".
 *
 * @property integer $id
 * @property string $main_img
 * @property string $embed
 * @property string $text
 * @property string $title
 * @property string $description
 */
class Video extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['embed', 'title'], 'required'],
            [['text'], 'string'],
            [['main_img'], 'string', 'max' => 20],
            [['embed'], 'string', 'max' => 1000],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
            [['imageFile'], 'file', 'extensions' => 'jpg,jpeg,gif,png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'embed' => 'Видео код',
            'main_img' => 'Рисунок',
            'text' => 'Текст',
            'title' => 'Название видео',
            'description' => 'Описание к видео',
            'imageFile' => 'Рисунок',
        ];
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);

        $this->saveImage();

        $dao=Yii::$app->db;
    }

    protected function saveImage(){
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');

        if (Yii::$app->request->serverName=='magnet.loc') {
            Image::$driver = [Image::DRIVER_GD2];
        }
        $tosave=Yii::getAlias('@webroot').'/images/video/'.$this->id;
        if (!file_exists($tosave)) {
            @mkdir($tosave);
        }

        if($this->imageFile){
            //delete previous main img
            $time=time();
            $extension=$this->imageFile->extension;
            $imageName=$time.'.'.$extension;
            $this->imageFile->saveAs($tosave.'/' . $imageName);

            //$imagine=Image::getImagine()->open($tosave.'/'.$imageName);
            //$imagine->thumbnail(new Box(400, 250))->save($tosave.'/s_'.$imageName);
            Image::thumbnail($tosave.'/'.$imageName,640, 360)->save($tosave.'/'.$imageName);

            Yii::$app->db->createCommand("UPDATE video SET main_img='{$imageName}' WHERE id='{$this->id}'")->execute();
        }
    }
}
