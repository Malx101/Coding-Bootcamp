<?php 

function card($title, $image, $content){
    echo '<div class="card hoverable medium universal__card-view">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator universal__card-image" src="'.$image.'">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">'.$title.'<i class="material-icons right">more_vert</i></span>
      <button class="btn waves-effect waves-light" type="button" name="action">Purchase
        <i class="material-icons right">payment</i>
      </button>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Info<i class="material-icons right">close</i></span>
      <p class="universal__card-text">'.$content.'</p>
    </div>
  </div>';
}
?>