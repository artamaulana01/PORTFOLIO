<?php

namespace Database\Seeders;

use App\Models\MilestoneType;
use App\Models\Profile;
use App\Models\ProjectCategory;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $d = require database_path('data/portfolio.php');
        $skillIds = function (array $names) {
            $ids = Skill::whereIn('name', $names)->pluck('id', 'name');
            $missing = array_diff($names, $ids->keys()->all());
            if ($missing) {
                throw new \RuntimeException('Skill belum ada di skill_categories: ' . implode(', ', $missing));
            }
            return $ids->values()->all();
        };

        // Data diri + kontak
        $profile = Profile::create([
            'name' => $d['name'], 'short_title' => $d['short'], 'role' => $d['role'],
            'headline' => $d['profile_title'], 'tagline' => $d['tagline'], 'education' => $d['education'],
            'email' => $d['email'], 'github' => $d['github'], 'linkedin' => $d['linkedin'],
            'cv_path' => $d['cv'], 'photo_path' => $d['photo'] ?? 'images/profile.svg',
            'location' => $d['location'], 'timezone' => $d['timezone'], 'tz_label' => $d['tz_label'],
        ]);

        // Kategori skill + skill
        foreach ($d['skill_categories'] as $i => $c) {
            $category = SkillCategory::create([
                'slug' => $c['key'], 'name' => $c['name'], 'short_name' => $c['short'],
                'layer' => $c['layer'], 'description' => $c['desc'], 'sort_order' => $i,
            ]);
            foreach ($c['tools'] as $j => [$name, $note]) {
                $category->skills()->create(['name' => $name, 'note' => $note, 'sort_order' => $j]);
            }
        }

        // Bidang keahlian (many-to-many ke skill) + prinsip kerja
        foreach ($d['tabs'] as $i => $t) {
            $expertise = $profile->expertises()->create([
                'slug' => $t['key'], 'label' => $t['label'], 'title' => $t['title'],
                'description' => $t['text'], 'sort_order' => $i,
            ]);
            $expertise->skills()->attach($skillIds($t['stack']));
        }
        foreach ($d['principles'] as $i => [$title, $desc]) {
            $profile->principles()->create(['title' => $title, 'description' => $desc, 'sort_order' => $i]);
        }

        // Proyek
        foreach ($d['project_filters'] as $slug => $name) {
            ProjectCategory::create(['slug' => $slug, 'name' => $name]);
        }
        foreach ($d['projects'] as $i => $p) {
            $project = $profile->projects()->create([
                'project_category_id' => ProjectCategory::where('slug', $p['cat'])->value('id'),
                'slug' => $p['id'], 'title' => $p['title'], 'subtitle' => $p['subtitle'], 'meta' => $p['meta'],
                'summary' => $p['short'], 'background' => $p['bg'], 'color' => $p['color'],
                'url' => $p['url'], 'github_url' => $p['github'], 'sort_order' => $i,
            ]);
            foreach ($p['info'] as $j => [$label, $value]) {
                $project->infos()->create(['label' => $label, 'value' => $value, 'sort_order' => $j]);
            }
            foreach ($p['points'] as $j => $body) {
                $project->points()->create(['body' => $body, 'sort_order' => $j]);
            }
            $project->skills()->attach($skillIds($p['stack']));
        }

        // Pendidikan, organisasi, pencapaian, program
        foreach ($d['milestones'] as $i => $m) {
            $milestone = $profile->milestones()->create([
                'milestone_type_id' => MilestoneType::firstOrCreate(['name' => $m['type']])->id,
                'title' => $m['title'], 'place' => $m['place'], 'period' => $m['date'],
                'description' => $m['text'], 'sort_order' => $i,
            ]);
            foreach ($m['points'] as $j => $body) {
                $milestone->points()->create(['body' => $body, 'sort_order' => $j]);
            }
            foreach ($m['tags'] as $tag) {
                $milestone->tags()->create(['name' => $tag]);
            }
        }

        // Kontak: topik diskusi
        foreach ($d['topics'] as $i => $label) {
            $profile->contactTopics()->create(['label' => $label, 'sort_order' => $i]);
        }
    }
}
