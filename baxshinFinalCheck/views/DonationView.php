<?php
// ===== VIEW =====
class DonationView
{
  public function getHeader()
  {
    return '
      <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>بەخشین</title>
            <link rel="stylesheet" href="views/style.css">  
        </head>
        <body>
';
  }

  public function getFooter()
  {
    return '
                </body>
        </html>
        ';
  }


  public function getNavBar()
  {
    return '
    <header>
        <div class="logo"><a href="?page=home">بەخشین</a></div>
        <nav class="nav">
            <ul>
                <li><a class="navlink" href="?page=contactUs">دەربارەی مە</a></li>
                <li><a class="navlink" href="?page=contactUs#contact">پەیوەندی</a></li>
                <li><a class="navlink" href="?page=centers">دەربارەی سەنتەران</a></li>
                <li><a class="navlink" href="?page=home#donation">بەخشین</a></li>
                <li><a href="#volunteerModal" class="navlink btn-volunteer">خوبەخش</a></li>
            </ul>
        </nav>
    </header>
        ';
  }



  public function getHomeBody()
  {
    return '
              <!--hero section-->
    <section class="hero-section">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1 class="hero-title">باشیێ بکە کریار</h1>
                <p class="hero-subtitle">ببە ئاڤاکەرێ پرەکا هیڤیا بو بێ سەمیان و دانعەمرێن بێ خودان</p>
                <div class="hero-buttons">
                    <a href="?page=home#donation" class="btn btn-donate">بەخشینێ بدە</a>
                    <a href="#volunteerModal" class="btn btn-volunteer">ببە خوبەخش</a>         
                </div>
            </div>
        </div>
    </section>
    <hr>
';
  }
  public function getContactUS()
  {
    return '
        <!--about us/website-->
    <section class="about-section" id="about">
            <div class="about-container">
                <h2 class="about-title"> دەربارەی مە</h2>
                <p class="about-text">
                   ئەم دو گەنجین ژ باژێرێ دهۆکێ، مە پێشخەریەکا مرۆڤایەتی ل سەرانسەری کوردستانێ دەسپێکرییە، بۆ بێ سەمیان و دانعەمران، ئارمانجا مە ئەوە کو ئەم ژیانا وان یا ڕۆژانە و ئێش و ئازارێن
                   وان دیاربکەین ، ب ڕێکێن سانەهی هاریکاریا وان بکەین، هوین دشێن ب ڕێکا (خوران، جل و بەرگ، یان ژی ب ئاماژەیکا بچویک) کو ڕۆژا وان خۆشبکەت و گرنژینەکێ 
                   بێخیتە سەر لێڤێن وان، ئەرکێ مە ئەوە هەستێ دلخۆشی و هیڤیا ددلێ وان دا نوی بکەین، و نیشا خەلکی بدەین کو بچویکترین کریار دشێت ببیتە مەزنترین دیاری.
                   <a href="?page=home#aboutus">بو دىتنا کارێن مە</a>
                </p>
            </div>
    </section>
    <hr>

' . $this->getContactForm() . '
<hr>
    ';
  }

