<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\ProjectCategory;
use App\Models\SkillCategory;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::with([
            'expertises.skills', 'principles', 'contactTopics',
            'projects.category', 'projects.infos', 'projects.points', 'projects.skills',
            'milestones.type', 'milestones.points', 'milestones.tags',
        ])->first();

        abort_if($profile === null, 503, 'Database kosong. Jalankan: php artisan migrate --seed');

        return view('portfolio', [
            'profile' => $profile,
            'skillCategories' => SkillCategory::with('skills')->orderBy('sort_order')->get(),
            'projectCategories' => ProjectCategory::whereHas('projects')->get(),
        ]);
    }
}
