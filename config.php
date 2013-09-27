<?php




$AppConfig = array (
	'db' 			=> array (
		'host'			=> 'localhost:3306',
		'user'			=> 'tatrdbo_tat',
		'password'	=> 'rebhezozo1975',
		'database'	=> 'tatrdbo_tat',
	),

	'page' 		=> array (
		'ar_title'					=> 'حرب التتار - لعبة الانترنت - العرب, الرومان, الاغريق, الجرمان',
		'en_title'				=> 'Tatar war',
		
		'meta-tag' 				=> '',
		'asset_version'		=> 'c4b7c089def'						// this is used to flush any old assets like css file or javascript
	),

	'system' 	=> array (
		'lang'						=> 'ar',										// this is the default language, ar = for arabic, en = for english
		'forum_url'				=> 'http://www.dboor.com/forum/',
		'social_url'				=> 'http://www.tatar.dboor.com/',
		
		// admin account info
		'adminName'			=> 'admin',
		'adminPassword'	=> 'rebhezozo1975',
		'admin_email'			=> 'rebhee62@yahoo.com',			// the email for admin account (set it before setup)
		
		'email' 					=> 'rebhee62@yahoo.com'			// the email for others (like activation, forget password, ..etc)
	),

	'plus'			=> array (
		'packages'	=> array (
			array ( 
				'name'		=> 'Package A',
				'gold'			=> 30,
				'cost'			=> 1.49,
				'currency'	=> 'EGP',
				'image'		=> 'package_a.jpg'
			),
			array ( 
				'name'		=> 'Package B',
				'gold'			=> 100,
				'cost'			=> 3.99,
				'currency'	=> 'EGP',
				'image'		=> 'package_b.jpg'
			),
			array ( 
				'name'		=> 'Package C',
				'gold'			=> 250,
				'cost'			=> 7.99,
				'currency'	=> 'EGP',
				'image'		=> 'package_c.jpg'
			),
			array ( 
				'name'		=> 'Package D',
				'gold'			=> 600,
				'cost'			=> 15.99,
				'currency'	=> 'EGP',
				'image'		=> 'package_d.jpg'
			),
		),
		
		'payments' => array (
			'cashu'	=> array (
				'testMode'		=> false,
				'name'			=> 'CashU',
				'period'		=> 'فورا',
				'description'	=> 'الدفع عبر CASHU سهل وسريع',
				'image'			=> 'cashu.gif',
				'merchant_id'	=> 'dboornetwork',
				'key'			=> '524891',
				'testKey'		=> '5248910',
				'serviceName'	=> 'TatarWars',
				'returnKey'		=> '548fhr84747',
				'currency'		=> 'usd'
			),
			'paypal'	=> array (
				'testMode'		=> false,
				'name'			=> 'PayPal',
				'period'		=> 'فورا',
				'description'	=> 'الدفع عبر Paypal سهل وسريع',
				'image'			=> 'paypal.gif',
				'merchant_id'	=> 'rebhee62@gmail.com',
				'key'			=> '',
				'testKey'		=> '',
				'serviceName'	=> '',
				'returnKey'		=> '',
				'currency'		=> 'USD'
			),
		)
	)
);

