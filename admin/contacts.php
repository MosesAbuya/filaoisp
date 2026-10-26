<?php
/**
 * Filao Networks Solutions - Admin Contact Messages Management
 * Redesigned for high readability, instant modal preview, search/filter, and JS styled alerts.
 */
$page_title = 'Contact Messages';
require_once __DIR__ . '/includes/header.php';

// Handle Message Deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_contact') {
    $contact_id = (int)$_POST['contact_id'];
    $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = ?");
    $stmt->execute([$contact_id]);
    $_SESSION['msg'] = "Contact message deleted successfully.";
    header("Location: contacts");
    exit;
}

// Fetch all contact messages
$contacts = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();
$total_count = count($contacts);

// Quick Statistics
$today_start = date('Y-m-d 00:00:00');
$week_start = date('Y-m-d 00:00:00', strtotime('-7 days'));

$today_count = 0;
$week_count = 0;
$unique_senders = [];

foreach ($contacts as $c) {
    if ($c['created_at'] >= $today_start) {
        $today_count++;
    }
    if ($c['created_at'] >= $week_start) {
        $week_count++;
    }
    if (!empty($c['email'])) {
        $unique_senders[strtolower(trim($c['email']))] = true;
    }
}
$unique_sender_count = count($unique_senders);

// Helper for Initials
function getInitials($name) {
    $parts = preg_split('/\s+/', trim($name));
    $initials = '';
    if (!empty($parts[0])) $initials .= mb_substr($parts[0], 0, 1);
    if (!empty($parts[1])) $initials .= mb_substr($parts[1], 0, 1);
    return strtoupper($initials ?: 'C');
}

// Helper for Relative Time
function formatRelativeTime($datetime) {
    $timestamp = strtotime($datetime);
    $diff = time() - $timestamp;
    if ($diff < 60) return 'Just now';
    if ($diff < 3600) return floor($diff / 60) . 'm ago';
    if ($diff < 86400) return floor($diff / 3600) . 'h ago';
    if ($diff < 604800) return floor($diff / 86400) . 'd ago';
    return date('M j, Y', $timestamp);
}
?>

<style>
/* Contacts Redesign Styles */
.contacts-kpi-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.25rem 1.5rem;
    display: flex;
    align-items: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.contacts-kpi-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
}
.contacts-kpi-icon {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    margin-right: 1.15rem;
    flex-shrink: 0;
}

/* Contact List Item Card */
.contact-item-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    margin-bottom: 0.9rem;
    padding: 1.25rem 1.5rem;
    transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    border-left: 4px solid transparent;
}
.contact-item-card:hover {
    border-color: #cbd5e1;
    border-left-color: var(--clr-red);
    box-shadow: 0 8px 24px rgba(9, 2, 56, 0.07);
    transform: translateY(-2px);
}
.contact-avatar {
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: linear-gradient(135deg, #090238 0%, #1e293b 100%);
    color: #fff;
    font-weight: 700;
    font-size: 1.05rem;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    letter-spacing: 0.5px;
    box-shadow: 0 4px 10px rgba(9, 2, 56, 0.15);
}

.contact-message-preview {
    background: #f8fafc;
    border: 1px dashed #cbd5e1;
    border-radius: 8px;
    padding: 0.65rem 0.9rem;
    margin-top: 0.65rem;
    font-size: 0.9rem;
    color: #475569;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 0.75rem;
}
.contact-message-preview:hover {
    background: #f1f5f9;
    border-color: #94a3b8;
    color: #1e293b;
}
.contact-message-text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    flex: 1;
}

.read-modal-trigger {
    color: var(--clr-red);
    font-size: 0.82rem;
    font-weight: 600;
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
}
.read-modal-trigger:hover {
    color: var(--clr-red-hover);
    text-decoration: underline;
}

