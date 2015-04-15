---
layout: docs
title: Boot2Docker Recommended Usage
category: 'General'
---


Background
----------
LAP-Docker relies on Boot2Docker to provide and maintain a virtual machine for the docker daemon. Boot2Docker has several commands which ease usage and reduce CPU load when docker containers are not in use. 
*All of these commands require use of Mac Terminal or Windows PowerShell*


Identify VM IP address
----------------------
Run `boot2docker ip`


Starting, Stopping, and Restarting Docker VM
--------------------------------------------
Start: `boot2docker start`
Stop: `boot2docker stop`
Restart: `boot2docker restart`