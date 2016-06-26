.PHONY: tests
run:
	docker run --rm -it -p 3000:80 --name inlineimg-website -v ${PWD}/src:/var/www/html php:7-apache