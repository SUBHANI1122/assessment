<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackVote extends Model
{
    use HasFactory;
    protected $fillable = [
        'feedback_id',
        'user_id',
        'vote',
    ];
}