  public function getVolunteerForm($arrDecode)
  {

    $arrDecode = array();
    if (isset($_COOKIE['volunteerForm'])) {
      $arr = $_COOKIE['volunteerForm'];
      $arrDecode = json_decode($arr, true);
    }
    return '
      <div id="volunteerModal" class="modal">
  <div class="modal-content">
    

    <form method="POST" class="volunteer-form">
    <button class="close" type="submit" name="action" value="closeform">&times;</button>
      <h1>ببە خوبەخش</h1>

      <label for="fullname">ناڤ</label>
      <input type="text" id="fullname" placeholder="…ناڤێ خو بنڤیسە" required name="firstname" value="' . ($arrDecode['firstname'] ?? '') . '">

      <label for="email">ئیمێل</label>
      <input type="email" id="email" placeholder="…ئیمێلێ خو بنڤیسە" required name="email" value="' . ($arrDecode['email'] ?? '') . '">

      <label for="phone">ژمارا تلەفونێ</label>
      <input type="tel" id="phone" placeholder="…ژمارا تلەفونا خو بنڤیسە" required name="phone" value="' . ($arrDecode['phone'] ?? '') . '">

      <label for="age">تەمەن</label>
      <input type="number" id="age" placeholder="…تەمەنێ خو بنڤیسە" required name="age" value="' . ($arrDecode['age'] ?? '') . '">


    <label>جورێ خوبەخشیێ</label>
        
    <select id="role" name="role" value="role" required>
    <option value="" ' . ((($arrDecode["role"] ?? '') == '') ? 'selected' : '') . '>هەلبژارتن</option>
    <option value="شوفێر" ' . ((($arrDecode["role"] ?? '') == 'شوفێر') ? 'selected' : '') . '>شوفێر</option>
    <option value="هاریکارێ ئیڤێنتا"' . ((($arrDecode["role"] ?? '') == 'هاریکارێ ئیڤێنتا') ? 'selected' : '') . '>هاریکارێ ئیڤێنتا</option>
    <option value="دابەشکەر"' . ((($arrDecode["role"] ?? '') == 'دابەشکەر') ? 'selected' : '') . '>دابەشکەر</option>
    </select>

      <label for="skills">هندەك شیانێن دی(ئەگەر هەبن)</label>
      <input type="text" id="skills" placeholder="بو نمونە ماموستا…هتد" name="skills" value="' . ($arrDecode['skills'] ?? '') . '">

      <label for="availability">دەمێن بەردەستبوونێ</label>
      <input type="text" id="availability" placeholder="بو نمونە روژێن حەفتیێ و دەمێن روژێ" name="availability" value="' . ($arrDecode['availability'] ?? '') . '">

      <label for="degree"> ئاستێ خاندنێ</label>
      <input type="text" id="degree" placeholder="بو نمەنە دەرچویێ زانکویێ" name="degree" value="' . ($arrDecode['degree'] ?? '') . '">

      <button type="submit" class="volunteerconfirm" name="action" value="submitform">تومارکرن</button>
    </form>
  </div>
</div>


<script src="/baxshin/views/script.js"></script>
  ';
  }



  public function getDonation($formType, $message = '')
  {

    return '
    <section id="donation">
      <div class="donation-type-container">
    <div class="donation-type-box">
      <img src="/baxshin/views/images/money.png" alt="1" class="icon">
      <h2>دانا پاران</h2>
      <p>كوژمەکێ کێم، گوهرینەکا مەزن</p>
      <a href="?page=home&form=money" class="donate" data-type="money">بەخشین</a>
    </div> 

  
    <div class="donation-type-box">
      <img src="/baxshin/views/images/clothes.png" alt="2" class="icon">
      <h2>دانا جلكان</h2>
      <p>بخەلاتەکی گرنژینێ پەیدابکە</p>
      <a href="?page=home&form=clothes" class="donate" data-type="clothes">بەخشین</a>
    </div>

  
    <div class="donation-type-box">
      <img src="/baxshin/views/images/food.png" alt="3" class="icon">
      <h2>دانا خارنان</h2>
      <p>برسێ بشکێنە، هێزێ زێدەبکە</p>
      <a href="?page=home&form=food" class="donate" data-type="food">بەخشین</a>
    </div>

  
    <div class="donation-type-box">
      <img src="/baxshin/views/images/other.png" alt="4" class="icon">
      <h2>دانا هەرتشتەکێ دی</h2>
      <p>هەر دییاریەک کەیفخوشییە</p>
      <a href="?page=home&form=other" class="donate" data-type="other">بەخشین</a>
    </div>' . $this->showSelectedForm($formType, $message) . '


  </div>
</section>

 
  
        ';
  }
  public function getMoneyForm($decodeArr, $message = '')

