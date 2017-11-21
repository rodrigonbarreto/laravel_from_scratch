## Laravel blog

run test: ./vendor/bin/phpunit 


# To create some random data
```
 php artisan tinker 
```

* posts -> factory(App\Post::class, 10)->create();
* tags -> factory(App\Tag::class, 10)->create();
