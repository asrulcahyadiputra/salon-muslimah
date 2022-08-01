<!-- <div class="container">
    <div class="row">
        <div class="col-sm-4 text-center jam">
            <div class="jam" style="border-radius: 8px;">
                <span id="jam">00</span>
                <span>:</span>
                <span id="menit">00</span>
                <span>:</span>
                <span id="detik">00</span>
            </div>
        </div>
        <div class="col-sm-8 text-center jam"></div>
    </div>
</div> -->
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2021
        <!-- <div class="bullet"></div> Design By <a href="https://nauval.in/">Daniel Alvaro</a> -->
    </div>
    <div class="footer-right">
        2.3.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('template'); ?>/assets/js/stisla.js"></script>


<!-- Template JS File -->
<script src="<?= base_url('template'); ?>/assets/js/scripts.js"></script>
<script src="<?= base_url('template'); ?>/assets/js/custom.js"></script>



<!-- Page Specific JS File -->
<!-- <script src="<? #= base_url('template'); 
                    ?>/assets/js/page/index-0.js"></script> -->
<!-- My Script -->
<script src="<?= base_url('/js/script.js'); ?>"></script>
<script src="<?= base_url('/js/service.js'); ?>"></script>
<script src="<?= base_url('currency.js') ?>"></script>
<script src="<?= base_url() ?>/validate/jquery.validate.min.js"></script>
<script>
    function previewImg() {
        const sampul = document.querySelector('#user_image');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        sampulLabel.textContent = sampul.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result
        }
    }
