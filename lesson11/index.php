<?php

include_once "autoload.php";
//
//class Person implements PersonInterface
//{
//    private  $name, $age;
//
//    function getName(): string
//    {
//        return $this->name;
//    }
//
//    function setName(string $name)
//    {
//        $this->name = $name;
//        return $this;
//    }
//
//    function getAge(): int
//    {
//        return $this->age;
//    }
//
//    function setAge(int $age)
//    {
//        $this->age = $age;
//        return $this;
//    }
//}



//
//interface CanEat{
//    function eat();
//}
//
//interface CanFly{
//    function fly();
//}
//interface CanSleep{
//    function sleep();
//}
//interface CanHunt{
//    function hunt();
//}
//
//interface CanTalk{
//    function talk();
//}
//interface CanStoreFood{
//    function storeFood();
//}
//interface CanBreed{
//    function breed();
//}
//interface CanLiveHome{
//    function liveHome();
//}
//
//interface AnimalInterface extends CanEat, CanSleep, CanBreed, CanTalk {}
//interface BirdInterface extends AnimalInterface, CanFly {}
//interface PredatorInterface extends AnimalInterface , CanHunt {}
//
//interface RodentsInterfase extends AnimalInterface, CanStoreFood{}
//
//
//class Bird implements BirdInterface
//{
//
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function fly()
//    {
//        // TODO: Implement fly() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}
//class Eagle implements BirdInterface, CanHunt
//{
//
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function fly()
//    {
//        // TODO: Implement fly() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function hunt()
//    {
//        // TODO: Implement hunt() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}
//class Wolf implements PredatorInterface
//{
//
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function hunt()
//    {
//        // TODO: Implement hunt() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}
//
//class Hamster implements RodentsInterfase
//{
//
//    function storeFood()
//    {
//        // TODO: Implement storeFood() method.
//    }
//
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}
//class Cat implements AnimalInterface, CanHunt, CanLiveHome{
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function hunt()
//    {
//        // TODO: Implement hunt() method.
//    }
//
//    function liveHome()
//    {
//        // TODO: Implement liveHome() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}
//class Dog implements AnimalInterface, CanLiveHome {
//
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function liveHome()
//    {
//        // TODO: Implement liveHome() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}
//class Parrot implements BirdInterface{
//
//    function eat()
//    {
//        // TODO: Implement eat() method.
//    }
//
//    function fly()
//    {
//        // TODO: Implement fly() method.
//    }
//
//    function sleep()
//    {
//        // TODO: Implement sleep() method.
//    }
//
//    function breed()
//    {
//        // TODO: Implement breed() method.
//    }
//
//    function talk()
//    {
//        // TODO: Implement talk() method.
//    }
//}



//$people = new Collection();
////$people->Sarah = 'Connor';
////$people->Jhon = 'Wick';
//$people['Jhon'] = 'Wick';
//$people['Sarah'] = 'Connor';
//$people[] = 'Hello';
//var_dump($people);

//$fruits = new Collection();
//$fruits->set('asd', 'FRUIT');
//foreach ($fruits as $key => $fruit) {
//    echo "$key => $fruit ";
//}


//$app = new Collection();
//
//$app->name = 'TESTER';
//$app->timezone = 'UTC+6';
//$app->lang = 'ru_RU';
//
//$ul = Tag::ul();
//
//foreach ($app as $key => $value)
//{
//    Tag::li()
//        ->appendTo($ul)
//        ->appendBody("$key => $value");
//}
//
//echo $ul;


$q = new Queue();
$q->add(1);
$q->add(2);
$q->add(5);
$q->add(6);
$q->add(7);

//$q->pop();
var_dump($q->count());