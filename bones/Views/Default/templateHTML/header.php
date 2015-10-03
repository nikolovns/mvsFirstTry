<!DOCTYPE html>
<?php /** @var \Models\PageModel $value */; ?>
  
<html>
    <head>
        <title>CMS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style>
main {min-height: 500px;}
</style>
        
    </head>
    <body>
        <div class="container">
            <header>
                <nav class="navbar navbar-default">
                    <ul class="nav navbar-nav">
                        <?php foreach ($this->page as $key => $value): ?>
                            <li> 
                                <a  class="btn" href="<?php echo $this->url('home', 'index', [$value->getSlug()]); ?>">
                                    <?php echo $this->escape($value->getSlug()); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                            <li>
                                <a class="btn" href="<?php echo $this->url('user', 'index'); ?>">Login</a>
                            </li>
                    </ul>
                </nav>
            </header>
            
            <main>
                <div class="jumbotron col-md-12 ">
                    <h2>WELCOME to my CMS </h2>
                </div>
                
                
                    
                
            