/* Modal Styling */
.modal-content-styled {
    border-radius: 16px;
    border: none;
    box-shadow: 0 25px 60px rgba(9, 2, 56, 0.35);
    overflow: hidden;
}
.modal-header-styled {
    background: linear-gradient(135deg, #090238 0%, #171b3e 100%);
    color: #fff;
    padding: 1.25rem 1.75rem;
    border-bottom: 2px solid var(--clr-red);
}
.modal-sender-box {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.15rem 1.35rem;
    margin-bottom: 1.25rem;
}
.modal-message-box {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 1.35rem 1.5rem;
    font-size: 0.95rem;
    line-height: 1.65;
    color: #1e293b;
    white-space: pre-wrap;
    word-break: break-word;
    max-height: 380px;
    overflow-y: auto;
}
.service-pill-box {
    background: rgba(236, 28, 36, 0.08);
    border: 1px solid rgba(236, 28, 36, 0.2);
    border-radius: 8px;
    padding: 0.65rem 1rem;
    margin-bottom: 1rem;
    color: #b81219;
    font-size: 0.88rem;
    font-weight: 600;
    display: flex;
    align-items: center;
}
</style>

<!-- Page Header & Summary KPIs -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-3">
    <div>
        <h4 class="fw-bold mb-1 text-dark">
            <i class="fa-solid fa-comments me-2" style="color:var(--clr-red);"></i>Customer Contact Messages
        </h4>
        <div class="text-muted small">
            Direct inquiries and messages submitted through website contact forms
        </div>
    </div>
    <div class="d-flex align-items-center gap-2">
        <button type="button" class="btn btn-outline-dark btn-sm d-flex align-items-center" onclick="window.location.reload();">
            <i class="fa-solid fa-arrows-rotate me-1"></i> Refresh
        </button>
    </div>
</div>

<!-- KPI Summary Cards Strip -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="contacts-kpi-card">
            <div class="contacts-kpi-icon" style="background: rgba(236, 28, 36, 0.1); color: var(--clr-red);">
                <i class="fa-solid fa-inbox"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Total Messages</div>
                <h3 class="fw-bold mb-0 mt-0 text-dark"><?= $total_count ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="contacts-kpi-card">
            <div class="contacts-kpi-icon" style="background: rgba(13, 110, 253, 0.1); color: #0d6efd;">
                <i class="fa-solid fa-calendar-day"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Received Today</div>
                <h3 class="fw-bold mb-0 mt-0 text-dark"><?= $today_count ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="contacts-kpi-card">
            <div class="contacts-kpi-icon" style="background: rgba(25, 135, 84, 0.1); color: #198754;">
                <i class="fa-solid fa-calendar-week"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Past 7 Days</div>
                <h3 class="fw-bold mb-0 mt-0 text-dark"><?= $week_count ?></h3>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="contacts-kpi-card">
            <div class="contacts-kpi-icon" style="background: rgba(111, 66, 193, 0.1); color: #6f42c1;">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <div class="text-muted small fw-semibold text-uppercase">Unique Senders</div>
                <h3 class="fw-bold mb-0 mt-0 text-dark"><?= $unique_sender_count ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- Controls Strip: Instant Search & Filter -->
<div class="card-modern mb-4 p-3">
    <div class="row g-2 align-items-center">
        <div class="col-12 col-md-6 col-lg-7">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 text-muted">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" id="contactSearchInput" class="form-control border-start-0 ps-0" placeholder="Search by sender name, email, subject, or message keyword...">
            </div>
        </div>
        <div class="col-6 col-md-3 col-lg-3">
            <select id="timeFilterSelect" class="form-select">
                <option value="all">All Time</option>
                <option value="today">Received Today</option>
                <option value="week">Past 7 Days</option>
                <option value="month">Past 30 Days</option>
            </select>
        </div>
        <div class="col-6 col-md-3 col-lg-2 text-end">
            <span class="text-muted small fw-semibold" id="contactCounter">
                Showing <?= $total_count ?> of <?= $total_count ?>
            </span>
        </div>
    </div>
</div>

<!-- Contacts List Container -->
<div id="contactsListContainer">
    <?php if (empty($contacts)): ?>
        <div class="card-modern p-5 text-center">
            <div class="mb-3 text-muted opacity-50" style="font-size: 3.5rem;">
                <i class="fa-solid fa-envelope-open"></i>
            </div>
            <h5 class="fw-bold text-dark mb-1">No Contact Messages Yet</h5>
            <p class="text-muted small mb-0">Messages submitted through the website contact page will appear here instantly.</p>
        </div>
    <?php else: ?>
        <?php foreach ($contacts as $c): 
            $initials = getInitials($c['name']);
            $raw_msg = trim($c['message']);
            
            // Extract Selected Services line if present
            $has_services = false;
            $services_text = '';
            $display_msg = $raw_msg;
            if (preg_match('/^Selected Services:\s*([^\n\r]+)/i', $raw_msg, $srvMatch)) {
                $has_services = true;
                $services_text = trim($srvMatch[1]);
                $display_msg = trim(preg_replace('/^Selected Services:\s*[^\n\r]+/i', '', $raw_msg));
            }

            // Shortened snippet
            $snippet = mb_strimwidth($display_msg, 0, 95, '...');
            $timestamp = strtotime($c['created_at']);
            $formatted_date = date('M j, Y • h:i A', $timestamp);
            $relative_time = formatRelativeTime($c['created_at']);
        ?>
            <div class="contact-item-card"
                 data-id="<?= (int)$c['id'] ?>"
                 data-name="<?= htmlspecialchars($c['name'], ENT_QUOTES) ?>"
                 data-email="<?= htmlspecialchars($c['email'], ENT_QUOTES) ?>"
                 data-phone="<?= htmlspecialchars($c['phone'] ?? '', ENT_QUOTES) ?>"
                 data-subject="<?= htmlspecialchars($c['subject'] ?? 'General Inquiry', ENT_QUOTES) ?>"
                 data-message="<?= htmlspecialchars($display_msg, ENT_QUOTES) ?>"
                 data-services="<?= htmlspecialchars($services_text, ENT_QUOTES) ?>"
                 data-ip="<?= htmlspecialchars($c['ip_address'] ?? 'N/A', ENT_QUOTES) ?>"
                 data-date="<?= htmlspecialchars($formatted_date, ENT_QUOTES) ?>"
                 data-timestamp="<?= $timestamp ?>"
                 data-search="<?= htmlspecialchars(strtolower($c['name'] . ' ' . $c['email'] . ' ' . ($c['subject'] ?? '') . ' ' . $raw_msg), ENT_QUOTES) ?>">
                
                <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                    
                    <!-- Left: Avatar + Sender Metadata -->
                    <div class="d-flex align-items-start gap-3 flex-grow-1" style="min-width: 0;">
                        <div class="contact-avatar">
                            <?= htmlspecialchars($initials) ?>
                        </div>
                        <div class="flex-grow-1" style="min-width: 0;">
                            <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                <span class="fw-bold text-dark fs-6"><?= htmlspecialchars($c['name']) ?></span>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-semibold">
                                    <i class="fa-solid fa-tag me-1 small"></i><?= htmlspecialchars($c['subject'] ?? 'General Inquiry') ?>
                                </span>
                                <?php if ($has_services): ?>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle small">
                                        <i class="fa-solid fa-bolt me-1"></i><?= htmlspecialchars($services_text) ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex flex-wrap align-items-center gap-3 small text-muted">
                                <a href="mailto:<?= htmlspecialchars($c['email']) ?>" class="text-decoration-none text-muted hover-underline" onclick="event.stopPropagation();">
                                    <i class="fa-regular fa-envelope me-1 text-danger"></i><?= htmlspecialchars($c['email']) ?>
                                </a>
                                <?php if (!empty($c['phone'])): ?>
                                    <a href="tel:<?= htmlspecialchars($c['phone']) ?>" class="text-decoration-none text-muted" onclick="event.stopPropagation();">
                                        <i class="fa-solid fa-phone me-1 text-success"></i><?= htmlspecialchars($c['phone']) ?>
                                    </a>
                                <?php endif; ?>
                                <span>
                                    <i class="fa-regular fa-clock me-1"></i><?= htmlspecialchars($formatted_date) ?> (<?= $relative_time ?>)
                                </span>
                                <?php if (!empty($c['ip_address'])): ?>
                                    <span class="d-none d-lg-inline text-muted opacity-75">
                                        <i class="fa-solid fa-globe me-1"></i>IP: <?= htmlspecialchars($c['ip_address']) ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Shortened Message Box (Clickable to trigger modal) -->
                            <div class="contact-message-preview" onclick="openContactModal(this.closest('.contact-item-card'))" title="Click to view full message">
                                <div class="contact-message-text">
                                    <i class="fa-solid fa-comment-dots me-2 text-danger opacity-75"></i>
                                    <span><?= htmlspecialchars($snippet) ?></span>
                                </div>
                                <span class="read-modal-trigger">
                                    View Full Message <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Quick Actions -->
                    <div class="d-flex align-items-center gap-2 flex-shrink-0 align-self-end align-self-md-center">
                        <button type="button" class="btn btn-sm btn-outline-dark d-flex align-items-center" onclick="openContactModal(this.closest('.contact-item-card'))" title="View Full Message Modal">
                            <i class="fa-solid fa-eye me-1"></i> <span class="d-none d-sm-inline">View</span>
                        </button>
                        
                        <a href="mailto:<?= htmlspecialchars($c['email']) ?>?subject=Re: <?= rawurlencode($c['subject'] ?? 'Filao Networks Inquiry') ?>" class="btn btn-sm btn-outline-primary d-flex align-items-center" title="Quick Reply via Email">
                            <i class="fa-solid fa-reply me-1"></i> <span class="d-none d-sm-inline">Reply</span>
                        </a>

                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="triggerDeleteContact(<?= (int)$c['id'] ?>, '<?= htmlspecialchars(addslashes($c['name'])) ?>')" title="Delete Message">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Empty Filter Notice (Hidden by default) -->
    <div id="noResultsNotice" class="card-modern p-5 text-center d-none">
        <div class="mb-3 text-muted opacity-50" style="font-size: 3rem;">
            <i class="fa-solid fa-filter-circle-xmark"></i>
        </div>
        <h5 class="fw-bold text-dark mb-1">No Matching Messages Found</h5>
        <p class="text-muted small mb-3">No messages match your active search or filter criteria.</p>
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="resetFilters()">
            <i class="fa-solid fa-xmark me-1"></i> Clear Filter
        </button>
    </div>
</div>

<!-- Hidden Deletion Form (Triggered via SweetAlert2 popup) -->
<form id="deleteContactForm" method="POST" action="contacts" style="display:none;">
    <input type="hidden" name="action" value="delete_contact">
    <input type="hidden" name="contact_id" id="deleteContactIdInput" value="">
</form>

<!-- Full Contact Message Modal -->
<div class="modal fade" id="contactDetailModal" tabindex="-1" aria-labelledby="contactDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-content-styled">
            <div class="modal-header modal-header-styled">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-envelope-open-text fs-4 me-2" style="color:var(--clr-red);"></i>
                    <div>
                        <h5 class="modal-title fw-bold mb-0 text-white" id="modalSubject">Subject</h5>
                        <div class="small text-white-50" id="modalDate">Received Date</div>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <!-- Sender Profile Details Strip -->
                <div class="modal-sender-box">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="contact-avatar" id="modalAvatar">
                                JD
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0" id="modalSenderName">Sender Name</h6>
                                <div class="small">
                                    <a href="#" id="modalEmailLink" class="text-decoration-none fw-semibold text-danger">
                                        <i class="fa-regular fa-envelope me-1"></i><span id="modalSenderEmail">email@example.com</span>
                                    </a>
                                    <button type="button" class="btn btn-link btn-sm p-0 ms-2 text-muted text-decoration-none" onclick="copyEmailToClipboard()" title="Copy email">
                                        <i class="fa-regular fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="text-sm-end small text-muted">
                            <div id="modalPhoneContainer" class="d-none mb-1">
                                <i class="fa-solid fa-phone me-1 text-success"></i><a href="#" id="modalPhoneLink" class="text-decoration-none text-muted">Phone</a>
                            </div>
                            <div id="modalIpAddress" class="badge bg-light text-muted border">
                                IP: 127.0.0.1
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selected Services Highlight (if applicable) -->
                <div id="modalServicesContainer" class="service-pill-box d-none">
                    <i class="fa-solid fa-bolt-lightning me-2 fs-5"></i>
                    <div>
                        <span class="text-muted fw-normal small d-block">Requested / Selected Service:</span>
                        <span id="modalServicesText" class="fw-bold fs-6">Service Name</span>
                    </div>
                </div>

                <!-- Complete Message Body -->
                <label class="form-label fw-bold text-dark small text-uppercase mb-2">
                    <i class="fa-regular fa-message me-1 text-danger"></i> Message Content
                </label>
                <div class="modal-message-box" id="modalMessageContent">
                    Message body goes here...
                </div>
            </div>

            <div class="modal-footer bg-light px-4 py-3 d-flex justify-content-between align-items-center">
                <!-- Left: Delete Button with JS Styled Popup -->
                <button type="button" class="btn btn-outline-danger btn-sm d-flex align-items-center" id="modalDeleteBtn">
                    <i class="fa-solid fa-trash-can me-1"></i> Delete Message
                </button>

                <!-- Right: Action Buttons -->
                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" onclick="copyMessageToClipboard()">
                        <i class="fa-regular fa-copy me-1"></i> Copy Content
                    </button>
                    <a href="#" id="modalReplyBtn" class="btn btn-filao btn-sm d-flex align-items-center">
                        <i class="fa-solid fa-reply me-1"></i> Reply via Email
                    </a>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Active message tracking for modal
let currentModalContactId = null;
let currentModalSenderName = '';
let currentModalEmail = '';
let currentModalMessage = '';

// Open Message Details Modal
function openContactModal(itemEl) {
    if (!itemEl) return;

    currentModalContactId = itemEl.getAttribute('data-id');
    currentModalSenderName = itemEl.getAttribute('data-name') || 'Customer';
    currentModalEmail = itemEl.getAttribute('data-email') || '';
    const phone = itemEl.getAttribute('data-phone') || '';
    const subject = itemEl.getAttribute('data-subject') || 'General Inquiry';
    currentModalMessage = itemEl.getAttribute('data-message') || '';
    const services = itemEl.getAttribute('data-services') || '';
    const ip = itemEl.getAttribute('data-ip') || 'N/A';
    const date = itemEl.getAttribute('data-date') || '';

    // Populate modal elements
    document.getElementById('modalSubject').textContent = subject;
    document.getElementById('modalDate').textContent = date;
    document.getElementById('modalSenderName').textContent = currentModalSenderName;
    document.getElementById('modalSenderEmail').textContent = currentModalEmail;
    document.getElementById('modalEmailLink').href = 'mailto:' + currentModalEmail;
    
    // Initials Avatar
    const avatarInitials = currentModalSenderName.split(/\s+/).map(p => p[0]).slice(0, 2).join('').toUpperCase() || 'C';
    document.getElementById('modalAvatar').textContent = avatarInitials;

    // Phone
    const phoneContainer = document.getElementById('modalPhoneContainer');
    const phoneLink = document.getElementById('modalPhoneLink');
    if (phone) {
        phoneContainer.classList.remove('d-none');
        phoneLink.textContent = phone;
        phoneLink.href = 'tel:' + phone;
    } else {
        phoneContainer.classList.add('d-none');
    }

    // IP
    document.getElementById('modalIpAddress').textContent = 'IP Address: ' + ip;

    // Services Pill
    const servicesBox = document.getElementById('modalServicesContainer');
    const servicesText = document.getElementById('modalServicesText');
    if (services) {
        servicesBox.classList.remove('d-none');
        servicesText.textContent = services;
    } else {
        servicesBox.classList.add('d-none');
    }

    // Message Content
    document.getElementById('modalMessageContent').textContent = currentModalMessage;

    // Reply Button
    const replySubject = encodeURIComponent('Re: ' + subject);
    document.getElementById('modalReplyBtn').href = `mailto:${encodeURIComponent(currentModalEmail)}?subject=${replySubject}`;

    // Modal Delete Button
    document.getElementById('modalDeleteBtn').onclick = function() {
        // Close Bootstrap modal first so SweetAlert2 backdrop is crystal clear
        const modalInstance = bootstrap.Modal.getInstance(document.getElementById('contactDetailModal'));
        if (modalInstance) modalInstance.hide();
        triggerDeleteContact(currentModalContactId, currentModalSenderName);
    };

    // Show Bootstrap Modal
    const modalEl = document.getElementById('contactDetailModal');
    const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
    bsModal.show();
}

// JS Styled Deletion Popup via SweetAlert2
function triggerDeleteContact(id, name) {
    if (!id) return;

    Swal.fire({
        title: 'Delete Message?',
        html: `Are you sure you want to permanently delete the contact message from <b>${escapeHtml(name)}</b>?<br><span class="small text-muted">This action cannot be undone.</span>`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ec1c24',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fa-solid fa-trash-can me-1"></i> Yes, Delete',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        focusCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.getElementById('deleteContactForm');
            document.getElementById('deleteContactIdInput').value = id;
            form.submit();
        }
    });
}

