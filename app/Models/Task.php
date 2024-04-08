<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category', 'description', 'long_description'];

    public function toggleComplete() {
        $this->completed = !$this->completed;
        $this->save();
    }

    public function toggleImportant() {
        $this->important = !$this->important;
        $this->save();
    }
}
