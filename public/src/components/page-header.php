<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-4"><?php echo strtoupper(implode(' ', explode('_', $titulo))) ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="index.php?p=inicial">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo implode(' ', explode('_', $titulo)) ?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->