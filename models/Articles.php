<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 26.01.2019
 * Time: 18:11
 */

namespace app\models;

use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className() , ['id' => 'categoryid']);
    }

    public function getComments()
    {
        return $this->hasMany(Comments::className() , ['id' => 'articleid']);
    }
}