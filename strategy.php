<?php

interface paymentStrategy
{
    public function requestProcessing();
    public function responseSystem();
}

class QiwiPayment implements paymentStrategy
{
    public function requestProcessing()
    {
        echo 'Обработка запроса на оплату "Qiwi"' . PHP_EOL;
    }
    public function responseSystem()
    {
        echo 'Получение ответа от "Qiwi"' . PHP_EOL;
    }
}
class YandexPayment implements paymentStrategy
{
    public function requestProcessing()
    {
        echo 'Обработка запроса на оплату "Yandex"' . PHP_EOL;
    }
    public function responseSystem()
    {
        echo 'Получение ответа от "Yandex"' . PHP_EOL;
    }
}
class WebMoneyPayment implements paymentStrategy
{
    public function requestProcessing()
    {
        echo 'Обработка запроса на оплату "WebMoney"' . PHP_EOL;
    }
    public function responseSystem()
    {
        echo 'Получение ответа от "WebMoney"' . PHP_EOL;
    }
}

class PaymentFactory
{
    public function createPayment($system){
        $selectSystem = $system.'Payment';
        //var_dump(new $selectSystem);
        if (class_exists($selectSystem)) {
            return new $selectSystem();
        }
        return null;
    }
}

$sys = (new PaymentFactory())->createPayment('WebMoney');
(new $sys())->requestProcessing();
(new $sys())->responseSystem();
