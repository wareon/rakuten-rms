composer require wareon/rakuten-rms

## config/app.php  providers  add line:
Wareon\RakutenRms\RakutenRmsServiceProvider::class,

## config/app.php aliases  add line:
'RakutenRms' => Wareon\RakutenRms\Facades\RakutenRms::class,

##publish command
php artisan vendor:publish --provider="Wareon\RakutenRms\RakutenRmsServiceProvider" 

##How to use?
use Wareon\RakutenRms\Facades\RakutenRms;
$msg = RakutenRms::getItem('123456');
