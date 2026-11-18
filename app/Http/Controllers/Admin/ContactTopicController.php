<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactTopicRequest;
use App\Models\ContactTopic;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactTopicController extends Controller
{
    /**
     * Tampilkan daftar topik kontak.
     */
    public function index(): View
    {
        $topics = ContactTopic::orderBy('sort_order')->paginate(15);

        return view('admin.contact-topics.index', compact('topics'));
    }

    /**
     * Tampilkan form tambah topik kontak.
     */
    public function create(): View
    {
        $topic = new ContactTopic(['sort_order' => 0]);

        return view('admin.contact-topics.create', compact('topic'));
    }

    /**
     * Simpan topik kontak baru.
     */
    public function store(ContactTopicRequest $request): RedirectResponse
    {
        $profile = Profile::firstOrFail();
        $data = $request->validated();
        $data['profile_id'] = $profile->id;

        ContactTopic::create($data);

        return redirect()->route('admin.contact-topics.index')
            ->with('success', 'Topik kontak baru berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit topik kontak.
     */
    public function edit(ContactTopic $contactTopic): View
    {
        return view('admin.contact-topics.edit', ['topic' => $contactTopic]);
    }

    /**
     * Perbarui data topik kontak.
     */
    public function update(ContactTopicRequest $request, ContactTopic $contactTopic): RedirectResponse
    {
        $contactTopic->update($request->validated());

        return redirect()->route('admin.contact-topics.index')
            ->with('success', 'Topik kontak berhasil diperbarui.');
    }

    /**
     * Hapus topik kontak.
     */
    public function destroy(ContactTopic $contactTopic): RedirectResponse
    {
        $contactTopic->delete();

        return redirect()->route('admin.contact-topics.index')
            ->with('success', 'Topik kontak berhasil dihapus.');
    }
}

