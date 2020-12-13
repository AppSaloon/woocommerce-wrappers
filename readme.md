# Usage

Add
```
"require": {
	"appsaloon/woocommerce-wrappers": "1.0.0-alpha4"
  },
  "autoload": {
	"psr-4": {
	  "appsaloon\\packages\\woocommerce\\" : "vendor/appsaloon/woocommerce-wrappers/"
	}
  }
```

To your plugin or project composer.json

Add ``require_once __DIR__ . '/vendor/autoload.php';
`` to your plugin file or to functions.php in your theme

Adjust the path for your use case, this will automatically load the classes as you need them.

All methods that wrap WooCommerce functions that can return multiple types will return the single type one would expect
if everything went right or throw an Exception.

For instance:
```
$woocommerce = new Woocommerce_Functions();
$woocommerce->get_product( 5 );
```

will return an object of type WC_Product if a product with id 5 exists, if not it will throw an Exception.

To handle this correctly, simply catch the exception and handle the error there.