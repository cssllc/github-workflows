<footer class="main-footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-lg-3 text-center text-sm-left">
                <div class="footer-logo">
                    <img src="@option('footer_logo', 'url')" alt="@option('footer_logo', 'alt')">
                </div>
                <p class="footer-text">@option('address')</p>
                @hasoptions('footer_certifications_badges')
                <div class="certifications-badges-wrapper">
                    @options('footer_certifications_badges', 'option')
                    @hassub ('logo')
                    @if (get_sub_field('link'))
                        <a href="@sub('link', 'url')" target="@sub('link', 'target')">
                            <img class="logo img-fluid" src="@sub('logo', 'url')" alt="@sub('logo', 'title')" />
                        </a>
                    @else
                        <img class="logo img-fluid" src="@sub('logo', 'url')" alt="@sub('logo', 'title')" />
                    @endif
                    @endsub
                    @endoptions
                </div>
                @endhasoptions
            </div>
            <div class="col-6 col-sm-3 col-lg-2">
                <ul class="list-unstyled footer-links m-0">
                    @hasoptions('Col_2_link')
                    @options('Col_2_link')
                    <li>
                        <a href="@sub('column_2_menu','url')">@sub('column_2_menu','title')</a>
                    </li>
                    @endoptions
                    @endhasoptions
                </ul>
            </div>
            <div class="col-6 col-sm-3 col-lg-3">
                <ul class="list-unstyled footer-links m-0">
                    @hasoptions('col_3_link')
                    @options('col_3_link')
                    <li>
                        <a href="@sub('column_3_menu','url')">@sub('column_3_menu','title')</a>
                    </li>
                    @endoptions
                    @endhasoptions

                </ul>
            </div>
            <div class="col-sm-10 col-lg-4 text-center text-lg-left">
                <h4>@option('col4_title')</h4>
                <p>@option('col4_description')</p>
                <a href="@option('col4_link', 'url')" target="@option('col4_link', 'target')"><button type="button"
                        class="btn btn-warning rounded-pill">@option('col4_link', 'title')</button></a>
            </div>
            <div class="col-12 text-center">
                <p class="sm-footer-text">@option('copyright_text')</p>
            </div>
        </div>
    </div>
</footer>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js'></script>

<script>
    jQuery(document).ready(function() {
        jQuery('.navbar-toggler').on('click', function(e) {
            jQuery('body').toggleClass("bg-shadow");
        });
    });
</script>
</body>

</html>
