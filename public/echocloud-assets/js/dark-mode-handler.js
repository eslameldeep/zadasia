const themeSwitch = document.getElementById("theme-switch");
const themeIndicator = document.getElementById("theme-indicator");
const page = document.body;

const themeStates = ["light", "dark"];
const indicators = ["fa-moon", "fa-sun"];
const pageClass = ["bg-gray-100", "dark-page"];

let currentTheme = localStorage.getItem("theme");

function setTheme(theme) {
    localStorage.setItem("theme", themeStates[theme]);
    currentTheme = themeStates[theme];
}

function setIndicator(theme) {
    themeIndicator.classList.remove(indicators[0]);
    themeIndicator.classList.remove(indicators[1]);
    themeIndicator.classList.add(indicators[theme]);
}

function setPage(theme) {
    page.classList.remove(pageClass[0]);
    page.classList.remove(pageClass[1]);
    page.classList.add(pageClass[theme]);
}

function initializeTheme() {
    if (currentTheme === null) {
        // Use generalTheme from the server if no theme is set in local storage
        if (generalTheme) {
            setTheme(1); // Dark mode
            setIndicator(1);
            setPage(1);
            themeSwitch.checked = false;
        } else {
            setTheme(0); // Light mode
            setIndicator(0);
            setPage(0);
            themeSwitch.checked = true;
        }
    } else if (currentTheme === themeStates[0]) {
        setIndicator(0);
        setPage(0);
        themeSwitch.checked = true;
    } else if (currentTheme === themeStates[1]) {
        setIndicator(1);
        setPage(1);
        themeSwitch.checked = false;
    }
}

function toggleThemeApi() {
    const fetchCfg = {
        headers: {
            'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
            'Content-Type': 'application/json'
        },
        method: 'POST',
        body: JSON.stringify({ theme: currentTheme })
    };
    fetch(document.head.querySelector('meta[name="change-theme-api"]').content, fetchCfg)
        .catch((error) => {
            console.log('Failed to notify server that theme was toggled', error);
        });
}

themeSwitch.addEventListener('change', function () {
    if (this.checked) {
        setTheme(0);
        setIndicator(0);
        setPage(0);
    } else {
        setTheme(1);
        setIndicator(1);
        setPage(1);
    }
    toggleThemeApi();
});

// Initialize theme on page load
initializeTheme();
