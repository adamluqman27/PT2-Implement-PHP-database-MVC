<?php 
ob_start();
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Orders</h2>
        <p class="text-muted mb-0">Create and manage customer orders </p>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Order Form
                </h5>
                <small class="text-muted">Create and order header before adding products</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary">* Required fields</span>
            </div>
        </div>

        <hr>

        <form action="" method="post" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Order Date <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="order_date" id="order_date" type="date" class="form-control" placeholder="Enter Order Date" value="" required>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Staff <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="staff_num" id="staff_num" class="form-control" value="" required>
                        <option value="Jane Smith">Jane Smith</option>
                        <option value="Fakhrul Ikhwan">Fakhrul Ikhwan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Customer <span class="text-danger" arial-hidden="true">*</span></label>
                    <select name="customer_num" id="customer_num" class="form-control" value="" required>
                        <option value="Alice Johnson">Alice Johnson</option>
                        <option value="Boy Ali">Boy Ali</option>
                    </select>
                </div>   
            </div>
                <hr class="mt-4 mb-3">

                <div>
                    <button type="submit" name="create" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Create Order
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Clear
                </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="row align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-table text-primary me-2"></i>
                    Order List
                </h5>
                <small class="text-muted">View orders and their products</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-success">Total: 1 items</span>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table table-stripped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Order No.</th>
                        <th>Date</th>
                        <th>Staff</th>
                        <th>Customer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>OOO1</td>
                        <td>10-27-2026</td>
                        <td>Jane Smith</td>
                        <td>Alice Johnson</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-image"></i>
                            </button>
                            <a href="orderdetails.php" class="btn btn-sm btn-info text-white" title="Order details">
                                <i class="bi bi-list"></i>
                            </a>
                            <a href="invoice.php" class="btn btn-sm btn-success" title="View invoice">
                                <i class="bi bi-receipt"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">No orders found</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  
$content = ob_get_clean();
require_once 'layout.php';
?>