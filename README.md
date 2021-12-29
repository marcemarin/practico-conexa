
# Conexa challenge

Skill show 


## Run Locally

Clone the project

```bash
  git clone https://github.com/marcemarin/practico-conexa
```

Go to the project directory

```bash
  cd practico-conexa
```

Start containers and install dependencies

```bash
  docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Start the server

```bash
  ./vendor/bin/sail up
```


## API Reference

#### Get movements

```http
  GET /api/earth
```

#### Get item

```http
  POST /api/earth
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `initial`      | `array` | **Required**. Initial coordinates |
| `items`      | `array` | **Required**. Items obtained in get movements |



## Authors

- [@marcemarin](https://github.com/marcemarin)


## Appendix

Ask for environment variables

