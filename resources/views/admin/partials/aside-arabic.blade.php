<aside class="c-sidebar">
    <div class="c-sidebar__brand">
        <a href="#"><img src="{{asset('admin-arabic/images/logo-color.png')}}" alt="Neat"></a>
    </div>

    <!-- Scrollable -->
    <div class="c-sidebar__body">
        <span class="c-sidebar__title"> لوحة التحكم : مرحبا {{Auth::guard('admin')->user()?->name}}</span>
        <ul class="c-sidebar__list">
            <li>
                <a class="c-sidebar__link  is-active" href="{{route('admin.index')}}">
                    <i class="c-sidebar__icon feather icon-home"></i>الصفحة الرئيسية
                </a>
            </li>
            <li>
                <a class="c-sidebar__link" href="{{route('admin.teachers')}}">
                    <i class="c-sidebar__icon feather icon-file-text"></i> المدرسين
                </a>
            </li>
            <li>
                <a class="c-sidebar__link" href="{{route('admin.classes')}}">
                    <i class="c-sidebar__icon feather icon-file-text"></i> الفضل الدراسى
                </a>
            </li>
            <li>
                <a class="c-sidebar__link " href="tags.html">
                    <i class="c-sidebar__icon feather icon-file-text"></i> الوسوم
                </a>
            </li>
            <li>
                <a class="c-sidebar__link" href="pages.html">
                    <i class="c-sidebar__icon feather icon-bar-chart-2"></i> الصفحات
                </a>
            </li>
            <li>
                <a class="c-sidebar__link" href="comments.html">
                    <i class="c-sidebar__icon feather icon-bar-chart-2"></i> التعليقات
                </a>
            </li>
            
            <li>
                <a class="c-sidebar__link " href="{{route('admin.profiles')}}">
                    <i class="c-sidebar__icon feather icon-users"></i>الطلاب
                </a>
            </li>
        </ul>
    </div>

    <form  action="{{route('admin.logout')}}" method="post">
        @csrf
    <a class="c-sidebar__footer" href="javascript:{}" onclick="this.closest('form').submit();return false;">
        تسجيل الخروج <i class="c-sidebar__footer-icon feather icon-power"></i>
    </a>
    </form>
</aside>