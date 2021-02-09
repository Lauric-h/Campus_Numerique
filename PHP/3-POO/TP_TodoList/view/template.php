<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css"/>
    <link rel="stylesheet" href="view/style.css">
    <title>Todo list</title>
</head>
<body>

<table>
    <tr>
        <th></th>
        <th class="taskname-column">Todo</th>
        <th></th>
    </tr>

    <?php foreach ($tasks as $task): ?>
        <tr>
            <form method='get' action=''>
                <td>
                    <input type='hidden' name='id' value=<?= $task["id"]?>>
                    <?php if ($task["checked"]): ?>
                    <button class='btn-no-style' type='submit' name='action' value='uncheck'><i class='checked-icon fas fa-check'></i></button>
                    <?php else: ?>
                    <button class='btn-no-style' type='submit' name='action' value='check'><i class='checked-icon-grey fas fa-check'></i></button>
                </td>
                <?php endif ?>
                <td class='<?= ($task["checked"] ? 'checked' : '') ?>'>
                <?= $task["description"] ?>
                </td>
                <td>
                    <button class='btn-no-style' type='submit' name='action' value='delete'><i class='trash-icon fas fa-trash'></i></button>
                </td>
            </form>
        </tr>
    <?php endforeach ?>

</table>

<form method="get" action="">
    <input type="text" name="name" autofocus="autofocus"/>
    <button type="submit" name="action" value="add">Add Item</button>
</form>

</body>
</html>