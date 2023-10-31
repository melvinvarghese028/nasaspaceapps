


<?php
// Include the "head.php" file
include("inc/head.php");
?>
<?php include("inc/header.php"); ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<div class="hack-container">
    <h2 class="hack-title">CHALLENGES</h2>
    <div class="hackathon-image-container">
        <?php
        // Define image paths and map coordinates
        $images = [
            'images/hackathon/carouse11.png' => [
                'coords' => '100,50,200,150',
                'alt' => 'Image 1',
            ],
            'images/hackathon/carouse11.2.png' => [
                'coords' => '250,50,350,150',
                'alt' => 'Image 2',
            ],
            'images/hackathon/carousel01.png' => [
                'coords' => '400,50,500,150',
                'alt' => 'Image 3',
            ],
            'images/hackathon/carousel01.2.png' => [
                'coords' => '100,200,200,300',
                'alt' => 'Image 4',
            ],
            'images/hackathon/carousel2.png' => [
                'coords' => '250,200,350,300',
                'alt' => 'Image 5',
            ],
            'images/hackathon/carousel2.2.png' => [
                'coords' => '400,200,500,300',
                'alt' => 'Image 6',
            ],
            'images/hackathon/carousel3.png' => [
                'coords' => '100,350,200,450',
                'alt' => 'Image 7',
            ],
            'images/hackathon/carousel3.2.png' => [
                'coords' => '250,350,350,450',
                'alt' => 'Image 8',
            ],
            'images/hackathon/carousel4.png' => [
                'coords' => '400,350,500,450',
                'alt' => 'Image 9',
            ],
            'images/hackathon/carousel4.2.png' => [
                'coords' => '100,500,200,600',
                'alt' => 'Image 10',
            ],
            'images/hackathon/carousel5.png' => [
                'coords' => '250,500,350,600',
                'alt' => 'Image 11',
            ],
            'images/hackathon/carousel5.2.png' => [
                'coords' => '400,500,500,600',
                'alt' => 'Image 12',
            ],
            'images/hackathon/carousel6.1.png' => [
                'coords' => '100,650,200,750',
                'alt' => 'Image 13',
            ],
            'images/hackathon/carousel6.2.png' => [
                'coords' => '250,650,350,750',
                'alt' => 'Image 14',
            ],
            'images/hackathon/carousel07.png' => [
                'coords' => '400,650,500,750',
                'alt' => 'Image 15',
            ],
            'images/hackathon/carousel07.2.png' => [
                'coords' => '100,800,100,900',
                'alt' => 'Image 16',
            ],
            'images/hackathon/carousel8.png' => [
                'coords' => '250,800,350,900',
                'alt' => 'Image 17',
            ],
            'images/hackathon/carousel8-1.png' => [
                'coords' => '400,800,500,900',
                'alt' => 'Image 18',
            ],
            'images/hackathon/carousel9.png' => [
                'coords' => '100,950,200,1050',
                'alt' => 'Image 19',
            ],
            'images/hackathon/carousel9.2.png' => [
                'coords' => '250,950,350,1050',
                'alt' => 'Image 20',
            ],
            'images/hackathon/carousel10.png' => [
                'coords' => '400,950,500,1050',
                'alt' => 'Image 21',
            ],
            'images/hackathon/carousel10.2.png' => [
                'coords' => '100,1100,200,1200',
                'alt' => 'Image 22',
            ],
            'images/hackathon/carousel12.png' => [
                'coords' => '250,1100,350,1200',
                'alt' => 'Image 23',
            ],
            'images/hackathon/carousel12.2.png' => [
                'coords' => '400,1100,500,1200',
                'alt' => 'Image 24',
            ],
            'images/hackathon/carousel13.png' => [
                'coords' => '100,1250,200,1350',
                'alt' => 'Image 25',
            ],
            'images/hackathon/carousel13.2.png' => [
                'coords' => '250,1250,350,1350',
                'alt' => 'Image 26',
            ],
            'images/hackathon/carousel14.png' => [
                'coords' => '400,1250,500,1350',
                'alt' => 'Image 27',
            ],
            'images/hackathon/carousel14.2.png' => [
                'coords' => '100,1400,200,1500',
                'alt' => 'Image 28',
            ],
            'images/hackathon/carousel15.png' => [
                'coords' => '250,1400,350,1500',
                'alt' => 'Image 29',
            ],
            'images/hackathon/carousel15.2.png' => [
                'coords' => '400,1400,500,1500',
                'alt' => 'Image 30',
            ],
            'images/hackathon/carousel16.png' => [
                'coords' => '100,1550,200,1650',
                'alt' => 'Image 31',
            ],
            'images/hackathon/carousel16.2.png' => [
                'coords' => '250,1550,350,1650',
                'alt' => 'Image 32',
            ],
            'images/hackathon/carousel17.png' => [
                'coords' => '400,1550,500,1650',
                'alt' => 'Image 33',
            ],
            'images/hackathon/carousel17.2.png' => [
                'coords' => '100,1700,200,1800',
                'alt' => 'Image 34',
            ],
            'images/hackathon/carousel18.png' => [
                'coords' => '250,1700,350,1800',
                'alt' => 'Image 35',
            ],
            'images/hackathon/carousel18.2.png' => [
                'coords' => '400,1700,500,1800',
                'alt' => 'Image 36',
            ],
            'images/hackathon/carousel19.png' => [
                'coords' => '100,1850,200,1950',
                'alt' => 'Image 37',
            ],
            'images/hackathon/carousel19.2.png' => [
                'coords' => '250,1850,350,1950',
                'alt' => 'Image 38',
            ],
            'images/hackathon/carousel20.png' => [
                'coords' => '400,1850,500,1950',
                'alt' => 'Image 39',
            ],
            'images/hackathon/carousel20.2.png' => [
                'coords' => '100,2000,200,3000',
                'alt' => 'Image 40',
            ],
            'images/hackathon/carousel21.png' => [
                'coords' => '250,2000,350,3000',
                'alt' => 'Image 41',
            ],
            'images/hackathon/carousel21.2.png' => [
                'coords' => '400,2000,500,3000',
                'alt' => 'Image 42',
            ],
            'images/hackathon/carousel22.png' => [
                'coords' => '100,2150,200,3150',
                'alt' => 'Image 43',
            ],
            'images/hackathon/carousel22.2.png' => [
                'coords' => '250,2150,350,3150',
                'alt' => 'Image 44',
            ],
            'images/hackathon/carousel23.png' => [
                'coords' => '400,2150,500,3150',
                'alt' => 'Image 45',
            ],
            'images/hackathon/carousel23.2.png' => [
                'coords' => '100,2300,200,3300',
                'alt' => 'Image 46',
            ],
            'images/hackathon/carousel24.png' => [
                'coords' => '250,2300,350,3300',
                'alt' => 'Image 47',
            ],
            'images/hackathon/carousel24.2.png' => [
                'coords' => '400,2300,500,3300',
                'alt' => 'Image 48',
            ],
            'images/hackathon/carousel25.png' => [
                'coords' => '100,2450,200,3450',
                'alt' => 'Image 49',
            ],
            'images/hackathon/carousel25.2.png' => [
                'coords' => '250,2450,350,3450',
                'alt' => 'Image 50',
            ],
            'images/hackathon/carousel26.png' => [
                'coords' => '400,2450,500,3450',
                'alt' => 'Image 51',
            ],
            'images/hackathon/carousel26.2.png' => [
                'coords' => '100,2600,200,3600',
                'alt' => 'Image 52',
            ],
            'images/hackathon/carousel27.png' => [
                'coords' => '250,2600,350,3600',
                'alt' => 'Image 53',
            ],
            'images/hackathon/carousel27.2.png' => [
                'coords' => '400,2600,500,3600',
                'alt' => 'Image 54',
            ],
            'images/hackathon/carousel28.png' => [
                'coords' => '100,2750,200,3750',
                'alt' => 'Image 55',
            ],
            'images/hackathon/carousel28.2.png' => [
                'coords' => '250,2750,350,3750',
                'alt' => 'Image 56',
            ],
            'images/hackathon/carousel29.png' => [
                'coords' => '400,2750,500,3750',
                'alt' => 'Image 57',
            ],
            'images/hackathon/carousel29.2.png' => [
                'coords' => '100,2900,200,3900',
                'alt' => 'Image 58',
            ],
            'images/hackathon/carousel30.png' => [
                'coords' => '250,2900,350,3900',
                'alt' => 'Image 59',
            ],
            'images/hackathon/carousel30.2.png' => [
                'coords' => '400,2900,500,3900',
                'alt' => 'Image 60',
            ],
            'images/hackathon/carousel31.png' => [
                'coords' => '100,3050,350,4050',
                'alt' => 'Image 61',
            ],
        ];
        // Generate unique class names for each image
        $index = 1;
        ?>

        <?php foreach ($images as $image => $data): ?>
            <img src="<?php echo $image; ?>" usemap="#<?php echo str_replace('.', '', $image); ?>" alt="<?php echo $data['alt']; ?>" class="hackathon-image">
            <!-- <map name="<?php echo str_replace('.', '', $image); ?>"> -->
                <!-- <area shape="rect" coords="<?php echo $data['coords']; ?>" href="javascript:void(0);" onclick="alert('<?php echo $data['alt']; ?> clicked');"> -->
            <!-- </map> -->
        <?php endforeach; ?>
    </div>
<div>

<?php
// Include the "footer.php" file
include("inc/footer.php");
?>
