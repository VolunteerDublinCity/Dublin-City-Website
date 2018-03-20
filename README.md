# Dublin-City-Website

# Setup
1. Request a backup  of the database.
2. Install MAMP
3. Set document root to your preference
4. Clone project from GIT into working folder of MAMP
5. Run MAMP
6. Check to see the following at http://localhost:8888 Broken? Awesome 😬👍 Lets get the database setup:
7. In phpMyAdmin, Verify database name in wp-config.php (probably “dublincity_new”). Create a new database of that name in Mamp's phpMyAdmin (might be at http://localhost:8888/MAMP/index.php?page=phpmyadmin&language=English).
8. Import requested VDC database into dublincity_new
9. Create a new user for local development in phpMyAdmin in the new database, within the table afpa_users, with all rights.
10. Verify that the site works with at http://localhost:8888

# Styles
The styles of the site are written in Sass, specifically the SCSS format. 

[How to install Sass](http://sass-lang.com/install)

Run with *Compass watch* from the theme root.

# Questions
Any questions? Get in touch with [Duncan-Mckenna](https://github.com/Duncan-Mckenna)
