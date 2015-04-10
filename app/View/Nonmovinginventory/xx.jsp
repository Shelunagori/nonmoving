<VirtualHost *:80>
    ServerName 52.74.15.170
    ServerAdmin root@ubuntu
    DocumentRoot "/var/www/htdocs/nonmoving/nonmovinginventory/app/webroot/"
 
    <Directory "/var/www/htdocs/nonmoving/nonmovinginventory/app/webroot/">
            Options -Indexes +FollowSymLinks
            AllowOverride All
            Order allow,deny
            Allow from all
    </Directory>
 
# This block is optional and can be omitted.
# However, rights management *is* important.
# Look for more useful options you can set here.
 <IfModule mpm_peruser_module>
        ServerEnvironment apache apache 
        # replace with your webserver user and group
     # like www-data or htdocs or what have you.
 </IfModule>
</VirtualHost>