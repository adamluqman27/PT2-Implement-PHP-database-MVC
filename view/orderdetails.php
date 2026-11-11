<?php
ob_start();
?>
 
<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Order Details</h2>
        <p class="text-muted mb-0">Order #<?= htmlspecialchars($order['fld_order_num']) ?> for <?= htmlspecialchars($order['fld_customer_name'] ?? $order['fld_customer_num']) ?></p>
    </div>
</div>
 
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-4"><strong>Order Date</strong><br><?= htmlspecialchars($order['fld_order_date']) ?></div>
            <div class="col-md-4"><strong>Staff</strong><br><?= htmlspecialchars($order['fld_staff_name'] ?? $order['fld_staff_num']) ?></div>
            <div class="col-md-4"><strong>Customer</strong><br><?= htmlspecialchars($order['fld_customer_name'] ?? $order['fld_customer_num']) ?></div>
        </div>
    </div>
</div>
 
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="mb-3"><i class="bi bi-cart-plus text-primary me-2"></i><?= isset($adetail) ? 'Edit Product' : 'Add Product' ?></h5>
        <hr>
        <form action="<?= BASE_URL ?>orderdetailcontroller/<?= isset($adetail) ? 'update' : 'save' ?>" method="post" class="needs-validation" novalidate>
            <input type="hidden" name="order_num" value="<?= htmlspecialchars($order['fld_order_num']) ?>">
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="product_num" class="form-label">Product <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="product_num" id="product_num" class="form-select" required>
                        <option value="">Select Product</option>
                        <?php foreach ($products ?? [] as $product): ?>
                            <option value="<?= htmlspecialchars($product['fld_product_num']) ?>" <?= (($adetail['fld_product_num'] ?? '') == $product['fld_product_num']) ? 'selected' : '' ?>><?= htmlspecialchars($product['fld_product_name']) ?> (Stock = <?= htmlspecialchars($product['fld_product_quantity']) ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="quantity" id="quantity" type="number" class="form-control" min="1" value="<?= htmlspecialchars($adetail['fld_order_detail_quantity'] ?? '1') ?>" required>
                </div>
            </div>
            <hr class="mt-4 mb-3">
            <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i><?= isset($adetail) ? 'Update Detail' : 'Add Product' ?></button>
            <?php if (isset($adetail)): ?>
                <a href="<?= BASE_URL ?>orderdetailcontroller/index/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-secondary">Cancel</a>
            <?php endif; ?>
            <?php if (isset($adetail)): ?>
                <input type="hidden" name="detail_num" value="<?= htmlspecialchars($adetail['fld_order_detail_num']) ?>">
            <?php endif; ?>
        </form>
    </div>
</div>
 
<div class="card shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><i class="bi bi-table text-primary me-2"></i>Products in Order</h5>
            <a href="<?= BASE_URL ?>ordercontroller/invoice/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-success"><i class="bi bi-receipt me-1"></i>View Invoice</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark"><tr><th>Product</th><th>Unit Price</th><th>Quantity</th><th>Total</th><th>Actions</th></tr></thead>
                <tbody>
                    <?php $grandTotal = 0; ?>
                    <?php if (!empty($details)): ?>
                        <?php foreach ($details as $detail): ?>
                            <?php $lineTotal = (float) ($detail['fld_product_price'] ?? 0) * (int) $detail['fld_order_detail_quantity']; $grandTotal += $lineTotal; ?>
                            <tr>
                                <td><?= htmlspecialchars($detail['fld_product_name'] ?? $detail['fld_product_num']) ?></td>
                                <td>$<?= number_format((float) ($detail['fld_product_price'] ?? 0), 2) ?></td>
                                <td><?= htmlspecialchars($detail['fld_order_detail_quantity']) ?></td>
                                <td>$<?= number_format($lineTotal, 2) ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>orderdetailcontroller/edit/<?= rawurlencode($detail['fld_order_detail_num']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= BASE_URL ?>orderdetailcontroller/delete/<?= rawurlencode($detail['fld_order_detail_num']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove this product from the order?');"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">No products added to this order</td></tr>
                    <?php endif; ?>
                </tbody>
                <tfoot><tr><th colspan="3" class="text-end">Grand Total</th><th>$<?= number_format($grandTotal, 2) ?></th><th></th></tr></tfoot>
            </table>
        </div>
        <a href="<?= BASE_URL ?>ordercontroller/index" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Orders</a>
    </div>
</div>
 
<?php
$content = ob_get_clean();
require_once 'layout.php';
?>