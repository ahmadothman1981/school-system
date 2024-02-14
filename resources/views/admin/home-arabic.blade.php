@extends('admin.master-arabic')
@section('title','Admin Dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="c-state-card c-state-card--info">
                <h4 class="c-state-card__title">اجمالي عدد البلاغات</h4>
                <span class="c-state-card__number">20</span>
            </div>
        </div>

        <div class="col-md-4">
            <div class="c-state-card c-state-card--success">
                <h4 class="c-state-card__title">تم الحل</h4>
                <span class="c-state-card__number">14</span>

            </div>
        </div>

        <div class="col-md-4">
            <div class="c-state-card c-state-card--fancy">
                <h4 class="c-state-card__title">جاري التحقيق</h4>
                <span class="c-state-card__number">6</span>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="c-card u-ph-zero u-pb-zero">

                <div class="u-ph-medium">
                    <h4>عدد البلاغات</h4>
                    <p>اجمالي عدد البلاغات التي تم تسجيلها</p>
                    <span class="u-h1">20</span>
                </div>
                <div class="u-p-medium">
                    <div class="c-chart">
                        <div class="sales-chart"></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="c-card u-ph-zero u-pb-zero">

                <div class="u-ph-medium">
                    <h4>تم الحل</h4>
                    <p>اجمالي عدد البلاغات التي تم حلها</p>

                    <span class="u-h1">16</span>
                </div>

                <div class="u-p-medium">
                    <div class="c-chart">
                        <div class="payouts-chart"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="c-table-responsive@wide">
                <table class="c-table">
                    <thead class="c-table__head">
                        <tr class="c-table__row">
                            <th class="c-table__cell c-table__cell--head">#</th>
                            <th class="c-table__cell c-table__cell--head">اسم المبلغ</th>
                            <th class="c-table__cell c-table__cell--head">الجهة</th>
                            <th class="c-table__cell c-table__cell--head">تاريخ البلاغ</th>
                            <th class="c-table__cell c-table__cell--head">الحالة</th>
                            <th class="c-table__cell c-table__cell--head">اخر تعديل بواسطة</th>
                            <th class="c-table__cell c-table__cell--head">تاريخ اخر تعديل</th>
                            <th class="c-table__cell c-table__cell--head"> عرض/تعديل</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="c-table__row">
                            <td class="c-table__cell">20</td>
                            <td class="c-table__cell">
                                <div class="o-media">

                                    <div class="o-media__body">
                                        <a href="balagh.html">
                                            <a href="balagh.html">
                                                <h6>حنان محمود</h6>
                                            </a>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">المركز القومي للمرأة</td>
                            <td class="c-table__cell">19-10-2021</td>
                            <td class="c-table__cell">
                                <a class="c-badge c-badge--small c-badge--danger" href="#">لم يتم ادخال
                                    بيانات</a>
                            </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell">
                                <a href="#" class="c-btn c-btn--info has-icon">
                                    تعديل <i class="feather icon-wranch"></i>
                                </a>
                            </td>
                        </tr>

                        <tr class="c-table__row">
                            <td class="c-table__cell">19</td>
                            <td class="c-table__cell">
                                <div class="o-media">

                                    <div class="o-media__body">
                                        <a href="balagh.html">
                                            <h6>أسماء حمزة</h6>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">المركز القومي للمرأة</td>
                            <td class="c-table__cell">23-09-2021</td>
                            <td class="c-table__cell">
                                <a class="c-badge c-badge--small c-badge--warning" href="#">جاري التحقيق</a>
                            </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell">
                                <a href="#" class="c-btn c-btn--info has-icon">
                                    تعديل <i class="feather icon-wranch"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">18</td>
                            <td class="c-table__cell">
                                <div class="o-media">

                                    <div class="o-media__body">
                                        <a href="balagh.html">
                                            <h6>وفاء فرج</h6>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">المركز القومي للمرأة</td>
                            <td class="c-table__cell">19-09-2021</td>
                            <td class="c-table__cell">
                                <a class="c-badge c-badge--small c-badge--warning" href="#">جاري التحقيق</a>
                            </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell">
                                <a href="#" class="c-btn c-btn--info has-icon">
                                    تعديل <i class="feather icon-wranch"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">17</td>
                            <td class="c-table__cell">
                                <div class="o-media">

                                    <div class="o-media__body">
                                        <a href="balagh.html">
                                            <h6>سحر أبو المعاطى</h6>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">المركز القومي للمرأة</td>
                            <td class="c-table__cell">19-07-2021</td>
                            <td class="c-table__cell">
                                <a class="c-badge c-badge--small c-badge--success" href="#">تم الحل</a>
                            </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell">
                                <a href="#" class="c-btn c-btn--info has-icon">
                                    تعديل <i class="feather icon-wranch"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">16</td>
                            <td class="c-table__cell">
                                <div class="o-media">
                                    <div class="o-media__body">
                                        <a href="balagh.html">
                                            <h6>رانيا أسامة</h6>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">المركز القومي للمرأة</td>
                            <td class="c-table__cell">02-07-2021</td>
                            <td class="c-table__cell">
                                <a class="c-badge c-badge--small c-badge--success" href="#">تم الحل</a>
                            </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell">
                                <a href="#" class="c-btn c-btn--info has-icon">
                                    تعديل <i class="feather icon-wranch"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="c-table__row">
                            <td class="c-table__cell">15</td>
                            <td class="c-table__cell">
                                <div class="o-media">

                                    <div class="o-media__body">
                                        <a href="balagh.html">
                                            <h6>سهى مجدي</h6>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="c-table__cell">المركز القومي للمرأة</td>
                            <td class="c-table__cell">19-11-2018</td>
                            <td class="c-table__cell">
                                <a class="c-badge c-badge--small c-badge--success" href="#">تم الحل</a>
                            </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell"> </td>
                            <td class="c-table__cell">
                                <a href="#" class="c-btn c-btn--info has-icon">
                                    تعديل <i class="feather icon-wranch"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @include('admin.partials.footer-arabic')
            
        </div>
    </div>
</div>

@endsection