# Laravel technical test
[![Build Status](https://travis-ci.org/JordiTL/laravel-technical-test.svg)](https://travis-ci.org/JordiTL/laravel-technical-test)

[![Build Status](https://jorditl.github.io/laravel-technical-test/bblogo.png)](https://jorditl.github.io/laravel-technical-test/bblogo.png)

This project is only a technical test to show some basic skills using Laravel PHP framework.

But... **your pull requests are always welcome!!!**. Knowledge needs to be shared.

```
Share your knowledge.
It’s a way to achieve immortality.

Dalai Lama
```


## Table of Contents

- <a href="#bootstrapping">Bootstrapping</a>
    - <a href="#homestead">Homestead</a>
    - <a href="#composer">Composer</a>
    - <a href="#migrations">Migrations</a>
    - <a href="#gulp">Gulp</a>
    - <a href="#cron">Cron</a>
- <a href="#usage">Usage</a>
	- <a href="#scraper">Scraper</a>
- <a href="#future-work">Future work</a>
- <a href="#git-flow">Git Flow</a>
- <a href="#travis-ci">Travis CI</a>
- <a href="#contributors">Contributors</a>
- <a href="#license">License</a>
	- <a href="#mit">MIT</a>


## Bootstrapping

### Homestead
First of all, be sure you have a local copy of the repository in your filesystem.

You can achieve that typing:

```Shell
$ git clone https://github.com/JordiTL/laravel-technical-test.git
$ cd laravel-technical-test
```

Then you have to create your local Homestead configuration file:

#### Linux
```Shell
$ php vendor/bin/homestead make
```

#### Windows
```Shell
$ vendor\bin\homestead make
```

Now you need to run the virtual machine via Vagrant:
```Shell
$ vagrant up
```

[Optional] Add your custom mapping to your hosts file

You can add it manually by appending the following lines to your `/etc/hosts` file:

```
#The following line is added automatically to map Homestead host
[homestead-ip] homestead.app
```

Or adding it automatically running:

```Shell
$ printf "\n#The following line is added automatically to map Homestead host\n`grep -Po '(?<=ip: ").*(?=")' Homestead.yaml` homestead.app\n" | sudo tee --append /etc/hosts
```


### Composer

Now you have to connect via ssh to your Homestead instance:

```Shell
$ vagrant ssh
```

And run inside it:

```Shell
$ cd [project-folder]
$ composer install
```

For example:

```Shell
$ cd /home/vagrant/Work/Laravel/laravel-technical-test/
$ composer install
```

### Migrations

We need to generate the database schema before we can use the app. But before that we need to generate an environment file:
```Shell
$ cp .env.example .env
$ php artisan key:generate
```

Then we need to create the database an users (feel free to change this settings in your production environment):
```Shell
$ mysql -uhomestead -psecret

mysql> CREATE DATABASE laraveltest;
mysql> GRANT ALL PRIVILEGES ON laraveltest.* TO 'laraveluser'@'localhost' IDENTIFIED BY 'laravelpassword';
mysql> quit;
```

And then in project folder (inside homestead) run:
```Shell
$ php artisan migrate
```

If you want a default usertry:
```Shell
$ php artisan db:seed
```

- **email**: user@test.com
- **password**: password

### Gulp

The last step is to run Gulp to generate the public resources:
```Shell
$ gulp
```

And... you are done to test the app!

### Cron

The application has a built-in web scraper. It is configured to scrap the web hourly with the Laravel Scheduler.
The bad news are that Laravel Scheduler will only work if you add a cron to your system:

```Shell
$ crontab -e
```

And add the following line:
```cron
* * * * * php [artisan-executable] schedule:run 1>> /dev/null 2>&1
```

For example:
```cron
* * * * * php /home/vagrant/Work/Laravel/laravel-technical-test/artisan schedule:run 1>> /dev/null 2>&1
```

## Usage
This comes with a built-in commands. In the following sections you will see some of them.

### Scraper
#### Retrieval
This command will connect to http://www.appliancesdelivered.ie, download and store a collection of the ten cheapest products and the ten most expensive ones.

```Shell
$ php artisan scraper:retrieval
```

You can check all available commands by running:

```Shell
$ php artisan
```

## Git Flow

This project is developed using git-flow methodology.

[![Build Status](https://jorditl.github.io/laravel-technical-test/gitflow.png)](https://jorditl.github.io/laravel-technical-test/gitflow.png)

## Travis CI

This project has associated TravisCI hooks to perform automatic testing. Here you can visit the project page on travis:
https://travis-ci.org/JordiTL/laravel-technical-test

## Contributors
- Jorge Torregrosa Lloret ( jtorregrosalloret@gmail.com )
    - [LinkedIn](https://es.linkedin.com/in/jtorregrosalloret)

## Future work
Like all software projects, there is always a way to improve them. This is not an exception. The following lines will enumerate a few cool future features:

- Redis | Memcached | Hazelcast datagrid integration.
- Front-end improvements.
- Advanced scraping + crawling functionality.
- Advanced customization scraper options.
- Separate scraper to a custom project.
- Stripe payment API integration.
- E2E testing with PhantomJS
- ...

And maybe some crazy stuff:

- Realtime owner-customer chat
- Telegram (messaging app) sync with the chat
- Administrator capabilities to control [Juno](https://en.wikipedia.org/wiki/Juno_(spacecraft)

## License
### MIT

```
The MIT License (MIT)

Copyright (c) 2016 Jorge Torregrosa

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```
