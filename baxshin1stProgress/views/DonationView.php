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
                <li><a class="navlink" href="?page=home#about">دەربارەی مە</a></li>
                <li><a class="navlink" href="?page=home#contact">پەیوەندی</a></li>
                <li><a class="navlink" href="?page=centers">دەربارەی سەنتەران</a></li>
                <li><a class="navlink" href="?page=donation">بەخشین</a></li>
                <li><a href="?page=home&form=volunteer" class="navlink btn-volunteer">خوبەخش</a></li>
            </ul>
        </nav>
    </header>
        ';
  }



  public function getHomeBody()
  {
    $formType = isset($_GET['form']) ? $_GET['form'] : '';
    return '
              <!--hero section-->
    <section class="hero-section">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1 class="hero-title">باشیێ بکە کریار</h1>
                <p class="hero-subtitle">ببە ئاڤاکەرێ پرەکا هیڤیا بو بێ سەمیان و دانعەمرێن بێ خودان</p>
                <div class="hero-buttons">
                    <a href="?page=donation" class="btn btn-donate">بەخشینێ بدە</a>
                    <a href="?page=home&form=volunteer" class="btn btn-volunteer">ببە خوبەخش</a>
                   
                </div>
            </div>
        </div>
    </section>
    <hr>
    <!--about us/website-->
    <section class="about-section" id="about">
            <div class="about-container">
                <h2 class="about-title"> دەربارەی مە</h2>
                <p class="about-text">
                   ئەم دو گەنجین ژ باژێرێ دهۆکێ، مە پێشخەریەکا مرۆڤایەتی ل سەرانسەری کوردستانێ دەسپێکرییە، بۆ بێ سەمیان و دانعەمران، ئارمانجا مە ئەوە کو ئەم ژیانا وان یا ڕۆژانە و ئێش و ئازارێن
                   وان دیاربکەین ، ب ڕێکێن سانەهی هاریکاریا وان بکەین، هوین دشێن ب ڕێکا (خوران، جل و بەرگ، یان ژی ب ئاماژەیکا بچویک) کو ڕۆژا وان خۆشبکەت و گرنژینەکێ 
                   بێخیتە سەر لێڤێن وان، ئەرکێ مە ئەوە هەستێ دلخۆشی و هیڤیا ددلێ وان دا نوی بکەین، و نیشا خەلکی بدەین کو بچویکترین کریار دشێت ببیتە مەزنترین دیاری.
                   <a href="?page=aboutUs">بو دىتنا کارێن مە</a>
                </p>
            </div>
    </section>
    <hr>
<!-- Contact Section -->
<section class="contact-section" id="contact">
  <div class="contact-container">
    <h2 class="section-title">پەیوەندیێ ب مە بکەن </h2>
    <form class="contact-form">
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
        <textarea placeholder="…فیدبەگا خو بنڤیسە"></textarea>
      </div>

      <button type="submit" class="btn-submit">هنارتن</button>
    </form>

 
    <button id="toggle-center-form" class="btn-center"> تومارکرنا سەنتەری</button>


    <form class="center-form" id="center-form">

      <div class="form-group">
        <label>ناڤێ سەنتەری</label>
        <input type="text" placeholder="…ناڤێ سەنتەری بنڤیسە">
      </div>

      <div class="form-group">
        <label class="contact-hr">جورێ سەنتەری</label>
        <div class="checkbox-group">
          <label><input type="checkbox">جهێ بێسەمیانا</label>
          <label><input type="checkbox">جهێ دانعەمرا</label>
          <label><input type="checkbox">هەردوو</label>
        </div>
      </div>

      <div class="form-group">
        <label class="contact-hr">ژمارا تلەفونێ</label>
        <input type="text" placeholder="…ژمارا تلەفونێ بنڤیسە">
      </div>

      <div class="form-group">
        <label class="contact-hr">ئیمێل</label>
        <input type="email" placeholder="…ئیمێلێ خو بنڤیسە">
      </div>

      <div class="form-group">
        <label class="contact-hr">نامە</label>
        <textarea placeholder="…ناما خو بنڤیسە"></textarea>
      </div>

      <button type="submit" class="btn-submit">تومارکرن</button>
    </form>
  </div>
  ' . $this->showSelectedForm($formType) . '
</section>
<script>


    document.getElementById("toggle-center-form").addEventListener("click", function() {
    const centerForm = document.getElementById("center-form");
    centerForm.style.display = centerForm.style.display === "block" ? "none" : "block";
  });
</script>
<hr>





';
  }
  public function getDonation()
  {
    $formType = isset($_GET['form']) ? $_GET['form'] : '';
    return '
                <h1 id="donationBodyh1">ئەرێ دێ ب چ رێک هاریکاریێ کەی؟</h1>
  <div class="donation-type-container">
    <div class="donation-type-box">
      <img src="/baxshin/views/images/money.png" alt="1" class="icon">
      <h2>دانا پاران</h2>
      <p>كوژمەکێ کێم، گوهرینەکا مەزن</p>
      <a href="?page=donation&form=money" class="donate" data-type="money">بەخشین</a>
    </div> 

  
    <div class="donation-type-box">
      <img src="/baxshin/views/images/clothes.png" alt="2" class="icon">
      <h2>دانا جلكان</h2>
      <p>بخەلاتەکی گرنژینێ پەیدابکە</p>
      <a href="?page=donation&form=clothes" class="donate" data-type="clothes">بەخشین</a>
    </div>

  
    <div class="donation-type-box">
      <img src="/baxshin/views/images/food.png" alt="3" class="icon">
      <h2>دانا خارنان</h2>
      <p>برسێ بشکێنە، هێزێ زێدەبکە</p>
      <a href="?page=donation&form=food" class="donate" data-type="food">بەخشین</a>
    </div>

  
    <div class="donation-type-box">
      <img src="/baxshin/views/images/other.png" alt="4" class="icon">
      <h2>دانا هەرتشتەکێ دی</h2>
      <p>هەر دییاریەک کەیفخوشییە</p>
      <a href="?page=donation&form=other" class="donate" data-type="other">بەخشین</a>
    </div>' . $this->showSelectedForm($formType) . '


  </div>


 
  
        ';
        
  }
  public function getMoneyForm()
  {
    return '
                 <div class="popup-overlay active">
        <div class="popup-content">
            <a href="?page=donation" class="close-btn">&times;</a>
            <h2 class="popup-title">دانا پاران</h2>
         <form id="donation-form">
  <div class="form-group">
    <label for="phoneNumber">هژمارا تەلەفونێ</label>
    <input type="tel" id="phoneNumber" name="phoneNumber" required>
  </div>
  <div class="form-group">
    <label for="cardNumber">هژمارا کارتێ</label>
    <input type="number" id="cardNumber" name="cardNumber" required>
  </div>
  <div class="form-group">
    <label for="expiry">Expiry</label>
    <input type="number" id="expiry" name="expiry" required>
  </div>
  <div class="form-group">
    <label for="CVV">CVV code</label>
    <input type="number" id="CVV" name="CVV" required>
  </div>
  <div class="form-group">
    <label for="amount">بڕێ پارەی ب ($)</label>
    <input type="number" id="amount" name="amount" min="1" required>
  </div>
  <div class="form-group">
    <label for="payment">جورێ پارەدانێ</label>
    <select id="payment" name="payment" required>
      <option value="">هەلبژارتن</option>
      <option value="FIB">FIB</option>
    </select>
  </div>
      <div class="form-group">
      <label for="centerName">تە دڤێت پاران بدەیە کێ؟</label>
      <select id="centerName" name="centerName" required>
        <option value="any">هەر جهەکێ پێتڤی</option>
        <option value="center1">سەنتەر1</option>
        <option value="center2">سەنتەر2</option>
        <option value="center3">سەنتەر3</option>
      </select>
    </div>
    <button type="submit" class="submit-btn">هنارتن</button>
</form>
</div>
</div>
        ';
  }
  public function getClothesForm()
  {
    return '
          <div class="popup-overlay active">
        <div class="popup-content">
            <a href="?page=donation" class="close-btn">&times;</a>
            <h2 class="popup-title">دانا جلكان</h2>
         <form id="donation-form">
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" id="phone" name="phone" required>
  </div>
  <div class="form-group">
    <label for="items">جورێ جلکان</label>
    <select id="items" name="items" required>
      <option value="">هەلبژارتن</option>
      <option value="men">جلکێن زەلامان</option>
      <option value="women">جلکێن ئافرەتان</option>
      <option value="children">جلکێن زاڕۆکان</option>
      <option value="shoes">پێلاڤ</option>
      <option value="mixed">تێکەل</option>
    </select>
  </div>
    <div class="form-group">
      <label for="delivery">ئەرێ تە دڤێت چەوا جلکان بگەهینی؟</label>
      <select id="delivery" name="delivery" required>
        <option value="">هەلبژارتن</option>
        <option value="pickup">ئەز دێ ئینمە جهێ هەوە</option>
        <option value="deliver">کەسەک بهێت ژمن وەربگریت</option>
      </select>
    </div>
    <button type="submit" class="submit-btn">هنارتن</button>
</form>
        </div>
    </div>
        ';
  }
  public function getFoodForm()
  {
    return '
                 <div class="popup-overlay active">
        <div class="popup-content">
            <a href="?page=donation" class="close-btn">&times;</a>
            <h2 class="popup-title">دانا خارنان</h2>
            <form id="donation-form">
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" id="phone" name="phone" required>
  </div>
  <div class="form-group">
    <label for="food-type">جورێ خوارنێ</label>
    <select id="food-type" name="food-type" required>
      <option value="">هەلبژارتن</option>
      <option value="canned">ئاهێن خوارنێ</option>
      <option value="cooked">خوارنا چێکری</option>
    </select>
  </div>
  <div class="form-group">
    <label for="quantity">خوارن تێرا چەند کەسانە؟</label>
    <input type="number" id="quantity" name="quantity" min="1" required>
  </div>
      <div class="form-group">
      <label for="delivery">ئەرێ تە دڤێت چەوا خوارنێ بگەهینی؟</label>
      <select id="delivery" name="delivery" required>
        <option value="">هەلبژارتن</option>
        <option value="pickup">ئەز دێ ئینمە جهێ هەوە</option>
        <option value="deliver">کەسەک بهێت ژمن وەربگریت</option>
      </select>
    </div>
      <div class="form-group">
      <label for="centerName">تە دڤێت خوارنێ بدەیە کێ؟</label>
      <select id="centerName" name="centerName" required>
        <option value="any">هەر جهەکێ پێتڤی</option>
        <option value="center1">سەنتەر1</option>
        <option value="center2">سەنتەر2</option>
        <option value="center3">سەنتەر3</option>
      </select>
    </div>
    <button type="submit" class="submit-btn">هنارتن</button>
</form>
</div>
</div>
        ';
  }
  public function getOtherForm()
  {
    return '
                 <div class="popup-overlay active">
        <div class="popup-content">
            <a href="?page=donation" class="close-btn">&times;</a>
            <h2 class="popup-title">دانا هەرتشتەکێ دی</h2>
        <form id="donation-form">
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" id="phone" name="phone" required>
  </div>
  <div class="form-group">
    <label for="donation-type">جورێ هاریکاریێ</label>
    <input type="text" id="donation-type" name="donation-type" placeholder="دەرمان، ئامییرە، رێکخستنا ئیڤێنتەکێ" required>
  </div>
  <div class="form-group">
    <label for="description">ڕوونكرن</label>
    <textarea id="description" name="description" rows="3" required></textarea>
  </div>
  <button type="submit" class="submit-btn">هنارتن</button>
</form>
</div>
</div>
        ';
  }

  public function getVolunteerForm(){
    return '
       <div id="volunteerModal" class="modal">
  <div class="modal-content">
    <a href="?page=home" class="close">&times;</a>

    <form class="volunteer-form">
      <h1>ببە خوبەخش</h1>

      <label for="fullname">ناڤ</label>
      <input type="text" id="fullname" placeholder="…ناڤێ خو بنڤیسە" required>

      <label for="email">ئیمێل</label>
      <input type="email" id="email" placeholder="…ئیمێلێ خو بنڤیسە" required>

      <label for="phone">ژمارا تلەفونێ</label>
      <input type="tel" id="phone" placeholder="…ژمارا تلەفونا خو بنڤیسە" required>

      <label for="age">تەمەن</label>
      <input type="number" id="age" placeholder="…تەمەنێ خو بنڤیسە" required>


      <div class="checkbox-group">
        <label><input type="checkbox" value="driver"> <b>شوفێر</b></label>
        <label><input type="checkbox" value="event"> <b>هاریکارێ ئیڤێنتا</b></label>
        <label><input type="checkbox" value="distributor"> <b>دابەشکەر</b></label>
      </div>

      <label for="skills">هندەك شیانێن دی(ئەگەر هەبن)</label>
      <input type="text" id="skills" placeholder="بو نمونە ماموستا…هتد">

      <label for="availability">دەمێن بەردەستبوونێ</label>
      <input type="text" id="availability" placeholder="بو نمونە روژێن حەفتیێ و دەمێن روژێ">

      <label for="degree"> ئاستێ خاندنێ</label>
      <input type="text" id="degree" placeholder="بو نمەنە دەرچویێ زانکویێ">

      <button type="submit">تومارکرن</button>
    </form>
  </div>
</div>

    ';
  }
  public function showSelectedForm($formType)
  {
    switch ($formType) {
      case 'money':
        return $this->getMoneyForm();
      case 'clothes':
        return $this->getClothesForm();
      case 'food':
        return $this->getFoodForm();
      case 'other':
        return $this->getOtherForm();
      case 'volunteer':
        return $this->getVolunteerForm();
      default:
        return '';
    }
  }
  public function getCenters()
  {
    return '
<main class="centers-page">

        <h2 class="center-title">سەنتەرێن دیارکری</h2>

        <section class="search-bar">
            <input type="text" placeholder="…لێگەرایانا سەنتەری" id="searchInput">
            <select name="" id="cityFilter">
                <option value="">باژێری ب هەلبژێرە</option>
                <option value="Duhok">دهوك</option>
                <option value="Erbil">هەولێر</option>
                <option value="Sulaymaniyah">سلێمانی</option>
            </select>

            <select name="" id="typeFilter">
                <option value="">جورێ سەنتەری</option>
                <option value="Elderly">دانعەمر</option>
                <option value="Orphans">بێ سەمیان</option>
                <option value="Both">هەردو</option>
            </select>

            <button onclick="filterCenters()">لێگەریان</button>

        </section>


        <section class="centers-list">

            <div class="center-card" data-city="Duhok" data-type="Orphans">
                <img src="/baxshin/views/images/2.JPG" alt="">
                <h3>هیڤیا بێ سەمیانا</h3>
                <p><strong> جهێ سەنتەری: </strong>دهوك</p>
                <p><strong> پێتڤیا سەنتەری: </strong>خارن، جل و بەرگ</p>
                <p>سەنتەرێ هیڤیا بێ سەمیانا گرنگیێ ددەتە زاروکێن دهێنە هاڤێتن هەر ژ روژا ژ دایکبونێ و هەتا د بنە ١٨ سال</p>
                <a href="">بەخشین</a>
                <a href="?page=center-profiles">دیتنا پروفایلا</a>
            </div>

            <div class="center-card" data-city="Sulaymaniyah" data-type="Orphans">
                <img src="/baxshin/views/images/3.JPG" alt="">
                <h3>هیڤی</h3>
                <p><strong> جهێ سەنتەری: </strong>سلێمانی</p>
                <p><strong> پێتڤیا سەنتەری: </strong>خارن، جل و بەرگ</p>
                <p>سەنتەرێ هیڤی گرنگیێ ددەتە پێشکەفتنا بێ سەمیانا ب رێکا خاندنێ بو گەهشتنا هەر حەز و هیڤیەکا  وان دڤێت</p>
                <a href="">بەخشین</a>
                <a href="?page=center-profiles">دیتنا پروفایلا</a>
            </div>

            <div class="center-card" data-city="Erbil" data-type="Elderly">
                <img src="/baxshin/views/images/7.JPG" alt="">
                <h3>تەمەنێ زێرین</h3>
                <p><strong> جهێ سەنتەری: </strong>هەولێر</p>
                <p><strong> پێتڤیا سەنتەری: </strong> جل و بەرگ</p>
                <p>ل سەنتەرێ تەمەنێ زێرین چاڤدانەکا باش بو دانعەمرا دهێتە کرن. و پێداویستێن وان بو دهێنە دابین کرن</p>
                <a href="">بەخشین</a>
                <a href="?page=center-profiles">دیتنا پروفایلا</a>
            </div>

            <div class="center-card" data-city="Sulaymaniyah" data-type="Both">
                <img src="/baxshin/views/images/4.JPG" alt="">
                <h3>هاریکار</h3>
                <p><strong> جهێ سەنتەری: </strong>سلێمانی</p>
                <p><strong> پێتڤیا سەنتەری: </strong>خارن</p>
                <p>ئارمانجا مە ئەوە کو بێ سەمیان و دانعەمرێن بێ خودان ژ وێ رەوشا ئالوزا ئەو تێدا بیننە دەر بو رەوشەکا باشتر</p>
                <a href="">بەخشین</a>
                <a href="?page=center-profiles">دیتنا پروفایلا</a>
            </div>

            <div class="center-card" data-city="Duhok" data-type="Elderly">
                <img src="/baxshin/views/images/5.JPG" alt="">
                <h3>مالا دانعەمرا</h3>
                <p><strong> جهێ سەنتەری: </strong>دهوك</p>
                <p><strong> پێتڤیا سەنتەری: </strong>خارن، جل و بەرگ</p>
                <p>مالا دان عەمرا هاتیە دروست کرن ژبو نەهێلانا هەستێ بێ خودانیێ و بتنێ بونێ  لدەف دانعەمرا</p>
                <a href="">بەخشین</a>
                <a href="?page=center-profiles">دیتنا پروفایلا</a>
            </div>

            <div class="center-card" data-city="Erbil" data-type="Elderly">
                <img src="/baxshin/views/images/6.JPG" alt="">
                <h3>چاڤدانا دانعەمرا</h3>
                <p><strong> جهێ سەنتەری: </strong>هەولێر</p>
                <p><strong> پێتڤیا سەنتەری: </strong>خارن، جل و بەرگ</p>
                <p>سەنتەرێ چاڤدانا دانعەمرا گرنگیێ ددەتە پەیداکرنا ساخلەمیەکا باش با دانعەمرا و نەهیلانا کێماسیێن وان</p>
                <a href="">بەخشین</a>
                <a href="?page=center-profiles">دیتنا پروفایلا</a>
            </div>

        </section>
    </main>
    <script src="/baxshin/views/script.js"></script>

        ';
        
  }
  public function getcenterProfiles()
  {
    return '
 <!--profiles-->

    <section class="profiles-section">
        <h1>چیروکێن سەنتەری</h1>
        <div class="profiles">

               <!--profile 1-->
            <div class="profile-card">
                <div class="profile-image">
                    <img src="/baxshin/views/images/10.jpg" alt="">
                </div>

                <div class="profile-content">
                    <h3>ئەحمەد</h3>
                    <div class="age"><strong>تەمەن</strong>: 10</div>
                    <p>ئەحمەد زاروکە کە هەر د ژیەکێ گەلەك بچیك دا تەحلاتیا هەستێ بێ دەیک و بابیێ دیتیە. د ژیێ ٢ سالیێ دا دەیك و بابێن وی ب ریدانەکا ترومبێلێ چوینە بەر دلوڤانیا خودێ.  هەر ژ ژیێ ٨ سالیێ و هەتا نوکە بارێ وی یێ تەندروستی یێ خرابە و پێتڤی ب نشتەگەریا مێلاکێ یە. نوژداران هوسا دایە دیارکرن  کو توندروستا وی روژ بو روژێ دێ خراپتر بیت ئەگەر نشتەگەری بو نە ئێتە کەن</p>
                    <div class="needs"><strong>پێتڤیاتی</strong>: نشتەگەری</div>
                    <a href="donation.html" class="donate-btn">بەخشین</a>
                </div>
            </div>

            <!--profile 2-->
            <div class="profile-card">
                <div class="profile-image">
                    <img src="/baxshin/views/images/8.jpg" alt="">
                </div>

                <div class="profile-content">
                    <h3>فاتیما</h3>
                    <div class="age"><strong>تەمەن</strong>: 83</div>
                    <p>فاتیمایێ ژیانا خو هەمی کریە قوربانی و ب  کارکرنێ ڤە بوراندیە پێخەمەت بخودانکرنا زاروکێن خو کو د دەمەکی دا بابێ زاروکێن وێ د تەمەنێ گەنجاتیێ دا چویە ڤەر دلوڤانیا خودێ. و نوکە، ئەو زاروکێن وێ ژیانا خو بە کریە قوربانی بتنێ هێلایە بێخودان. ژ ئەگەرێ گەلەك کارکرنێ زەحمەتیەکا مەزن ب پێ یێن  فاتیمایێ کەتیە و ب هوشداریا ناژداری، ئەگەر نە ئێنە چارەسەر کرن دبیت ژکار بکەڤن</p>
                    <div class="needs"><strong>پێتڤیاتی</strong>: نشتەگەری</div>
                    <a href="donation.html" class="donate-btn">بەخشین</a>
                </div>
            </div>

                        <!--profile 3-->
            <div class="profile-card">
                <div class="profile-image">
                    <img src="/baxshin/views/images/9.jfif" alt="">
                </div>

                <div class="profile-content">
                    <h3>سارا</h3>
                    <div class="age"><strong>تەمەن</strong>: 7</div>
                    <p>سارا د ژیەکی دا کو پێتڤی ب ژیانانەکا ئارام و پری حەژێکرن، دیمەنەکێ گەلەك ب ترس ل پێش چاڤێن خو دیتیە. هەر دەمێ ئەو ٦ سال بابێ وێ ل پێش چاڤێن وێ دایکا وێ ب رەنگەکێ درندانە کوشتیە. ئەڤ دیمەنە هەر و هەر ل پێش چاڤێن وێیە و وەل وێ کریە کو ئێدی نە ئاخڤین و ژ هەر کەسەکی ب ترسیت. ئەگەر نە هێتە چارەسەر کرن لدەف نوژدارێن دەرونی، دبیت رەوشا وێ هێدی هێدی وەل وێ بکەت کو ئێدی ژناڤ </p>
                    <div class="needs"><strong>پێتڤیاتی</strong>: نشتەگەری</div>
                    <a href="donation.html" class="donate-btn">بەخشین</a>
                </div>
            </div>

        </div>
    </section>

        ';
        
  }
  public function getAboutUs()
  {
    return '
<main class="big-container">
    <div class="event-container">
        <h2 class="event-title">سەرەدانا بچیکان بو دریم ستی</h2>
        <p class="event-description">
ل روژا ١١/٩/٢٠٢٥ سێشەمب خێرخوازەک رابویە ب دانانا ئیڤێنتەکا جیاواز و دلخوشکەر بو بچیکان. کو ئەژی برنا وان بو درێم ستی بو. زاروک پێکڤە گەلەک یاری کرن و دەمەکێ خوش بوراندن.
        </p>
        <div class="images-container">
            <img src="/baxshin/views/images/kids.jpg" alt="Image 1" class="square-image">
            <img src="/baxshin/views/images/kidsPlaying.jpg" alt="Image 2" class="square-image">
            <img src="/baxshin/views/images/play.jpg" alt="Image 3" class="square-image">
            <img src="/baxshin/views/images/playground.jpg" alt="Image 4" class="square-image">
            <img src="/baxshin/views/images/swing.jpg" alt="Image 5" class="square-image">
        </div>
    </div>
    
    <div class="event-container">
        <h2 class="event-title">کرینا جلکان بو دانعەمران</h2>
        <p class="event-description">
ل روژا ئێکشەمب ٢٤/٨/٢٠٢٥ خێرخوازەک جلوبەرگێن نوی بو دانعەمران کرین و خوبەخشێن مە هاریکاری د بەڵاڤکرنا وان جلکان دا کر و پشتراستی د هندێ دا کرن کو هەر کەسەک جلکەکێ بدلێ خو و گونجای بو بگەهتە دەستی
        </p>
        <div class="images-container">
            <img src="/baxshin/views/images/elderlyClothes.jpg" alt="Image 1" class="square-image">
            <img src="/baxshin/views/images/clothes.jpeg" alt="Image 2" class="square-image">
        </div>
    </div>
    
    <div class="event-container">
        <h2 class="event-title">بەخشینا خوارنێ</h2>
        <p class="event-description">
            ل روژا ئەینی ٨/٨/٢٠٢٥ خاتینەک رابویە ب دروستکرنا خوارنێن جودا بو زاروکان
        </p>
        <div class="images-container">
            <img src="/baxshin/views/images/kids2.jpg" alt="Image 4" class="square-image">
            <img src="/baxshin/views/images/food1.jpg" alt="Image 2" class="square-image">
            <img src="/baxshin/views/images/food2.jpg" alt="Image 3" class="square-image">
        </div>
    </div>
    </main>

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
        <li><a href="?page=home#about">دەربارەی مە</a></li>
        <li><a href="?page=home#contact">پەیوەندی</a></li>
        <li><a href="?page=centers">دەربارەی سەنتەران</a></li>
        <li><a href="?page=donation">بەخشین</a></li>
        <li><a href="?page=home&form=volunteer" class="btn-volunteer">خوبەخش</a></li>
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







  public function showForm()
  {
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
    echo $this->getHeader();
    echo $this->getNavBar();
 
    
    
    switch ($page) {
      case 'home':
        echo $this->getHomeBody();
        break;
      case 'donation':
        echo $this->getDonation();
        break;
      case 'centers':
        echo $this->getCenters();
        break;
      case 'center-profiles':
        echo $this->getcenterProfiles();
        break;
      case 'aboutUs':
        echo $this->getAboutUs();
        break;
      default:
        echo $this->getHomeBody();
        break;
    }
    echo $this->getFooterNav();
    echo $this->getFooter();
  }
}
