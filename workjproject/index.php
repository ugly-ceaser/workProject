<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Boostrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom css -->
    <link rel="stylesheet/less" type="text/css" href="assets/css/style.less">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Logo -->
    <link rel="shortcut icon" href="assets/img/logo/UBS_Logo_Semibold.svg" type="image/x-icon">






    <!-- linkk jquery -->
    <script src="assets/js/jquery.js" defer></script>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Link custom css -->

    <script src="assets/js/main.js" defer></script>
    
    <title>GLOBAL TRADE PROFESSIONAL ALLIANCE</title>

</head>
<!-- linkk chat -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Starter plan', 'High Frequency Plan', 'Contract Plan'],
      ['2012', 1000000, 1500000, 2000000],
      ['2016', 2000000, 3000000, 4500000],
      ['2018', 3500000,5500000 , 8500000],
      ['2020', 4500000, 7000000, 11000000]
    ]);

    var options = {
      chart: {
        title: '',
        subtitle: "Investor's pay-out chart since commencement of operations.",
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>



<body>

    <?php include 'header.php'?>

    <!-- Hero Section -->
  <section>
    <div class="">
      <img src="assets/img/Hero1_img.png" alt="Hero image" class="img-fluid">
    </div>
    <div class="container">
      <div class="card shadow ty-m-1">
        <div class="card-body">
          <div class="row">
            
    <div class="col-md-6 px-4 py-4 text-center">
      <h1>
        <span class="d-block">
          Cryptocurrency Investment
        </span>
        <span class="d-block">
          Asset Management
        </span>
      </h1>
    </div>

    
    <div class="col-md-6 px-4 py-4">
      <ul class="list-group list-group-flush">
        <li class="list-group-item lead fs-5">Real Estate Management</li>
        <li class="list-group-item lead fs-5">Oil Services</li>
        <li class="list-group-item lead fs-5">Financial Consultations</li>
        <li class="list-group-item lead fs-5 ">Task Management</li>

      </ul>
    </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!--End Hero Section -->
    <!-- Acheive Section -->
<section>
  <div class="container-fluid px-lg-5 px-1">
    <div class="row px-5 align-items-center gx-5">
      <div class="col-lg-5">
        <h4 class="border-style-red p-4 text-start">
          <span class="fs-1 d-block">Achieve your personal goals.</span>
          <span class="lead fs-2"> with our help</span>
        </h4>
      </div>
      <div class="col-lg-7">
        <div class="lead fs-3 mb-2">
          Wealth is more than money. Managed the right way, it can be a tool that gets you closer to your goals. That's where we can help. Putting our clients first has made us the world's leading wealth manager1 in assets under management.
        </div>
        <div class="lead fs-3">
          Whatever wealth means to you – now and in the future – we can help you achieve your goals for it in every area of your life.
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- End of Acheive section -->

    <!-- crypto trading services sction -->
    
    <section>
      <div class="container-fluid  px-lg-5 px-1 mt-5">
        <div class="px-5 ">
          <h3>How can we help you</h3>
          <p class="lead">
            Whether you’re an individual investor, entrepreneur or corporate executive, our client advisors are ready to help. We have a wide range of services available to fit your current wealth situation.
          </p>
        </div>
      </div>
      </section>

       <!-- crypto plans  -->
       <section>
        <div class="container">
          <h1 class="mb-5">Cryptocurrenncy Investment Services</h1>
          <div class="row gx-1 gy-2">
            <div class="col-lg-4 trasition" id = "silverPackage">
              <div class="card my-card-1 card-text">
                <div class="card-top">
                  <h1 class="fs-1 text-center">
                    Starter Plan
                  </h1>
                  <h1 class="lead fs-3 text-center">$100 <br> Minimum Deposit</h1>
                </div>
                <div class="card-body">

                  
                  <div class="py-3">30% Traders commission</div>
                  <div class="py-3">45% capital insurance</div>
                  <div class="py-3">Dedicated Portfolio Manager</div>
                  <div class="py-3">24/7 Online Support</div>
                  <ul class="list-group list-group-flush py-3 my-card-1">
                    <button class="list-group-item justify-content-between d-flex my-card-1"> Subscribe Now <i class="fas fa-chevron-right text-secondary"></i></button>
                    
                  </ul>
                </div>

              </div>

                <div class="card-form">
                    <!--stater plan-->
                    <h1>Starter Plan</h1>
                    <div class="row">


                       <?php include './form/cryptoForm.php'?>
                            <input type="hidden" name="plan" value="starertplan"  id="lastname" class="form-control">





                        </form>
                    </div>

                    <div class="row">
                      <div class="col-md-6 mt-2">30% Traders commission</div>
                      <div class="col-md-6 mt-2">45% capital insurance</div>
                      <div class="col-md-6 mt-2">Dedicated Portfolio Manager</div>
                      
                      <div class="col-md-6 mt-2">24/7 Online Support</div>
    
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4  trasition" id = "goldPackage">
              <div class="card my-card-1 card-text">
                <div class="card-top">
                  <h5 class="fs-3 text-center">
                    High Frequency plan
                  </h5>
                  <h1 class="lead fs-3 text-center">$5000+ <br> Minimum Deposit</h1>
                </div>
                <div class="card-body">

                  
                  <div class="py-4">30% Traders commission</div>
                  <div class="py-3">45% capital insurance</div>
                  <div class="py-3">Dedicated Portfolio Manager</div>
                  <div class="py-3">24/7 Online Support</div>
                  <ul class="list-group list-group-flush py-3 my-card-1">
                    <button class="list-group-item justify-content-between d-flex my-card-1"> Subscribe Now<i class="fas fa-chevron-right text-secondary"></i></button>
                    
                  </ul>
                </div>

              </div>

              <div class="card-form">
                <h1>High Frequency Plan</h1>
                <div class="row">



                        <?php include './form/cryptoForm.php'?>
                        <input type="hidden" name="plan" value="highFrequecyplan"  id="lastname" class="form-control">





                    </form>




                   
                </div>
                <div class="row">
                  <div class="col-md-6 mt-3">30% Traders commission</div>
                  <div class="col-md-6 mt-3">45% capital insurance</div>
                  <div class="col-md-6 mt-4">Dedicated Portfolio Manager</div>
                  
                  <div class="col-md-6 mt-4">24/7 Online Support</div>

                </div>
                
            </div>
            </div>
            <div class="col-lg-4 trasition gold" id = "platiniumPackage">
              <div class="card my-card-1 gold card-text">
                <div class="card-top gold">
                  <h1 class="fs-1 text-center">
                    Contract Plan
                  </h1>
                  <h1 class="lead fs-3 text-center">$50,000+ <br> Minimum Deposit</h1>
                </div>
                <div class="card-body gold">

                  
                  <div class="py-1">10% Traders commission</div>
                  <div class="py-1">55% capital insurance</div>
                  <div class="py-1">Dedicated Portfolio Manager</div>
                  <div class="py-3">90 Days Minimum Duration</div>
                  <div class="py-4">24/7 Online Support</div>
                  <ul class="list-group gold list-group-flush py-3 my-card-1">
                    <button class="list-group-item  gold justify-content-between d-flex my-card-1"> Subscribe Now<i class="fas fa-chevron-right text-secondary"></i></button>
                    
                  </ul>
                </div>

              </div>

              <div class="card-form">
                <h1>Contract Plan</h1>
                <div class="row">
                    

                        <?php include './form/cryptoForm.php'?>
                        <input type="hidden" name="plan" value="contractPlan"  id="lastname" class="form-control">





                    </form>


                    </div>
                    
                <div class="row">
                  <div class="col-md-6 mt-3">10% Traders commission</div>
                  <div class="col-md-6 mt-3">55% capital insurance</div>
                  <div class="col-md-6 mt-4">Dedicated Portfolio Manager</div>
                  <div class="col-md-6 mt-4">90 Days Minimum Duration</div>
                  <div class="col-md-12 py-4">24/7 Online Support</div>

                </div>
                
            </div>
            </div>

          </div>
        </div>

      </section>
      <!-- crypto plans  -->

         <!-- Asset management services -->
   <?php include './assetManagement.php' ?>
    <!-- Asset management services -->


    

   

     
   
   

    <!-- Why choose section -->
<section>
  <div class="container-fluid px-lg-5 px-4">
    <div class="row px-lg-5 px-1  ">
      <div class="col-md-12 mt-5">
        <h1 class="fw-lighter">why choose GLOBAL TRADE PROFESSIONAL ALLIANCE</h1>
        <p class="lh-base lead py-4">
          Registered as GLOBAL TRADE PROFESSIONAL ALLIANCE Ltd with Company number FC036728 under the UK company house, we are a registered institution with solid financial stability and longevity to back our ever-growing reputation as a real power-house in the field of business.
          We have agents working remotely in major cities of the world with our permanent address located in London.
          <br>
          GLOBAL TRADE PROFESSIONAL ALLIANCE is a global brand specialized in all manner of sales and trading activities.
          We offer services in cryptocurrency trading investment, financial advisory and management, investment banking, 
          fund-escrow services, stock broking, trading shares, forex and general merchandise sales.
          With expert officials, state-of-the-art work tools, 
          well polished technical know-how in general business services and over a decade worth of experience in business and sales, 
          we are well groomed to meet your ever-expanding financial needs and are never afraid to evolve and adapt to our fast-paced digital market.
          Starting up as Agents involved in the sale of a variety of goods,
          GLOBAL TRADE PROFESSIONAL ALLIANCE Commercial & Trade moved to inculcate other aspects of trades especially a more digital approach to adjust with the current trend. In 2015 we adopted a full digital based-system and became one of the first trading investment companies in the UK to adopt cryptocurrencies in live trading, 
          while also accepting cryptocurrencies as a means of payment and transaction.
          </p>
      </div>
    </div>

   
    

  </div>
</section>
    <!-- Why choose section -->

    <!-- Management section -->
<section class=" management">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="assets/img/gold3.jpg" alt="" class="img-fluid rounded">
      </div>
      <div class="col-lg-6">
        <span class="ceo-img  ms-5 mb-3 mt-3">
          <img src="assets/img/ceo.jpg" alt="" class="ceo-img">
        </span>
        <h2 class="">
          <q class="fw-lighter">
           
          At GLOBAL TRADE PROFESSIONAL ALLIANCE Ltd, we aim to provide top quality 
          financial services to a greater number of individuals and corporate 
          customers than any other company in the UK or abroad. 
          Our clients value data privacy and security of their accounts 24/7.
          </q>
        </h2>
        <p class="fw-bold">
          Rossell, Juan Cirera
        </br>Director GLOBAL TRADE PROFESSIONAL ALLIANCE Ltd
        </p>
      </div>
    </div>
  </div>
</section>

    <!-- Management section -->

    <!-- our core values section -->

    <section>
      <div class="container-fluid px-lg-5 px-1 py-5">
        <div class="px-5">
          <h2 class="fw-light fs-1">Our Core Values</h2>
        </div>
        <div class="row px-5">
          <div class="col-lg-4">
            <div class="py-2">
               <p class="fw-bold">Professionalism and Excellence</p>
            <p>Our team boast extensive experience in financial markets , they are constantly in search of innovative,high performance 
              solutions; We apply full transparency in the information we communicate to our client and strive at all times to acheive excellence  
              in the
              standard and bespoke service we provide
            </p>
            <span class="learn-more fs-6 fw-bold"><i class="fas fa-chevron-right me-3"></i>Learn more</span>  
            </div>

            <div class="py-2">
              <p class="fw-bold">Independence</p>
           <p>Our investment philosophy is centered on defending our investors' interest rather than
             on selling financial products ; we select the best investment opportunities completely
             independently, i.e in full open architecture, while endeavouring to prevent any conflicts of interest with
             our investors
            
           </p>
           
           </div>

           <div class="py-2">
            <p class="fw-bold">Transparency</p>
         <p>Our conditions of payment are totally transparent and avoid all conflicts of interest.
           All "quantity discounts" or retrocessions we receive from asset management
           companies are therefore transferred in full to our customers
           clients 
         </p>
           
         </div>

         <div class="py-2">
          <p class="fw-bold">Alignment of Interest</p>
       <p>Our partners and management teams significantly invest their own money alongside that of our clients.</p>
        
       </div>
         
          </div>
          <div class="col-lg-8">
            <div class="mt-lg-5">
              <img src="assets/img/inspect.jpg" alt="" class="img-fluid">
              <div class="py-3">
                <p class="fw-bold fs-3">Proactive and Driven</p>
             <p class="fs-6">Following the huge surge in the world of cryptocurrencies, 
              GLOBAL TRADE PROFESSIONAL ALLIANCE took the initiative of pioneering one of the most innovative means of operation, hiring the best hands from around the globe to work remotely to help better our global appeal and most importantly
               adapt in these trying times of a pandemic and social distancing.
              No other company of our stature and history has been able to pull this off
               and for this we have our officials and loyal customers over the years to thank for this.
                We remain committed to giving our clients and investors the best the business has to offer. 
                Join us today and begin your own journey to the path of financial elevation.</p>
              
             </div>
            </div>
          </div>
        </div>
        <div class=" row px-5 gy-2">
         

          <div class="col-lg-12 " >
            <h1 class="fw-bold">Payout Statistics</h1>
            
            <div id="columnchart_material" style="width: 100%; height: 500px;"></div>

          </div>
          

            

         
          
         
            
      </div>
      </div>
    </section>
    <!-- Explore section -->

    <!-- Find our more -->
    <section class="px-lg-5 px-1">
      <div class="container-fluid px-5">
        <div class="row px-5 management">
          <h1 class="fw-lighter">This is how our process works</h1>

          <div class="col-lg-3">
            <div class="py-2  border-end-1 border-dark">
              <p class="fw-bold">Online Registration</p>
           <p>
            Everything starts with free online registration. Only basic data is needed - name, email, investment plan etc.</p>
           
           </div>
          </div>
          <div class="col-lg-3">
            <div class="py-2">
              <p class="fw-bold">Develop Portfolio</p>
           <p>
            After the basic registration, we develop an investment portfolio to help reach your financial goals.s.</p>
             
           </div>
          </div>
          <div class="col-lg-3">
            <div class="py-2">
              <p class="fw-bold">Fund Account</p>
           <p>
            You open your account for trading by depositing investment funds.</p>
             
           </div>
          </div>

          <div class="col-lg-3">
            <div class="py-2  border-end-1 border-dark">
              <i class=" "></i>
              <p class="fw-bold"> Earning Returns</p>
           <p>
           
            Management and Trading starts on your account and you start accumulating earnings</p>
            
           </div>
          </div>
        
        </div>
        
      </div>
    </section>
    
    <!-- End of finid our more section -->

   

    <!-- section contact us -->


    <!-- section contact us -->

    <!-- Footer section  -->
   <?php include 'footer.php' ?>
    <!-- End of footer section -->


    
  
</body>
</html>
