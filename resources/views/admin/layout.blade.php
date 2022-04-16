<!DOCTYPE html>
<html lang="en">
@include("admin.fixed.head")
<body>
<!-- Start header -->
<!-- End header -->
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
@include("admin.fixed.topbar")
<div class="app-main">
    @include("admin.fixed.sidebar")
    <div class="app-main__outer">

        <div class="app-main__inner">
            @yield("content")

        </div>
    </div>
</div>

</div>

@include("admin.fixed.footer")
@include("admin.fixed.scripts")

<!-- Start Footer -->

</body>
</html>



