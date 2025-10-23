// // javascript variable : let, var, const
//         // php variable = $define, const

//         let nama = "enrio hernanda";
//         var name = "bambang pamungkas";
//         const fullname = "wahyudin kamal";
//         // const : tetap tidak boleh merubah nilai
//         // document.write()
//         // console.log({
//         //     "nama": name,
//         //     "fullname": fullname
//         // });
//         // alert(nama);

//         let angka1 = 10;
//         let angka2 = 20;
//         console.log(angka1 + angka2);
//         console.log(angka1 - angka2);
//         console.log(angka1 / angka2);
//         console.log(angka1 * angka2);
//         console.log(angka1 % angka2);
//         console.log(angka1 ** angka2);

//         // operator penugasan
//         let x = 10;
//         x += 5; //15
//         console.log(x);

//         // operator pembandingan
//         //  >, <, =, ==, ===, !==
//         let a = 1;
//         let b = 1;
//         if (a == b) {
//             console.log("sama");
//         } else {
//             console.log("tidak sama");
//         }

//         console.log(a >= b);
//         console.log(a <= b);

//         // operator logika
//         // &&, AND, OR, ||, !: tidak / not
//         let umur = 20;
//         let punyaSim = true;
//         if (umur > 17 && punyaSim) {
//             console.log("boleh mengemudi");
//         } else {
//             console.log("tidak boleh mengemudi");
//         }

//         // array : sebuah tipe data yang bisa memiliki nilai lebih dari 1
//         let buah = ['pisang', 'salak', 'semangka'];
//         console.log("buah di keranjang:", buah);
//         console.log("saya mau buah", buah[1]);
//         buah[1] = "Nanas";
//         console.log("buah baru:", buah);
//         buah.push('Pepaya');
//         console.log("Buah", buah);
//         buah.pop();
//         console.log("Buah", buah);

        // document.getElementById("product-title").innerHTML = "Data Product";
        // // document.querySelector("#product-title");
        // let btn = document.getElementsByClassName('category-btn');
        // // btn[0].style.color = "red";
        // // btn[1].style.color = "black";
        // // btn[2].style.color = "brown";
        // console.log("ini button", btn);
        
//         let buttons = document.querySelectorAll(".category-btn");
//         // buttons.forEach(function (btn){});
//         buttons.forEach((btn) => {
//             btn.style.color = "red";
//             console.log(btn);
//         })

//         let card = document.getElementById("card");
//         let h3 = document.createElement("h3");
//         let textH3 = document.createTextNode("Selamat Datang");
//         h3.textContent = "Selamat Datang dengan TextContent";

//         let p = document.createElement("p");
//         p.innerText = "Duarr jadi";
//         p.textContent = "Nuall jadi";
//         // menambahkan element didalam card
//         card.appendChild(h3);
//         card.appendChild(p); 

        let currentCategory = "all";

        function filterCategory(category, event){
            currentCategory = category;

            let buttons = document.querySelectorAll('.category-btn');
            buttons.forEach((btn) => {
                btn.classList.remove('active');
                btn.classList.remove('btn-primary');
                btn.classList.add('btn-outline-primary');
            }); 
            event.classList.add("active");
            event.classList.remove('btn-outline-primary');
            event.classList.add('btn-primary');
            console.log({currentCategory: currentCategory, category: category, event: event});

            renderProducts();
        }
        
        function renderProducts(searchProduct = "") {
            const productGrid = document.getElementById('productGrid');
            productGrid.innerHTML = "";

            // filter
            const filtered = products.filter((p) => {
                // shorthand / ternary
                const matchCategory = currentCategory === "all" || p.category_name === currentCategory;
                const matchSearch = p.product_name.toLowerCase().includes(searchProduct);
                return matchCategory && matchSearch;
            });

            // munculkan data dari table products
            filtered.forEach((product) => {
                const col = document.createElement('div');
                col.className = "col-md-4 col-sm-6";
                col.innerHTML = 
                `<div class="card product-card">
                    <div class="product-img">
                    <img src="../${product.product_photo}" alt="" width="100%">
                    </div>
                    <div class="card-body">
                        <span class="badge bg-secondary badge-category">${product.category_name}</span>
                        <h6 class="card-title mt-2 mb-2">${product.product_name}</h6>
                        <p class="card-text text-primary fw-bold">Rp. ${product.product_price}</p>
                    </div>
                </div>`;
                productGrid.appendChild(col);
            });
            
        }
        
        // DomContentLoaded : akan load function pertama kali
        renderProducts();
        document.getElementById('searchProduct').addEventListener('input', (e) => {
            const searchProduct = e.target.value.toLowerCase();
            renderProducts(searchProduct);
        })