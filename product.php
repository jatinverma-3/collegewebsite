<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/ind-functions.php"); 

if(isset($_GET['id'])){
    $s = "SELECT * FROM products WHERE id='" . $_GET['id'] . "'";
    $result = mysqli_query($conn,$s);
    $product = mysqli_fetch_assoc($result);
    
    // Fetch categories for the dropdown
    $cat_query = "SELECT * FROM categories";
    $cat_result = mysqli_query($conn, $cat_query);
}else{
    echo "<script>
    window.location.href='view-all-products.php';
    </script>";
}

?>

<title>Product - Euphoria</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Product Details</h3>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $_GET['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="prod-id">Product Id</label>
                                    <input type="text" class="form-control" id="prod-id" name="product-id" value="<?php echo $product['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="cid">Select Category</label>
                                    <select name="category-id" id="cid" class="form-control">
                                        <option value="" disabled>Select..</option>
                                        <?php while($row = mysqli_fetch_assoc($cat_result)) { ?>
                                            <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $product['category_id']) ? 'selected' : ''; ?>>
                                                <?php echo $row['name']; ?>
                                            </option>
                                        <?php } ?> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prod-name">Product Name</label>
                                    <input type="text" class="form-control" id="prod-name" name="name" value="<?php echo $product['product_name']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <textarea class="form-control" id="description" name="description" readonly><?php echo $product['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="main-image">Upload Cover Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="main-image" name="main-image" disabled>
                                            <label class="custom-file-label" for="main-image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <p>Uploaded Image: <a href="../vendor-dash/uploads/<?php echo $product['main_image']; ?>"><?php echo $product['main_image']; ?></a></p>
                                </div>
                                <div class="form-group">
                                    <label for="images">Upload Other Images</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="images" name="images[]" multiple accept="image/*" disabled>
                                            <label class="custom-file-label" for="images">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <p>
                                        Uploaded Image:
                                        <?php
                                        $img_array = explode(",", $product['other_images']);
                                        foreach ($img_array as $img) {
                                        ?>
                                            <a href="../vendor-dash/uploads/<?php echo $img; ?>"><?php echo $img; ?></a>
                                        <?php } ?>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Enter Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" readonly>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
include("includes/footer.php"); 
?>
