<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /** 
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'nombre' => $row[1], // Columna B (segunda columna)
            'correo' => $row[2], // Columna C (tercera columna)
        ]);
    }
}