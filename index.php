<?php

interface Kind{
    function eat();
    function sleep();
    function breed();
    function move();
    function say();
}

interface BirdKind{
    function fly();
}
interface PredatorKind{
    function hunt();
}
interface RodentsKind{
    function storeFood();
}
interface SpiderKind{
    function weavesWeb();
}
interface FishKind{
    function swim();
}

trait CanWeavesWeb
{
    function weavesWeb(){}
}
trait CanEat
{
    function eat(){}
}
trait CanFly
{
    function fly(){}
}
trait CanSleep
{
    function sleep(){}
}
trait CanHunt
{
    function hunt(){}
}
trait CanStoreFood
{
    function storeFood(){}
}
trait CanBreed
{
    function breed(){}
}
trait CanLiveHome
{
    function liveHome(){}
}
trait CanSwim
{
    function swim(){}
}
trait CanMove
{
    function move(){}
}
trait CanSay
{
    function say(){}
}
trait ExcellentVision
{
    function excellentVision(){}
}

class Animal implements Kind
{

    function eat()
    {
        // TODO: Implement eat() method.
    }

    function sleep()
    {
        // TODO: Implement sleep() method.
    }

    function breed()
    {
        // TODO: Implement breed() method.
    }

    function move()
    {
        // TODO: Implement move() method.
    }

    function say()
    {
        // TODO: Implement say() method.
    }
}

class Bird extends Animal implements BirdKind
{
    use CanEat, CanSleep, CanBreed, CanFly;
}
class Eagle extends Animal implements BirdKind
{
    use ExcellentVision, CanHunt, CanFly;
}
class Wolf extends Animal implements PredatorKind
{
    use CanHunt;
}
class Hamster extends Animal implements RodentsKind
{
    use CanEat, CanSleep, CanBreed, CanStoreFood;
}
class Fish extends Animal implements FishKind
{
    use CanEat, CanSleep, CanBreed, CanSwim;
}
class Spider extends Animal implements SpiderKind
{
    use CanEat, CanSleep, CanBreed, CanWeavesWeb;
}