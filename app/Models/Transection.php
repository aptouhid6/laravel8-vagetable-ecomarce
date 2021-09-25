<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    // use HasFactory;
    const STATUS_PENDING = 'Pending';
    const STATUS_SUCCESS = 'Success';
    const STATUS_FAILED = 'Failed';
    const STATUS_CANCELLED = 'Cancelled';
}
