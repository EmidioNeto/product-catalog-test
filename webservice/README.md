# Case Study Tech

## First task

### Primeira Op��o
- Modelo relacional
- MySQL ou PostgreSQL
- Garante consist�ncia dos dados mas n�o � t�o perfom�tico quanto um n�o-relacional
- Script de estrutura do banco de dados (data/DDL.sql)
- ![Diagrama entidade relacionamento](DER.png)

### Segunda Op��o
- Modelo n�o-relacional
- MongoDB, Cassandra
- Alta performance por�m n�o garante consist�ncia dos dados

## Second task

Para realizar o cache das requisi��es, sugiro construir um middleware para armazenar as requisi��es no REDIS e verificar se a requisi��o se encontra em cache e retorna-la.

- Executar o composer para instalar as depend�ncias
- Criar um banco MySQL e executar os arquivos DDL.sql e DML.sql
- Executar o composer para instalar as depend�ncias
- Atualizar o arquivo config/autoload/doctrine.local.php com as configura��es da inst�ncia MySQL criada
- Para testar a valida��o desenvolvidada, envie uma requisi��o POST para "/catalog" com o conte�do do arquivo JSON ou execute o arquivo php "test_wms.php"
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

