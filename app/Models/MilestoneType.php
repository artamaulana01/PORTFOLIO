<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MilestoneType extends Model
{
    protected $table = 'milestone_types';
    protected $guarded = [];
    public $timestamps = false;

    public function milestones(): HasMany
    {
        return $this->hasMany(Milestone::class);
    }
}
