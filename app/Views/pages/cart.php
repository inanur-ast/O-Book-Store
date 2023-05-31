<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-md mt-4">
    <?php if (!empty(session()->getflashdata('delete'))) { ?>
        <div class="alert alert-warning">
            <?php echo session()->getflashdata('delete') ?>
        </div>
    <?php } ?>
    <?php
    $cart = $cart->contents();
    if (empty($cart)) {
        echo '<div class="container"><h2>';
        echo 'Opps Keranjang masih kosong';
        echo '</div></h2>';
    ?>

    <?php } else { ?>
        <div class="container">
            <a href="<?= base_url('cart/clear') ?>" class="delete-header" >Hapus Keranjang</a>
        </div>
        <?php echo form_open('Cart/update') ?>
        <div class="row">
            <div class="col-sm-8">
                <?php
                $total = 0;
                $i = 1;
                foreach ($cart as $key => $value) :
                    $total = $total + $value['subtotal'];
                ?>
                    <ul>
                        <li class="cart-summary">
                            <div class="summary-ctr">
                                <div class="summary-item">
                                    <div class="cart-img">
                                        <img src="/sampul/<?= $value['options']['sampul']; ?> " alt="" width="100">
                                    </div>
                                    <div class="cart-info">
                                        <h6><?= $value['name']; ?></h6>
                                        <p class="author"><?= $value['options']['author']; ?></p>
                                        <p class="price"><?= number_to_currency($value['price'], 'IDR') ?></p>
                                    </div>
                                </div>
                                <div class="summary-qty">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="qty-button">-</button>
                                    <input type="number" min="1" name="qty<?= $i++ ?>" class="qty-input" value="<?= $value['qty']; ?>">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="qty-button">+</button>
                                </div>
                                <div class="summary-total">
                                    <p class="subTotal">Subtotal</p>
                                    <p class="price"><?= number_to_currency($value['subtotal'], 'IDR') ?></p>
                                    <br>
                                    <a href="<?= base_url('cart/delete/' . $value['rowid']) ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
            <div class="col-sm-4">
                <div class="checkout-area">
                    <p class="total">
                        <span class="total-qty">Total jumlah produk</span>
                        <span class="total-price"><?= number_to_currency($total, 'IDR') ?></span>
                    </p>
                    <button type="button"> LANJUTKAN PEMBAYARAN </button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    <?php } ?>


</div>

<?= $this->endSection(); ?>