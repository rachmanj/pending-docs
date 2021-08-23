<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['receive_date', 'mailroom_bpn_date'];
    protected $table = 'irr5_invoice';
    protected $primaryKey = 'inv_id';
    protected $with = ['project', 'vendor'];

    public function addocs()
    {
        return $this->hasMany(Addoc::class, 'inv_id', 'addoc_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'inv_project', 'project_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'vendor_id');
    }
}
