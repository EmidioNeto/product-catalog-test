# Case Study Tech

## First task

### Primeira Op��o
- Modelo relacional
- MySQL ou PostgreSQL
- Garante consist�ncia dos dados mas n�o � t�o perfom�tico quanto um n�o-relacional
- Script de estrutura do banco de dados (DDL.sql)
- ![Diagrama entidade relacionamento](DER.png)

### Segunda Op��o
- Modelo n�o-relacional
- MongoDB, Cassandra
- Alta performance por�m n�o garante consist�ncia dos dados

## Second task

Para realizar o cache das requisi��es, sugiro construir um middleware para armazenar as requisi��es no REDIS e verificar se a requisi��o se encontra em cache e retorna-la.
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

