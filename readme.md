### Explainer
A simple Laravel and Lumen api documentation generator


### Features
This tool makes possible to explain every app route by using simple `explain` method via clean document accessible under configured route address.


### How to use

Simply call `explain` method on your routes:

Laravel:

```php
Route::get('/', 'IndexController@index')->explain(\App\Explains\IndexRouteExplain::class);
```

Lumen:

```php
$router->get('/', 'IndexController@index')->explain(\App\Explains\IndexRouteExplain::class);
```


### Examples

#### Explain file generation
To generate route explain file with name `IndexRouteExplain` in `app/Explains` directory simply type:

```
php artisan explain:route IndexRouteExplain

```

#### Explain params definition

Every route explain class contains methods `params`, `input` and `query`.

- `params` method should return array of parameters that are part of uri
- `input` method should return array of formData properties
- `query` method should return array of available route query param

example:

```php
use Lemon\Explainer\Explain\Param;

public function input() : array
{
    return [
        // required `parent_id` field
        Param::integer('parent_id')->required()->description('parent_id of object')->required(),

        // optional `title` field
        Param::string('title')->description('optional title'),

        // optional `language` field with possible values of `en` or `pl`, where `en` will be used if not provided
        Param::string('language')->optional()->default('en')->possible(['en', 'pl'])->description('description'),

        // `meta` field od `weirdtype` type, with true as default value
        Param::make('meta', 'weirdtype')->default(TRUE)->description('some meta field od weirdtype type, with true as default value')
    ];
}
```

To generate route explain file with name `IndexRouteExplain` in `app/Explains` directory simply type:

```
php artisan explain:route IndexRouteExplain

```

#### Explain request generation
To generate request example file with name `ValidationExample` in `app/Explains/Requests` directory simply type:

```
php artisan explain:request ValidationExample

```

#### Explain response generation
To generate response example file with name `ValidationExample` in `app/Explains/Responses` directory simply type:

```
php artisan explain:response ValidationExample

```

#### Generate documentation

Simply type
```
php artisan explain
```

and... enjoy!


### Problems
Lumen may throw exception about storage paths. You can fix this by adding these lines in your `app/bootstrap.php` file after `$app` variable creation

```php
$app->instance('path.config', app()->basePath() . DIRECTORY_SEPARATOR . 'config');
$app->instance('path.storage', app()->basePath() . DIRECTORY_SEPARATOR . 'storage');
$app->instance('path.public', app()->basePath() . DIRECTORY_SEPARATOR . 'public');
```
