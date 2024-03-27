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
    menu: document.querySelector(".filters"),
    openBtn: filterBtn,
    click() { return toggleMenu(this) },
}

const clearFiltersBtn = {
    btn: document.querySelector("#clear"),
    click() { return clearInputs },
}

const sortMenu = {
    btn: document.querySelector("#sort"),
    menu: document.querySelector("#sort-menu"),
    options: [...document.querySelectorAll("#sort-menu li")],
    optionIndex: 0,
    increaseIndex() { return this.optionIndex++ },
    decreaseIndex() { return this.optionIndex-- },
    click() { return manageMenu(this) },
};

const filterDropdownBtns = [...document.querySelectorAll('.filters button[aria-haspopup="true"]')].map(function (node) {
    return {
        btn: node,
        menu: node.parentElement.nextElementSibling,
        click() { return toggleMenu(this) }
    };
});

const buttons = [navMenu, filterBtn, closeFilterBtn, clearFiltersBtn, ...filterDropdownBtns, sortMenu];

function clearInputs() {
    const filters = document.querySelector(".filters");
    [...filters.querySelectorAll('input[type="number"]')].map(item => item.value = "");
    [...filters.querySelectorAll('input[type="checkbox"]')].map(item => item.checked = false);
    history.replaceState(null, '', window.location.pathname);
    location.reload();
}

function handleKeysSortMenu(event) {
    if (event.key === "ArrowDown" || event.key === "ArrowUp") {
        event.preventDefault();
        selectElement(false);
        const firstSelectableElementIndex = 0;
        const lastSelectableElementIndex = sortMenu.options.length - 1;
        if (event.key === "ArrowDown") {
            sortMenu.increaseIndex();
            if (sortMenu.optionIndex === sortMenu.options.length) {
                sortMenu.optionIndex = firstSelectableElementIndex;
            }
        } else if (event.key === "ArrowUp") {
            sortMenu.decreaseIndex();
            if (sortMenu.optionIndex === -1) {
                sortMenu.optionIndex = lastSelectableElementIndex;
            }
        }
        return selectElement(true);
    }

    if (event.key === "Escape" || event.key === "Tab") {
        if (sortMenu.menu.classList.contains("show")) {
            resetSortMenu();
            toggleMenu(sortMenu)();
            if (event.key === "Escape") sortMenu.btn.focus();
        }
    }

    if (event.key === "Enter") {
        const currentElement = sortMenu.options[sortMenu.optionIndex];
        return location.href = currentElement.firstElementChild.href;
    }
}

function selectElement(bool) {
    const currentElement = sortMenu.options[sortMenu.optionIndex];
    currentElement.setAttribute("aria-selected", bool);
    if (bool) {
        sortMenu.menu.setAttribute("aria-activedescendant", `${currentElement.id}`);
        currentElement.classList.add("selected");
    } else {
        currentElement.classList.remove("selected");
    }
}

function toggleMenu(menu) {
    return function openOrCloseMenu() {
        let isMenuOpened = menu.menu.classList.contains("show");
        isMenuOpened = !isMenuOpened;
        isMenuOpened ? menu.menu.classList.add("show") : menu.menu.classList.remove("show");

        if (!menu.openBtn) menu.btn.setAttribute("aria-expanded", `${isMenuOpened}`)
        else menu.openBtn.btn.setAttribute("aria-expanded", `${isMenuOpened}`);

        if (menu === filterBtn) toggleFixedLayoutBody();
        if (menu === sort) resetSortMenu();

        if (menu.btn.querySelector("span") || menu.openBtn) return changeSpanText();

        function changeSpanText() {
            const spanBtn = menu.btn.querySelector("span") ?? menu.openBtn.btn.querySelector("span");
            if (isMenuOpened) {
                spanBtn.textContent = menu.textWhenOpened ?? menu.openBtn.textWhenOpened;
            } else {
                spanBtn.textContent = menu.textWhenClosed ?? menu.openBtn.textWhenClosed;
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
    return existentItems.map(item => {
        item.btn.addEventListener("click", item.click());
        if (item === sortMenu) return sortMenu.menu.addEventListener("keydown", handleKeysSortMenu);
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

function resetSortMenu() {
    selectElement(false);
    const index = getCurrentSelectedOptionIndex();
    sortMenu.optionIndex = index;
    selectElement(true);
}