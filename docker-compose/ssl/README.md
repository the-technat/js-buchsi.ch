# Self-signed Cert

Generated with the following command:

```bash
 ✘  ~/code/js-buchsi.ch/docker-compose/ssl   master ±  openssl req -x509 -newkey rsa:4096 -keyout key.pem -out cert.pem -days 3600 -nodes
Generating a RSA private key
....................++++
..................................++++
writing new private key to 'key.pem'
-----
You are about to be asked to enter information that will be incorporated
into your certificate request.
What you are about to enter is what is called a Distinguished Name or a DN.
There are quite a few fields but you can leave some blank
For some fields there will be a default value,
If you enter '.', the field will be left blank.
-----
Country Name (2 letter code) [AU]:CH
State or Province Name (full name) [Some-State]:Bern
Locality Name (eg, city) []:Herzogenbuchsee
Organization Name (eg, company) [Internet Widgits Pty Ltd]:BESJ Jungschar Herzogenbuchsee
Organizational Unit Name (eg, section) []:IT
Common Name (e.g. server FQDN or YOUR name) []:dev.js-buchsi.ch
Email Address []:web@js-buchsi.ch  
```

The cert is used to have a valid ssl virtualhost. It's annoying to always tell your browser to not redirect to HTTPS (because he wants)
