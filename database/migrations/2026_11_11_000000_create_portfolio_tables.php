<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Data diri + kontak
        Schema::create('profiles', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('short_title');
            $t->string('role');
            $t->string('headline');
            $t->text('tagline');
            $t->string('education');
            $t->string('email');
            $t->string('github')->nullable();
            $t->string('linkedin')->nullable();
            $t->string('cv_path')->nullable();
            $t->string('photo_path')->default('images/profile.svg');
            $t->string('location');
            $t->string('timezone')->default('Asia/Jakarta');
            $t->string('tz_label', 10)->default('WIB');
            $t->timestamps();
        });

        // Bidang keahlian (tab Web / Mobile / Linux)
        Schema::create('expertises', function (Blueprint $t) {
            $t->id();
            $t->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $t->string('slug');
            $t->string('label');
            $t->string('title');
            $t->text('description');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('principles', function (Blueprint $t) {
            $t->id();
            $t->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $t->string('title');
            $t->string('description');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        // Skill dan kategorinya (Frontend, Backend, Database, DevOps)
        Schema::create('skill_categories', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('name');
            $t->string('short_name');
            $t->string('layer');
            $t->string('description');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('skills', function (Blueprint $t) {
            $t->id();
            $t->foreignId('skill_category_id')->constrained()->cascadeOnDelete();
            $t->string('name')->unique();
            $t->string('note')->nullable();
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        // Relasi many-to-many: bidang keahlian <-> skill
        Schema::create('expertise_skill', function (Blueprint $t) {
            $t->foreignId('expertise_id')->constrained()->cascadeOnDelete();
            $t->foreignId('skill_id')->constrained()->cascadeOnDelete();
            $t->primary(['expertise_id', 'skill_id']);
        });

        // Proyek
        Schema::create('project_categories', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('name');
        });

        Schema::create('projects', function (Blueprint $t) {
            $t->id();
            $t->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $t->foreignId('project_category_id')->constrained()->restrictOnDelete();
            $t->string('slug')->unique();
            $t->string('title');
            $t->string('subtitle');
            $t->string('meta');
            $t->text('summary');
            $t->text('background');
            $t->string('color', 9)->default('#0e86c4');
            $t->string('url')->nullable();
            $t->string('image_path')->nullable();
            $t->string('github_url')->nullable();
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('project_infos', function (Blueprint $t) {
            $t->id();
            $t->foreignId('project_id')->constrained()->cascadeOnDelete();
            $t->string('label');
            $t->string('value');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('project_points', function (Blueprint $t) {
            $t->id();
            $t->foreignId('project_id')->constrained()->cascadeOnDelete();
            $t->text('body');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        // Relasi many-to-many: proyek <-> skill
        Schema::create('project_skill', function (Blueprint $t) {
            $t->foreignId('project_id')->constrained()->cascadeOnDelete();
            $t->foreignId('skill_id')->constrained()->cascadeOnDelete();
            $t->primary(['project_id', 'skill_id']);
        });

        // Riwayat pendidikan, pengalaman organisasi, pencapaian, program
        Schema::create('milestone_types', function (Blueprint $t) {
            $t->id();
            $t->string('name')->unique();
        });

        Schema::create('milestones', function (Blueprint $t) {
            $t->id();
            $t->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $t->foreignId('milestone_type_id')->constrained()->restrictOnDelete();
            $t->string('title');
            $t->string('place');
            $t->string('period');
            $t->text('description');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('milestone_points', function (Blueprint $t) {
            $t->id();
            $t->foreignId('milestone_id')->constrained()->cascadeOnDelete();
            $t->text('body');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });

        Schema::create('milestone_tags', function (Blueprint $t) {
            $t->id();
            $t->foreignId('milestone_id')->constrained()->cascadeOnDelete();
            $t->string('name');
        });

        // Topik diskusi pada bagian kontak
        Schema::create('contact_topics', function (Blueprint $t) {
            $t->id();
            $t->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $t->string('label');
            $t->unsignedSmallInteger('sort_order')->default(0);
        });
    }

    public function down(): void
    {
        foreach ([
            'contact_topics', 'milestone_tags', 'milestone_points', 'milestones', 'milestone_types',
            'project_skill', 'project_points', 'project_infos', 'projects', 'project_categories',
            'expertise_skill', 'skills', 'skill_categories', 'principles', 'expertises', 'profiles',
        ] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
