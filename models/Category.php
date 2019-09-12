<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 26.01.2019
 * Time: 18:05
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getArticles()
    {
        return $this->hasMany(Articles::className() , ['categoryid' => 'id']);
    }
}