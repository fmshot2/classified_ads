<style>
    .searchInput{
        padding-top: 30px !important;
        padding-left: 30px !important;
        padding-bottom: 30px !important;
        border-radius: 50px !important;
        border: 2px solid #e7a32d9d !important;
    }
    .search-area-2 {
        padding-top: 5px !important;
    }
    .search-section.bg-grea {
        background: #ca830921;
    }
    .search-section .navbar-top-post-btn button {
        font-size: 17px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: none;
        padding: 15px 40px;
        background: #CA8309 !important;
        color: #fff !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .navbar-top-post-btn button:hover {
        background: #ffffff !important;
        color: #CA8309 !important;
        border: 2px solid #e7a32d9d;
        transition: .7s background, color;
    }
    .search-section .location {
        font-size: 15px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: 2px solid #e7a32d9d !important;
        padding: 15px 40px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .jxcategory {
        font-size: 14px !important;
        text-transform: uppercase;
        border-radius: 200px;
        border: 2px solid #e7a32d9d !important;
        padding: 15px 30px;
        background: #ffffff !important;
        color: #e7a32d !important;
        cursor: pointer;
        box-shadow: 0 0 0 rgb(204 169 44 / 40%);
    }
    .search-section .location:hover, .search-section .jxcategory:hover, .search-section .location:hover span, .search-section .jxcategory:hover span{
        background: #CA8309 !important;
        color: #ffffff !important;
        transition: .7s all;
    }

    .ajaxSearchList{
        width: fit-content;
        position: absolute;
    }
    .ajaxSearchCategoryList{
        color: #CA8309;
    }
    .col-lg-2{
        padding: 5px
    }
    .col-lg-2 button{
        width: 100%;
        display: block;
        font-size: 13px !important;
        text-align: center !important;
    }
    .categoriesModalList{
        list-style: none;
    }
    .categoriesModalList li{
        list-style: none;
        display: block;
        border-bottom: 1px solid rgba(206, 206, 206, 0.233);
        padding-bottom: 10px;
    }
    .categoriesModalList li:last-child{
        border-bottom: 0;
    }
    .categoriesModalList li .fa{
        font-size: 10px;
        color: rgb(177, 177, 177);
    }
    .categoriesModalList li a{
        display: block;
    }
    .categoriesModalList li a span{
        font-size: 12px;
        color: #11a182;
    }
    .categoriesModalList li:hover a, .categoriesModalList li:hover .fa{
        color: #e7a32d;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .searchFilterModalTitle{
        font-size: 17px;
        margin-bottom: 20px;
        font-weight: 600;
        font-family: "Poppins-Regular";
    }

    /* @media (min-width: 768px) */

    .popover__title {
        font-size: 24px;
        line-height: 36px;
        text-decoration: none;
        color: rgb(228, 68, 68);
        text-align: center;
        padding: 15px 0;
    }

    .popover__wrapper {
        position: relative;
        display: inline-block;
    }
    .popover__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: 100px;
        top: 50px;
        transform: translate(0, 10px);
        background-color: #f5f5f5;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: fit-content;
    }
    .popover__content ul li {
        color: #000 !important;
        padding-left: 30px;
        padding-right: 30px;
        display: block;
    }
    .popover__content ul li:first-child {
        padding-top: 15px;
    }
    .popover__content ul li a{
        color: #000 !important;
        display: block;
    }
    .popover__content ul li:hover a{
        color: #e7a32d !important;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .popover__content:before {
        position: absolute;
        z-index: -1;
        content: "";
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #f5f5f5 transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }


    /* Mobile Popover  */
    .popover__mobile__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: 100px;
        top: 50px;
        transform: translate(0, 10px);
        background-color: #f5f5f5;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: auto;
    }
    .popover__mobile__content ul li {
        color: #000 !important;
        padding-left: 30px;
        padding-right: 30px;
        display: block;
    }
    .popover__mobile__content ul li:first-child {
        padding-top: 15px;
    }
    .popover__mobile__content ul li a{
        color: #000 !important;
        display: block;
    }
    .popover__mobile__content ul li:hover a{
        color: #e7a32d !important;
        margin-left: 3px;
        transition: .5s margin-left;
    }
    .popover__mobile__content:before {
        position: absolute;
        z-index: -1;
        content: "";
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #f5f5f5 transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }

    @media (min-width: 768px){
        #desktopSearchForm{
            display: block !important;
            padding-top: 20px;
        }
        #mobileSearchForm{
            display: none;
        }
        .popover__wrapper:hover .popover__content {
            z-index: 10;
            opacity: 1;
            visibility: visible;
            transform: translate(0, -20px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }
    }

    @media (max-width: 768px){
        #desktopSearchForm{
            display: none;
        }
        #mobileSearchForm{
            display: block !important;
        }
        .searchInput{
            padding-top: 20px !important;
            padding-left: 20px !important;
            padding-bottom: 20px !important;
            border-radius: 50px !important;
        }
        .search-section .navbar-top-post-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center
        }
        .search-section .navbar-top-post-btn button {
            font-size: 15px !important;
            border-radius: 200px;
            padding: 10px 40px !important;
            color: #fff !important;
            display: inline;
            width: fit-content;
        }
        .search-section .location {
            font-size: 12px !important;
            text-transform: uppercase;
            border-radius: 200px;
            border: none;
            padding: 10px 20px;
            background: #ffffff !important;
            color: #e7a32d !important;
            cursor: pointer;
            box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        }
        .search-section .jxcategory {
            font-size: 12px !important;
            text-transform: uppercase;
            border-radius: 200px;
            border: none;
            padding: 10px 20px;
            background: #ffffff !important;
            color: #e7a32d !important;
            cursor: pointer;
            box-shadow: 0 0 0 rgb(204 169 44 / 40%);
        }
        .stateLGApopup{
            display: none;
        }
        .form-group{
            margin-bottom: 5px !important;
        }
        .showStateFg{
            padding-left: 15px;
        }
        .showCatFg{
            padding-right: 15px;
        }
        .categoriesModalList li a{
            display: inline-block;
            justify-content: space-evenly;
        }
        .categoriesModalList li a.selectSubOption{
            color: #11a182;
        }
        .popover__content {
            z-index: 10;
            opacity: 1;
            visibility: visible;
            transform: translate(0, -20px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }
    }

    .buttontext{
        width: 100px;
        overflow: hidden;
        white-space: nowrap;
        display: block;
        text-overflow: ellipsis;
        color: #CA8309
    }​
    button{}
