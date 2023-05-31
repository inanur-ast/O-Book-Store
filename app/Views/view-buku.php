<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Buku</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Sinopsis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $row) : ?>
                <tr>
                    <td> <?= $row['ISBN']; ?> </td>
                    <td> <?= $row['judul']; ?> </td>
                    <td> <?= $row['nm-kategori']; ?> </td>
                    <td> <?= $row['nm-pengarang']; ?> </td>
                    <td> <?= $row['nm-penerbit']; ?> </td>
                    <td> <?= $row['sinopsis']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>