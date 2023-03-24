<?php

interface Observer
{
    public function update(string $vacancy): string;
}
interface Subject
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}
class HandHunter implements Subject
{
    private $vacancy;
    private array $observers = [];
    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }
    public function detach(Observer $observer): void
    {
        foreach ($this->observers as $obsrv) {
            if ($obsrv === $observer) {
                unset($obsrv);
            }
        }
    }
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }

    public function changed(): void
    {
        $this->notify();
    }

}

class Candidate implements Observer
{
    public function __construct(
        public string $name,
        public string $email,
        public int $stage
    ){}
    public function update(string $vacancy): string
    {
        return $vacancy;
    }
}

$newVacancy = new HandHunter();
$newVacancy->attach(new Candidate());
