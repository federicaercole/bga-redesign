const navMenu = {
    btn: document.querySelector("#menu"),
    menu: document.querySelector(".navigation"),
    textWhenOpened: "Close menu",
    textWhenClosed: "Open menu",
    click() { return toggleMenu(this) },
};

const filterBtn = {
    btn: document.querySelector("#filter"),
    menu: document.querySelector(".filters"),
    textWhenOpened: "Close filter",
    textWhenClosed: "Filter",
    click() { return toggleMenu(this) },
};

const closeFilterBtn = {
    btn: document.querySelector("#close"),
    menu: document.querySelector(".filters"),
    openBtn: filterBtn,
    click() { return toggleMenu(this) },
}

const buttons = [navMenu, filterBtn, closeFilterBtn];

function toggleMenu(menu) {
    return function openOrCloseMenu() {
        let isMenuOpened = menu.menu.classList.contains("show");
        isMenuOpened = !isMenuOpened;
        isMenuOpened ? menu.menu.classList.add("show") : menu.menu.classList.remove("show");

        if (!menu.openBtn) menu.btn.setAttribute("aria-expanded", `${isMenuOpened}`)
        else menu.openBtn.btn.setAttribute("aria-expanded", `${isMenuOpened}`);

        toggleFixedLayoutBody();

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

export function manageBtnEvents() {
    const existentItems = buttons.filter(checkIfItemExistsInDOM);
    return existentItems.map(item => {
        item.btn.addEventListener("click", item.click());
    });
}

export function toggleFixedLayoutBody() {
    const body = document.querySelector("body");
    const maxWidth = 1000;
    const isMenuOpened = filterBtn.btn.getAttribute("aria-expanded") === "true";
    isMenuOpened && window.innerWidth < maxWidth ? body.classList.add("fixed-layout") : body.classList.remove("fixed-layout");
    isMenuOpened && window.innerWidth < maxWidth ? window.addEventListener("keydown", focusTrap) : window.removeEventListener("keydown", focusTrap);
}

function checkIfItemExistsInDOM(item) {
    const prop = Object.keys(item)[0];
    return document.contains(item[prop]);
}

function focusTrap(event) {
    const modal = document.querySelector(".filters");
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

