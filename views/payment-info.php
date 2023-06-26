<div class="modal fade" id="payment-info" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center p-2">
                <b class="modal-title ml-2" style="line-height: 1.3;">Cara Pembelian & Pembayaran di <?= $project_name ?></b>
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Silahkan pilih produk yang ingin kamu beli. <a class="underline" href="<?= base_url() ?>?page=product">Klik disini</a></li>
                    <li>Atur pesanan kamu pada di bagian atur pesanan, Lalu klik tombol bayar sekarang. Setelah itu kamu akan diarahkan ke checkout.</li>
                    <li>Pada dihalaman checkout, kamu akan diminta untuk mengisi data diri kamu. Dan masukkan nominal uang kamu (tidak boleh kurang dari total).</li>
                    <li>Setelah itu kamu akan diarahkan ke halaman invoice pembayaran. Selesai!</li>
                    <li>Happy Shopping!</li>
                </ol>
            </div>
            <div class="modal-footer p-1">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#btn-paymentinfo").on("click", function (e) { // <-- Ketika tombol payment info (di navbar) di klik
            e.preventDefault();

            $("#payment-info").modal("show"); // <-- Tampilkan modal payment info
        })
    });
</script>