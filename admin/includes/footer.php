        </div> <!-- /.admin-content -->

        <footer class="mt-auto py-3 px-4 bg-white border-top d-flex justify-content-between align-items-center small text-muted">
            <div>&copy; <?= date('Y') ?> Filao Networks Solutions. All rights reserved.</div>
            <div>Enterprise ISP & Security Administration</div>
        </footer>
    </main> <!-- /.admin-main -->
</div> <!-- /.admin-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Responsive Sidebar Toggle & Global Styled Alerts
document.addEventListener('DOMContentLoaded', function() {
    // 1. Sidebar Toggle
    const sidebar = document.getElementById('adminSidebar');
    const toggleBtn = document.getElementById('toggleSidebarBtn');
    const closeBtn = document.getElementById('closeSidebarBtn');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
        });
    }
    if (closeBtn && sidebar) {
        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('show');
        });
    }

    // 2. Global JS Styled Confirmation for Forms
    document.addEventListener('submit', function(e) {
        const form = e.target;
        if (!form || form.tagName !== 'FORM') return;

        // Skip if already confirmed
        if (form.dataset.confirmed === 'true') {
            return;
        }

        const confirmText = form.getAttribute('data-confirm');
        const isDeleteAction = (form.querySelector('input[name="action"][value*="delete"]') !== null) ||
                               form.classList.contains('confirm-delete-form');

        if (confirmText || isDeleteAction) {
            e.preventDefault();
            const title = form.getAttribute('data-confirm-title') || 'Confirm Deletion';
            const text = confirmText || 'Are you sure you want to proceed with this deletion? This action cannot be undone.';
            const btnText = form.getAttribute('data-confirm-btn') || 'Yes, Delete';

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ec1c24',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fa-solid fa-trash-can me-1"></i> ' + btnText,
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                focusCancel: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.dataset.confirmed = 'true';
                    form.submit();
                }
            });
        }
    });

    // 3. Override window.alert to use styled popup
    window.alert = function(message) {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Notice',
                text: String(message),
                icon: 'info',
                confirmButtonColor: '#090238',
                confirmButtonText: 'OK'
            });
        } else {
            console.log('Notice:', message);
        }
    };
});

// Global SweetAlert Helpers
window.filaoConfirm = function(options) {
    return Swal.fire({
        title: options.title || 'Are you sure?',
        text: options.text || 'This action cannot be undone.',
        icon: options.icon || 'warning',
        showCancelButton: true,
        confirmButtonColor: options.confirmColor || '#ec1c24',
        cancelButtonColor: '#6c757d',
        confirmButtonText: options.confirmText || 'Yes, proceed',
        cancelButtonText: options.cancelText || 'Cancel',
        reverseButtons: true,
        focusCancel: true
    });
};

window.filaoToast = function(icon, message) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: icon || 'info',
        title: message,
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true
    });
};
</script>
<?php if (isset($extra_js)) echo $extra_js; ?>
</body>
</html>
