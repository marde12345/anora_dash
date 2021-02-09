<html>

<head>
    <style>
        /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 4cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            height: 2cm;
        }

        .td-25 {
            width: 25%;
        }

        .td-50 {
            width: 50%;
        }

        .td-100 {
            width: 100%;
        }

        .page_break {
            page-break-before: always;
        }

        .center {
            display: block;
            margin-left: 1.3cm;
            margin-right: auto;
            width: 90%;
        }

        .table_perjanjian,
        .td_perjanjian {
            border: 1px solid black;
            background-color: silver;
        }

        .collapes {
            border-collapse: collapse;
        }
    </style>

    <title>{{ config('app.name', 'Laravel') . ' | ' .  $widget['title'] }}</title>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <!-- <img src="{{asset('img/header.png')}}" height="100%" class="center" /> -->
        <img src="../public/img/header.png" height="100%" class="center" />
    </header>

    <footer style="text-align: center;">
        Copyright &copy; ANORA <?php echo date("Y"); ?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <h3>A. Data Perjanjian</h3>
        <table style="width: 100%;">
            <tr>
                <th style="width: 30%;"></th>
                <th style="width: 20%;"></th>
                <th style="width: 50%;"></th>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">1. Nomor</td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    {{$widget['contract']->number_contract}}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">2. Tanggal Kerja Sama</td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    {{$widget['contract']->created_at_isoformat}}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">3. Mitra ANORA</td>
                <td style="width: 20%;" class="td_perjanjian">
                    Nama : <br>
                    Email :
                </td>
                <td style="width: 50%;" class="td_perjanjian">
                    {{$widget['contract']->user->name.' '.$widget['contract']->user->last_name}}
                    <br>
                    {{$widget['contract']->user->email}}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">4. Mitra Jasa Layanan Statistik</td>
                <td style="width: 20%;" class="td_perjanjian">
                    Nama Pemilik : <br>
                    Pekerjaan : <br>
                    Nomor Kartu Identitas : <br>
                    Nomor Telepon : <br>
                    Nomor Whatsapp : <br>
                    Email : <br>
                    Alamat : <br>
                </td>
                <td style="width: 50%;" class="td_perjanjian">
                    {{$widget['contract']->st_user->user->name.' '.$widget['contract']->st_user->user->last_name}}
                    <br>
                    Mahasiswa, Paruh waktu <br>
                    00000000000 <br>
                    088888888 <br>
                    088888888 <br>
                    {{$widget['contract']->st_user->user->email}}
                    <br>
                    Jl Kanan Kiri
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">5. Bersedia <i>Home Service</i></td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    @if($widget['contract']->job->is_home_service)
                    <b>IYA</b>
                    @else
                    <b>TIDAK</b>
                    @endif
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">6. Jenis Pembayaran</td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    Transfer Bank,<br>
                    Mandiri A.N. ANORA <br>
                    0000000000
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">7. Biaya Jasa</td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    20,00%
                </td>
            </tr>
        </table><br>
        <h3>B. Jenis Jasa Layanan Statistik</h3>
        <table style="width: 100%;">
            <tr>
                <th style="width: 30%;"></th>
                <th style="width: 20%;"></th>
                <th style="width: 50%;"></th>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">1. Nama Jasa</td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    {{$widget['contract']->job->name_job}}
                </td>
            </tr>
            <tr>
                <td style="width: 30%; text-align: left; vertical-align: top;">2. Deskripsi Jasa</td>
                <td colspan="2" style="width: 70%;" class="td_perjanjian">
                    {{$widget['contract']->job->description}}
                </td>
            </tr>
        </table>

    </main>

    <!-- Page break -->
    <div class="page_break"></div>

    <main>
        <p style="text-align: justify;">
            Dengan menandatangani Perjanjian Kerja Sama ANORA ini, ANORA dan Mitra Jasa Layanan Statistik (Mitra Usaha) menyetujui bahwa:
            <ol type="1">
                <li style="text-align: justify;">Mitra usaha mengetahui, memahami, dan menyetujui penggunaan dan pemanfaatan layanan ANORA serta tunduk kepada Syarat dan Ketentuan ANORA.</li>
                <li style="text-align: justify;">Mitra usaha mengetahui bahwa Perjanjian beserta seluruh bagian-bagian dan lampiran-lampiran daripadanya (apabila ada) merupakan suatu kesatuan dan bagian yang tidak terpisahkan dari Perjanjian.</li>
            </ol>
            Mengetahui :
            <ol type="3">
                <li style="text-align: justify;">Pihak 1 : Anora</li>
                <li style="text-align: justify;">Pihak 2 : {{$widget['contract']->user->name.' '.$widget['contract']->user->last_name}}</li>
                <li style="text-align: justify;">Pihak 3 : {{$widget['contract']->st_user->user->name.' '.$widget['contract']->st_user->user->last_name}}</li>
            </ol>
            <br><br><br>
            <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('http://anora.id/contract/'.$widget['contract']->barcode, 'QRCODE')}}" alt="barcode" /><br>
            QRcode verifikasi dokumen sebagai bukti keabsahan perjanjian kerjasama ini.
        </p>
    </main>
</body>

</html>