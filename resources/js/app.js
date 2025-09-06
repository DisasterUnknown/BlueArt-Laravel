import './bootstrap';
import './layout.js';
import productAlpine from "./seller/addProductPage.js";
import checkOutAlpine from "./costomer/checkOutPage.js";

document.addEventListener('alpine:init', () => {
    window.Alpine.data("productAlpine", productAlpine);
});
document.addEventListener('alpine:init', () => {
    window.Alpine.data("checkOutAlpine", checkOutAlpine);
});
