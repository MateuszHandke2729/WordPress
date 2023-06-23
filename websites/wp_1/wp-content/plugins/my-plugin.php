<?php
/*
Plugin Name: Mój Plugin
Plugin URI: http://mateusz2729.atthost24.pl/
Description: Plugin generujący menu
Version: 1.0
Author: Mateusz Handke
*/

add_action('wp', 'my_database_plugin_init');

function my_database_plugin_init() {

    if (isset($_POST['submit'])) {
    $opcja = $_POST['formularz'];
    if ($opcja === '800') {
        $liczbaKcal = 800;
    }
    else if ($opcja === '1200') {
        $liczbaKcal = 1200;
    } 
    else if ($opcja === '1500') {
        $liczbaKcal = 1500;
    }
    
        global $wpdb;

            $table_name = $wpdb->prefix . 'dania'; 
            $results = $wpdb->get_results("SELECT * FROM $table_name");
            do
            {
            $query = $wpdb->get_results("SELECT * FROM $table_name WHERE typ='śniadanie' ORDER BY RAND() LIMIT 1");          
            $query2 = $wpdb->get_results("SELECT * FROM $table_name WHERE typ='obiad' ORDER BY RAND() LIMIT 1");
            $query3 = $wpdb->get_results("SELECT * FROM $table_name WHERE typ='kolacja' ORDER BY RAND() LIMIT 1");

             foreach ($query as $result2) {
                $result2->id;
                $result2->nazwa;
                $result2->typ;
                $result2->kcal;
            }
            $kcalNaSniadanie = $result2->kcal;  

            foreach ($query2 as $result3) {
                $result3->id;
                $result3->nazwa;
                $result3->typ;
                $result3->kcal;                
            } 
            $kcalNaObiad = $result3->kcal;  

              foreach ($query3 as $result4) {
                $result4->id;
                $result4->nazwa;
                $result4->typ;
                $result4->kcal;
            }
            $kcalNaKolacje = $result4->kcal;

            $suma = $kcalNaSniadanie+$kcalNaObiad+$kcalNaKolacje;

            }while($suma<$liczbaKcal-90 || $suma>$liczbaKcal+90);

            echo '<br>';
            echo '<h2>&nbspTwoje menu:</h2>';
            echo '<table>';
            echo '&nbsp<b>&nbspIlość kalorii: '.$liczbaKcal;
            echo '<tr><th><b>Nazwa dania</b></th><th><b>Typ</b></th><th><b>Kcal</b></th></tr>';
            
            foreach ($query as $result2) {
                echo '<tr>';
                echo '<td>' . $result2->nazwa . '</td>';
                echo '<td>' . $result2->typ . '</td>';
                echo '<td>' . $result2->kcal . '</td>';
                echo '</tr>';
            }
            
            foreach ($query2 as $result3) {
                echo '<tr>';
                echo '<td>' . $result3->nazwa . '</td>';
                echo '<td>' . $result3->typ . '</td>';
                echo '<td>' . $result3->kcal . '</td>';
                echo '</tr>';
            }
            
            foreach ($query3 as $result4) {
                echo '<tr>';
                echo '<td>' . $result4->nazwa . '</td>';
                echo '<td>' . $result4->typ . '</td>';
                echo '<td>' . $result4->kcal . '</td>';
                echo '</tr>';
            }
            echo '</table>';
    
    }
    else {}
    
}
?>

