<?php
/**
 * Created by PhpStorm.
 * User: vova
 * Date: 02.12.2016
 * Time: 14:29
 */
namespace common\models;

use yii;

Class RecordHelpers
{
    /**
     * @param $model_name
     * @return mixed @id | bool
     */
    public static function userHas($model_name)
    {
        $connection = Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id = :userid";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $result = $command->queryOne();
        return $result == null ? false : $result['id'];
    }
}