<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    public function toggleComplete()
    {
        logger('Toggle complete called');
        logger($this->completed);
        $this->completed = !$this->completed;
        $this->save();
        logger($this->completed);
    }
}
