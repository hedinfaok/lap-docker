---
layout: post
title: New Features & Documentation
---

*In the latest round of updates, we've added the following:*

- LAP Docker Dashboard
- Adminer
- Pimp my Log
- PHP information pages
- Additional General Usage Documentation


LAP Docker Dashboard
--------------------
The LAP Docker Dashboard provides quick access to documentation, features, and support. From the LAP Docker dashboard you can quickly access Adminer, MailCatcher, Pimp my Log, and phpinfo. For now, the LAP Docker dashboard will remain lightweight with most documentation remaining at the project information site. 

You can access the LAP Docker Dashboard by visiting http://[docker-ip-address]/lap-docker of a quick start configured container. 

![Image depicts LAP Docker Dashboard page]({{ site.baseurl }}/images/dashboard-screenshot.png)


Adminer, Pimp my Log, phpinfo
-----------------------------
LAP Docker now provides database administration tool Adminer. Adminer allows connection to local and remote database servers through the server field. We've also applied an adminer theme to improve the standard UI.

Pimp my Log is configured out of the box to provide apache errorlog, apache accesslog, and php errorlog information within a friendly user interface. The log files automatically exclude access and error information within the /lap-docker section to keep the information as relevant to your application development work.

Lastly, we've added a simple phpinfo() page to quickly determine how php is running to make tweaks easier. If you notice a default that's too limited for development or most applications, [send an e-mail]({{ site.baseurl }}/contrib/) and we'll update the php.ini settings.

![Image depicts Pimp my Log Page]({{ site.baseurl }}/images/pimpmylog-screenshot.png)


New Documentation
-----------------
We've added new generalized LAP Docker information and improved the Mac and PC getting started guides. You can now find information on the following:

- [Starting and stopping the boot2docker VM]({{ site.baseurl }}/docs/general/boot2docker-recommended-usage/)
- [Reliably locating the VM IP address]({{ site.baseurl }}/docs/general/boot2docker-recommended-usage/)
- [Exporting Log Files]({{ site.baseurl }}/docs/general/exporting-log-files/)
- [Accessing Docker Bash (Shell)]({{ site.baseurl }}/docs/general/accessing-docker-bash/)
- [Simulating Mail Sent / Testing MailCatcher]({{ site.baseurl }}/docs/general/simulating-mail-send-testing-mailcatcher/)
