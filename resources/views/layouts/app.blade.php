<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fontawesome-free-6/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/feather-icons-web/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>


    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">

        <!--side bar start-->
        <nav class="col-2 bg-black sideBar min-vh-100">
            <i id="mobile__sidebar__remove" class="feather-x mobile__sidebar__remove d-block d-lg-none"></i>
            <a href="#" class="sideBar-brand">
                <div class="d-flex align-items-center justify-content-center">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                         width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
                         preserveAspectRatio="xMidYMid meet">

                        <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                           stroke="none">
                            <path d="M2406 5110 c-68 -11 -862 -217 -887 -231 -56 -30 -28 -139 36 -139
14 0 191 43 392 96 347 91 369 95 417 86 129 -27 2069 -542 2083 -554 18 -15
47 -78 39 -85 -8 -8 -1210 -323 -1223 -320 -7 1 -118 98 -248 216 l-235 213 0
103 c0 122 -15 174 -67 227 -95 98 -267 84 -345 -27 -36 -51 -52 -144 -46
-278 4 -97 5 -100 36 -128 59 -53 200 -73 313 -44 23 6 46 -12 206 -157 99
-89 181 -167 183 -173 2 -5 -70 -29 -161 -53 -140 -37 -183 -44 -295 -49 -78
-3 -157 -1 -195 6 -67 11 -2073 536 -2089 546 -18 11 -11 35 12 45 13 5 214
59 448 120 234 61 435 118 447 126 31 19 38 55 19 92 -16 30 -34 42 -66 42
-41 0 -924 -239 -949 -257 -36 -27 -71 -99 -71 -148 1 -53 30 -117 67 -143 35
-25 84 -39 633 -182 234 -61 432 -114 441 -118 14 -6 2 -54 -90 -364 l-106
-358 -115 0 c-144 0 -233 -19 -335 -69 -183 -90 -306 -274 -321 -478 -11 -147
46 -315 142 -422 l46 -51 -134 0 c-150 -1 -207 -10 -260 -45 -92 -60 -122
-200 -65 -298 31 -52 84 -93 135 -103 40 -8 47 -29 47 -144 0 -115 -7 -136
-47 -144 -51 -10 -104 -51 -134 -102 -37 -63 -39 -158 -6 -222 25 -47 87 -97
133 -107 16 -4 29 -9 29 -12 0 -2 -20 -28 -45 -56 -25 -29 -62 -83 -81 -122
-113 -229 -70 -490 111 -670 81 -81 161 -127 271 -155 76 -20 119 -20 2247
-20 1597 0 2180 3 2208 11 50 15 105 62 129 109 64 126 8 269 -126 319 -44 17
-50 23 -56 57 -8 47 -8 148 1 188 6 30 14 36 70 57 187 70 180 349 -10 416
l-47 17 49 54 c83 91 136 215 145 342 16 210 -102 436 -282 541 l-52 30 21 55
c18 49 19 63 10 109 -22 101 -87 167 -186 190 -60 13 -65 23 -65 140 0 117 5
129 59 136 84 12 132 49 168 129 23 51 27 114 9 173 -17 55 -82 122 -133 136
-25 7 -151 11 -330 11 l-290 0 -106 358 c-92 309 -104 358 -90 364 9 4 243 66
521 139 356 92 516 138 543 156 45 29 76 89 77 148 0 49 -35 121 -71 148 -17
12 -338 101 -840 233 -1372 361 -1304 345 -1454 349 -71 2 -157 0 -189 -5z
m200 -501 c16 -18 19 -37 19 -117 l0 -95 -28 -10 c-16 -5 -48 -6 -73 -2 l-44
6 0 100 c0 86 3 102 20 119 27 27 81 26 106 -1z m673 -1355 c39 -50 78 -213
95 -401 l6 -63 -140 0 c-127 0 -140 2 -140 18 0 39 22 201 36 272 8 41 28 103
44 138 24 52 33 62 54 62 15 0 33 -11 45 -26z m-313 -259 l-10 -75 -1043 0
c-1025 0 -1043 0 -1097 -20 -66 -25 -130 -85 -159 -148 -33 -71 -30 -180 5
-248 31 -59 84 -108 147 -138 l46 -21 1869 -3 c1714 -2 1871 -4 1888 -19 24
-22 23 -78 -2 -103 -20 -20 -33 -20 -1882 -20 -1219 0 -1878 4 -1907 11 -169
39 -306 188 -330 359 -32 235 132 455 365 489 32 5 523 9 1089 10 l1030 1 -9
-75z m1624 62 c51 -26 57 -102 10 -127 -12 -6 -222 -10 -548 -10 l-530 0 -6
58 c-4 31 -9 65 -12 75 -5 16 25 17 528 17 407 0 539 -3 558 -13z m-1638 -337
c8 -83 -3 -80 282 -80 138 0 256 4 263 8 16 10 33 57 33 93 l0 29 428 0 427 0
0 -135 0 -135 -1762 2 -1762 3 -30 29 c-36 34 -53 85 -44 128 7 36 63 95 95
101 13 2 483 5 1044 6 l1021 1 5 -50z m1603 -680 c193 -28 341 -171 376 -365
33 -176 -68 -368 -234 -450 -95 -46 -162 -55 -414 -55 l-212 0 -20 -26 c-28
-35 -26 -69 4 -99 l24 -25 406 0 406 0 26 -26 c20 -20 24 -31 19 -57 -14 -67
144 -62 -1806 -65 l-1770 -2 0 75 0 75 1185 0 1186 0 24 25 c31 30 33 77 5
105 -20 20 -33 20 -1210 20 l-1190 0 0 75 0 75 1603 2 1602 3 46 21 c193 90
235 343 77 478 -83 71 102 66 -2282 66 -1701 0 -2156 3 -2176 13 -13 7 -31 25
-40 40 -13 24 -13 30 0 54 9 15 27 33 40 40 32 16 4214 19 4325 3z m-3705
-430 l0 -130 -227 0 -228 0 0 130 0 130 228 0 227 0 0 -130z m360 -317 l0
-448 -100 -52 -100 -52 0 499 0 500 100 0 100 0 0 -447z m3360 432 c58 -30 80
-118 46 -183 -34 -67 89 -62 -1666 -62 l-1590 0 0 130 0 130 1590 0 c1403 0
1594 -2 1620 -15z m-3720 -480 l0 -75 -294 0 c-179 0 -305 4 -323 10 -28 10
-53 45 -53 74 0 7 9 25 21 40 l20 26 315 0 314 0 0 -75z m0 -299 l0 -74 -157
-4 c-139 -3 -163 -6 -199 -25 -132 -70 -186 -200 -144 -348 10 -37 28 -64 69
-106 99 -98 -129 -89 2325 -89 l2147 0 26 -26 c20 -20 24 -31 19 -57 -3 -18
-16 -40 -27 -49 -20 -17 -138 -18 -2175 -18 -1557 0 -2168 3 -2206 11 -224 48
-380 276 -339 496 30 162 138 288 296 342 50 17 86 20 213 21 l152 0 0 -74z
m2 -297 c6 -80 27 -112 75 -112 16 0 103 39 203 91 l174 92 1711 0 1710 0 0
-135 0 -135 -2065 0 c-1946 0 -2067 1 -2099 18 -50 25 -74 63 -74 116 0 52 21
89 66 116 27 17 51 20 163 20 l131 0 5 -71z"/>
                        </g>
                    </svg>
                    <span class="text-white h3 m-0">Education</span>
                </div>
            </a>
            <ul class="sideBar__nav mt-3">
                <li class="sideBar__header text-white">
                    Pages
                </li>
                <li class="sideBar__item">
                    <a href="#" class="sideBar__link">
                        <i class="feather-sliders"></i>
                        <span class="h6">Dashboard</span>
                    </a>
                </li>

                <div class="my-3"></div>
                <li class="sideBar__header text-white">
                    <i class="feather-book-open me-2"></i>Articles
                </li>
                <li class="sideBar__item">
                    <a href="#" class="sideBar__link" data-sideBar-toggle="articles" aria-expanded="true">
                        <i class="feather-settings"></i>
                        <span class="h6">Control</span>
                        <i class="fa fa-angle-up arrow" data-arrow="articles"></i>
                    </a>
                    <ul id="articles" class="sideBar__dropdown">
                        <li class="sideBar__item">
                            <a href="#" class="sideBar__link"><i class="feather-folder-plus me-1"></i>Create Articles</a>
                        </li>
                        <li class="sideBar__item">
                            <a href="#" class="sideBar__link"><i class="feather-list me-1"></i>Articles</a>
                        </li>
                    </ul>
                </li>

                <div class="my-3"></div>
                <li class="sideBar__header text-white">
                    <i class="feather-users me-2"></i> Users
                </li>
                <li class="sideBar__item">
                    <a href="#" class="sideBar__link" data-sideBar-toggle="users" aria-expanded="true">
                        <i class="feather-settings"></i>
                        <span class="h6">Control</span>
                        <i class="fa fa-angle-up arrow" data-arrow="users"></i>
                    </a>
                    <ul id="users" class="sideBar__dropdown">
                        <li class="sideBar__item">
                            <a href="#" class="sideBar__link"><i class="feather-user-plus me-1"></i>Create Users</a>
                        </li>
                        <li class="sideBar__item">
                            <a href="#" class="sideBar__link"><i class="feather-users me-1"></i>Users</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!--side bar end-->

        <!--main start-->
        <main class="col-10 flex-fill min-vh-100">
            <nav class="navbar navbar-light bg-light shadow-sm p-2">
                <div class="d-flex align-items-center">
                    <i class="feather-menu d-block d-md-none show__mobile__sidebar"></i>
                    <div class="hamburger not-active me-3 d-none d-md-block">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <form class="d-none d-md-block">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search everything" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <button class="btn btn-sm btn-secondary"><i class="feather-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="user__info">
                    <img src="assets/img/user1.jpg" alt="">
                    <span class="d-inline-flex align-items-center">Si Thu Kyaw <i class="feather-chevron-down fw-bolder ms-2"></i></span>
                    <ul class="shadow-sm">
                        <li><a href="#"><i class="feather-user me-1"></i> Profile</a></li>
                        <li><a href="#" class="d-flex align-items-center"><i class="feather-clock me-2"></i>Analytics</a></li>
                        <hr style="margin: .5rem">
                        <li><a href="#" class="d-flex align-items-center"><i class="feather-settings me-2"></i>Setting & Privacy</a></li>
                        <li><a href="#" class="d-flex align-items-center"><i class="feather-log-out me-2"></i>Log Out</a></li>
                    </ul>
                </div>
            </nav>
            <div class="row m-0">
                <div class="p-3">
                    <nav aria-label="breadcrumb" class="p-3 rounded rounded-3" style="background: #00000010">
                        <ol class="breadcrumb bg-transparent m-0">
                            <li class="breadcrumb-item fw-bolder"><a href="#" class="text-secondary">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Articles List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-0 h4">
                                <i class="fa-solid fa-list text-secondary"></i>
                                Article List
                            </h4>
                            <hr>
                            <table id="example" class="display hover cell-border nowrap" style="width:100%">
                                <thead class="">
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>61</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>63</td>
                                    <td>2011-07-25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>66</td>
                                    <td>2009-01-12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2012-03-29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>33</td>
                                    <td>2008-11-28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2012-12-02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>59</td>
                                    <td>2012-08-06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>55</td>
                                    <td>2010-10-14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>39</td>
                                    <td>2009-09-15</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>23</td>
                                    <td>2008-12-13</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>30</td>
                                    <td>2008-12-19</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>22</td>
                                    <td>2013-03-03</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>36</td>
                                    <td>2008-10-16</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>43</td>
                                    <td>2012-12-18</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>19</td>
                                    <td>2010-03-17</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>66</td>
                                    <td>2012-11-27</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>64</td>
                                    <td>2010-06-09</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>59</td>
                                    <td>2009-04-10</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>41</td>
                                    <td>2012-10-13</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>35</td>
                                    <td>2012-09-26</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>30</td>
                                    <td>2011-09-03</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>40</td>
                                    <td>2009-06-25</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>21</td>
                                    <td>2011-12-12</td>
                                    <td>$106,450</td>
                                </tr>
                                <tr>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sydney</td>
                                    <td>23</td>
                                    <td>2010-09-20</td>
                                    <td>$85,600</td>
                                </tr>
                                <tr>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2009-10-09</td>
                                    <td>$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>42</td>
                                    <td>2010-12-22</td>
                                    <td>$92,575</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>28</td>
                                    <td>2010-11-14</td>
                                    <td>$357,650</td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>28</td>
                                    <td>2011-06-07</td>
                                    <td>$206,850</td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>48</td>
                                    <td>2010-03-11</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>20</td>
                                    <td>2011-08-14</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sydney</td>
                                    <td>37</td>
                                    <td>2011-06-02</td>
                                    <td>$95,400</td>
                                </tr>
                                <tr>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>53</td>
                                    <td>2009-10-22</td>
                                    <td>$114,500</td>
                                </tr>
                                <tr>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>27</td>
                                    <td>2011-05-07</td>
                                    <td>$145,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>22</td>
                                    <td>2008-10-26</td>
                                    <td>$235,500</td>
                                </tr>
                                <tr>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>46</td>
                                    <td>2011-03-09</td>
                                    <td>$324,050</td>
                                </tr>
                                <tr>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009-12-09</td>
                                    <td>$85,675</td>
                                </tr>
                                <tr>
                                    <td>Howard Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>San Francisco</td>
                                    <td>51</td>
                                    <td>2008-12-16</td>
                                    <td>$164,500</td>
                                </tr>
                                <tr>
                                    <td>Hope Fuentes</td>
                                    <td>Secretary</td>
                                    <td>San Francisco</td>
                                    <td>41</td>
                                    <td>2010-02-12</td>
                                    <td>$109,850</td>
                                </tr>
                                <tr>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>62</td>
                                    <td>2009-02-14</td>
                                    <td>$452,500</td>
                                </tr>
                                <tr>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>37</td>
                                    <td>2008-12-11</td>
                                    <td>$136,200</td>
                                </tr>
                                <tr>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>65</td>
                                    <td>2008-09-26</td>
                                    <td>$645,750</td>
                                </tr>
                                <tr>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2011-02-03</td>
                                    <td>$234,500</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>38</td>
                                    <td>2011-05-03</td>
                                    <td>$163,500</td>
                                </tr>
                                <tr>
                                    <td>Sakura Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>Tokyo</td>
                                    <td>37</td>
                                    <td>2009-08-19</td>
                                    <td>$139,575</td>
                                </tr>
                                <tr>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>61</td>
                                    <td>2013-08-11</td>
                                    <td>$98,540</td>
                                </tr>
                                <tr>
                                    <td>Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>47</td>
                                    <td>2009-07-07</td>
                                    <td>$87,500</td>
                                </tr>
                                <tr>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>64</td>
                                    <td>2012-04-09</td>
                                    <td>$138,575</td>
                                </tr>
                                <tr>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>63</td>
                                    <td>2010-01-04</td>
                                    <td>$125,250</td>
                                </tr>
                                <tr>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>56</td>
                                    <td>2012-06-01</td>
                                    <td>$115,000</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>43</td>
                                    <td>2013-02-01</td>
                                    <td>$75,650</td>
                                </tr>
                                <tr>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>46</td>
                                    <td>2011-12-06</td>
                                    <td>$145,600</td>
                                </tr>
                                <tr>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>47</td>
                                    <td>2011-03-21</td>
                                    <td>$356,250</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>21</td>
                                    <td>2009-02-27</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>30</td>
                                    <td>2010-07-14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>51</td>
                                    <td>2008-11-13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011-06-27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011-01-25</td>
                                    <td>$112,000</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </main>
        <!--main start-->

    </div>
</div>

<script src="{{asset('dashboard/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<!--<script src="https://cdn.datatables.net/1.12.1/js/dataTables.semanticui.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>-->
<script src="{{asset('dashboard/assets/js/app.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#example').DataTable({
            responsive : true,
            scrollX: true,
        });
    } );
</script>
</body>
</html>
