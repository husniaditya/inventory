$('#pengeluaran-table').DataTable({
    responsive: true,
    order: [],
    dom: 'frltip',
    // "pageLength": 7,
    scrollX: true,
    scrollY: '350px', // Set the desired height here
});

$(document).ready(function () {
    // OnChange Kategori Initialize selectize only if it exists
    var idKategori, kategori, barangSelectize, idBarang;
    // Get the `id` and `method` from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');
    const method = urlParams.get('method');
    const psd = urlParams.get('psd');

    if ($('#selectize-select').length > 0) {
        idKategori = $('#selectize-select').selectize();
        kategori = idKategori[0].selectize;
        
        batchSelectize = $('#selectize-select3').selectize();
        noBatch = batchSelectize[0].selectize;
        
        kategori.on('change', function (kategori) {
            idBarang.clearOptions();
            noBatch.clearOptions();
            $.ajax({
                url: 'api/getDataBarang.php',
                method: 'POST',
                data: JSON.stringify({ id: kategori }), // Use the correct key
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
        
        batchSelectize = $('#selectize-select3').selectize();
        noBatch = batchSelectize[0].selectize;
    
        let barangData = []; // To store the fetched barang data
        var param = 'pengeluaran';
    
        idBarang.on('change', function (idBarang) {
            noBatch.clearOptions(); // Clear previous options in #selectize-select3
            $.ajax({
                url: 'api/getDetailBarang.php',
                method: 'POST',
                data: JSON.stringify({ id: idBarang, param: param, url: psd }), // Use the correct key
                contentType: 'application/json',
                dataType: 'json',
                success: function (response) {
                    if (response.result.message === "OK" && response.data && response.data.Barang.length > 0) {
                        barangData = response.data.Barang; // Store the response for later use
                        
                        response.data.Barang.forEach(function (item) {
                            noBatch.addOption({ value: item.NO_BATCH, text: item.NO_BATCH });
                        });
                        
                        // Automatically select the first option and update fields
                        if (response.data.Barang.length > 0) {
                            noBatch.setValue(response.data.Barang[0].NO_BATCH);
                            $("#STOK").val(response.data.Barang[0].TOTAL_QTY);
                            $("#SATUAN").val(response.data.Barang[0].SATUAN);
                        }
                    } else {
                        console.error('Error fetching barang data:', response.result.message);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching barang data:', status, error);
                }
            });
        });
    
        // Listen for changes in the NO_BATCH selectize instance
        noBatch.on('change', function (selectedBatch) {
            if (selectedBatch) {
                // Find the selected batch in the stored barangData
                const selectedItem = barangData.find(item => item.NO_BATCH === selectedBatch);
                if (selectedItem) {
                    $("#STOK").val(selectedItem.TOTAL_QTY); // Update STOK based on selected NO_BATCH
                    $("#SATUAN").val(selectedItem.SATUAN);  // Update SATUAN if necessary
                    $("#EXPIRATION").val(selectedItem.EXPIRATION);  // Update SATUAN if necessary
                }
            } else {
                $("#STOK").val(''); // Clear STOK if no batch is selected
                $("#EXPIRATION").val(''); // Clear STOK if no batch is selected
            }
        });
    }

    // Check if both `id` and `method` are available
    if (id && method === 'edit') {
        $.ajax({
            url: 'api/getDetailPengeluaran.php',
            method: 'POST',
            data: JSON.stringify({ id: id }),
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.result.message === "OK" && response.data && response.data.length > 0) {
                    const data = response.data[0];
                    $("#datepicker52").val(data.TANGGAL_KELUAR);
                    $("#NOMOR_MRIS").val(data.NOMOR_MRIS);
                    $("#NAMA").val(data.NAMA);
                    $("#OPERATING_UNIT").val(data.OPERATING_UNIT);
                    $("#DIVISI").val(data.DIVISI);
                    $("#BLOCK").val(data.BLOCK);
                    $("#KETERANGAN_PEMASUKAN").val(data.KETERANGAN_PEMASUKAN);
                    $("#selectize-select")[0].selectize.setValue(data.ID_KATEGORI);
                    setTimeout(function () {
                        $("#selectize-select2")[0].selectize.setValue(data.ID_BARANG);
                    }, 200);
                    setTimeout(function () {
                        $("#selectize-select3")[0].selectize.setValue(data.NO_BATCH);
                    }, 600);
                    $("#SATUAN").val(data.SATUAN);
                    $("#QTY").val(data.QTY);
                    $("#EXPIRATION").val(data.EXPIRATION);
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
            url: 'api/getDetailPengeluaran.php',
            method: 'POST',
            data: JSON.stringify({ id: id }),
            contentType: 'application/json',
            dataType: 'json',
            success: function (response) {
                if (response.result.message === "OK" && response.data && response.data.length > 0) {
                    const data = response.data[0];
                    $("#ID_PENGELUARAN").val(data.ID_PENGELUARAN);
                    $("#TANGGAL_KELUAR").val(data.TANGGAL_KELUAR);
                    $("#NOMOR_MRIS").val(data.NOMOR_MRIS);
                    $("#NAMA").val(data.NAMA);
                    $("#OPERATING_UNIT").val(data.OPERATING_UNIT);
                    $("#DIVISI").val(data.DIVISI);
                    $("#BLOCK").val(data.BLOCK);
                    $("#KETERANGAN_PENGELUARAN").val(data.KETERANGAN_PENGELUARAN);
                    $("#ID_KATEGORI").val(data.NAMA_KATEGORI);
                    $("#ID_BARANG").val(data.NAMA_BARANG);
                    $("#SATUAN").val(data.SATUAN);
                    $("#NO_BATCH").val(data.NO_BATCH);
                    $("#QTY").val(data.QTY);
                    $("#EXPIRATION").val(data.EXPIRATION);
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



