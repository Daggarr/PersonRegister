<?php
namespace App;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\Writer;

class PersonRegister
{

    private Reader $reader;
    private Writer $writer;
    private Writer $delete;

    public function __construct()
    {
        $this->reader = Reader::createFromPath('PersonRegister.csv', 'r');
        $this->reader->setHeaderOffset(0);
        $this->writer = Writer::createFromPath('PersonRegister.csv', 'a');
    }

    public function getPersonData(): \League\Csv\TabularDataReader
    {
        $statement = Statement::create();
        return $statement->process($this->reader);
    }

    public function addPersonData(string $name, string $surname, string $identityNumber, string $extraInfo = "No info")
    {
        $this->writer->insertOne([$name, $surname, $identityNumber, $extraInfo]);
    }

    public function searchByIdentityNumber($records, string $identityNumber)
    {
        $search = [];

        foreach ($records as $record)
        {
            if ($record['identityNumber'] === $identityNumber)
            {
                $search = $record;
            }
        }

        return $search;
    }

    public function deleteEntry(string $identityNumber)
    {
        $records = $this->getPersonData();
        $filteredRecords = [["name","surname","identityNumber","extraInfo"]];
        foreach ($records as $record)
        {
            if ($record['identityNumber'] !== $identityNumber)
            {
                $filteredRecords[] = $record;
            }
        }

        $this->delete = Writer::createFromPath('PersonRegister.csv', 'w');
        $this->delete->insertAll($filteredRecords);
    }
}