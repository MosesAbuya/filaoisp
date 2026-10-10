/**
 * Filao Networks Solutions   Main JavaScript
 * Phase 1: Foundation interactions, animations, navbar
 */

'use strict';

/* =====================================================================
   1. PAGE LOADER (Removed per user request for instant display)
   ===================================================================== */

/* =====================================================================
   2. NAVBAR   SCROLL BEHAVIOR
   ===================================================================== */
const navbar = document.getElementById('main-navbar');

function handleNavbarScroll() {
    if (!navbar) return;
    const scrolled = window.scrollY > 60;
    navbar.classList.toggle('scrolled', scrolled);
}

window.addEventListener('scroll', handleNavbarScroll, { passive: true });
handleNavbarScroll(); // Run on init

/* =====================================================================
   3. MOBILE MENU
   ===================================================================== */
window.FilaoNav = {
    open: function() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('mobile-overlay');
        const toggler = document.getElementById('mobile-toggler');
        if (menu) menu.classList.add('open');
        if (overlay) overlay.classList.add('open');
        if (toggler) toggler.classList.add('open');
        document.body.style.overflow = 'hidden';
    },
    close: function() {
        const menu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('mobile-overlay');
        const toggler = document.getElementById('mobile-toggler');
        if (menu) menu.classList.remove('open');
        if (overlay) overlay.classList.remove('open');
        if (toggler) toggler.classList.remove('open');
        document.body.style.overflow = '';
    },
    toggle: function() {
        const menu = document.getElementById('mobile-menu');
        if (menu && menu.classList.contains('open')) {
            this.close();
        } else {
            this.open();
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const mobileToggler  = document.getElementById('mobile-toggler');
    const mobileClose    = document.getElementById('mobile-close');
    const mobileOverlay  = document.getElementById('mobile-overlay');

    if (mobileToggler) {
        mobileToggler.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            window.FilaoNav.toggle();
        });
    }

    if (mobileClose) {
        mobileClose.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            window.FilaoNav.close();
        });
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            window.FilaoNav.close();
        });
    }

    // Mobile sub-menu toggles
    document.querySelectorAll('.mobile-nav-link[data-toggle]').forEach(link => {
        link.addEventListener('click', (e) => {
            const target = document.getElementById(link.dataset.toggle);
            if (!target) return;
            const isOpen = target.classList.contains('open');
            // Close all open sub-menus
            document.querySelectorAll('.mobile-sub-menu.open').forEach(m => m.classList.remove('open'));
            document.querySelectorAll('.mobile-nav-link .chevron.rotate').forEach(c => c.classList.remove('rotate'));
            if (!isOpen) {
                target.classList.add('open');
                link.querySelector('.chevron')?.classList.add('rotate');
            }
        });
    });
});

// Close mobile menu on Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeMobileMenu();
        closeAllMegaMenus();
    }
});

/* =====================================================================
   3b. DESKTOP MEGA MENUS   CLICK TRIGGERED
   ===================================================================== */

// Inject backdrop div into body
const megaBackdrop = document.createElement('div');
megaBackdrop.id = 'mega-backdrop';
document.body.appendChild(megaBackdrop);

function closeAllMegaMenus() {
    document.querySelectorAll('.mega-menu.open').forEach(m => m.classList.remove('open'));
    document.querySelectorAll('.nav-links > li.mega-open').forEach(li => li.classList.remove('mega-open'));
    megaBackdrop.classList.remove('active');
    document.body.style.overflow = '';
}

// Inject a close (×) button into every mega menu panel
document.querySelectorAll('.mega-menu').forEach(panel => {
    const closeBtn = document.createElement('button');
    closeBtn.className = 'mega-menu-close';
    closeBtn.setAttribute('aria-label', 'Close menu');
    closeBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
    closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        closeAllMegaMenus();
    });
    panel.appendChild(closeBtn);
});

// Toggle mega menu on nav link click
document.querySelectorAll('.nav-links > li > a[aria-haspopup="true"]').forEach(trigger => {
    trigger.addEventListener('click', (e) => {
        e.preventDefault();
        const parentLi = trigger.closest('li');
        const panel    = parentLi.querySelector('.mega-menu');
        if (!panel) return;

        const isAlreadyOpen = panel.classList.contains('open');
        closeAllMegaMenus();

        if (!isAlreadyOpen) {
            panel.classList.add('open');
            parentLi.classList.add('mega-open');
            megaBackdrop.classList.add('active');
        }
    });
});

// Close when clicking the backdrop
megaBackdrop.addEventListener('click', closeAllMegaMenus);

// Allow nav links WITHOUT mega menus to navigate normally
document.querySelectorAll('.nav-links > li > a:not([aria-haspopup="true"])').forEach(link => {
    link.addEventListener('click', closeAllMegaMenus);
});


/* =====================================================================
   4. SCROLL REVEAL ANIMATIONS
   ===================================================================== */
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            // Unobserve after animation (performance)
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

document.querySelectorAll('.reveal, .reveal-left, .reveal-right').forEach(el => {
    revealObserver.observe(el);
});

