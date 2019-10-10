## Laravel Timezones Demo

This is a quick project to demonstrate timezone field, individual for every user.

The goal is that every uses sees the data (in this example, event start time) in their own timezone. 

![Laravel Timezones example](https://laraveldaily.com/wp-content/uploads/2019/01/laravel-timezones.png)

![Laravel Timezones example 2](https://laraveldaily.com/wp-content/uploads/2019/01/laravel-timezones-2.png)

For timezones list and conversions, used this package: [camroncade/timezone](https://github.com/camroncade/timezone)

Project is partly generated with our [QuickAdminPanel generator](https://quickadminpanel.com).

---

### How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__
- That's it - load the homepage, and log in with credentials __admin@admin.com__ / __password__.
- In login form, there's __Registration__ link to register new users and choose their timezone.

---

### License

Please use and re-use however you want.

---

## More from our LaravelDaily Team

- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com) 
- Read our [Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)
