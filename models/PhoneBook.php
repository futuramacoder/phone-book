<?php

namespace app\models;

use yii\db\ActiveRecord;

class PhoneBook extends ActiveRecord
{
    public static function tableName()
    {
        return 'user-phone';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'phone'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон'
        ];
    }
}