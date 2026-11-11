<?php 
ob_start();
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <h2 class="mb-1">Staffs</h2>
        <p class="text-muted mb-0">Manage and track all your staff members </p>
    </div>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <div class="row g-0 align-items-center mb-3">
            <div class="col">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square text-primary me-2"></i>
                    <?php echo isset($astaff) ? 'Edit Staff' : 'Staff Form'; ?>
                </h5>
                <small class="text-muted">Fill in the details of a staff member</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary">* Required fields</span>
            </div>
        </div>

        <hr>

        <form action="<?= BASE_URL ?>staffcontroller/<?= isset($astaff) ? 'update' : 'save' ?>" method="post" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-md-3">
                    <label for="cid" class="form-label">Staff ID <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="staff_num" id="staff_num" type="text" class="form-control" placeholder="Enter Staff ID" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_num']) : ''; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="name" class="form-label">Name <span class="text-danger" aria-hidden="true">*</span></label>
                    <input name="staff_name" id="staff_name" type="text" class="form-control" placeholder="Enter Staff Name" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_name']) : ''; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Phone <span class="text-danger" arial-hidden="true">*</span></label>
                    <input name="staff_phone" id="staff_phone" type="text" class="form-control" placeholder="Enter Phone Number" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_phone']) : ''; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Email Address <span class="text-danger" arial-hidden="true">*</span></label>
                    <input name="staff_email" id="staff_email" type="email" class="form-control" placeholder="Enter Email Address" value="<?php echo isset($astaff) ? htmlspecialchars($astaff['fld_staff_email']) : ''; ?>" required>
                </div>    
            </div>
            
            <?php if (isset($astaff)): ?>
                <input type="hidden" name="original_staff_num" value="<?php echo htmlspecialchars($astaff['fld_staff_num']); ?>">
            <?php endif; ?>

            <hr class="mt-4 mb-3">

            <div>
                <button type="submit" name="<?= isset($astaff) ? 'update' : 'create' ?>" class="btn btn-primary">
                    <i class="bi bi-save me-1"></i><?= isset($astaff) ? 'Update' : 'Create' ?>
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="bi bi-arrow-counterclockwise me-1"></i>Clear
                </button>
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
                    Staff List
                </h5>
                <small class="text-muted">View and manage all staff members</small>
            </div>
            <div class="col-auto">
                <span class="badge bg-success">Total: <?php echo count($staffs); ?> items</span>
            </div>
        </div>

        <hr>

        <div class="table-responsive">
            <table class="table table-stripped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($staffs)): ?>
                        <?php foreach ($staffs as $staff): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($staff['fld_staff_num']); ?></td>
                                <td><?php echo htmlspecialchars($staff['fld_staff_name']); ?></td>
                                <td><?php echo htmlspecialchars($staff['fld_staff_phone']); ?></td>
                                <td><?php echo htmlspecialchars($staff['fld_staff_email']); ?></td>
                                <td>
                                    <a href="<?= BASE_URL ?>staffcontroller/edit/<?= htmlspecialchars($staff['fld_staff_num']); ?>" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?= BASE_URL ?>staffcontroller/delete/<?= htmlspecialchars($staff['fld_staff_num']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                             </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No staff members found</td>
                        </tr>
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