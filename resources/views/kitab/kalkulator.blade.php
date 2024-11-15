@extends('partials.navbar')
@section('kalkulator')

    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="author" content="BAZNAS">
        <meta name="author" content="root" />
        <meta name="google-site-verification" content="XrjChdZLXfgJozLAUbTFz54Z6ZJxou0VA6UcztkdakI" />

        <meta property="og:image" content='https://baznas.go.id/assets/images/baznas_logo_putih.jpg' />

        <meta name="facebook-domain-verification" content="01q04p3gc8h6g56guhxw5k5bykb4uo" />
        <!-- tiket id 3055 25/10/2021 -->

        <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>


        <meta property="og:title" content="Kalkulator Zakat" />
        <meta property="og:description"
            content="Hitung zakat Anda secara mudah dan tepat sesuai syariah Islam dengan menggunakan kalkulator zakat BAZNAS." />
        <meta name="title" content="Kalkulator Zakat | BAZNAS RI" />
        <meta name="description"
            content="Hitung zakat Anda secara mudah dan tepat sesuai syariah Islam dengan menggunakan kalkulator zakat BAZNAS." />
        <meta name="keywords"
            content="zakat,infak,sedekah,donasi,muzaki,mustahik,baznas,kurban,qurban,Bayar Zakat Online,zakat online,zakat online baznas,zakat pendapatan online,zakat penghasilan online,zakat fitrah online,zakat harta online,zakat maal online,bayar zakat mal,zakat mal" />

        <title>Kalkulator Zakat | Teras Ilmu Center </title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="">
        <link rel="shortcut icon" href="https://baznas.go.id/assets/Icon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="https://baznas.go.id/assets/Icon/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script type="text/javascript" src="https://baznas.go.id/public/dist/js/app.min.33a487885e53d235ac0a.js"></script>
        <script src=""></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=6088fa2c913d1100118a856f&product=inline-share-buttons"
            async="async"></script>

        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-777219646"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'AW-777219646');
        </script>

        <script>
            function gtag_report_conversion(url) {
                var callback = function() {
                    if (typeof(url) != 'undefined') {
                        window.location = url;
                    }
                };
                gtag('event', 'conversion', {
                    'send_to': 'AW-777219646/v17JCOCerpgBEL7czfIC',
                    'event_callback': callback
                });
                return false;
            }
        </script>

        <link href="https://baznas.go.id/assets/flag-icons/css/flag-icon.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
        <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
        <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

        <style type="text/css">
            a:hover {
                color: #005331;
            }

            .box-lang {
                border: 1px solid #ccc;
                background: white;
                padding: 5px;
                list-style: none;
                position: absolute;
                top: 0;
            }

            .box-lang li {
                margin-bottom: 2px;
            }

            ul.pagination li a {
                color: #005331;
            }

            ul.pagination li a.active {
                background-color: #005331;
                color: #fff;
            }

            @media screen and (min-width: 1250px) {
                #back-to-top2 {
                    right: 19.45rem;
                }
            }
        </style>
        <script type="text/javascript">
            $(window).click(function(e) {
                // console.log(e.target.getAttribute('class'))
                if (e.target.getAttribute('class') == 'sidebar' || e.target.getAttribute('class') ==
                    'fas fa-angle-left right' || e.target.getAttribute('class') == 'nav-link' || e.target.getAttribute(
                        'class') == 'text-uppercase font-weight-bold' || e.target.getAttribute('class') == 'tree' || e
                    .target.getAttribute('class') == 'nav-link tree' || e.target.getAttribute('class') ==
                    'nav nav-treeview pl-4') {

                    $("body").addClass('control-sidebar-slide-open');
                } else {
                    $("body").removeClass('control-sidebar-slide-open');
                }

            })

            window.__lc = window.__lc || {};
            window.__lc.license = 7527371;
            (function() {
                if ($(window).width() >= 994) {
                    var lc = document.createElement('script');
                    lc.type = 'text/javascript';
                    lc.async = true;
                    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') +
                        'cdn.livechatinc.com/tracking.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(lc, s);
                }

            })();
        </script>

        <!-- Facebook Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');

            fbq('init', '278249982706813');
            fbq('track', 'PageView');
        </script>

        <noscript>
            <img height="1" width="1"
                src="https://www.facebook.com/tr?id=278249982706813&ev=PageView
  &noscript=1" />
        </noscript>


        <!-- Google Tag Manager -->
        <script nonce='{SERVER-GENERATED-NONCE}'>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                var n = d.querySelector('[nonce]');
                n && j.setAttribute('nonce', n.nonce || n.getAttribute('nonce'));
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-TV5QRLS');
        </script>
        <!-- End Google Tag Manager -->

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-N7ZEQVBHGZ"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-N7ZEQVBHGZ');
        </script>

        <!-- TikTok -->
        <script>
            ! function(w, d, t) {
                w.TiktokAnalyticsObject = t;
                var ttq = w[t] = w[t] || [];
                ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias",
                    "group", "enableCookie", "disableCookie"
                ], ttq.setAndDefer = function(t, e) {
                    t[e] = function() {
                        t.push([e].concat(Array.prototype.slice.call(arguments, 0)))
                    }
                };
                for (var i = 0; i < ttq.methods.length; i++) ttq.setAndDefer(ttq, ttq.methods[i]);
                ttq.instance = function(t) {
                    for (var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++) ttq.setAndDefer(e, ttq.methods[n]);
                    return e
                }, ttq.load = function(e, n) {
                    var i = "https://analytics.tiktok.com/i18n/pixel/events.js";
                    ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = i, ttq._t = ttq._t || {}, ttq._t[e] = +new Date,
                        ttq._o = ttq._o || {}, ttq._o[e] = n || {};
                    var o = document.createElement("script");
                    o.type = "text/javascript", o.async = !0, o.src = i + "?sdkid=" + e + "&lib=" + t;
                    var a = document.getElementsByTagName("script")[0];
                    a.parentNode.insertBefore(o, a)
                };

                ttq.load('CGIIRRRC77U1JI9QID2G');
                ttq.page();
            }(window, document, 'ttq');
        </script>
        <!-- End TikTok -->

        <!-- meta tag twitter -->
        <meta expr:content='data:blog.title' name='twitter:site' />
        <b:if cond='data:blog.url == data:blog.homepageUrl'>
            <meta expr:content='data:blog.title' name='twitter:title' />
            <b:if cond='data:blog.metaDescription'>
                <meta expr:content='data:blog.metaDescription' property='og:description' />
            </b:if>
        </b:if>
        <b:if cond='data:blog.pageType == &quot;item&quot;'>
            <meta expr:content='data:blog.pageName' name='twitter:title' />
            <b:if cond='data:blog.metaDescription'>
                <meta expr:content='data:blog.metaDescription' name='twitter:description' />
            </b:if>
        </b:if>
        <b:if cond='data:blog.postImageUrl'>
            <meta expr:content='data:blog.postImageUrl' name='twitter:image:src' />
            <b:else />
            <b:if cond='data:blog.postImageThumbnailUrl'>
                <meta expr:content='data:blog.postThumbnailUrl' name='twitter:image:src' />
                <b:else />
                <meta content='https://baznas.go.id' name='twitter:image:src' />
            </b:if>
        </b:if>
        <b:if cond='data:post.firstImageUrl'>
            <meta content='summary_large_image' name='twitter:card' />
            <meta expr:content='data:post.firstImageUrl' name='twitter:image' />
            <b:else />
            <meta content='summary' name='twitter:card' />
            <b:if cond='data:blog.postImageThumbnailUrl'>
                <meta expr:content='data:blog.postImageThumbnailUrl' name='twitter:image' />
            </b:if>
        </b:if>
        <meta content='@baznasindonesia' name='twitter:site' />
        <meta content='@baznasindonesia' name='twitter:creator' />
        <meta expr:content='data:blog.homepageUrl' name='twitter:domain' />
        <meta expr:content='data:blog.canonicalUrl' name='twitter:url' />

        <meta name="google-site-verification" content="f_ml1T1jnvW2K8P49PRrzghwLHmSWKakaR9vean1gCU" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500&display=swap" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    </head>

    <body class="hold-transition" id="control_sidebar">
        <div class="wrapper">

            <div class="mobile">
                <!-- Navbar -->
                <!-- Left navbar links -->
                <ul class="navbar-nav">


                </ul>
                </nav>
                <script type="text/javascript">
                    $(".box-lang").hide()
                    $("#currLang").click(function(e) {
                        e.preventDefault()
                        $(".box-lang").show()
                    })

                    $(".itemLang").click(function(e) {
                        e.preventDefault()
                        var currLang = $("#currLang").find('span').attr('class')
                        var nextLang = $(this).find('span').attr('class')

                        $("#currLang").find('span').removeClass(currLang).addClass(nextLang)
                        $(".box-lang").hide()
                        // alert(currLang)
                    })
                </script>
                <!-- /.navbar -->

                <style type="text/css">
                    select {
                        width: 268px;
                        padding: 5px;
                        font-size: 16px !important;
                        line-height: 1;
                        border: 0;
                        border-radius: 5px;
                        height: 34px;
                        background: url(assets/images/arrow_down.png) no-repeat right #ddd;
                        -webkit-appearance: none;
                        background-position-x: 90%;
                    }
                    .card{
                        w
                    }
                </style>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">

                    <!-- Main content -->
                    <section class="content">
                        <div class="card mb-5 shadow-none">
                            <div class="card-body pb-5 pl-0 pr-0 pt-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mt-1 p-3">
                                            <div class="col-12 mx-auto">
                                                <h2 class="color-main text-capitalize text-bold text-center">kalkulator
                                                    zakat</h2>
                                            </div>

                                            <p class="text-justify">Kalkulator zakat adalah layanan untuk mempermudah
                                                perhitungan jumlah zakat yang harus ditunaikan oleh setiap umat muslim
                                                sesuai ketetapan syariah. Oleh karena itu, bagi Anda yang ingin mengetahui
                                                berapa jumlah zakat yang harus ditunaikan, silahkan gunakan fasilitas
                                                Kalkulator Zakat BAZNAS dibawah ini.</p>

                                            <div class="col-8 mx-auto">
                                                <div class="row">
                                                    <div class="col-12 col-lg-4 col-md-4"
                                                        style="display: flex; align-items: center; justify-content: center; color: #005331; font-size: 15px;">
                                                        <span class="font-weight-bold text-center ">Jenis Zakat :</span>
                                                    </div>
                                                    <div class="col-12 col-lg-8 col-md-8">
                                                        <select
                                                            class="form-control-main form-control rounded-pill font-weight-bold text-black bg-main"
                                                            name="calculator_type" id="calculator_type"
                                                            onchange="change_calculator()">
                                                            <option value="penghasilan">PENGHASILAN</option>
                                                            <option value="perusahaan">PERUSAHAAN</option>
                                                            <option value="perdagangan">PERDAGANGAN</option>
                                                            <option value="emas_perak">EMAS</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                    <!-- penghasilan -->
                                    <div class="col-12" id="penghasilan">
                                        <div class="pl-3 pr-3">
                                            <p class="text-justify">Zakat penghasilan atau yang dikenal juga sebagai zakat
                                                profesi adalah bagian dari zakat maal yang wajib dikeluarkan atas harta yang
                                                berasal dari pendapatan / penghasilan rutin dari pekerjaan yang tidak
                                                melanggar syariah. Nishab zakat penghasilan sebesar 85 gram emas per tahun.
                                                Kadar zakat penghasilan senilai 2,5%. Dalam praktiknya, zakat penghasilan
                                                dapat ditunaikan setiap bulan dengan nilai nishab per bulannya adalah setara
                                                dengan nilai seperduabelas dari 85 gram emas, dengan kadar 2,5%. Jadi
                                                apabila penghasilan setiap bulan telah melebihi nilai nishab bulanan, maka
                                                wajib dikeluarkan zakatnya sebesar 2,5% dari penghasilannya tersebut.
                                                <br /><span style="font-size: 12px;">(Sumber: Al Qur'an Surah Al Baqarah
                                                    ayat 267, Peraturan Menteri Agama Nomor 31 Tahun 2019, Fatwa MUI Nomor 3
                                                    Tahun 2003, dan pendapat Shaikh Yusuf Qardawi).</span>
                                            </p>
                                            <form name="form_penghasilan" id="form_penghasilan" method="post">
                                                <label class="font-weight-normal">Gaji saya per bulan</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            placeholder="" name="pendapatan_perbulan">
                                                    </div>
                                                </div>
                                                <label class="font-weight-normal">Penghasilan lain-lain per bulan</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            placeholder="" name="pendapatan_lain">
                                                    </div>
                                                </div>
                                                <label class="font-weight-normal">Jumlah penghasilan per bulan</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            placeholder="" name="jumlah_penghasilan">
                                                    </div>
                                                </div>
                                                <label class="font-weight-normal">Nisab per tahun</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2"
                                                            name="txt_nishab_pertahun" value="82.312.725" readonly="">
                                                        <small><a
                                                                href="https://baznas.go.id/assets/pdf/ppid/tentang zakat/SK_01_2024.pdf"
                                                                target="_blank"><span class="text-danger">Sesuai SK Ketua
                                                                    BAZNAS No. 1 tahun 2024</span></a></small>
                                                    </div>
                                                </div>
                                                <label class="font-weight-normal">Nisab per bulan</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2"
                                                            name="txt_nishab" value="6.859.394" readonly="">
                                                        <small class="text-danger"><a
                                                                href="https://baznas.go.id/assets/pdf/ppid/tentang zakat/SK_01_2024.pdf"
                                                                target="_blank"><span class="text-danger">Sesuai SK Ketua
                                                                    BAZNAS No. 1 tahun 2024</span></a></small>
                                                    </div>
                                                </div>
                                                <div class="zakat_penghasilan" style="display: none;">
                                                    <label>Jumlah Wajib Zakat yang harus dibayarkan (2,5% dari Jumlah
                                                        Penghasilan)</label>
                                                    <div class="form-group row">
                                                        <label for="input" class="col-sm-1 col-form-label">Rp.</label>
                                                        <div class="col-sm-11">
                                                            <input disabled type="text" class="form-control uang2"
                                                                value="0" placeholder="" name="total_zakat">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="btn_reset_penghasilan col-3 p-3">
                                                        <button type="button"
                                                            class="btn btn-danger font-weight-bold rounded-pill btn-block font-14"
                                                            onclick="resetPenghasilan();">Reset</button>
                                                    </div>
                                                    <div class="btn_hitung_penghasilan col-3 p-3">
                                                        <button type="button"
                                                            class="btn btn-info font-weight-bold rounded-pill btn-block font-14 btn-hover-main"
                                                            onclick="hitungPenghasilan();">Hitung Zakat</button>
                                                    </div>
                                                    <div class="btn_bayar_penghasilan col-6 p-3" style="display: none;">
                                                        <button type="button"
                                                            class="btn btn-main font-weight-bold rounded-pill btn-block btn-hover-main font-14"
                                                            onclick="bayarZakat('zakpro');">Bayar Zakat</button>
                                                    </div>
                                                </div>
                                                <div class="under_nishab" style="display: none;">
                                                    <p class="text-center">Penghasilan Anda belum mencapai Nisab,
                                                        <b>KLIK</b> untuk sedekah
                                                    </p>
                                                    <div class="text-center">
                                                        <button type="button"
                                                            class="btn btn-main font-weight-bold rounded-pill btn-hover-main font-14"
                                                            onclick="bayarSedekah();">Sedekah</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- // penghasilan -->

                                    <!-- perusahaan -->
                                    <div class="col-12" id="perusahaan" style="display: none;">
                                        <div class="">
                                            <div class="col-12">
                                                <div class="card card-primary card-outline card-outline-tabs">
                                                    <div class="card-header p-0 border-bottom-0">
                                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link font-weight-bold active"
                                                                    id="custom-tabs-three-home-tab" data-toggle="pill"
                                                                    href="#custom-tabs-three-home" role="tab"
                                                                    aria-controls="custom-tabs-three-home"
                                                                    aria-selected="true">Jasa</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link font-weight-bold"
                                                                    id="custom-tabs-three-profile-tab" data-toggle="pill"
                                                                    href="#custom-tabs-three-profile" role="tab"
                                                                    aria-controls="custom-tabs-three-profile"
                                                                    aria-selected="false">Dagang/Industri</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                                            <!-- Perusahaan Jasa -->
                                                            <div class="tab-pane fade show active"
                                                                id="custom-tabs-three-home" role="tabpanel"
                                                                aria-labelledby="custom-tabs-three-home-tab">
                                                                <form name="form_perusahaan_jasa" method="post">
                                                                    <label class="font-weight-normal">Pendapatan sebelum
                                                                        pajak</label>
                                                                    <div class="form-group row">
                                                                        <label for="input"
                                                                            class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                                        <div class="col-sm-11">
                                                                            <input type="text"
                                                                                class="form-control uang2" value="0"
                                                                                id="pdp_pre_pajak" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="total_zakper_jasa" style="display: none;">
                                                                        <label>Jumlah Wajib Zakat yang harus dibayarkan
                                                                            (2,5% dari Pendapatan)</label>
                                                                        <div class="form-group row">
                                                                            <label for="input"
                                                                                class="col-sm-1 col-form-label">Rp.</label>
                                                                            <div class="col-sm-11">
                                                                                <input disabled type="text"
                                                                                    class="form-control uang2"
                                                                                    value="0" placeholder=""
                                                                                    name="zakper_jasa">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="btn_zakper_jasa_reset col-6 p-3">
                                                                            <button type="button"
                                                                                class="btn btn-warning font-weight-bold rounded-pill btn-block font-14"
                                                                                onclick="resetZakperJasa();">Reset</button>
                                                                        </div>
                                                                        <div class="btn_zakper_jasa col-6 p-3">
                                                                            <button type="button"
                                                                                class="btn font-weight-bold rounded-pill btn-block font-14 btn-main btn-hover-main"
                                                                                onclick="hitungZakperJasa();">Hitung
                                                                                Zakat</button>
                                                                        </div>
                                                                        <div class="col-6 p-3 btn_bayar_zakper"
                                                                            style="display: none;">
                                                                            <button type="button"
                                                                                class="btn btn-main font-weight-bold rounded-pill btn-block font-14 btn-hover-main"
                                                                                onclick="bayarZakat('zakPerJasa');">Bayar
                                                                                Zakat</button>
                                                                        </div>

                                                                    </div>
                                                                    <div class="under_nishab" style="display: none;">
                                                                        <p class="text-center">Penghasilan Anda belum
                                                                            mencapai Nisab, <b>KLIK</b> untuk sedekah</p>
                                                                        <div class="text-center">
                                                                            <button type="button"
                                                                                class="btn btn-main font-weight-bold rounded-pill btn-hover-main font-14"
                                                                                onclick="bayarSedekah();">Sedekah</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- Perusahaan Dagang -->
                                                            <div class="tab-pane fade" id="custom-tabs-three-profile"
                                                                role="tabpanel"
                                                                aria-labelledby="custom-tabs-three-profile-tab">
                                                                <form name="form_zakper_dagang" method="post">
                                                                    <label class="font-weight-normal">Aktiva Lancar</label>
                                                                    <div class="form-group row">
                                                                        <label for="input"
                                                                            class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                                        <div class="col-sm-11">
                                                                            <input type="text"
                                                                                class="form-control uang2" value="0"
                                                                                placeholder="" name="zakper_aktiva">
                                                                        </div>
                                                                    </div>
                                                                    <label class="font-weight-normal">Pasiva Lancar</label>
                                                                    <div class="form-group row">
                                                                        <label for="input"
                                                                            class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                                        <div class="col-sm-11">
                                                                            <input type="text"
                                                                                class="form-control uang2" value="0"
                                                                                placeholder="" name="zakper_pasiva">
                                                                        </div>
                                                                    </div>
                                                                    <label class="font-weight-normal">Jumlah</label>
                                                                    <div class="form-group row">
                                                                        <label for="input"
                                                                            class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                                        <div class="col-sm-11">
                                                                            <input type="text"
                                                                                class="form-control uang2" value="0"
                                                                                placeholder="" name="jml_omset">
                                                                        </div>
                                                                    </div>
                                                                    <div class="total_zakper_niaga"
                                                                        style="display: none;">
                                                                        <label>Jumlah Wajib Zakat yang harus
                                                                            dibayarkan</label>
                                                                        <div class="form-group row">
                                                                            <label for="input"
                                                                                class="col-sm-1 col-form-label">Rp.</label>
                                                                            <div class="col-sm-11">
                                                                                <input disabled type="text"
                                                                                    class="form-control uang2"
                                                                                    value="0" placeholder=""
                                                                                    value="o" id="jml_zakper_niaga">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">

                                                                        <div class="btn_zakper_niaga_reset col-6 p-3">
                                                                            <button type="button"
                                                                                class="btn btn-warning font-weight-bold rounded-pill btn-block font-14"
                                                                                onclick="resetZakperNiaga();">Reset</button>
                                                                        </div>
                                                                        <div class="btn_zakper_niaga col-6 p-3">
                                                                            <button type="button"
                                                                                class="btn btn-main font-weight-bold rounded-pill btn-block font-14 btn-hover-main"
                                                                                onclick="hitungZakperNiaga();">Hitung
                                                                                Zakat</button>
                                                                        </div>
                                                                        <div class="col-6 p-3 btn_bayar_niaga"
                                                                            style="display: none;">
                                                                            <button type="button"
                                                                                class="btn btn-main font-weight-bold rounded-pill btn-block font-14 btn-hover-main"
                                                                                onclick="bayarZakat('zakPerNiaga');">Bayar
                                                                                Zakat</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="under_nishab" style="display: none;">
                                                                        <p class="text-center">Penghasilan Anda belum
                                                                            mencapai Nisab, <b>KLIK</b> untuk sedekah</p>
                                                                        <div class="text-center">
                                                                            <button type="button"
                                                                                class="btn btn-main font-weight-bold rounded-pill btn-hover-main font-14"
                                                                                onclick="bayarSedekah();">Sedekah</button>
                                                                        </div>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- // perusahaan -->

                                    <!-- perdagangan -->
                                    <div class="col-12" id="perdagangan" style="display: none;">
                                        <div class="pl-3 pr-3">
                                            <form name="form_perdagangan">
                                                <label class="font-weight-normal">Aset Lancar</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            id="aset_lancar" placeholder="">
                                                    </div>
                                                </div>
                                                <label class="font-weight-normal">Laba</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            id="laba" placeholder="">
                                                    </div>
                                                </div>

                                                <label class="font-weight-normal">Jumlah</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            id="jumlah_aset" placeholder="">
                                                    </div>
                                                </div>

                                                <label class="font-weight-normal">Nisab per tahun</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" id="haul_nishab"
                                                            value="82.312.725" readonly="">
                                                        <small><a
                                                                href="https://baznas.go.id/assets/pdf/ppid/tentang zakat/SK_01_2024.pdf"
                                                                target="_blank"><span class="text-danger">Sesuai SK Ketua
                                                                    BAZNAS No. 1 tahun 2024</span></a></small>
                                                    </div>
                                                </div>

                                                <div class="zakat_perdagangan" style="display: none;">
                                                    <label>Jumlah Wajib Zakat yang harus dibayarkan</label>
                                                    <div class="form-group row">
                                                        <label for="input" class="col-sm-1 col-form-label">Rp.</label>
                                                        <div class="col-sm-11">
                                                            <input disabled type="text" class="form-control uang2"
                                                                value="0" id="jml_zak_per" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="btn_zak_per_reset col-6 p-3">
                                                        <button type="button"
                                                            class="btn btn-warning font-weight-bold rounded-pill btn-block font-14"
                                                            onclick="resetZakPerdagangan();">Reset</button>
                                                    </div>
                                                    <div class="btn_zak_per col-6 p-3">
                                                        <button type="button"
                                                            class="btn btn-main btn-hover-main font-weight-bold rounded-pill btn-block font-14"
                                                            onclick="hitungZakPerdagangan();">Hitung Zakat</button>
                                                    </div>
                                                    <div class="col-6 p-3 btn_bayar_perdagangan" style="display: none;">
                                                        <button type="button"
                                                            class="btn btn-main font-weight-bold rounded-pill btn-block font-14 btn-hover-main"
                                                            onclick="bayarZakat('zakPer');">Bayar Zakat</button>
                                                    </div>
                                                </div>
                                                <div class="nishab_zak" style="display: none;">
                                                    <p class="text-center">Harta Anda belum masuk nishab, KLIK untuk
                                                        sedekah</p>
                                                    <div class="text-center">
                                                        <button
                                                            class="btn btn-main font-weight-bold rounded-pill btn-hover-main font-14"
                                                            style="" onclick="bayarSedekah();">Sedekah</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- // perdagangan -->

                                    <!-- emas & perak -->
                                    <div class="col-12" id="emas_perak" style="display: none;">
                                        <div class="pl-3 pr-3">
                                            <form name="form_zakat_emas">
                                                <label class="font-weight-normal">Emas</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2" value="0"
                                                            id="txt_emas" placeholder="">
                                                    </div>
                                                </div>

                                                <label class="font-weight-normal">Nisab per tahun</label>
                                                <div class="form-group row">
                                                    <label for="input"
                                                        class="col-sm-1 col-form-label font-weight-normal">Rp.</label>
                                                    <div class="col-sm-11">
                                                        <input type="text" class="form-control uang2"
                                                            id="haul_nishab2" value="82.312.725" readonly="">
                                                        <small><a
                                                                href="https://baznas.go.id/assets/pdf/ppid/tentang zakat/SK_01_2024.pdf"
                                                                target="_blank"><span class="text-danger">Sesuai SK Ketua
                                                                    BAZNAS No. 1 tahun 2024</span></a></small>
                                                    </div>
                                                </div>

                                                <div class="jml_zak_ms" style="display: none;">
                                                    <label>Jumlah Wajib Zakat yang harus dibayarkan (2,5% dari Nilai
                                                        Emas)</label>
                                                    <div class="form-group row">
                                                        <label for="input" class="col-sm-1 col-form-label">Rp.</label>
                                                        <div class="col-sm-11">
                                                            <input disabled type="text" class="form-control uang2"
                                                                value="0" id="jml_zak_ms" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="btn_zak_ms_reset col-6 p-3">
                                                        <button type="button"
                                                            class="btn btn-warning font-weight-bold rounded-pill btn-block font-14"
                                                            onclick="resetZakEmas();">Reset</button>
                                                    </div>
                                                    <div class="btn_zak_ms col-6 p-3">
                                                        <button type="button"
                                                            class="btn btn-main btn-hover-main font-weight-bold rounded-pill btn-block font-14"
                                                            onclick="hitungZakEmas();">Hitung Zakat</button>
                                                    </div>
                                                    <div class="col-6 p-3 btn_bayar_ms" style="display: none;">
                                                        <button type="button"
                                                            class="btn btn-main font-weight-bold rounded-pill btn-block font-14 btn-hover-main"
                                                            onclick="bayarZakat('emas');">Bayar Zakat</button>
                                                    </div>
                                                </div>
                                                <div class="info_nishab" style="display: none;">
                                                    <p class="text-center">Harta Anda belum masuk nishab, KLIK untuk
                                                        sedekah</p>
                                                    <div class="text-center">
                                                        <button
                                                            class="btn btn-main font-weight-bold rounded-pill btn-hover-main font-14"
                                                            style="" onclick="bayarSedekah();">Sedekah</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- // emas & perak -->
                                </div>
                                <p class="mt-5" style="font-style: italic;font-size:11px">* Sumber kode disediakan oleh BAZNAS agar sesuai dengan ketentuan syariah dalam perhitungan zakat, sehingga memudahkan pengguna untuk menghitung zakat yang harus ditunaikan dengan benar.</p>
                            </div>

                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <script type="text/javascript">
                    $(function() {
                        $('input').on("input change", function() {
                            // zakat penghasilan
                            var pp = parseInt($('input[name=pendapatan_perbulan]').val().replace(/\./g, ""));
                            var pl = parseInt($('input[name=pendapatan_lain]').val().replace(/\./g, ""));
                            // var hc = parseInt($('input[name=cicilan]').val().replace(/\./g, ""));
                            var rs = parseInt(pp) + parseInt(pl);
                            if (isNaN(rs)) {
                                rs = 0
                            }
                            $('input[name=jumlah_penghasilan]').val(formatNumber(rs));

                            // var ms = parseInt($('input[name=harga_emas]').val().replace(/\./g, ""));
                            // var ns = Math.ceil((ms*85)/12);
                            // $('input[name=txt_nishab]').val(formatNumber(ns));

                            //zakat perusahaan industri
                            let ak = parseInt($('input[name=zakper_aktiva]').val().replace(/\./g, ""));
                            let ps = parseInt($('input[name=zakper_pasiva]').val().replace(/\./g, ""));
                            let zp = Math.ceil(ak - ps);
                            if (isNaN(zp)) {
                                zp = 0
                            }
                            // console.log(ak,ps,zp);
                            $('input[name=jml_omset]').val(formatNumber(zp));

                            //zakat perdagangan
                            let al = parseInt($('#aset_lancar').val().replace(/\./g, ""));
                            let lb = parseInt($('#laba').val().replace(/\./g, ""));
                            // let cc = parseInt($('#hutang').val().replace(/\./g, ""));
                            let jm = al + lb;
                            if (isNaN(jm)) {
                                jm = 0
                            }
                            // console.log(al,lb,cc,jm);
                            $('#jumlah_aset').val(formatNumber(jm));
                            // let em = parseInt($('#harga_emas2').val().replace(/\./g, ""));
                            // let ni = em * 85;
                            // $('#haul_nishab').val(formatNumber(ni));

                            //zakat Emas
                            // let hm = parseInt($('#harga_emas3').val().replace(/\./g, ""));
                            // let nm = hm * 85;
                            // $('#haul_nishab2').val(formatNumber(nm));
                        });
                    });

                    function hitungPenghasilan() {
                        // var emas = parseInt($('input[name=harga_emas]').val().replace(/\./g, ""));
                        // var nishab = Math.ceil((emas*85)/12);
                        var nisab = parseInt($('input[name=txt_nishab]').val().replace(/\./g, ""));
                        var tp = parseInt($("input[name=jumlah_penghasilan").val().replace(/\./g, ""));

                        var total = Math.ceil(parseInt(tp) * (0.025));
                        // console.log(emas, nishab, tp);
                        if (tp < nisab) {
                            $(".under_nishab").show();
                            $(".zakat_penghasilan").hide();
                            // $(".btn_hitung_penghasilan").hide();
                            // $(".btn_reset_penghasilan").show();
                        } else {
                            $(".zakat_penghasilan").show();
                            $(".under_nishab").hide();
                            $("input[name=total_zakat]").val(formatNumber(total));
                            $(".btn_hitung_penghasilan").hide();
                            $(".btn_bayar_penghasilan").show();
                        }
                    }

                    function resetPenghasilan(argument) {
                        $("input[name=pendapatan_perbulan],input[name=pendapatan_lain],input[name=cicilan],input[name=jumlah_penghasilan],input[name=total_zakat]")
                            .val(0);
                        $(".btn_hitung_penghasilan").show();
                        $(".btn_bayar_penghasilan").hide();
                        $(".zakat_penghasilan").hide();
                        $(".under_nishab").hide();
                    }

                    function formatNumber(num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                    }

                    function hitungZakperJasa() {
                        let bruto = parseInt($('#pdp_pre_pajak').val().replace(/\./g, ""));
                        var nisab_thn = parseInt($('input[name=txt_nishab_pertahun]').val().replace(/\./g, ""));

                        if (bruto < nisab_thn) {
                            $(".under_nishab").show();
                            $(".total_zakper_jasa").hide();
                            // $(".btn_hitung_penghasilan").hide();
                            // $(".btn_reset_penghasilan").show();
                        } else {
                            $("input[name=zakper_jasa]").val(formatNumber(bruto * 0.025));
                            $(".total_zakper_jasa").show();
                            $(".btn_bayar_zakper").show();
                            $(".btn_zakper_jasa").hide();
                        }
                    }

                    function resetZakperJasa() {
                        $("#pdp_pre_pajak, input[name=zakper_jasa]").val(0);
                        $(".btn_bayar_zakper").hide();
                        $(".btn_zakper_jasa").show();
                        $(".total_zakper_jasa").hide();
                        $(".under_nishab").hide();
                    }

                    function hitungZakperNiaga() {
                        let tp = parseInt($('input[name=jml_omset]').val().replace(/\./g, ""));
                        // console.log(tp*0.025);
                        var nisab_thn = parseInt($('input[name=txt_nishab_pertahun]').val().replace(/\./g, ""));

                        if (tp < nisab_thn) {
                            $(".under_nishab").show();
                            $(".total_zakper_niaga").hide();
                            // $(".btn_hitung_penghasilan").hide();
                            // $(".btn_reset_penghasilan").show();
                        } else {
                            $("#jml_zakper_niaga").val(formatNumber(tp * 0.025));
                            $(".total_zakper_niaga").show();
                            $(".btn_bayar_niaga").show();
                            $(".btn_zakper_niaga").hide();
                        }
                    }

                    function resetZakperNiaga() {
                        $("input[name=zakper_aktiva], input[name=zakper_pasiva], input[name=jml_omset]").val(0);
                        $(".btn_bayar_niaga").hide();
                        $(".btn_zakper_niaga").show();
                        $(".total_zakper_niaga").hide();
                        $(".under_nishab").hide();
                    }

                    function hitungZakPerdagangan() {
                        let zp = parseInt($('#jumlah_aset').val().replace(/\./g, ""));
                        let hn = parseInt($('#haul_nishab').val().replace(/\./g, ""));
                        if (zp < hn) {
                            $(".nishab_zak").show();
                            $(".zakat_perdagangan").hide();
                        } else {
                            $("#jml_zak_per").val(formatNumber(zp * 0.025));
                            $(".zakat_perdagangan").show();
                            $(".btn_bayar_perdagangan").show();
                            $(".btn_zak_per").hide();
                        }
                    }

                    function resetZakPerdagangan() {
                        $("#aset_lancar, #laba, #hutang, #jumlah_aset, #harga_emas2, #jml_zak_per").val(0);
                        $(".btn_bayar_perdagangan").hide();
                        $(".btn_zak_per").show();
                        $(".zakat_perdagangan").hide();
                        $(".nishab_zak").hide();
                    }

                    function hitungZakEmas() {
                        let zm = parseInt($('#txt_emas').val().replace(/\./g, ""));
                        let hn2 = parseInt($('#haul_nishab2').val().replace(/\./g, ""));
                        if (zm < hn2) {
                            $(".info_nishab").show();
                            $(".jml_zak_ms").hide();
                        } else {
                            $("#jml_zak_ms").val(formatNumber(zm * 0.025));
                            $(".jml_zak_ms").show();
                            $(".btn_bayar_ms").show();
                            $(".btn_zak_ms").hide();
                        }
                    }

                    function resetZakEmas() {
                        $("#txt_emas, #jml_zak_ms").val(0);
                        $(".btn_bayar_ms").hide();
                        $(".btn_zak_ms").show();
                        $(".jml_zak_ms").hide();
                        $(".info_nishab").hide();
                    }

                    function bayarSedekah() {
                        window.location = 'https://baznas.go.id/sedekahbaznas';
                    }

                    function bayarZakat(type) {
                        if (type == 'zakpro') {
                            var jns = 'profesi';
                            var jml = $("input[name=total_zakat]").val();
                        } else if (type == 'zakPerJasa') {
                            var jns = 'maal';
                            var jml = $("input[name=zakper_jasa]").val();
                        } else if (type == 'zakPerNiaga') {
                            var jns = 'maal';
                            var jml = $("#jml_zakper_niaga").val();
                        } else if (type == 'zakPer') {
                            var jns = 'maal';
                            var jml = $("#jml_zak_per").val();
                        } else if (type == 'emas') {
                            var jns = 'maal';
                            var jml = $("#jml_zak_ms").val();
                        } else {
                            var jns = '';
                            var jml = 0;
                        }

                        window.location = 'https://baznas.go.id/bayarzakat?jenis=' + jns +
                            '&param1=0&param2=0&param3=0&param4=0&jumlah=' + jml + '';
                    }



                    function formatRupiah(angka, prefix) {
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        // tambahkan titik jika yang di input sudah menjadi angka ribuan
                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
                    }

                    $(".uang2").keyup(function(e) {
                        var nilai = formatRupiah($(this).val(), '');
                        $(this).val(nilai.replace(/^0+/, ''));
                    })
                </script>


                <div class="d-block d-sm-none">
                    <a id="back-to-top" href="#" class="btn btn-main btn-hover-main back-to-top" role="button"
                        aria-label="Scroll to top" style="display: none; bottom: 11rem;border:1px solid #fff">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                </div>
                <!-- 28.25rem -->
                <div class="d-none d-sm-block">
                    <a id="back-to-top2" href="#" class="btn btn-main btn-hover-main back-to-top" role="button"
                        aria-label="Scroll to top" style="display: none; bottom: 11rem; border:1px solid #fff">
                        <i class="fas fa-chevron-up"></i>
                    </a>
                    <!-- <a href="https://bazn.as/WAlayanan" class="btn btn-primary back-to-top bg-transparent border-0 p-0" target="_blank" role="button" style="max-width: 40px; bottom: 7.25rem; ">
                  <img src="https://baznas.go.id/assets/images/whatsapp_02.png" class="img-fluid">
                </a> -->
                </div>





                <!-- bottom-menu -->

                <style>
                    p.text-bottom-menu {
                        color: #797877;
                    }

                    .img-fluid-new {
                        max-height: 28px;
                    }

                    .img-fluid-new:active {
                        background-color: #ccc;
                    }
                </style>
                <!-- /.right sidebar -->
            </div>
        </div>

    </body>

    </html>

@stop
