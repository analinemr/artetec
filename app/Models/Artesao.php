<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Artesao extends Model implements AuditableContract
{
    use Auditable;

    protected $table = 'Artesaos';

    protected $fillable = ['nome'];
}
