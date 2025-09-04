import './bootstrap';
import productAlpine from "./seller/addProductPage.js";

// Use the Alpine instance Jetstream already booted
document.addEventListener('alpine:init', () => {
    window.Alpine.data("productAlpine", productAlpine);
});
