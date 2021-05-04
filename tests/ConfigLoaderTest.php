<?php

declare(strict_types = 1);

namespace BUBA71\TESTS;

use PHPUnit\Framework\TestCase;
use BUBA71\ConfigLoader;

final class ConfigLoaderTest extends TestCase
{
  private int $count = 0;
  /**
   * @dataProvider provideYamlData
   * @return void
   */
  public function testWhenHasOneKeyWithOneParameter($id, $value): void
  {
    $parser = new ConfigLoader();

    $parser->parse(__DIR__ .'/parameters.yaml'); // To change by yaml data.
    $configData = $parser->getData();     

    static::assertTrue(array_key_exists($id, $configData));
    static::assertEquals($value, $configData[$id]);
  }

  public function provideYamlData()
  {
    yield ['user.class', "User"];
    yield ['user.storage.cookie_name', "PHP_SESS_ID"];
    yield ['user.storage.class', "SessionStorage"];
    yield ['providers.users.entity.class', "ClassName"];
    yield ['providers.users.entity.property', "email"];
    yield ['services.ServiceClassName1.parameters.parameter1', 1335];
    yield ['services.ServiceClassName1.parameters.parameter2', 65465];
  }

}