/* =====================================================================
   5. ANIMATED COUNTERS
   ===================================================================== */
function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const suffix = el.dataset.suffix || '';
    const prefix = el.dataset.prefix || '';
    const duration = parseInt(el.dataset.duration || 2000, 10);
    const startTime = performance.now();

    function easeOutQuart(t) {
        return 1 - Math.pow(1 - t, 4);
    }

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const value = Math.round(easeOutQuart(progress) * target);
        el.textContent = prefix + value.toLocaleString() + suffix;
        if (progress < 1) requestAnimationFrame(update);
    }

    requestAnimationFrame(update);
}

const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.counted) {
            entry.target.dataset.counted = 'true';
            animateCounter(entry.target);
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('[data-counter]').forEach(el => {
    counterObserver.observe(el);
});

/* =====================================================================
   6. BACK TO TOP BUTTON
   ===================================================================== */
const backToTop = document.getElementById('back-to-top');

window.addEventListener('scroll', () => {
    backToTop?.classList.toggle('visible', window.scrollY > 400);
}, { passive: true });

backToTop?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* =====================================================================
   7. SMOOTH SCROLL FOR ANCHOR LINKS
   ===================================================================== */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
        const target = document.querySelector(anchor.getAttribute('href'));
        if (target) {
            e.preventDefault();
            const offset = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--navbar-h')) || 80;
            const top = target.getBoundingClientRect().top + window.scrollY - offset;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    });
});

/* =====================================================================
   8. TESTIMONIAL SLIDER (manual)
   ===================================================================== */
class SimpleSlider {
    constructor(el) {
        this.container = el;
        this.track     = el.querySelector('.slider-track');
        this.slides    = el.querySelectorAll('.slider-slide');
        this.prevBtn   = el.querySelector('.slider-prev');
        this.nextBtn   = el.querySelector('.slider-next');
        this.dotsWrap  = el.querySelector('.slider-dots');
        this.current   = 0;
        this.total     = this.slides.length;
        this.autoplay  = null;
        this.isPlaying = true;

        if (!this.track || this.total === 0) return;

        this.createDots();
        this.update();
        this.bind();
        this.startAutoplay();
    }

    createDots() {
        if (!this.dotsWrap) return;
        for (let i = 0; i < this.total; i++) {
            const dot = document.createElement('button');
            dot.className = 'slider-dot';
            dot.setAttribute('aria-label', `Slide ${i + 1}`);
            dot.addEventListener('click', () => { this.goto(i); this.resetAutoplay(); });
            this.dotsWrap.appendChild(dot);
        }
    }

    update() {
        const offset = -(this.current * 100);
        this.track.style.transform = `translateX(${offset}%)`;
        this.dotsWrap?.querySelectorAll('.slider-dot').forEach((dot, i) => {
            dot.classList.toggle('active', i === this.current);
        });
    }

    goto(n) {
        this.current = (n + this.total) % this.total;
        this.update();
    }

    bind() {
        this.prevBtn?.addEventListener('click', () => { this.goto(this.current - 1); this.resetAutoplay(); });
        this.nextBtn?.addEventListener('click', () => { this.goto(this.current + 1); this.resetAutoplay(); });

        // Touch/swipe support
        let startX = 0;
        this.container.addEventListener('touchstart', e => { startX = e.touches[0].clientX; }, { passive: true });
        this.container.addEventListener('touchend', e => {
            const diff = startX - e.changedTouches[0].clientX;
            if (Math.abs(diff) > 40) {
                this.goto(this.current + (diff > 0 ? 1 : -1));
                this.resetAutoplay();
            }
        }, { passive: true });
    }

    startAutoplay() {
        this.autoplay = setInterval(() => this.goto(this.current + 1), 5000);
    }

    resetAutoplay() {
        clearInterval(this.autoplay);
        this.startAutoplay();
    }
}

document.querySelectorAll('[data-slider]').forEach(el => new SimpleSlider(el));

/* =====================================================================
   9. STICKY ACTIVE NAV HIGHLIGHT
   ===================================================================== */
const sections = document.querySelectorAll('section[id]');

function updateActiveNav() {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        if (window.scrollY >= sectionTop) current = section.id;
    });
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href')?.includes(current) && current) {
            link.classList.add('active');
        }
    });
}

window.addEventListener('scroll', updateActiveNav, { passive: true });

/* =====================================================================
   10. TICKER DUPLICATE FOR SEAMLESS LOOP
   ===================================================================== */
document.querySelectorAll('.ticker-track').forEach(track => {
    // Clone content for seamless infinite scroll
    const clone = track.innerHTML;
    track.innerHTML += clone;
});

document.querySelectorAll('.partners-track').forEach(track => {
    const clone = track.innerHTML;
    track.innerHTML += clone;
});

/* =====================================================================
   11. COOKIE NOTICE
   ===================================================================== */
const cookieBanner = document.getElementById('cookie-banner');
const cookieAccept = document.getElementById('cookie-accept');
const cookieDecline = document.getElementById('cookie-decline');

