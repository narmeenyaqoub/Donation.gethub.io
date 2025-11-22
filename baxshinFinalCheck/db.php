<?php 
$surverName='localhost';
$userName='root';
$password='';

$conn=new mysqli($surverName, $userName, $password);
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}

$sql="CREATE DATABASE donation";
if($conn->query($sql)===TRUE){
    echo "Database Created...";
}else{
    echo "Database Creation failed: ".$conn->connect_error;
}

$conn->select_db("donation");

$sql="CREATE TABLE moneyDonation (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(20) NOT NULL,
    amountOfMoney DECIMAL(10,2) NOT NULL,
    choosen_center VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
";
if($conn->query($sql)===TRUE){
    echo "Table moneyDonation Created...";
}else{
    echo "Table moneyDonation Creation failed: ".$conn->connect_error;
}
$sql="CREATE TABLE clothes(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(60) NOT NULL,
phone_number VARCHAR(20) NOT NULL,
clothes_type VARCHAR(15) NOT NULL,
delivery_type VARCHAR(25) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
";
if($conn->query($sql)===TRUE){
    echo "Table clothes Created...";
}else{
    echo "Table clothes Creation failed: ".$conn->connect_error;
}
$sql="CREATE TABLE food(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(60) NOT NULL,
phone_number VARCHAR(20) NOT NULL,
food_type VARCHAR(15) NOT NULL,
food_number INT NOT NULL,
delivery_type VARCHAR(25) NOT NULL,
choosen_center VARCHAR(50) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
";
if($conn->query($sql)===TRUE){
    echo "Table food Created...";
}else{
    echo "Table food Creation failed: ".$conn->connect_error;
}
$sql="CREATE TABLE other(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
full_name VARCHAR(60) NOT NULL,
phone_number VARCHAR(20) NOT NULL,
help_type VARCHAR(50) NOT NULL,
help_description VARCHAR(200) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
";
if($conn->query($sql)===TRUE){
    echo "Table other Created...";
}else{
    echo "Table other Creation failed: ".$conn->connect_error;
}


$sql="CREATE TABLE aboutUs (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(60) NOT NULL,
  aboutUs_description VARCHAR(300) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
";
if($conn->query($sql)===TRUE){
    echo "Table aboutUs Created...";
}else{
    echo "Table aboutUs Creation failed: ".$conn->connect_error;
}
$sql="CREATE TABLE aboutUs_images (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  about_id INT UNSIGNED,
  image_path VARCHAR(255) NOT NULL,
  FOREIGN KEY (about_id) REFERENCES aboutUs(id) ON DELETE CASCADE
)";
if($conn->query($sql)===TRUE){
    echo "Table aboutUs_images Created...";
}else{
    echo "Table aboutUs_images Creation failed: ".$conn->connect_error;
}

$about_entries = [
        [
        "title" => "بەخشینا خوارنێ",
        "desc"  => "ل روژا ئەینی ٨/٨/٢٠٢٥ خاتینەک رابویە ب دروستکرنا خوارنێن جودا بو زاروکان",
        "images" => [
            "/baxshin/views/images/kids2.jpg",
            "/baxshin/views/images/food1.jpg",
            "/baxshin/views/images/food2.jpg",
            "/baxshin/views/images/kids2.jpg",
            "/baxshin/views/images/food1.jpg"
        ]
        ],
    [
        "title" => "سەرەدانا بچیکان بو دریم ستی",
        "desc"  => "ل روژا ١١/٩/٢٠٢٥ سێشەمب خێرخوازەک رابویە ب دانانا ئیڤێنتەکا جیاواز و دلخوشکەر بو بچیکان. کو ئەژی برنا وان بو درێم ستی بو. زاروک پێکڤە گەلەک یاری کرن و دەمەکێ خوش بوراندن.",
        "images" => [
            "/baxshin/views/images/kids.jpg",
            "/baxshin/views/images/kidsPlaying.jpg",
            "/baxshin/views/images/play.jpg",
            "/baxshin/views/images/playground.jpg",
            "/baxshin/views/images/swing.jpg"
        ]
    ],
    [
        "title" => "کرینا جلکان بو دانعەمران",
        "desc"  => "ل روژا ئێکشەمب ٢٤/٨/٢٠٢٥ خێرخوازەک جلوبەرگێن نوی بو دانعەمران کرین و خوبەخشێن مە هاریکاری د بەڵاڤکرنا وان جلکان دا کر و پشتراستی د هندێ دا کرن کو هەر کەسەک جلکەکێ بدلێ خو و گونجای بو بگەهتە دەستی",
        "images" => [
            "/baxshin/views/images/elderlyClothes.jpg",
            "/baxshin/views/images/clothes.jpeg",
            "/baxshin/views/images/elderlyClothes.jpg",
            "/baxshin/views/images/clothes.jpeg",
            "/baxshin/views/images/elderlyClothes.jpg"
        ]
    ]
];


