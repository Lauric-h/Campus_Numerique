<?php


// $host = 'localhost';
// $dbname = 'bdd_site_entreprise';
// $user = 'lauric';
// $password = 'lauric';

function getConnection() {
    $connection = null;
    try {
        $connection = new PDO("mysql:host=localhost;dbname=bdd_site_entreprise;charset=utf8", "lauric", "lauric", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    }
    catch(Exception $e) {
         die('Erreur : ' . $e->getMessage());
    }
    return $connection;
}

$bdd = getConnection();

// First query on 1 table
function getAllProducts($bdd) {
    $queryProduct = $bdd->query('SELECT * FROM products');
    while($dataProduct = $queryProduct->fetch()) {
        ?>
        <tr>
            <td><?= $dataProduct['name'] ?></td>
            <td><?= $dataProduct['description'] ?></td>
            <td><?= $dataProduct['price'] ?></td>
            <td><?= $dataProduct['weight'] ?></td>
            <td><?= $dataProduct['availability'] ?></td>
            <td><?= $dataProduct['stock'] ?></td>
        </tr>
    <?php
    }
    // end query
    $queryProduct->closeCursor();
}

// Second query on 1 table
function getDayOrder($bdd) {
    $queryDayOrder = $bdd->query('SELECT * FROM orders WHERE date LIKE \'%2021-01-28%\'');
    while ($dataDayOrder = $queryDayOrder->fetch()) {
        ?>
        <p>Commande n°<?= $dataDayOrder['id'] ?> commandée le <?= date('d-m-Y h:i:s', strtotime($dataDayOrder['date'])); ?></p>
        <?php
    }
    // end query
    $queryDayOrder->closeCursor();
}

// 1st query on several tables
function sumTotalOrders($bdd) {
    $querySumTotalOrders = $bdd->query(
        'SELECT customers.first_name, customers.last_name, SUM(op.quantity * products.price) as total FROM customers
        JOIN orders ON customers.id = orders.customers_id   
        JOIN orders_products op ON orders.id = op.orders_id
        JOIN products ON op.products_id = products.id
    GROUP BY customers.id');
    while($dataSumTotalOrders = $querySumTotalOrders->fetch()) {
        ?>
        <p>Le  client <?= $dataSumTotalOrders['first_name'] . " " . $dataSumTotalOrders['last_name']; ?> a commandé pour <?= $dataSumTotalOrders['total'] ?>€ au total</p>
        <?php
    }
    // end query
    $querySumTotalOrders->closeCursor();
}

// 2nd query on several tables
function sumDayOrders($bdd) {
    $querySumDayOrders = $bdd->query(
        'SELECT SUM(products.price * orders_products.quantity) as total FROM products
            JOIN orders_products ON products.id = orders_products.products_id
            JOIN orders ON orders.id = orders_products.orders_id
        WHERE date LIKE \'%2021-01-28%\'');
    while ($dataDayOrders = $querySumDayOrders->fetch()) {
    ?>
        <p>Total des commandes du jour : <?= $dataDayOrders['total'] ?>€</p>
    <?php
    }
    // end query
    $querySumDayOrders ->closeCursor();
}

// insertion
function addProduct($bdd, $name, $description, $price, $weight, $picture, $availability, $stock) {
    $queryAddProduct = $bdd->prepare(
        'INSERT INTO products(name, description, price, weight, picture, availability, stock)
         VALUES(:name, :description, :price, :weight, :picture, :availability, :stock)');
    $queryAddProduct->execute(array(
        'name' => $name,
        'description' => $description,
        'price' => $price,
        'weight' => $weight,
        'picture' => $picture,
        'availability' => $availability,
        'stock' => $stock
    ));
}

function displayCategories($bdd) {
    $queryDisplayCategories = $bdd->query('SELECT * from categories');
    while($dataDisplayCategories = $queryDisplayCategories->fetch()) {
        ?>
        <option value="<?= $dataDisplayCategories['name'] ?>"><?= $dataDisplayCategories['name'] ?></option>
        <?php
    }
    $queryDisplayCategories ->closeCursor();
}

function getCategoryId($bdd, $category) {
    $queryGetCategoryId = $bdd->prepare('SELECT id FROM categories WHERE name = ?');
    return $queryGetCategoryId->execute(array($category));
}

function getProductId($bdd) {
    $queryGetProductId = $bdd->query('SELECT id from products ORDER BY id DESC LIMIT 1');
    $dataGetProductId = $queryGetProductId->fetch();  
    return $dataGetProductId['id'];
}

function addProductCategory($bdd, $categoryId, $productId) {
    $queryAddProductCategory = $bdd->prepare('INSERT INTO categories_products(categories_id, products_id) VALUES(:categories_id, :products_id)');
    $queryAddProductCategory->execute(array(
        'categories_id' => $categoryId,
        'products_id' => $productId
    ));
}

// deletion
function displayProducts($bdd) {
    $queryDisplayProducts = $bdd->query('SELECT * from products');
    while($dataDisplayProducts = $queryDisplayProducts->fetch()) {
        ?>
        <option value="<?= $dataDisplayProducts['name'] ?>"><?= $dataDisplayProducts['name'] ?></option>
        <?php
    }
    $queryDisplayProducts->closeCursor();
}

function deleteProduct($bdd, $products) {
    $queryDeleteProducts = $bdd->prepare('DELETE FROM products WHERE name = ?');
    $queryDeleteProducts->execute(array($products));
}




?>