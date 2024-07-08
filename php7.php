<?php
trait PrintInfoTrait {
    public function print_animal_inf() {
        echo "Animal info: " . $this->get_name() . "\n";
    }
}

// ���������� ������ � ������� get_name()
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
        return false; // �� �������������, ������� ��������� �����
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

    // ����������� ����� Cat
    public function __construct($name, $isDomestic) {
        $this->name = $name;
        $this->isDomestic = $isDomestic;
    }

    public function makesSound() {
        echo "���\n";
    }

    public function isDomestic() {
        return $this->isDomestic;
    }
}

// ���� Cock, ���� ����� ������ ��������� InterfaceAnimal
class Cock implements InterfaceAnimal {
    use PrintInfoTrait, GetNameTrait;

    private $name;
    private $isDomestic;

    public function __construct($name, $isDomestic) {
        $this->name = $name;
        $this->isDomestic = $isDomestic;
    }

    public function makesSound() {
        echo "�������\n";
    }

    public function isDomestic() {
        return $this->isDomestic;
    }

    // �������������� ������ print_animal_inf() ��� ����� Cock �������� 5
    public function print_animal_inf() {
        echo "Cock info: " . $this->get_name() . "\n";
    }
}

// ��������� ��'���� ����� Cat
$cat = new Cat("Barsik", true);
$cat->makesSound();
echo $cat->isDomestic() ? "��� �� � �������\n" : "��� �� � �����\n";
echo $cat->print_animal_inf() . "\n\n";

// ��������� ��'���� ����� Cock
$cock = new Cock("ϳ����-Arsec", false);
$cock->makesSound();
echo $cock->isDomestic() ? "��� ����� � �������\n" : "��� ����� � �����\n";
echo $cock->print_animal_inf() . "\n"; 

$clonedCat = clone $cat;
?>