foreach ($about_entries as $about) {
    
    $title = $conn->real_escape_string($about['title']);
    $desc  = $conn->real_escape_string($about['desc']);
    
    $sql = "INSERT INTO aboutUs (title, aboutUs_description)
            VALUES ('$title', '$desc')";
    
    if ($conn->query($sql) === TRUE) {
        $about_id = $conn->insert_id;

        foreach ($about['images'] as $img) {
            $sql_img = "INSERT INTO aboutUs_images (about_id, image_path)
                        VALUES ($about_id, '$img')";
            $conn->query($sql_img);
        }

        echo "Inserted";
    } else {
        echo "Insertion failed" . $conn->error;
    }
}




$sql="INSERT INTO food(full_name ,phone_number, food_type, food_number, delivery_type, choosen_center) VALUES
('احمد محمد', '+9647503333333', 'ئاهێن خوارنێ', 30 , 'ئەز دێ ئینمە جهێ هەوە', 'سەنتەر ١')
";
if($conn->query($sql)===TRUE){
    echo "food inserted...";
}else{
    echo "food insertion failed: ".$conn->connect_error;
}

$sql="INSERT INTO other(full_name ,phone_number, help_type, help_description) VALUES
('بارین ئاراز', '+9647503333333', 'کرینا جلکان بو دانعەمران', 'جلوبەرگێن نوی بو دانعەمران کرین')
";
if($conn->query($sql)===TRUE){
    echo "other inserted...";
}else{
    echo "other insertion failed: ".$conn->connect_error;
}




//-----------------------------------------------------------------------------------------





   //volunteer table 

$sql ="CREATE TABLE volunteer(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname varchar(25) NOT NULL,
email varchar(25) NOT NULL,
phone varchar(50) NOT NULL,
age INT,
roles varchar(25) NOT NULL,
skills varchar(50),
availability varchar(50),
degree varchar(50),
rd TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if($conn->query($sql)=== TRUE){
    echo "Table volunteer is Created....";
}
else{
    echo "Error, Table volunteer Creation Failed: ".$conn->connect_error;
}

//---------------------------------------------------------------------


   //contact_feedback table
$sql ="CREATE TABLE contact_feedback(
  id INT AUTO_INCREMENT PRIMARY KEY,
  feedback TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

if($conn->query($sql)=== TRUE){
    echo "Table contact_feedback  is Created....";
}
else{
    echo "Error, Table contact_feedback Creation Failed: ".$conn->connect_error;
}

//---------------------------------------------------------------------

//registration table
$sql ="CREATE TABLE registration(
  id INT AUTO_INCREMENT PRIMARY KEY,
  centername varchar(50) NOT NULL,
  centertype varchar(50)  NOT NULL,
  centerphone varchar(25) NOT NULL,
  centeremail varchar(50)  NOT NULL,
  centermsg TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

if($conn->query($sql)=== TRUE){
    echo "Table registration Created....";
}
else{
    echo "Error, Table registration Creation Failed: ".$conn->connect_error;
}


//------------------------------------------------------------


$sql ="CREATE TABLE centers(
  id INT AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  city VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL,
  needs VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

if($conn->query($sql)=== TRUE){
    echo "Table centers is Created....";
}
else{
    echo "Error, Table centers Creation Failed: ".$conn->connect_error;
}



