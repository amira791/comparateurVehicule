<?php
require_once('../../vue/userVue/marqueVue.php');

$vue = new marqueVue();
$vue->show_website();

$router = new marqueRouter();

if (isset($_GET['id_mrq'])) {
    // Get the id_mrq value from the URL
    $id_mrq = $_GET['id_mrq'];
    $id = $id_mrq;
    $router->show_details($id);

    // Now you can use $id_mrq as needed, for example, display it
    echo '<h1>Selected Marque ID: ' . htmlspecialchars($id_mrq) . '</h1>';
} else {
    // Handle the case when id_mrq is not present in the URL
    echo '<h1>No Marque ID specified</h1>';
}


class marqueRouter 
{
    public function show_details($id) {
        $marqueVue = new marqueVue();
        $marqueVue->show_details_marque($id);
    }
}
?>
