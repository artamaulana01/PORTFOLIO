<?php

namespace Tests\Feature\Admin;

use App\Models\Admin;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProjectCrudTest extends TestCase
{
    use RefreshDatabase;

    protected Admin $admin;
    protected Profile $profile;
    protected ProjectCategory $category;
    protected Skill $skill1;
    protected Skill $skill2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = Admin::create([
            'name' => 'Admin Test',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
        ]);

        $this->profile = Profile::create([
            'name' => 'Arta Maulana',
            'short_title' => 'Web Developer',
            'role' => 'Fullstack Developer',
            'headline' => 'Headline Test',
            'tagline' => 'Tagline Test',
            'education' => 'Universitas Muhammadiyah Sukabumi',
            'email' => 'arta@example.com',
            'location' => 'Indonesia',
            'timezone' => 'Asia/Jakarta',
            'tz_label' => 'WIB',
        ]);

        $this->category = ProjectCategory::create([
            'slug' => 'web-dev',
            'name' => 'Web Development',
        ]);

        $skillCat = SkillCategory::create([
            'slug' => 'backend',
            'name' => 'Backend',
            'short_name' => 'Backend',
            'layer' => 'Server & API',
            'description' => 'Backend stack',
            'sort_order' => 0,
        ]);

        $this->skill1 = Skill::create([
            'skill_category_id' => $skillCat->id,
            'name' => 'Laravel',
            'note' => 'PHP Framework',
            'sort_order' => 0,
        ]);

        $this->skill2 = Skill::create([
            'skill_category_id' => $skillCat->id,
            'name' => 'MySQL',
            'note' => 'Relational Database',
            'sort_order' => 1,
        ]);
    }

    /**
     * Admin dapat melihat halaman daftar proyek.
     */
    public function test_admin_can_view_project_index(): void
    {
        $response = $this->actingAs($this->admin, 'admin')->get(route('admin.projects.index'));

        $response->assertStatus(200);
        $response->assertSee('Daftar Proyek');
    }

    /**
     * Admin dapat membuat proyek baru lengkap beserta upload gambar, skill, infos, dan points.
     */
    public function test_admin_can_create_project_with_image_skills_infos_and_points(): void
    {
        $fakeImage = UploadedFile::fake()->image('test-project.jpg', 600, 400);

        $payload = [
            'project_category_id' => $this->category->id,
            'slug' => 'proyek-sistem-akademik',
            'title' => 'Sistem Akademik Kampus',
            'subtitle' => 'Platform manajemen KRS dan nilai online',
            'meta' => 'Web • Laravel & MySQL',
            'summary' => 'Sistem informasi terintegrasi untuk universitas.',
            'background' => 'Kebutuhan otomatisasi pencatatan nilai mahasiswa secara real-time.',
            'color' => '#0e86c4',
            'url' => 'https://akademik.test',
            'github_url' => 'https://github.com/test/akademik',
            'image' => $fakeImage,
            'sort_order' => 1,
            'skills' => [$this->skill1->id, $this->skill2->id],
            'infos' => [
                ['label' => 'Peran', 'value' => 'Lead Developer'],
                ['label' => 'Arsitektur', 'value' => 'Modular MVC'],
            ],
            'points' => [
                ['body' => 'Mengimplementasikan autentikasi multi-guard role mahasiswa dan dosen.'],
                ['body' => 'Optimasi query database untuk pencatatan ribuan KRS serentak.'],
            ],
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.projects.store'), $payload);

        $response->assertRedirect(route('admin.projects.index'));
        $response->assertSessionHas('success');

        // Pastikan record proyek tersimpan di database
        $this->assertDatabaseHas('projects', [
            'slug' => 'proyek-sistem-akademik',
            'title' => 'Sistem Akademik Kampus',
        ]);

        $project = Project::where('slug', 'proyek-sistem-akademik')->first();
        $this->assertNotNull($project);

        // Pastikan relasi pivot skills tersimpan
        $this->assertCount(2, $project->skills);

        // Pastikan project_infos tersimpan
        $this->assertCount(2, $project->infos);
        $this->assertDatabaseHas('project_infos', [
            'project_id' => $project->id,
            'label' => 'Peran',
            'value' => 'Lead Developer',
        ]);

        // Pastikan project_points tersimpan
        $this->assertCount(2, $project->points);

        // Pastikan file gambar terupload di direktori public/uploads/projects
        $this->assertNotNull($project->image_path);
        $this->assertFileExists(public_path($project->image_path));

        // Bersihkan file testing yang dibuat
        if (file_exists(public_path($project->image_path))) {
            unlink(public_path($project->image_path));
        }
    }

    /**
     * Admin dapat memperbarui proyek beserta relasinya.
     */
    public function test_admin_can_update_project(): void
    {
        $project = Project::create([
            'profile_id' => $this->profile->id,
            'project_category_id' => $this->category->id,
            'slug' => 'proyek-awal',
            'title' => 'Proyek Awal',
            'subtitle' => 'Subjudul Awal',
            'meta' => 'Meta Awal',
            'summary' => 'Summary Awal',
            'background' => 'Background Awal',
            'color' => '#123456',
            'sort_order' => 0,
        ]);

        $payload = [
            'project_category_id' => $this->category->id,
            'slug' => 'proyek-awal-revisi',
            'title' => 'Proyek Awal (Revisi)',
            'subtitle' => 'Subjudul Baru',
            'meta' => 'Meta Baru',
            'summary' => 'Summary Baru',
            'background' => 'Background Baru',
            'color' => '#654321',
            'sort_order' => 2,
            'skills' => [$this->skill1->id],
            'infos' => [
                ['label' => 'Status', 'value' => 'Produksi'],
            ],
            'points' => [
                ['body' => 'Pembaruan fitur sistem.'],
            ],
        ];

        $response = $this->actingAs($this->admin, 'admin')
            ->put(route('admin.projects.update', $project), $payload);

        $response->assertRedirect(route('admin.projects.index'));

        $project->refresh();
        $this->assertEquals('Proyek Awal (Revisi)', $project->title);
        $this->assertEquals('proyek-awal-revisi', $project->slug);
        $this->assertCount(1, $project->skills);
        $this->assertCount(1, $project->infos);
        $this->assertCount(1, $project->points);
    }

    /**
     * Admin dapat menghapus proyek.
     */
    public function test_admin_can_delete_project(): void
    {
        $project = Project::create([
            'profile_id' => $this->profile->id,
            'project_category_id' => $this->category->id,
            'slug' => 'proyek-hapus',
            'title' => 'Proyek Siap Dihapus',
            'subtitle' => 'Subjudul',
            'meta' => 'Meta',
            'summary' => 'Summary',
            'background' => 'Background',
            'color' => '#123456',
            'sort_order' => 0,
        ]);

        $response = $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.projects.destroy', $project));

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}

