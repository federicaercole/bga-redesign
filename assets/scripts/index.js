import { manageBtnEvents, toggleFixedLayoutBody, filterBtn } from "./buttons.js";

manageBtnEvents();

if (filterBtn.btn) {
    window.addEventListener("resize", toggleFixedLayoutBody);
}