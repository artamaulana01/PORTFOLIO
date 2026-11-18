<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MilestoneTag extends Model
{
    protected $table = 'milestone_tags';
    protected $guarded = [];
    public $timestamps = false;

    public function milestone(): BelongsTo
    {
        return $this->belongsTo(Milestone::class);
    }
}
