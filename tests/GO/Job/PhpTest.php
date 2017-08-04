<?php namespace GO\Job\Tests;

use GO\Job\JobFactory;

class PhpTest extends \PHPUnit_Framework_TestCase
{
  public function testShouldReturnPhpJobInstance()
  {
    $this->assertInstanceOf('Go\Job\Php', JobFactory::factory('GO\Job\Php', 'some command'));
  }

  public function testShouldCompileCommand()
  {
    $job = JobFactory::factory('GO\Job\Php', 'somecommand');

    $compiled = $job->build();

    $this->assertEquals(PHP_BINARY . ' somecommand > /dev/null 2>&1 &', $compiled);
  }
}
