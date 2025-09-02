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

        init() {
            // observe backend response
            const mode = sessionStorage.getItem('SellerProductMode'); // 'Edit' or 'Add'
            const targetNode = this.$refs.compleateResponce;
            if (!targetNode) return;

            const config = { childList: true, subtree: true, characterData: true };
            const observer = new MutationObserver(() => {
                let raw = (targetNode.textContent || '').trim();
                if (!raw || raw === 'null' || raw === 'null1') return;
                try {
                    const data = JSON.parse(raw);
                    if (mode === 'Edit') this.fillEdit(data);
                    if (mode === 'Add') this.handleAddResponse(data);
                } catch (e) {
                    console.error('Invalid JSON in compleateResponce', e);
                }
            });
            observer.observe(targetNode, config);

            // wire submit button for Edit mode (keeps your global handler)
            if (mode === 'Edit' && window.SellerEditProductBtnClick) {
                document.getElementById('addProductBtn')
                    .addEventListener('click', () => window.SellerEditProductBtnClick());
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

        // Edit mode
        fillEdit(payload) {
            if (payload?.error == 1) {
                const el = document.getElementById('errorDisplayMsg');
                el.innerHTML = payload.msg;
                el.classList.add('block');
                el.style.color = '#FF0000';
                return;
            }
            const data = payload?.msg || [];
            const mainImg = data.find(x => x.Level === 'main');
            if (mainImg?.Content) {
                this.previews.main = mainImg.Content;
                this.$refs.mainImageBase64.value = mainImg.Content;
            }

            // Populate inputs/labels exactly like your original
            document.getElementById('AddUpdatePageTitle').innerHTML = 'Edit Product';
            const p0 = data?.[0] || {};
            document.getElementById('productNameIN').value = p0.ProductName || '';
            const priceEl = document.getElementById('priceIN');
            priceEl.placeholder = p0.Price ? Number(p0.Price).toLocaleString() : '';
            const discEl = document.getElementById('discountIN');
            discEl.placeholder = p0.Discount ?? '';
            const catEl = document.getElementById('categorySelect');
            if (p0.Category) catEl.value = p0.Category;
            document.getElementById('descriptionIN').value = p0.Description || '';

            // extra images
            const img1 = data?.[1]?.Content || "null";
            const img2 = data?.[2]?.Content || "null";
            const img3 = data?.[3]?.Content || "null";
            const img4 = data?.[4]?.Content || "null";

            if (img1 !== "null") { this.previews.img1 = img1; this.$refs.image1Base64.value = img1; }
            if (img2 !== "null") { this.previews.img2 = img2; this.$refs.image2Base64.value = img2; }
            if (img3 !== "null") { this.previews.img3 = img3; this.$refs.image3Base64.value = img3; }
            if (img4 !== "null") { this.previews.img4 = img4; this.$refs.image4Base64.value = img4; }
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