</script>
<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#pembelian').jAutoCalc('destroy');
            $('form#pembelian tr.line_items').jAutoCalc({
                keyEventsFire: true,
                // decimalPlaces: 2,
                emptyAsZero: true,
                // smartIntegers: true,
                thousandOpts: ['']
            });
            // $('form#pembelian').jAutoCalc({
            //     // decimalPlaces: 0,
            //     // smartIntegers: true,
            //     // thousandOpts: [',', '.', ' ']
            // });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove', function() {
            $(this).parents('tr').remove();
        });

        $('.row-add').click(function(e) {
            e.preventDefault();
            $('#calculation').append(`
            <tr class="line_items">
                <td>
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="namaProduk">Preference</label>
                            <select class="custom-select mr-sm-2" id="namaProduk1" name="namaProduk[]">
                                <?php foreach ($dataStockBahan->getResult() as $row) : ?>
                                    <?php if ($row->namaBarang !== null) : ?>
                                    <option id="<?= $row->namaBarang; ?>" value="<?= $row->namaBarang; ?>"><?= $row->namaBarang; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-6">
                                <input type="number" class="form-control text-right" id="kuantitas" name="kuantitas[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control text-right" id="price" name="price[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control text-right" name="total[]" value="" jAutoCalc="{#kuantitas} * {#price}" readonly>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="#" class="row-remove btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>
<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#pemesanan').jAutoCalc('destroy');
            $('form#pemesanan tr.line_items_pemesanan').jAutoCalc({
                keyEventsFire: true,
                emptyAsZero: true,
                thousandOpts: ['']
            });
            $('form#pemesanan').jAutoCalc({
                decimalPlaces: 0,
                emptyAsZero: true,
                thousandOpts: ['']
            });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove-pemesanan', function() {
            $(this).parents('tr').remove();
        });

        $('.row-add-pemesanan').click(function(e) {
            e.preventDefault();
            $('#calculationPemesanan').append(`
            <tr class="line_items_pemesanan">
                <td>
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="jenisService">Preference</label>
                            <select class="custom-select mr-sm-2" id="jenisService1" name="jenisService[]" style="text-transform: capitalize;">
                                <?php foreach ($dataJenisService->getResult() as $row) : ?>
                                    <option value="<?= $row->jenisService; ?>" style="text-transform: capitalize;"><?= $row->jenisService; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control text-right" id="pricePemesanan" name="pricePemesanan[]">
                            </div>
                        </div>
                    </div>
                </td>
                <input type="hidden" class="form-control text-right totalservice" id="totalservice" name="totalService[]" value="" jAutoCalc="{#pricePemesanan}" readonly>
                <td><a href="#" class="row-remove-pemesanan btn btn-danger mt-2"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>
<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#dataBeban').jAutoCalc('destroy');
            $('form#dataBeban tr.line_items').jAutoCalc({
                keyEventsFire: true,
                // decimalPlaces: 2,
                emptyAsZero: true,
                // smartIntegers: true,
                thousandOpts: ['']
            });
            // $('form#pembelian').jAutoCalc({
            //     // decimalPlaces: 0,
            //     // smartIntegers: true,
            //     // thousandOpts: [',', '.', ' ']
            // });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove-beban', function() {
            $(this).parents('tr').remove();
        });

        $('.row-add-beban').click(function(e) {
            e.preventDefault();
            $('#calculationBeban').append(`
            <tr class="line_items">
                <td>
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="jenisBeban">Preference</label>
                            <select class="custom-select mr-sm-2" id="jenisBeban1" name="jenisBeban[]">
                            <option selected>Pilih jenis beban..</option>
                            <?php foreach ($dataJenisBeban->getResult() as $row) : ?>
                                <option value="<?= $row->jenisBeban; ?>"><?= $row->jenisBeban; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control text-right" name="priceBeban">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control text-right" name="totalBeban[]" value="" jAutoCalc="{priceBeban}" readonly>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>

<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#dataTransaksi').jAutoCalc('destroy');
            $('form#dataTransaksi tr.line_items').jAutoCalc({
                keyEventsFire: true,
                // decimalPlaces: 2,
                emptyAsZero: true,
                // smartIntegers: true,
                thousandOpts: ['']
            });
            // $('form#pembelian').jAutoCalc({
            //     // decimalPlaces: 0,
            //     // smartIntegers: true,
            //     // thousandOpts: [',', '.', ' ']
            // });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove-transaksi', function() {
            $(this).parents('tr').remove();
        });

        $('.row-add-transaksi').click(function(e) {
            e.preventDefault();
            $('#calculationTransaksi').append(`
            <tr class="line_items">
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="keteranganTransaksi" name="keteranganTransaksi[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="jenisTransaksi">Preference</label>
                            <select class="custom-select mr-sm-2" id="jenisTransaksi1" name="jenisTransaksi[]">
                            <?php foreach ($dataJenisTransaksiLainnya->getResult() as $row) : ?>
                                <option value="<?= $row->jenisTransaksiLainnya; ?>" style="text-transform: capitalize;"><?= $row->jenisTransaksiLainnya; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control text-right" name="priceTransaksi">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control text-right" name="totalTransaksi[]" value="" jAutoCalc="{priceTransaksi}" readonly>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>

<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#dataAset').jAutoCalc('destroy');
            $('form#dataAset tr.line_items').jAutoCalc({
                keyEventsFire: true,
                // decimalPlaces: 2,
                emptyAsZero: true,
                // smartIntegers: true,
                thousandOpts: ['']
            });
            // $('form#pembelian').jAutoCalc({
            //     // decimalPlaces: 0,
            //     // smartIntegers: true,
            //     // thousandOpts: [',', '.', ' ']
            // });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove-aset', function() {
            $(this).parents('tr').remove();
        });

        // $(document).on('load', function(e) {
        // if (isEmpty($('.simpanStock'))) {
        //     console.log('oke');
        // }
        // })

        $('.row-add-aset').click(function(e) {
            e.preventDefault();
            $('#calculationAset').append(`
            <tr class="line_items">
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="namaAset" name="namaAset[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="jenisAset">Preference</label>
                            <select class="custom-select mr-sm-2" id="jenisAset1" name="jenisAset[]">
                                <option id="AsetLancar" value="Aset Lancar">Aset Lancar</option>
                                <option id="AsetTetap" value="Aset Tetap">Aset Tetap</option>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="number" class="form-control text-right" min="1" id="kuantitasAset" name="kuantitasAset[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control text-right" id="priceAset" name="priceAset[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control text-right" name="totalAset[]" value="" jAutoCalc="{#priceAset} * {#kuantitasAset}" readonly>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="#" class="row-remove-aset btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>

<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#dataBahan').jAutoCalc('destroy');
            $('form#dataBahan tr.line_items').jAutoCalc({
                keyEventsFire: true,
                // decimalPlaces: 2,
                emptyAsZero: true,
                // smartIntegers: true,
                thousandOpts: ['']
            });
            // $('form#pembelian').jAutoCalc({
            //     // decimalPlaces: 0,
            //     // smartIntegers: true,
            //     // thousandOpts: [',', '.', ' ']
            // });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove-bahan', function() {
            $(this).parents('tr').remove();
        });

        $('.row-add-bahan').click(function(e) {
            e.preventDefault();
            $('#calculationBahan').append(`
            <tr class="line_items">
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="namaBarang" name="namaBarang[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="number" class="form-control text-right" min="1" id="kuantitasBarang" name="kuantitasBarang[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control text-right" id="priceBarang" name="priceBarang[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-md">
                                <input type="text" class="form-control text-right" name="totalBahan[]" value="" jAutoCalc="{#priceBarang} * {#kuantitasBarang}" readonly>
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="#" class="row-remove-bahan btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>

<script type="text/javascript">
    $(function() {

        function autoCalcSetup() {
            $('form#dataStock').jAutoCalc('destroy');
            $('form#dataStock tr.line_items').jAutoCalc({
                keyEventsFire: true,
                // decimalPlaces: 2,
                emptyAsZero: true,
                // smartIntegers: true,
                thousandOpts: ['']
            });
            // $('form#pembelian').jAutoCalc({
            //     // decimalPlaces: 0,
            //     // smartIntegers: true,
            //     // thousandOpts: [',', '.', ' ']
            // });
        }
        autoCalcSetup();

        $(document).on('click', '.row-remove-stock', function() {
            $(this).parents('tr').remove();
        });

        // $(document).on('click', '.simpanStock', function(e) {
        //     let jmlStock = $('#jumlahPengambilanStock').val();
        //     if (jmlStock == '') {
        //         e.preventDefault();
        //         alert('tidak boleh kosong');
        //         console.log('hi');
        //     } else if (jmlStock <= 0) {
        //         e.preventDefault();
        //         alert('tidak boleh Nol');
        //         console.log('hi');
        //     }
        // });

        if (document.querySelector('.simpanStock') == undefined) {
            // console.log('oke');
            $('#aksi').append(`
            <button class="btn btn-success simpanStock" type="button" onclick="return alert('Stock tidak mencukupi!')" name="simpanStock">Simpan Data Stock</button>
            `);
        }

        $('.row-add-stock').click(function(e) {
            e.preventDefault();
            $('#calculationStock').append(`
            <tr class="line_items">
                <td>
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2 sr-only" for="namaBarang">Preference</label>
                            <select class="custom-select mr-sm-2" id="namaBarang" name="namaBarang[]">
                                <?php foreach ($dataStockBahan->getResult() as $row) : ?>
                                    <?php if ($row->namaBarang !== null) : ?>
                                    <option id="<?= $row->namaBarang; ?>" value="<?= $row->namaBarang; ?>"><?= $row->namaBarang; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="form-row">
                        <div class="row">
                            <div class="col-8">
                                <input type="number" class="form-control text-right" min="1" id="jumlahPengambilanStock" name="jumlahPengambilanStock[]">
                            </div>
                        </div>
                    </div>
                </td>
                <td><a href="#" class="row-remove-stock btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            
                `);
            autoCalcSetup();

        });

    });
    //
</script>

</body>

</html>