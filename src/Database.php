<?php

class Database
{

    /** @var PDO $connection */
    private $connection;

    public function __construct()
    {
        $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', DB_HOST, DB_NAME);
        $this->connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD, [
            // throw a exception if an error occurs
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }

    public function fetch(string $query, array $parameter = []): array
    {
        // create prepared statement
        $stmt = $this->connection->prepare($query);
        // bind all parameters to the query
        foreach ($parameter as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        // execute the query on the database
        $stmt->execute();
        // fetch the result as associative array
        $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) === 1) {
            return $result[0];
        }
        return $result;
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