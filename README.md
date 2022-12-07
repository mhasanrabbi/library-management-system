
## Library Management System

### Features
	- User registration
	- User Login
	- Retrieve and Render All Books
	- Add books
	- Edit book data
	- Update book data
	- Delete book
	- On Delete book moved to Trash
	- From Trash book can be Restored and Permanently Deleted
	- Pagination
	- Add book to cart
	- Checkout from cart
 
## *Installation*


### Clone the repository:
``` 
$ git clone https://github.com/mhasanrabbi/library-management-system.git
```

### Change Directory

```
$ cd library-management-system
```
### Install Composer
``` 
$ composer install
```
### Generate APP_KEY 
``` 
$ php artisan key:generate
```

### Change below credentials with your own config in `.env`
``` 
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Run Migration and Seed Database

``` 
$ php artisan migrate --seed
```

### Start Local Development Server

``` 
$ php artisan serve
```

### Login as admin

email: `admin@admin.com` 
password: `password` 
 