---
layout: docs
title: Upgrading LAP Docker
category: 'General'
---


Background
----------
LAP-Docker operates by creating a docker container generated from the LAP Docker image which is stored within the USDA git repository. Updates require users to remove their existing LAP Docker container and image, then reinstall the previous configuration. 


Remove the Existing Container
-----------------------------
1. Locate the container_id of the Docker container
 - Run `docker ps`
 - Notate the container id matching image usdaeas/lap-docker and usdaeas/mysql
   ![Image represents docker ps command example output: container id, image]({{ site.baseurl }}/images/docker_ps.png)
2. Stop the identified containers
   - Run `docker stop <lap-docker container id> && docker stop <mysql container id>`
   - Example run command `docker stop e1d81 && docker stop cf84c`
3. Remove the identified containers
   - Run `docker rm <lap-docker container id> && docker rm <mysql container id>`
   - Example run command `docker rm e1d81 && docker rm cf84c`

Remove the Existing Images
--------------------------
- Run `docker rmi usdaeas/lap-docker && docker rmi usdaeas/mysql`


Recreate the Docker image and containers
----------------------------------------
Follow the instructions within "Run a basic LAMP stack" for your appropriate OS:
- [Getting started with LAP Docker on Mac OSX]({{ site.baseurl }}/docs/mac/getting-started/)
- [Getting Started with LAP Docker on Windows]({{ site.baseurl }}/docs/windows/getting-started/)