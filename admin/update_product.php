<?php include_once 'header_admin.php'?>

<?php
@$categoryId = $_POST['category_id'];
@$productId = $_POST['product_id'];
@$brandId = $_POST['brand_id'];
@$productName = htmlspecialchars($_POST['product_name']);
@$productPrice = htmlspecialchars($_POST['product_price']);
@$productStock = htmlspecialchars($_POST['product_stock']);
@$productDescription = htmlspecialchars($_POST['product_description']);

// Update product
if(isset($_POST['update'])) {
    updateProduct($productId, $productName, $productPrice, $productStock, $productDescription);
}

// Delete Product
if(isset($_POST['delete'])) {
    deleteProduct($productId);
}

// Display values of one product into inputs
if(isset($_POST['product_id'])) {
    $getProductById = getProductById($productId);
}

$listCategories = listCategories();
$listBrands = listBrands();
$listProducts = listProducts($categoryId, $brandId);
?>


<div class="container">
    <h1 class="rounded border p-2 mt-5 mb-4 text-center text-white bg-dark">Modifier un produit</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="POST">

        <fieldset>

            <legend class="text-center">Que souhaitez-vous modifier ?</legend>

            <!-- Lists -->
            <div class="row">

                <!-- Categories -->
                <div class="col-xs-12 col-md-6">
                    <div class="form-group border">
                        <select class="custom-select" name="category_id" onChange="submit()" required>
                            <option selected="">1. Choisissez une catégorie</option>
                            <?php foreach ($listCategories as $category): ?>

                                <option value="<?php echo $category['category_id'] ?>" <?php if ($category['category_id'] === @$_POST['category_id']) { echo "selected"; }?>><?=$category['category_name']?>
                                </option>

                            <?php endforeach?>
                        </select>
                    </div>
                </div>

                <!-- Products -->
                <div class="col-xs-12 col-md-6">
                    <div class="form-group border">
                        <select class="custom-select" name="product_id" onChange="submit()" required>
                            <option>2. Choisissez un produit</option>
                            <?php foreach ($listProducts as $product): ?>
                                <option value="<?php echo $product['product_id'] ?>" <?php if ($product['product_id'] === @$_POST['product_id']) { echo "selected"; }?>><?=$product['product_name']?>
                                </option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Inputs -->
            <?php if (isset($getProductById['product_id'])) { ?>

                <div class="row">
                    <!-- Product Name -->
                    <div class="col-4">
                        <div class="form-group border">
                            <input class="form-control" type="text" name="product_name" placeholder="Nom du produit" value="<?= @$getProductById['product_name'] ?>">
                        </div>
                    </div>
                    <!-- Product Price -->
                    <div class="col-4">
                        <div class="form-group border">
                            <input class="form-control" type="text" name="product_price" placeholder="Prix du produit" value="<?= @$getProductById['product_price'] ?>">
                        </div>
                    </div>
                    <!-- Product Stock -->
                    <div class="col-4">
                        <div class="form-group border">
                            <input class="form-control" type="text" name="product_stock" placeholder="Quantité du produit" value="<?= @$getProductById['product_stock'] ?>">
                        </div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="form-group border">
                    <textarea class="form-control" name="product_description" id="Product Description" value="Description produit" rows="3" style="color: #919AA1;"><?= @$getProductById['product_description'] ?></textarea>
                </div>

                <!-- Upload extra image -->
                <div class="form-group border">
                    <div class="input-group mb-3">
                        <div class="custom-file">a
                            <input type="file" name="extra-img[]" multiple="multiple" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Extra image 1</label>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="row">
                    <div class="col-xs-6 col-md-8">
                        <button type="submit" name="update" class="btn btn-info btn-md btn-block btn-midradius">Sauvegarder modifications</button>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <button type="submit" name="delete" class="btn btn-danger btn-md btn-block btn-midradius">Supprimer produit</button>
                    </div>
                </div>
            
            <?php }; ?>

        </fieldset>

    </form>

</div>

<?php include_once 'footer_admin.php'?>