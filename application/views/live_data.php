<?php
  include "header.php";
?>

<style type="text/css">
   body {
    /* Settings */
    --torn-shadow-offset-x: -2px;
    --torn-shadow-offset-y: 2px;
    --torn-shadow-background-color: rgba(0, 0, 0, 0.25);
    --torn-background-color: black;
    --torn-left-width: 3px;
    --torn-right-width: 3px;
    --torn-right-clip-path: polygon(68% 0%, 61% 3%, 9% 5%, 64% 8%, 59% 10%, 21% 13%, 58% 15%, 77% 18%, 97% 20%, 39% 23%, 77% 25%, 69% 28%, 34% 30%, 73% 33%, 62% 35%, 51% 38%, 3% 40%, 90% 43%, 72% 45%, 2% 48%, 92% 50%, 55% 53%, 86% 55%, 80% 57%, 26% 60%, 62% 63%, 85% 65%, 67% 68%, 3% 70%, 47% 73%, 16% 75%, 12% 78%, 3% 80%, 58% 83%, 30% 85%, 78% 88%, 26% 90%, 95% 93%, 17% 95%, 45% 98%, 98% 100%, -10% 100%, -10% 0%);
  }

  .tornpaper {
    float: left;
    clear: both;
    margin-bottom: 1.2em;
    position: relative;
    overflow: hidden;
  }

  .tornpaper>div:first-child {
    margin-left: var(--torn-shadow-offset-x);
    margin-top: var(--torn-shadow-offset-y);
    left: 0px;
    top: 0px;
    right: calc(0px - var(--torn-shadow-offset-x));
    bottom: calc(0px - var(--torn-shadow-offset-y));
    position: absolute;
    z-index: 1;
    filter: blur(var(--torn-shadow-blur));
  }

  .tornpaper>div:nth-child(2), .tornpaper>div:nth-child(2)>span {
    vertical-align: middle;
  }

  .tornpaper>div:nth-child(2), .torn_left>div:nth-child(2):before, .torn_right>div:nth-child(2):after {
    background-color: var(--torn-background-color);
  }

  .tornpaper>div:nth-child(2),
  .tornpaper>div:nth-child(2) {
    display: inline-block;
    position: relative;
    z-index: 2;
    padding: 0.4em;
  }

  .torn_left>div:nth-child(2):before,
  .torn_left>div:first-child:before {
    content: '';
    position: absolute;
    left: calc(0em - var(--torn-left-width));
    top: 0px;
    width: var(--torn-left-width);
    bottom: 0px;
    -webkit-clip-path: var(--torn-left-clip-path);
    clip-path: var(--torn-left-clip-path);
  }

  .tornpaper>div:first-child,
  .torn_left>div:first-child:before,
  .torn_right>div:first-child:after {
    background-color: var(--torn-shadow-background-color);
  }

  .torn_right>div:nth-child(2):after,
  .torn_right>div:first-child:after {
    content: '';
    position: absolute;
    left: 100%;
    top: 0px;
    right: calc(0px - var(--torn-right-width));
    bottom: 0px;
    -webkit-clip-path: var(--torn-right-clip-path);
    clip-path: var(--torn-right-clip-path);
  }

  .torn_right>div:nth-child(2):after {
    left: calc(100% - 0.5px);
  }
  .card {
    background-image: url('<?php echo base_url("assets/img/logo_transparent.png")?>');
    background-color: rgba(255, 255, 255, 0.5);
    background-size: 300px 300px;
    background-position: center;
    background-repeat: no-repeat;

  }
  .fixed-header thead {
        position: sticky;
        top: 0;
        background-color: #fff;
  }
  /* Style for the table body */
  .scrollable-body {
      height: 400px; /* Set the height as desired */
      overflow-y: auto;
  }
  /* Style to fix the width of the header cells */
  .fixed-header th {
      position: sticky;
      top: 0;
      background-color: #fff;
  }

  .hide-scrollbar::-webkit-scrollbar {
    display: none;
  }

</style>
<main id="main">
    <!-- ======= About Lists Section ======= -->
