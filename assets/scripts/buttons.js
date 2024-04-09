const modal = document.querySelector(".filters");

const navMenu = {
    btn: document.querySelector("#menu"),
    menu: document.querySelector(".navigation"),
    textWhenOpened: "Close menu",
    textWhenClosed: "Open menu",
    click() { return toggleMenu(this) },
};

export const filterBtn = {
    btn: document.querySelector("#filter"),
    menu: document.querySelector(".filters"),
    textWhenOpened: "Close filter",
    textWhenClosed: "Filter",
    click() { return manageMenu(this) },
};

const closeFilterBtn = {
    btn: document.querySelector("#close"),
    click() { return toggleMenu(filterBtn, true) },
}

const clearFiltersBtn = {
    btn: document.querySelector("#clear"),
    click() { return clearInputs },
}

const sortMenu = {
    btn: document.querySelector("#sort"),
    menu: document.querySelector("#sort-menu"),
    options: [...document.querySelectorAll("#sort-menu li")],
    index: 0,
    increaseIndex() { return this.index++ },
    decreaseIndex() { return this.index-- },
    click() { return manageMenu(this) },
    events: [{
        target: document.querySelector(".sort"),
        type: "keydown",
        handler() { return (event) => handleKeysMenuBox(sortMenu, event) }
    },
    {
        target: document,
        type: "mousedown",
        handler() { return (event) => { closeMenuWhenClickingOutside(sortMenu, event) } }
    }]
};

const filterDropdownBtns = [...document.querySelectorAll('.filters button[aria-haspopup="true"]')].map(function (node) {
    return {
        btn: node,
        menu: node.parentElement.nextElementSibling,
        click() { return toggleMenu(this) }
    };
});

const searchSuggestionBox = {
    btn: document.querySelector("#search-input"),
    menu: document.querySelector("#suggestion-box"),
    options: [],
    index: -1,
    increaseIndex() { return this.index++ },
    decreaseIndex() { return this.index-- },
    events: [
        {
            target: document.querySelector(".search"),
            type: "keydown",
            handler() { return (event) => handleKeysMenuBox(searchSuggestionBox, event) }
        },
        {
            target: document.querySelector("#search-input"),
            type: "keyup",
            handler() { return handleInput }
        },
        {
            target: document,
            type: "mousedown",
            handler() { return (event) => { closeMenuWhenClickingOutside(searchSuggestionBox, event) } }
        },
        {
            target: document.querySelector("#search-input"),
            type: "focus",
            handler() {
                return () => {
                    if (searchSuggestionBox.btn.value.trim() !== "") {
                        resetMenu(searchSuggestionBox);
                        toggleMenu(searchSuggestionBox, false)();
                    }
                }
            }
        }]
};

const buttons = [navMenu, filterBtn, closeFilterBtn, clearFiltersBtn, ...filterDropdownBtns, sortMenu, searchSuggestionBox];

function clearInputs() {
    const filters = document.querySelector(".filters");
    [...filters.querySelectorAll('input[type="number"]')].map(item => item.value = "");
    [...filters.querySelectorAll('input[type="checkbox"]')].map(item => item.checked = false);
    history.replaceState(null, '', window.location.pathname);
    location.reload();
}

function handleKeysMenuBox(menu, event) {
    if (menu.menu.classList.contains("show")) {
        if (event.key === "ArrowDown" || event.key === "ArrowUp") {
            event.preventDefault();
            selectElement(menu, false);
            const firstSelectableElementIndex = 0;
            const lastSelectableElementIndex = menu.options.length - 1;
            if (event.key === "ArrowDown") {
                menu.increaseIndex();
                if (menu.index === menu.options.length) {
                    menu.index = firstSelectableElementIndex;
                }
            } else if (event.key === "ArrowUp") {
                menu.decreaseIndex();
                if (menu.index === -1) {
                    menu.index = lastSelectableElementIndex;
                }
            }
            return selectElement(menu, true);
        }

        if (event.key === "Escape" || event.key === "Tab") {
            resetMenu(menu);
            toggleMenu(menu, true)();
            if (event.key === "Escape") menu.btn.focus();
        }

        if (event.key === "Enter") {
            const currentElement = menu.options[menu.index];
            if (currentElement && currentElement.classList.contains("selected")) {
                currentElement.dispatchEvent(new Event("blockFormSubmission"));
                return location.href = currentElement.firstElementChild.href;
            }
        }
    }
}

function selectElement(menu, bool) {
    const currentElement = menu.options[menu.index];
    if (currentElement) {
        currentElement.setAttribute("aria-selected", bool);
        if (bool) {
            menu.btn.setAttribute("aria-activedescendant", `${currentElement.id}`);
            currentElement.classList.add("selected");
        } else {
            currentElement.classList.remove("selected");
        }
    }
}

