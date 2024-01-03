<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ReturnRequest extends Model {
    use HasFactory, HasUuids, SoftDeletes;

    protected $primaryKey = "return_request_id";
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'created_by',
        'identifier',
        'valuation_type',
        'origin',
        'customer_name',
        'type',
        'brand',
        'serial_number',
        'material_picture',
        'request_status'
    ];

    public function newUniqueId() {
        return (string) Str::uuid();
    }
}
