<?php
namespace admin\models;

use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles'; // TODO: Change the autogenerated stub
    }
    public function rules()
    {
        return [
            [['title','category_id','content','short_description'],'required'],
            ['id','safe']
        ];
    }
    public function beforeSave($insert)
    {
        if (strpos($this->content, "<input class")){
            $this->content = substr($this->content, 0, strpos($this->content, "<input class"));
        }
        return true;
    }
    public function attributeLabels()
    {
        return [
            'title'=>'Название',
            'short_description'=>'Краткое описание',
            'content'=>'Описание',
            'category_id'=>'Категория',
        ];
    }
}