</style>
<div id="" class="search-section search-area-2 bg-grea hm-search-form-comp">

    <div class="">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="container">
                    <form id="desktopSearchForm" action="<?php echo e(route('dap.search')); ?>" method="GET">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 showStateFg">
                                <div class="form-group">
                                    <button type="button" data-toggle="modal" data-target="#showStatesModal" id="searchStateBtn" class="btn btn-success location"><i class="fa fa-map-marker"></i> All States</button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="jxservices" class="form-control searchInput" placeholder="What are you looking for? (e.g Barber, Plumber...)">
                                    <div id="service_list" class="ajaxSearchList"></div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 showCatFg">
                                <div class="form-group">
                                    <button type="button" data-toggle="modal" data-target="#showCategoriesModal" id="searchCategoryBtn" class="btn btn-success jxcategory"><i class="fa fa-archive"></i> All Categories</button>
                                </div>
                            </div>
                            <input type="hidden" name="category" id="searchCategoryInput" value="">
                            <input type="hidden" name="subcategory" id="searchSubCategoryInput" value="">
                            <input type="hidden" name="state" id="searchStateInput" value="">
                            <input type="hidden" name="city" id="searchLGAInput" value="">
                            <div class="col-lg-2">
                                <div class="mr-3 navbar-top-post-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form id="mobileSearchForm" action="<?php echo e(route('dap.search')); ?>" method="GET">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 showStateFg">
                                <div class="form-group">
                                    <button type="button" data-toggle="modal" data-target="#showMobileStatesModal" id="searchMobileStateBtn" class="btn btn-success location"><i class="fa fa-map-marker"></i> All States</button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 showCatFg">
                                <div class="form-group">
                                    <button type="button" data-toggle="modal" data-target="#showMobileCategoriesModal" id="searchMobileCategoryBtn" class="btn btn-success jxcategory"><i class="fa fa-archive"></i> All Categories</button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="keyword" id="mobilejxservices" class="form-control searchInput" placeholder="What are you looking for? (e.g Barber, Plumber...)">
                                    <div id="mobile_service_list" class="ajaxSearchList"></div>
                                </div>
                            </div>
                            <input type="hidden" name="category" id="searchMobileCategoryInput" value="">
                            <input type="hidden" name="subcategory" id="searchMobileSubCategoryInput" value="">
                            <input type="hidden" name="state" id="searchMobileStateInput" value="">
                            <input type="hidden" name="city" id="searchMobileLGAInput" value="">
                            <div class="col-lg-2">
                                <div class="mr-3 navbar-top-post-btn">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<header class="top-header top-header-ads-mobile" style="display: flex; justify-content: center; background: linear-gradient(90deg, rgba(251,219,35,1) 52%, rgba(243,163,27,1) 66%); width: 100%; margin: 20px 0 0 0">
    <?php if($advertisements): ?>
        <div class="animate__animated animate__fadeInLeft">
            <?php $__currentLoopData = $advertisements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertisement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($advertisement->advert_location == 1): ?>
                    <a class="topnav-advert-slides topnav-advert-slides-hidden animate__animated animate__fadeInLeft" href="<?php echo e($advertisement->website_link ? $advertisement->website_link : '#'); ?>">
                        <img src="<?php echo e(asset('uploads/sponsored/'.$advertisement->banner_img)); ?>" alt="" style="margin: 0 auto; width: 100%; height: 30px">
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p>No Advert here</p>
    <?php endif; ?>
