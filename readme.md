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

#### Explain params definition

Every route explain class contains methods `params`, `input` and `query`.

- `params` method should return array of parameters that are part of uri
- `input` method should return array of formData properties
- `query` method should return array of available route query param

example:

```
public function input() : array
{
    return [
        Param::integer('parent_id')->description('parent_id of object'),
        Param::string('title')->description('reqiored title')->required(),
        Param::string('language')->default('en')->possible(['en', 'pl'])->description('language with possible values of en or pl, ehwre en will be used if not provided'),
        Param::make('meta', 'weirdtype')->default(TRUE)->description('some meta field od weirdtype type, with true as default value')
    ];
}
```

To generate route explain file with name `IndexRouteExplain` in `app/Explains` directory simply type:

```
php artisan explain:route IndexRouteExplain

```

#### Explain example generation
To generate route explain example file with name `ValidationExample` in `app/Explains/Examples` directory simply type:

```
php artisan explain:example ValidationExample

```

#### Generate documentation

Simply type
```
php artisan explain
```

and... enjoy!
