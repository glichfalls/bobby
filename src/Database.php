<?php

class Database
{

    /** @var PDO $connection */
    private $connection;

    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', DB_HOST, DB_NAME);
        $this->connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    }

    public function fetch(string $query, array $parameter = []): array
    {
        $stmt = $this->connection->prepare($query);
        foreach ($parameter as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query(string $query, array $parameter = []): void
    {
        $stmt = $this->connection->prepare($query);
        foreach ($parameter as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
    }

}