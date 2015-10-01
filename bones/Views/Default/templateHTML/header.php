<!DOCTYPE html>
<?php /** @var \Models\PageModel $value */ ;?>
<html>
    <head>
        <title>CMS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav>
            
            <ul>
                <?php foreach ($this->page as $key => $value):?>
                <li> 
                    <a href="<?php echo $this->url('home', 'page', [$value->getSlug()]) ;?>">
                        <?php echo $value->getSlug() ;?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            
        </nav>
        <h1>WELCOME to my CMS </h1>
        <div>