<?php


namespace UnitTests\POData\Providers\Metadata\Type;

use POData\Providers\Metadata\Type\Binary;
use POData\Providers\Metadata\Type\Boolean;
use POData\Providers\Metadata\Type\Byte;
use POData\Providers\Metadata\Type\Char;
use POData\Providers\Metadata\Type\DateTime;
use POData\Providers\Metadata\Type\Decimal;
use POData\Providers\Metadata\Type\Double;
use POData\Providers\Metadata\Type\Guid;
use POData\Providers\Metadata\Type\Int16;
use POData\Providers\Metadata\Type\Int32;
use POData\Providers\Metadata\Type\Int64;
use POData\Providers\Metadata\Type\IType;
use POData\Providers\Metadata\Type\Navigation;
use POData\Providers\Metadata\Type\Null1;
use POData\Providers\Metadata\Type\SByte;
use POData\Providers\Metadata\Type\Single;
use POData\Providers\Metadata\Type\StringType;
use POData\Providers\Metadata\Type\TypeCode;
use POData\Providers\Metadata\Type\VoidType;

class Int16Test extends \PHPUnit_Framework_TestCase {

	/**
	 * @return IType
	 */
	public function getAsIType()
	{
		return new Int16();
	}

	public function testConstructorAndDefaultValues()
	{
		$type = $this->getAsIType();

		$actual = get_object_vars($type);

		$expected = array(

		);

		$this->assertEquals($expected, $actual);

	}


	public function testGetFullTypeName()
	{
		$type = $this->getAsIType();

		$actual = $type->getFullTypeName();

		$this->assertEquals("Edm.Int16", $actual);

	}

	public function testGetTypeCode()
	{
		$type = $this->getAsIType();

		$actual = $type->getTypeCode();

		$this->assertEquals(TypeCode::INT16, $actual);

	}

	public function testCompatibleWith()
	{
		$type = $this->getAsIType();

		$this->assertFalse( $type->isCompatibleWith(new Binary()) );
		$this->assertFalse( $type->isCompatibleWith(new Boolean()) );
		$this->assertTrue( $type->isCompatibleWith(new Byte()) );
		$this->assertFalse( $type->isCompatibleWith(new Char()) );
		$this->assertFalse( $type->isCompatibleWith(new DateTime()) );
		$this->assertFalse( $type->isCompatibleWith(new Decimal()) );
		$this->assertFalse( $type->isCompatibleWith(new Double()) );
		$this->assertFalse( $type->isCompatibleWith(new Guid()) );
		$this->assertTrue( $type->isCompatibleWith(new Int16()) );
		$this->assertFalse( $type->isCompatibleWith(new Int32()) );
		$this->assertFalse( $type->isCompatibleWith(new Int64()) );
		$this->assertFalse( $type->isCompatibleWith(new Null1()) );
		$this->assertTrue( $type->isCompatibleWith(new SByte()) );
		$this->assertFalse( $type->isCompatibleWith(new Single()) );
		$this->assertFalse( $type->isCompatibleWith(new StringType()) );
		$this->assertFalse( $type->isCompatibleWith(new VoidType()) );



	}

	public function testValidateSuccess()
	{
		$type = $this->getAsIType();

		$in = "-4563";
		$out = null;
		$this->assertTrue($type->validate($in, $out));

		$this->assertSame("-4563", $out);
	}


	public function testValidateFailure()
	{

		$type = $this->getAsIType();

		$in = "454.34";
		$out = null;
		$this->assertFalse($type->validate($in, $out));

		$in = "nan";
		$out = null;
		$this->assertFalse($type->validate($in, $out));

	}


	public function testConvert()
	{

		$type = $this->getAsIType();

		$value = "-34533";
		$actual = $type->convert($value);

		$expected = -34533;
		$this->assertEquals($expected, $actual);
	}

	public function testConvertToOData()
	{

		$type = $this->getAsIType();

		$value = "afaefasevaswee";
		$actual = $type->convertToOData($value);

		$expected = "afaefasevaswee";
		$this->assertEquals($expected, $actual);
	}



	/**************
	 *
	 *  Begin Type Specific Tests
	 *
	 */
}