<!-- cara panggil modal -->

<a href="" class="btn text-dark p-0" data-bs-toggle="modal" data-bs-target="#detail_<?php echo $produk['id_produk'] ?>"> <i class="fas fa-eye text-primary"></i> View
    Detail</a>
<!-- modal untuk menampilkan detail-->
<form action="detail_modal.php" method="post">
    <div class="modal fade" id="detail_<?php echo $produk['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="foto_produk/<?php echo $produk['foto_produk'] ?>" width="50%" alt="">
                    <table class="table">
                        <tr>
                            <td>
                                Nama Produk
                            </td>
                            <td>
                                <?php echo $produk['nama_produk'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Harga Produk
                            </td>
                            <td> Rp<?php echo number_format($produk['harga_produk']) ?></td>
                        </tr>

                        </tr>
                        <tr>
                            <td>
                                Berat
                            </td>
                            <td><?php echo number_format($produk['berat_produk']) ?> Gram</td>
                        </tr>
                        <tr>
                            <td>
                                Kondisi
                            </td>
                            <td> <?php echo ($produk['kondisi_produk']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Stok
                            </td>
                            <td> <?php echo ($produk['stok_produk']) ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Min. Pembelian </td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <strong>Deskripsi Produk</strong>
                            </td>
                        <tr>
                        <tr>
                            <td colspan="2"><?php echo ($produk['deskripsi_produk']) ?></td>
                        </tr>

                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <a href="beli?id=<?php echo $produk['id_produk']; ?>" class="btn btn-primary">masuk keranjang</a>

                </div>
            </div>
        </div>

    </div>
</form>
<!-- akhir Modal -->