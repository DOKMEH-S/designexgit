<footer class="paddingX">
    <div class="footerSides">
        <div class="footerSide">
            <?php $logo = get_field('logo', 'option'); ?>
            <div class="footer-logo"><img
                    src="<?php echo $logo ? $logo['sizes']['medium'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
                    alt="footer logo"></div>
            <?php $f_dess = get_field('f_des', 'option');
            if ($f_dess): ?>
                <div class="footer-text">
                    <p><?php echo $f_dess; ?></p>
                </div>
            <?php endif; ?>
            <div class="footer-mailSocial">
                <?php $f_email = get_field('f_email', 'option');
                if ($f_dess): ?>
                    <a href="mailto:<?php echo antispambot($f_email); ?>" class="footer-mailSocial_mail"
                       aria-label="mail"><?php echo antispambot($f_email); ?></a>
                <?php endif; ?>
                <?php if (have_rows('social_media', 'option')): ?>
                    <div class="footer-mailSocial_social">
                        <?php while (have_rows('social_media', 'option')):
                            the_row();
                            $link = get_sub_field('link'); ?>
                            <a href="<?php echo $link ?>"
                               aria-label="<?php echo get_bloginfo('name') . ' ' . get_sub_field('icon'); ?>"><span
                                    class="<?php echo get_sub_field('icon'); ?>" aria-hidden="true"></span></a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="footerSide">
            <div class="footer-subscribe">
                <a href="/#" class="title" aria-label="Subscribe to the newsletter">Subscribe to the newsletter</a>
                <div class="footer-subscribe-form">
                    <?php echo do_shortcode('[newsletter_form form="1" confirmation_url="#"]');
                    ?>
                    <!--                    <form action="">-->
                    <!--                        <div class="textTypeInput">-->
                    <!--                            <input type="text" placeholder="Email">-->
                    <!--                        </div>-->
                    <!--                        <div class="checkboxTypeInput">-->
                    <!--                            <input type="checkbox" name="email" id="confirmEmail">-->
                    <!--                            <label for="confirmEmail"> I have read and accept the Privacy Policy </label>-->
                    <!--                        </div>-->
                    <!--                    </form>-->
                    <div class="newsletter-message"> <?php // echo apply_filters('newsletter_view_message'); ?></div>
                </div>
                <!--                <input type="submit">-->
            </div>
            <?php
            $contact = get_page_by_path('contact-us');
            if ($contact):
                $contact_id = $contact->ID;
                ?>
                <div class="footer-contact-items">
                    <?php if (have_rows('phones', $contact_id)):
                        while (have_rows('phones', $contact_id)):
                            the_row();
                            $phone = get_sub_field('phone') ?>
                            <div class="item">
                                <span class="title"><?php echo get_sub_field('title'); ?></span>
                                <a href="tel:<?php echo str_replace(' ', '', $phone) ?>"
                                   aria-label="Phone Number"><?php echo $phone; ?></a>
                            </div>
                        <?php endwhile;
                    endif;
                    $email = get_field('email', $contact_id);
                    if ($email): ?>
                        <div class="item">
                            <span class="title"><?php echo get_field('email_title', $contact_id); ?></span>
                            <a href="mailto:<?php echo antispambot($email); ?>"
                               aria-label="Email"><?php echo antispambot($email); ?></a>
                        </div>
                    <?php endif;
                    $address = get_field('address', $contact_id);
                    if ($address):
                        $location = get_field('location', $contact_id); ?>
                        <div class="item">
                            <a
                                href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $location['lat'] . ',' . $location['lng']; ?>"><?php echo $address; ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="footerPolicyDokmeh">
        <?php if (have_rows('footer_policy', 'option')): ?>
            <div class="footer-policy-items">
                <?php while (have_rows('footer_policy', 'option')):
                    the_row();
                    $text = get_sub_field('text');
                    $link = get_sub_field('link'); ?>
                    <a href="<?php echo $link;?>" class="item" aria-label="2024. All Right Reserved"> <?php echo $text;?></a>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="dokmeh">
            <span>Made with Love by </span>
            <img src="<?php ThemeAssets('img/logo-dokmeh.webp'); ?>" alt="Dokmeh creative agency">
        </div>
    </div>
