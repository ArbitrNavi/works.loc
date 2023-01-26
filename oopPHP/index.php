<?php 

class Person {
    public $name;
    public $age;

    public function sayHello() {
        $result = "Меня зовут " . $this->name . ", и мне " . $this->age . " лет " . "<br>";
        return $result;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

$myPerson = new Person;

$myPerson->setName("Мурат");
$myPerson->setAge(18);

echo $myPerson->sayHello();



$myPerson2 = new Person;

$myPerson2->setName("Ник");
$myPerson2->setAge(33);

echo $myPerson2->sayHello();