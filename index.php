<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages to shivani</title>
    <meta name="viewport" content = "width=device-width, initial-scale=1">
    <meta name="theme-color" content="#4169E1">
    <style>
        body{
            margin:0;
            text-align: center;
            background-color:#eee;
        }
        hr{
            border:none;
            height: 2px;
            background: black;
            background: -webkit-gradient(linear, 0 0, 100% 0, from(white), to(white), color-stop(50%, black));
        }
        div#header{
            text-align: center;
            padding: 10px;
            background-color: #4169E1;
            color: white;
        }
        div#form{
            margin-top:20px;
            margin-left:20%;
            margin-bottom: 20px;
            text-align: center;
            background-color: white;
            width: 60%;
            padding: 5px;
            border-radius: 5px;
        }
        div#form label{
            font-size: 1.05em;
        }
        div#form textarea{
            font-size: 1.05em;
            padding: 5px;
        }
        div#form input{
            font-size: 1.05em;
            padding: 5px;
            margin-bottom: 3px;;
        }
        div#form input[type="submit"]{
            border:none;
            background-color: #4169E1;
            color: white;
            padding: 10px;
        }
        div#form input[type="submit"]:hover{
            color: #4169E1;
            background-color: white;
            border: 1px solid black;
            border-radius: 2px;
        }
        div#form p{
            width: 60%;
            margin-left: 20%;
            font-size: 1.3em;
            font-style: italic;
        }
        @media screen and (max-width : 640px){
            div#form{
                width: 88%;
                margin-left: 6%;
            }
            div#form p{
                width:100%;
                margin-left: 0;
            }
            div#form textarea{
                width: 88%;
            }
            div#form input{
                width: 88%;
            }
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbName="bday";
$conn = mysqli_connect($servername, $username, $password,$dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $fName=$lName=$msg=$ques=$ans="";
    $fName = test_input($_POST["firstName"]);
    $lName = test_input($_POST["lastName"]);
    $msg = test_input($_POST["message"]);
    $ques = test_input($_POST["question"]);
    $ans= test_input($_POST["answer"]);
    $sql="INSERT INTO `response`(`firstName`, `lastName`, `message`, `question`, `answer`) VALUES (\"$fName\",\"$lName\",\"$msg\",\"$ques\",\"$ans\")";
    if(mysqli_query($conn,$sql)){
        header("location: thanks.html");
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
function test_input($data){
    $data = trim($data);
    return $data;
}
?>
<div id="header">
    <h1>Birthday Messages</h1>
</div>
<div id="form">
    <form method="post" onsubmit="return isValid()" >
        <label><b>Name:</b></label><br/>
        <input id="fName" type="text" placeholder="First name" name="firstName" required/>
        <input id="lName" type="text" placeholder="Last name" name="lastName" required/>
        <br/><br/>
        <label><b>Message:</b></label><br/>
        <textarea id="msg" cols="40" rows="5" name="message" placeholder="Enter your message here"></textarea>
        <br/><br/>
        <hr/>
        <p>Shivani keeps feeling low about the fact that dentistry is frustrating, let us help her out by testing her
        dentistry skills by asking a question with a one word answer, the question needs to necessarily be related to dentistry
         difficulty level is your own choice.</p>
        <hr/>
        <label><b>Question:</b></label><br/>
        <textarea id="ques" cols="40" rows="5" name="question" placeholder="Enter a question"></textarea><br/>
        <label><b>Answer:</b></label><br/>
        <input type="text" id="ans" name="answer" onkeyup="validate()" placeholder="One word answer" required/><br/><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
</div>
<script>
    function validate(){
        var ans = document.getElementById("ans");
        if(/\s/.test(ans.value)){
            ans.setCustomValidity("One word answer required");
        } else{
            ans.setCustomValidity("");
        }
    }
    function isValid(){
        var fName=document.getElementById("fName");
        var lName=document.getElementById("lName");
        var msg=document.getElementById("msg");
        var ques=document.getElementById("ques");
        var ans=document.getElementById("ans");
        if(fName.value.trim()==""||lName.value.trim()==""||msg.value.trim()==""||ques.value.trim()==""||ans.value.trim()=="") {
            alert("Stop fooling around "+msg.value);
            return false;
        } else {
            return true;
        }
    }
</script>
</body>
</html>