  {
    $error_alert = '';
    if ($message) {
      $error_alert = '
            <p style="color: red;">' . $message . '</p>';
    }
    return '
                 <div class="popup-overlay active">
        <div class="popup-content">
        
         <form method="POST" id="donation-form">
         <button type="submit" class="close-btn" name="action" value="close">&times;</button>
            <h2 class="popup-title">دانا پاران</h2>
            ' . $error_alert . '
  <div class="form-group">
    <label for="phoneNumber">هژمارا تەلەفونێ</label>
    <input type="tel"  pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phoneNumber" name="phoneNumber" value="' . ($decodeArr['phoneNumber'] ?? '') . '">
  </div>
  <div class="form-group">
    <label for="amount">بڕێ پارەی ب ($)</label>
    <input type="number" id="amount" name="amount" min="1" value="' . ($decodeArr['amount'] ?? '') . '" >
  </div>

      <div class="form-group">
      <label for="centerName">تە دڤێت پاران بدەیە کێ؟</label>
      <select id="centerName" name="centerName" >
        <option value="any" ' . ((($decodeArr["centerName"] ?? 'any') == 'any') ? 'selected' : '') . '>هەر جهەکێ پێتڤی</option>
        <option value="center1" ' . ((($decodeArr["centerName"] ?? '') == 'center1') ? 'selected' : '') . '>سەنتەر1</option>
        <option value="center2" ' . ((($decodeArr["centerName"] ?? '') == 'center2') ? 'selected' : '') . '>سەنتەر2</option>
        <option value="center3" ' . ((($decodeArr["centerName"] ?? '') == 'center3') ? 'selected' : '') . '>سەنتەر3</option>
      </select>
    </div>
    <button type="submit" class="submit-btn" name="action" value="submit">هنارتن</button>
</form>
</div>
</div>
        ';
  }
  public function getClothesForm($decodeArr, $message = '')
  {
    $error_alert = '';
    if ($message) {
      $error_alert = '
            <p style="color: red;">' . $message . '</p>';
    }
    return '
          <div class="popup-overlay active">
        <div class="popup-content">
            
         <form method="POST" id="donation-form">
         <button type="submit" class="close-btn" name="action" value="close">&times;</button>
            <h2 class="popup-title">دانا جلكان</h2>
            ' . $error_alert . '
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" value="' . ($decodeArr["name"] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phone" name="phone" value="' . ($decodeArr["phone"] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="items">جورێ جلکان</label>
    <select id="items" name="items" >
      <option value="" ' . ((($decodeArr["items"] ?? '') == '') ? 'selected' : '') . '>هەلبژارتن</option>
      <option value="men" ' . ((($decodeArr["items"] ?? '') == 'men') ? 'selected' : '') . '>جلکێن زەلامان</option>
      <option value="women" ' . ((($decodeArr["items"] ?? '') == 'women') ? 'selected' : '') . '>جلکێن ئافرەتان</option>
      <option value="children" ' . ((($decodeArr["items"] ?? '') == 'children') ? 'selected' : '') . '>جلکێن زاڕۆکان</option>
      <option value="shoes" ' . ((($decodeArr["items"] ?? '') == 'shoes') ? 'selected' : '') . '>پێلاڤ</option>
      <option value="mixed" ' . ((($decodeArr["items"] ?? '') == 'mixed') ? 'selected' : '') . '>تێکەل</option>
    </select>
  </div>
    <div class="form-group">
      <label for="delivery">ئەرێ تە دڤێت چەوا جلکان بگەهینی؟</label>
      
      <select id="delivery" name="delivery" >
        <option value="" ' . ((($decodeArr["delivery"] ?? '') == '') ? 'selected' : '') . '>هەلبژارتن</option>
        <option value="pickup" ' . ((($decodeArr["delivery"] ?? '') == 'pickup') ? 'selected' : '') . '>ئەز دێ ئینمە جهێ هەوە</option>
        <option value="deliver" ' . ((($decodeArr["delivery"] ?? '') == 'deliver') ? 'selected' : '') . '>کەسەک بهێت ژمن وەربگریت</option>
      </select>
    </div>
   <button type="submit" class="submit-btn" name="action" value="submit">هنارتن</button>
</form>
        </div>
    </div>
        ';
  }
  public function getFoodForm($decodeArr, $message = '')
  {
    $error_alert = '';
    if ($message) {
      $error_alert = '
            <p style="color: red;">' . $message . '</p>';
    }
    return '
                 <div class="popup-overlay active">
        <div class="popup-content">
            
            <form method="POST" id="donation-form">
            <button type="submit" class="close-btn" name="action" value="close">&times;</button>
            <h2 class="popup-title">دانا خارنان</h2>
            ' . $error_alert . '
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" value="' . ($decodeArr["name"] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phone" name="phone" value="' . ($decodeArr["phone"] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="food-type">جورێ خوارنێ</label>
    <select id="food-type" name="food-type" >
      <option value="" ' . ((($decodeArr['foodType'] ?? '') == '') ? 'selected' : '') . '>هەلبژارتن</option>
      <option value="canned" ' . ((($decodeArr['foodType'] ?? '') == 'canned') ? 'selected' : '') . '>ئاهێن خوارنێ</option>
      <option value="cooked" ' . ((($decodeArr['foodType'] ?? '') == 'cooked') ? 'selected' : '') . '>خوارنا چێکری</option>
    </select>
  </div>
  <div class="form-group">
    <label for="quantity">خوارن تێرا چەند کەسانە؟</label>
    <input type="number" id="quantity" name="quantity" min="1" value=' . ($decodeArr["quantity"] ?? '') . ' required>
  </div>
      <div class="form-group">
      <label for="delivery">ئەرێ تە دڤێت چەوا خوارنێ بگەهینی؟</label>
      <select id="delivery" name="delivery" >
        <option value="" ' . ((($decodeArr["delivery"] ?? '') == '') ? 'selected' : '') . '>هەلبژارتن</option>
        <option value="pickup" ' . ((($decodeArr["delivery"] ?? '') == 'pickup') ? 'selected' : '') . '>ئەز دێ ئینمە جهێ هەوە</option>
        <option value="deliver" ' . ((($decodeArr["delivery"] ?? '') == 'deliver') ? 'selected' : '') . '>کەسەک بهێت ژمن وەربگریت</option>
      </select>
    </div>
      <div class="form-group">
      <label for="centerName">تە دڤێت خوارنێ بدەیە کێ؟</label>
      <select id="centerName" name="centerName" >
        <option value="any" ' . ((($decodeArr["centerName"] ?? 'any') == 'any') ? 'selected' : '') . '>هەر جهەکێ پێتڤی</option>
        <option value="center1" ' . ((($decodeArr["centerName"] ?? '') == 'center1') ? 'selected' : '') . '>سەنتەر1</option>
        <option value="center2" ' . ((($decodeArr["centerName"] ?? '') == 'center2') ? 'selected' : '') . '>سەنتەر2</option>
        <option value="center3" ' . ((($decodeArr["centerName"] ?? '') == 'center3') ? 'selected' : '') . '>سەنتەر3</option>
      </select>
    </div>
    <button type="submit" class="submit-btn" name="action" value="submit">هنارتن</button>
</form>
</div>
</div>
        ';
  }
  public function getOtherForm($decodeArr, $message = '')
  {
    $error_alert = '';
    if ($message) {
      $error_alert = '
            <p style="color: red;">' . $message . '</p>';
    }
    return '
                 <div class="popup-overlay active">
        <div class="popup-content">
            
        <form method="POST" id="donation-form">
        <button type="submit" class="close-btn" name="action" value="close">&times;</button>
            <h2 class="popup-title">دانا هەرتشتەکێ دی</h2>
            ' . $error_alert . '
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" value="' . ($decodeArr["name"] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phone" name="phone" value="' . ($decodeArr["phone"] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="donation-type">جورێ هاریکاریێ</label>
    <input type="text" id="donation-type" name="donation-type" placeholder="دەرمان، ئامییرە، رێکخستنا ئیڤێنتەکێ" value="' . ($decodeArr['donationType'] ?? '') . '" >
  </div>
  <div class="form-group">
    <label for="description">ڕوونكرن</label>
    <textarea id="description" name="description" rows="3" >' . ($decodeArr["description"] ?? '') . '</textarea>
  </div>
  <button type="submit" class="submit-btn" name="action" value="submit">هنارتن</button>
</form>
</div>
</div>
        ';
  }
  public function getSuccessMessage()
  {
    return '
      <div class="popup-overlay active">
        <div class="popup-content">
            <a href="?page=home" class="close-btn">&times;</a>
            <h2 class="popup-title">سوپاس بو هاریکارییا تە، بەخشینا تە بسەرکەفتیانە گەهشت</h2>
              </div>
              </div>
    ';
  }

  public function showSelectedForm($formType, $message = '')
  {
    $decodeArr = array();
    if (isset($_COOKIE['donationForm'])) {
      $arr = $_COOKIE['donationForm'];
      $decodeArr = json_decode($arr, true);
    }
    switch ($formType) {
      case 'money':
        return $this->getMoneyForm($decodeArr, $message);
      case 'clothes':
        return $this->getClothesForm($decodeArr, $message);
      case 'food':
        return $this->getFoodForm($decodeArr, $message);
      case 'other':
        return $this->getOtherForm($decodeArr, $message);
      case 'success';
        return $this->getSuccessMessage();
      default:
        return '';
    }
  }
  public function getCenters($centers = NULL)
  {


    echo '<main class="centers-page">
                <h2 class="center-title"> سەنتەرێن دیارکری</h2>

                <section class="search-bar">
                    <input type="text" placeholder="…لێگەرایانا سەنتەری" id="searchInput">
                    <select id="cityFilter">
                        <option value="">باژێری ب هەلبژێرە</option>
                        <option value="دهوك">دهوك</option>
                        <option value="هەولێر">هەولێر</option>
                        <option value="سلێمانی">سلێمانی</option>
                    </select>

                    <select id="typeFilter">
                        <option value="">جورێ سەنتەری</option>
                        <option value="Elderly">دانعەمر</option>
                        <option value="Orphans">بێ سەمیان</option>
                        <option value="Both">هەردو</option>
                    </select>

                    <button onclick="filterCenters()">لێگەریان</button>
                </section>

                <section class="centers-list">';

    if ($centers && $centers->num_rows > 0) {
      while ($row = $centers->fetch_assoc()) {
        echo '<div class="center-card" data-city="' . $row["city"] . '" data-type="' . $row["type"] . '">
                      <img src="' . $row["image"] . '" alt="' . $row["name"] . '">
                      <h3>' . $row["name"] . '</h3>
                      <p><strong>جهێ سەنتەری: </strong>' . $row["city"] . '</p>
                      <p><strong>پێتڤیا سەنتەری: </strong>' . $row["needs"] . '</p>
                      <p>' . $row["description"] . '</p>
                      <a href="?page=home&id=donation">بەخشین</a>
                      <a href="?page=center-profiles&id=' . $row["id"] . '">دیتنا پروفایلا</a>
                  </div>';
      }
    } else {
      echo "<p>هیچ سەنتەرێک نیە!</p>";
    }

    echo '</section></main>';
  }

  public function getcenterProfiles($profiles = NULL)
  {
    echo '<section class="profiles-section">
    <h2>چیروکێن سەنتەری</h2>
    <div class="profiles">';
    if ($profiles && $profiles->num_rows > 0) {
      while ($row = $profiles->fetch_assoc()) {
        echo '<div class="profile-card">
                        <div class="profile-image">
                            <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                        </div>
                        <div class="profile-content">
                            <h3>' . $row['name'] . '</h3>
                            <div class="age"><strong>تەمەن</strong>: ' . $row['age'] . '</div>
                            <p>' . $row['description'] . '</p>
                            <div class="needs"><strong>پێتڤیاتی</strong>: ' . $row['needs'] . '</div>
                            <a href="?page=home&id=donation" class="donate-btn">بەخشین</a>
                        </div>
                      </div>';
      }
    } else {
      echo "<p>there is no profile!</p>";
    }
    echo '    </div>
</section>';
  }

  public function getAboutUs($aboutUs)
  {
    $slides = '';

    foreach ($aboutUs as $about) {
      $slides .= '
        <div class="slide" id="aboutus">
            <div class="event-box">
                <h2 class="event-title">' . $about['title'] . '</h2>
                <p class="event-description">' . $about['aboutUs_description'] . '</p>
                <div class="images-container">';

      if (!empty($about['images'])) {
        foreach ($about['images'] as $img) {
          $slides .= '<img src="' . $img . '" class="square-image">';
        }
      }

      $slides .= '
                </div>
            </div>
        </div>';
    }

    return '
    <hr>
    <div class="slider">
        <button class="arrow" onclick="prevSlide()">&#10094;</button>
        <div class="slides-area">' . $slides . '</div>
        <button class="arrow" onclick="nextSlide()">&#10095;</button>
    </div>

    <script>
        let index = 0;
        const slides = document.querySelectorAll(".slide");

        function showSlide(i){
            slides.forEach((s, n)=> s.style.display = (n === i ? "block" : "none"));
        }

        function nextSlide(){ index = (index + 1) % slides.length; showSlide(index); }
        function prevSlide(){ index = (index - 1 + slides.length) % slides.length; showSlide(index); }

        showSlide(0);
    </script>';
  }


  public function getContactForm($arrDecode = [])
  {
    $arrDecode = array();
    if (isset($_COOKIE['registerform'])) {
      $arr = $_COOKIE['registerform'];
      $arrDecode = json_decode($arr, true);
    }
    return '
    <!-- Contact Section -->
<section class="contact-section" id="contact">
  <div class="contact-container">
    <h2 class="section-title">پەیوەندیێ ب مە بکەن </h2></br>

    <form method="POST" class="contact-form">

      <div class="form-group">
        <label>ژمارا تلەفونێ</label>
        <p>0750 318 6229 | 0751 200 2212</p>
      </div>

      <div class="form-group">
        <label  class="contact-hr">ئیمێل</label>
        <p>shavin.saleem@students.auk.edu.krd</p>
        <p>narmin.yaqob@students.auk.edu.krd</p>
      </div>

      <div class="form-group">
        <label  class="contact-hr">فیدبەگا تە</label>
        <textarea placeholder="…فیدبەگا خو بنڤیسە" name="feedback"></textarea>
      </div>

      <button type="submit" class="btn-submit"  name="action" value="submitfeedback">هنارتن</button>
    </form>

 
    <button id="toggle-center-form" class="btn-center"> تومارکرنا سەنتەری</button>


    <form method="POST"  class="center-form" id="center-form">
       <button type="submit" name="action" value="savedraft" class"draft">هەلگرتنا پێزانینا</button>

      <div class="form-group">
        <label>ناڤێ سەنتەری</label>
        <input type="text" placeholder="…ناڤێ سەنتەری بنڤیسە" name="centername" required value="' . ($arrDecode["centername"] ?? '') . '">
      </div>

      <div class="form-group">
        <label class="contact-hr">جورێ سەنتەری</label>
        <div class="centertype-group">
            <select class="centertype" id="centertype" name="centertype" value="centertype" required>
                <option value="" ' . ((($arrDecode["centertype"] ?? '') == '') ? 'selected' : '') . '>هەلبژارتن</option>
                <option value="سەنتەرێ بێ سەمیانا" ' . ((($arrDecode["centertype"] ?? '') == 'سەنتەرێ بێ سەمیانا') ? 'selected' : '') . '>شوفێر</option>
                 <option value=" سەنتەرێ دانعەمرا"' . ((($arrDecode["centertype"] ?? '') == 'سەنتەرێ دانعەمرا') ? 'selected' : '') . '>هاریکارێ ئیڤێنتا</option>
               <option value="هەردوو"' . ((($arrDecode["centertype"] ?? '') == 'هەردوو') ? 'selected' : '') . '>دابەشکەر</option>
            
            </select>
        </div>
      </div>


      <div class="form-group">
        <label class="contact-hr">ژمارا تلەفونێ</label>
        <input type="text" placeholder="…ژمارا تلەفونێ بنڤیسە" name="centerphone" required value="' . ($arrDecode["centerphone"] ?? '') . '">
      </div>

      <div class="form-group">
        <label class="contact-hr">ئیمێل</label>
        <input type="email" placeholder="…ئیمێلێ خو بنڤیسە" name="centeremail" required value=" ' . ($arrDecode["centeremail"] ?? '') . '">
      </div>

      <div class="form-group">
        <label class="contact-hr">نامە</label>
        <textarea placeholder="…ناما خو بنڤیسە" name="centermsg" >' . ($arrDecode["centermsg"] ?? '') . '</textarea>
      </div>

      <button type="submit" class="btn-submit "name="action" value="sbnContact">تومارکرن</button>
    </form>
  </div>
</section>
<script>


    document.getElementById("toggle-center-form").addEventListener("click", function() {
    const centerForm = document.getElementById("center-form");
    centerForm.style.display = centerForm.style.display === "block" ? "none" : "block";
  });
</script>
    ';
  }


  public function getFooterNav()
  {
    return '
       <footer class="footer">
  <div class="footer-container">

  
    <div class="footer-brand">
      <h2 class="site-name">بەخشین</h2>
      <p class="site-tagline">هیڤیەك دناڤ بێ هیڤیبونێ دا</p>
      <p class="footer-copy">بەخشین &copy; 2025 . هەمی ماف د پاراستینە</p>
    </div>

 
    <div class="footer-links">
      <h3>بەرپەرێن ب لەز</h3>
      <ul>
        <li><a href="?page=contactUs">دەربارەی مە</a></li>
        <li><a href="?page=contactUs#contact">پەیوەندی</a></li>
        <li><a href="?page=centers">دەربارەی سەنتەران</a></li>
        <li><a href="?page=home#donation">بەخشین</a></li>
        <li><a href="#volunteerModal" class="btn-volunteer">خوبەخش</a></li>
      </ul>
    </div>

  
    <div class="footer-contact">
      <h3>پێزانینێن پەیوەندیێ</h3>
      <p>📞 +964-750 313 6229</p>
      <p>📞 +964-751 200 2212</p>
      <p>✉️ shavin.saleem@students.auk.edu.krd</p>
      <p>✉️ narmin.yaqob@students.auk.edu.krd</p>
    </div>

  </div>
</footer>


        ';
  }







  public function showForm($page, $formType, $aboutUs, $centers = NULL, $profiles = NULL, $message = '',)
  {
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
    echo $this->getHeader();
    echo $this->getNavBar();

    if (!empty($message)) {
      echo "<div style='text-align:center; padding:10px; color:#016c59; font-weight:bold;'>$message</div>";
    }
    switch ($page) {
      case 'home':
        echo $this->getHomeBody();
        echo $this->getDonation($formType, $message);
        echo $this->getAboutUs($aboutUs);
        break;
      case 'centers':
        echo $this->getCenters($centers);
        break;
      case 'center-profiles':
        echo $this->getcenterProfiles($profiles);
        break;
      case 'contactUs':
        echo $this->getContactUS();
        break;
      default:
        echo $this->getHomeBody();
        break;
    }
    echo $this->getVolunteerForm($arrDecode = []);
    echo $this->getFooterNav();
    echo $this->getFooter();
  }




















  //Admin--------------------------------------

  public function getAdminPageHead()
  {
    echo '
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <link rel="stylesheet" href="views/adminstyle.css">  
            <title>Donation-Admin</title>

        </head>
  ';
  }
  public function getAdminPageFooter()
  {
    echo '
    </html>
  ';
  }
  public function getAdminPage($message = '')
  {
    $success_alert = '';
    if ($message) {
      $success_alert = '
            <p style="color: green;">' . $message . '</p>';
    }
    echo '
    <body class="adminBody">
        ' . $success_alert . '
                <div class="adminContainer">
                    <a href="?page=admin&form=addEvent" class="adminButton">زێدەکرنا ئیڤێنتەکێ بو بەرپەرێ دەربارەی مە</a>     
                </div>
                <div class="adminContainer">
                    <a href="?page=admin&form=addCenter" class="adminButton">زێدەکرنا سەنتەرەکی بو بەرپەرێ دەربارەی سەنتەران</a>
                    <a href="?page=admin&form=deleteCenter" class="adminButton">ژێبرنا سەنتەرەکی ژ بەرپەرێ دەربارەی سەنتەران</a>  
                </div>

                <div class="adminContainer">
                    <a href="?page=admin&form=addProfile" class="adminButton">زێدەکرنا پروفایلەکی دناڤ بەرپەێ پروفایل دا (چیروك)</a>
                    <a href="?page=admin&form=deleteProfile" class="adminButton">ژێبرنا پروفایلەکی ژ بەرپەێ پروفایل دا (چیروك)</a>  
                </div>
        </body>
  ';
  }
  public function getAdminFormAboutUs()
  {
    echo '
    <form method="post">
          <div class="form-group">
            <label for="aboutUsTitle">بابەت</label>
            <input type="text" id="aboutUsTitle" name="aboutUsTitle" required>
          </div>
          <div class="form-group">
            <label for="aboutUsDescription">ڕوونكرن</label>
            <textarea id="aboutUsDescription" name="aboutUsDescription" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label for="aboutUsImg1">وێنە</label>
            <input type="text" id="aboutUsImg1" name="aboutUsImg1" required>
          </div>
          <div class="form-group">
            <label for="aboutUsImg2">وێنە</label>
            <input type="text" id="aboutUsImg2" name="aboutUsImg2" required>
          </div>
          <div class="form-group">
            <label for="aboutUsImg3">وێنە</label>
            <input type="text" id="aboutUsImg3" name="aboutUsImg3" required>
          </div>
          <div class="form-group">
            <label for="aboutUsImg4">وێنە</label>
            <input type="text" id="aboutUsImg4" name="aboutUsImg4" required>
          </div>
          <div class="form-group">
            <label for="aboutUsImg5">وێنە</label>
            <input type="text" id="aboutUsImg5" name="aboutUsImg5" required>
          </div>
          <button type="submit" class="submitAboutUsForm" name="action" value="submitAboutUsForm">هنارتن</button>
        </form>
  ';
  }

  //------------------admin page add/delete center-----------------------------------
  public function getAdminFormAddCenter()
  {
    echo '
    <form method="post">
          <div class="form-group">
            <label for="image">وێنە</label>
            <input type="text" id="image" name="image" required>
          </div>

          <div class="form-group">
            <label for="name">ناڤێ سەنتەری</label>
            <input type="text" id="name" name="name" required>
          </div>


         <div class="form-group">
         <select id="city" name="city" value="city" required>
          <option value="">باژێری ب هەلبژێرە</option>
          <option value="دهوك">دهوك</option>
          <option value="هەولێر">هەولێر</option>
          <option value="سلێمانی">سلێمانی</option>
          </select>
          </div>

          <div class="form-group">
          <select id="type" name="type" value="type" required>
          <option value="">جورێ سەنتەری</option>
          <option value="orphans">سەنتەرێ بێ سەمیانا</option>
          <option value="elderly">سەنتەرێ دانعەمرا</option>
          <option value="both">هەردوو</option>
          </select>
          </div>

          <div class="form-group">
            <label for="needs">پێتڤیا سەنتەری</label>
            <input type="text" id="needs" name="needs" required>
          </div>

          <div class="form-group">
            <label for="description">ڕوونكرن</label>
            <textarea id="description" name="description" rows="4" required></textarea>
          </div>
          <button type="submit" class="submitAboutUsForm" name="action" value="submitCenterForm">هنارتن</button>
        </form>
  ';
  }

  public function getAdminFormDeleteCenter()
  {
    echo '
    <form method="post">
          <div class="form-group">
            <label for="addcenterid">ID</label>
            <input type="number" id="addcenterid" name="addcenterid" required>
          </div>
          <button type="submit" class="submitAboutUsForm" name="action" value="submitDeleteCenterForm">هنارتن</button>
        </form>
  ';
  }
  //----------------------admin page add/delete profiles(stories)---------------------------
  public function getAdminFormAddProfile()
  {
    echo '
    <form method="post">

          <div class="form-group">
            <label for="name">ناڤ</label>
            <input type="text" id="name" name="name" required>
          </div>

          <div class="form-group">
            <label for="age">تەمەن </label>
            <input type="number" id="age" name="age" required>
          </div>

          <div class="form-group">
            <label for="image">وێنە</label>
            <input type="text" id="image" name="image" required>
          </div>

          <div class="form-group">
            <label for="needs">پێتڤیا تایبەت</label>
            <input type="text" id="needs" name="needs" required>
          </div>

          <div class="form-group">
            <label for="description">ڕوونكرن</label>
            <textarea id="description" name="description" rows="4" required></textarea>
          </div>

          <button type="submit" class="submitAboutUsForm" name="action" value="submitProfileForm">هنارتن</button>
        </form>
  ';
  }
  public function getAdminFormDeleteProfile()
  {
    echo '
    <form method="post">
          <div class="form-group">
            <label for="id">ID</label>
            <input type="number" id="id" name="id" required>
          </div>
          <button type="submit" class="submitAboutUsForm" name="action" value="submitDeleteProfileForm">هنارتن</button>
        </form>
  ';
  }
  //----------------------------------------------------

  public function showAdminPage($message = '')
  {
    echo $this->getAdminPageHead();
    echo $this->getAdminPage($message);
    echo $this->getAdminPageFooter();
  }
  public function showAdminForms($formType, $message = '')
  {
    $error_alert = '';
    if ($message) {
      $error_alert = '
            <p style="color: red;">' . $message . '</p>';
    }
    echo $this->getAdminPageHead();
    echo '
        <body>
        ' . $error_alert . '';
    switch ($formType) {
      case 'addEvent':
        echo $this->getAdminFormAboutUs();
        break;
      case 'addCenter':
        echo $this->getAdminFormAddCenter();
        break;
      case 'deleteCenter':
        echo $this->getAdminFormDeleteCenter();
        break;
      case 'addProfile':
        echo $this->getAdminFormAddProfile();
        break;
      case 'deleteProfile':
        echo $this->getAdminFormDeleteProfile();
        break;
    }
    echo '</body>';
    echo $this->getAdminPageFooter();
  }
}
