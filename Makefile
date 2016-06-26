.PHONY: tests
run:
	docker run --rm -it -p 3000:80 --name inlineimg-website -v ${PWD}/src:/var/www/html koren/inlineimg-website:latest
build:
	docker build -t koren/inlineimg-website:latest .