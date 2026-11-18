<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $guarded = [];

    public function expertises(): HasMany
    {
        return $this->hasMany(Expertise::class)->orderBy('sort_order');
    }

    public function principles(): HasMany
    {
        return $this->hasMany(Principle::class)->orderBy('sort_order');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class)->orderBy('sort_order');
    }

    public function milestones(): HasMany
    {
        return $this->hasMany(Milestone::class)->orderBy('sort_order');
    }

    public function contactTopics(): HasMany
    {
        return $this->hasMany(ContactTopic::class)->orderBy('sort_order');
    }
}
