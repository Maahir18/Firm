<?php
/*
 * Template Name: Good to Be Bad
 * Description: A Page Template with a darker design.
 */

//Then to display the results, we will decode the JSON returned from the API.  This will give us an array of objects which we will loop through and populate into a grid.  In the example I used custom classes to define the grid. You don’t need that if your site uses bootstrap or another responsive UI framework.  The final page template file will look like this (again replace the x’s with your API key):

//<?php
/*
Template Name: Latest Netflix Releases
Description: this is a custom page template which will use a third party API
  to pull a list of up to 100 items released on Netflix within the last 7 days.
*/
//This is used to tell the API what we want to retrieve
// $lastWeek = date("Y-m-d",time()-(24*3600*7));
//Show the header of your WordPress site so the page does not look out of place
get_header();
// 
            $url = 'https://api.publicapis.org/entries';
            $arguments = array(
                'method' => 'GET',
            );

            $response = wp_remote_get($url, $arguments);

            if(is_wp_error($response)){
                $error_message = $response->get_error_message();
                echo 'Wrong';
            }

            $results = json_decode(wp_remote_retrieve_body($response));
            $results = $results->entries;

            $html = '';
            $html .= '<div class="top-content">';
            $html .= '<div class="container-fluid">';
            $html .= '<div id="carousel-example" class="carousel slide" data-ride="carousel">';
            $html .= '<div class="carousel-inner row w-100 mx-auto" role="listbox">';
            $i=0;
            foreach( $results as $result => $i_value){
              if($i == 0) {
                  $activeClass = 'active';
                }
                else {
                  $activeClass = '';
                }
              $html .= '<div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-3 '.$activeClass.'">';
              $html .= '<img src= "https://i.picsum.photos/id/0/300/180.jpg?hmac=_3gnK7IIm3bRbABtTJh41u27cpANFCexVXzR32STMeg" class="img-fluid mx-auto d-block" alt="img1"/>';
              $html .= '<div><span>'.$i_value->API.'</span></div>';
              $html .= '<div><span>'.$i_value->Description.'</span></div>';
              $html .= '<div><span>'.$i_value->Auth.'</span></div>';
              $html .= '<div><span>'.$i_value->HTTPS.'</span></div>';
              $html .= '<div><span>'.$i_value->Cors.'</span></div>';
              $html .= '<div><a href="https://achimo.in" target="_blank"><input type="button" value="'.$i_value->API.'"/></a></div>';
              $html .= '</div>';
              $i++;
            }

            $html .= '</div>';
            $html .= '<a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">';
            $html .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            $html .= '<span class="sr-only">Previous</span>';
            $html .= '</a>';
            $html .= '<a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">';
            $html .= '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
            $html .= '<span class="sr-only">Next</span>';
            $html .= '</a>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '</div>';
            echo $html;
            //include(ABSPATH . 'wp-content/plugins/page-templater-master/index.html');


           get_footer();
            // $table .= '<div class="container multi">';
            // $table .= '<h2 class="titles"><span class="pull-right">Type-1</span> Bootstrap 3 Multiple Slide Carousel</h2>';
            // $table .= '<div class="row">';
            // $table .= '<div class="carousel slide" id="myCarousel">';
            // $table .= '<div class="carousel-inner">';
            // $table .= '<div class="item active">';
            // $table .= '<div class="col-xs-3"><a href="#">';
            // $table .= '<img src="http://placehold.it/500/e499e4/fff&amp;text=1" class="img-responsive"></a></div></div>';
            // $table .= '<div class="item"';
            // $table .= '<div class="col-xs-3"><a href="#">
            //           <img src="http://placehold.it/500/e477e4/fff&amp;text=2" class="img-responsive"></a></div>
            //           </div>
            //         <div class="item">
            //           <div class="col-xs-3"><a href="#"><img src="http://placehold.it/500/eeeeee&amp;text=3" class="img-responsive"></a></div>
            //         </div>
            //         <div class="item">
            //           <div class="col-xs-3"><a href="#"><img src="http://placehold.it/500/f4f4f4&amp;text=4" class="img-responsive"></a></div>
            //         </div>
            //         <div class="item">
            //           <div class="col-xs-3"><a href="#"><img src="http://placehold.it/500/f566f5/333&amp;text=5" class="img-responsive"></a></div>
            //         </div>
            //         <div class="item">
            //           <div class="col-xs-3"><a href="#"><img src="http://placehold.it/500/f477f4/fff&amp;text=6" class="img-responsive"></a></div>
            //         </div>
            //         <div class="item">
            //           <div class="col-xs-3"><a href="#"><img src="http://placehold.it/500/eeeeee&amp;text=7" class="img-responsive"></a></div>
            //         </div>
            //         <div class="item">
            //           <div class="col-xs-3"><a href="#"><img src="http://placehold.it/500/fcfcfc/333&amp;text=8" class="img-responsive"></a></div>
            //         </div>
            //         </div>
            //         <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
            //         <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            //         </div>
            //       </div>
            //     </div>';

            // foreach( $results as $result => $i_value){
            // $table .= '<tr>';
            // $table .= '<td>'. $i_value->API.'</td>';
            // $table .= '<td>'. $i_value->Description.'</td>';
            // $table .= '<td>'.$i_value->Auth.'</td>';
            // $table .= '<td>'.$i_value->HTTPS.'</td>';
            // $table .= '<td>'.$i_value->Cors.'</td>';
            // $table .= '<td>'.$i_value->Link.'</td>';
            // $html .= '<td>'.$i_value->Category.'</td>';
            // $table .= '<tr/>';
            // }
            // $table .= '</table>';

            // echo $table;
    


