<?php

namespace frontend\models;

use Yii;

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
            [['main_img', 'embed', 'text', 'title', 'description'], 'required'],
            [['text'], 'string'],
            [['main_img'], 'string', 'max' => 20],
            [['embed'], 'string', 'max' => 1000],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_img' => 'Main Img',
            'embed' => 'Embed',
            'text' => 'Text',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }
}
