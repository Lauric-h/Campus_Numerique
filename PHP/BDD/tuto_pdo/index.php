<?php
require_once 'database.php';
require_once 'web/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $picture = NULL;
    $availability = true;
    $stock = $_POST['stock'];
    
    addProduct($bdd, $name, $description, $price, $weight, $picture, $availability, $stock);
    $productId = getProductId($bdd);
    $categoryId = getCategoryId($bdd, $_POST['category']);
    addProductCategory($bdd, $categoryId, $productId);

}


?>

<body>
    <h1>Requêtes</h1>
    <h2>Liste des produits</h2>
    <table>
        <thead>
            <tr>
                <th>
                    Nom
                </th>
                <th>
                    Description
                </th>
                <th>
                    Prix
                </th>
                <th>
                    Poids
                </th>
                <th>
                    Dispo
                </th>
                <th>
                    Stock
                </th>
            </tr>
        </thead>
        <tbody>
            <!-- php -->
            <?php echo getAllProducts($bdd); ?>
        </tbody>
    </table>

    <h2>Liste des commandes du jour</h2>

    <div>
       <?php echo getDayOrder($bdd); ?>
    </div>

    <h2>Total commandes par client</h2>
    <div>
        <?= sumTotalOrders($bdd) ?>
    </div>

    <h2>Total commandes du jour</h2>
    <div>
        <?php echo sumDayOrders($bdd); ?>
    </div>

    <h2>Ajout d'un produit</h2>
    <form action="" method="POST">
        <input type="text" autocomplete="off" placeholder="Nom du produit" name="name">
        <input type="text" autocomplete="off" placeholder="Description" name="description">
        <input type="number" autocomplete="off" placeholder="Prix" min="0" name="price">
        <input type="number" autocomplete="off" placeholder="Poids" min="0" name="weight">
        <input type="number" autocomplete="off" placeholder="Stock" min="0" name="stock">
        <select name="category">
            <option selected value="">Sélectionner une catégorie</option>
            <?= displayCategories($bdd) ?>
        </select>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Supprimer un article</h2>
    <form action="delete.php" method="POST">
        <select name="product">
                <option selected value="">Sélectionner un produit</option>
                <?= displayProducts($bdd) ?>
        </select>
        <button type="submit">Supprimer</button>
    </form>


</body>

<?php
require_once 'web/footer.php';
?>