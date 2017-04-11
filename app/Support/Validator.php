<?php 

namespace App\Support;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator as LaravelValidator;

/**
* 
*/
class Validator extends LaravelValidator
{
	public function validateRecaptcha($attribute, $value, $parameters)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $value
        ]);

        if ($response->getStatusCode() !== 200)
        {
            Session::flash('error', 'Algo Fallo. Por favor intentelo nuevamente');
            return false;
        }

        return true;
    }
}