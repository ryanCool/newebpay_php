# Docker image tag
TAG = newebpay

# Docker container name
CONTAINER_NAME = my-newebpay

# Dockerfile location
DOCKERFILE = Dockerfile

.PHONY: build
build:
	@docker build -t $(TAG) -f $(DOCKERFILE) .

.PHONY: run
run:
	@docker run -d --name $(CONTAINER_NAME) -p 8080:80 $(TAG)

.PHONY: stop
stop:
	@docker stop $(CONTAINER_NAME) && docker rm $(CONTAINER_NAME)

.PHONY: all
all: build run
