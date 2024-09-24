<footer class="paddingX">
    <?php $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'tpls/contact.php'
    ));
    $contactID = $pages[0]->ID;
    if ($contactID) : ?>
        <div class="footer_info">
        <?php if (have_rows('branches', $contactID)): ?>
            <div class="branches">
            <?php while (have_rows('branches', $contactID)):
                the_row();
                $address = get_sub_field('address'); ?>
                <div class="branch">
                <?php $phone = get_sub_field('phone_number');
                $i++;
                if ($phone):?>
                    <a href="tel:<?php echo str_replace(' ', '', $phone); ?>" class="number"><?php echo $phone; ?></a>
                <?php endif;
                if ($address):
                    $location = get_sub_field('location'); ?>
                    <<?php echo $location ? 'a href="https://www.google.com/maps/dir/?api=1&destination=' . $location['lat'] . ',' . $location['lng'] . '" target="_blank"' : 'div'; ?>
                    class="address"><?php echo $address; ?></<?php echo $location ? 'a' : 'div'; ?>>
                <?php endif; ?>
                </div>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
            <div class="email">
            <?php $Email = antispambot(get_field('email', $contactID));
            if ($Email):?>
                <a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?></a>
            <?php endif; ?>
            <?php if (have_rows('social_media', 'option')): ?>
                <div class="social-media-wrapper">
                    <?php while (have_rows('social_media', 'option')):the_row();
                        $link = get_sub_field('link'); ?>
                        <a href="<?php echo $link ?>" target="_blank"
                           aria-label="<?php echo get_bloginfo('name') . get_sub_field('icon'); ?>"><span
                                class="<?php echo get_sub_field('icon'); ?>" aria-hidden="true"></span></a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        </div>
        <?php wp_reset_postdata();
    endif;
    $ImageLogo = get_field('logo', 'option'); ?>
    <div class="footer_logo">
        <img
            src="<?php echo $ImageLogo ? $ImageLogo['sizes']['medium'] : get_template_directory_uri() . '/assets/img/logo.png'; ?>"
            alt="site-logo">
    </div>
    <div class="footer_copyRight">
        <span class="rights">© Dorr <?php echo date('Y'); ?></span>
        <span class="dokmeh">by <a href="https://hidokmeh.com" <?php if(!is_front_page()){echo ' rel="nofollow" ';}?> target="_blank">Dokmeh</a></span>
    </div>
</footer>
<div id="cursor">
    <div id="horizontal" class="simultaneous no-mouse">
        <div class="hbar" style="border: 1px solid #000000; height: 0.01px;  transform: translate(1254px, 50px);">
        </div>
    </div>
    <!-- These objects' animations will be staggered. -->
    <div id="vertical" class="simultaneous no-mouse">
        <div class="hbar" style="border: 1px solid #000000; width: 0.01px;  transform: translate(1254px, 50px);">
        </div>
    </div>
    <div class="coordinate-box">
        <div id="coordinate-x" class="simultaneousC">
            <span></span>
            <span>x:</span>
        </div>
        <div id="coordinate-y" class="simultaneousC">
            <span></span>
            <span>y:</span>
        </div>
        <div class="coordinate-square"></div>
        <div class="coordinate-line"></div>
        <div class="coordinate-line"></div>
    </div>
</div>
<div class="router-overlay"></div>
<?php if (is_archive(array('rethink', 'projects')) or is_singular('projects') or is_home()) : ?>
    <script src='<?php ThemeAssets('js/jQuery.min.js'); ?>'></script>
<?php endif; ?>
<script defer src='<?php ThemeAssets('js/index.min.js'); ?>'></script>
<!--- ------------------------ -->
<?php if (is_singular('projects') or is_page_template('tpls/about.php')): ?>
    <script defer src="<?php ThemeAssets('js/simple-lightbox.min.js'); ?>"></script>
<?php endif; ?>
<?php if (is_archive(array('rethink', 'projects'))): ?>
    <script defer src="<?php ThemeAssets('js/isotope.pkgd.min.js'); ?>"></script>
<?php endif; ?>
<?php if (is_singular('post') or is_home()): ?>
    <script defer src='<?php ThemeAssets('js/lazysizes.min.js'); ?>'></script>
