<html>

<head>
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">

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
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <img src="../public/img/header.jpg" height="100%" />
        <!-- <img src="{{ public_path('img/header.jpg') }}" width="100%" height="100%" /> -->
        <!-- <img src="https://cdn.sstatic.net/Sites/stackoverflow/company/img/logos/so/so-icon.png?v=c78bd457575a" width="100%" height="100%" /> -->
    </header>

    <footer style="text-align: center;">
        Copyright &copy; ANORA <?php echo date("Y"); ?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <p style="text-align: justify;">
            Dengan menandatangani Perjanjian Kerjasama ANORA ini, ANORA dan Mitra Jasa Layanan Statistik (Mitra Usaha) menyetujui bahwa:
            <ol type="1">
                <li style="text-align: justify;">Mitra usaha mengetahui, memahami, dan menyetujui penggunaan dan pemanfaatan layanan ANORA serta tunduk kepada Syarat dan Ketentuan ANORA.</li>
                <li style="text-align: justify;">Mitra usaha mengetahui bahwa Perjanjian beserta seluruh bagian-bagian dan lampiran-lampiran daripadanya (apabila ada) merupakan suatu kesatuan dan bagian yang tidak terpisahkan dari Perjanjian.</li>
            </ol>
            <table>
                <tr>
                    <td>Untuk dan atas nama ANORA</td>
                    <td>Untuk dan atas nama Mitra Usaha</td>
                </tr>
            </table>
            <div class="row">
                <div class="col-xs-6">Untuk dan atas nama ANORA</div>
                <div class="col-xs-6">Untuk dan atas nama Mitra Usaha</div>
            </div>
        </p>
    </main>
    <script src="../public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/js/sb-admin-2.min.js"></script>
</body>

</html>