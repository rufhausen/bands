
 
## Bands DB

Bands DB is a sample Laravel 5.3.x application.

### Tools
- [Laravel 5.3](https://laravel.com)
- [MySQL](https://www.mysql.com/)
- [Bootstrap CSS Framework](http://getbootstrap.com/)
- [Bootstrap datepicker](https://github.com/uxsolutions/bootstrap-datepicker)
- [Font Awesome](http://fontawesome.io/)
- [jQuery](http://jquery.com/)
- [Laravel Collective HTML/form builder Composer package](https://github.com/LaravelCollective)
- [Intervention/Image Composer package](https://github.com/Intervention/image)

[Live Demo](http://bands.rufserver.com)

###Installation

Download repo:
```git clone git@github.com:rufhausen/bands.git```

Copy .env.example to .env and set db credentials

Create application key
```php artisan key:generate```

Install Dependencies:
```composer install```

Migrate & seed database: 
```php artisan migrate --seed```

### Notes  
- When albums are seeded, the application will attempt to create some placeholder album covers using a placeholder. The same will happen each time an album is user-created.
- When bands are deleted, their associated albums are deleted using a model event in the Band model.
- I've created an additional table for 'genres'. Since this data is essentially static, I've overridden the model's all() method to cache the genres list.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
