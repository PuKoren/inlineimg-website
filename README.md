# inlineimg-website
This repository contains the source of the inlineimg.com website.

It is exposed as a demo project for the PHP library [Inline Images](https://github.com/PuKoren/php-inline-images).

## Run it on your host (docker)
Clone the project and run the commands:
```bash
make build #do this only once
make run
```
Website will run on port 3000

## API

You can use inlineimg.com as an API, using a web client as curl.

Converting a remote image:
```bash
curl -X POST http://inlineimg.com/api.php --data "from=https://www.gnu.org/graphics/empowered-by-gnu.svg"
```

Submitting an image directly using multipart:
```bash
curl --form "data=@~/Heckert_GNU_white.svg" http://inlineimg.com/api.php
```
