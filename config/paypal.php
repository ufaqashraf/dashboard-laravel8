<?php 
return [ 
    'client_id' => 'AQYNSe3PdN4qYBzYP_xuGQ6Fm-ZQK4WUHO19QTmNn1sWlf9TI_9SX1oikRxq6FMjptyhuSS_P3AhgkZI',
	'secret' => 'EChJTIFnLlWx0DVCELkeuIOeNqMtYWdX1YQdZKRQdoqwdJxNOtaKAPutiZbyFJGHHSikJHUKMf9wYQMY',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];