<?php endif; ?>
<?php if (is_singular('projects')): ?>
    <?php $range_chart = get_field('project_range');
    if ($range_chart):?>
        <script>
            // plot the statistics for two arbitrary pokemon
            const data = [
                {
                    name: "espeon",
                    // color: "hsl(325, 40%, 60%)",
                    color: "#006039",
                    stats: {
                        hp: <?php echo $range_chart[0]['data'];?>,
                        attack: <?php echo $range_chart[1]['data'];?>,
                        defense: <?php echo $range_chart[2]['data'];?>,
                        specialAttack: <?php echo $range_chart[3]['data'];?>,
                        specialDefense: <?php echo $range_chart[4]['data'];?>,
                        speed: <?php echo $range_chart[5]['data'];?>
                    }
                },
            ];
            // aliases to describe the stats
            const alias = {
                hp: "<?php echo $range_chart[0]['title'];?>",
                attack: "<?php echo $range_chart[1]['title'];?>",
                defense: "<?php echo $range_chart[2]['title'];?>",
                specialAttack: "<?php echo $range_chart[3]['title'];?>",
                specialDefense: "<?php echo $range_chart[4]['title'];?>",
                speed: "<?php echo $range_chart[5]['title'];?>"
            };
        </script>
        <script defer src='<?php ThemeAssets('js/radarChart.min.js'); ?>'></script>
        <script defer src="<?php ThemeAssets('js/radar.min.js'); ?>"></script>
    <?php endif; ?>
    <script defer src="<?php ThemeAssets('js/page-scripts/single-project.min.js'); ?>"></script>
<?php endif; ?>
<script defer src='<?php ThemeAssets('js/menu.min.js'); ?>'></script>
<?php if (is_front_page()): ?>
    <script defer src='<?php ThemeAssets('js/lazysizes.min.js'); ?>'></script>
    <script defer src='<?php ThemeAssets('js/page-scripts/home.min.js'); ?>'></script>
<?php endif; ?>
<?php if (is_page_template('tpls/about.php')): ?>
    <script defer src='<?php ThemeAssets('js/lazysizes.min.js'); ?>'></script>
    <script defer src="<?php ThemeAssets('js/swiper-bundle.min.js'); ?>"></script>
    <script defer src="<?php ThemeAssets('js/page-scripts/about.min.js'); ?>"></script>
<?php endif; ?>

<?php if (is_page_template('tpls/contact.php')): ?>
    <script defer src='<?php ThemeAssets('js/page-scripts/contact.min.js'); ?>'></script>
<?php endif; ?>
<?php if (is_home()): ?>
    <script defer src="<?php ThemeAssets('js/page-scripts/news.min.js'); ?>"></script>
<?php endif; ?>

<?php if (is_post_type_archive('projects')): ?>
    <script defer src='<?php ThemeAssets('js/page-scripts/project.min.js'); ?>'></script>
<?php endif; ?>

<?php if (is_post_type_archive('rethink')): ?>
    <script defer src='<?php ThemeAssets('js/page-scripts/rethink.min.js'); ?>'></script>
<?php endif; ?>
<?php wp_footer(); ?>

<?php if (is_singular('single-projects.php')): ?>

<?php endif; ?>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        setTimeout(function () {
            document.querySelector('header').style.opacity = '1';
            document.querySelector('main').style.opacity = '1';
            document.getElementById('menu-container').style.display = 'flex';
            <?php if(is_front_page() or is_page_template('tpls/contact.php')):?>
            document.querySelector('#modal').style.display = 'block';
            <?php endif; ?>
        }, 500)
    });
</script>
<?php if (is_singular('projects')): ?>
    <!--    <script>-->
    <!--        window.onload = function () {-->
    <!--            loadScript('path/to/your/script.js', function () {-->
    <!--                // Script loaded and executed, you can now use its functions or variables-->
    <!--                // Place your code here that relies on the loaded script-->
    <!--            });-->
    <!--        };-->
    <!---->
    <!--        function loadScript(url, callback) {-->
    <!--            var script = document.createElement('script');-->
    <!--            script.type = 'text/javascript';-->
    <!---->
    <!--            script.onload = function () {-->
    <!--                if (typeof callback === 'function') {-->
    <!--                    callback();-->
    <!--                }-->
    <!--            };-->
    <!---->
    <!--            script.src = url;-->
    <!---->
    <!--            document.body.appendChild(script);-->
    <!--        }-->
    <!--    </script>-->
