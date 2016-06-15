<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;

/**
 * This is the model class for table "rent".
 *
 * @property integer $id
 * @property string $text
 */
class Rent extends \yii\db\ActiveRecord
{
    public $imageFile;
    public $imageFiles=array();
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
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
            'text' => 'Текст',
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
        $tosave=Yii::getAlias('@webroot').'/images/rent/'.$this->id;
        if (!file_exists($tosave)) {
            @mkdir($tosave);
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
        $folder=$webroot.'/images/rent/'.$this->id;
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
