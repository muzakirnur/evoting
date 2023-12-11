<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            if($row['nik'] != null){
                User::create([
                    'username' => $row['nik'],
                    'name' => $row['nama'],
                    'tempat_lahir' => $row['tempat'],
                    'tanggal_lahir' => date('Y-m-d H:i:s', strtotime($row['tanggal_lahir'])),
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'alamat' => $row['alamat'],
                    'password' => Hash::make('password')
                ]);
            }
        }
    }
}
