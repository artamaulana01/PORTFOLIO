/**
 * ADMIN PANEL VANILLA JAVASCRIPT
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Sidebar Toggle
    const hamburger = document.getElementById('hamburgerBtn');
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');

    if (hamburger && sidebar && overlay) {
        const toggleSidebar = () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('open');
        };

        hamburger.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);
    }

    // 2. Dynamic Rows Helper
    document.addEventListener('click', e => {
        // Tambah Baris Dinamis
        const addBtn = e.target.closest('[data-add-row]');
        if (addBtn) {
            const containerId = addBtn.dataset.addRow;
            const container = document.getElementById(containerId);
            const template = document.getElementById(containerId + 'Template');

            if (container && template) {
                const index = container.querySelectorAll('.dynamic-item').length;
                let html = template.innerHTML.replace(/__INDEX__/g, index);
                
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html.trim();
                const newRow = tempDiv.firstChild;
                container.appendChild(newRow);
            }
        }

        // Hapus Baris Dinamis
        const delBtn = e.target.closest('[data-del-row]');
        if (delBtn) {
            const row = delBtn.closest('.dynamic-item');
            if (row) {
                row.remove();
            }
        }
    });

    // 3. Konfirmasi Hapus Form
    document.addEventListener('submit', e => {
        const form = e.target;
        if (form.classList.contains('form-delete')) {
            const message = form.dataset.confirm || 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.';
            if (!confirm(message)) {
                e.preventDefault();
            }
        }
    });

    // 4. Auto-Generate Slug dari Title
    const titleInput = document.querySelector('[data-source-title]');
    const slugInput = document.querySelector('[data-target-slug]');

    if (titleInput && slugInput && !slugInput.value) {
        titleInput.addEventListener('input', () => {
            const slug = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.value = slug;
        });
    }
});

