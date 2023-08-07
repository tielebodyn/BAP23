import search from "./search";

const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebar-toggle");
const dropdownButton = document.querySelector(".js-dropdown-button");
const dropdown = document.querySelector(".js-dropdown-menu");
const dropdownWrapper = document.querySelector(".js-dropdown-wrapper");
const groupInputElement = document.querySelector(".js-group-input");
const groupListElement = document.querySelector(".js-group-list");

groupInputElement.addEventListener("input", () => {
    search(groupInputElement, groupListElement, { showOnEmpty: true });
});

sidebarToggle.addEventListener("click", function (e) {
    sidebar.classList.toggle("-translate-x-full");
    // on mousclick outside of sidebar
    document.addEventListener("click", function (e) {
        const target = e.target;
        if (sidebar.classList.contains("-translate-x-full")) {
            return;
        }
        if (sidebarToggle.contains(target)) {
            return;
        }
        if (sidebar.contains(target)) {
            return;
        }
        sidebar.classList.add("-translate-x-full");
    });
});

dropdownButton.addEventListener("click", function (e) {
    dropdown.classList.toggle("hidden");
});
document.addEventListener("click", function (e) {
    if (!dropdownWrapper.contains(e.target)) {
        dropdown.classList.add("hidden");
    }
});
