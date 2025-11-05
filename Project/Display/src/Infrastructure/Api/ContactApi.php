<?php

namespace App\Infrastructure\Api;

class ContactApi
{

    const PATH = '/var/www/data/contactList.json';

    protected $contactList = [];

    public function load()
    {
        $this->contactList = json_decode(file_get_contents(self::PATH));
    }

    public function getList(): array
    {
        $this->load();
        return $this->contactList;
    }

    public function getItem(int $key): object
    {
        $this->load();
        return $this->contactList[$key];
    }

    public function addItem(object $itemObj)
    {
        $this->load();
        $this->contactList[] = $itemObj;
        $this->save();
    }

    public function editItem(int $key, object $itemObj)
    {
        $this->load();
        $this->contactList[$key] = $itemObj;
        $this->save();
    }

    public function save()
    {
        file_put_contents(self::PATH, json_encode($this->contactList));
    }
}
