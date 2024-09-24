<?php get_header(); ?>

    <main class="wrapper notFoundWrapper">
        <section class="notFoundSection">
            <script type="module" src="https://unpkg.com/@splinetool/viewer@1.1.9/build/spline-viewer.js"></script>
            <spline-viewer url="https://prod.spline.design/DemNoTRkox54suyU/scene.splinecode"></spline-viewer>
        </section>
        <div class="button-group">
            <a href="<?php echo home_url('/');?>" class="btn">home page</a>
        </div>
    </main>

<?php get_footer();