function toggleMenu(menu, isMenuOpened = menu.menu.classList.contains("show")) {
    return function openOrCloseMenu() {
        isMenuOpened = !isMenuOpened;
        isMenuOpened ? menu.menu.classList.add("show") : menu.menu.classList.remove("show");

        menu.btn.setAttribute("aria-expanded", `${isMenuOpened}`);

        if (menu === filterBtn) toggleFixedLayoutBody();

        if (menu.btn.querySelector("span")) return changeSpanText();

        function changeSpanText() {
            const spanBtn = menu.btn.querySelector("span");
            if (isMenuOpened) {
                spanBtn.textContent = menu.textWhenOpened;
            } else {
                spanBtn.textContent = menu.textWhenClosed;
            }
        }
    }
}

function manageMenu(menu) {
    const otherMenu = menu === filterBtn ? sortMenu : filterBtn;
    return function toggleAndCloseOtherMenuIfOpened() {
        const isOtherMenuOpened = otherMenu.menu != null ? otherMenu.menu.classList.contains("show") : false;
        if (isOtherMenuOpened) toggleMenu(otherMenu)();
        return toggleMenu(menu)();
    }
}

export function manageBtnEvents() {
    const existentItems = buttons.filter(checkIfItemExistsInDOM);
    return existentItems.forEach(item => {
        if (item.click) item.btn.addEventListener("click", (event) => {
            event.stopPropagation();
            item.click()();
        });
        if (item.events) item.events.map(event => {
            event.target.addEventListener(event.type, event.handler());
        });
    });
}

export function toggleFixedLayoutBody() {
    const body = document.querySelector("body");
    const maxWidth = 1100;
    const isMenuOpened = filterBtn.btn.getAttribute("aria-expanded") === "true";
    isMenuOpened && window.innerWidth < maxWidth ? body.classList.add("fixed-layout") : body.classList.remove("fixed-layout");
    if (isMenuOpened && window.innerWidth < maxWidth) {
        closeFilterBtn.btn.focus();
        modal.addEventListener("keydown", focusTrap)
    } else {
        modal.removeEventListener("keydown", focusTrap);
    }
}

function checkIfItemExistsInDOM(item) {
    const prop = Object.keys(item)[0];
    return document.contains(item[prop]);
}

function focusTrap(event) {
    const firstFocusableElement = modal.querySelectorAll("button")[0];
    const focusableContent = modal.querySelectorAll("button");
    const lastFocusableElement = focusableContent[focusableContent.length - 1];

    if (event.key === "Tab" && !event.shiftKey) {
        if (document.activeElement === lastFocusableElement) {
            firstFocusableElement.focus();
            event.preventDefault();
        }
    }
    else if (event.key === "Tab" && event.shiftKey) {
        if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus();
            event.preventDefault();
        }
    }
    else return;
};

function getCurrentSelectedOptionIndex() {
    const value = sortMenu.btn.getAttribute("data-selected");
    return sortMenu.options.findIndex(item => item.id === value);
}

function resetMenu(menu) {
    selectElement(menu, false);
    menu.btn.removeAttribute("aria-activedescendant");
    if (menu === sortMenu) {
        menu.index = getCurrentSelectedOptionIndex();
        selectElement(menu, true);
    } else {
        menu.index = -1;
    }
}

let typingTimer;

function handleInput(event) {
    clearTimeout(typingTimer);
    const keys = ["ArrowDown", "ArrowUp", "ArrowLeft", "ArrowRight", "Escape", "Enter", "Tab", "Shift"];
    if (!keys.includes(event.key)) {
        if (searchSuggestionBox.btn.value.trim() === "") {
            resetMenu(searchSuggestionBox);
            toggleMenu(searchSuggestionBox, true)();
        } else {
            typingTimer = setTimeout(databaseCall, 500);
        }
    }
}

async function databaseCall() {
    const results = await getSearchResults(searchSuggestionBox.btn.value);
    if (results.length > 0) {
        return showSuggestionBoxOptions(results);
    }
}

function showSuggestionBoxOptions(data) {
    if (data) {
        const liElements = data.map((result) => {
            const li = renderResultOption(result, () => listElementHandler(result));
            return li;
        });
        resetMenu(searchSuggestionBox);
        toggleMenu(searchSuggestionBox, false)();
        searchSuggestionBox.menu.innerHTML = "";
        searchSuggestionBox.menu.append(...liElements);
        searchSuggestionBox.options = [...liElements];
    }
}

function renderResultOption(item) {
    const li = document.createElement("li");
    const a = document.createElement("a");
    li.setAttribute("id", `${item.slug}`)
    li.setAttribute("role", "option");
    li.setAttribute("aria-selected", "false");
    a.href = `/games/${item.slug}`;
    a.textContent = item.title;
    a.tabIndex = -1;
    li.appendChild(a);
    li.addEventListener("blockFormSubmission", () => {
        const form = document.querySelector(".search form");
        form.addEventListener("submit", (event) => event.preventDefault());
    })
    return li;
}

async function getSearchResults(game) {
    return await fetchData(`/search/?s=${game}`)
}

async function fetchData(url) {
    const response = await fetch(url);
    return await response.json();
}

function closeMenuWhenClickingOutside(menu, event) {
    if (!menu.menu.contains(event.target) && event.target !== menu.btn) {
        resetMenu(menu);
        toggleMenu(menu, true)();
    }
}