// resources/js/checkOutAlpine.js

export default function checkOutAlpine(old = {}) {
    return {
        phoneNumber: old.phoneNumber || "",
        cardNumber: old.cardNumber || "",
        cvc: old.cvc || "",

        init() {
            // Called when Alpine component initializes
        },

        formatPhone() {
            let val = this.phoneNumber.replace(/\D/g, "");
            if (val.length > 10) val = val.slice(0, 10);

            if (val.length > 6) {
                this.phoneNumber = val.replace(/(\d{3})(\d{3})(\d{0,4})/, "$1 $2 $3");
            } else if (val.length > 3) {
                this.phoneNumber = val.replace(/(\d{3})(\d{0,3})/, "$1 $2");
            } else {
                this.phoneNumber = val;
            }
        },

        formatCard() {
            let val = this.cardNumber.replace(/\D/g, "");
            if (val.length > 19) val = val.slice(0, 19);

            this.cardNumber = val.replace(/(\d{4})(?=\d)/g, "$1 ").trim();
        },

        formatCVC() {
            let val = this.cvc.replace(/\D/g, "");
            if (val.length > 4) val = val.slice(0, 4);

            this.cvc = val;
        }
    }
}
