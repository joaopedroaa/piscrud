## SQL

```sh
mysql -u joaopedro -p
```

### Database
```sql
CREATE DATABASE escola;
USE escola;

```


### Login

```sql
CREATE TABLE login(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name      VARCHAR(100) NOT NULL,
    login     VARCHAR(100) NOT NULL UNIQUE,
    password  VARCHAR(100) NOT NULL
);

```

<!-- todo: login with email -->

### Estudante

```sql
CREATE TABLE student(
  registration INT PRIMARY KEY AUTO_INCREMENT,
  name      VARCHAR(100) NOT NULL,
  birth     VARCHAR(100) NOT NULL,
  rg        VARCHAR(100) NOT NULL UNIQUE,
  cpf       VARCHAR(100) NOT NULL UNIQUE,
  phone     VARCHAR(100) NOT NULL UNIQUE,
  course    VARCHAR(100) NOT NULL,
  year      VARCHAR(100) NOT NULL,
  expedient VARCHAR(100) NOT NULL
);

```

```sql
SHOW TABLES;
```



<!-- todo: add email -->
<!-- todo: change registration name to ? -->
