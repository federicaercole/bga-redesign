const scroller = document.querySelector(".scroller");

if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    playAnimation();
}

function playAnimation() {
    const innerScroller = scroller.querySelector(".inner-scroller");
    const scrollerContent = Array.from(innerScroller.children);

    scrollerContent.forEach((item) => {
        const duplicatedItem = item.cloneNode(true);
        innerScroller.appendChild(duplicatedItem);
    });
}
