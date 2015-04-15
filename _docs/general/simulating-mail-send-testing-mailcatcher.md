---
layout: docs
title: Simulating Mail Send (Testing Mailcatcher)
category: 'General'
---


Simulating Mail Send (Testing Mailcatcher)
------------------------------------------
This test will send a message through php which will display within Mailcatcher
1. Connect to your Docker container by following steps for [accessing docker bash]({{ site.baseurl }}/docs/general/accessing-docker-bash/).
2. run `php -r 'mail("mail@example.com", "test", "test");'`
3. A message should appear within http://[docker-ip-address]:1080