</header>

<!-- SEARCH CATEGORIES MODAL -->
<div class="sCatModal">
    <div id="showCategoriesModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <?php if(isset($categories)): ?>
                        <h4 class="searchFilterModalTitle">All Categories </h4>
                        <p style="margin-top: -20px">Search in all categories or select a category here. 👇</p>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index <= 13): ?>
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addCategoryToForm('<?php echo e($category->name); ?>', '<?php echo e($category->slug); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($category->name); ?>

                                                
                                                </a>

                                                <div class="popover__content">
                                                    <ul>
                                                        <?php if(isset($category->sub_categories)): ?>
                                                            <?php if($category->sub_categories->count() > 0): ?>
                                                                <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li data-dismiss="modal" onclick="addSubCategoryToForm('<?php echo e($sub_category->name); ?>', '<?php echo e($sub_category->slug); ?>', '<?php echo e($category->slug); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addSubCategoryToForm('<?php echo e($sub_category->name); ?>', '<?php echo e($sub_category->slug); ?>', '<?php echo e($category->slug); ?>')" href="#"><?php echo e($sub_category->name); ?></a></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <li>No Sub Category!</li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 13 && $loop->index <= 27): ?>
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addCategoryToForm('<?php echo e($category->name); ?>', '<?php echo e($category->slug); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($category->name); ?>

                                                
                                                </a>

                                                <div class="popover__content">
                                                    <ul>
                                                        <?php if(isset($category->sub_categories)): ?>
                                                            <?php if($category->sub_categories->count() > 0): ?>
                                                                <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li data-dismiss="modal" onclick="addSubCategoryToForm('<?php echo e($sub_category->name); ?>', '<?php echo e($sub_category->slug); ?>', '<?php echo e($category->slug); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addSubCategoryToForm('<?php echo e($sub_category->name); ?>', '<?php echo e($sub_category->slug); ?>', '<?php echo e($category->slug); ?>')" href="#"><?php echo e($sub_category->name); ?></a></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <li>No Sub Category!</li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 26): ?>
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addCategoryToForm('<?php echo e($category->name); ?>', '<?php echo e($category->slug); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($category->name); ?>

                                                
                                                </a>

                                                <div class="popover__content">
                                                    <ul>
                                                        <?php if(isset($category->sub_categories)): ?>
                                                            <?php if($category->sub_categories->count() > 0): ?>
                                                                <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li data-dismiss="modal" onclick="addSubCategoryToForm('<?php echo e($sub_category->name); ?>', '<?php echo e($sub_category->slug); ?>', '<?php echo e($category->slug); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addSubCategoryToForm('<?php echo e($sub_category->name); ?>', '<?php echo e($sub_category->slug); ?>', '<?php echo e($category->slug); ?>')" href="#"><?php echo e($sub_category->name); ?></a></li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <li>No Sub Category!</li>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH STATES MODAL -->
<div class="sStateModal" id="sStateModal">
    <div id="showStatesModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <?php if(isset($allgeneralstates)): ?>
                        <h4 class="searchFilterModalTitle">All States</h4>
                        <p style="margin-top: -20px">Search nationwide or select a state here. 👇</p>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $allgeneralstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allgeneralstate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index <= 12): ?>
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addStateToForm('<?php echo e($allgeneralstate->name); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($allgeneralstate->name); ?></a>
                                                <div class="popover__content">
                                                    <ul>
                                                        <?php if(isset($allgeneralstate->local_governments)): ?>
                                                            <?php $__currentLoopData = $allgeneralstate->local_governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local_government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" href="#"><?php echo e($local_government->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $allgeneralstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allgeneralstate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 12 && $loop->index <= 24): ?>
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addStateToForm('<?php echo e($allgeneralstate->name); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($allgeneralstate->name); ?></a>
                                                <div class="popover__content">
                                                    <ul>
                                                        <?php if(isset($allgeneralstate->local_governments)): ?>
                                                            <?php $__currentLoopData = $allgeneralstate->local_governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local_government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addLGAToForm('<?php echo e($local_government->name); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addLGAToForm('<?php echo e($local_government->name); ?>')" href="#"><?php echo e($local_government->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $allgeneralstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allgeneralstate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 24): ?>
                                            <li data-dismiss="modal" class="popover__wrapper">
                                                <a onclick="addStateToForm('<?php echo e($allgeneralstate->name); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($allgeneralstate->name); ?></a>
                                                <div class="popover__content">
                                                    <ul>
                                                        <?php if(isset($allgeneralstate->local_governments)): ?>
                                                            <?php $__currentLoopData = $allgeneralstate->local_governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local_government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addLGAToForm('<?php echo e($local_government->name); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addLGAToForm('<?php echo e($local_government->name); ?>')" href="#"><?php echo e($local_government->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH MOBILE CATEGORIES MODAL -->

<div class="sCatModal">
    <div id="showMobileCategoriesModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="border: 0">
                <div data-dismiss="modal" style="width: 100%; display: flex; justify-content: flex-end; padding: 5px 10px; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 2px;" class="fa fa-close"></i> Close</div>

                <div class="modal-body">
                    <?php if(isset($categories)): ?>
                        <h4 class="searchFilterModalTitle">All Categories </h4>
                        <p style="margin-top: -20px">Search in all categories or select a category here. 👇</p>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index <= 12): ?>
                                            <li class="popover__wrapper">
                                                <a data-dismiss="modal" onclick="addMobileCategoryToForm('<?php echo e($category->name); ?>', '<?php echo e($category->slug); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($category->name); ?></a>
                                                <a class="selectSubOption" onclick="launchPopoverSubCategory(<?php echo e($category->id); ?>)" href="#">- or Subcategory</a>

                                                <div id="categoryId<?php echo e($category->id); ?>" class="popover__close popover__mobile__content">
                                                    <ul>
                                                        <li><div onclick="closePopoverSub()" style="width: 100%; display: flex; justify-content: flex-end; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 5px; padding-right: 5px" class="fa fa-close"></i> Close</div></li>

                                                        <?php if(isset($category->sub_categories)): ?>
                                                            <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addMobileSubCategoryToForm('<?php echo e($subcategory->name); ?>', '<?php echo e($subcategory->slug); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><?php echo e($subcategory->name); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php elseif($category->sub_categories->isEmpty()): ?>
                                                            <p>No Sub Category</p>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 12 && $loop->index <= 24): ?>
                                            <li class="popover__wrapper">
                                                <a data-dismiss="modal" onclick="addMobileCategoryToForm('<?php echo e($category->name); ?>', '<?php echo e($category->slug); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($category->name); ?></a>
                                                <a class="selectSubOption" onclick="launchPopoverSubCategory(<?php echo e($category->id); ?>)" href="#">- or Subcategory</a>

                                                <div id="categoryId<?php echo e($category->id); ?>" class="popover__close popover__mobile__content">
                                                    <ul>
                                                        <li><div onclick="closePopoverSub()" style="width: 100%; display: flex; justify-content: flex-end; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 5px; padding-right: 5px" class="fa fa-close"></i> Close</div></li>

                                                        <?php if(isset($category->sub_categories)): ?>
                                                            <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addMobileSubCategoryToForm('<?php echo e($subcategory->name); ?>', '<?php echo e($subcategory->slug); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><?php echo e($subcategory->name); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php elseif($category->sub_categories->isEmpty()): ?>
                                                            <p>No Sub Category</p>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 24): ?>
                                            <li class="popover__wrapper">
                                                <a data-dismiss="modal" onclick="addMobileCategoryToForm('<?php echo e($category->name); ?>', '<?php echo e($category->slug); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($category->name); ?></a>
                                                <a class="selectSubOption" onclick="launchPopoverSubCategory(<?php echo e($category->id); ?>)" href="#">- or Subcategory</a>

                                                <div id="categoryId<?php echo e($category->id); ?>" class="popover__close popover__mobile__content">
                                                    <ul>
                                                        <li><div onclick="closePopoverSub()" style="width: 100%; display: flex; justify-content: flex-end; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 5px; padding-right: 5px" class="fa fa-close"></i> Close</div></li>

                                                        <?php if(isset($category->sub_categories)): ?>
                                                            <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addMobileSubCategoryToForm('<?php echo e($subcategory->name); ?>', '<?php echo e($subcategory->slug); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><?php echo e($subcategory->name); ?></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php elseif($category->sub_categories->isEmpty()): ?>
                                                            <p>No Sub Category</p>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SEARCH MOBILE STATES MODAL -->
<div class="sStateModal" id="sStateModal">
    <div id="showMobileStatesModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div data-dismiss="modal" style="width: 100%; display: flex; justify-content: flex-end; padding: 5px 10px; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 2px;" class="fa fa-close"></i> Close</div>

                <div class="modal-body">
                    <?php if(isset($allgeneralstates)): ?>
                        <h4 class="searchFilterModalTitle">All States</h4>
                        <p style="margin-top: -20px">Search nationwide or select a state here. 👇</p>
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $allgeneralstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allgeneralstate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index <= 12): ?>
                                            <li class="popover__wrapper">
                                                <a data-dismiss="modal" onclick="addMobileStateToForm('<?php echo e($allgeneralstate->name); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($allgeneralstate->name); ?></a>
                                                <a class="selectSubOption" onclick="launchPopoverState(<?php echo e($allgeneralstate->id); ?>)" href="#">- or Select a City</a>

                                                <div id="stateId<?php echo e($allgeneralstate->id); ?>" class="popover__close popover__mobile__content">
                                                    <ul>
                                                        <li><div onclick="closePopoverSub()" style="width: 100%; display: flex; justify-content: flex-end; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 5px; padding-right: 5px" class="fa fa-close"></i> Close</div></li>

                                                        <?php if(isset($allgeneralstate->local_governments)): ?>
                                                            <?php $__currentLoopData = $allgeneralstate->local_governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local_government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addMobileLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" href="#"><?php echo e($local_government->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <p>No city</p>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $allgeneralstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allgeneralstate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 12 && $loop->index <= 24): ?>
                                            <li class="popover__wrapper">
                                                <a data-dismiss="modal" onclick="addMobileStateToForm('<?php echo e($allgeneralstate->name); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($allgeneralstate->name); ?></a>
                                                <a class="selectSubOption" onclick="launchPopoverState(<?php echo e($allgeneralstate->id); ?>)" href="#">- or Select a City</a>

                                                <div id="stateId<?php echo e($allgeneralstate->id); ?>" class="popover__close popover__mobile__content">
                                                    <ul>
                                                        <li><div onclick="closePopoverSub()" style="width: 100%; display: flex; justify-content: flex-end; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 5px; padding-right: 5px" class="fa fa-close"></i> Close</div></li>

                                                        <?php if(isset($allgeneralstate->local_governments)): ?>
                                                            <?php $__currentLoopData = $allgeneralstate->local_governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local_government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addMobileLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" href="#"><?php echo e($local_government->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <p>No city</p>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="categoriesModalList">
                                    <?php $__currentLoopData = $allgeneralstates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allgeneralstate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->index > 24): ?>
                                            <li class="popover__wrapper">
                                                <a data-dismiss="modal" onclick="addMobileStateToForm('<?php echo e($allgeneralstate->name); ?>')" href="#"><i class="fa fa-chevron-right"></i> <?php echo e($allgeneralstate->name); ?></a>
                                                <a class="selectSubOption" onclick="launchPopoverState(<?php echo e($allgeneralstate->id); ?>)" href="#">- or Select a City</a>

                                                <div id="stateId<?php echo e($allgeneralstate->id); ?>" class="popover__close popover__mobile__content">
                                                    <ul>
                                                        <li><div onclick="closePopoverSub()" style="width: 100%; display: flex; justify-content: flex-end; color: rgb(235, 94, 94); cursor: pointer;"> <i style="padding-top: 5px; padding-right: 5px" class="fa fa-close"></i> Close</div></li>

                                                        <?php if(isset($allgeneralstate->local_governments)): ?>
                                                            <?php $__currentLoopData = $allgeneralstate->local_governments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $local_government): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li data-dismiss="modal" onclick="addMobileLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" style="<?php if(!$loop->last): ?>border-bottom: 1px solid rgb(105 105 105 / 11%);<?php endif; ?>"><a onclick="addLGAToForm('<?php echo e($local_government->name); ?>', '<?php echo e($allgeneralstate->name); ?>')" href="#"><?php echo e($local_government->name); ?></a></li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php else: ?>
                                                            <p>No city</p>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('#jxservices').keyup(function(){
            var query = $('#jxservices').val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"<?php echo e(route('ajax.search.result')); ?>",
                    method:"GET",
                    data:{service:query},
                    success:function(data){
                        $('#service_list').fadeIn();
                        $('#service_list').html(data);
                    }
                });
            }
            else{
                $('#service_list').hide();
            }
        });

        $(document).on('click', 'li', function(){
            $('#jxservices').val($('#jxservices').text());
            $('#service_list').fadeOut();
        });

        $('#mobilejxservices').keyup(function(){
            var query = $('#mobilejxservices').val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"<?php echo e(route('ajax.search.result')); ?>",
                    method:"GET",
                    data:{service:query},
                    success:function(data){
                        $('#mobile_service_list').fadeIn();
                        $('#mobile_service_list').html(data);
                    }
                });
            }
            else{
                $('#mobile_service_list').hide();
            }
        });

        $(document).on('click', 'li', function(){
            $('#mobilejxservices').val($('#jxservices').text());
            $('#mobile_service_list').fadeOut();
        });

    });

    function launchPopoverState(stateId) {
        $('#stateId'+stateId).toggleClass('popover__content')
    }
    function launchPopoverSubCategory(categoryId) {
        $('#categoryId'+categoryId).toggleClass('popover__content')
    }
    function closePopoverSub() {
        $('.popover__close').removeClass('popover__content')
    }

    /**
        $(document).ready(function(){
            $('#jxservices').keyup(function(){
                var query = $(this).val();
                console.log(query)
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"<?php echo e(route('ajax.search.result')); ?>",
                        method:"GET",
                        data:{service:query},
                        success:function(data){
                            $('#service_list').fadeIn();
                            $('#service_list').html(data);
                        }
                    });
                }
                else{
                    $('#service_list').hide();
                }
            });

            $(document).on('click', 'li', function(){
                $('#jxservices').val($(this).text());
                $('#service_list').fadeOut();
            });

        });
    **/

    // Desktop Add Input
        function addStateToForm(thestate) {
            document.getElementById('searchStateBtn').innerHTML = '<span class="buttontext">' + thestate + '</span>'
            document.getElementById('searchStateInput').value = thestate
        }
        function addLGAToForm(thelga, thestate) {
            document.getElementById('searchStateBtn').innerHTML = '<span class="buttontext">' + thelga + '</span>'
            document.getElementById('searchLGAInput').value = thelga
            document.getElementById('searchStateInput').value = thestate
        }
        function addCategoryToForm(thecategoryname,thecategoryslug) {
            document.getElementById('searchCategoryBtn').innerHTML = '<span class="buttontext">' + thecategoryname + '</span>'
            document.getElementById('searchCategoryInput').value = thecategoryslug
            document.getElementById('searchSubCategoryInput').value = ''
        }
        function addSubCategoryToForm(thesubcategoryname,thesubcategoryslug,thecategoryslug) {
            document.getElementById('searchCategoryBtn').innerHTML = '<span class="buttontext">' + thesubcategoryname + '</span>'
            document.getElementById('searchCategoryInput').value = thecategoryslug
            document.getElementById('searchSubCategoryInput').value = thesubcategoryslug
        }
    //

    // Mobile Functions
    function addMobileLGAToForm(thelga, thestate) {
        document.getElementById('searchMobileStateBtn').innerHTML = '<span class="buttontext">' + thelga + '</span>'
        document.getElementById('searchMobileLGAInput').value = thelga
        document.getElementById('searchMobileStateInput').value = thestate
    }
    function addMobileStateToForm(thestate) {
        document.getElementById('searchMobileStateBtn').innerHTML = '<span class="buttontext">' + thestate + '</span>'
        document.getElementById('searchMobileStateInput').value = thestate
    }
    function addMobileCategoryToForm(thecategoryname,thecategoryslug) {
        document.getElementById('searchMobileCategoryBtn').innerHTML = '<span class="buttontext">' + thecategoryname + '</span>'
        document.getElementById('searchMobileCategoryInput').value = thecategoryslug
        document.getElementById('searchMobileSubCategoryInput').value = ''
    }
    function addMobileSubCategoryToForm(thesubcategoryname,thesubcategoryslug,thecategoryslug) {
        document.getElementById('searchMobileCategoryBtn').innerHTML = '<span class="buttontext">' + thesubcategoryname + '</span>'
        document.getElementById('searchMobileSubCategoryInput').value = thesubcategoryslug
        document.getElementById('searchMobileCategoryInput').value = thecategoryslug
    }

    $(document).mouseup(function(e) {
        var service_list_container = $("#service_list");
        var mobile_service_list_container = $("#mobile_service_list");

        // if the target of the click isn't the container nor a descendant of the container
        if (!service_list_container.is(e.target) && service_list_container.has(e.target).length === 0)
        {
            service_list_container.hide();
        }
        if (!mobile_service_list_container.is(e.target) && mobile_service_list_container.has(e.target).length === 0)
        {
            mobile_service_list_container.hide();
        }
    });
