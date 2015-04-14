---
layout: docs
title: Getting started with LAP Docker on Mac OSX
category: 'Mac OSX'
---


Requirements
----------
- Install and configure [Docker for Mac OSX](https://docs.docker.com/installation/mac/#install-boot2docker)
- Run the `boot2docker` application

Run a basic LAMP stack
----------

Manually build images from git repository:

1. `docker build -t usdaeas/lap-docker https://github.com/usda-ocio-eas/lap-docker.git`
2. `docker build -t mysqldb https://github.com/nkratzke/easymysql.git`

Usage:

1. Make directories for your website files. We use the following setup:
 - `mkdir ~/www/` (this is your public web directory where you store files)
 - `chmod 777 ~/www/`
2. Run the mysqldb image
 - `docker run --name="mysqldb" -e right="WRITE" -d -p 3306:3306 mysqldb`
3. Run the usdaeas/lap-docker image
 - `docker run -d --name "domain.com" --hostname "domain.com" --link mysqldb:db -p 1080:1080 -p 80:80 -v ~/www:/var/www usdaeas/lap-docker`
4. Access bash via `docker exec -t -i <container_id> bash`
 - The container_id can be retrieved by running `docker ps -a` for any existing container.

Accessing Apache Server
-----------------------

Visit http://[docker-ip-address]/ within a browser to access the public directory of your LAP-Docker container.


Sending Email
-------------

This image is configured to direct mail to mailcatcher. 

Visit http://[docker-ip-address]:1080 for access.


Log export
---------------

- Export log files from docker: `docker cp domain.com:/var/log domain.com_logs`
- Look for messages at boot for diagnostics.