</footer>
<?php if (is_archive('projects')): ?>
    <script defer src='<?php ThemeAssets('js/jQuery.min.js'); ?>'></script>
<?php endif; ?>
<script defer src='<?php ThemeAssets('js/gsap.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/ScrollTrigger.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/lenis.min.js'); ?>'></script>
<script defer src="<?php ThemeAssets('js/lenis-script.js'); ?>"></script>
<?php if(is_front_page()):?>
    <script defer src="<?php ThemeAssets('js/loading.js') ?>"></script>
    <script defer src="<?php ThemeAssets('js/home-overlay.js') ?>"></script>
<?php endif;
if (is_singular('projects') or is_page_template('tpls/about.php')): ?>
    <script defer src="<?php ThemeAssets('js/swiper-bundle.min.js'); ?>"></script>
<?php endif; ?>
<script defer src="<?php ThemeAssets('js/nodelay.js'); ?>"></script>
<script defer src="<?php ThemeAssets('js/script.js'); ?>"></script>
<?php if(is_front_page()):?>
    <script defer src="<?php ThemeAssets('js/page-script/home-final.js'); ?>"></script>
<?php endif; ?>
<?php if (is_singular('projects')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/single-project.js'); ?>"></script>
<?php elseif (is_singular('jobs')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/single-job.js'); ?>"></script>
<?php elseif (is_archive('projects')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/archive-project.js'); ?>"></script>
<?php elseif (is_home()): ?>
    <script defer src="<?php ThemeAssets('js/page-script/archive-blog.js'); ?>"></script>
<?php elseif (is_page_template('tpls/services.php')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/services.js'); ?>"></script>

<?php elseif (is_page_template('tpls/about.php')): ?>
    <script defer src="<?php ThemeAssets('js/imagesloaded.pkgd.min.js'); ?>"></script>
    <script defer type="module" src="<?php ThemeAssets('js/index.js'); ?>"></script>
    <script defer src="<?php ThemeAssets('js/page-script/about.js'); ?>"></script>
<?php elseif (is_page_template('tpls/contact.php')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/contact.js'); ?>"></script>
<?php endif; ?>
<?php wp_footer(); ?>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelector('header').style.opacity = '1';
        document.querySelector('main').style.opacity = '1';
        document.getElementById('menuContainer').style.display = 'flex';
        <?php  if (is_singular('projects') or is_page_template(array('tpls/services.php','tpls/about.php','tpls/contact.php')) ) { ?>
        if(document.getElementById('videoModal')){
            document.getElementById('videoModal').style.display = 'block';
        }
        <?php   } ?>
        <?php if (is_archive('projects')): ?>
        document.getElementById('mapProjectsContainer').style.display = 'flex';
        <?php endif; ?>
        document.getElementById('screenSaver').style.display = 'flex';
        document.getElementById('menuContainer').style.display = 'flex';

    });
</script>
<?php if (is_page_template('tpls/contact.php') or is_singular('projects')):
    $location = get_field('location');
    if ($location): ?>
        <script type="text/javascript"
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGSjuazfR5jJ4HLuqJ2DmyGkZR766ayRI&loading=async"></script>
        <script type="text/javascript">
            // When the window has finished loading create our google map below
            window.addEventListener('load', init);
            function init() {
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var image = new google.maps.MarkerImage("<?php ThemeAssets('img/pin.png'); ?>");
                var mapOptions = {
                    zoom: 12,

                    // The latitude and longitude to center the map (always required)

                    center: new google.maps.LatLng(<?php echo $location['lat'] . ',' . $location['lng']; ?>), // Tehran 35.6892° N, 51.3890° E

                    zoomControl: true,

                    mapTypeControl: false,

                    scaleControl: false,

                    streetViewControl: false,

                    rotateControl: false,

                    fullscreenControl: false,
                    styles: [
                        {
                            "featureType": "all",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                },
                                {
                                    "saturation": "-100"
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "saturation": 36
                                },
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 40
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "off"
                                },
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "all",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "administrative",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 17
                                },
                                {
                                    "weight": 1.2
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 20
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#4d6059"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#4d6059"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#4d6059"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "lightness": 21
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#4d6059"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#4d6059"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "visibility": "on"
                                },
                                {
                                    "color": "#7f8d89"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                },
                                {
                                    "lightness": 29
                                },
                                {
                                    "weight": 0.2
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 18
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 16
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#7f8d89"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#000000"
                                },
                                {
                                    "lightness": 19
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#2b3638"
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#2b3638"
                                },
                                {
                                    "lightness": 17
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#24282b"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#24282b"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.text.stroke",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        }
                    ]
                };
                var mapElement = document.getElementById('singleProjectMap');
                // Create the Google Map using our element and options defined above

                var map = new google.maps.Map(mapElement, mapOptions);


                // Let's also add a marker while we're at it

                var marker = new google.maps.Marker({

                    position: new google.maps.LatLng(<?php echo $location['lat'] . ',' . $location['lng']; ?>),

                    map: map,

                    url: 'https://www.google.com/maps/dir/?api=1&destination=<?php echo $location['lat'] . ',' . $location['lng']; ?>',

                    title: 'Designex',

                    icon: image,

                    zoomControl: false,

                    mapTypeControl: false,

                    scaleControl: false,

                    streetViewControl: false,

                    rotateControl: false,

                    fullscreenControl: false,

                });

                google.maps.event.addListener(marker, 'click', function () {

                    window.open(
                        marker.url,

                        '_blank' // <- This is what makes it open in a new window.

                    );

                });

            }

        </script>
    <?php endif; ?>
<?php endif; ?>
<?php if (is_archive('projects')):
    //if(sizeof($locationArray)>0) { ?>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGSjuazfR5jJ4HLuqJ2DmyGkZR766ayRI&loading=async"></script>
    <script type="text/javascript">
        // When the window has finished loading create our google map below
        window.addEventListener('load', init);
        var map;
        var infowindow;
        var marker = new Array();
        var i;
        var mapOptions;
        var mapElement;
        var project_location = [
            <?php foreach ($locationsArray as $Data): ?>
            ['<h3 class="info-window-header"><?php echo $Data[0]; ?></h3>', '<a href ="<?php echo $Data[3]; ?>" ><span><?php _e('view project', 'dokmeh'); ?></span></a>', <?php echo $Data[1]['lat']; ?>, <?php echo $Data[1]['lng']; ?>, '<img src="<?php echo $Data[2]; ?>">', '<a href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $Data[1]['lat'] . "," . $Data[1]['lng']; ?>" target="_blank"><?php _e('Get Direction...', 'dokmeh') ?></a>'],
            <?php endforeach; ?>
        ];
        function init() {
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var image = new google.maps.MarkerImage("<?php ThemeAssets('img/pin.png'); ?>");
            mapOptions = {
                zoom: 12,
                center: new google.maps.LatLng(35.6892, 51.3890), // Tehran 35.6892° N, 51.3890° E
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: false,
                styles: [
                    {
                        "featureType": "all",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "saturation": "-100"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "saturation": 36
                            },
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 40
                            },
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            },
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "all",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#4d6059"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#4d6059"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape.natural",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#4d6059"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#4d6059"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#4d6059"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "on"
                            },
                            {
                                "color": "#7f8d89"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#7f8d89"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#000000"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#2b3638"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "color": "#2b3638"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [
                            {
                                "color": "#24282b"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.stroke",
                        "stylers": [
                            {
                                "color": "#24282b"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]
            };
            mapElement = document.getElementById('mapProjects');
            // Create the Google Map using our element and options defined above
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
    </script>
<?php //}
endif; ?>
</body>

</html>