</script>


<script type="text/javascript">
    var slider = document.getElementById("myRange");
    var mobileslider = document.getElementById("mbilemyRange");
    var output = document.getElementById("demo");
    var mobileoutput = document.getElementById("mobiledemo");
    var theCategoryInput = document.getElementById("theCategory");
    var theSubCategoryInput = document.getElementById("theSubCategory");
    var dropDownLabel = document.getElementById("dLabel");

    if (document.documentElement.clientWidth > 768) {
        document.getElementById("categories").removeAttribute("name");
        document.getElementById("sub_category").removeAttribute("name");
    }

    output.innerHTML = slider.value;
    mobileoutput.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
      mobileoutput.innerHTML = this.value;
    }

    mobileslider.oninput = function() {
      output.innerHTML = this.value;
      mobileoutput.innerHTML = this.value;
    }

    function theCatId(catId, catName) {
        theCategoryInput.value = catId
        dropDownLabel.text = catName
    }

    function theSubCatId(subCatId, subCatName) {
        theSubCategoryInput.value = subCatId
        dropDownLabel.text = subCatName
    }


    $('#categories').on('change',function(){
        var categoryID = $('#categories').val();
        if(categoryID){
            $.ajax({
                type:"GET",
                url: 'api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                      var res = JSON.parse(res);
                        // $("#sub_category ").empty();
                        $.each(res,function(key,value){
                        var chosen_value = value;
                            $("#sub_category").append(
                                '<option value="'+key+'">'+chosen_value.name+'</option>'
                            );
                        });
                    }else{
                        $("#sub_category").empty();
                    }
                }
            });
        }else{
            $("#sub_category").empty();
        }
    });


    $('#state').on('change',function(){
        var state_name = $('#state').val();
        if(state_name){
            $.ajax({
                type:"GET",
                url: 'api/get-city-list/'+state_name,
                success:function(res){
                    if(res){
                        console.log(res);
                        console.log(state_name);
                        $("#city").empty();
                        $.each(res,function(key,value){
                            $("#city").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#city").empty();
                    }
                }
            });
        }else{
            $("#city").empty();
        }

    });


    $('#mobilecategories').on('change',function(){
        var categoryID = $(this).val();
        if(categoryID){
            $.ajax({
                type:"GET",
                url: 'api/get-category-list/'+categoryID,
                success:function(res){
                    if(res){
                      var res = JSON.parse(res);
                        $("#mobilesub_category ").empty();
                        $.each(res,function(key,value){
                        var chosen_value = value;
                            $("#mobilesub_category").append(
                                '<option value="'+key+'">'+chosen_value.name+'</option>'
                            );
                        });
                    }else{
                        $("#mobilesub_category").empty();
                        $("#mobilesub_category").append(
                            '<option>No Sub Category</option>'
                        );
                    }
                }
            });
        }else{
            $("#sub_category").empty();
        }
    });


    $('#mobilestate').on('change',function(){
        var state_name = $(this).val();
        if(state_name){
            $.ajax({
                type:"GET",
                url: 'api/get-city-list/'+state_name,
                success:function(res){
                    if(res){
                        console.log(res);
                        console.log(state_name);
                        $("#mobilecity").empty();
                        $.each(res,function(key,value){
                            $("#mobilecity").append('<option value="'+key+'">'+value+'</option>');
                        });

                    }else{
                        $("#mobilecity").empty();
                    }
                }
            });
        }else{
            $("#city").empty();
        }

    });
});

</script>

  <script type="text/javascript">
    $(document).ready( function () {
    // alert('ddsdsd');
    getLocation();
});
</script>

<?php /**PATH C:\xampp\htdocs\yellowpage\resources\views/frontend_section/searchAjax.blade.php ENDPATH**/ ?>