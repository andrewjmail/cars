# Documentation  

### Frontend Setup

Change to the api folder

    cd front-end

Run npm install

    npm install

Run local server

    npm run serve

### API Setup

Change to the api folder

    cd api

Install all the dependencies using composer

    composer install

Create the .env file and add your db settings

    cp .env.example .env
    
Install mysql database (only required if mysql is not already installed via brew)

    brew install mysql@5.7
    
Start database instance
    
    brew services start mysql@5.7
    
    Login to database and create database with the same name that you added to your env

Generate a new application key

    php artisan key:generate

Run the database migrations

    php artisan migrate --seed

Start the local development server

    php artisan serve

Run Tests

    vendor/bin/phpunit
    
### API Usage

The Api is seeded with some data, and a user with an api_key of D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui for testing purposes. All routes are protected and need to be authed with an Authorization header and the accept header set to application/json

    Authorization: Bearer D8JdIVcoGPuTvWeE9XIM9qAmeOf4eVC8Lo5xy7KmtxqTF715J5SP0FjgAgui
    Accept: application/json

#### GET /api/v1/makes

The response from this endpoint is all makes, sorted alphabetically. They are conained in the data section of the response in the following structure.

    "data": [
        {
            "id": 2,
            "name": "Audi",
            "models": [
                {
                    "id": 1,
                    "name": "TT",
                    "make_id": 2
                },
                {
                    "id": 2,
                    "name": "A4",
                    "make_id": 2
                },
                {
                    "id": 3,
                    "name": "E-tron",
                    "make_id": 2
                }
            ]
        },
    ],


#### GET /api/v1/makes/{make}/models

To receive all Audi models the call would be /api/v1/makes/2/models and the response

        "data": [
        {
            "id": 2,
            "name": "A4",
            "make": {
                "id": 2,
                "name": "Audi"
            }
        },
        {
            "id": 3,
            "name": "E-tron",
            "make": {
                "id": 2,
                "name": "Audi"
            }
        },
        {
            "id": 1,
            "name": "TT",
            "make": {
                "id": 2,
                "name": "Audi"
            }
        }
    ],

#### GET /api/v1/search?make=Audi&model=TT&fuelType=Petrol

This end point is used to fetch all vehicles matching the search terms. The make parameter is required. To receive all petrol audis the call would be api/v1/search?make=Audi&fuelType=Petrol and the response

        "data": [
        {
            "id": 2,
            "make": {
                "id": 2,
                "name": "A4",
                "make_id": 2
            },
            "models": {
                "id": 2,
                "name": "A4",
                "make_id": 2
            },
            "fuelType": "Petrol"
        },
        {
            "id": 3,
            "make": {
                "id": 1,
                "name": "TT",
                "make_id": 2
            },
            "models": {
                "id": 1,
                "name": "TT",
                "make_id": 2
            },
            "fuelType": "Petrol"
        }
    ],


#### Response 

The api response also includes a links object to assist with iterating over the data and a meta object with data about the call.

        "links": {
        "first": "http://127.0.0.1:8000/api/v1/search?page=1",
        "last": "http://127.0.0.1:8000/api/v1/search?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http://127.0.0.1:8000/api/v1/search",
        "per_page": 5,
        "to": 2,
        "total": 2
    }
