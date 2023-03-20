<?php

interface ISquare
{
    function squareArea(int $sideSquare);
}
interface ICircle
{
    function circleArea(int $circumference);
}

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal**2)/2;
        return $area;
    }
}
class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal**2)/4;
        return $area;
    }
}

class SquareAdapter implements ISquare
{
    protected $lib;
    public function __construct()
    {
        $this->lib = new SquareAreaLib();
    }
    public function squareArea(int $sideSquare)
    {
        $this->lib->getSquareArea(floor($sideSquare * sqrt(2)));
    }
}

class CircleAdapter implements ICircle
{
    protected $lib;
    public function __construct()
    {
        $this->lib = new CircleAreaLib();
    }
    public function circleArea(int $circumference)
    {
        $this->lib->getCircleArea(floor($circumference / M_PI));
    }
}
