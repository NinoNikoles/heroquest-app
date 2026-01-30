function showToast(message, type) {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');

    // Styling basierend auf Erfolg oder Fehler
    const bgColor = type === 'success' ? 'bg-green-600' : 'bg-red-600';

    toast.className = `box border border-${type} rounded bg-01dp`;
    toast.innerHTML = `
        <span>${type === 'success' ? '💰' : '⚠️'}</span>
        <span>${message}</span>
    `;

    container.appendChild(toast);

    // Animation: Rein-sliden
    setTimeout(() => {
        container.classList.remove('opacity-0', 'translate-x-10');
    }, 10);

    // Nach 3 Sekunden verschwinden
    setTimeout(() => {
        container.classList.add('opacity-0', 'translate-x-10');
        setTimeout(() => toast.remove(), 500);
    }, 3000);
}
const dropdown = document.getElementById('searchDropdown');

if (dropdown) {
    document.addEventListener('click', function(event) {
        const searchInput = document.getElementById('itemSearch');

        if (!dropdown.contains(event.target) && event.target !== searchInput) {
            dropdown.classList.add('hidden');
        }
    });
}
