<?php

namespace App\Imports;

use App\Klasifikasi;
use Maatwebsite\Excel\Concerns\ToModel;

class KategoriImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kategori([
            'id'    => $row[0],
            'nama'  => $row[1],
            'kode'  => $row[2],
            'uraian'    => $row[3],
        ]);
    }
}
