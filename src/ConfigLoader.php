<?php

declare(strict_types = 1);

namespace BUBA71;

use Symfony\Component\Yaml\Yaml;

final class ConfigLoader
{
  /**
   * @var string
   */
  private string $parameters = '';

  /**
   * @var array
   */
  private array $data = [];

  /**
   * @param string $file
   * 
   * @return void
   */
  public function Parse(string $file): void
  {
    $this->extractDataParameters(Yaml::parseFile($file));
  }

  /**
   * @param array $array
   * Return each yaml parameter key with own value.
   * @return void
   */
  private function extractDataParameters(array $arrayFromYaml): void
  {
    foreach ($arrayFromYaml as $key => $value) {       
      
      if (is_array($value)) {

        $this->parameters .= $key . '.';
        $this->extractDataParameters($value);

      } else {
        $id = $this->parameters . $key;
        $this->data[$id] = $value;
      }      
    }
    $this->parameters = '';   
  }  

  /**
   * @return array
   */
  public function getData(): array
  {
    return $this->data;
  }
}