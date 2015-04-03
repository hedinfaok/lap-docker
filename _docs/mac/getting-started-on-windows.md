---
layout: docs
title: Getting started with LAP Docker on Mac OSX
category: 'Mac OSX'
---


Requirements
==============
Install and configure [Docker for Windows](https://docs.docker.com/installation/windows/#installation)


How to use
----------

Manual build:

1. `docker build -t usdaeas/lap-docker https://github.com/usda-ocio-eas/lap-docker.git`

Usage:

1. Make directories for your website files. We use the following setup:
 - `mkdir -p /home/websites/domain.com`
 - `chmod 750 /home/websites`
 - `chown root:root /home/websites`
 - Nginx routing host:80 to a port opened by docker (see below)
2. Run the docker image
 - If you have a mysql instance running, and want to link it to the container, see section below.
 - `docker run -d --name "domain.com" --hostname "domain.com" -p 1080:1080 -p 8080:80 -v /home/websites/domain.com:/var/www usdaeas/lap-docker`
3. There is no step 3. See below for additional configuration
4. Access bash via docker exec -t -i <container_id> bash

Linking MySQL
-------------

Run a mysql instance, make sure to name it 'mysqldb' or similar.

docker build -t mysqldb github.com/nkratzke/easymysql
docker run -d -p 3306:3306 mysqldb

```
docker run -d --name "domain.com" \
	-p 8080:80 \
	-p 1080:1080 \
	-v /home/websites/domain.com:/var/www \
	--link mysqldb:db \
	-e "DB_USER={MYSQL_USER}" \
	-e "DB_PASS={MYSQL_PASSWORD}" \
	-e "DB_NAME={MYSQL_DB_NAME}" \
	usdaeas/lap-docker
```

In your PHP script, access those variables using:

```
$db_name = getenv('DB_NAME');
$db_pass = getenv('DB_PASS');
$db_user = getenv('DB_USER');
$db_host = getenv('DB_PORT_3306_TCP_ADDR');
```

Sending Email
-------------

This image is configured to direct mail to mailcatcher. 

Visit http://[ip-address]:1080 for access.

Logging
-------

An interesting topic with docker, we've solved it by sending the log files to [papertrail](http://papertrailapp.com). Setting a hostname will ensure you know which log container to look at when required, and not having to dig around with `docker cp` etc.

Set this environment variable to enable logging:
- `RSYSLOG=*.* @logs2.papertrailapp.com:12345`

Tips and tricks
---------------

- Export log files from docker: `docker cp domain.com:/var/log domain.com_logs`
- Look for messages at boot for diagnostics. It will say something about mandrill if its enabled, and something about RSYSLOG when you enable logging.
