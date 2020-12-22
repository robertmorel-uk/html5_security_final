# URLS

# Course 4 - HTML PROTECTION

# http://1-filtering-form-events.com/
# http://2-browser-history-api.com/
# http://3-storage-apis.com/
# http://4-communication-apis.com/
# http://evil.com/
# http://5-http-headers.com/
# http://6-web-workers.com/
# http://7-iframe-sandboxing.com/

# Course 5 - BUG BOUNTY EXERCISE

# http://sample-application-insecure.com/
# http://evil-application-insecure.com/

# http://sample-application.com/
# http://evil-application.com/

** CONFIGURE LOCAL ENVIRONMENT **

# Database setup
Turn on WAMP on Windows or LAMP services on Linux
Log in to http://localhost/phpmyadmin using username: root and no password
Create database html5_sample_application
Select database
Select SQL tab
Run the code in setup.sql to create the table
If you have any issues then check the conn.php file has the correct connection info
You can also email me at robertchristophermorel@gmail.com with bug reports

# Set the following lines in:

# C:\Windows\System32\drivers\etc\hosts on Windows
# /etc/hosts on Linux

127.0.0.1 sample-application-insecure.com evil-application-insecure.com sample-application.com evil-application.com 1-filtering-form-events.com 2-browser-history-api.com 3-storage-apis.com 4-communication-apis.com 
127.0.0.1 5-http-headers.com 6-web-workers.com 7-iframe-sandboxing.com
::1 sample-application-insecure.com evil-application-insecure.com sample-application.com evil-application.com 1-filtering-form-events.com 2-browser-history-api.com 3-Storage-apis.com 4-communication-apis.com 
::1 5-http-headers.com 6-web-workers.com 7-iframe-sandboxing.com evil.com

# Add the following to your virtual hosts file:

# c:/wamp64/bin/apache/apache2.4.46/conf/extra/httpd-vhosts.conf on Windows
# /etc/httpd/conf/httpd.conf on Linux

<VirtualHost *:80>
	ServerName sample-application-insecure.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection-App\App"
	<Directory  "C:\wamp64\www\HTML5-Protection-App\App">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName evil-application-insecure.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection-App\App"
	<Directory  "C:\wamp64\www\HTML5-Protection-App\App">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName sample-application.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection-App-Secure\App"
	<Directory  "C:\wamp64\www\HTML5-Protection-App-Secure\App">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName evil-application.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection-App-Secure\App"
	<Directory  "C:\wamp64\www\HTML5-Protection-App-Secure\App">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>


<VirtualHost *:80>
	ServerName 1-filtering-form-events.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\1-Filtering-Form-Events\Sample-Application"
	<Directory  "C:\wamp64\www\HTML5-Protection\1-Filtering-Form-Events\Sample-Application">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName 2-browser-history-api.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\2-Browser-History-API"
	<Directory  "C:\wamp64\www\HTML5-Protection\2-Browser-History-API">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName 3-Storage-apis.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\3-Storage-APIS\Sample-Application"
	<Directory  "C:\wamp64\www\HTML5-Protection\3-Storage-APIS\Sample-Application">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName 4-communication-apis.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\4-Communication-APIS"
	<Directory  "C:\wamp64\www\HTML5-Protection\4-Communication-APIS">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName 5-http-headers.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\5-HTTP-Headers\Sample-Application"
	<Directory  "C:\wamp64\www\HTML5-Protection\5-HTTP-Headers\Sample-Application">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName 6-web-workers.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\6-Web-Workers"
	<Directory  "C:\wamp64\www\HTML5-Protection\6-Web-Workers">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName 7-iframe-sandboxing.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\7-IFrame-Sandboxing"
	<Directory  "C:\wamp64\www\HTML5-Protection\7-IFrame-Sandboxing">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>

<VirtualHost *:80>
	ServerName evil.com
	DocumentRoot "C:\wamp64\www\HTML5-Protection\4-Communication-APIS\ws-express-evil"
	<Directory  "C:\wamp64\www\HTML5-Protection\4-Communication-APIS\ws-express-evil">
		Options +Indexes +Includes +FollowSymLinks +MultiViews
		AllowOverride All
		Require local
	</Directory>
</VirtualHost>
