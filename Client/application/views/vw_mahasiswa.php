<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Mahasiswa</title>

    <!-- import font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>" />


</head>

<body>
    <!-- BUAT AREA MENU -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Add Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>

    </nav>

    <!-- buat area table -->
    <table>
        <thead>
            <tr>
                <!-- judul tabel -->
                <th style="width: 5%" ;>No.</th>
                <th style="width: 10%" ;>NPM</th>
                <th style="width: 50%" ;>Nama</th>
                <th style="width: 15%" ;>Telepon</th>
                <th style="width: 10%" ;>Jurusan</th>
                <th style="width: 10%" ;>Aksi</th>
            </tr>
        </thead>

        <!-- isi tabel -->
        <tbody>
            <!-- proses looping data -->
            <?php
            // set nilai awal no
            $no = 1;
            foreach ($tampil->mahasiswa as $result) :
            ?>
                <tr>
                    <td class="text-center"> <?php echo $no++; ?></td>
                    <td class="text-center"> <?php echo $result->npm_mhs; ?></td>
                    <td> <?php echo $result->nama_mhs; ?></td>
                    <td class="text-center"> <?php echo $result->telepon_mhs; ?></td>
                    <td class="text-center"> <?php echo $result->jurusan_mhs; ?></td>
                    <td class="text-center">
                        <nav class="area-aksi">
                            <button class="btn-ubah" id="btn_ubah" title="Ubah Data" Onclick="return gotoUpdate('<?php echo $result->npm_mhs; ?>')"><i class="fa-regular fa-pen-to-square"></i></button>

                            <button class="btn-hapus" id="btn_hapus" title="Hapus Data" Onclick="return gotoDelete('<?php echo $result->npm_mhs; ?>')"> <i class="fa-solid fa-trash-can"></i></button>
                        </nav>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- import font awesome (js)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // inisialisasi object
        let btn_tambah = document.getElementById("btn_tambah");

        // buat event untuk tambah data
        btn_tambah.addEventListener('click', function() {
            // alert("Tambah Data")
            // manipulasi css (property dan value)
            // btn_tambah.style.background="#FF0000"
            // this.style.borderRadius="10px"

            // manipulasi css(className)
            // this.className= "btn-secondary";

            // manipulasi html
            // this.innerHTML = <strong>Tambah Data</strong>;
            // this.innerText = "Tambah Data";

            // alihkan ke halaman/Controller(Mahasiswa) fungsi "addMahasiswa"

            location.href = '<?php echo site_url("Mahasiswa/addMahasiswa") ?>'

        })

        // btn_tambah.addEventListener('click', setRefresh)

        function setRefresh() {
            location.href = '<?php echo base_url() ?>';
        }

        // buat fungsi untuk ke halaman update
        function gotoUpdate(npm) {
            //  npmx = "ÛMõÛM;";
            // let npmx = atob(npm);
            location.href = '<?php echo site_url("Mahasiswa/updateMahasiswa") ?>' + '/' + npm
        }

        // buat fungsi untuk hapus data
        function gotoDelete(npm) {
            if (confirm("Data Mahasiswa " + npm + " Ingin Dihapus ?") === true) {
                // alert("Data Berhasil Dihapus")

                // panggil fungsi setDatabase
                setDelete(npm);
            }
            // else
            // alert("Data Gagal Dihapus")

        }

        function setDelete(npm) {
            // buat variabel /konstanta data
            const data = {
                "npmnya": npm
            }
            // kirim data async dengan fetch
            fetch('<?php echo  site_url("Mahasiswa/setDelete"); ?>', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)

                })

                .then((response) => {
                    return response.json()
                })

                .then(function(data) {
                    // jika nilai "err" = 0
                    // if(data.err === 0)
                    // alert("Data Berhasil Dihapus")
                    // jika "err" = 1
                    // else
                    // alert("Data Gagal Dihapus")
                    alert(data.statusnya);
                    // panggil fungsi setRefefresh
                    setRefresh();
                })
        }
    </script>

</body>

</html>