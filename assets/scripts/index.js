import { manageBtnEvents, toggleFixedLayoutBody } from "./buttons.js";

manageBtnEvents();
window.addEventListener("resize", toggleFixedLayoutBody);