<!-- container -->
<main class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="app__title">
                <h3 class="app__title-title">Quản lý sản phẩm</h3>
                <div id="clock"></div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="analysis">
                        <i class="icon--product fa-solid fa-dollar-sign"></i>
                        <div class="analysis__info">
                            <h4>Lợi nhuận</h4>
                            <p><b>$<?php if(isset($total_moneys12['totalm'])){
                                echo  $total_moneys12['totalm'];
                            }else{ echo 0;} ?>,00</b></p>
                            <p class="analysis__info-sum">Doanh thu hàng tháng.</p>
                        </div>
                    </div>
                </div>
                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--customer fa-solid fa-users-gear"></i>
                        <div class="analysis__info">
                            <h4>Tổng khách hàng</h4>
                            <p><b><?php echo $count_customers['soluong']; ?> khách hàng</b></p>
                            <p class="analysis__info-sum">Tổng số khách hàng được quản lý.</p>
                        </div>
                    </div>
                </div>

                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--customer fa-solid fa-users-gear"></i>
                        <div class="analysis__info">
                            <h4>Tổng số nhân viên</h4>
                            <p><b><?php echo $count_staff['soluong']; ?> nhân viên</b></p>
                            <p class="analysis__info-sum">Tổng số nhân viên được quản lý.</p>
                        </div>
                    </div>
                </div>

                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--comment fa-solid fa-comment"></i>
                        <!-- <i class="icon--comment fa-brands fa-shopify"></i> -->
                        <div class="analysis__info">
                            <h4>Tổng bình luận</h4>
                            <p><b><?php echo $count_comment2['soluong'] ?> bình luận</b></p>
                            <p class="analysis__info-sum">Tổng bình luận.</p>
                        </div>
                    </div>
                </div>
                <!-- item1 -->

                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--product fa-solid fa-database"></i>
                        <div class="analysis__info">
                            <h4>Tổng sản phẩm</h4>
                            <p><b><?php echo $count_products['soluong']; ?> sản phẩm</b></p>
                            <p class="analysis__info-sum">Tổng số sản phẩm được quản lý.</p>
                        </div>
                    </div>
                </div>

                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--comment fa-solid fa-list"></i>
                        <!-- <i class="icon--comment fa-solid fa-comment"></i> -->
                        <!-- <i class="icon--comment fa-brands fa-shopify"></i> -->
                        <div class="analysis__info">
                            <h4>Tổng các loại sản phẩm</h4>
                            <p><b><?php echo $count_product_category['soluong'] ?> các loại sản phẩm</b></p>
                            <p class="analysis__info-sum">Tổng số các loại sản phẩm được quản lý.</p>
                        </div>
                    </div>
                </div>
                <!-- item1 -->

                <!-- item1 -->
                <div class="col-md-6 mb-4">
                    <div class="analysis">
                        <i class="icon--comment fa-solid fa-cart-shopping"></i>
                        <div class="analysis__info">
                            <h4>Tổng số lượng đơn hàng</h4>
                            <p><b><?php echo $count_orders['soluong'] ?> các loại sản phẩm</b></p>
                            <p class="analysis__info-sum">Số đơn hàng nhận được.</p>
                        </div>
                    </div>
                </div>
                <!-- item1 -->
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="content__chart">
                        <h3 class="content__chart-title">Loại sản phẩm được ưu chuộng nhất</h3>
                        <div class="content__chart-graph">
                            <canvas id="soluong"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- doanh thu hàng tháng -->
    <div class="row mt-3 mb-3">
        <div class="col-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="content__chart">
                        <h3 class="content__chart-title">Biểu đồ doanh thu năm 2023 </h3>
                        <div class="content__chart-graph">
                        <canvas id="myChart" width="600" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <?php echo $orders23['soluong']; ?>,
<?php echo $orders24['soluong']; ?>,
<?php echo $orders25['soluong']; ?>,
<?php echo $orders26['soluong']; ?>,
<?php echo $orders27['soluong']; ?>,
<?php echo $orders29['soluong']; ?> -->
<script>
const myChartElement = document.getElementById('soluong')

if (myChartElement) {
    const ctx = myChartElement.getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Hoodie & Sweats', 'Áo khoác', 'Chân váy ngắn', 'Áo Polo', 'Quần âu nam', 'Quần jean'],
            datasets: [{
                label: 'Số liệu: ',
                data: [
                    <?php echo $orders23['soluong']; ?>,
                    <?php echo $orders24['soluong']; ?>,
                    <?php echo $orders25['soluong']; ?>,
                    <?php echo $orders26['soluong']; ?>,
                    <?php echo $orders27['soluong']; ?>,
                    <?php echo $orders29['soluong']; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1,
            }]
        }
    });
}
</script>

<script>
const doanhthu = document.getElementById('myChart')
if (doanhthu) {
    const result = doanhthu.getContext('2d');
    // const labels = Utils.months({
    //     count: 7
    // });
    const bieudodoanthu = new Chart(result, {
        type: 'line',
        responsive: true,
        data: {
            labels: ['tháng 1', 'tháng 2', 'tháng 3', 'tháng 4', 'tháng 5', 'tháng 6', 'tháng 7',
                'tháng 8', 'tháng 9', 'tháng 10', 'tháng 11', 'tháng 12'
            ],
           
            datasets: [{
                label: 'Doanh thu hàng tháng',
                data: [500, 450, 370, 100, 600, 50, 230, 700, 600, 80,<?php echo  $total_moneys12['totalm'] ?>, <?php echo $total_moneys['total'] ?>],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    })
}
</script>

