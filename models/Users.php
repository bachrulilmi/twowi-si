<?php

namespace app\models;

use yii\db\ActiveRecord;


class Users extends ActiveRecord
{
	
	
		
		public function rules()
		{
			return [
				[['userid','password'], 'required'],
			];
		}	
	
}

?>