<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property string $main_img
 * @property string $text
 * @property string $title
 * @property string $description
 */
class Photo extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $imageFiles=array();


    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'string'],
            [['main_img'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
            [['imageFile'], 'file', 'extensions' => 'jpg,jpeg,gif,png'],
            [['imageFiles'], 'file', 'extensions' => 'jpg,jpeg,gif,png', 'maxSize'=>20*1024*1024, 'maxFiles'=>10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_img' => 'Основной рисунок',
            'text' => 'Текст',
            'title' => 'Название альбома',
            'description' => 'Описание альбома',
            'imageFile' => 'Основ. рисунок',
            'imageFiles' => 'Фотографии',
        ];
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);

        $this->saveImage();
        $this->optimizeImage();

        $dao=Yii::$app->db;
    }

    protected function saveImage(){
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');

        if (Yii::$app->request->serverName=='magnet.loc') {
            Image::$driver = [Image::DRIVER_GD2];
        }
        $tosave=Yii::getAlias('@webroot').'/images/photo/'.$this->id;
        if (!file_exists($tosave)) {
            @mkdir($tosave);
        }

        if($this->imageFile){
            $time=time();
            $extension=$this->imageFile->extension;
            $imageName=$time.'.'.$extension;
            $this->imageFile->saveAs($tosave.'/' . $imageName);

            $imagine=Image::getImagine()->open($tosave.'/'.$imageName);
            $imagine->thumbnail(new Box(1500, 1000))->save($tosave.'/'.$imageName);
            //$imagine->thumbnail(new Box(400, 250))->save($tosave.'/s_'.$imageName);
            Image::thumbnail($tosave.'/'.$imageName,250, 250)->save($tosave.'/s_'.$imageName);

            Yii::$app->db->createCommand("UPDATE photo SET main_img='{$imageName}' WHERE id='{$this->id}'")->execute();
        }
        if($this->imageFiles){
            foreach($this->imageFiles as $image)
            {
                $time=time().rand(1000, 100000);
                $extension=$image->extension;
                $imageName=$time.'.'.$extension;

                $image->saveAs($tosave.'/' . $imageName);
                $imagine=Image::getImagine()->open($tosave.'/'.$imageName);
                $imagine->thumbnail(new Box(1500, 1000))->save($tosave.'/' .$imageName);
                //$imagine->thumbnail(new Box(400, 250))->save($tosave.'/s_'.$imageName);
                Image::thumbnail($tosave.'/'.$imageName,250, 250)->save($tosave.'/s_'.$imageName);
            }
        }
    }

    protected function optimizeImage(){
        $webroot=Yii::getAlias('@webroot');
        $folder=$webroot.'/images/photo/'.$this->id;
        if(is_dir($folder)){
            $scaned=scandir($folder);
            foreach($scaned as $scan){
                if($scan!='.'&& $scan!='..'){
                    $exp=explode('.',$scan);
                    if(isset($exp[1])){
                        $ext=strtolower($exp[1]);
                        $file=$folder.'/'.$scan;
                        if($ext=='jpg' || $ext=='jpeg'){
                            $command ='jpegoptim '.$file.' --strip-all --all-progressive';
                            shell_exec($command);
                        }
                        elseif($ext=='png'){
                            $command ='optipng '.$file;
                            shell_exec($command);
                        }
                    }
                }
            }
        }
    }
}
