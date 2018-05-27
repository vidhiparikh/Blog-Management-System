<?php $options = [
				'cost' => 10,
				'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
];//remove this if you are using php version 7 or more
		
			$hashedpass = password_hash("lalala",PASSWORD_BCRYPT,$options);
			echo $hashedpass;
		?>