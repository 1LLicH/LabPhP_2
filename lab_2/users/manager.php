<?php
session_start();
include 'C:\Users\Admin\Downloads\Open Server 5.3.5\OSPanel\domains\final-2lb-test\users.php';
include 'C:\Users\Admin\Downloads\Open Server 5.3.5\OSPanel\domains\final-2lb-test\resources\lang.php';


if($_GET["exit"])
{
    session_destroy();
    header("Location: ..\index.php"); 


if (isset($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];
}

if ((!(($_SESSION['role']) == 'admin')) && (!(($_SESSION['role']) == 'manager'))){
    session_destroy();
    header( 'location:  ..\index.php');
}

class User{
    public $login;
    public $password;
    public $name;
    public $surname;
    public $role;
    public $langhi;
    public $langinfo;

    function __construct($login,$password,$name,$surname,$role,$langhi,$langinfo)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->langhi = $langhi;
        $this->langinfo = $langinfo;
    }
}


class manager extends user {

    public function welcome (){
        echo $this ->langhi . $this->name. "  " . $this->surname. "  ". $this ->langinfo;
    }
}


if ($_SESSION['role'] == 'admin') {
    $n_rl = 1;
}

if ($_SESSION['role'] == 'manager') {
    $n_rl = 2;
}

if ($_SESSION['role'] == 'client') {
    $n_rl = 3;
}


if ($_SESSION['lang'] == 'ru') {
            $manager = new manager($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['ru'], $lang[$n_rl]['ru']);
}
if ($_SESSION['lang'] == 'en') {
            $manager = new manager($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['en'], $lang[$n_rl]['en']);
}
if ($_SESSION['lang'] == 'ua') {
            $manager = new manager($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['ua'], $lang[$n_rl]['ua']);
       }
if ($_SESSION['lang'] == 'it') {
            $manager = new manager($_SESSION['login'], $_SESSION['password'], $_SESSION['name'], $_SESSION['surname'], $_SESSION['role'], $lang[0]['it'], $lang[$n_rl]['it']);
}
    $manager ->welcome();
?>


<head>
    <title>Менеджер</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
<form >
    <select name="lang" method="GET">
        <option value="ru">Русский</option>
        <option value="ua">Українська</option>
        <option value="en">English</option>
        <option value="it">Italian</option>
    </select>
    <input type="submit"value="Save">
</form>

<form method="GET">
    <input type="submit" name="exit" class= "ex-b" value="Exit">
</form>

<?php if($_SESSION['role'] == 'admin') { ?>

    <form name = "test" action = "admin.php" method = "post">
        <button>Admin</button>
    </form>
   <form name = "test" action = "client.php" method = "post">
    <button>Client</button>
    </form>
<?} ?>

<?php if($_SESSION['role'] == 'manager') { ?>

  
   <form name = "test" action = "client.php" method = "post">
    <button>Client</button>
    </form>
<?} ?>



</body>