$sql ="INSERT INTO centers (image, name, city, type, needs, description)
VALUES (
  '/baxshin/views/images/2.JPG',
  'هیڤیا بێ سەمیان',
  'دهوك',
  'Orphans',
  'خارن، جل و بەرگ',
  'سەنتەرێ هیڤیا بێ سەمیانا گرنگیێ ددەتە زاروکێن دهێنە هاڤێتن هەر ژ روژا ژ دایکبونێ و هەتا د بنە ١٨ سال'
),
 ('/baxshin/views/images/3.JPG',
  'هیڤی',
  'سلێمانی',
  'Orphans',
  'خارن، جل و بەرگ',
  'سەنتەرێ هیڤی گرنگیێ ددەتە پێشکەفتنا بێ سەمیانا ب رێکا خاندنێ بو گەهشتنا هەر حەز و هیڤیەکا وان دڤێت'
),
 ('/baxshin/views/images/7.JPG',
  'تەمەنێ زێرین',
  'هەولێر',
  'Elderly',
  'جل و بەرگ',
  'ل سەنتەرێ تەمەنێ زێرین چاڤدانەکا باش بو دانعەمرا دهێتە کرن. و پێداویستێن وان بو دهێنە دابین کرن'
),
 ('/baxshin/views/images/4.JPG',
  ' هاریکار',
  'سلێمانی',
  'Both',
  'خارن',
  'ئارمانجا مە ئەوە کو بێ سەمیان و دانعەمرێن بێ خودان ژ وێ رەوشا ئالوزا ئەو تێدا بیننە دەر بو رەوشەکا باشت'
),
 ('/baxshin/views/images/5.JPG',
  ' مالا دانعەمرا',
  'دهوك',
  'Elderly',
  'خارن، جل و بەرگ',
  'مالا دان عەمرا هاتیە دروست کرن ژبو نەهێلانا هەستێ بێ خودانیێ و بتنێ بونێ لدەف دانعەمرا'
),
 ('/baxshin/views/images/6.JPG',
  'چاڤدانا دانعەمرا',
  'هەولێر',
  'Elderly',
  'خارن، جل و بەرگ',
  'سەنتەرێ چاڤدانا دانعەمرا گرنگیێ ددەتە پەیداکرنا ساخلەمیەکا باش با دانعەمرا و نەهیلانا کێماسیێن وان'
)
";

if($conn->query($sql)=== TRUE){
    echo " Data Inserted into centers....";
}
else{
    echo "Error, Test Data Insertion Failed: ".$conn->connect_error;
}




$sql ="CREATE TABLE profiles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    image VARCHAR(255)NOT NULL,
    needs VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

if($conn->query($sql)=== TRUE){
    echo "Table profiles is Created....";
}
else{
    echo "Error, Table  profile Creation Failed: ".$conn->connect_error;
}


$sql= "INSERT INTO profiles (name, age, image, needs, description) VALUES
(
'ئەحمەد',
 10, 
 '/baxshin/views/images/10.jpg',
  'نشتەگەری',
   'ئەحمەد زاروکە کە هەر د ژیەکێ گەلەك بچیك دا تەحلاتیا هەستێ بێ دەیک و بابیێ دیتیە. د ژیێ ٢ سالیێ دا دەیك و بابێن وی ب ریدانەکا ترومبێلێ چوینە بەر دلوڤانیا خودێ. هەر ژ ژیێ ٨ سالیێ و هەتا نوکە بارێ وی یێ تەندروستی یێ خرابە و پێتڤی ب نشتەگەریا مێلاکێ یە. نوژداران هوسا دایە دیارکرن کو توندروستا وی روژ بو روژێ دێ خراپتر بیت ئەگەر نشتەگەری بو نە ئێتە کەن'
   ),
(
'فاتیما',
 83, 
 '/baxshin/views/images/8.jpg',
  'نشتەگەری', 
  'فاتیمایێ ژیانا خو هەمی کریە قوربانی و ب کارکرنێ ڤە بوراندیە پێخەمەت بخودانکرنا زاروکێن خو کو د دەمەکی دا بابێ زاروکێن وێ د تەمەنێ گەنجاتیێ دا چویە ڤەر دلوڤانیا خودێ. و نوکە، ئەو زاروکێن وێ ژیانا خو بە کریە قوربانی بتنێ هێلایە بێخودان. ژ ئەگەرێ گەلەك کارکرنێ زەحمەتیەکا مەزن ب پێ یێن فاتیمایێ کەتیە و ب هوشداریا ناژداری، ئەگەر نە ئێنە چارەسەر کرن دبیت ژکار بکەڤن'
),
(
'سارا',
 7,
  '/baxshin/views/images/9.jfif',
   'نشتەگەری', 
   'سارا د ژیەکی دا کو پێتڤی ب ژیانانەکا ئارام و پری حەژێکرن، دیمەنەکێ گەلەك ب ترس ل پێش چاڤێن خو دیتیە. هەر دەمێ ئەو ٦ سال بابێ وێ ل پێش چاڤێن وێ دایکا وێ ب رەنگەکێ درندانە کوشتیە. ئەڤ دیمەنە هەر و هەر ل پێش چاڤێن وێیە و وەل وێ کریە کو ئێدی نە ئاخڤین و ژ هەر کەسەکی ب ترسیت. ئەگەر نە هێتە چارەسەر کرن لدەف نوژدارێن دەرونی، دبیت رەوشا وێ هێدی هێدی')

";
if($conn->query($sql)=== TRUE){
    echo "Data Inserted into profiles....";
}
else{
    echo "Error, Test Data Insertion Failed: ".$conn->connect_error;
}
    


?>