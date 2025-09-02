import './bootstrap';
import Alpine from "alpinejs";
import productAlpine from "./seller/addProductPage.js";
// you can import more later, like checkoutForm.js etc.

window.Alpine = Alpine;

Alpine.data("productAlpine", productAlpine);
// Alpine.data("checkoutAlpine", checkoutAlpine); // future use

Alpine.start();