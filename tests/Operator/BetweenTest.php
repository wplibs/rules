<?php

use Ruler\Context;
use Ruler\Variable;
use WPLibs\Rules\Operator\Between;

class BetweenTest extends \WP_UnitTestCase {

	public function testInterface() {
		$op = new Between( new Variable( 'a', 1 ),  new Variable( 'b', 2 ) );
		$this->assertInstanceOf( 'Ruler\Proposition', $op );
	}

	public function testConstructorAndEvaluation() {
		$context = new Context();

		$op = new Between( new Variable( 'a', 5 ), new Variable( 'b', [1, 10] ) );
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 1;
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = 10;
		$this->assertTrue( $op->evaluate( $context ) );

		$context['a'] = -1;
		$this->assertFalse( $op->evaluate( $context ) );

		$context['a'] = 11;
		$this->assertFalse( $op->evaluate( $context ) );
	}

	public function testWithReverseOrder() {
		$context = new Context();

		$op = new Between( new Variable( 'a', 5 ), new Variable( 'b', [10, 1] ) );
		$this->assertTrue( $op->evaluate( $context ) );
	}
}
