<div class="row" id="AccueilBg">
    <div class="col-md-1">
        <?php echo $this->Html->image('lampion.gif'); ?>
    </div>

    <div class='col-md-10'>
        <h1 class="centered" id="AccueilTitle">
            Bienvenue dans la ninja arena !
        </h1>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php echo $this->Html->image('page0.gif', array(
                        'class' => 'img-responsive centeredimg',
                        'alt' => 'page0' )); ?>

                    <div class="carousel-caption legendeslide">
                    </div>
                </div>

                <div class="item">
                    <?php echo $this->Html->image('page1.gif', array(
                        'class' => 'img-responsive centeredimg',
                        'alt' => 'page1' )); ?>
                    <div class="carousel-caption legendeslide">
                        1
                    </div>
                </div>

                <div class="item">
                    <?php echo $this->Html->image('page2.gif', array(
                        'class' => 'img-responsive centeredimg',
                        'alt' => 'page2' )); ?>

                    <div class="carousel-caption legendeslide">
                        2
                    </div>
                </div>


                <div class="item">
                    <?php echo $this->Html->image('page3.gif', array(
                        'class' => 'img-responsive centeredimg',
                        'alt' => 'page3' )); ?>

                    <div class="carousel-caption legendeslide">
                        3
                    </div>
                </div>

                <div class="item">
                    <?php echo $this->Html->image('page4.gif', array(
                        'class' => 'img-responsive centeredimg',
                        'alt' => 'page4' )); ?>

                    <div class="carousel-caption legendeslide">
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="col-md-1">
        <?php echo $this->Html->image('lampion.gif'); ?>
    </div>
    </div>

<?php echo $this->Html->media('epic.mp3', array('autoplay')); ?>