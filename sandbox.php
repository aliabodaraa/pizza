
<?php
$score=30;
echo $score > 40 ? "High Score<br>":"Low Score<br>";
echo $_SERVER["SERVER_NAME"].'<br>';
echo $_SERVER["REQUEST_METHOD"].'<br>';
echo $_SERVER["SCRIPT_FILENAME"].'<br>';
echo $_SERVER["PHP_SELF"].'<br>';

//session are stored on server between cookies are stored on user computer
if(isset($_POST['submitName'])){
    //cookie
    //set cookie
    setcookie('gender',$_POST['gender'],time()+8887545);

    //session
    session_start();
    $_SESSION['name1']=$_POST['name'];
    echo $_SESSION['name1'];
    header('location:index.php');


    //File System Part 1
            $quotes=readfile('./readme.txt');
            echo $quotes;//if the file not exist it give an error , solution in below
            $file='readme.txt';
            if(file_exists($file)){
                echo readfile($file);
            }else{
                echo "file doesn't Exist";
            }
            //Copy file
            copy($file,"quotes.txt"); //2 in 1 argument
            //Absolute Path
            echo realpath($file);
            //File Size
            echo filesize($file);
            //Rename File
            rename($file,'test.txt');
            //MAke Directory
            mkdir('quotes');
     //File System Part 2
            $file='quotes.txt';
            //Opening a file for reading
            $handle=fopen($file,'r');
            //read the file
            echo fread($handle,filesize($file));
            echo fread($handle,112); //read enough 112byte (chars)
            //read a single line

            echo fgets($handle);//read a  line 1
            echo fgets($handle);//read a line 2 .because the pointer position in the start line 2.
            //read a single charecter
            echo fgetc($handle);//will write one cgharecter in the position of poiner(in the start line 3 (Currently))
            $handle=fopen($file,'r');//for read and write in the file
            //writing to a file
            fwrite($handle,"\n ALi Abodaraa");//will go down line 1 (enough) and write over the line 1 previously
            $handle=fopen($file,'a or a+');//for translate the pointer from the end file
            //closing file
            fclose($handle);
            //deleting file
            unlink($file);

}
//Classes
class User{
    private $name;
    private $email;
    public function __construct($name,$email){
        $this->name=$name;
        $this->email=$email;
    }
    public function login(){
        echo $this->name . ' logged in ' ;
    }
    public function getName(){
        return $this->name ;
    }
    public function setName($name){
        if(is_string($name) &&strlen($name)>1){
            $this->name=$name;
            return "name has been updated to '$name'" ;
        }else{
            return "Not a valid name '$name'";}
        return $this->name ;
    }
}
    $userOne =new User('ali','aliabodraa@yahoo.com');
    echo $userOne->login();
    echo $userOne->getname();
    echo $userOne->setname("y");
    echo $userOne->getname();

?>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ;?>" method="post">
<input type="text" name="name" id="">
<input type="submit" name="submitName" value="Submit">
<select name="gender" id="">
<option>female</option>
<option>male</option>
</select>
</form>
</body>
</html>
