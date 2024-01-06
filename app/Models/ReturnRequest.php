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
        'continue_checkbox',
        'dead_on_arrival_checkbox',
        'dead_on_operational_checkbox',
        'ber_indicator_checkbox',
        'software_error_checkbox',
        'tributary_error_checkbox',
        'channel_error_checkbox',
        'port_error_checkbox',
        'laser_tx_faulty_checkbox',
        'physical_damage_checkbox',
        'intermitent_checkbox',
        'rectifier_fault_checkbox',
        'charging_switch_checkbox',
        'battery_faulty_checkbox',
        'number_of_tribu',
        'number_of_char',
        'number_of_port',
        'misscellaneous',
        'request_status',
        'admin_notified'
    ];

    public function newUniqueId() {
        return (string) Str::uuid();
    }
}
