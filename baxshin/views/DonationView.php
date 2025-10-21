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
                    <a href="?page=donation" class="btn btn-donate">بەخشینێ بدە</a>
                    <a href="#volunteerModal" class="btn btn-volunteer">ببە خوبەخش</a>
                   
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

'.$this->getContactForm().'
<hr>
';
  }

public function getVolunteerForm(){
  return '
      <div id="volunteerModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>

    <form method="POST" class="volunteer-form">
      <h1>ببە خوبەخش</h1>

      <label for="fullname">ناڤ</label>
      <input type="text" id="fullname" placeholder="…ناڤێ خو بنڤیسە" required name="firstname">

      <label for="email">ئیمێل</label>
      <input type="email" id="email" placeholder="…ئیمێلێ خو بنڤیسە" required name="email">

      <label for="phone">ژمارا تلەفونێ</label>
      <input type="tel" id="phone" placeholder="…ژمارا تلەفونا خو بنڤیسە" required name="phone">

      <label for="age">تەمەن</label>
      <input type="number" id="age" placeholder="…تەمەنێ خو بنڤیسە" required name="age">


      <div class="checkbox-group">
        <label><input type="checkbox" value="شوفێر" name="role[]" required> <b>شوفێر</b></label>
        <label><input type="checkbox" value="هاریکارێ ئیڤێنتا"  name="role[]" > <b>هاریکارێ ئیڤێنتا</b></label>
        <label><input type="checkbox" value="دابەشکەر" name="role[]" > <b>دابەشکەر</b></label>
      </div>

      <label for="skills">هندەك شیانێن دی(ئەگەر هەبن)</label>
      <input type="text" id="skills" placeholder="بو نمونە ماموستا…هتد" name="skills">

      <label for="availability">دەمێن بەردەستبوونێ</label>
      <input type="text" id="availability" placeholder="بو نمونە روژێن حەفتیێ و دەمێن روژێ" name="availability">

      <label for="degree"> ئاستێ خاندنێ</label>
      <input type="text" id="degree" placeholder="بو نمەنە دەرچویێ زانکویێ" name="degree">

      <button type="submit">تومارکرن</button>
    </form>
  </div>
</div>


<script src="/baxshin/views/script.js"></script>
  ';
    $roles=$_POST['role'];
$roles_str=implode(", ", $roles);
  
}



  public function getDonation($formType)
  {
    
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
         <form method="POST" id="donation-form">
  <div class="form-group">
    <label for="phoneNumber">هژمارا تەلەفونێ</label>
    <input type="tel"  pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phoneNumber" name="phoneNumber" required>
  </div>
  <div class="form-group">
    <label for="cardNumber">هژمارا کارتێ</label>
    <input type="text" pattern="^(?:\d[ -]?){13,19}$" title="Card number must be 13 to 19 digits. Spaces or dashes allowed. Example: 4111 1111 1111 1111" id="cardNumber" name="cardNumber" required>
  </div>
  <div class="form-group">
    <label for="expiry">Expiry</label>
    <input type="text" pattern="^(0[1-9]|1[0-2])\/([0-9]{2}|[0-9]{4})$" title="Expiry must be in MM/YY or MM/YYYY format. Example: 05/23 or 05/2023" id="expiry" name="expiry" placeholder="MM/YY" required>
  </div>
  <div class="form-group">
    <label for="CVV">CVV code</label>
    <input type="text" pattern="^\d{3,4}$" title="CVV must be 3 or 4 digits. Example: 123 or 1234" maxlength="4" id="CVV" name="CVV" required>
  </div>
  <div class="form-group">
    <label for="amount">بڕێ پارەی ب ($)</label>
    <input type="number" id="amount" name="amount" min="1" required>
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
         <form method="POST" id="donation-form">
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phone" name="phone" required>
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
            <form method="POST" id="donation-form">
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phone" name="phone" required>
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
        <form method="POST" id="donation-form">
  <div class="form-group">
    <label for="name">ناڤ</label>
    <input type="text" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="phone">هژمارا تەلەفونێ</label>
    <input type="tel" pattern="^\+[0-9]{13}$"  title="Phone number must start with + followed by 13 digits. Example: +9647501234567" id="phone" name="phone" required>
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
  public function getSuccessMessage(){
    return '
      <div class="popup-overlay active">
        <div class="popup-content">
            <a href="?page=donation" class="close-btn">&times;</a>
            <h2 class="popup-title">سوپاس بو هاریکارییا تە، بەخشینا تە بسەرکەفتیانە گەهشت</h2>
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
        case 'success';
        return $this->getSuccessMessage();
      default:
        return '';
    }
  }
 public function getCenters($centers=NULL)
  {


          echo '<main class="centers-page">
                <h2 class="center-title">سەنتەرێن دیارکری</h2>

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
            echo '<div class="center-card" data-city="'.$row["city"].'" data-type="'.$row["type"].'">
                      <img src="'.$row["image"].'" alt="'.$row["name"].'">
                      <h3>'.$row["name"].'</h3>
                      <p><strong>جهێ سەنتەری: </strong>'.$row["city"].'</p>
                      <p><strong>پێتڤیا سەنتەری: </strong>'.$row["needs"].'</p>
                      <p>'.$row["description"].'</p>
                      <a href="?page=donation&id='.$row["id"].'">بەخشین</a>
                      <a href="?page=center-profiles&id='.$row["id"].'">دیتنا پروفایلا</a>
                  </div>';
        }
    } else {
        echo "<p>هیچ سەنتەرێک نیە!</p>";
    }

    echo '</section></main>';
}

