### Crud simples com uma tela de login 

## SQL

```sql
CREATE TABLE person(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    login VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(100) NOT NULL
);
```
