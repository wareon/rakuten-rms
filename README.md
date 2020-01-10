composer dump-autoload

## config/app.php add line:
'RakutenRms' => Wareon\RakutenRms\RakutenRms::class

##publish command
php artisan vendor:publish --provider="Wareon\RakutenRms\RakutenRmsServiceProvider" 
