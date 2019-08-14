<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quản lý nhân sự || Nhóm 3</title>
    <base href="{{asset('')}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="ThemeAdmin/css/main.css">
    <link rel="stylesheet" type="text/css" href="ThemeAdmin/css/style.css">
{{--<link rel="stylesheet" href="ThemeAdmin/vendors/bootstrap/css/bootstrap.min.css">--}}
<!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{route('admin.trangchu')}}">Thành Hạnh</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
                                    aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                        class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">Bạn có tin nhắn mới.</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                        class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i
                                            class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">1 tin nhắn từ mail</p>
                                <p class="app-notification__meta">2 phút trước</p>
                            </div>
                        </a></li>

                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span
                                        class="app-notification__icon"><span class="fa-stack fa-lg"><i
                                                class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Lisa nhắn 1 mail</p>
                                    <p class="app-notification__meta">5 phút trước</p>
                                </div>
                            </a></li>
                    </div>
                </div>
                <li class="app-notification__footer"><a href="#">Xem tất cả các tin nhắn.</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                        class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> cài đặt</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Thông tin</a></li>
                <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Đăng Xuất</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="ThemeAdmin/img/a.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">Thành</p>
            <p class="app-sidebar__user-designation">155D4802010010</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{route('admin.trangchu')}}"><i
                        class="app-menu__icon fa fa-home fa-lg"></i><span
                        class="app-menu__label">Trang chủ</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Phòng Ban</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.get.list.phong')}}"><i
                                class="icon fa fa-circle-o"></i>Quản lý Phòng ban</a></li>

                <li><a class="treeview-item" href="{{route('admin.get.selectns.phong')}}"><i
                                class="icon fa fa-circle-o"></i> Chi tiết Phòng ban</a></li>
                <li><a class="treeview-item" href="{{route('admin.get.nhatkyIndex.phong')}}"><i
                                class="icon fa fa-circle-o"></i> Nhật ký Phòng ban</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon icon fa fa-users "></i><span
                        class="app-menu__label">Nhân Sự</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.get.index.nhansu')}}"><i
                                class="icon fa fa-circle-o"></i>Quản lý Nhân sự</a></li>
                <li><a class="treeview-item" href="{{route('admin.get.lichsucongtac.nhansu','1')}}"><i
                                class="icon fa fa-circle-o"></i>Lịch sử công tác</a></li>
                <li><a class="treeview-item" href="{{route('admin.get.index.xinnghi','1')}}"><i
                                class="icon fa fa-circle-o"></i>Xin nghỉ</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Chỉ Tiêu</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.get.list.chitieu')}}"><i
                                class="icon fa fa-circle-o"></i>Quản lý Chỉ tiêu</a></li>
                <li><a class="treeview-item" href="{{route('admin.get.danhsachchitieu.chitieu')}}"><i
                                class="icon fa fa-circle-o"></i>Danh sách Chỉ tiêu</a></li>
                <li><a class="treeview-item" href="{{route('admin.get.IndexNhansu.chitieu')}}"><i
                                class="icon fa fa-circle-o"></i>Chi tiết chỉ tiêu nhân sự</a></li>

            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Nhật ký nghỉ</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{route('admin.get.list.nhatkynghi')}}"><i
                                class="icon fa fa-circle-o"></i>Liệt kê theo năm</a></li>
                <li><a class="treeview-item" href="{{route('admin.get.listthang.nhatkynghi')}}"><i
                                class="icon fa fa-circle-o"></i>Liệt kê theo tháng</a></li>

            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Thống kê</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
            <?php $date = getdate()?>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="admin/thongke/nhan-su/{{$date['year']}}"><i
                                class="icon fa fa-circle-o"></i>Biến động nhân sự</a></li>
                <li><a class="treeview-item" href="admin/thongke/chi-tieu/{{$date['year']}}/1"><i
                                class="icon fa fa-circle-o"></i>Biến động chỉ tiêu</a></li>

            </ul>
        </li>
    </ul>
</aside>


<!---->
<!---->


@yield('content')

<!---->

<!-- Essential javascripts for application to work-->
<script src="ThemeAdmin/js/jquery-3.2.1.min.js"></script>
<script src="ThemeAdmin/js/xuly.js"></script>
<script src="ThemeAdmin/js/popper.min.js"></script>
<script src="ThemeAdmin/js/bootstrap.min.js"></script>
<script src="ThemeAdmin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="ThemeAdmin/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script src="ThemeAdmin/js/chart.js/Chart.min.js"></script>
<script type="text/javascript" src="ThemeAdmin/js/chart.js/demo/chart-bar-demo.js"></script>
<script src="ThemeAdmin/js/chart.js/demo/chart-area-demo.js"></script>
<script src="ThemeAdmin/js/chart.js/demo/chart-pie-demo.js"></script>
<script src="ThemeAdmin/js/chart.js/demo/lineChiTieu.js"></script>
<script src="ThemeAdmin/js/chart.js/demo/pieChiTieu.js"></script>
<script src="ThemeAdmin/js/chart.js/demo/barChiTieu.js"></script>
<script src="ThemeAdmin/js/myjs.js"></script>
<!-- Google analytics script-->
<script type="text/javascript">
    if (document.location.hostname == 'pratikborsadiya.in') {
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>

<script type="text/javascript">
    $('#edit').on('show.bs.modal', function (event) {


        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var descriptiton = button.data('mydescriptiton')
        var cat_id = button.data('catid')

        var modal = $(this)
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #des').val(descriptiton);
        modal.find('.modal-body #cat_id').val(cat_id);
    })
</script>

<script type="text/javascript">
    $('#update').on('show.bs.modal', function (event) {


        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var descriptiton = button.data('mydescriptiton')
        var cat_id = button.data('catid')


        var modal = $(this)
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #des').val(descriptiton);
        modal.find('.modal-body #cat_id').val(cat_id);

    })
</script>

<script type="text/javascript">
    $('#updateChitieuNhansu').on('show.bs.modal', function (event) {


        var button = $(event.relatedTarget)
        var id = button.data('idid')


        var a = button.data('idchitieu')
        var b = button.data('idnhansu')
        var c = button.data('diemct')
        var d = button.data('diemdd')
        var e = button.data('khenthuong')
        var f = button.data('thag')
        var g = button.data('namm')
        // var h = button.data('kq')
        var m = button.data('canhbao')


        var modal = $(this)
        modal.find('.modal-body #id_id').val(id);

        modal.find('.modal-body #id_chitieu').val(a);
        modal.find('.modal-body #id_nhansu').val(b);
        modal.find('.modal-body #diemct').val(c);
        modal.find('.modal-body #diemdd').val(d);
        modal.find('.modal-body #khen_thuong').val(e);
        modal.find('.modal-body #thag').val(f);
        modal.find('.modal-body #namm').val(g);
        // modal.find('.modal-body #kq').val(h);
        modal.find('.modal-body #canh_bao').val(m);
    })
</script>
</body>
</html>