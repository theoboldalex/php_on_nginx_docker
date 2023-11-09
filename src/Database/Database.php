<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

class Database
{
    private PDO $pdo;

    public function __construct(
        private string $dsn,
        private array $options
    ) {
        $this->pdo = new PDO($dsn, $options['username'], $options['password']);
    }

    public function query(string $sql, array $params): array
    {
        if (isset($params)) {
            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($params);
            return $result->fetchAll();
        }

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}

