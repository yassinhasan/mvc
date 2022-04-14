    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php 
        if(!empty($links["css"])) :
            foreach ($links["css"] as $link) :
               echo  "<link href='".CSS_PATH.$link.".css?11 ' rel='stylesheet'> " ;
            endforeach;
        endif;
    ?>
