// Mobile menu
const menuToggle = document.querySelector('[data-menu-toggle]');
const nav = document.getElementById('site-nav');

const setMenu = (open) => {
	menuToggle.setAttribute('aria-expanded', String(open));
	nav.classList.toggle('is-open', open);
};

menuToggle?.addEventListener('click', () => {
	setMenu(menuToggle.getAttribute('aria-expanded') !== 'true');
});

nav?.querySelectorAll('a').forEach((link) => {
	link.addEventListener('click', () => setMenu(false));
});

document.addEventListener('keydown', (event) => {
	if (event.key === 'Escape' && nav?.classList.contains('is-open')) {
		setMenu(false);
		menuToggle.focus();
	}
});


// Header border once the page is scrolled
const header = document.querySelector('[data-header]');
const updateHeader = () => header?.classList.toggle('is-scrolled', window.scrollY > 8);
updateHeader();
window.addEventListener('scroll', updateHeader, { passive: true });


// Reveal sections as they enter the viewport
const revealed = document.querySelectorAll('.reveal');

if ('IntersectionObserver' in window) {
	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
				entry.target.classList.add('is-visible');
				observer.unobserve(entry.target);
			}
		});
	}, { rootMargin: '0px 0px -8% 0px' });

	revealed.forEach((element) => observer.observe(element));
} else {
	revealed.forEach((element) => element.classList.add('is-visible'));
}


// Copy e-mail to clipboard
document.querySelectorAll('[data-copy]').forEach((button) => {
	const label = button.querySelector('[data-copy-label]');
	const original = label.textContent;

	button.addEventListener('click', async () => {
		try {
			await navigator.clipboard.writeText(button.dataset.copy);
			label.textContent = 'Zkopírováno ✓';
		} catch {
			label.textContent = 'Nelze kopírovat';
		}
		button.classList.add('is-done');
		setTimeout(() => {
			label.textContent = original;
			button.classList.remove('is-done');
		}, 2000);
	});
});
