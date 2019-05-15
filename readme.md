### Explainer
A simple Laravel and Lumen api documentation generator


### Features
This tool makes possible to explain every app route by using simple `explain` method via clean document accessible under configured route address.


### How to use

Simply call `explain` method on your routes:

Laravel:
```
Route::get('/', 'IndexController@index')->explain(\App\Explains\IndexRouteExplain::class);
```

Lumen:
```
$router->get('/', 'IndexController@index')->explain(\App\Explains\IndexRouteExplain::class);
```


### Examples

#### Explain file generation
To generate route explain file with name `IndexRouteExplain` in `app/Explains` directory simply type:

```
php artisan explain:route IndexRouteExplain

```

#### Explain example generation
To generate route explain example file with name `ValidationExample` in `app/Explains/Examples` directory simply type:

```
php artisan explain:example ValidationExample

```

#### generate documentation

Simply type
```
php artisan explain
```

and... enjoy!
