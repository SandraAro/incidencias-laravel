<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reminder extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'reminder_status_id',
        'company_id',
        'title',
        'description',
        'date'
    ];

    public function status()
    {
        return $this->hasOne(ReminderStatus::class,'id', 'reminder_status_id');
    }
}
