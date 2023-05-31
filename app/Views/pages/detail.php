<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container product">
    <div class="product-view">
        <div class="img-container" onclick="window.location.href='https://raihan-w.github.io/display/<?= $product['link']; ?>/index.html'">
            <img src="/sampul/<?= $product['sampul']; ?>" alt="">
        </div>
        <div class="container">
            <button class="btn-product" data-toggle="modal" data-target="#myModal"> BELI SEKARANG </button>
        </div>
    </div>
    <div class="product-info">
        <div class="detail">
            <div class="row">
                <div class="col-md">
                    <p class="discount"> Rp.87.000 </p>
                </div>
                <div class="col-md">
                    <p class="price"> <?= number_to_currency($product['harga'], 'IDR'); ?> </p>
                </div>
            </div>
            <h2>
                <?= $product['judul']; ?>
            </h2>
            <div style="margin: 5%;">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
            </div>
        </div>
        <div class="detail">
            <p>
                <?= $product['deskripsi']; ?>
            </p>

            <table align="center" border="0" width="500">
                <tr>
                    <td> Pengarang </td>
                    <td> <?= $product['pengarang']; ?> </td>
                </tr>
                <tr>
                    <td> ISBN </td>
                    <td> <?= $product['ISBN']; ?> </td>
                </tr>
                <tr>
                    <td> Kategori </td>
                    <td> <?= $product['kategori']; ?> </td>
                </tr>
                <tr>
                    <td> Penerbit </td>
                    <td> <?= $product['penerbit']; ?> </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <?php
        echo form_open('Cart/add');
        echo form_hidden('id', $product['id']);
        echo form_hidden('price', $product['harga']);
        echo form_hidden('name', $product['judul']);
        //option
        echo form_hidden('sampul', $product['sampul']);
        echo form_hidden('author', $product['pengarang']);
        ?>

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Jumlah item akan bertambah di keranjang belanja</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="/sampul/<?= $product['sampul']; ?>" width="100">
                        </div>
                        <div class="col-sm-8">
                            <table>
                                <tr>
                                    <td>
                                        <h5>
                                            <?= $product['judul']; ?>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= $product['pengarang']; ?></td>
                                </tr>
                                <tr>
                                    <td> <?= number_to_currency($product['harga'], 'IDR'); ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"> Tambah ke keranjang </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<?= $this->endSection(); ?>