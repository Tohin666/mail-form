<?php


class Users
{
    private $users;
    private $jsonPath;

    public function __construct(string $jsonPath = './default.json')
    {
        if ($jsonPath != './default.json') {
            $this->loadData($jsonPath);
        } else {
            $this->users = [];
            $this->jsonPath = $jsonPath;
        }
    }

    public function loadData(string $jsonPath)
    {
        $json = file_get_contents($jsonPath);
        $arr = json_decode($json, true);
        $this->users = $arr ?? [];
        $this->jsonPath = $jsonPath;
    }

    public function saveJson()
    {
        $json = json_encode($this->users);
        return file_put_contents($this->jsonPath, $json);
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function getUser(int $id): ?array
    {
        foreach ($this->users as $user) {
            if ($user['id'] = $id) {
                return $user;
            }
        }
        return null;
    }

    public function setUser(array $user)
    {
        $this->users[] = $user;
    }

    public function deleteUsers(array ...$fields)
    {
        foreach ($this->users as $userKey => $userValue) {
            foreach ($fields as $field) {
                $fieldName = array_keys($field)[0];

                if ($userValue[$fieldName] == $field[$fieldName]) {
                    unset($this->users[$userKey]);
                    break;
                }
            }
        }
    }

    public function clearData()
    {
        $this->users = [];
    }

}