# A basic configuration file loader that supports Yaml format
----

## Installation

````
composer require buba71/yamlconfigloader
````
---

## Usage

````
use BUBA\ConfigLoader;

$parser = new ConfigLoader();

$parser->parse(__DIR__ .'/parameters.yaml');
$configData = $parser->getData();     

````
Input file: 
````
## parameters.yaml

user:
  class: User
  storage:
    class: SessionStorage
    cookie_name: PHP_SESS_ID

providers: 
  users:
    entity:
      class: ClassName
      property: email

services:
  ServiceClassName1:
    parameters:
      parameter1: 1335
      parameter2: 65465

## parameters.yaml

````
output data:

````
$data =  [ 
  'user.class' => "User"
  'user.storage.class' => "SessionStorage"
  'user.storage.cookie_name' => "PHP_SESS_ID"
  'providers.users.entity.class' => "ClassName"
  'providers.users.entity.property' => "email"
  'services.ServiceClassName1.parameters.parameter1' => 1335
  'services.ServiceClassName1.parameters.parameter2' => 65465
]
````
---

## [CONTRIBUTING]()
---

## LICENSE

The MIT License (MIT). 