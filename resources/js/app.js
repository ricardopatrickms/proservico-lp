/* Comportamentos da landing: header, menu mobile, abas e reveal on scroll. */

const onReady = (fn) =>
    document.readyState === 'loading'
        ? document.addEventListener('DOMContentLoaded', fn, { once: true })
        : fn();

onReady(() => {
    initHeader();
    initMobileNav();
    initTabs();
    initReveal();
    initYear();
});

/** Header ganha fundo sólido assim que a página sai do topo. */
function initHeader() {
    const header = document.querySelector('[data-header]');
    if (!header) return;

    const sync = () => header.classList.toggle('is-scrolled', window.scrollY > 12);

    sync();
    window.addEventListener('scroll', sync, { passive: true });
}

function initMobileNav() {
    const toggle = document.querySelector('[data-nav-toggle]');
    const panel = document.querySelector('[data-nav-panel]');
    if (!toggle || !panel) return;

    const setOpen = (open) => {
        panel.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('overflow-hidden', open);
    };

    toggle.addEventListener('click', () => setOpen(panel.classList.contains('hidden')));
    panel.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', (event) => event.key === 'Escape' && setOpen(false));
}

/** Abas "Para clientes / Para profissionais" do bloco Como funciona. */
function initTabs() {
    document.querySelectorAll('[data-tabs]').forEach((group) => {
        const tabs = [...group.querySelectorAll('[data-tab]')];
        const panels = [...group.querySelectorAll('[data-panel]')];

        const activate = (name) => {
            tabs.forEach((tab) => {
                const active = tab.dataset.tab === name;
                tab.setAttribute('aria-selected', String(active));
                tab.tabIndex = active ? 0 : -1;
            });
            panels.forEach((panel) => panel.classList.toggle('hidden', panel.dataset.panel !== name));
        };

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => activate(tab.dataset.tab));
            tab.addEventListener('keydown', (event) => {
                const step = event.key === 'ArrowRight' ? 1 : event.key === 'ArrowLeft' ? -1 : 0;
                if (!step) return;
                event.preventDefault();
                const next = tabs[(index + step + tabs.length) % tabs.length];
                next.focus();
                activate(next.dataset.tab);
            });
        });
    });
}

function initReveal() {
    const targets = document.querySelectorAll('[data-reveal]');
    if (!targets.length) return;

    if (!('IntersectionObserver' in window)) {
        targets.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        },
        { rootMargin: '0px 0px -10% 0px', threshold: 0.1 },
    );

    targets.forEach((el) => observer.observe(el));
}

function initYear() {
    document.querySelectorAll('[data-year]').forEach((el) => {
        el.textContent = String(new Date().getFullYear());
    });
}
