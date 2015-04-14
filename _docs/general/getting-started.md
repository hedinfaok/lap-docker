---
layout: docs
title: Accessing Docker Bash (Shell)
category: 'General'
---


Background
------------
LAP-Docker provides bash (shell) access through `docker exec` and `docker attach` commands. When using docker commands instead of a separate SSH server, we are able to limit [Docker SSH server](https://jpetazzo.github.io/2014/06/23/docker-ssh-considered-evil/) usage of process manager configuration, improve security, and increase efficiency of the LAP-Docker container.

Starting a shell instance
----------
1. Locate the container_id of the Docker container
 - Run `docker ps`
 - Notate the container id matching image usdaeas/lap-docker (assuming you are only running one)
 - ![Image represents docker ps command example output: container id, image]({{ site.baseurl }}/images/docker_ps.png)

2. Access bash via `docker exec -t -i <container_id> bash`
