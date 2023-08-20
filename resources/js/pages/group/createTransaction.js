import search from "../../components/search";
const recieverInput = document.querySelector(".js-search-input");
const recieverList = document.querySelector(".js-search-results");
const wrapper = document.querySelector(".js-searchbar-wrapper");
const recieverItems = recieverList.querySelectorAll("li");

recieverInput.addEventListener("input", () => {
    search(recieverInput, recieverList, { showOnEmpty: true });
});
document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target)) {
        wrapper.querySelector(".js-search-results").classList.add("hidden");
    }
});
recieverItems.forEach((item) => {
    item.addEventListener("click", () => {
        recieverInput.value = item.textContent;
        wrapper.querySelector(".js-search-results").classList.add("hidden");
    });
});
