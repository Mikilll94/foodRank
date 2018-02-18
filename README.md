# FoodRank
FoodRank - it's a social networking site about restaurants - share and get to know people's opinions about restaurants in Poznań.

During FoodRank development there was an emphasis on a user interface which should be friendly and easy to use. The application is fully responsive. It looks great on every device (mobile, tablet, PC) and on every browser (including IE 11 also :) ).

Application was deployed to [Heroku](https://www.heroku.com/) cloud platform. You can access it by entering the webpage https://foodrank.herokuapp.com/.

The application uses following technologies:
- PHP 7.1.11
- Symfony 4.0.1
- HTML, CSS, Javascript
- Composer to manage backend dependencies
- node.js, NPM to manage frontend dependencies
- Bootstrap 3.3.7
- PostgreSQL 10

Local installation
- run `git clone https://github.com/Mikilll94/foodRank`
- run `composer install` to install backend dependencies
- run `yarn install` to install frontend dependencies
- create `.env` file if not exist and type your database connection URL in this file
- run `php/bin console doctrine:schema:update --force`
- run `php bin/console doctrine:fixtures:load` to load initial data
- run `php bin/console server:run`
- go to http://localhost:8000 in your browser and enjoy :)