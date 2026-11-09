<?php 
ob_start();
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Products</h2>
        <p class="text-muted mb-0">Manage and track all your products</p>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    Product Form
                </h5>
                <small class="text-muted">Fill in the details of a product</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary">* Required fields</span>
            </div>
        </div>

        <hr>

        <form action="" method="post" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="pid" class="form-label">Product ID <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_num" id="pid" type="text" class="form-control" placeholder="Enter Product ID" value="" required>
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label">Name <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_name" id="name" type="text" class="form-control" placeholder="Enter Product Name" value="" required>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">Price <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_price" id="price" type="number" class="form-control" placeholder="Enter Price" value="" required min="0" step="0.01">
                </div>
                <div class="col-md-3">
                    <label for="brand" class="form-label">Brand <span class="text-danger" arial-hidden="true">*</span></label>
                    <select name="product_brand" id="brand" class="form-select" required>
                        <option value="">Select Brand</option>
                        <option value="Scmidth">Scmidth</option>
                        <option value="Hygr">Hygr</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="product_size" class="form-label">Size <span class="text-danger" aria-hidden="true"></span></label>
                    <select name="product_size" id="product_size" class="form-select" required>
                        <option value="">Select Size</option>
                        <option value="25g">25g</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="year" class="form-label">Scent <span class="text-danger" aria-hidden="true">*</span></label>
                    <select name="product_scent" id="year" class="form-select" required>
                        <option value="">Select Scent</option>
                        <option value="BAYU">BAYU</option>
                        <option value="LIME">LIME</option>
                        <option value="PEAR">PEAR</option>
                        <option value="CHARCOAL">CHARCOAL</option>
                        <option value="CITRUS">CITRUS</option>
                        <option value="KOPI">KOPI</option>
                        <option value="CREME">CREME</option>
                        <option value="CUCUMEBR">CUCUMBER</option>
                        <option value="SPICE">SPICE</option>
                        <option value="APRICOT">APRICOT</option>
                        <option value="LAVENDER">LAVENDER</option>
                        <option value="LAVENDER SAGE">LAVENDER SAGE</option>
                        <option value="TEH">TEH</option>
                        <option value="ROSE">ROSE</option>
                        <option value="ROSE VANILLA">ROSE VANILLA</option>
                        <option value="TEA TREE">TEA TREE</option>
                        <option value="WOODY">WOODY</option>
                        <option value="YLANG YLANG">YLANG YLANG</option>
                        <option value="ZASMINE">ZASMINE</option>
                        <option value="ZEN">ZEN</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="quantity" class="form-label">Quantity <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="product_quantity" id="quantity" type="number" class="form-control" placeholder="Enter Quantity" value="" required min="0">
                </div>
                <div class="col-md-3">
                    <label for="product_image" class="form-label">Image</label>
                    <input name="product_image" id="product_image" type="text" class="form-control" placeholder="Enter image filename" value="">
                </div>
            </div>
                <hr class="mt-4 mb-3">

                <div>
                    <button type="submit" name="create" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Create
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
                    Product List
                </h5>
                <small class="text-muted">View and manage all products in the inventory</small>
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
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>POO1</td>
                        <td>Road Bike</td>
                        <td>$1,200.00</td>
                        <td>Cervelo</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-info text-white">
                                <i class="bi bi-image"></i>
                            </button>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">No products found</td>
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