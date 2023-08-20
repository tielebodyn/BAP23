import search from '../../components/search.js';
const tagInput = document.querySelector('.js-tag-input');
const tagList = document.querySelector('.js-tag-list');
const wrapper = document.querySelector('.js-searchbar-wrapper');


tagInput.addEventListener('input', () => {
search(tagInput, tagList, { showOnEmpty: true })
});
document.addEventListener("click", (e) => {
    if (!wrapper.contains(e.target)) {
        wrapper.querySelector(".js-tag-list").classList.add("hidden");
    }
});

