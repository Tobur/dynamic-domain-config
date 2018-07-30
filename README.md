**Install:**
````
composer require tobur/dynamic-domain-config
````

**Configure:**

```
dynamic_domain_config:
  domain_mapping:
    example-1.localhost:
        doctrine_host: 'db1'
    example-2.localhost:
        doctrine_host: 'db'
    example-3.localhost:
        doctrine_host: 'db2'
  doctrine_connection: # mapping for doctrine connection parameters
      dbname: 'doctrine_dbname'
      host: 'doctrine_host'
      port: 'doctrine_port'
      user: 'doctrine_user'
      password: 'doctrine_password'
```


If domain "example-1.localhost" and we have parameter
in container with name "doctrine_host" - Bundle will rewrite this parameter from:
```
domain_mapping->your domain->setting name
```

**What for you need that?** 

You can use this bundle for override parameters based on domain.

I used this for split selenium tests in my project and run them in parallel.

