---
layout: docs
title: Getting started with LAP Docker on Mac OSX
category: 'Mac OSX'
---


Requirements
----------
- Download and Install [Docker for Mac OSX](https://github.com/boot2docker/osx-installer/releases/latest)
 - [Detailed Boot2Docker installation instructions](https://docs.docker.com/installation/mac/#install-boot2docker)
- Run the `boot2docker` application from the applications folder

Run a basic LAMP stack
----------

Within Mac terminal, perform the following:

1. Make directories for your website files.
 - Run command: `mkdir ~/www && chmod 777 ~/www/`
2. Setup the boot2docker virtual machine.
 - Run command: `boot2docker init`
3. Notate Boot2Docker IP address (referenced as docker-ip-address later).
 - Run command: `boot2docker ip`

Within Boot2Docker, perform the following:

1. Start the usdaeas/mysql container
 - Run command: `docker run --name="mysql" -e right="WRITE" -d -p 3306:3306 usdaeas/mysql`
2. Start the usdaeas/lap-docker container
 - Run command: `docker run -d --name "domain.com" --hostname "domain.com" --link mysql:db -p 1080:1080 -p 80:80 -v ~/www:/var/www usdaeas/lap-docker`
3. [Access bash within the LAP Docker container]({{ site.baseurl }}/docs/general/accessing-docker-bash/)

Accessing Apache Server
-----------------------
1. Using the previously notated docker-ip-address, visit http://[docker-ip-address]/ within a browser to access the public directory of your LAP-Docker container.
3. Visit the LAP Docker dashboard at http://[docker-ip-address]/lap-docker/ (the trailing forward-slash is required).
