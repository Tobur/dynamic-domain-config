Install:
````
composer require tobur/dynamic-domain-config
````

Configure:

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

Use in config:

```
 database_url: "@=container.get('domain.config.resolver').getParam('database_url')"
```