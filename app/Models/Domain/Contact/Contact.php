<?php

namespace App\Models\Domain\Contact;

use App\Models\Traits\TeamTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use TeamTenant;

    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'message'
    // ];
}
