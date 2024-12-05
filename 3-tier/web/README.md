# Difference Between fastcgi_pass and proxy_pass:
## fastcgi_pass:

This directive is used to forward requests to a FastCGI server, which is how NGINX interacts with PHP-FPM (PHP's FastCGI Process Manager).
PHP-FPM is not a standard HTTP server; instead, it runs PHP scripts as FastCGI processes and communicates with web servers like NGINX via the FastCGI protocol.
fastcgi_pass allows NGINX to send requests to PHP-FPM, which will execute the PHP code and return the results to NGINX to be sent back to the client.
Example use:

nginx
''
location ~ \.php$ {
    fastcgi_pass app-tier:9000;  # Passes requests to PHP-FPM
    include fastcgi_params;
    fastcgi_param SCRIPT_FILENAME /var/www/html$fastcgi_script_name;
}''
* Key Point: The FastCGI protocol is designed specifically for handling dynamic requests (like PHP scripts), so it has features optimized for that, such as handling file execution, environment variables, and input/output buffering.



## proxy_pass:

This directive is used to pass HTTP requests to another HTTP server (a reverse proxy).
When you use proxy_pass, NGINX sends the request as an HTTP request to the upstream server (e.g., another NGINX, an application server, etc.).
It is used when NGINX is acting as a reverse proxy for another HTTP server (such as another web server, a Node.js app, etc.), but it is not designed for PHP-FPM, which uses FastCGI, not HTTP.
Example use:

nginx
''
location / {
    proxy_pass http://app-tier:9000;  # Passes requests to an HTTP server
}''
* Key Point: proxy_pass expects the backend to handle HTTP traffic, which does not apply when interacting with PHP-FPM.
