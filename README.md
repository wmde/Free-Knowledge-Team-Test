# Free Knowledge Team Test

This quiz was built using Gravity Forms, Advanced Custom Fields and WPML. The answers are multiple-choice and are always displayed in a particular order. The results are based on the answers you choose.

Preview: http://wikipedia.de/mitmachen/en/

## Setup and Deployment

### Installation

To clone and run this application, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)) installed on your computer. From your command line:

```bash
# Clone this repository into your wordpress theme folder
$ git clone https://github.com/jnds/wp-template-toolkit

# Go into the repository
$ cd wp-template-toolkit

# Install dependencies
$ npm install
```


### Usage

```bash

# Run the gulp watch task to monitor changes in the file system. As soon as you save a file, it is preprocessed as needed and the browser is refreshed

$ gulp watch

# Run the gulp build task to erase existing build and theme folders and compile the latest version

$ gulp build

```
## Required Wordpress Plugins
- acfml
- advanced custom fields preprocessed
- gravity-forms-wcag-20-form-fields
- gravityforms
- shariff
- sitepress-multilingual-cms

### How to import ACF fields
Find acf.json in the extras folder in the theme and import from the wordpress dashboard

## 1. How to create the form

-	Step 1: Create a new form or import the template form-template.json in the extras folder
-	Step 2: Each question should be added as a ‘Radio Buttons’ field. Add the question as the field name, and answers as options.
-	Step 3: Add an ID to each answer by checking the ‘show values’ checkbox and add values incrementally i.e. 1,2,3,4
-	Step 4: Make each question a required field.
-	Step 5: Choose to create a multipart form, and add a question on every section. For this, you would need to add a ‘Page Break’ field after every question.
-	Step 6: Use a hidden field to store the result. This will be used once the form is filled but before notifications are sent. Add this field at the end of the form in the last section.
-	Step 7: Add the form to your quiz page using the gravity forms shortcode.

## 2. How to Evaluate and Display Results?

### 2a. How to Evaluate Results:

To calculate the total of all selected fields and show the result based on the total we need to use the ‘gform_pre_submission’ hook. Using this hook, we can retrieve the answers, apply custom logic based on how we want or answers to be formatted and then update the hidden field value, before the form entries are saved.

See inc/gform-quiz.php

Since we have assigned an ID to each field, we can then assign custom values in the function that is fired when the hook is called. In the $_POST variable, the key for each field would be input_{field_id}. For example, for field id 4, the value would be $_POST[“input_4”];

Next we define an array of characters and assign there initial score as 0. To identify each character we use the slug from the characters url. The page will redirect to this URL depending on the outcome of the quiz.

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

Depending on which answer is chosen we can assign a different value to each character. In order to assign points to each character we use a switch condition with cases 1,2,3,4 corresponding to the answer for each question.

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
    }    switch ($answer2){
	…
    }

Once the points have been assigned we use the array_multisort function to determine the top answer. We can assign additional logic here
the keys in the characters array correspond to the URLs of the character slugs

    $order = range(1,count($characters));
    array_multisort($characters, SORT_DESC, $order, SORT_ASC);

We can also add additional logic here:

E.g. 1 When top character is technik-optimiererin or "abfrage-genie" check if they pass Question 2. If yes : assing them to chosen character, If no : go to the next

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

E.g. 2 Default character for points less than 10

     if ($characters[$chosenCharacter] <= 10){
        $chosenCharacter = "spenderin";
     }


Finally set the value of the hidden field

     $_POST["input_9"] = $chosenCharacter;


### 2b. How to Display Results:

Next we use the gform_after_submission hook to redirect to the page of the chosen character. We can also use the ICL_LANGUAGE_CODE option to map the the original URLs to different languages

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

## Contributing

If you found a bug, would like to contribute ideas or code or are interested in bringing the Free Knowledge Team Test to another Wikipedia feel free to initiate a pull request to this repo.

Please use the discussion page in Wikipedia to get in contact with the makers of this project.

## License

The version developed in this repository is licensed under Modified BSD License.
