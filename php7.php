<?php
trait PrintInfoTrait {
    public function print_animal_inf() {
        echo "Animal info: " . $this->get_name() . "\n";
    }
}

// Оголошення трейту з методом get_name()
trait GetNameTrait {
    public function get_name() {
        return $this->name;
    }
}

class Animal {
    use PrintInfoTrait, GetNameTrait;

    protected $name;
    protected $sound;

    public function __construct($name, $sound) {
        $this->name = $name;
        $this->sound = $sound;
    }

    public function makesSound() {
        echo $this->sound . "\n";
    }

    public function isDomestic() {
        return false; // За замовчуванням, тварина вважається дикою
    }
}

interface InterfaceAnimal {
    public function makesSound(); 
    public function isDomestic(); 
}

class Cat implements InterfaceAnimal {
    use PrintInfoTrait, GetNameTrait;

    private $name;
    private $isDomestic;

    // Конструктор класу Cat
    public function __construct($name, $isDomestic) {
        $this->name = $name;
        $this->isDomestic = $isDomestic;
    }

    public function makesSound() {
        echo "мяу\n";
    }

    public function isDomestic() {
        return $this->isDomestic;
    }
}

// Клас Cock, який також реалізує інтерфейс InterfaceAnimal
class Cock implements InterfaceAnimal {
    use PrintInfoTrait, GetNameTrait;

    private $name;
    private $isDomestic;

    public function __construct($name, $isDomestic) {
        $this->name = $name;
        $this->isDomestic = $isDomestic;
    }

    public function makesSound() {
        echo "кукуріку\n";
    }

    public function isDomestic() {
        return $this->isDomestic;
    }

    // Перевизначення методу print_animal_inf() для класу Cock завдання 5
    public function print_animal_inf() {
        echo "Cock info: " . $this->get_name() . "\n";
    }
}

// Створення об'єкту класу Cat
$cat = new Cat("Barsik", true);
$cat->makesSound();
echo $cat->isDomestic() ? "Цей кіт є домашнім\n" : "Цей кіт є диким\n";
echo $cat->print_animal_inf() . "\n\n";

// Створення об'єкту класу Cock
$cock = new Cock("Півень-Arsec", false);
$cock->makesSound();
echo $cock->isDomestic() ? "Цей півень є домашнім\n" : "Цей півень є диким\n";
echo $cock->print_animal_inf() . "\n"; 

$clonedCat = clone $cat;
?>

