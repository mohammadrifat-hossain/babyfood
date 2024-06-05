<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class CommonExport implements FromCollection
{

    protected $data;

    function __construct($data)
    {
       $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->data);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings() :array
    {
        $keys = array_keys($this->data[0] ?? []);
        return $keys;
    }
}
