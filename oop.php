<?php
class Car{
    public $name='Toyota';
    public $band='Camry';
    private $year='2011';
    protected $color='red';
    public $model='Sport Edition(SE)';
    public $price=60000;

    public function move(){
        echo 'I can move';
    }
    public function __construct($color, $bran, $yr, $pric){
        $this->color=$color;
        $this->brand=$bran;
        $this->year=$yr;
        // $this->price=$pric;
        echo 'This is the constructor and the color is  '.$this->color. ' the brand is, '.$this->brand. ' the year of the car is, '.$this->year. ' and the price is  '.$this->price;
    }
}   

$carone= new Car('green','camry', '2005', '$5,000');
echo '<br>';
// echo $carone->name;
// echo $carone->move();
// echo $carone->color;
// echo $carone->year;

$carsec= new Car('Yellow', 'Lexus', '2015', '3000');
echo '<br>';

$carthir= new Car('White', 'Honda', '2019', '3000');
echo '<br>';

$carfour= new Car('Grey', 'BMW', '2023', '3000');

class NewCar extends Car{
    public function newmove(){
        echo $this->brand.$this->color;
    }
}

$newone=new NewCar('Black','Ford', '2013', '$3790');
echo'<br>';
echo $newone->newmove();
echo'<br>';

$newsec =new NewCar('Blue','Chevrolet Silveradoo', '2001', '$9,099');
echo'<br>';
echo $newsec->brand;
echo '<br>';
echo $newsec->price;
?>