function checkCookie() {
    if (cookieBanner && !localStorage.getItem('filao_cookies_accepted') && !localStorage.getItem('filao_cookie_consent')) {
        setTimeout(() => { cookieBanner.style.transform = 'translateY(0)'; }, 1500);
    }
}

cookieAccept?.addEventListener('click', () => {
    localStorage.setItem('filao_cookies_accepted', 'true');
    localStorage.setItem('filao_cookie_consent', 'accepted');
    cookieBanner.style.transform = 'translateY(120%)';
});

cookieDecline?.addEventListener('click', () => {
    localStorage.setItem('filao_cookies_accepted', 'false');
    localStorage.setItem('filao_cookie_consent', 'declined');
    cookieBanner.style.transform = 'translateY(120%)';
});

checkCookie();

/* =====================================================================
   12. IMAGE LAZY LOADING (native + fallback)
   ===================================================================== */
if ('loading' in HTMLImageElement.prototype) {
    document.querySelectorAll('img[loading="lazy"]').forEach(img => {
        if (img.dataset.src) img.src = img.dataset.src;
    });
} else {
    // Fallback for older browsers
    const lazyImageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                lazyImageObserver.unobserve(img);
            }
        });
    });
    document.querySelectorAll('img[data-src]').forEach(img => lazyImageObserver.observe(img));
}

/* =====================================================================
   13. PARALLAX (subtle, hero only)
   ===================================================================== */
const heroBg = document.querySelector('.hero-bg');
if (heroBg) {
    window.addEventListener('scroll', () => {
        const scrolled = window.scrollY;
        if (scrolled < window.innerHeight) {
            heroBg.style.transform = `scale(1.05) translateY(${scrolled * 0.15}px)`;
        }
    }, { passive: true });
}

/* =====================================================================
   14. FORM VALIDATION (quote/contact forms)
   ===================================================================== */
document.querySelectorAll('form[data-validate]').forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        let valid = true;
        form.querySelectorAll('[required]').forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('error');
                valid = false;
            } else {
                field.classList.remove('error');
            }
        });
        if (valid) {
            const btn = form.querySelector('[type="submit"]');
            const originalText = btn ? btn.innerHTML : '';
            const actionUrl = form.getAttribute('action') || '';
            const msgDivId = form.id === 'contact-form' ? 'contact-form-message' : 
                             (form.id === 'newsletter-form' ? 'newsletter-message' : 
                             (form.id === 'quote-form' ? 'quote-form-message' : null));
            const msgDiv = msgDivId ? document.getElementById(msgDivId) : null;
            
            if (btn) {
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i>';
                btn.disabled = true;
            }

            const formData = new FormData(form);
            const dataObj = {};
            formData.forEach((value, key) => { dataObj[key] = value; });

            fetch(actionUrl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(dataObj)
            })
            .then(res => res.json())
            .then(data => {
                if (btn) {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
                if (msgDiv) {
                    msgDiv.style.display = 'block';
                    msgDiv.style.color = data.status === 'success' ? '#10b981' : '#ec1c24';
                    msgDiv.textContent = data.message || (data.status === 'success' ? 'Success!' : 'Error occurred.');
                }
                if (data.status === 'success') {
                    form.reset();
                    setTimeout(() => {
                        if (msgDiv) msgDiv.style.display = 'none';
                    }, 5000);
                }
            })
            .catch(err => {
                if (btn) {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                }
                if (msgDiv) {
                    msgDiv.style.display = 'block';
                    msgDiv.style.color = '#ec1c24';
                    msgDiv.textContent = 'A network error occurred. Please try again.';
                }
            });
        }
    });

    form.querySelectorAll('[required]').forEach(field => {
        field.addEventListener('input', () => field.classList.remove('error'));
    });
});

console.log('%cFilao Networks Solutions', 'color:#ec1c24;font-size:1.5rem;font-weight:bold;font-style:italic;');
console.log('%cBuilt with precision. Delivered with speed.', 'color:#8b8ba8;font-size:0.85rem;');

/* =====================================================================
   THEME TOGGLE LOGIC (LIGHT / DARK MODE)
   ===================================================================== */
document.addEventListener('DOMContentLoaded', () => {
    const themeToggles = document.querySelectorAll('.theme-toggle');
    if (!themeToggles.length) return;

    // Function to update icons on all toggle buttons based on current theme
    const updateIcons = () => {
        const isLight = document.body.classList.contains('light-mode');
        themeToggles.forEach(btn => {
            const icon = btn.querySelector('i');
            if (!icon) return;
            if (isLight) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });
    };

    // Initialize icon on load
    updateIcons();

    // Attach click event to all theme toggle buttons
    themeToggles.forEach(btn => {
        btn.addEventListener('click', () => {
            document.body.classList.toggle('light-mode');
            updateIcons();

            // Save preference
            if (document.body.classList.contains('light-mode')) {
                localStorage.setItem('filao_theme', 'light');
            } else {
                localStorage.removeItem('filao_theme');
            }
        });
    });
});
