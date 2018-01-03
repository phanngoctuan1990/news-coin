<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ContactUs extends Eloquent
{
    const TYPE_NO_REPLIED = 0;
    const TYPE_REPLIED = 1;

    protected $table = 'contact_us';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'replied',
    ];
}
