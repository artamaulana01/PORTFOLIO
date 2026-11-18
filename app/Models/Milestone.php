<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Milestone extends Model
{
    protected $table = 'milestones';
    protected $guarded = [];
    public $timestamps = false;

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(MilestoneType::class, 'milestone_type_id');
    }

    public function points(): HasMany
    {
        return $this->hasMany(MilestonePoint::class)->orderBy('sort_order');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(MilestoneTag::class);
    }
}
