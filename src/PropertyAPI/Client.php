<?php

namespace PropertyAPI;

use PropertyAPI\Property;

/**
 * PropertyAPI Client
 */
class Client extends \PropertyAPI\Base
{
    private $response;
    private $total = 0;
    private $rows = [];
    private $parsedRows = [];
    private $parsedRow;

    public function getProperties()
    {
        $this->response = $this->request('');

        $this->total = $this->response->Total;
        $this->rows = ($this->response->Data ?: []);

        $this->parseRows();

        return $this;
    }

    public function getProperty($id)
    {
        $this->response = $this->request(sprintf('id/%d', $id));

        return ($this->response->Data ? $this->parseRow($this->response->Data[0]) : []);
    }

    private function parseRows()
    {
        if ($this->total) {
            foreach ($this->rows as $key => $row) {
                $this->parsedRows[$key] = $this->parseRow($row);
            }
        }
    }

    private function parseRow($row)
    {
        return new Property($row);
    }

    public function getRawResponse()
    {
        return $this->response;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getParsedRows()
    {
        return $this->parsedRows;
    }
}