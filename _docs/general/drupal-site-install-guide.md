---
layout: docs
title: Drupal Site Install Guide
category: 'General'
---


Requirements
----------
- This document is dependant on a working installation of LAP Docker. For additional help with setup, see:
  - [Getting started with LAP Docker on Mac OSX]({{ site.baseurl }}/docs/mac/getting-started/)
  - [Getting Started with LAP Docker on Windows]({{ site.baseurl }}/docs/windows/getting-started/)

Zero-to-Hero Guide
----------
1. Download Drupal to your public directory
   - Run command `drush dl drupal --destination=/var/www --drupal-project-rename=drupal`
2. Change to the newly download Drupal directory
   - Run command `cd /var/www/drupal`
3. Install Drupal via drush
   - `drush site-install standard -y --account-name=admin --account-pass=admin --db-url=mysql://user:user@db/drupal`
4. Visit your newly created Drupal site at at http://[docker-ip-address]/drupal/.