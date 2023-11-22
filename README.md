IbexaCustomSettingsBundle
=======

Symfony bundle to make sure the tools used are working properly.

## Requirements

* php: >=7.4
* ibexa: ^3.3

## Installation

### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require onisep/ibexa-health-check-bundle
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

### Step 2: Enable the Bundle

Add `Onisep\IbexaHealthCheckBundle\IbexaHealthCheckBundle::class => ['all' => true]`, in the `config/bundles.php` file.

Like this:

```php
<?php

return [
    // ...
    Onisep\IbexaHealthCheckBundle\IbexaHealthCheckBundle::class => ['all' => true],
    // ...
];
```

### Step 3: Import bundle routing file

```yaml
# app/config/routing.yml or config/routing.yaml

_healthCheck_routes:
  resource: '@IbexaHealthCheckBundle/Resources/config/routes.yaml'
```
## License

This package is licensed under the [MIT license](LICENSE).
