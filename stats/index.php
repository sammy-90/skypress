<!DOCTYPE html>
<html>
<head>
<meta name="generator" content="Supreme Stats v:1 (http://www.supremesearch.net)">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="description" content="Supreme Stats - Advanced Web Statistics">
<?php echo "<title>Statistics for ".$_SERVER['HTTP_HOST']."</title>"; ?>
</head>

<style>
table {
  border-collapse: collapse;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

a {text-decoration: none; color:blue;} 
a:hover {color:green;}

html, body{font-family: Arial, Helvetica, sans-serif;}

</style>

<body>
<center>
<table>

<?php

  //Get Mode
  $mode = $_GET['mode']; if(!$mode){$mode = "main";} 

  //Get Password
  $pw = $_GET['pw']; $admin = "off"; include "../sky-password.php"; if($pw == $your_password){$admin = "on";}

  //Mobile Mode
  function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
  }

    if(file_exists("stats.txt")){

      //Check Log Size
      $maxsize = 3600000;
      if(filesize("stats.txt") > $maxsize){echo "Run Cleanup"; header('Location: index.php?mode=cleanup');}

      //Get Domain Name
      $domain = str_replace("www.", "", $_SERVER['HTTP_HOST']);
      //$domain = "supremesearch.net";  //Debug

      //Main Menu
      if($mode == "main"){

        //Counters
        $today = 0;
        $direct = 0;
        $referral = 0;
        $display_referral = 0;
        $date = date("j");
        $month = date("M");
        $i = $_GET['i']; if(!$i){$i = 0;}
        $pg = $_GET['pg']; if(!$pg){$pg = 0;}

        echo '<ts>';
          echo '<tc colspan="6"><center><h2><a name="STATS"></a><a href="#SUMMARY" title="View Summary"><font color="black">Statistics for: '.$_SERVER['HTTP_HOST'].'</font></a></h2></center></tc>';
        echo '</ts>';

        echo '<tr>';
        echo '<th><a href="?mode=hours" title="View Hours"><font color="black">Date&#8595;</font><font color="white">xxx_xxx_xxx</font></a></th>';
        echo '<th><a href="?mode=bandwidth" title="View Bandwidth"><font color="black">IP&#8595;</font><font color="white">xxx_xxx_xxx</font></a></th>';
        echo '<th colspan="3"><a href="?mode=referrals" title="View Uniques"><font color="black">Referer&#8595;</font></a></th>';
        echo '<th><a href="?mode=pages" title="View Uniques"><font color="black">Page&#8595;</font></a></th>';
        echo '</tr>';
   
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));$counter = 0;

        //Add Compress Data
        if (strpos(strtolower($lines[count($lines)-1]), strtolower("@")) !== false){
          $c_data = explode("|",$lines[count($lines)-1]);
          if($c_data[0] == date("M")){$direct = $direct + $c_data[2]; $referral = $referral + $c_data[3]; $counter = ($referral + $direct); $i++;}
        }

        for($sc = $i; $sc < count($lines); next($lines), $sc++){

          $data = explode("|",$lines[$sc]); // Get Data

          if (strlen($data[2]) < 7){$counter++; 
	    $direct++;
          }else{
            if (strpos(strtolower($data[3]), strtolower($domain)) !== false){$counter++; $referral++; $display_referral++;
              if(!isMobile()){
                if($display_referral <= 3000){$i++;
                  echo "<tr>";
                  echo "<td>$data[0]</td>";
                  echo "<td>$data[1]</td>"; $Cut_URL = substr($data[2], 0, 75);
                  echo "<td colspan='3'><a href='$data[2]' target='blank'>$Cut_URL</a></td>";  $Cut_URL2 = substr($data[3], 0, 75);
                  echo "<td><a href='$data[3]' target='blank'>$Cut_URL2</a></td>";
                  echo "</tr>";
                }
              }else{
                if($display_referral <= 1500){$i++;
                  echo "<tr>";
                  echo "<td>$data[0]</td>";
                  echo "<td>$data[1]</td>"; $Cut_URL = substr($data[2], 0, 75);
                  echo "<td colspan='3'><a href='$data[2]' target='blank'>$Cut_URL</a></td>";  $Cut_URL2 = substr($data[3], 0, 75);
                  echo "<td><a href='$data[3]' target='blank'>$Cut_URL2</a></td>";
                  echo "</tr>";
                }
              }
            }
          }

          //Make Counters
          if (strpos(strtolower($data[0]), strtolower($month." ".$date)) !== false){$today++;}

        }

        //Page Counter
        $pg++;

        //Footer
        echo '<tr><td colspan="6"><center><h2>';
        echo '<a href="#" onclick="history.go(-2)" title="Back"><font color="black">&#8592;</font></a>&emsp;';
          if($pg == 1){
            echo '<a name="SUMMARY"></a><a href="#STATS" title="View Statistics - Referrals: '.$referral.'"><font color="black">Summary</font></a>&emsp;';
          }else{
            echo '<a name="SUMMARY"></a><a href="?mode=main" title="Go Home">Page '.$pg.'</a>&emsp;';
          }
        echo '<a href="?mode=main&i='.$i.'&pg='.$pg.'" title="Next"><font color="black">&#8594;</font></a>';
        echo '</h2></center></td></tr>';

        if($pg == 1){
          echo "<tr>";
          echo "<td><a href='?mode=search_keyphrases' title='Search Keyphrases'>Total: ".number_format($counter)."</a></td>";
          echo "<td><a href='?mode=direct_traffic' title='Non Referral Traffic'>Direct: ".number_format($direct)."</a></td>";
          echo "<td><a href='?mode=last_30_days' title='View Last 30 Days'>Today: ".number_format($today)."</a></td>";
          echo "<td><a href='?mode=search_engines' title='Referring Search Engines'>Search Engines</a></td>";
          if($admin == "on"){echo "<td><a href='#SUMMARY' onclick='Cleanup()' title='Remove previous months logs ".(filesize("stats.txt")/1000000)."mb'>Cleanup</a></td>";}else{echo "<td><a href='?mode=your_rank' title='View Traffic Rank'>Traffic Rank</a></td>";}
          echo '<td><a href="http://www.supremesearch.net" target="blank" title="Version 1.0">Supreme Stats (C) '.date("Y").'</td>';
          echo "</tr>";
        }

      }


      //Direct Traffic
      if($mode == "direct_traffic"){

        //Setup Variables
        $limit = 0;
        $i = $_GET['i']; if(!$i){$i = 0;}
        $pg = $_GET['pg']; if(!$pg){$pg = 0;}

        echo '<ts>';
          echo '<tc colspan="2"><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        echo '<tr>';
        echo '<th><a href="#SUMMARY" title="View Summary"><font color="black">Date</font><font color="white">xxx_xxx_xxx</font></a></th>';
        echo '<th title="Latest 10,000 Ips"><a href="#SUMMARY" title="View Summary"><font color="black">IP</font><font color="white">xxx_xxx_xxx</font></a></th>';
        echo '</tr>';
   
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        for($sc = $i; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

          if (strlen($data[2]) < 1){$limit++;
            if($limit <= 10000){$i++;
              echo "<tr>";
              echo "<td>$data[0]</td>";
              echo "<td>$data[1]</td>"; $Cut_URL = substr($data[2], 0, 60);
              echo "</tr>";
            }
          }

        }

        //Page Counter
        $pg++;

        //Footer
        echo '<tr><td colspan="6"><center><h2>';
        echo '<a href="#" onclick="history.go(-2)" title="Back"><font color="black">&#8592;</font></a>&emsp;';
        echo '<a name="SUMMARY"></a><a href="?mode=main" title="Go Home">Page '.$pg.'</a>&emsp;';
        echo '<a href="?mode=direct_traffic&i='.$i.'&pg='.$pg.'" title="Next"><font color="black">&#8594;</font></a>';
        echo '</h2></center></td></tr>';

      }


      //Search Keyphrases
      if($mode == "search_keyphrases"){

        //keyphrase
        $limit = 0;
        $c_keyphrase = 0;
        $keyphrase = "na";

        echo '<ts><tc colspan="1"><center><h2><a href="?mode=main">Home</a></h2></center></tc></ts>';
        echo '<tr><th title="Top 1,000 Keyphrases"><a href="#SUMMARY" title="View Summary"><font color="black">Search Keyphrases</font></a></th></tr>';
   
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        for($sc = 0; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

          if (strpos(strtolower($data[2]), strtolower("=")) !== false){

            //Get keyphrases & Keywords
            $keyphrase = explode("=",$data[2]); 

            if (strpos(strtolower($keyphrase[1]), strtolower(" ")) !== false){
              $keyword_array[$c_keyphrase] = $keyphrase[1]; $c_keyphrase++;
            }else{ 
              if(strtolower($keyphrase[1]) != $keyphrase[1] && strtoupper($keyphrase[1]) != $keyphrase[1] && strlen($keyphrase[1]) < 11){
                $keyword_array[$c_keyphrase] = $keyphrase[1]; $c_keyphrase++;
              }
            }

            //Though Out Loop At 2k
            if($c_keyphrase > 1999){$sc = ($sc + count($lines));} 
            
          }

        }$un_keyword_array = array_unique($keyword_array);

        //Print Pages
        for($sc = 0; $sc < count($keyword_array); next($keyword_array), $sc++){

          if(strlen($un_keyword_array[$sc]) > 4){$limit++; echo "<tr><td>".$un_keyword_array[$sc]."</td></tr>";}

          if($limit >= 1000){$sc = ($sc + count($keyword_array));} //Set Limit At 1,000

        }echo "<tr><td><a name='SUMMARY'></a>Total Unique: ".$limit."</td></tr>";



      }


      //Pages
      if($mode == "pages"){

        //Setup
        $limit = 0;

        echo '<ts>';
          echo '<tc colspan="2"><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        echo '<tr>';
        echo '<th><a href="#SUMMARY" title="View Summary"><font color="black">Pages</font></a></th>';
        echo '</tr>';
   
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        for($sc = 0; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

          if (strpos(strtolower($data[3]), strtolower($domain)) !== false){$page_array[$sc] = $data[3];}

        }$un_page_array = array_unique($page_array);

        //Print Pages
        for($sc = 0; $sc < count($page_array); next($page_array), $sc++){

          if(strlen($un_page_array[$sc]) > 4){$limit++; echo "<tr><td><a href='".$un_page_array[$sc]."' target='blank'>".$un_page_array[$sc]."</a></td></tr>";}

          if($limit >= 1000){$sc = ($sc + count($un_page_array));} //Set Limit At 1,000

        }echo "<tr><td><a name='SUMMARY'></a>Total Unique: ".$limit."</td></tr>";

      }


      //Referrals
      if($mode == "referrals"){

        //Setup
        $limit = 0;

        echo '<ts>';
          echo '<tc colspan="2"><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        echo '<tr>';
        echo '<th><a href="#SUMMARY" title="View Summary"><font color="black">Referrals</font></a></th>';
        echo '</tr>';
   
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        for($sc = 0; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

          if (strpos(strtolower($data[3]), strtolower($domain)) !== false){$page_array[$sc] = $data[2];}

        }$un_page_array = array_unique($page_array);

        //Print Pages
        for($sc = 0; $sc < count($page_array); next($page_array), $sc++){

          if(strlen($un_page_array[$sc]) > 4){$limit++; echo "<tr><td><a href='".$un_page_array[$sc]."' target='blank'>".$un_page_array[$sc]."</a></td></tr>";}

          if($limit >= 1000){$sc = ($sc + count($un_page_array));} //Set Limit At 1,000

        }echo "<tr><td><a name='SUMMARY'></a>Total Unique: ".$limit."</td></tr>";

      }


      //bandwidth
      if($mode == "bandwidth"){

        //Setup
        $month = date("M");
        $filename = "na";
        $total_bandwidth = 0;

        echo '<ts><a name="SUMMARY"></a>';
          echo '<tc colspan="2"><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        echo '<tr>';
        echo '<th>Page</th>';
        echo '<th><a href="#total_bandwidth" title="View Total Bandwidth"><font color="black">Bandwidth&#8595;</font></a></th>';
        echo '</tr>';
   
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        for($sc = 0; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

          if ((strpos(strtolower($data[3]), strtolower($domain)) !== false) && (strpos(strtolower($data[0]), strtolower($month)) !== false)){

             //Get Page Only
             $data[3] = preg_replace('/\s+/', '', $data[3]);
             $prename = explode("/",$data[3]);

             //check for queries & get filename
             if (strpos(strtolower($prename[3]), strtolower("?")) !== false){
               $qprename = explode("?",$prename[3]); $filename = "../".$qprename[0];
             }else{
               $filename = "../".$prename[3];
             }

             if(filesize($filename) > 0){
               echo "<tr>";
               if(strlen($filename) <= 3){echo "<td><a href='".$data[3]."' target='blank'>../index</a></td>";}else{echo "<td><a href='".$data[3]."' target='blank'>".$filename."</a></td>";}
               echo "<td>".(filesize($filename)/1000000)." mb</td>";
               echo "</tr>";
             }$total_bandwidth = ($total_bandwidth + filesize($filename));

          }

        }echo "<tr><td><a name='total_bandwidth'><a href='#SUMMARY' title='Scroll To Top'>Estimated Total Bandwidth:</td><td>".(($total_bandwidth)/1000000)." mb</a></a></td></tr>";

      }


      //Hours
      if($mode == "hours"){

        //PM
        $p1 = 0;
        $p2 = 0;
        $p3 = 0;
        $p4 = 0;
        $p5 = 0;
        $p6 = 0;
        $p7 = 0;
        $p8 = 0;
        $p9 = 0;
        $p10 = 0;
        $p11 = 0;
        $p12 = 0;
        $ptotal = 0;

        //AM
        $a1 = 0;
        $a2 = 0;
        $a3 = 0;
        $a4 = 0;
        $a5 = 0;
        $a6 = 0;
        $a7 = 0;
        $a8 = 0;
        $a9 = 0;
        $a10 = 0;
        $a11 = 0;
        $a12 = 0;
        $atotal = 0;

        //Day Search
        $date = date("j");
        $month = date("M");

        echo '<ts>';
          echo '<tc><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));$counter = 0;

        for($sc = 0; $sc < count($lines); next($lines), $sc++){

          $data = explode("|",$lines[$sc]); // Get Data

          if ((strpos(strtolower($data[3]), strtolower($domain)) !== false) || (strlen($data[2]) < 7)){
           if (strpos(strtolower($data[0]), strtolower($month." ".$date)) !== false){

            if ((strpos(strtolower($data[0]), strtolower("12:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p12++;}
            if ((strpos(strtolower($data[0]), strtolower("11:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p11++;}
            if ((strpos(strtolower($data[0]), strtolower("10:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p10++;}
            if ((strpos(strtolower($data[0]), strtolower("9:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p9++;}
            if ((strpos(strtolower($data[0]), strtolower("8:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p8++;}
            if ((strpos(strtolower($data[0]), strtolower("7:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p7++;}
            if ((strpos(strtolower($data[0]), strtolower("6:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p6++;}
            if ((strpos(strtolower($data[0]), strtolower("5:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p5++;}
            if ((strpos(strtolower($data[0]), strtolower("4:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p4++;}
            if ((strpos(strtolower($data[0]), strtolower("3:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p3++;}
            if ((strpos(strtolower($data[0]), strtolower("2:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p2++;}
            if ((strpos(strtolower($data[0]), strtolower("1:")) !== false) && (strpos(strtolower($data[0]), strtolower(" p")) !== false)){$ptotal++; $p1++;}

            if ((strpos(strtolower($data[0]), strtolower("12:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a12++;}
            if ((strpos(strtolower($data[0]), strtolower("11:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a11++;}
            if ((strpos(strtolower($data[0]), strtolower("10:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a10++;}
            if ((strpos(strtolower($data[0]), strtolower("9:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a9++;}
            if ((strpos(strtolower($data[0]), strtolower("8:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a8++;}
            if ((strpos(strtolower($data[0]), strtolower("7:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a7++;}
            if ((strpos(strtolower($data[0]), strtolower("6:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a6++;}
            if ((strpos(strtolower($data[0]), strtolower("5:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a5++;}
            if ((strpos(strtolower($data[0]), strtolower("4:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a4++;}
            if ((strpos(strtolower($data[0]), strtolower("3:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a3++;}
            if ((strpos(strtolower($data[0]), strtolower("2:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a2++;}
            if ((strpos(strtolower($data[0]), strtolower("1:")) !== false) && (strpos(strtolower($data[0]), strtolower(" a")) !== false)){$atotal++; $a1++;}

           }
          }

        }

        //Hours AM
        echo '<tr><th>'.$month.' '.$date.' AM</th></tr>';
        echo "<tr><td>12 AM - ".number_format($a12)."</td></tr>";
        echo "<tr><td>01 AM - ".number_format($a1)."</td></tr>";
        echo "<tr><td>02 AM - ".number_format($a2)."</td></tr>";
        echo "<tr><td>03 AM - ".number_format($a3)."</td></tr>";
        echo "<tr><td>04 AM - ".number_format($a4)."</td></tr>";
        echo "<tr><td>05 AM - ".number_format($a5)."</td></tr>";
        echo "<tr><td>06 AM - ".number_format($a6)."</td></tr>";
        echo "<tr><td>07 AM - ".number_format($a7)."</td></tr>";
        echo "<tr><td>08 AM - ".number_format($a8)."</td></tr>";
        echo "<tr><td>09 AM - ".number_format($a9)."</td></tr>";
        echo "<tr><td>10 AM - ".number_format($a10)."</td></tr>";
        echo "<tr><td>11 AM - ".number_format($a11)."</td></tr>";
        echo "<tr><td>Total - ".number_format($atotal)."</td></tr>";
        echo "</table><br><br>";


        //Hours PM
        echo "<table>";
        echo '<tr><th>'.$month.' '.$date.' PM</th></tr>';
        echo "<tr><td>12 PM - ".number_format($p12)."</td></tr>";
        echo "<tr><td>01 PM - ".number_format($p1)."</td></tr>";
        echo "<tr><td>02 PM - ".number_format($p2)."</td></tr>";
        echo "<tr><td>03 PM - ".number_format($p3)."</td></tr>";
        echo "<tr><td>04 PM - ".number_format($p4)."</td></tr>";
        echo "<tr><td>05 PM - ".number_format($p5)."</td></tr>";
        echo "<tr><td>06 PM - ".number_format($p6)."</td></tr>";
        echo "<tr><td>07 PM - ".number_format($p7)."</td></tr>";
        echo "<tr><td>08 PM - ".number_format($p8)."</td></tr>";
        echo "<tr><td>09 PM - ".number_format($p9)."</td></tr>";
        echo "<tr><td>10 PM - ".number_format($p10)."</td></tr>";
        echo "<tr><td>11 PM - ".number_format($p11)."</td></tr>";
        echo "<tr><td>Total - ".number_format($ptotal)."</td></tr>";
        echo "</table>";

      }


      //Last 30 Days
      if($mode == "last_30_days"){

        //Counters
        $i = 0;
        $day1 = 0;
        $day2 = 0;
        $day3 = 0;
        $day4 = 0;
        $day5 = 0;
        $day6 = 0;
        $day7 = 0;
        $day8 = 0;
        $day9 = 0;
        $day10 = 0;
        $day11 = 0;
        $day12 = 0;
        $day13 = 0;
        $day14 = 0;
        $day15 = 0;
        $day16 = 0;
        $day17 = 0;
        $day18 = 0;
        $day19 = 0;
        $day20 = 0;
        $day21 = 0;
        $day22 = 0;
        $day23 = 0;
        $day24 = 0;
        $day25 = 0;
        $day26 = 0;
        $day27 = 0;
        $day28 = 0;
        $day29 = 0;
        $day30 = 0;
        $ptotal = 0;

        //Day Search
        $month = date("M");
        $day_1 = date("j") - 1;
        $day_2 = date("j") - 2;
        $day_3 = date("j") - 3;
        $day_4 = date("j") - 4;
        $day_5 = date("j") - 5;
        $day_6 = date("j") - 6;
        $day_7 = date("j") - 7;
        $day_8 = date("j") - 8;
        $day_9 = date("j") - 9;
        $day_10 = date("j") - 10;
        $day_11 = date("j") - 11;
        $day_12 = date("j") - 12;
        $day_13 = date("j") - 13;
        $day_14 = date("j") - 14;
        $day_15 = date("j") - 15;
        $day_16 = date("j") - 16;
        $day_17 = date("j") - 17;
        $day_18 = date("j") - 18;
        $day_19 = date("j") - 19;
        $day_20 = date("j") - 20;
        $day_21 = date("j") - 21;
        $day_22 = date("j") - 22;
        $day_23 = date("j") - 23;
        $day_24 = date("j") - 24;
        $day_25 = date("j") - 25;
        $day_26 = date("j") - 26;
        $day_27 = date("j") - 27;
        $day_28 = date("j") - 28;
        $day_29 = date("j") - 29;
        $day_30 = date("j") - 30;

        echo '<ts>';
          echo '<tc><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        //Add Compress Data
        if (strpos(strtolower($lines[count($lines)-1]), strtolower("@")) !== false){
          $c_data = explode("|",$lines[count($lines)-1]);
          if($c_data[0] == date("M")){$direct = $direct + $c_data[2]; $referral = $referral + $c_data[3]; $ptotal = ($referral + $direct); $i++;}
        }

        for($sc = $i; $sc < count($lines); next($lines), $sc++){

          $data = explode("|",$lines[$sc]); // Get Data
          $Month_Time = explode(" ",$data[0]); // Get Date

          if ((strpos(strtolower($data[3]), strtolower($domain)) !== false) || (strlen($data[2]) < 7)){
            
            //Make Counters For Days
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_1){$ptotal++; $day1++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_2){$ptotal++; $day2++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_3){$ptotal++; $day3++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_4){$ptotal++; $day4++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_5){$ptotal++; $day5++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_6){$ptotal++; $day6++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_7){$ptotal++; $day7++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_8){$ptotal++; $day8++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_9){$ptotal++; $day9++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_10){$ptotal++; $day10++;}

            //Make Counters For Days
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_11){$ptotal++; $day11++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_12){$ptotal++; $day12++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_13){$ptotal++; $day13++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_14){$ptotal++; $day14++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_15){$ptotal++; $day15++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_16){$ptotal++; $day16++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_17){$ptotal++; $day17++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_18){$ptotal++; $day18++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_19){$ptotal++; $day19++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_20){$ptotal++; $day20++;}

            //Make Counters For Days
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_21){$ptotal++; $day21++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_22){$ptotal++; $day22++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_23){$ptotal++; $day23++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_24){$ptotal++; $day24++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_25){$ptotal++; $day25++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_26){$ptotal++; $day26++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_27){$ptotal++; $day27++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_28){$ptotal++; $day28++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_29){$ptotal++; $day29++;}
            if($Month_Time[0]." ".$Month_Time[1] == $month." ".$day_30){$ptotal++; $day30++;}

          }

        }


        //Show Days
        echo '<tr><th>Last 30 Days</th></tr>';
        if($day1 > 0){echo "<tr><td>".$month." ".$day_1.": ".number_format($day1)."</td></tr>";}
        if($day2 > 0){echo "<tr><td>".$month." ".$day_2.": ".number_format($day2)."</td></tr>";}
        if($day3 > 0){echo "<tr><td>".$month." ".$day_3.": ".number_format($day3)."</td></tr>";}
        if($day4 > 0){echo "<tr><td>".$month." ".$day_4.": ".number_format($day4)."</td></tr>";}
        if($day5 > 0){echo "<tr><td>".$month." ".$day_5.": ".number_format($day5)."</td></tr>";}
        if($day6 > 0){echo "<tr><td>".$month." ".$day_6.": ".number_format($day6)."</td></tr>";}
        if($day7 > 0){echo "<tr><td>".$month." ".$day_7.": ".number_format($day7)."</td></tr>";}
        if($day8 > 0){echo "<tr><td>".$month." ".$day_8.": ".number_format($day8)."</td></tr>";}
        if($day9 > 0){echo "<tr><td>".$month." ".$day_9.": ".number_format($day9)."</td></tr>";}
        if($day10 > 0){echo "<tr><td>".$month." ".$day_10.": ".number_format($day10)."</td></tr>";}

        if($day11 > 0){echo "<tr><td>".$month." ".$day_11.": ".number_format($day11)."</td></tr>";}
        if($day12 > 0){echo "<tr><td>".$month." ".$day_12.": ".number_format($day12)."</td></tr>";}
        if($day13 > 0){echo "<tr><td>".$month." ".$day_13.": ".number_format($day13)."</td></tr>";}
        if($day14 > 0){echo "<tr><td>".$month." ".$day_14.": ".number_format($day14)."</td></tr>";}
        if($day15 > 0){echo "<tr><td>".$month." ".$day_15.": ".number_format($day15)."</td></tr>";}
        if($day16 > 0){echo "<tr><td>".$month." ".$day_16.": ".number_format($day16)."</td></tr>";}
        if($day17 > 0){echo "<tr><td>".$month." ".$day_17.": ".number_format($day17)."</td></tr>";}
        if($day18 > 0){echo "<tr><td>".$month." ".$day_18.": ".number_format($day18)."</td></tr>";}
        if($day19 > 0){echo "<tr><td>".$month." ".$day_19.": ".number_format($day19)."</td></tr>";}
        if($day20 > 0){echo "<tr><td>".$month." ".$day_20.": ".number_format($day20)."</td></tr>";}

        if($day21 > 0){echo "<tr><td>".$month." ".$day_21.": ".number_format($day21)."</td></tr>";}
        if($day22 > 0){echo "<tr><td>".$month." ".$day_22.": ".number_format($day22)."</td></tr>";}
        if($day23 > 0){echo "<tr><td>".$month." ".$day_23.": ".number_format($day23)."</td></tr>";}
        if($day24 > 0){echo "<tr><td>".$month." ".$day_24.": ".number_format($day24)."</td></tr>";}
        if($day25 > 0){echo "<tr><td>".$month." ".$day_25.": ".number_format($day25)."</td></tr>";}
        if($day26 > 0){echo "<tr><td>".$month." ".$day_26.": ".number_format($day26)."</td></tr>";}
        if($day27 > 0){echo "<tr><td>".$month." ".$day_27.": ".number_format($day27)."</td></tr>";}
        if($day28 > 0){echo "<tr><td>".$month." ".$day_28.": ".number_format($day28)."</td></tr>";}
        if($day29 > 0){echo "<tr><td>".$month." ".$day_29.": ".number_format($day29)."</td></tr>";}
        if($day30 > 0){echo "<tr><td>".$month." ".$day_30.": ".number_format($day30)."</td></tr>";}
        echo "<tr><td>Total: ".number_format($ptotal)."</td></tr>";
        echo "</table>";

      }


      //Search Engines
      if($mode == "search_engines"){

        //Search Engines
        $ask = 0;
        $google = 0;
        $bing = 0;
        $yahoo = 0;
	$baidu = 0;
	$yandex = 0;
	$duckduckgo = 0;
	$unknown = 0;
        $dogpile = 0;
	$webcrawler = 0;
	$info = 0;
	$searchnow = 0;
	$facebook = 0;
        $youtube = 0;
        $ptotal = 0;

        //Check This Month Only
        $month = date("M");

        echo '<ts>';
          echo '<tc><center><h2><a href="?mode=main">Home</a></h2></center></tc>';
        echo '</ts>';

        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        for($sc = 0; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

          if (strpos(strtolower($data[3]), strtolower($domain)) !== false){
           if (strpos(strtolower($data[0]), strtolower($month)) !== false){

	    //Make Counters For Search Engines
      	    if (strpos(strtolower($data[2]), strtolower("ask.com")) !== false){$ptotal++; $ask++;}
      	    if (strpos(strtolower($data[2]), strtolower("google.co")) !== false){$ptotal++; $google++;}
            if (strpos(strtolower($data[2]), strtolower("bing.com")) !== false){$ptotal++; $bing++;}
            if (strpos(strtolower($data[2]), strtolower("yahoo.com")) !== false){$ptotal++; $yahoo++;}
            if (strpos(strtolower($data[2]), strtolower("baidu.com")) !== false){$ptotal++; $baidu++;}
            if (strpos(strtolower($data[2]), strtolower("yandex.com")) !== false){$ptotal++; $yandex++;}
            if (strpos(strtolower($data[2]), strtolower("duckduckgo.com")) !== false){$ptotal++; $duckduckgo++;}
            if (strpos(strtolower($data[2]), strtolower("dogpile.com")) !== false){$ptotal++; $dogpile++;}
            if (strpos(strtolower($data[2]), strtolower("webcrawler.com")) !== false){$ptotal++; $webcrawler++;}
            if (strpos(strtolower($data[2]), strtolower("info.com")) !== false){$ptotal++; $info++;}
            if (strpos(strtolower($data[2]), strtolower("searchnow.com")) !== false){$ptotal++; $searchnow++;}
            if (strpos(strtolower($data[2]), strtolower("facebook.com")) !== false){$ptotal++; $facebook++;}
            if (strpos(strtolower($data[2]), strtolower("youtube.com")) !== false){$ptotal++; $youtube++;}

	    //Make Counters For Unknown Search Engines
      	    if (strpos(strtolower($data[2]), strtolower("search.net")) !== false){$ptotal++; $unknown++;}
      	    if (strpos(strtolower($data[2]), strtolower("search.co")) !== false){$ptotal++; $unknown++;}
            if (strpos(strtolower($data[2]), strtolower("meta.co")) !== false){$ptotal++; $unknown++;}
            if (strpos(strtolower($data[2]), strtolower("find.co")) !== false){$ptotal++; $unknown++;}
            if (strpos(strtolower($data[2]), strtolower("seek.co")) !== false){$ptotal++; $unknown++;}
         
           }
          }

        }

        //Show Search Engines
        echo '<tr><th title="This Month">Search Engines</th></tr>';
        if($ask > 0){echo "<tr><td>Ask: $ask</td></tr>";}
        if($baidu > 0){echo "<tr><td>Baidu: $baidu</td></tr>";}
        if($bing > 0){echo "<tr><td>Bing: $bing</td></tr>";}
        if($dogpile > 0){echo "<tr><td>Dogpile: $dogpile</td></tr>";}
        if($duckduckgo > 0){echo "<tr><td>DuckDuckgo: $duckduckgo</td></tr>";}
        if($facebook > 0){echo "<tr><td>Facebook: $facebook</td></tr>";}
        if($google > 0){echo "<tr><td>Google: $google</td></tr>";}
        if($info > 0){echo "<tr><td>Info: $info</td></tr>";}
        if($searchnow > 0){echo "<tr><td>Searchnow: $searchnow</td></tr>";}
        if($unknown > 0){echo "<tr><td title='Traffic From Unknown Search Engines'>Unknown: $unknown</td></tr>";}
        if($yahoo > 0){echo "<tr><td>Yahoo: $yahoo</td></tr>";}
        if($yandex > 0){echo "<tr><td>Yandex: $yandex</td></tr>";}
        if($youtube > 0){echo "<tr><td>Youtube: $youtube</td></tr>";}
        if($webcrawler > 0){echo "<tr><td>Webcrawler: $webcrawler</td></tr>";}
        echo "<tr><td title='Total Search Engine Traffic'>Total: ".number_format($ptotal)."</td></tr>";
        echo "</table>";

      }


      //Cleanup
      if($mode == "cleanup"){

        //Counters
        $i = 0;
        $direct = 0;
        $referral = 0;

        //Clean & Compress
        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        //Add Compress Data
        if (strpos(strtolower($lines[count($lines)-1]), strtolower("@")) !== false){
          $c_data = explode("|",$lines[count($lines)-1]);
          if($c_data[0] == date("M")){$direct = $direct + $c_data[2]; $referral = $referral + $c_data[3]; $i++;}
        }

	$writing = fopen('stats.tmp', 'w');

	for($sc = $i; $sc < count($lines); next($lines), $sc++){
          $data = explode("|",$lines[$sc]); // Get Data
          if (strpos(strtolower($data[0]), strtolower(date("M"))) !== false){
            if (strpos(strtolower($data[3]), strtolower($domain)) !== false){$direct++;}
            if (strlen($data[2]) < 7){$referral++;}
          }
        }  

        fputs($writing, date("M")."|"."@"."|".$referral."|".$direct);
	fclose($writing); rename('stats.tmp', 'stats.txt');
        echo '<center><h2>Auto Clean Done - <a href="?mode=main">Home</a></h2></center>';

      }


      //Ranking
      if($mode == "your_rank"){

        //Set variables
        $i = 0;
        $counter = 0;
        $backlinks = 0;
        $date = date("j");
        $month = date("M");

        $lines2 = file('stats.txt'); $lines = array_reverse(array_unique($lines2));

        //Add Compress Data
        if (strpos(strtolower($lines[count($lines)-1]), strtolower("@")) !== false){
          $c_data = explode("|",$lines[count($lines)-1]);
          if($c_data[0] == date("M")){$direct = $direct + $c_data[2]; $referral = $referral + $c_data[3]; $counter = ($referral + $direct); $i++;}
        }

        for($sc = $i; $sc < count($lines); next($lines), $sc++){
            
          $data = explode("|",$lines[$sc]); // Get Data

            if ((strpos(strtolower($data[3]), strtolower($domain)) !== false) || (strlen($data[2]) < 7)){

              //Make Counter
              if (strpos(strtolower($data[0]), strtolower($month)) !== false){$counter++;}

              //Get Back Links
              $referral_array[$sc] = $data[2];
            
            }

        }

        //Traffic 
        $backlinks = count(array_unique($referral_array));

        //Show Ranking
	echo '<div class="rankpage" id="rankpage" style="color: black; opacity: 0.95; background-color:white; position: absolute; left: 50%; top: 50%; margin-right: -50%; transform: translate(-50%, -50%); padding: 10px; width: 50%; word-wrap: break-word;">';
	echo '<center>';
	echo '<h1><a href="http://supremesearch.net/ranking_analytics.php" title="Get Ranking For Your Site">Supreme Traffic Ranking</a></h1>';
	echo '<h2><a href="http://'.$_SERVER['HTTP_HOST'].'" title="Visit Website">'.ucfirst($domain).'</a></h2>';
        echo "<b><big><span title='Estimates are based on traffic patterns and stats logs'>Estimated Traffic for: ".$month."</span>";
        echo "<h1><a href='?mode=main' title='View More'>".number_format($counter)." Visits</a></h1>";
        echo "<span title='Sites that link to this site, updates every 15 mins'>".number_format($backlinks)." Sites Linking In</span></big></b>";
	echo '</center>';
	echo '</div>';

	echo '<style>';
	echo '#rankpage a:link { color: black; }';
	echo '#rankpage a:visited { color: black; }';
	echo '#rankpage a:hover { color: gray; }';
	echo '#rankpage span:hover { color: gray; }';
	echo '#rankpage a:active { color: black; }';
	echo '#rankpage a {color: black;}';
 	echo '#rankpage{border-radius: 25px;}';
	echo 'html,';
	echo 'body {';
	echo '   background-image: url("bg1.jpg");';
	echo '   scrollbar-base-color: black;';
	echo '   background-repeat: repeat; cursor: default;';
	echo '   overflow-x: hidden; overflow-y: hidden;';
	echo '}';
	echo '</style>';
	echo '<script>';
	echo 'setTimeout(function() {';
	echo 'location.reload();';
	echo '}, 900000);';
	echo '</script>';
      }


    }else{echo "No Logs Yet...</table></center>"; exit;}


    //Cleanup Button
    if($admin == "on"){

	echo '<script>';

	  echo 'function Cleanup() {';
  	    echo 'var r = confirm("Are you sure?");';
  	    echo 'if (r == true) {';
    	      echo 'window.location.href = "?mode=cleanup";';
  	     echo '}';
          echo '}';

        echo '</script>';

    }

?>

</table>
</center>
</body>
</html>