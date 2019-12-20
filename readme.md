[![Build Status](https://travis-ci.com/napoleon101392/acme.svg?branch=master)](https://travis-ci.com/napoleon101392/acme)

# To start with the backend

```bash
composer install
php artisan migrate --seed
php artisan passport:install
```

If you get an error for some reason and it regards to Application Key, try to regenerate your local token

```bash
php artisan key:generate
```

# To start with the frontend

```bash
cd ./@frontend
yarn install
yarn build
yarn start
```