// Instant Live Search & Filter Logic
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('contactSearchInput');
    const timeFilter = document.getElementById('timeFilterSelect');
    const items = document.querySelectorAll('.contact-item-card');
    const counterEl = document.getElementById('contactCounter');
    const noResultsEl = document.getElementById('noResultsNotice');
    const totalItems = items.length;

    function applyFilters() {
        const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const timeVal = timeFilter ? timeFilter.value : 'all';
        const now = Math.floor(Date.now() / 1000);

        let visibleCount = 0;

        items.forEach(item => {
            const searchData = item.getAttribute('data-search') || '';
            const timestamp = parseInt(item.getAttribute('data-timestamp') || '0', 10);

            // Text search match
            const matchesText = !query || searchData.includes(query);

            // Time filter match
            let matchesTime = true;
            if (timeVal === 'today') {
                const startOfToday = new Date();
                startOfToday.setHours(0, 0, 0, 0);
                matchesTime = timestamp >= Math.floor(startOfToday.getTime() / 1000);
            } else if (timeVal === 'week') {
                matchesTime = (now - timestamp) <= (7 * 86400);
            } else if (timeVal === 'month') {
                matchesTime = (now - timestamp) <= (30 * 86400);
            }

            if (matchesText && matchesTime) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Update counter text
        if (counterEl) {
            counterEl.textContent = `Showing ${visibleCount} of ${totalItems}`;
        }

        // Toggle no results notice
        if (noResultsEl) {
            if (visibleCount === 0 && totalItems > 0) {
                noResultsEl.classList.remove('d-none');
            } else {
                noResultsEl.classList.add('d-none');
            }
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }
    if (timeFilter) {
        timeFilter.addEventListener('change', applyFilters);
    }
});

function resetFilters() {
    const searchInput = document.getElementById('contactSearchInput');
    const timeFilter = document.getElementById('timeFilterSelect');
    if (searchInput) searchInput.value = '';
    if (timeFilter) timeFilter.value = 'all';
    
    document.querySelectorAll('.contact-item-card').forEach(item => {
        item.style.display = '';
    });
    const noResultsEl = document.getElementById('noResultsNotice');
    if (noResultsEl) noResultsEl.classList.add('d-none');
    
    const totalItems = document.querySelectorAll('.contact-item-card').length;
    const counterEl = document.getElementById('contactCounter');
    if (counterEl) counterEl.textContent = `Showing ${totalItems} of ${totalItems}`;
}

// Copy Utilities with Toast Notifications
function copyEmailToClipboard() {
    if (!currentModalEmail) return;
    navigator.clipboard.writeText(currentModalEmail).then(() => {
        filaoToast('success', 'Email copied to clipboard: ' + currentModalEmail);
    }).catch(() => {
        filaoToast('info', 'Email: ' + currentModalEmail);
    });
}

function copyMessageToClipboard() {
    if (!currentModalMessage) return;
    navigator.clipboard.writeText(currentModalMessage).then(() => {
        filaoToast('success', 'Message content copied to clipboard.');
    }).catch(() => {
        filaoToast('error', 'Unable to copy message text.');
    });
}

// Helper to sanitize HTML strings for SweetAlert
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
