
const search = (input, target, { showOnEmpty = false }) => {
    if (!showOnEmpty && input.value.length == 0) {
        target.classList.add("hidden");
    } else {
        target.classList.remove("hidden");
    }
    const inputValue = input.value.toUpperCase();
    console.log(inputValue);
    const listItems = target.querySelectorAll("li");

    listItems.forEach((item) => {
        const tagValue = item.innerText;
        if (tagValue.toUpperCase().indexOf(inputValue) > -1) {
            item.classList.remove("hidden");
        } else {
            item.classList.add("hidden");
        }
    });
};

export default search;
