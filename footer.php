<div id="videoModal">
    <div class="videoContainer">
        <video id="modalVideo" loop playsinline preload="auto" poster="" controls>
            <source id="modalVideoSrc" src="" type="video/mp4">
        </video>
    </div>
    <div id="closeModalVideo">
        <span>close</span>
    </div>
</div>
<footer class="paddingX">
    <div class="footerSides">
        <div class="footerSide">
            <?php $logo = get_field('logo', 'option'); ?>
            <div class="footer-logo"><img
                    src="<?php echo $logo ? $logo['sizes']['medium'] : get_template_directory_uri() . '/assets/img/logo-footer.webp'; ?>"
                    alt="footer logo"></div>
            <div class="footer-text">
                <p>WHERE QUALITY MEETS LUXURY AND INNOVATION DRIVES SUSTAINABILITY</p>
            </div>
            <div class="footer-mailSocial">
                <a href="/#" class="footer-mailSocial_mail" aria-label="mail">info@designex.ae</a>
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
                    <form action="">
                        <div class="textTypeInput">
                            <input type="text" placeholder="Email">
                        </div>
                        <div class="checkboxTypeInput">
                            <input type="checkbox" name="email" id="confirmEmail">
                            <label for="confirmEmail"> I have read and accept the Privacy Policy </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer-contact-items">
                <div class="item">
                    <span class="title">Phone Number</span>
                    <a href="/#" aria-label="Phone Number">+971 54 480 6995</a>
                </div>
                <div class="item">
                    <span class="title">Phone Number</span>
                    <a href="/#" aria-label="Phone Number">+971 (4) 374 1159</a>
                </div>
                <div class="item">
                    <span class="title">Email</span>
                    <a href="/#" aria-label="Email">info@designex.ae</a>
                </div>
                <div class="item">
                    <span class="title">P.O.Box</span>
                    <a href="/#" aria-label="P.O.Box">118319 Office 605
                        Zone B Aspect Tower, Business Bay,
                        DUBAI - UAE</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footerPolicyDokmeh">
        <div class="footer-policy-items">
            <a href="/#" class="item" aria-label="2024. All Right Reserved"> 2024. All Right Reserved</a>
            <a href="/#" class="item" aria-label="Cookie Policy"> Cookie Policy</a>
            <a href="/#" class="item" aria-label="Privecy Policy"> Privecy Policy</a>
        </div>
        <div class="dokmeh">
            <span>Made with Love by </span>
            <img src="<?php ThemeAssets('img/logo-dokmeh.webp'); ?>" alt="Dokmeh creative agency">
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
<?php if (is_archive('projects')): ?>
    <script defer src="<?php ThemeAssets('js/jQuery.min.js'); ?>"></script>
<?php endif; ?>
<script defer src='<?php ThemeAssets('js/gsap.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/ScrollTrigger.min.js'); ?>'></script>
<script defer src='<?php ThemeAssets('js/lenis.min.js'); ?>'></script>
<script defer src="<?php ThemeAssets('js/lenis-script.js'); ?>"></script>
<script defer src="<?php ThemeAssets('js/script.js'); ?>"></script>
<?php if (is_singular('projects')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/single-project.js'); ?>"></script>
<?php elseif (is_archive('projects')): ?>
    <script defer src="<?php ThemeAssets('js/page-script/archive-project.js'); ?>"></script>
<?php endif; ?>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelector('header').style.opacity = '1';
        document.querySelector('main.wrapper').style.opacity = '1';
        document.getElementById('menuContainer').style.display = 'flex';
        <?php if (is_singular('projects')): ?>
            if (document.getElementById('videoModal')) {
                document.getElementById('videoModal').style.display = 'block';
            }
        <?php endif; ?>
        document.querySelector('html').classList.add('loadingDone');
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

                // Basic options for a simple Google Map

                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions

                var image = new google.maps.MarkerImage("<?php ThemeAssets('img/pin.png');?>");



                var mapOptions = {

                    // How zoomed in you want the map to start at (always required)

                    zoom: 12,

                    // The latitude and longitude to center the map (always required)

                    center: new google.maps.LatLng(<?php echo $location['lat'].','.$location['lng'];?>), // Tehran 35.6892° N, 51.3890° E

                    zoomControl: true,

                    mapTypeControl: false,

                    scaleControl: false,

                    streetViewControl: false,

                    rotateControl: false,

                    fullscreenControl: false,

                    // How you would like to style the map.

                    // This is where you would paste any style found on Snazzy Maps.

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



                // Get the HTML DOM element that will contain your map

                // We are using a div with id="map" seen below in the <body>

                var mapElement = document.getElementById('mapProjects');
                var mapElement = document.getElementById('singleProjectMap');



                // Create the Google Map using our element and options defined above

                var map = new google.maps.Map(mapElement, mapOptions);



                // Let's also add a marker while we're at it

                var marker = new google.maps.Marker({

                    position: new google.maps.LatLng(<?php echo $location['lat'].','.$location['lng'];?>),

                    map: map,

                    url: 'https://www.google.com/maps/dir/?api=1&destination=<?php echo $location['lat'].','.$location['lng'];?>',

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
</body>

</html>