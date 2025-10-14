<script>
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 50) {
            $("#myHeader").addClass("sticky");
        } else {
            $("#myHeader").removeClass("sticky");
        }
    });

    $(window).on("scroll", function () {
        $(".animationbox").each(function () {
            const boxTop = $(this).offset().top;
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();

            if (scrollTop + windowHeight > boxTop + 50) {
                $(this).addClass("visible");
            }
        });
    });

    // Trigger scroll on page load
    $(document).ready(function () {
        $(window).trigger("scroll");
    });
    $(window).on("scroll", function () {
        $(".horizontalanimationleft").each(function () {
            const boxTop = $(this).offset().top;
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();

            if (scrollTop + windowHeight > boxTop + 50) {
                $(this).addClass("visible");
            }
        });
    });

    // Trigger scroll on page load
    $(document).ready(function () {
        $(window).trigger("scroll");
    });
    $(window).on("scroll", function () {
        $(".horizontalanimationright").each(function () {
            const boxTop = $(this).offset().top;
            const scrollTop = $(window).scrollTop();
            const windowHeight = $(window).height();

            if (scrollTop + windowHeight > boxTop + 50) {
                $(this).addClass("visible");
            }
        });
    });

    // Trigger scroll on page load
    $(document).ready(function () {
        $(window).trigger("scroll");
    });

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            $("#scrollTopBtn").addClass("visible");
        } else {
            $("#scrollTopBtn").removeClass("visible");
        }
    });

    $("#scrollTopBtn").on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, 600);
    });
</script>