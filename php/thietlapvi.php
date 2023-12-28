<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo ví đầu tiên</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="./js/jquery.min.js" ></script>
    <style>
    *{
        box-sizing:border-box;
    }
    body{
        font-family: "Roboto", sans-serif;
        display:flex;
        justify-content:center;
        align-items:center;
        background:#2c3e50;
    }
    .content{
        margin-top:20vh;
       
        color:white;
        padding:20px 30px;
        border-radius:5px;
        border:1px solid white;
    }
    .wrap-money form{
        width:300px;
    }
    #money,#btn_setup_money{
        margin-top:10px;
    }
    #money{
        height:35px;
        line-height:35px;
        font-size:20px;
        font-weight:500;
        padding:0 5px;
        width:100%;
        max-width:300px;
        border-radius:5px;
    }
    #btn_setup_money{
        padding:5px 10px;
        background:white;
        font-size:15px;
        border:0;
        outline:0;
        cursor:pointer;
    }
    </style>
</head>
<body>
    <div class="content">
        <h1>Tạo ví tiền mặt</h1>
        <div class="wrap-money">
            <form action="#" method="POST">
            <div>Số tiền (vnđ)</div>
            <input type="number" name="moneyValue" id="money" required max="99999999" min="1000" maxlength="10"></br>
            <button type="submit" id="btn_setup_money">OK</button>
            </form>
        </div>
    </div>

    <script>
    $('#btn_setup_money').click(function(e){
        e.preventDefault();
        let moneyValue = $('#money').val();
        $.ajax({
            url: "./appProcess/firstSetup.php",
            method: "POST",
            data:{money:moneyValue},
            success: function(data,status){
                let rs = JSON.parse(data);
                // console.log(rs);
                if(rs.success == "false"){
                    alert("Có lỗi xảy ra, vui lòng thử lại");
                }else{
                    window.location.assign("./index.php");
                }
            }
        });
    });
    
    </script>
</body>
</html>