//       $curl = curl_init();
//       curl_setopt_array($curl, array(
//         CURLOPT_URL => "https://unogsng.p.rapidapi.com/search?newdate=$lastWeek&orderby=date&audio=english",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => array(
//           "x-rapidapi-host: unogsng.p.rapidapi.com",
//           "x-rapidapi-key: xxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
//         ),
//       ));
//       $response = curl_exec($curl);
//       $err = curl_error($curl);
//       curl_close($curl);
//       if ($err) {
//         if ($debug) echo "cURL Error #:" . $err;
//         else echo "Oops, something went wrong.  Please try again later.";
//       } else {
//         //Create an array of objects from the JSON returned by the API
//         $jsonObj = json_decode($response);
//         //Reorder the items so the newest releases are first
//         $newestReleasesFirst = array_reverse($jsonObj->results);
//         //Create a simple grid style for the listings
//         $pageCSS = "<style>
//                     .netflix-wrapper{
//                       display:grid;
//                       grid-template-columns: 200px 200px 200px;
//                     }
//                     .show-wrapper{padding:10px;}
//                     </style>";
//         //Create the WordPress page content HTML
//         $pageHTML="<h2>Netflix releases since $lastWeek (in English)</h2>";
//         $pageHTML.="<div class='netflix-wrapper'>";
//         //Loop through the API results
//         foreach($newestReleasesFirst as $showObj) {
//           //Put each show into an html structure
//           //  Note: if your theme uses bootstrap use responsive classes here
//           $pageHTML.="<div class='show-wrapper'>";
//           //Not all items have a 'poster', so in that case use the img field
//           if (!empty($showObj->poster)) $thisImg = $showObj->poster;
//           else $thisImg = $showObj->img;
//           //Show the image first to keep the top edge of the grid level
//           $pageHTML.="<img style='max-width:166px;float:left;' src='".$thisImg."' />";
//           $pageHTML.="<h3>".$showObj->title."</h3>";
//           $pageHTML.="<span>added to netflix ".$showObj->titledate."</span>";
//           $pageHTML.="<div style='float:left;'>".$showObj->synopsis."</div>";
//           $pageHTML.="</div>";
//         }
//         $pageHTML.="</div>";
//         echo $pageCSS.$pageHTML;
//       } // end of check for curl error

 
