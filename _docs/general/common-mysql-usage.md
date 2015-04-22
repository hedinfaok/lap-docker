---
layout: docs
title: Common MySQL Usage
category: 'General'
---


Requirements
----------
- This document is dependant on a working installation of LAP Docker. For additional help with setup, see:
  - [Getting started with LAP Docker on Mac OSX]({{ site.baseurl }}/docs/mac/getting-started/)
  - [Getting Started with LAP Docker on Windows]({{ site.baseurl }}/docs/windows/getting-started/)

Connecting to MySQL
----------

*The default MySQL username and password are both "user"*

1. [Access bash within the LAP Docker container]({{ site.baseurl }}/lap-docker/docs/general/accessing-docker-bash/)
2. Open a connection to the MySQL container by running `mysql -u user -puser -h db`