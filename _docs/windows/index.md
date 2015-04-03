---
layout: docs
permalink: /docs/windows/
title: Windows Documentation
category: 'Documentation'
---

<div class="posts">
  {% assign docs = site.docs | where: "category", "Windows" %}
  {% for doc in docs %}
    <article class="post">

      <h2><a href="{{ site.baseurl }}{{ doc.url }}">{{ doc.title }}</a></h2>

    </article>
  {% endfor %}
</div>