<?php
/**
 * Created by PhpStorm.
 * User: Anubis
 * Date: 05.02.2019
 * Time: 12:42
 */

namespace app\models;
use yii\db\ActiveRecord;

class CommentsForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'comments';
    }

    public function rules()
    {
        return [
            [['name' , 'message' , 'subject' , 'email'] , 'required'],
            [['email'] , 'email'],
            [['message' , 'subject'] , 'trim'],
        ];
    }
}