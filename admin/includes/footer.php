        </div> <!-- /.admin-content -->

        <footer class="mt-auto py-3 px-4 bg-white border-top d-flex justify-content-between align-items-center small text-muted">
            <div>&copy; <?= date('Y') ?> Filao Networks Solutions. All rights reserved.</div>
            <div>Enterprise ISP & Security Administration</div>
        </footer>
    </main> <!-- /.admin-main -->
</div> <!-- /.admin-wrapper -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Responsive Sidebar Toggle
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>
<?php if (isset($extra_js)) echo $extra_js; ?>
</body>
</html>
