<?php

/**
* learning oops
*/
class SimpleClass
{
	//property declaration
	public $var = 'a default value';
		
		//method declaration
	public function displayVar() {
		echo $this->var."nhi chal rha bhai";
	}
}
echo "<hr>";

/**
*  $this trial
*/
class A
{
	
	function foo()
	{
		if (isset($this)) {
			echo '$this is defined (';
			echo get_class($this);
			echo ")<br>";
		} else {
			echo "\$this is not defined.<br>";
		}
	}
}
class B
{
	function bar() {
		A::foo();
	}
}

$a = new A();
$a -> foo();

A::foo();
$b = new B();
$b -> bar();

B::bar();

echo "<hr>";

$instance = new SimpleClass();

$assigned = $instance;
$reference = &$instance;

$instance -> var = '$assigned will have this value';

$instance = null;

var_dump($instance);
var_dump($reference);
var_dump($assigned);

echo "<hr>";

class Test
{
	static public function getNew()
	{
		return new static;
	}
}

class Child extends Test 
{}

$obj = new Test();
$obj2 = new $obj;
var_dump( $obj != $obj2);
echo PHP_EOL;

$obj3 = Test::getNew();
var_dump($obj3 instanceof Test);
echo "<br>";

$obj4 = Child::getNew();
var_dump($obj4 instanceof Child);
echo "<br>";

echo "<hr>";

class Foo {
	public $bahubali;

	public function __construct() {
		$this->bahubali = function() {
			return 42;
		}; 
	}
}

$obj_4 = new Foo();
$func = $obj_4->bahubali;
echo $func(), PHP_EOL;
echo "<hr>";

class MyClass {
	const CONST_VALUE = 'A constant value';
}

$className = 'MyClass';

echo $className::CONST_VALUE."<br>";

/**
* 
*/
class ChildClass extends MyClass
{
	public static $my_static = 'static var';

	
	public static function doublleColon() 
	{
		echo parent::CONST_VALUE."<br>";
		echo self::$my_static."<br>";
	}
}

$classname = 'ChildClass';

echo $classname::doublleColon();

echo "<hr>";

/*class SimpleClass
{
	public $var1 = 'hello' . 'world';
	public $var2 = <<<EOD
hello world 
EOD;
	public $var3 = 1+2;
	public $var4 = self::myStaticMethod();
	public $var5 = $myVar;

	public $var6 = myConstant;
	public $var7 = array( true, false);

	public $var8 = <<<EOD
hello word
EOD;

}*/
class testi
{
    public $var1 = 1;
    protected $var2 = 2;
    private $var3 = 3;
    static $var4 = 4;
   
    public function toArray()
    {
        return (array) $this;
    }
}

$t = new testi;
print_r($t->toArray()); 
echo "<hr>";

spl_autoload_register( function( $name) {
	echo "want to load $name. <br>";
	throw new Exception("Unable to load $name");
});

try {
	$obj = new NonLoadableClass();
} catch (Exception $e) {
	echo $e->getMessage();
}

echo "<hr>";

class MyDestructorClass {
	function __construct() {
		print "In Constructor <br>";
		$this->name = " MyDestructorClass";
	}
	function __destruct() {
		print "Destroying " . $this->name . "<br>";
	}
}

$obj = new MyDestructorClass();

echo "<hr>";
?>