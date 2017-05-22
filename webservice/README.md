# Case Study Tech

## First task

### Primeira Opção
- Modelo relacional
- MySQL ou PostgreSQL
- Garante consistência dos dados mas não é tão perfomático quanto um não-relacional
- Script de estrutura do banco de dados (DDL.sql)
- ![Diagrama entidade relacionamento](DER.png)

### Segunda Opção
- Modelo não-relacional
- MongoDB, Cassandra
- Alta performance porém não garante consistência dos dados

## Second task

Para realizar o cache das requisições, sugiro construir um middleware para armazenar as requisições no REDIS e verificar se a requisição se encontra em cache e retorna-la.
### WSM webservice
GET:
/wms

### Catalog webservice
POST:
/catalog
Input: Json

### CMS webservice
GET:
/cms/category/{category}

GET:
/cms/sku/{sku}

### CMS webservice
GET:
/cms/category/{category}

GET:
/cms/sku/{sku}

### Stock webservice
GET:
/stock/{sku}/{size}


## Third task

