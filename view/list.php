<h2>All Product list</h2>
<a href="./index.php?page=add">Add new</a>
<table class="table">
    <thead>
    <tr>
        <th>STT</th>

        <th>Name</th>
        <th>Price</th>
        <th>Product_detail</th>
        <th>Vendor</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($product as $key => $value): ?>
    <tr>
        <td><?php echo ++$key ?></td>
        <td><?php echo $value->name ?></td>
        <td><?php echo $value->price ?></td>
        <td><?php echo $value->product_detail ?></td>
        <td><?php echo $value->vendor ?></td>
        <td> <a href="./index.php?page=delete&id=<?php echo $value->id; ?>" class="btn btn-warning btn-sm">Delete</a></td>
        <td> <a href="./index.php?page=edit&id=<?php echo $value->id; ?>" class="btn btn-sm">Update</a></td>
        <?php endforeach; ?>

    </tbody>
</table>
