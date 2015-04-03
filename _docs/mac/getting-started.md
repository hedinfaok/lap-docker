---
layout: docs
title: Getting started with LAP Docker on Mac OSX
category: 'Mac OSX'
---


Requirements
==============
- Install and configure [Docker for Mac OSX](https://docs.docker.com/installation/mac/#install-boot2docker)
- Run `Start boot2docker`

Run a basic LAMP stack
----------

Manual build:

1. `docker build -t usdaeas/lap-docker https://github.com/usda-ocio-eas/lap-docker.git`
2. `docker build -t mysqldb https://github.com/nkratzke/easymysql`
Usage:

1. Make directories for your website files. We use the following setup:
 - `mkdir ~/www/`
 - `chmod 750 ~/www/`
 - `chown root:root ~/www`
 - `pwd` (record this returned directory for step 2)
2. Run the mysqldb image
 - `docker run --name="mysqldb" -e right="WRITE" -d -p 3306:3306 mysqldb`
3. Run the usdaeas/lap-docker image
 - `docker run -d --name "domain.com" --hostname "domain.com" -p 1080:1080 -p 8080:80 -v [pwd]:/var/www usdaeas/lap-docker`
5. Access bash via `docker exec -t -i <container_id> bash`

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
