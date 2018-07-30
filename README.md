**Install:**
````
composer require tobur/dynamic-domain-config
````

**Configure:**

```
dynamic_domain_config:
  domain_mapping:
    domain.localhost:
        database_url: 'DATABASE_URL="mysql://user:passw0rd@db:3306/db"'
    domain-1.localhost:
        database_url: 'DATABASE_URL="mysql://user:passw0rd@db:3306/db1"'
    domain-2.localhost:
        database_url: 'DATABASE_URL="mysql://user:passw0rd@db:3306/db2"'
```


If domain "domain.localhost" and we have parameter
in container with name "database_url" - Bundle will rewrite this url from:
```
domain_mapping->your domain->setting name
```

**What for you need that?** 

I used this for split selenium tests in my project and run them in parallel.
