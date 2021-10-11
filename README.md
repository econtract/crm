E-Contract BVBA - CRM package
=============================================

This package offers the integration of the Aanbieders.be CRM API. This API can be used by partners and affiliates of Aanbieders to commonicate with the Aanbieders internal CRM system.




## Installation

Pull this package in through Composer:

```js

    {
        "require": {
            "econtract/crm": "4.*"
        }
    }

```

Or install it via the commandline:

```

    composer require econtract/crm

```

Next, you will need to add several values to your `.env` file:

```

    AB_CRM_URL=http://foo.com/bar           // URL to the Aanbieders CRM system
    AB_CRM_ID=your_crm_api_id               // Your unique CRM API ID
    AB_CRM_KEY=your_crm_api_key             // Your unique CRM API key

```

In order to use the CRM API (and thus this package), an API key is required. If you are in need of such a key, please get in touch via evert [at] aanbieders.be.


### Laravel installation

Add the service provider to your `config/app.php` file:

```php

    'providers'             => array(

        //...
        \Econtract\Crm\CrmServiceProvider::class,

    )

```

Add the CRM API as an alias to your `config/app.php` file

```php

    'facades'               => array(

        //...
        'Crm'                   => \Econtract\Crm\Facades\Crm::class,

    ),

```




## Usage

### Laravel usage

You can access the API using the alias you have selected in your `config/app.php` file:

```php

    $contract = Crm::getContract( 63 );

    $input = array(
        'producttype'                   => 'gas',
        'product_id'                    => 12,
        'supplier_id'                   => 5,

        'new_connection'                => false,
        'activation_date'               => '2015-03-19',
        'install_date'                  => '2015-03-17',

        'send_confirmation_mail'        => true,
    );

    $contract = Crm::createOrder( $input );

```

For information regarding all possible parameters and their properties, please get in touch with Aanbieders.be via [their website](https://www.aanbieders.be/contact).


### Non-laravel usage

```php

    include('vendor/autoload.php');

    use Econtract/Crm/CrmService;


    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();


    $crmService = new CrmService();
    $contract = $crmService->getContract( 63 );

```



## License

This package is proprietary software and may not be copied or redistributed without explicit permission.




## Contact

Charles Dekkers

- Email: charles@aanbieders.be

