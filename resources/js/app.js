// The Download | Watch switch in the window mock. It flips on its own until someone uses it
// (and not while the pointer is over the window, or with reduced motion).
for (const mock of document.querySelectorAll('[data-app-tabs]')) {
    const tabs = [...mock.querySelectorAll('[role=tab]')];
    let current = 0;

    const show = (index) => {
        current = index;
        const name = tabs[index].dataset.tab;
        tabs.forEach((tab, i) => tab.setAttribute('aria-selected', i === index));
        mock.querySelectorAll('[data-panel]').forEach((panel) => panel.toggleAttribute('data-active', panel.dataset.panel === name));
    };

    const timer = matchMedia('(prefers-reduced-motion: reduce)').matches
        ? null
        : setInterval(() => mock.matches(':hover') || show((current + 1) % tabs.length), 6000);

    tabs.forEach((tab, i) => tab.addEventListener('click', () => {
        clearInterval(timer);
        show(i);
    }));
}
