<?php
$AppConfig = array (
	'db' 					=> array (
		'host'				=> 'localhost',
		'user'				=> 'root',
		'password'			=> '1',
		'database'			=> 'tatar',
	),
	'page' 		=> array (
		'ar_title'			=> 'Tatar Wars Beta',
		'en_title'			=> 'Tatar Wars Beta',
		'meta-tag' 			=> '',
		'asset_version'		=> 'c4b7aaaadef'						// this is used to flush any old assets like css file or javascript
	),
	'system' 	=> array (
		'lang'				=> 'ar',										// this is the default language, ar = for arabic, en = for english
		'forum_url'			=> '#',
		'social_url'		        => '#',
		// admin account info
		'adminName'			=> 'admin',
		'adminPassword'		=> '123123',
		'admin_email'		=> 'support@bazaid-company.com',			// the email for admin account (set it before setup)
		'email' 			=> 'support@bazaid-company.com',			// the email for others (like activation, forget password, ..etc)
		'installkey' 			=> 'installbazaidgame',
		'calltatar' 			=> 'showbazaidtatar'
	),
	'plus'			=> array (
		'packages'	=> array (
			array ( 
				'name'		=> 'Package A',
				'gold'		=> 30,
				'cost'		=> 1,
				'currency'	=> 'usd',
				'image'		=> 'package_a.jpg'
			),
			array ( 
				'name'		=> 'Package B',
				'gold'		=> 100,
				'cost'		=> 1.5,
				'currency'	=> 'usd',
				'image'		=> 'package_b.jpg'
			),
			array ( 
				'name'		=> 'Package C',
				'gold'		=> 250,
				'cost'		=> 1.99,
				'currency'	=> 'usd',
				'image'		=> 'package_c.jpg'
			),
			array ( 
				'name'		=> 'Package D',
				'gold'		=> 600,
				'cost'		=> 2.99,
				'currency'	=> 'usd',
				'image'		=> 'package_d.jpg'
			),
		),
		'payments' => array (
			//'cashu'	=> array (
				//'testMode'		=> FALSE,
				//'name'			=> 'CashU',
				//'image'			=> 'cashu.gif',
				//'serviceName' 	=> '#',
				//'merchant_id'	=> '#',
				//'key'			=> '#',
				//'testKey'		=> '#',
				//'returnKey'		=> '#',
				//'currency'		=> 'usd'
			//),
			//'onecard'	=> array (
				//'testMode'		=> FALSE,
				//'name'			=> 'OneCard',
				//'image'			=> 'onecard_logo.gif',
				//'serviceName' 	=> '',
				//'merchant_id'	=> '#',
				//'key'			=> '#',
				//'testKey'		=> '#',
				//'returnKey'		=> '#',
				//'currency'		=> 'usd'
			//),
			'paypal'	=> array (
				'testMode'		=> false,
				'name'			=> 'PayPal',
				'image'			=> 'paypal_solution_graphic-US.gif',
				'merchant_id'	=> 'mr-daddy.x@live.com',//#
				'currency'		=> 'USD'
			)
		)
	)
);