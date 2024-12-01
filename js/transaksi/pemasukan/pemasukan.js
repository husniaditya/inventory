$('#pemasukan-table').DataTable({
    responsive: true,
    order: [],
    dom: 'frltip',
    // "pageLength": 7,
    scrollX: true,
    scrollY: '350px', // Set the desired height here
});


$(document).ready(function () {
    // Get the `id` and `method` from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const method = urlParams.get('method');
    var param = 'pemasukan';

    // onCHange datepicker52 Tanggal
    $('#datepicker52').on('change', function () {
        // Get the current value of the datepicker
        let tanggal = $("#datepicker52").val();
        let idBarang = $("#selectize-select2").val();

        $.ajax({
            url: 'api/getDetailBarang.php',
            method: 'POST',
            data: JSON.stringify({ id: idBarang, param: param, tanggal: tanggal }), // Use the correct key
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.result.message === "OK" && response.data && response.data.Barang.length > 0) {
                    response.data.Barang.forEach(function (item) {
                        $("#NO_BATCH").val(item.NO_BATCH);
                    });
                } else {
                    console.error('Error fetching barang data:', response.result.message);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching barang data:', status, error);
            }
        });
    });
    
    if ($('#selectize-select').length > 0) {
        idKategori = $('#selectize-select').selectize();
        kategori = idKategori[0].selectize;
        
        kategori.on('change', function (kategori) {
            idBarang.clearOptions();
            $("#SATUAN").val('');
            $("#NO_BATCH").val('');
            let tanggal = $("#datepicker52").val();

            $.ajax({
                url: 'api/getDataBarang.php',
                method: 'POST',
                data: JSON.stringify({ id: kategori, tanggal: tanggal }), // Use the correct key
                contentType: 'application/json',
                dataType: 'json',
                success: function (response) {
                    if (response.result.message === "OK" && response.data && response.data.Barang.length > 0) {
                        response.data.Barang.forEach(function (item) {
                            // Convert &quot; into " for correct display in HTML
                            var namaBarang = item.NAMA_BARANG.replace(/&quot;/g, '"');
                            
                            // Add the item to the dropdown
                            idBarang.addOption({ value: item.ID_BARANG, text: namaBarang });
                        });
                        idBarang.setValue('');
                    } else {
                        console.error('Error fetching barang data:', response.result.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching barang data:', status, error);
                }
            });                       
        });
    }

    if ($('#selectize-select2').length > 0) {
        barangSelectize = $('#selectize-select2').selectize();
        idBarang = barangSelectize[0].selectize;

        idBarang.on('change', function (idBarang) {
            // Get the current value of the datepicker
            let tanggal = $("#datepicker52").val();

            $.ajax({
                url: 'api/getDetailBarang.php',
                method: 'POST',
                data: JSON.stringify({ id: idBarang, param: param, tanggal: tanggal }), // Use the correct key
                contentType: 'application/json',
                dataType: 'json',
                success: function (response) {
                    if (response.result.message === "OK" && response.data && response.data.Barang.length > 0) {
                        response.data.Barang.forEach(function (item) {
                            $("#SATUAN").val(item.SATUAN);
                            $("#NO_BATCH").val(item.NO_BATCH);
                        });
                    } else {
                        console.error('Error fetching barang data:', response.result.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching barang data:', status, error);
                }
            });
        });
    }

    // Check if both `id` and `method` are available
    if (id && method === 'edit') {
        $.ajax({
            url: 'api/getDetailPemasukan.php',
            method: 'POST',
            data: JSON.stringify({ id: id }),
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.result.message === "OK" && response.data && response.data.length > 0) {
                    const data = response.data[0];
                    $("#datepicker52").val(data.TANGGAL_MASUK);
                    $("#NOMOR_PO").val(data.NOMOR_PO);
                    $("#KETERANGAN_PEMASUKAN").val(data.KETERANGAN_PEMASUKAN);
                    $("#selectize-select")[0].selectize.setValue(data.ID_KATEGORI);
                    setTimeout(function () {
                        $("#selectize-select2")[0].selectize.setValue(data.ID_BARANG);
                    }, 200);
                    $("#SATUAN").val(data.SATUAN);
                    $("#datepicker12").val(data.EXPIRATION);
                    $("#NO_BATCH").val(data.NO_BATCH);
                    $("#QTY").val(data.QTY);
                    $("#KETERANGAN_PERSEDIAAN").val(data.KETERANGAN_PERSEDIAAN);
                } else {
                    console.error('Error: Invalid response or no data available');
                }
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    } else if (id && method === 'view') {
        $.ajax({
            url: 'api/getDetailPemasukan.php',
            method: 'POST',
            data: JSON.stringify({ id: id }),
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.result.message === "OK" && response.data && response.data.length > 0) {
                    const data = response.data[0];
                    $("#ID_PEMASUKAN").val(data.ID_PEMASUKAN);
                    $("#NOMOR_PO").val(data.NOMOR_PO);
                    $("#TANGGAL_MASUK").val(data.TANGGAL_MASUK);
                    $("#KETERANGAN_PEMASUKAN").val(data.KETERANGAN_PEMASUKAN);
                    $("#ID_KATEGORI").val(data.NAMA_KATEGORI);
                    $("#ID_BARANG").val(data.NAMA_BARANG);
                    $("#SATUAN").val(data.SATUAN);
                    $("#datepicker12").val(data.EXPIRATION);
                    $("#NO_BATCH").val(data.NO_BATCH);
                    $("#QTY").val(data.QTY);
                    $("#KETERANGAN_PERSEDIAAN").val(data.KETERANGAN_PERSEDIAAN);
                } else {
                    console.error('Error: Invalid response or no data available');
                }
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }
});



