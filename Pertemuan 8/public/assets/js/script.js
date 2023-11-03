const body = document.querySelector("body"),
    section = body.querySelector(".section"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

const html = document.querySelector("html");

// Memeriksa apakah preferensi mode gelap tersimpan di localStorage
const isDarkMode = localStorage.getItem("darkMode") === "true";
const isOpen = localStorage.getItem("closeMode") === "true";

// Fungsi untuk mengaktifkan atau menonaktifkan mode gelap
function toggleDarkMode() {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Light Mode";
        localStorage.setItem("darkMode", "true"); // Simpan preferensi mode gelap
    } else {
        modeText.innerText = "Dark Mode";
        localStorage.setItem("darkMode", "false"); // Simpan preferensi mode terang
    }
}

function toggleSidebar() {
    sidebar.classList.toggle("close");

    if (sidebar.classList.contains("close")) {
        localStorage.setItem("closeMode", "true");
    } else {
        localStorage.setItem("closeMode", "false");
    }
}


// Inisialisasi mode gelap berdasarkan preferensi yang tersimpan
if (isDarkMode) {
    body.classList.add("dark");
    modeText.innerText = "Light Mode";
} else {
    body.classList.remove("dark");
    modeText.innerText = "Dark Mode";
}

if (isOpen) {
    sidebar.classList.add("close");
} else {
    sidebar.classList.remove("close");
}

html.addEventListener("click", (event) => {
    if (!sidebar.contains(event.target)) {
        if (!sidebar.classList.contains("close")) {
            sidebar.classList.add("close");
        } 
    }
});

toggle.addEventListener("click", () => {
    toggleSidebar();
});

modeSwitch.addEventListener("click", () => {
    toggleDarkMode();
});

