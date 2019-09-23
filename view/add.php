<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Create new Product</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>Product name:</label>
                    <input type="text" class="form-control" name="name"  placeholder="Nhập tên" required>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price" placeholder="Input Price" required>
                </div>
                <div class="form-group">
                    <label>Product_detail</label>
                    <input type="text" class="form-control" name="product_detail" placeholder="Input Product Detail" required>
                </div>
                <div class="form-group">
                    <label>Vendor</label>
                    <input type="text" class="form-control" name="vendor" placeholder="Input vendor name" required>
                </div>
                <button type="submit" class="btn btn-primary">ADD NEW</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
            </form>
        </div>
    </div>
</div>