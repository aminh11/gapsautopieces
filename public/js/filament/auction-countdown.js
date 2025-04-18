document.addEventListener('DOMContentLoaded', function () {
    // Initialize the main countdown timer on the auction detail page
    initMainCountdown();

    // Initialize all small countdown timers on the auctions list page
    initSmallCountdowns();

    // Initialize home page countdown timers
    initHomeCountdowns();

    // Update all countdowns every second
    setInterval(function () {
        updateMainCountdown();
        updateSmallCountdowns();
        updateHomeCountdowns();
    }, 1000);
});

function initMainCountdown() {
    const countdownElement = document.getElementById('countdown-timer');
    if (!countdownElement) return;

    updateMainCountdown();
}

function updateMainCountdown() {
    const countdownElement = document.getElementById('countdown-timer');
    if (!countdownElement) return;

    const endTime = parseInt(countdownElement.dataset.end) * 1000; // Convert to milliseconds
    const now = new Date().getTime();
    const timeLeft = endTime - now;

    if (timeLeft <= 0) {
        // Auction has ended
        document.getElementById('days').textContent = '0';
        document.getElementById('hours').textContent = '0';
        document.getElementById('minutes').textContent = '0';
        document.getElementById('seconds').textContent = '0';

        // Reload the page to show the auction as ended
        setTimeout(() => {
            window.location.reload();
        }, 2000);

        return;
    }

    // Calculate time units
    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

    // Update the countdown display
    document.getElementById('days').textContent = days;
    document.getElementById('hours').textContent = hours;
    document.getElementById('minutes').textContent = minutes;
    document.getElementById('seconds').textContent = seconds;
}

function initSmallCountdowns() {
    const countdownElements = document.querySelectorAll('.countdown-small');
    if (countdownElements.length === 0) return;

    updateSmallCountdowns();
}

function updateSmallCountdowns() {
    const countdownElements = document.querySelectorAll('.countdown-small');
    if (countdownElements.length === 0) return;

    countdownElements.forEach(function (element) {
        const endTime = parseInt(element.dataset.end) * 1000; // Convert to milliseconds
        const now = new Date().getTime();
        const timeLeft = endTime - now;

        if (timeLeft <= 0) {
            // Auction has ended
            element.querySelectorAll('.days').forEach(el => el.textContent = '0');
            element.querySelectorAll('.hours').forEach(el => el.textContent = '0');
            element.querySelectorAll('.minutes').forEach(el => el.textContent = '0');
            element.querySelectorAll('.seconds').forEach(el => el.textContent = '0');
            return;
        }

        // Calculate time units
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

        // Update the countdown display
        element.querySelectorAll('.days').forEach(el => el.textContent = days);
        element.querySelectorAll('.hours').forEach(el => el.textContent = hours);
        element.querySelectorAll('.minutes').forEach(el => el.textContent = minutes);
        element.querySelectorAll('.seconds').forEach(el => el.textContent = seconds);
    });
}

function initHomeCountdowns() {
    const countdownElements = document.querySelectorAll('.countdown-home');
    if (countdownElements.length === 0) return;

    updateHomeCountdowns();
}

function updateHomeCountdowns() {
    const countdownElements = document.querySelectorAll('.countdown-home');
    if (countdownElements.length === 0) return;

    countdownElements.forEach(function (element) {
        const endTime = parseInt(element.dataset.end) * 1000; // Convert to milliseconds
        const now = new Date().getTime();
        const timeLeft = endTime - now;

        if (timeLeft <= 0) {
            // Auction has ended
            element.innerHTML = '<span class="font-bold">Terminé</span>';
            return;
        }

        // Calculate time units
        const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
        const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));

        // Update the countdown display - home page only shows days, hours, minutes
        element.querySelector('.days').textContent = days;
        element.querySelector('.hours').textContent = hours;
        element.querySelector('.minutes').textContent = minutes;
    });
}