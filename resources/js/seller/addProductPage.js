export default function productAlpine(old = {}) {
    return {
        // previews
        previews: {
            main: old.oldMain || null,
            img1: old.oldImg1 || null,
            img2: old.oldImg2 || null,
            img3: old.oldImg3 || null,
            img4: old.oldImg4 || null,
        },

        mode: old.mode || 'add',
        product: old.product || null,

        init() {
            // observe backend responseconst 
            const mode = this.mode; // now reactive
            const product = this.product;

            if (mode == "edit") {
                const data = JSON.parse(product);
                if (data.images[0]?.content) this.previews.main = data.images[0].content;
                if (data.images[1]?.content) this.previews.img1 = data.images[1].content;
                if (data.images[2]?.content) this.previews.img2 = data.images[2].content;
                if (data.images[3]?.content) this.previews.img3 = data.images[3].content;
                if (data.images[4]?.content) this.previews.img4 = data.images[4].content;
                
                if (data.images[0]?.content) this.$refs.mainImageBase64.value = data.images[0].content;
                if (data.images[1]?.content) this.$refs.image1Base64.value = data.images[1].content;
                if (data.images[2]?.content) this.$refs.image2Base64.value = data.images[2].content;
                if (data.images[3]?.content) this.$refs.image3Base64.value = data.images[3].content;
                if (data.images[4]?.content) this.$refs.image4Base64.value = data.images[4].content;

                document.getElementById('productNameIN').value = data.name;
                document.getElementById('priceIN').value = data.price ? Number(data.price).toLocaleString('en-US') : '';
                document.getElementById('discountIN').value = data.discount;
                document.getElementById('categorySelect').value = data.category;
                document.getElementById('descriptionIN').value = data.description;
            }
        },

        onFileChange(e, which) {
            const file = e.target.files?.[0];
            const valid = ["image/jpeg", "image/png", "image/gif", "image/webp", "image/avif"];
            if (!file || !valid.includes(file.type)) {
                this.setBase64(which, "null");
                this.setPreview(which, null);
                return;
            }
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = (ev) => {
                const base64 = ev.target.result;
                this.setBase64(which, base64);
                this.setPreview(which, base64);
            };
        },

        setPreview(which, val) {
            if (which === 'main') this.previews.main = val;
            else if (which === 'img1') this.previews.img1 = val;
            else if (which === 'img2') this.previews.img2 = val;
            else if (which === 'img3') this.previews.img3 = val;
            else if (which === 'img4') this.previews.img4 = val;
        },

        setBase64(which, val) {
            if (which === 'main') this.$refs.mainImageBase64.value = val;
            else if (which === 'img1') this.$refs.image1Base64.value = val;
            else if (which === 'img2') this.$refs.image2Base64.value = val;
            else if (which === 'img3') this.$refs.image3Base64.value = val;
            else if (which === 'img4') this.$refs.image4Base64.value = val;
        },

        onPriceInput(e) {
            let v = e.target.value.replace(/[^\d]/g, '');
            if (v.length > 7) v = v.slice(0, 7);
            e.target.value = v ? Number(v).toLocaleString('en-US') : '';
        },

        onDiscountInput(e) {
            let value = e.target.value.replace(/[^0-9.]/g, '');
            const parts = value.split('.');
            if (parts.length > 2) value = parts[0] + '.' + parts[1];
            if (parts.length === 2) parts[1] = parts[1].slice(0, 1);
            let num = parseFloat(value);
            if (!isNaN(num) && num > 99.9) num = 99.9;
            e.target.value = isNaN(num) ? '' : num.toString();
        },

        // mirrors your Add-mode error handling
        handleAddResponse(payload) {
            if (payload?.error == 1) {
                const el = document.getElementById('errorDisplayMsg');
                el.innerHTML = payload.msg;
                el.classList.add('block');
                el.style.color = '#FF0000';
            }
        }
    }
}