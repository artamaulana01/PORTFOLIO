<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Admin;
use App\Models\ContactTopic;
use App\Models\Expertise;
use App\Models\Milestone;
use App\Models\MilestoneType;
use App\Models\Principle;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman utama dashboard admin.
     */
    public function index(): View
    {
        $admin = Auth::guard('admin')->user();
        $profile = Profile::first();

        $stats = [
            'projects' => Project::count(),
            'project_categories' => ProjectCategory::count(),
            'skills' => Skill::count(),
            'skill_categories' => SkillCategory::count(),
            'expertises' => Expertise::count(),
            'principles' => Principle::count(),
            'milestones' => Milestone::count(),
            'contact_topics' => ContactTopic::count(),
        ];

        $milestonesByType = MilestoneType::withCount('milestones')->get();

        return view('admin.dashboard', compact('admin', 'profile', 'stats', 'milestonesByType'));
    }
}

