<?php

add_filter("gform_pre_submission", "wm_evaluate_results");


function wm_evaluate_results($form){

    // the input number corresponds to the ID of the question
    $answer1 = $_POST["input_1"];
    $answer2 = $_POST["input_2"];
    $answer3 = $_POST["input_3"];
    $answer4 = $_POST["input_4"];
    $answer5 = $_POST["input_5"];
    $answer6 = $_POST["input_6"];
    $answer7 = $_POST["input_7"];
    $answer8 = $_POST["input_8"];

    // the keys in the characters array correspond to the URLs of the character slugs

    $characters = array(
      "strippenzieherin" => 0,
      "daten-sammlerin" => 0,
      "star-autorin" => 0,
      "kulturagentin" => 0,
      "technik-optimiererin" => 0,
      "abfrage-genie" => 0,
      "aktivistin" => 0,
      "dokumentatorin" => 0,
      "spenderin" => 0
    );

    // Switch statement used to assign weight to each answer

    $pass = false;

    switch ($answer1){
      case 1:
        $characters["star-autorin"] += 20;
        break;
      case 2:
        $characters["aktivistin"] += 10;
        $characters["kulturagentin"] += 20;
        break;
      case 4:
        $characters["daten-sammlerin"] += 40;
        break;
    }

    switch ($answer2) {
      case 1:
        $characters["aktivistin"] += 1000;
        $characters["technik-optimiererin"] += 1000;
        $characters["abfrage-genie"] += 1000;

        //Technik-Optimierer & Abfrage-Genie MUST have this answer)
        $pass = true;
        break;
      case 3:
        $characters["star-autorin"] += 50;
        break;
    }

    switch ($answer3) {
      case 1:
        $characters["aktivistin"] += 50;
        break;
      case 2:
        $characters["dokumentatorin"] += 150;
        break;
      case 3:
        $characters["strippenzieherin"] += 70;
        $characters["daten-sammlerin"] += 30;
        break;
    }

    switch ($answer4) {
      case 1:
        $characters["star-autorin"] += 30;
        break;
      case 2:
        $characters["aktivistin"] += 20;
        break;
      case 3:
        $characters["aktivistin"] += 20;
        $characters["abfrage-genie"] += 20;
        $characters["kulturagentin"] += 30;
        break;
    }

    switch ($answer5) {
      case 1:
        $characters["aktivistin"] += 20;
        $characters["daten-sammlerin"] += 30;
        $characters["abfrage-genie"] += 30;
        $characters["technik-optimiererin"] += 30;
        break;
      case 2:
        $characters["daten-sammlerin"] += 40;
        break;
      case 3:
        $characters["strippenzieherin"] += 10;
        $characters["kulturagentin"] += 20;
        $characters["aktivistin"] += 30;
        break;
    }

    switch ($answer6) {
      case 1:
        $characters["aktivistin"] += 10;
        break;
      case 2:
        $characters["technik-optimiererin"] += 10;
        break;
      case 3:
        $characters["star-autorin"] += 20;
        break;
    }

    switch ($answer7) {
      case 1:
        $characters["daten-sammlerin"] += 20;
        break;
      case 2:
        $characters["dokumentatorin"] += 10;
        $characters["kulturagentin"] += 20;
        break;
    }

    switch ($answer8) {
      case 1:
        $characters["kulturagentin"] += 70;
        break;
      case 2:
        $characters["aktivistin"] += 10;
        break;
      case 4:
        $characters["strippenzieherin"] += 30;
        $characters["aktivistin"] += 10;
        break;
    }


    /* Sort Function */
    $order = range(1,count($characters));
    array_multisort($characters, SORT_DESC, $order, SORT_ASC);

    $charactersNames = array_keys($characters);

    /* When top character is technik-optimiererin or "abfrage-genie" check if they pass Question 2
    If yes : assing them to chosen character, If no : go to the next */

    for( $i=0 ; $i<3 ; $i++ ){
      if(($charactersNames[$i] == "technik-optimiererin")||($charactersNames[$i] == "abfrage-genie")){
        if($pass == true){
          $chosenCharacter = $charactersNames[$i];
          break;
        }
      }
      else{
        $chosenCharacter = $charactersNames[$i];
        break;
      }
    }

    // Default character for points less than 10
    if ($characters[$chosenCharacter] <= 10){
      $chosenCharacter = "spenderin";
    }

    // set the value of the hidden field
    $_POST["input_9"] = $chosenCharacter;

}

add_action( 'gform_after_submission', 'wiki_redirect_after_submission' );

function wiki_redirect_after_submission( $form ) {

  $chosenCharacter = $_POST["input_9"];

  if(ICL_LANGUAGE_CODE=='en'){

    $slugs = array(
      "strippenzieherin" => "stage-manager",
      "daten-sammlerin" => "data-collector",
      "star-autorin" => "literary-star",
      "kulturagentin" => "cultural-ambassador",
      "technik-optimiererin" => "tech-optimizer",
      "abfrage-genie" => "master-of-queries",
      "aktivistin" => "activist",
      "dokumentatorin" => "documenter",
      "spenderin" => "donor"
    );

    $chosenCharacter = $slugs[$chosenCharacter];
    $url = home_url().'gang/'.$chosenCharacter;
  }
  else{
    $url = home_url().'/gang/'.$chosenCharacter;
  }

  wp_redirect( $url ); exit;
}
