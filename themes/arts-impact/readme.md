#Proper Bear

ProperDesign.rs (almost) completely bare starter theme.

##First things first - writing this readme.md

This readme.md file should exist as a living manual and todo list for the development of the theme. Structured in the following way.

1. introduction
2. types & taxes
	* custom-post-type defs
	* custom-taxonomy defs
3. site map
4. templates
	* specific template file defs
	* specific template file defs
	* ...
5. additional requirements & functionality

Each item should have a brief description of its purpose and functionality, followed by a list of its composite parts.

The idea is to map out where template developent should start and identify common template parts.

Below is a brief version of this structure for a basic site with a static front page and blog.

##Types & Taxes

###Pages (type)

General page content

###Post (type)

Blog posts

##Site Map

* Home (front-page.php)
	* About (page.php)
	* Contact (page.php)
	* Blog (home.php)
		* Post (single.php)

##Templates

###front-page.php

Front page of the site

###page.php

Standard WP page

* title
* content
* media (images/video)

###template-contact.php

Standard page template with contact form

* title
* content
* contact form

###home.php

List of posts

* title
* posts
* pagination

###single.php

Standard WP post

* title
* content
* media (images/video)

