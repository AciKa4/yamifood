<!DOCTYPE html>
<html lang="en">
    @include("fixed.head")
<body>
<!-- Start header -->
    @include("fixed.header")
<!-- End header -->


    @yield("content")

<!-- Start Footer -->
    @include("fixed.footer")
<!-- End Footer -->
<!-- ALL JS FILES -->
    @include("fixed.scripts")

    @yield("scriptsForPage")
</body>
</html>
