<style>
    input{
        border:0;
        text-align: center; 
    }
    input:focus{
        outline: none;
    }
</style>

<div class="box box-success">
    <div class="box-header text-center">
        <h4 style="font-weight:bold;"><?= $title ?></h4>
    </div>
    <hr>
    <div class="box-body">
        <div class="text-center" style="margin-top:10px;font-family:serif;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-2">
                        <img src="<?= base_url('assets/upload/image/logo.png')?>" alt="" style="width:150px;">
                    </div>
                    <div class="col-xs-10">
                        <p style="font-size: 30px;"><b>Sekolah Tinggi Teknologi Payakumbuh</b></p>
                        <p style="font-size: 20px;"><b>Jl. Khatib Sulaiman, Sawah Padang, Payakumbuh Sel., Kota Payakumbuh, Sumatera Barat 26222</b></p>
                    </div>
                </div>
            </div>
        </div>
        <HR style="border-top: 2px solid #000;"></HR>
        <HR style="margin-top: -17px;border-top: 1px solid #000;"></HR>
        <div class="text-center">
        <h4><b>DAFTAR PENILAIAN SIDANG PENGUJIAN ALAT/PROGRAM </b></h4>
        <h4><b>TUGAS AKHIR MAHASISWA PROGRAM STUDI TEKNIK KOMPUTER </b></h4>
        <HR></HR>
        <h3><b> Nama : <?=$mhs->nama_mahasiswa?></b></h3>
        <h3><b> NIM : <?=$mhs->no_induk?></b></h3>
        </div>
        <!-- <hr> -->
        <br>
        <div class="text-center" style="padding-left: 50px;padding-right: 50px;">
        <?php  echo form_open(base_url('dosen/sidang/sidang_alat_submit/'.$dosen->id_dosen.'/'.$mhs->id_mahasiswa)); ?>
        <!-- <form action="></form> -->
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <th><b>NO</b></th>
                        <th><b>MATERI PENILAIAN</b></th>
                        <th><b>NILAI ( 1-100 )</b></th>
                        <th><b>BOBOT ( % )</b></th>
                        <th><b>NILAI x BOBOT</b></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Performance</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a.Penampilan</td>
                            <td><input type="number" name="n_penampilan1" class="n_penampilan1 input" id="n_penampilan1" onkeyup="penampilan(this)" required></td>
                            <td>10</td>
                            <td><input type="text" name="n_penampilan" class="n_penampilan" id="n_penampilan" readonly></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b.Presentasi</td>
                            <td><input type="number" name="n_presentasi1" class="n_presentasi1 input" id="n_presentasi1" onkeyup="presentasi(this)" required></td>
                            <td>10</td>
                            <td><input type="text" name="n_presentasi" class="n_presentasi" id="n_presentasi" readonly></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hasil Program / Alat</td>
                            <td><input type="number" name="n_hasilProgram1" class="n_hasilProgram1 input" id="n_hasilProgram1"  onkeyup="hasilprogram(this)" required></td>
                            <td>20</td>
                            <td><input type="text" name="n_hasilProgram" class="n_hasilProgram" id="n_hasilProgram" readonly></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Penguasaan Tugas Akhir</td>
                            <td><input type="number" name="n_penguasaan1" class="n_penguasaan1 input" id="n_penguasaan1" onkeyup="penguasaan(this)" required></td>
                            <td>50</td>
                            <td><input type="text" name="n_penguasaan" class="n_penguasaan" id="n_penguasaan" readonly></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Penulisan Tugas Akhir</td>
                            <td><input type="number" name="n_penulisan_l1" class="n_penulisan_l1 input" id="n_penulisan_l1" onkeyup="penulisan(this)" required></td>
                            <td>10</td>
                            <td><input type="text" name="n_penulisan_l" class="n_penulisan_l" id="n_penulisan_l" readonly></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>TOTAL</b></td>
                            <td></td>
                            <td>100</td>
                            <td><input type="text" name="n_total_sidang" class="n_total_sidang" id="n_total_sidang" readonly></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>Komentar</b></td>
                            <td><textarea name="komentar" id="" cols="30" rows="10"></textarea></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center" style="margin-top:80px;margin-left: 410px;font-family:serif;">
            <p>Payakumbuh <?= date('d F Y')?></p>

            <?php if($dosen->id_dosen == $mhs->ketua_sa):?>
                <p><b>Ketua</b></p>
                <input type="hidden" name="penguji" value="ketua">
            <?php elseif($dosen->id_dosen == $mhs->sekre_sa): ?>
                <p><b>Sekretaris</b></p>
                <input type="hidden" name="penguji" value="sekretaris">
            <?php elseif($dosen->id_dosen == $mhs->anggota_sa): ?>
                <p><b>Anggota</b></p>
                <input type="hidden" name="penguji" value="anggota">
            <?php endif;?>
            <br>
            <br>
            <p>(...............................................)</p>
            <p><b>( <?=$dosen->nama_dosen?> )</b></p>
        </div>
        <div class="text-center" style="margin-top:40px;">
            <button type="submit" class="btn btn-success btn-lg"> SUBMIT HASIL PENILAIAN</button>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    function penampilan(e) {
        var val = e.value;
        var hasil = (10/100) * val;
        // console.log(hasil.toFixed(1));
        document.getElementById("n_penampilan").value = hasil.toFixed(0);
        // return hasil.toFixed(1);
    }
    function presentasi(e) {
        var val = e.value;
        var hasil = (10/100) * val;
        // console.log(hasil.toFixed(1));
        document.getElementById("n_presentasi").value = hasil.toFixed(0);
        // return hasil.toFixed(1);
    }
    function hasilprogram(e) {
        var val = e.value;
        var hasil = (20/100) * val;
        // console.log(hasil.toFixed(1));
        document.getElementById("n_hasilProgram").value = hasil.toFixed(0);
        return hasil.toFixed(1);
    }
    function penguasaan(e) {
        var val = e.value;
        var hasil = (50/100) * val;
        // console.log(hasil.toFixed(1));
        document.getElementById("n_penguasaan").value = hasil.toFixed(0);
        // return hasil.toFixed(1);
    }
    function penulisan(e) {
        var val = e.value;
        var hasil = (10/100) * val;
        // console.log(hasil.toFixed(1));
        document.getElementById("n_penulisan_l").value = hasil.toFixed(0);
        // return hasil.toFixed(1);
    }

</script>
<script>
    $(document).ready(function() {
        $( ".input" ).keyup(function() {
            var satu = document.getElementById("n_penampilan").value;
            var dua = document.getElementById("n_presentasi").value;
            var tiga = document.getElementById("n_hasilProgram").value;
            var empat = document.getElementById("n_penguasaan").value;
            var lima = document.getElementById("n_penulisan_l").value;
            hasil1 = parseInt(satu);
            hasil2 = parseInt(dua);
            hasil3 = parseInt(tiga);
            hasil4 = parseInt(empat);
            hasil5 = parseInt(lima);
            var hasiltambah1 = hasil1 + hasil2 +hasil3;
            var hasiltambah2 = hasil4 + hasil5;
            var hasil = hasiltambah1 + hasiltambah2;
            console.log(hasil);
                if (isNaN(hasil)) {
                    document.getElementById("n_total_sidang").value = 'Nilai Belum Lengkap';
                }else{
                    document.getElementById("n_total_sidang").value = hasil;
                }
        });
    });
</script>