public function getcenterProfiles($profiles=NULL)
  {
    echo '<section class="profiles-section">
    <h1>چیروکێن سەنتەری</h1>
    <div class="profiles">';
               if ($profiles && $profiles->num_rows > 0) {
            while ($row = $profiles->fetch_assoc()) {
                echo '<div class="profile-card">
                        <div class="profile-image">
                            <img src="'.$row['image'].'" alt="'.$row['name'].'">
                        </div>
                        <div class="profile-content">
                            <h3>'.$row['name'].'</h3>
                            <div class="age"><strong>تەمەن</strong>: '.$row['age'].'</div>
                            <p>'.$row['description'].'</p>
                            <div class="needs"><strong>پێتڤیاتی</strong>: '.$row['needs'].'</div>
                            <a href="?page=donation&id='.$row['id'].'" class="donate-btn">بەخشین</a>
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
    $table_rows='';
        if(!empty($aboutUs)){
            foreach($aboutUs as $about){
                $table_rows .= '
            <div class="event-container">
            <h2 class="event-title">' . $about['title'] . '</h2>
            <p class="event-description">' . $about['aboutUs_description'] . '</p>
            <div class="images-container">
        ';
        if (!empty($about['images'])) {
            foreach ($about['images'] as $img) {
                $table_rows .= '<img src="' . $img . '" alt="Image" class="square-image">';
            }
        }
        $table_rows .= '</div>
        </div>';
            }
        }
    return '
<main class="big-container">
    
        ' . $table_rows . '
    
    </main>

        ';
       
  }


public function getContactForm(){
    return '
    <!-- Contact Section -->
<section class="contact-section" id="contact">
  <div class="contact-container">
    <h2 class="section-title">پەیوەندیێ ب مە بکەن </h2>

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

      <button type="submit" class="btn-submit">هنارتن</button>
    </form>

 
    <button id="toggle-center-form" class="btn-center"> تومارکرنا سەنتەری</button>


    <form method="POST"  class="center-form" id="center-form">

      <div class="form-group">
        <label>ناڤێ سەنتەری</label>
        <input type="text" placeholder="…ناڤێ سەنتەری بنڤیسە" name="centername" required>
      </div>

      <div class="form-group">
        <label class="contact-hr">جورێ سەنتەری</label>
        <div class="centertype-group">
            <select class="centertype" id="centertype" name="centertype" value="centertype" required>
            <option value="">هەلبژارتن</option>
            <option value="سەنتەرێ بێ سەمیانا">سەنتەرێ بێ سەمیانا</option>
             <option value="سەنتەرێ دانعەمرا">سەنتەرێ دانعەمرا</option>
            <option value="هەردوو">هەردوو</option>
            </select>
        </div>
      </div>


      <div class="form-group">
        <label class="contact-hr">ژمارا تلەفونێ</label>
        <input type="text" placeholder="…ژمارا تلەفونێ بنڤیسە" name="centerphone" required>
      </div>

      <div class="form-group">
        <label class="contact-hr">ئیمێل</label>
        <input type="email" placeholder="…ئیمێلێ خو بنڤیسە" name="centeremail" required>
      </div>

      <div class="form-group">
        <label class="contact-hr">نامە</label>
        <textarea placeholder="…ناما خو بنڤیسە" name="centermsg" ></textarea>
      </div>

      <button type="submit" class="btn-submit">تومارکرن</button>
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
        <li><a href="?page=home#about">دەربارەی مە</a></li>
        <li><a href="?page=home#contact">پەیوەندی</a></li>
        <li><a href="?page=centers">دەربارەی سەنتەران</a></li>
        <li><a href="?page=donation">بەخشین</a></li>
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







  public function showForm($page, $formType, $aboutUs, $centers=NULL, $profiles=NULL,$message = '')
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
        break;
      case 'donation':
        echo $this->getDonation($formType);
        break;
      case 'centers':
        echo $this->getCenters($centers);
        break;
      case 'center-profiles':
        echo $this->getcenterProfiles($profiles);
        break;
      case 'aboutUs':
        echo $this->getAboutUs($aboutUs);
        break;
      default:
        echo $this->getHomeBody();
        break;
    }
      echo $this->getVolunteerForm();
    echo $this->getFooterNav();
    echo $this->getFooter();
  }
}
