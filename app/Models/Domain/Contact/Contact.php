<?php

namespace App\Models\Domain\Contact;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'message'
    // ];
}
