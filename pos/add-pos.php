<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point Of Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/enrio.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
</head>

<body>
    <!-- container-fluid -->
    <div class="container-fluid container-pos">
        <div class="row h-100">
            <div class="col-md-7 product-section">
                <div class="mb-4">
                    <h4 class="mb-3"><i class="bi bi-shop"></i>
                        Product</h4>
                    <input type="text" id="searchProduct" class="form-control search-box" placeholder="Find Product...">
                </div>
                <div class="mb-4">
                    <button class="btn btn-primary category-btn active">All Menu</button>
                    <button class="btn btn-outline-primary category-btn">Food</button>
                    <button class="btn btn-outline-primary category-btn">Drink</button>
                    <button class="btn btn-outline-primary category-btn">Snack</button>
                </div>
                <div class="row" id="productGrid">
                    <div class="col-md-4 col-sm-6">
                        <div class="card product-card">
                            <div class="product-img">
                                <img src="../assets/uploads/nasgor.jpg" alt="" width="100%">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-secondary badge-category">Makanan</span>
                                <h6 class="card-title mt-2 mb-2">Nasi Goreng</h6>
                                <p class="card-text text-primary fw-bold">Rp. 25.000,-</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card product-card">
                            <div class="product-img">
                                <img src="../assets/uploads/burger.jpg" alt="" width="100%">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-secondary badge-category">Makanan</span>
                                <h6 class="card-title mt-2 mb-2">Burger</h6>
                                <p class="card-text text-primary fw-bold">Rp. 40.000,-</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="card product-card">
                            <div class="product-img">
                                <img src="../assets/uploads/es_teler.jpg" alt="" width="100%">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-secondary badge-category">Minuman</span>
                                <h6 class="card-title mt-2 mb-2">Es Teler</h6>
                                <p class="card-text text-primary fw-bold">Rp. 10.000,-</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 cart-section">
                <div class="cart-header">
                    <h4>Cart</h4>
                    <small>Order # <span class="orderNumber">001</span></small>
                </div>
                <div class="cart-items" id="cartItems">
                    <div class="text-center text-muted mt-5">
                        <i class="bi bi-cart mb-3"></i>
                        <p>Empty Cart</p>
                    </div>
                </div>
                <div class="cart-footer">
                    <div class="total-section">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal :</span>
                            <span id="subtotal">Rp. 100.000</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Pajak (10%) :</span>
                            <span id="tax">Rp. 100.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total :</span>
                            <span id="total">Rp. 110.000</span>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <button class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash"></i> Clear Cart
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-checkout btn-primary w-100">
                                <i class="bi bi-cash"></i> Process Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <script>
        // javascript variable : let, var, const
        // php variable = $define, const

        let nama = "enrio hernanda";
        var name = "bambang pamungkas";
        const fullname = "wahyudin kamal";
        // const : tetap tidak boleh merubah nilai
        // document.write()
        // console.log({
        //     "nama": name,
        //     "fullname": fullname
        // });
        // alert(nama);

        let angka1 = 10;
        let angka2 = 20;
        console.log(angka1 + angka2);
        console.log(angka1 - angka2);
        console.log(angka1 / angka2);
        console.log(angka1 * angka2);
        console.log(angka1 % angka2);
        console.log(angka1 ** angka2);

        // operator penugasan
        let x = 10;
        x += 5; //15
        console.log(x);

        // operator pembandingan
        //  >, <, =, ==, ===, !==
        let a = 1;
        let b = 1;
        if (a == b) {
            console.log("sama");
        } else {
            console.log("tidak sama");
        }

        console.log(a >= b);
        console.log(a <= b);

        // operator logika
        // &&, AND, OR, ||, !: tidak / not
        let umur = 20;
        let punyaSim = true;
        if (umur > 17 && punyaSim) {
            console.log("boleh mengemudi");
        } else {
            console.log("tidak boleh mengemudi");
        }

        // array : sebuah tipe data yang bisa memiliki nilai lebih dari 1
        let buah = ['pisang', 'salak', 'semangka'];
        console.log("buah di keranjang:", buah);
        console.log("saya mau buah", buah[1]);
        buah[1] = "Nanas";
        console.log("buah baru:", buah);
        buah.push('Pepaya');
        console.log("Buah", buah);
        buah.pop();
        console.log("Buah", buah);
    </script>
</body>

</html>