<?php

use Ruler\Context;
use Ruler\Variable;
use WPLibs\Rules\Operator\Not_Between;

class NotBetweenTest extends \WP_UnitTestCase {

	public function testInterface() {
		$op = new Not_Between( new Variable( 'a', 1 ), new Variable( 'b', 2 ) );
		$this->assertInstanceOf( 'Ruler\Proposition', $op );
	}

	public function testConstructorAndEvaluation() {
		$context = new Context();

		$op = new Not_Between( new Variable( 'a', 5 ), new Variable( 'b', [1, 10] ) );
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 1;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 10;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = -1;
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 11;
		$this->assertTrue( $op->evaluate( $context ) );
	}
}
