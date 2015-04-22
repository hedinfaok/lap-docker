---
layout: docs
title: Getting started with LAP Docker on Windows
category: 'Windows'
---


Requirements
----------
- Ensure [Virtualization (VT-x)](http://en.wikipedia.org/wiki/X86_virtualization) support is enabled within BIOS
- Install and configure [Docker for Windows](https://docs.docker.com/installation/windows/#installation)
- Run the `Boot2Docker Start` program

Run a basic LAMP stack
----------

Within Boot2Docker, build images from the git repository:

1. `docker build -t usdaeas/lap-docker https://github.com/usda-ocio-eas/lap-docker.git`
2. `docker build -t usdaeas/mysql https://github.com/usda-ocio-eas/MySQL-Docker`

Container setup:

1. Make directories for your website files. We use the following setup:
 - Create a new directory named 'www' in your Documents folder
 - Notate the full path of the directory and convert to unix format (*this is your pwd used in step 3*)
   - /[drive-letter]/Users/[Username]/Documents/www
   - For a user named `ron` on drive `c`, the pwd would be `/c/Users/ron/Documents/www`
2. Run the usdaeas/mysql image
 - `docker run --name="mysql" -e right="WRITE" -d -p 3306:3306 usdaeas/mysql`
3. Run the usdaeas/lap-docker image
 - `docker run -d --name "domain.com" --hostname "domain.com" --link mysql:db -p 1080:1080 -p 80:80 -v [pwd]:/var/www usdaeas/lap-docker`

Accessing Apache Server
-----------------------
1. Open a powershell window and run `boot2docker ip`; this is your Docker VM address.
2. Visit http://[docker-ip-address]/ within a browser to access the public directory of your LAP-Docker container.
3. Visit the LAP Docker dashboard at http://[docker-ip-address]/lap-docker/ (the trailing forward-slash is required).