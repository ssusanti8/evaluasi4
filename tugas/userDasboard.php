<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
    <title>USER DASHBOARD</title>
<style>

    body {
    background-color: #F8F8F8;
    }

    div.container { 
    width: 960px;
    padding: 10px 50px 50px; 
    background-color: white; 
    margin: 20px auto;
    box-shadow: 1px 0px 10px, -1px 0px 10px;
    }

    h1 {
    text-align: center;
    font-family: Cambria, "Times New Roman", serif; 
    clear: both;
    }

    /* ======TABLE====== */
    table {
    border-collapse: collapse; 
    border-spacing: 0; 
    border: 1px black solid; 
    width: 100%
    }

    th,
    td {
    padding: 8px 15px; 
    border: 1px black solid;
    }

    tr:nth-child(2n+3) { 
        background-color: #F2F2F2;
    }
    nav {
    background-color: #FFFFFF;
    border-bottom: 1px solid #E7E6E1;
    display: flex;
    width: fit-content;
        margin: auto;
    }
    .nav-item {
    position: relative;
    }
    .nav-link {
    display: block;
    padding: 20px 15px;
    margin: 0;
    color: #314E52;
    text-decoration: none;
    box-shadow: 1px 0px 10px, -1px 0px 10px;
    }
   
    </style>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;700&display=swap" rel="stylesheet"> 
    <script>
        function showUser(str){
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "getproduk.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

    </head>

    <body>
        <!-- ======= Header ======= -->
    <nav>
        <div class="nav-item">
            <a class="nav-link" href="#pencarian">PENCARIAN HARGA PRODUK</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="#gantiBackground">Ganti Warna Background</a>
        </div>
        <div class="nav-item">
            <a class="nav-link" href="sessionLogout.php">Logout</a>
        </div>
    </nav>

 
        <section id="pencarian" class="pencarian">
        <body>
        <div class="container">
            <h1>Data Pencarian Harga Produk</h1>
        <table border="1">
    
        <select name="produks" onchange="showUser(this.value)">
        <option value=""> Select a produk: </option>
        <option value="1"> Bubur Instan </option>
        <option value="2"> Mami poko </option>
        <option value="3"> Susu Dancow </option>
        </select>
        </table>
        <br>
        <div id="txtHint"><b>Data Produk yang dipilih:</b></div>
        </body>
        </section>
        <section id="gantiBackground" class="gantiBackground">
        <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3><span style="color: white">Ganti Warna Background</span></h3>
          <?php
    $font_size = '15px';
    $background_color = '#4e79a0';

    if ($_POST) {
    $background_color = $_POST['background_color'];
    $font_size = $_POST['font_size'];
    } 
    else {
    if (isset($_COOKIE['background-color'])) {
    $_POST['background_color'] = $background_color = $_COOKIE['background-
    color'];
    }
    if (isset($_COOKIE['font-size'])) {
    $_POST['font_size'] = $font_size = $_COOKIE['font-size'];
    }
    }

    // Delete Cookies
    $msg = false;
    if (isset($_POST['hapus_cookie']))
    {
    setcookie('background-color', '', 0, '/');
    setcookie('font-size', '', 0, '/');
    $msg = 'Data cookie berhasil dihapus';
    }

    // Set Cookie 7 hari
    if (isset($_POST['remember']))
    {
    setcookie('background-color', $_POST['background_color'], strtotime('+7 days'),
    '/');
    setcookie('font-size', $_POST['font_size'], strtotime('+7 days'), '/');
    $msg = 'Data cookie berhasil disimpan';
    }
    ?>
    
    <html>
    <head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css"> 
    body {
    font: <?=$font_size?> "open sans", "segoe ui", tahoma; 
    background-color: <?=$background_color?>;
    }
    h3 {
    margin-top: 0; margin-bottom: 10px;
    }
    div {
    margin-bottom: 5px;
    }
    select {
    padding: 5px 10px;
    font-size: <?=$font_size?>; border: 1px solid #CCCCCC; color: #5d5d5d;
    text-align: right; width: 200px;
    margin-bottom: 10px;
    }
    form {
    margin: 0;
    }
    
    .copyright {
    padding: 0; background: none; text-align: center; margin-top: 10px; color: #FFFFFF; font-size: smaller;
    }
    .button {
    border: 0; padding: 7px 20px; float: left;
    font-family: "open sans"; color: #FFFFFF;
    font-size: <?=$font_size?>; margin-right: 5px;
    margin-bottom: 5px; cursor: pointer;
    }
    .blue {
    background-color: #3e97e2;
    }
    .copyright a {
        text-decoration: none; color: #e4e4e4;
    margin-top: 3px; display: inline-block;
    }
    .red {
    background-color: #e26b3e;
    }
    
    .clearfix::before,
    .clearfix::after
    {
    content: ""; float: none; clear: both; display: block;
    }
    .remember {
    margin-bottom: 12px;
    }
    
    .success {
    background-color: #abffc1; padding: 5px 10px;
    color: #696969;
    }

    .buttonblue{
      float:center;
      background-color:white;
    }
    </style>

    </head>
    <body>
    
    <form method="post" action="">
    <h3 style="color: white">SETTINGS</h3>
    <?php
    if ($msg) {
    echo '<div class="success">'.$msg.'</div>';
    }
    ?>
    <div>Background</div>
    <select name="background_color">
    <?php
    $colors = array('#4e79a0' => 'Biru', '#75b14a' => 'Hijau', '#db1514' =>
    'Merah', '#FFFF00' => 'Kuning', '#964B00' => 'Coklat');
    foreach ($colors as $name => $value) {
    $selected = $name == @$_POST['background_color'] ? 'SELECTED="SELECTED"'
    : '';
    echo '<option value="'.$name.'"'.$selected.'>'.$value.'</option>';
    }
    ?>
    </select>
    <div>Font Size</div>
    <select name="font_size">
    <?php
    $font_sizes = array('15px', '17px', '20px', '25px', '50px'); foreach ($font_sizes as $value) {
    $selected = $value == @$_POST['font_size'] ? 'SELECTED="SELECTED"' : ''; 
    echo '<option value="'.$value.'"'.$selected.'>'.$value.'</option>';
    }
    ?>
    </select>
    <div class="remember">
    <input type="checkbox" id="remember" name="remember"/>
    <label for="remember"> Remember</label>
    </div>
    <div class="clearfix">
    <input type="submit" class="buttonblue" name="submit" value="Simpan" />
    </div>
    </form>
    </div>
    </body>
    </html>
        </div>
      </div>
    </section>
    </body>

</html>
