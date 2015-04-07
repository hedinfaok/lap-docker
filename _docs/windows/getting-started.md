---
layout: docs
title: Getting started with LAP Docker on Windows
category: 'Windows'
---


Requirements
----------
- Ensure [Virtualization (VT-x)](http://en.wikipedia.org/wiki/X86_virtualization) support is enabled within BIOS
- Install and configure [Docker for Windows](https://docs.docker.com/installation/windows/#installation)
- Run `Start boot2docker`

Run a basic LAMP stack
----------

Manually build images from git repository:

1. `docker build -t usdaeas/lap-docker https://github.com/usda-ocio-eas/lap-docker.git`
2. `docker build -t mysqldb https://github.com/nkratzke/easymysql.git`

Usage:

1. Make directories for your website files. We use the following setup:
 - `c:`
 - `cd \`
 - `mkdir www`
 - `pwd` (record this returned directory for step 2)
2. Run the mysqldb image
 - `docker run --name="mysqldb" -e right="WRITE" -d -p 3306:3306 mysqldb`
3. Run the usdaeas/lap-docker image
 - `docker run -d --name "domain.com" --hostname "domain.com" --link mysqldb:db -p 1080:1080 -p 80:80 -v [pwd]:/var/www usdaeas/lap-docker`
5. Access bash via `docker exec -t -i <container_id> bash`

Sending Email
-------------

This image is configured to direct mail to mailcatcher. 

Visit http://[docker-ip-address]:1080 for access.


Log export
---------------

- Export log files from docker: `docker cp domain.com:/var/log domain.com_logs`
- Look for messages at boot for diagnostics.
