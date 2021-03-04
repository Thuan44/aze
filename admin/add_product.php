<?php include_once 'header_admin.php' ?>

<?php
@$categoryId = $_POST['category_id'];
@$productId = $_POST['product_id'];
@$productName = htmlspecialchars($_POST['product_name']);
@$productPrice = htmlspecialchars($_POST['product_price']);
@$productStock = htmlspecialchars($_POST['product_stock']);
@$productDescription = htmlspecialchars($_POST['product_description']);

$listCategories = listCategories();

if (isset($_POST['add'])) {
    addProduct($productName, $productDescription, $productPrice, $productStock, $categoryId);
}
?>



<div class="container">
    <h1 class="rounded border p-2 mt-5 mb-4  text-center text-white bg-dark">Ajouter un produit</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?>" enctype="multipart/form-data" method="POST">

        <fieldset>

            <legend class="text-center">Que souhaitez-vous ajouter ?</legend>

            <!-- Lists -->
            <div class="row">

                <!-- Categories -->
                <div class="col-12">
                    <div class="form-group border">
                        <select class="custom-select" name="category_id" onChange="submit()" required>
                            <option selected="">1. Choisissez une catégorie</option>
                            <?php foreach ($listCategories as $category) : ?>

                                <option value="<?php echo $category['category_id'] ?>" <?php if ($category['category_id'] === @$_POST['category_id']) { echo "selected"; } ?>><?= $category['category_name'] ?>
                                </option>
                                
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

            </div>

            <!-- Inputs -->
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control border" type="text" name="product_name" placeholder="Choisissez un nom">
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control border" type="text" name="product_price" placeholder="Choisissez un prix">
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <input class="form-control border" type="text" name="product_stock" placeholder="Définissez le stock">
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="form-group">
                <textarea class="form-control border" name="product_description" id="Product description" value="Ajoutez une description" rows="3" style="color: #919AA1;">Description du produit</textarea>
            </div>

            <!-- Upload image -->
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="custom-file border">
                        <input type="file" name="file[]" multiple="multiple" class="custom-file-input border" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choisissez une image principale</label>
                    </div>
                </div>

            <!-- Add Button -->
            <button type="submit" name="add" class="btn btn-dark btn-md btn-block btn-midradius">Ajouter à la base de données</button>

        </fieldset>

    </form>

</div>

<?php include_once 'footer_admin.php' ?>