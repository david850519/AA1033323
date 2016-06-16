<html>
<head>
	<title>來寄信吧</title>
</head>
<body>
<center>
	<form action="" method="post">
	輸入您的Gmail帳號:<input type="text" name="Username"><br/>
	輸入您的Gmail密碼:<input type="password" name="Userpasswd"><br/>
	寄信者名字:<input type="text" name="FromName"><br/>
	收信者Gmail帳號:<input type="text" name="ToName"><br/>
	信件標題:<input type="text" name="Subject"><br/>
	信件內容:<textarea cols="50" rows="5" name="Body">輸入你想要寫的內容...</textarea><br/>
	<input type="submit" value="提交">
</center>
</body>
</html>

<?php
require("PHPMailer/PHPMailerAutoload.php");
$Username=$_POST["Username"];
$Userpasswd=$_POST["Userpasswd"];
$FromName=$_POST["FromName"];
$ToName=$_POST["ToName"];
$Subject=$_POST["Subject"];
$Body=$_POST["Body"];
echo $Username;
echo $Userpasswd;
echo $FromName;
echo $ToName;
echo $Subject;
echo $Body;

$mail=new PHPmailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username=$Username;
$mail->Password=$Userpasswd;
$mail->From=$Username;
$mail->FromName=$FromName;
$mail->Subject=$Subject;
$mail->AddAddress($ToName);
$mail->CharSet="utf-8";
$mail->Body=$Body;
if($mail->Send()) {                             // 郵件寄出
            echo $receiver[0]." 已收到信件！<br/>";
        } else {
            echo $mail->ErrorInfo . "<br/>";
        }
        $mail->ClearAddresses();                        // 清除使用者欄位，為下一封信做準備  
?>  