
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="2" >
    <thead>
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
</thead>
   <tbody>
    <?php foreach ($data as $item){?>
        <tr>
            <td><?= $item ['id']?></td>
            <td><?= $item ['Name']?></td>
            <td><?= $item ['Email']?></td>
            <td><?= $item ['Address']?></td>
            <td>
                    <a href="/student/edit?id=<?= $item['id']?>"> Edit </a>
                    <a href="/student/delete?id=<?= $item['id']?>"> Delete </a>
                </td>
        </tr>
        <?php }?>
   </tbody> 
</table>
</body>
</html>