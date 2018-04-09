<?php
require_once(dirname(dirname(__FILE__)) . '/src/ThomasMountain/Keycloak/Keycloak.php');
use ThomasMountain\Keycloak\Keycloak as myClass;

class KeycloakTest extends PHPUnit_Framework_TestCase
{
	public function testCanBeNegated () {
		$a = new myClass();
		$a->increase(9)->increase(8);
		$b = $a->negate();
		$this->assertEquals(0, $b->myParam);
	}

}
