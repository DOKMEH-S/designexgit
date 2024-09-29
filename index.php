<?php get_header();
$page_id = get_queried_object_id(); ?>
    <main class="wrapper">
        <div id="newsletterLink-container">
            <span>Monthly Newsletter</span>
            <a href="">
                <img src="./assets/img/link.svg" alt="link">
                Subscribe here
            </a>
        </div>
        <div class="projectHeader-container">
            <div class="projectHeader-wrapper">
                <div class="projectHeader-container_row-above">
                    <div class="projectHeader-container_row-container">
                        <div class="projectHeader-container_row">
                            <span class="projectHeader-container_row-title">Main Tag</span>
                            <div class="projectHeader-container_row-items">
                                <span>Blog</span>
                                <span>News</span>
                                <span>Publications</span>
                                <span>media</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="projectHeader-container_row-under">
                    <div class="projectHeader-container_row-container">
                        <div class="projectHeader-container_row">
                            <span class="projectHeader-container_row-title">Filter</span>
                            <div class="projectHeader-container_row-items">
                                <span>Tag 01</span>
                                <span>Tag 02</span>
                                <span>Tag 03</span>
                                <span>Tag 04</span>
                                <span>Tag 05</span>
                                <span>Tag 06</span>
                                <span>Tag 07</span>
                                <span>Tag 08</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blogBody">
            <div class="blogItems">
                <div class="blogItem">
                    <div class="blogItem-info">
                        <a href="./single-blog.html" aria-label="blog-01">
                            <h2 class="title"> Architectural <br>Design</h2>
                        </a>
                        <div class="blogItem-info_more">
                            <p class="des">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis mag
                            </p>
                            <div class="tags">
                                <a href="/#">Tag 01</a>
                                <a href="/#">Tag 02</a>
                                <a href="/#">Tag 03</a>
                            </div>
                            <a href="./single-blog.html" aria-label="Read More" class="link">Read More</a>
                        </div>
                    </div>
                    <a href="./single-blog.html" aria-label="blog-01" class="blogItem-media">
                        <img src="./assets/img/sample/blog-01.webp" alt="blog-01">
                        <span class="date">2024.SEP.01</span>
                    </a>
                </div>
                <div class="blogItem">
                    <div class="blogItem-info">
                        <a href="./single-blog.html" aria-label="blog-02">
                            <h2 class="title"> The <br>Blog title <br> Gose here</h2>
                        </a>
                        <div class="blogItem-info_more">
                            <p class="des">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis mag
                            </p>
                            <div class="tags">
                                <a href="/#">Tag 01</a>
                                <a href="/#">Tag 02</a>
                                <a href="/#">Tag 03</a>
                            </div>
                            <a href="./single-blog.html" aria-label="Read More" class="link">Read More</a>
                        </div>
                    </div>
                    <a href="./single-blog.html" aria-label="blog-02" class="blogItem-media">
                        <img src="./assets/img/sample/blog-02.webp" alt="blog-02">
                        <span class="date">2024.SEP.01</span>
                    </a>
                </div>
                <div class="blogItem">
                    <div class="blogItem-info">
                        <a href="./single-blog.html" aria-label="blog-03">
                            <h2 class="title"> The <br>Blog title <br> Gose here</h2>
                        </a>
                        <div class="blogItem-info_more">
                            <p class="des">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis mag
                            </p>
                            <div class="tags">
                                <a href="/#">Tag 01</a>
                                <a href="/#">Tag 02</a>
                                <a href="/#">Tag 03</a>
                            </div>
                            <a href="./single-blog.html" aria-label="Read More" class="link">Read More</a>
                        </div>
                    </div>
                    <a href="./single-blog.html" aria-label="blog-03" class="blogItem-media">
                        <img src="./assets/img/sample/blog-03.webp" alt="blog-03">
                        <span class="date">2024.SEP.01</span>
                    </a>
                </div>
                <div class="blogItem">
                    <div class="blogItem-info">
                        <a href="./single-blog.html" aria-label="blog-04">
                            <h2 class="title"> The <br>Blog title <br> Gose here</h2>
                        </a>
                        <div class="blogItem-info_more">
                            <p class="des">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eros in cursus turpis massa tincidunt. Pellentesque sit amet porttitor eget dolor morbi non arcu risus. Facilisis mag
                            </p>
                            <div class="tags">
                                <a href="/#">Tag 01</a>
                                <a href="/#">Tag 02</a>
                                <a href="/#">Tag 03</a>
                            </div>
                            <a href="./single-blog.html" aria-label="Read More" class="link">Read More</a>
                        </div>
                    </div>
                    <a href="./single-blog.html" aria-label="blog-04" class="blogItem-media">
                        <img src="./assets/img/sample/blog-04.webp" alt="blog-04">
                        <span class="date">2024.SEP.01</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
<?php get_footer();