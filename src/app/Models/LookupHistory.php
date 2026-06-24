<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LookupHistory extends Model
{
    protected $fillable = [
        'original_target', 'normalized_target', 'input_type', 
        'resolved_ip', 'user_ip', 'result_summary'
    ];
    protected $casts = ['result_summary' => 'array'];
}