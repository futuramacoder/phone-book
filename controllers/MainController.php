<?php

namespace app\controllers;

use Yii;
use app\controllers\CountryController;
use app\models\PhoneBook;

class MainController extends CountryController
{
	public function actionIndex()
	{
		$model = new PhoneBook();
		$phones = $model->find()->orderBy('name')->all();

		foreach ($phones as $phone) 
		{
			$phone = preg_replace('![^0-9]+!', '', $phone['phone']);
			foreach ($this->countryArray as $key => $value) 
			{
				if(substr($phone, 0, strlen($value['code'])) == $value['code'])
				{
					$countrys[] = ['phone' => $phone, 'country' => $value['name']];
            		break;
				} 
			}
		}

		if ($model->load(Yii::$app->request->post()) && $model->validate())
		{
			$model->save();
			Yii::$app->session->setFlash('success', 'Контакт сохранен!');
			return $this->redirect(['index']);
		}
		else
		{
			return $this->render('index', [
				'phones' => $phones,
				'model' => $model,
				'countrys' => $countrys,
			]);
		}
	}
}