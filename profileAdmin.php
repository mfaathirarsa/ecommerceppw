<?php @include 'config.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profileAdmin.css">
    <title>Document</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <table>
            <tr>
                <td class="left">
                    <div class="toko">
                        <img src="uploaded_img/toko.jpg" alt="" style="border-radius: 100px;">
                        <div class="storeName">Genzi Store</div>
                        <div class="loc">Based on Jakarta Timur</div>
                    </div>
                </td>
                <td class="right">               
                    <div class="alamat">
                        <div class="blank"></div>Jl.Pemuda Rawamangun</div>
                    </div>
                    <div class="mainFeature">
                       <table>
                            <tr>
                                <td class="tableFeature">
                                    <div class="img"><img src="uploaded_img/inventory.png" alt="" class="img">
                                    <div style="margin-left: 80px;">inventory</div>
                                    </div>
                                </td>
                                <td class="tableFeature">
                                    <div class="img"><img src="uploaded_img/wallet.png" alt="" class="img">
                                    <div style="margin-left: 100px;">wallet</div></div>
                                </td>
                                <td class="tableFeature">
                                    <div class="img"><img src="uploaded_img/promo.jpg" alt="" class="img">
                                    <div style="margin-left: 95px;">promo</div>
                                    </div>
                                </td>
                            </tr>
                       </table>
                       <table>
                            <tr>
                                <td class="addFeature">
                                    <div class="add">
                                        <div class="blank"></div>
                                        <img src="uploaded_img/eye.png" alt="" class="imgAdd">
                                        <div class="view">300.180</div>
                                    </div>
                                    <div class="descAdd">visitors</div> 
                                </td>
                                <td class="addfeature">
                                    <div class="add">
                                        <div class="blank"></div>
                                        <img src="uploaded_img/checkout.png" alt="" class="imgAdd">
                                        <div class="view">250.196</div>
                                    </div>
                                    <div class="descAdd">orders</div> 
                                </td>
                            </tr>
                       </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>