<?php
/** @var \app\entity\Tour[] $data */
$data = $data ?? [];
?>

<link rel="stylesheet" href="static/styles/css/index.css?v=<?= rand() ?>" type="text/css">

<div id="index-adv">
    <div id="index-adv-parallax">
        <div id="index-adv-primary-text">
            Red2Green is the most comfortable and cheap service in Solar system <br>
            We are glad to invite you to Earth
        </div>
    </div>
</div>

<div class="container">
	
	<?php foreach ($data as $tour): ?>

        <div class="tour">
            <div class="row">
                <div class="col-7">
                    <img class="tour-img" src="storage/<?= $tour->src_main_image ?>" alt="tour img">
                </div>
                <div class="col-5">
                    <div class="tour-header">
						<?= $tour->name; ?>
                    </div>
                    <div class="tour-description">
                        <p>
							<?= $tour->short_description; ?>
                        </p>
                    </div>

                    <div class="tour-order">
                        <div class="btn-group">

                            <a class="btn btn-success" href="/order/<?= $tour->link ?>">
                                Order a tour
                            </a>
                            
                            <a class="btn btn-secondary" href="/tour/<?= $tour->link ?>">
                                More info
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
	
	<?php endforeach; ?>
</div>