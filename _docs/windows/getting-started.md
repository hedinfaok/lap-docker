---
layout: docs
title: Getting started with LAP Docker on Windows
category: 'Windows'
---


Requirements
----------
- Ensure [Virtualization (VT-x)](http://en.wikipedia.org/wiki/X86_virtualization) support is enabled within BIOS
- Download and Install [Docker for Windows](https://github.com/boot2docker/windows-installer/releases/latest)
 - [Detailed Boot2Docker installation instructions](https://docs.docker.com/installation/windows/#installation)
- Run the `Boot2Docker Start` program from the desktop

Run a basic LAMP stack
----------

Within Windows Explorer, perform the following:
1. Create a new directory named 'www' in your Documents folder
 - Notate the full path of the directory and convert to unix format (*this is your pwd used in step 3*)
   - /[drive-letter]/Users/[Username]/Documents/www
   - For a user named `ron` on drive `c`, the pwd would be `/c/Users/ron/Documents/www`
   
Within Powershell, perform the following:
2. Notate Boot2Docker IP address (referenced as docker-ip-address later).
 - Run command: `boot2docker ip`
 
Within Boot2Docker command line, perform the following: 
1. Start the usdaeas/mysql container
 - Run command: `docker run --name="mysql" -e right="WRITE" -d -p 3306:3306 usdaeas/mysql`
2. Start the usdaeas/lap-docker container
 - Run command: `docker run -d --name "domain.com" --hostname "domain.com" --link mysql:db -p 1080:1080 -p 80:80 -v [pwd]:/var/www usdaeas/lap-docker`
3. [Access bash within the LAP Docker container]({{ site.baseurl }}/docs/general/accessing-docker-bash/)

Accessing Apache Server
-----------------------
1. Using the previously notated docker-ip-address, visit http://[docker-ip-address]/ within a browser to access the public directory of your LAP-Docker container.
3. Visit the LAP Docker dashboard at http://[docker-ip-address]/lap-docker/ (the trailing forward-slash is required).
