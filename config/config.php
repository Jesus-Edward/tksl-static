<?php



 if (!defined('BASE_PATH')) {
        define('BASE_PATH', '/trans-ks-ltd');
    }

    if (!defined('BASE_URL')) {
        define('BASE_URL', 'http://localhost' . BASE_PATH);
    }

return [

    /*
    |--------------------------------------------------------------------------
    | Web3Forms
    |--------------------------------------------------------------------------
    */

    'web3forms_key' => '36de35eb-0028-4a45-939d-bb97ca774b07',
    
    /*
    |--------------------------------------------------------------------------
    | Google reCAPTCHA v2
    |--------------------------------------------------------------------------
    */

    'recaptcha_v2_site_key' => '6LfsEtctAAAAAIsdMtaU1ZHIk4vF5bwfjdMLqUKj',
    'recaptcha_v2_secret_key' => '6LfsEtctAAAAAICeSXjjlNGVs14HWZzGA-atSIQo',


    /*
    |--------------------------------------------------------------------------
    | Google reCAPTCHA V3
    |--------------------------------------------------------------------------
    */
    
    'recaptcha_site_key' => '6LcAmcAtAAAAABu--EFntdyieQt4TDenNw0yw5Eg',
    'google_api_key' => 'AIzaSyBcGb_bF2hlSDgo9a2puD2QOkeQHq_F6MQ',
    
    'google_project_id' => 'project-1eec5a5c-fbd6-4636-ba6',
    
    'recaptcha_min_score' => 0.5,
    /*
    |--------------------------------------------------------------------------
    | Rate limiting
    |--------------------------------------------------------------------------
    |
    | Maximum number of submissions allowed from one IP
    | during the configured time window.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Email Settiings
    |--------------------------------------------------------------------------
    |
    */

    'company_email' => 'thompsonedward7life@gmail.com',
    'company_name' => 'Trans Kontinental Services Ltd',

    /*
    |--------------------------------------------------------------------------
    | Database Settiings
    |--------------------------------------------------------------------------
    |
    */

    'db_name' => 'trans-kontinental',
    'password' => '',
    'user' => 'root',
    'host' => '127.0.0.1',



    'rate_limit_max_attempts' => 5,

    'rate_limit_window' => 600, // 10 minutes


];