<section id="situasi" class="about-lists">
  <div class="container">
    <?php include "kop.php";?>
      <!-- <div class="col-lg-12 col-md-12 content-item" data-aos="fade-up">
        <span class="alert alert-success text-center" style="color: black;">LIVE SCORE</span>
      </div> -->
  </div>
  <div class="container card">
    <a href="#" onclick="refresh_live()" title="Perbaharui data"><i class="icofont-refresh"></i></a>
    <div class="scrollable-body" id="scrollableTable">
      <table class="table fixed-header">
        <thead>
          <tr style="background-color: black;color: white;">
            <td >No</td>
            <td >No. Ujian</td>
            <td >Nama</td>
            <td >Asal Ujian</td>
            <?php
            $exp=explode(",", $bidang_soal);
            // array_multisort($exp, SORT_ASC);
            for ($i=0; $i < count($exp); $i++) { 
              echo '<td align="center">'.$exp[$i].'</td>';
            }
            ?>
            <td align="center">Total</td>
            <td >KET</td>
          </tr>
        </thead>
        <tbody id="t4_data"></tbody>
        
      </table>
    </div>
    <div class="row">
      <div class="col-md-1 text-center" style="font-weight: bold; color: yellow; background-color: black;">TAHUN <br><h5 style="font-weight: bold; color: white;"><?php echo date('Y');?></h5></div>
      <div class="col-md-2 text-center" style="font-weight: bold; color: yellow; background-color: black;font-size: 25px;">LIVE SCORE</h4></div>
      <div class="col-md-3 text-center" style="background-color: black;">
        <div id="torn_edge_banner" class="torn_container torn_left torn_right">
            <div></div>
            <div><span class="banner_text" style=""><label style="color:yellow" id="kategori"><?php echo $kategori; ?></label><br><label style="color:white;"><?php echo date('d/m/Y '); ?><time id="jam"></time></label></span></div>
        </div>
      </div>
      <div class="col-md-5 text-center " style="font-weight: bolder;"><h2><nama id="nama_ujian"></nama></h2></div>
      <div class="col-md-1 text-center" style="font-weight: bold;"><img class="img-fluid" src="<?php echo base_url("assets/img/logo.png")?>"></div>
    </div>
  </div>   
  </section><!-- End About Lists Section -->
</main>
<?php include "footer.php";?>
<script type="text/javascript">

  // Define the interval time in milliseconds
  var intervalTime = 20; // 2 seconds
  var scrollingInterval;

  $(document).ready(function(){
      
      refresh_live()
      var timeload = <?php echo $timeload;?>;

      setInterval(function(){
        refresh_live();
        console.log(timeload);
      },timeload);

      setInterval(function() {
        var date = new Date();
        $('#jam').html(
            date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
            );
      }, 500);

      $("#nama_ujian").html('<?php echo $nama_ujian?>');

      // Start scrolling with the specified interval
      setTimeout(function(){
        scrollingInterval = setInterval(scrollTableBody, intervalTime);
      }, 3000);

      // Stop scrolling when the mouse is over the table body
      $('.scrollable-body').mouseenter(function() {
          clearInterval(scrollingInterval);
      });

      // Resume scrolling when the mouse leaves the table body
      $('.scrollable-body').mouseleave(function() {
          scrollingInterval = setInterval(scrollTableBody, intervalTime);
      });
    })

  // Function to scroll the table body down
  function scrollTableBody() {
    var $scrollableBody = $('.scrollable-body');
    var scrollHeight = $scrollableBody.prop('scrollHeight');
    var scrollTop = $scrollableBody.scrollTop();
    var windowHeight = $scrollableBody.height();

    if (Math.round(scrollHeight - scrollTop) === windowHeight) {
        // If at the bottom, scroll back to the top
        
        clearInterval(scrollingInterval);
        setTimeout(function() {
            $scrollableBody.scrollTop(0); //scrolling back to the top
            
            // After scrolling back to the top, resume scrolling
            setTimeout(function() {
                scrollingInterval = setInterval(scrollTableBody, intervalTime);
            }, 3000); // Resume scrolling after 3 seconds
        }, 3000); // Pause for 3 seconds
    } else {
        // Scroll down by 1 pixel
        $scrollableBody.scrollTop(scrollTop + 1);
    }
  }
  
  function refresh_live(){
      var pin = <?php echo $pin;?>;

      if(pin==""){
        return false;
      }
      else{
        $.ajax({
          url:'<?php echo base_url('cat/tampil_data_live_fresh?pin=')?>'+pin,
          type:'get',
          success:function(e){
            $("#t4_data").html(e);
          },
          error:function(x){
            console.log(x);
          }
        })
      }

      return false;
    }
</script>