<?php endif; ?>
<?php if (is_archive('project') or is_page_template('tpls/contact.php')):
    if ($locationsArray):?>
        <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGSjuazfR5jJ4HLuqJ2DmyGkZR766ayRI"></script>
        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
            var map;
            var infowindow;
            var marker = new Array();
            var i;
            var mapOptions;
            var mapElement;
            var StayleMap = [
                {
                    "featureType": "all",
                    "elementType": "all",
                    "stylers": [
                        {
                            "hue": "#00ffbc"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#db2424"
                        }
                    ]
                },
                {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#efefef"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -70
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "saturation": "-51"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        },
                        {
                            "saturation": -60
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#00aa7f"
                        },
                        {
                            "lightness": "0"
                        },
                        {
                            "saturation": "0"
                        },
                        {
                            "gamma": "1"
                        },
                        {
                            "weight": "0.01"
                        }
                    ]
                }
            ]
            <?php if( is_archive('project')):?> //archive project
            var project_location = [
                <?php foreach ($locationsArray as $Data): ?>
                ['<h3 class="info-window-header"><?php echo $Data[0];?></h3>', '<a href ="<?php echo $Data[3];?>" ><span><?php _e('view project', 'dokmeh');?></span></a>', <?php echo $Data[1]['lat'];?>, <?php echo $Data[1]['lng'];?>, '<img src="<?php echo $Data[2]; ?>">', '<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $Data[1]['lat'] . "," . $Data[1]['lng'];?>" target="_blank"><?php _e('Get Direction...', 'dokmeh')?></a>'],
                <?php endforeach; ?>
            ];

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var image = new google.maps.MarkerImage("<?php ThemeAssets('img/pin.png');?>");
                mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 9,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(35.6892, 51.3890), // Tehran 35.6892° N, 51.3890° E
                    zoomControl: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false,
                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: StayleMap
                };


                mapElement = document.getElementById('map');

                map = new google.maps.Map(mapElement, mapOptions);
                // Let's also add a marker while we're at it
                infowindow = new google.maps.InfoWindow();
                for (i = 0; i < project_location.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(project_location[i][2], project_location[i][3]),
                        map: map,
                        icon: image,
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(project_location[i][4] + project_location[i][0] + project_location[i][1] + project_location[i][5]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }

            <?php else:?> //contact
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var image = new google.maps.MarkerImage("<?php ThemeAssets('img/pin.png');?>");
                <?php $index = 0;
                foreach ($locationsArray as $location):?>
                mapOptions<?php echo $index;?> = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 12,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(<?php echo $location['lat'];?>,<?php echo $location['lng'];?>), // Tehran 35.6892° N, 51.3890° E
                    zoomControl: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false,
                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: StayleMap,
                };
                <?php $index++;
                endforeach;?>
                <?php for($i = 0;$i < $index;$i++):?>
                mapElement<?php echo $i;?> = document.getElementById('branch-' +<?php echo $i;?>);

                map<?php echo $i;?> = new google.maps.Map(mapElement<?php echo $i;?>, mapOptions<?php echo $i;?>);
                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $locationsArray[$i]['lat'];?>,<?php echo $locationsArray[$i]['lng'];?>),
                    map: map<?php echo $i;?>,
                    // url: 'https://www.google.com/maps/dir/?api=1&destination=35.812279,51.449358',
                    // title: 'Dorr Architecture',
                    icon: image,
                    zoomControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false,
                });
                <?php endfor;?>
            }
            <?php endif; ?>
        </script>
    <?php endif; ?>
<?php endif; ?>
<?php if(is_page_template('tpls/contact.php')):?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var applyBtns = document.querySelectorAll('.applyBtn');
        applyBtns.forEach(function (applyBtn) {
            applyBtn.addEventListener('click', function () {
                var temp = this.getAttribute('job_name');
                var opportunityNameInput = document.querySelector('input[name=opportunity-name]');
                opportunityNameInput.value = temp;
            });
        });
    });

</script>
<?php endif;?>
</body>
</html>