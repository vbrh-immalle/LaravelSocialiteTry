# Instructions

- Run `composer install` after cloning to download `vendor`-directory.
- Make an OAuth `id` and `secret` on your social login provider's account :octocat:
- Copy `.env.example` to `.env` and edit appropriately
- run `php artisan key:generate` to generate a new application key in the `.env`-file
- Go to `http://your-devserver-adress.and:port/login/github` and watch how the social login platform(s) return data :sunglasses: 

> Check the commit history and diff's to get a feel for the workflow
  to add another social login to a Laravel project.
  Check https://github.com/laravel/socialite for available options.

# Where are the developer settings of my social provider? 

- GitHub: check the settings in your GitHub profile :octocat:
- Google: check https://console.developers.google.com
- Facebook
- Twitter
- ...
