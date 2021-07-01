<?php

declare(strict_types=1);

namespace App\Model;

use App\Exception\StorageException;
use App\Exception\NotFoundException;
use PDO;
use Throwable;

class NoteModel extends AbstractModel implements ModelInterface
{
    public function get(int $id): array
    {
        try {
            $query = "SELECT * FROM mynotes WHERE id = $id";
            $result = $this->conn->query($query);
            $note = $result->fetch(PDO::FETCH_ASSOC);
        } catch (Throwable $exception) {
            throw new StorageException('Cant get note',400);
        }

        if(!$note) {
            throw new NotFoundException("Note doeasn't exist");
        }
        return $note;
    }

    public function search(string $phrase, int $pageNumber, int $pageSize, string $sortBy, string $sortOrder): array
    {
        return $this->findBy($phrase,$pageNumber,$pageSize,$sortBy,$sortOrder);
    }

    public function searchCount(string $phrase): int
    {
        try {
            $phrase = $this->conn->quote('%'.$phrase.'%', PDO::PARAM_STR);
            $query = "SELECT count(*) AS cn FROM mynotes WHERE title LIKE($phrase)";
            $result = $this->conn->query($query);
            $result =  $result->fetch(PDO::FETCH_ASSOC);
            if($result === false) {
                throw new StorageException('Cant get information about how much notes u have',400);
            }
            return (int) $result['cn'];
        } catch(Throwable $exception) {
            throw new StorageException('Cant get information about how much notes u have', 400);
        }
    }

    public function list(int $pageNumber, int $pageSize, string $sortBy, string $sortOrder): array
    {
        return $this->findBy(null,$pageNumber,$pageSize,$sortBy,$sortOrder);
    }

    public function count(): int
    {
        try {
            $query = "SELECT count(*) AS cn FROM mynotes";
            $result = $this->conn->query($query);
            $result =  $result->fetch(PDO::FETCH_ASSOC);
            if($result === false) {
                throw new StorageException('Cant get information about how much notes u have',400);
            }
            return (int) $result['cn'];
        } catch(Throwable $exception) {
            throw new StorageException('Cant get information about how much notes u have', 400);
        }
    }

    public function create(array $data): void
    {
        try {
            $title = $this->conn->quote($data['title']);
            $description = $this->conn->quote($data['description']);
            $created = $this->conn->quote(date('Y-m-d H:i:s'));
            $query = "INSERT INTO mynotes(title,description,created) VALUES($title,$description,$created)";
            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException("Cant create note", 400);
        }
    }

    public function edit(int $id, array $data): void
    {
        try {
            $title = $this->conn->quote($data['title']);
            $description = $this->conn->quote($data['description']);

            $query = "UPDATE mynotes SET title = $title, description = $description WHERE id = $id";
            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('Cant update note', 400);
        }
    }

    public function delete(int $id): void
    {
        try {
            $query = "DELETE FROM mynotes WHERE id=$id LIMIT 1";
            $this->conn->exec($query);
        } catch (Throwable $exception) {
            throw new StorageException('Cant delete note',400);
        }
    }

    private function findBy(?string $phrase, int $pageNumber, int $pageSize, string $sortBy, string $sortOrder): array
    {
        try {
            $limit = $pageSize;
            $offset = ($pageNumber - 1) * $pageSize;

            if(!in_array($sortBy, ['created', 'title'])) {
                $sortBy = 'title';
            }
            if(!in_array($sortOrder, ['asc', 'desc'])) {
                $sortOrder = 'desc';
            }

            $wherePart = '';
            if($phrase) {
                $phrase = $this->conn->quote('%'.$phrase.'%', PDO::PARAM_STR);
                $wherePart = "WHERE title LIKE ($phrase)";
            }

            $query = "SELECT id, title, created FROM mynotes $wherePart ORDER BY $sortBy $sortOrder LIMIT $offset, $limit";
            $result = $this->conn->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);;
        } catch(Throwable $exception) {
            throw new StorageException('Cant get notes', 400);
        }
    }
}