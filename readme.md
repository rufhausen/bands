
 
## Bands DB

Bands DB is a sample Laravel 5.3.x application.

### Tools
- [Laravel 5.3](https://laravel.com)
- [MySQL](https://www.mysql.com/)
- [Bootstrap CSS Framework](http://getbootstrap.com/)
- [Bootstrap datepicker](https://github.com/uxsolutions/bootstrap-datepicker)
- [Font Awesome](http://fontawesome.io/)
- [jQuery](http://jquery.com/)

[Live Demo](http://bands.rufserver.com)

###Installation

Download repo:
```git clone git@github.com:rufhausen/bands.git```

Copy .env.example to .env and set db credentials

Install Dependencies:
```composer install```

Migrate & seed database: 
```php artisan migrate --seed```

### Notes  
- When albums are seeded, the application will attempt to create some placeholder album covers using a placeholder. The same will happen each time an album is user-created.
- I've created an additional table for 'genres'. Since this data is essentially static, I've overridden the model's all() method to cache the genres list.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
