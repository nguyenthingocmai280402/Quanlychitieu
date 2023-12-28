<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Trang Đăng nhập</title>
    <meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dangnhap.css" type="text/css" media="all" />
    <script src="./js/jquery.min.js"></script>
    
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="imgcontainer">
                    <img src="images/m.jpg" alt="Avatar" class="avatar">
                </div>

                <h1 style="margin-top: 30px; margin-left:110px;color:white;">Đăng Nhập</h1>
            </div>
            <div class="col">
                <form class="form-dang-nhap" name="dang-nhap" action="#" method="POST" style="background-color:#f1f1f1;   margin-top:100px">
                    <div class="container" style="background-color:#f1f1f1">

                        <label for="uname"><b>Tên Đăng Nhập</b></label>
                        <div class="pom-agile">
                            <input type="text" placeholder="Nhập Tên Đăng Nhập" name="username" required value="" />
                            <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>

                        <label for="psw"><b>Mật Khẩu</b></label>
                        <div class="pom-agile">
                            <input type="password" placeholder="Nhập Mật Khẩu" name="password" required>
                            <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
                        </div>
                        <button type="submit" name="submit" class="btn_login " id="id_btn_login">Đăng nhập</button>
                        <label>
                            
            
                        
                    </div>
                    
                
            
                    <div class="container" style="background-color:#f1f1f1 ;margin-bottom: 30px;">
                        
                        <p class="qt">Bạn đã có tài khoản chưa?</p>
                        <div class="col">
                        
                            <button type="button" onclick="document.getElementById('id01').style.display='block'" class="cancelbtn " style="background:#2c3e50;">Đăng ký</button>
                            <div class="ic">
                            <a href="#" class="fb btn">
                            <i class="fa fa-facebook fa-fw"></i>
                        </a>
                        <a href="#" class="twitter btn">
                            <i class="fa fa-twitter fa-fw"></i> 
                        </a>
                        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
                            </i>
                        </a>
                        </div>
                        
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="id01" class="modal" >

        

        <form name="dang-ky" class="modal-content" method="POST" action = "#">
            
            <div class="container" style="background-color:#f1f1f1 ;width: 500px;">
                <h1>Đăng ký thành viên</h1>
                <hr>
                <label for="Tên đăng nhập"><b>Tên đăng nhập</b></label>
                        <input type="text" placeholder="Nhập tên đăng nhập" name="username" required>

                        <label for="psw"><b>Mật khẩu</b></label>
                        <input type="password" placeholder="Nhập mật khẩu" name="password" required>

                        <label for="psw-repeat"><b>Nhập lại mật khẩu</b></label>
                        <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" required>

                        <label for="Tên người dùng"><b>Tên người dùng</b></label>
                        <input type="text" placeholder="Nhập tên người dùng" name="showname" required>

                        <label for="Tên hiển thị"><b>Nhập email</b></label>     
                        <input type="email" placeholder="Nhập email" name="email" required>     

                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy</button>
                            <button class="signupbtn" id="btn_signup">Đăng ký</button>
                        </div>
                    </div>
                </form>
    </div>





<!-- Xử lý đăng nhập -->
            <script>
                $('#id_btn_login').click(function(e){
                    e.preventDefault();
                    let ac = document.forms["dang-nhap"]["username"].value;
                    let pw = document.forms["dang-nhap"]["password"].value;

                    if(ac != "" && pw != ""){
                        $.ajax({
                            url: "./appProcess/login.php",
                            method: "POST",
                            data:{account:ac,pass:pw},
                            success:function(data,status){
                               
                                if(data == "error1"){
                                    alert("Tài khoản này không tồn tại");
                                    return;
                                }
                                let rs = JSON.parse(data);
                                
                                if(rs["success"] == "true")
                                    window.location.assign("./index.php");
                                else
                                    alert("Mật khẩu không đúng");
                            }
                        });
                    }else{
                        alert('Không được để trống các trường');
                    }    
                });            
            </script>

            <!-- Xử lý đăng nhập -->
            <script>

               $('#btn_signup').click(function(e){
                    e.preventDefault();
                    let ac = document.forms["dang-ky"]["username"].value;
                    let pw = document.forms["dang-ky"]["password"].value;
                    let rpw = document.forms["dang-ky"]["repassword"].value;
                    let un = document.forms["dang-ky"]["showname"].value;
                    let em = document.forms["dang-ky"]["email"].value;

                    if(ac != "" && pw != "" && rpw != "" && un != "" && em != ""){
                        if(pw == rpw){
                            $.ajax({
                            url: "./appProcess/signup.php",
                            method: "POST",
                            data:{account:ac,pass:pw,user:un,email:em},
                            success:function(data,status){
                                let rs = JSON.parse(data);
                                console.log(rs);
                                if(rs["success"] == "true"){
                                    alert("Bạn đã đăng ký tài khoản thành công");
                                    window.location.assign("./thietlapvi.php");
                                }
                                else
                                    alert(rs["message"]);
                            }
                        });
                        }else{
                            alert("Nhập lại mật khẩu không trùng");
                        }
                    }else{
                        alert('Không được để trống các trường');
                    }  

               });
                       
            </script>
</body>