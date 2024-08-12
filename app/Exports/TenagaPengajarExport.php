<?php

namespace App\Exports;

use App\Models\Pegawai;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TenagaPengajarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        // Mengambil data pegawai dengan kolom 'nama_lengkap' dan 'jabatan'
        $data = Pegawai::select('nama_lengkap', 'jabatan')->where('id_profil', $this->id)->get();

        // Menambahkan kolom 'No' sebagai nomor urut
        $data = $data->map(function($item, $index) {
            return [
                'No' => $index + 1,  // Nomor urut
                'nama_lengkap' => $item->nama_lengkap,
                'jabatan' => $item->jabatan,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        // Menambahkan heading untuk kolom 'No'
        return [
            'No',  // Kolom pertama untuk nomor urut
            'Nama Lengkap',
            'Jabatan',
        ];
    }
}
