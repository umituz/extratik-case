# Installation Guide

Before proceeding with the installation, please make sure that Git and Docker are working smoothly on your system.

## Installation Steps

First, clone the project to the desired directory using Git:

```bash
git clone https://github.com/umituz/extratik-case
```
Then navigate to the project directory:

```cd extratik-case```

## Docker Setup
Build docker images

``docker-compose up -d --build``

Check if there are any issues with your running containers using the following command:

``docker ps``

If there are any issues, inspect the logs, and ensure that Docker is functioning correctly on your computer.

## Database Setup

To interact with the Laravel container and perform database-related tasks, you can enter the container with the following command:

``docker exec -it backend bash``

You can reset the database, sync elasticsearch data and check the stocks of the products by following command. And also don't forget to execute jobs.

```
php artisan setup
```