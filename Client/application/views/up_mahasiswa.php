<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>" />
</head>

<body>
    <!-- BUAT AREA MENU -->
    <nav class="area-menu">
        <button id="btn_lihat" class="btn-primary">Lihat Data</button>
        <button id="btn_refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>

    </nav>

    <!-- buat area untuk entry data mahasiswa -->
    <main class="area-grid">
        <section class="item-label1">
            <label id="lbl_npm" for="txt_npm">NPM :</label>
        </section>
        <section class="item-input1">
            <input type="text" class="text-input" id="txt_npm" maxlength="9">
        </section>
        <section class="item-error1">
            <p class="error-info" id="err_npm">Wajib Di Isi!!!</p>
        </section>

        <section class="item-label2">
            <label id="lbl_nama" for="txt_nama">Nama Mahasiswa :</label>
        </section>
        <section class="item-input2">
            <input type="text" class="text-input" id="txt_nama" maxlength="100">
        </section>
        <section class="item-error2">
            <p class="error-info" id="err_nama">Wajib Di Isi!!!</p>
        </section>

        <section class="item-label3">
            <label id="lbl_telepon" for="txt_telepon">Telepon :</label>
        </section>
        <section class="item-input3">
            <input type="text" class="text-input" id="txt_telepon" maxlength="15" onkeypress="return setNumber(event)">
        </section>
        <section class="item-error3">
            <p class="error-info" id="err_telepon">Wajib Di Isi!!!</p>
        </section>

        <section class="item-label4">
            <label id="lbl_jurusan" for="txt_jurusan">Jurusan :</label>
        </section>
        <section class="item-input4">
            <select class="select-input" name="" id="cbo_jurusan">
                <option value="-">Pilih Jurusan Mahasiswa</option>
                <option value="IF">Informatika</option>
                <option value="TI">Teknik informatika</option>
                <option value="SI">Sistem informasi</option>
                <option value="TK">Teknik komputer</option>
                <option value="SIA">Sistem informasi akuntansi</option>
            </select>
        </section>
        <section class="item-error4">
            <p class="error-info" id="err_jurusan">Wajib Di Isi!!!</p>
        </section>

    </main>
    <nav class="area-menu">
        <button id="btn_ubah" class="btn-primary">Ubah Data</button>
    </nav>

    <!-- import file script.js -->
    <script src="<?= base_url("ext/script.js") ?>"></script>

    <script>
        // inisialisai object dan ambil data
        let text_npm = document.getElementById("text_npm")
        let text_nama = document.getElementById("text_nama")
        let text_telepon = document.getElementById("text_telepon")
        let cbo_jurusan = document.getElementById("cbo_jurusan")
        let token = '<?= $token ?>'

        txt_npm.value = '<?= $npm ?>'
        txt_nama.value = '<?= $nama ?>'
        txt_telepon.value = '<?= $telepon ?>'
        cbo_jurusan.value = '<?= $jurusan ?>'

        // inisialisasi object
        let btn_lihat = document.getElementById("btn_lihat");
        let btn_ubah = document.getElementById("btn_ubah");

        //  buat event untuk "btn_lihat"
        btn_lihat.addEventListener('click', function() {
            location.href = '<?php echo base_url(); ?>'
        })

        // buat fungsi set refresh
        function setRefresh() {
            location.href = '<?php echo site_url("Mahasiswa/updateMahasiswa") ?>' + '/' + token
        }

        //  buat event untuk "btn_ubah"
        btn_ubah.addEventListener('click', function() {
            // inisialisasi objek
            let lbl_npm = document.getElementById("lbl_npm");
            let err_npm = document.getElementById("err_npm");

            let lbl_nama = document.getElementById("lbl_nama");
            let err_nama = document.getElementById("err_nama");

            let lbl_telepon = document.getElementById("lbl_telepon");
            let err_telepon = document.getElementById("err_telepon");

            let lbl_jurusan = document.getElementById("lbl_jurusan");
            let err_jurusan = document.getElementById("err_jurusan");

            // jika npm tidak di isi
            if (txt_npm.value === "") {
                err_npm.style.display = 'unset'
                err_npm.innerHTML = "NPM Harus Di Isi"
                lbl_npm.style.color = "#ff0000"
                txt_npm.style.borderColor = "#ff0000"
                // jika npm diisi
            } else {
                err_npm.style.display = 'none'
                err_npm.innerHTML = ""
                lbl_npm.style.color = "unset"
                txt_npm.style.borderColor = "unset"
            }

            // ternary operator (js)
            const nama = (txt_nama.value === "") ? [
                err_nama.style.display = 'unset',
                err_nama.innerHTML = "Nama Harus Di Isi",
                lbl_nama.style.color = "#ff0000",
                txt_nama.style.borderColor = "#ff0000"
            ] : [
                err_nama.style.display = 'none',
                err_nama.innerHTML = "",
                lbl_nama.style.color = "unset",
                txt_nama.style.borderColor = "unset"
            ]
            // alert(nama[0])

            const telepon = (txt_telepon.value === "") ? [
                err_telepon.style.display = 'unset',
                err_telepon.innerHTML = "Telepon Harus Di Isi",
                lbl_telepon.style.color = "#ff0000",
                txt_telepon.style.borderColor = "#ff0000"
            ] : [
                err_telepon.style.display = 'none',
                err_telepon.innerHTML = "",
                lbl_telepon.style.color = "unset",
                txt_telepon.style.borderColor = "unset"
            ]

            // alert("Jurusan : " + cbo_jurusan.selectedIndex)
            // alert(`Jurusan : ${cbo_jurusan.selectedIndex}`)

            const jurusan = (cbo_jurusan.selectedIndex === 0) ? [
                err_jurusan.style.display = 'unset',
                err_jurusan.innerHTML = "Jurusan Harus Di Pilih",
                lbl_jurusan.style.color = "#ff0000",
                cbo_jurusan.style.borderColor = "#ff0000"
            ] : [
                err_jurusan.style.display = 'none',
                err_jurusan.innerHTML = "",
                lbl_jurusan.style.color = "unset",
                cbo_jurusan.style.borderColor = "unset"
            ]

            // Jika semua komponen terisi
            if (err_npm.innerHTML === "" && nama[1] === "" && telepon[1] === "" && jurusan[1] === "") {
                // alert("simpan")

                // panggil method setSave
                setUpdate(txt_npm.value, txt_nama.value, txt_telepon.value, cbo_jurusan.value, token)
            }
        })

        // buat fungsi setUpdate
        const setUpdate = async (npm, nama, telepon, jurusan, token) => {
            // buat variable untuk form
            let form = new FormData()

            // isi/tambah nilai untuk form
            form.append("npmnya", npm)
            form.append("namanya", nama)
            form.append("teleponnya", telepon)
            form.append("jurusannya", jurusan)
            form.append("tokennya", token)

            // async await
            try {
                // Proses kirim data ke controller
                let response = await fetch('<?php echo site_url("Mahasiswa/setUpdate") ?>', {
                    method: "POST",
                    body: form
                })
                // proses pembacaan hasil
                let result = await response.json()
                // tampilkan hasil
                alert(result.statusnya)


            } catch {
                alert("Data gagal dikirim !!!")
            }

        }
    </script>

</body>

</html>