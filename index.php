<?php

if (isset($_GET["submit"])) {
    $country = $_GET["country"];   
    $url = "https://restcountries.com/v3.1/name/$country";

    $response = file_get_contents($url);

    $data = json_decode($response, true);

    $info = $data[0];



    $officialName = $info["name"]["official"];
    $capital = $info["capital"][0] ?? "ندارد";
    $population = $info["population"];
    $region = $info["region"];
    $area = $info["area"];
    $nativeName = reset($info["name"]["nativeName"])["common"]; 
    $flag = $info["flags"]["png"]; 
 

}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>اطلاعات کشور</title>
    <style>
        body {
            font-family: sans-serif;
            background: #bdbdbdff;
            padding: 40px;
        }

        .country-box {
            max-width: 500px;
            margin: auto;
            background: #bdbdbdff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }

        .flag {
            width: 180px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        .info {
            background: #f7f9fa;
            padding: 15px;
            border-radius: 10px;
            text-align: right;
            line-height: 1.9;
            margin-top: 20px;
        }

        .info p {
            margin: 5px 0;
        }

        input {
            width: 80%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 15px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background: #0066ff;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #004dc1;
        }
    </style>
</head>
<body>

<div class="country-box">

    <h2>جستجوی اطلاعات کشور</h2>

    <form method="get">
        <input type="text" name="country" placeholder="نام کشور را وارد کنید...">
        <button name="submit" type="submit">جستجو</button>

    <h2><?php echo " ". $nativeName ?></h2>
    <?php echo "<img src='$flag' alt='flag'>"; ?>

    <div class="info">
        <p><strong>نام بومی:</strong><?php echo " ". $nativeName ?> </p>
        <p><strong>نام رسمی:</strong><?php echo " ". $officialName ?> </p>
        <p><strong>پایتخت:</strong><?php echo " " . $capital ?></p>
        <p><strong>جمعیت:</strong> <?php echo " " . number_format($population) ?></p>
        <p><strong>منطقه:</strong><?php echo " " . $region ?> </p>
        <p><strong>مساحت:</strong><?php echo " " . number_format($area) ?></p>
    </div>

</div>

</body>
</html>
