<x-backend.master>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Item sold <span>| Today</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>145</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Item Sold <span>| This Month</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>455</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Item Sold <span>| This Year</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>850</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Charts -->
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Item sold by Category <span>/This Month</span></h5>
                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            let categories = ['Fruits', 'Vegetables', 'Drinks', 'Ingridients'];
                            let categoryData = [267, 140, 243, 121];
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: categories,
                                        datasets: [{
                                            label: "Category sales",
                                            data: categoryData,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End Bar CHart -->
                    </div>

                </div>
            </div>
            <!-- End Charts -->

            <!-- Top Selling -->
            <div class="col-12">
                <div class="card top-selling overflow-auto">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Top Sales <span>| Today</span></h5>

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price (৳)</th>
                                    <th scope="col">Sold</th>
                                    <th scope="col">Revenue (৳)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <a href="#">
                                            <img src="../Picture/Fruites/banana-chompa-ready-to-eat-12-pcs.webp"
                                                alt="">
                                        </a>
                                    </th>
                                    <td>Chompa Kola</td>
                                    <td>70</td>
                                    <td class="fw-bold">124 Dozen</td>
                                    <td>5,828</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <a href="#"><img src="../Picture/Fruites/gala-apple-50-gm-1-kg.webp"
                                                alt=""></a>
                                    </th>
                                    <td>Gala Apple</td>
                                    <td>290</td>
                                    <td class="fw-bold">20 Kg</td>
                                    <td>5,500</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <a href="#"><img
                                                src="../Picture/Fruites/kacha-aam-green-mango-50-gm-1-kg.webp"
                                                alt=""></a>
                                    </th>
                                    <td>Kacha Amm</td>
                                    <td>50</td>
                                    <td class="fw-bold">80 Kg</td>
                                    <td>4,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- End Top Selling -->

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">

                    <div class="card-body">
                        <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price (৳)</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">20</a></th>
                                    <td>Lorem Ipsum</td>
                                    <td>Chompa Kola</td>
                                    <td>70</td>
                                    <td>1 Dozen</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">23</a></th>
                                    <td>Dolor Sit</td>
                                    <td>Kacha Amm</td>
                                    <td>50</td>
                                    <td>5 Kg</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">9</a></th>
                                    <td>Amet Consectetur</td>
                                    <td>Gala Apple</td>
                                    <td>290</td>
                                    <td>5 Kg</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- End Recent Sales -->

        </div>
    </section>
    </main>

</x-backend.master>
