<?php

interface dbInterface
{
    public function getDB(): void;
}
interface ConnectInterface
{
    public function connectDB(dbInterface $database): void;
}

interface RecordInterface
{
    public function recordDB(dbInterface $database): void;
}

interface AbstractFactoryInterface
{
    public function initDB(): dbInterface;
    public function createConnect(): ConnectInterface;
    public function makeRecord(): RecordInterface;
}

class MySQLFactory implements AbstractFactoryInterface
{
    public function initDB(): dbInterface
    {
        return new MysqlDB();
    }
    public function createConnect(): ConnectInterface
    {
        return new connectMysql();
    }

    public function makeRecord(): RecordInterface
    {
        return new recordMysql();
    }
}
class PostgreSQLFactory implements AbstractFactoryInterface
{
    public function initDB(): dbInterface
    {
        return new PostgresqlDB();
    }
    public function createConnect(): ConnectInterface
    {
        return new connectPostgresql();
    }

    public function makeRecord(): RecordInterface
    {
        return new recordPostgresql();
    }
}

class OracleFactory implements AbstractFactoryInterface
{
    public function initDB(): dbInterface
    {
        return new OracleDB();
    }
    public function createConnect(): ConnectInterface
    {
        return new connectOracle();
    }

    public function makeRecord(): RecordInterface
    {
        return new recordOracle();
    }
}

class MysqlDB implements dbInterface
{
    public function getDB(): void
    {
        echo 'Выбираем базу данных MySQL...' . PHP_EOL;
    }
}
class PostgresqlDB implements dbInterface
{
    public function getDB(): void
    {
        echo 'Выбираем базу данных PostgreSQL...' . PHP_EOL;
    }
}

class OracleDB implements dbInterface
{
    public function getDB(): void
    {
        echo 'Выбираем базу данных Oracle...' . PHP_EOL;
    }
}
class connectMysql implements ConnectInterface
{
    public function connectDB(dbInterface $database): void
    {
        echo 'Подключились к MySQL...' . PHP_EOL;
    }
}
class connectPostgresql implements ConnectInterface
{
    public function connectDB(dbInterface $database): void
    {
        echo 'Подключились к PostgreSQL...' . PHP_EOL;
    }
}

class connectOracle implements ConnectInterface
{
    public function connectDB(dbInterface $database): void
    {
        echo 'Подключились к Oracle...' . PHP_EOL;
    }
}

class recordMysql implements RecordInterface
{
    public function recordDB(dbInterface $database): void
    {
        echo 'Записали в MySQL...' . PHP_EOL;
    }
}

class recordPostgresql implements RecordInterface
{
    public function recordDB(dbInterface $database): void
    {
        echo 'Записали в PostgreSQL...' . PHP_EOL;
    }
}

class recordOracle implements RecordInterface
{
    public function recordDB(dbInterface $database): void
    {
        echo 'Записали в Oracle...' . PHP_EOL;
    }
}

$factories = [
    new MySQLFactory(),
    new PostgreSQLFactory(),
    new OracleFactory(),
];

function ormDB(array $factories){
    foreach ($factories as $factory){
        $ormConnect = $factory->createConnect();
        $database = $factory->initDB();
        $database->getDB();
        $ormConnect->connectDB($database);
        $ormRecord = $factory->makeRecord();
        $ormRecord->recordDB($database);
    }
}

ormDB($factories);