# http-request-dumper

Dump http request to logs.

## usage

```
$ docker compose up -d
```

And make a request to ```localhost:8080``` from your client.

The contents of the request will be output to ```docker/php/src/logs```.

## view raw post requests

If you want to view the multipart/formdata format, please uncomment the following comment in ```docker/php/src/.htaccess```.

```
#php_flag enable_post_data_reading Off
```
