<?php

namespace App\Exports;

use App\Models\ReturnRequest;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection {
    public function collection() {
        return ReturnRequest::all();
    }
}