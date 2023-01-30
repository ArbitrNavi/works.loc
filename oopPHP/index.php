<?php 

class Person {
    public $name;
    public $age;
    const CITY = "5";

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }


    public function sayHello() {
        return "Меня зовут " . $this->name . ", и мне " . $this->age . " лет " . "<br>";
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }
}

$myPerson = new Person("Murat", 18);

//$myPerson->setName("Мурат");
//$myPerson->setAge(18);


