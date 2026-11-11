<?php
$orderDate = $aorder['fld_order_date'] ?? date('Y-m-d'); 
ob_start();
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Orders</h2>
        <p class="text-muted mb-0">Create and manage customer orders</p>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-cart-plus text-primary me-2"></i>
                    Order Form
                </h5>
                <small class="text-muted">Create an order header before adding products</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary">* Required fields</span>
            </div>
        </div>

        <hr>

        <form action="<?= BASE_URL ?>ordercontroller/<?= isset($aorder) ? 'update' : 'save' ?>" method="post" class="needs-validation" novalidate>
            <div class="row g-3">
                <!-- TUKAR KE col-md-4 -->
                <div class="col-md-4">
                    <label for="order_date" class="form-label">Order Date <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="order_date" id="order_date" type="date" class="form-control" value="<?= htmlspecialchars($orderDate) ?>" required>
                </div>
                
                <!-- TUKAR KE col-md-4 dan form-select -->
                <div class="col-md-4">
                    <label for="staff_num" class="form-label">Staff <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="staff_num" id="staff_num" class="form-select" required>
                        <!-- TAMBAH DEFAULT OPTION NI -->
                        <option value="">Select Staff</option>
                        <?php foreach ($staffs ?? [] as $staff): ?>
                            <option value="<?= htmlspecialchars($staff['fld_staff_num']) ?>" <?= (($aorder['fld_staff_num'] ?? '') == $staff['fld_staff_num']) ? 'selected' : '' ?>><?= htmlspecialchars($staff['fld_staff_num'] . ' - ' . $staff['fld_staff_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- TUKAR KE col-md-4 dan form-select -->
                <div class="col-md-4">
                    <label for="customer_num" class="form-label">Customer <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="customer_num" id="customer_num" class="form-select" required>
                        <!-- TAMBAH DEFAULT OPTION NI -->
                        <option value="">Select Customer</option>
                        <?php foreach ($customers ?? [] as $customer): ?>
                            <option value="<?= htmlspecialchars($customer['fld_customer_num']) ?>" <?= (($aorder['fld_customer_num'] ?? '') == $customer['fld_customer_num']) ? 'selected' : '' ?>><?= htmlspecialchars($customer['fld_customer_num'] . ' - ' . $customer['fld_customer_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>   
            </div>
                <hr class="mt-4 mb-3">

                <div>
                    <button type="submit" name="<?= isset($aorder) ? 'update' : 'create' ?>" class="btn btn-primary"><i class="bi bi-save me-1"></i><?= isset($aorder) ? 'Update' : 'Create Order' ?></button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Clear
                    </button>
                    <?php if (isset($aorder)): ?>
                        <input type="hidden" name="order_num" value="<?= htmlspecialchars($aorder['fld_order_num'] ?? '') ?>">
                    <?php endif; ?>
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
            <div class="col-auto"><span class="badge bg-success">Total: <?= count($orders ?? []) ?> items</span></div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
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
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order['fld_order_num']) ?></td>
                                <td><?= htmlspecialchars($order['fld_order_date']) ?></td>
                                <td><?= htmlspecialchars($order['fld_staff_name'] ?? $order['fld_staff_num']) ?></td>
                                <td><?= htmlspecialchars($order['fld_customer_name'] ?? $order['fld_customer_num']) ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>orderdetailcontroller/index/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-sm btn-info text-white" title="Order details"><i class="bi bi-list"></i></a>
                                    <a href="<?= BASE_URL ?>ordercontroller/invoice/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-sm btn-success" title="View invoice"><i class="bi bi-receipt"></i></a>
                                    <a href="<?= BASE_URL ?>ordercontroller/edit/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-sm btn-warning" title="Edit order"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= BASE_URL ?>ordercontroller/delete/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-sm btn-danger" title="Delete order" onclick="return confirm('Are you sure to delete this order?');"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">No orders found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  
$content = ob_get_clean();
require_once 'layout.php';
?>