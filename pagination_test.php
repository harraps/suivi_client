<!-- Ne marche pas pour un formulaire à choix multiples -->
<div class="text-center">
    <ul class="pagination pagination-sm">
        <?php
$href = "/suivi_client/?page=project_form&pnb=";
$pnb = 1;
// we check that page number (pnb) exists
// if it doesn't we create it and set its value to 1
if( isset($_GET['pnb']) ){
    $_GET['pnb'] = (int) $_GET['pnb'];

    // if pnb is smaller than 1, we set it back to 1
    if( $_GET['pnb'] <= 1 ){
        $_GET['pnb'] = 1;
        echo '<li class="disabled"><a href="#">«</a></li>';
    }else{
        echo '<li><a href="'.$href.($_GET['pnb']-1).'">«</a></li>';
        if( $_GET['pnb'] == 2 ){

        }
    }

    echo '<li class="active"><a href="'.$href.($_GET['pnb']-2).'">'.($_GET['pnb']-2).'</a></li>';
    echo '<li class="active"><a href="'.$href.($_GET['pnb']-1).'">'.($_GET['pnb']-1).'</a></li>';
    echo '<li class="active"><a href="'.$href.($_GET['pnb']  ).'">'.($_GET['pnb']  ).'</a></li>';
    echo '<li class="active"><a href="'.$href.($_GET['pnb']+1).'">'.($_GET['pnb']+1).'</a></li>';
    echo '<li class="active"><a href="'.$href.($_GET['pnb']+2).'">'.($_GET['pnb']+2).'</a></li>';


}else{
    $_GET['pnb'] = 1;
}
<li class="active"><a href="/suivi_client/?page=project_form&pnb=1">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">»</a></li>
        ?>
    </ul>
</div>