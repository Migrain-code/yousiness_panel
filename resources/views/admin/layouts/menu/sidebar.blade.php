<div class="dlabnav">
    <div class="dlabnav-scroll">

        <ul class="metismenu" id="menu">
            <li>
                <a class="has-arrow " href="{{route('admin.home')}}">
                    <i class="material-icons-outlined">home</i>
                    <span class="nav-text">Startseite</span>
                </a>
            </li>
            <li>
                <a class="has-arrow " href="{{route('admin.customer.index')}}">
                    <i class="material-icons-outlined">home</i>
                    <span class="nav-text">Kunden</span>
                </a>
            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">business</i>
                    <span class="nav-text">Geschäftspartner</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('admin.business.index')}}">Business Liste</a>
                    </li>
                    <li>
                        <a href="{{route('admin.businnessType.index')}}">Kategorien Liste</a>
                    </li>
                </ul>

            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">business</i>
                    <span class="nav-text">Salon Kategorien</span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('admin.businessCategory.index')}}">Kategorienliste</a>
                    </li>
                </ul>

            </li>
            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">inbox</i>
                    <span class="nav-text">Paket Einstellungen
                    </span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('admin.bussinessPackagePropartieList.index')}}">Inhalte</a>
                    </li>
                    <li>
                        <a href="{{route('admin.businessPackage.index')}}">Pakete</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">list</i>
                    <span class="nav-text">Dienstleistungen
                    </span>
                </a>
                <ul aria-expanded="false">
                    <li>
                        <a href="{{route('admin.serviceCategory.index')}}">Oberkategorien</a>
                    </li>
                    <li>
                        <a href="{{route('admin.serviceSubCategory.index')}}">Unterkategorien</a>
                    </li>
                </ul>
            </li>
            <li @if(request()->routeIs('admin.blog.*')) class="mm-active"  @endif >
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">public</i>
                    <span class="nav-text">Gemeinsame Transaktionen
                    </span>
                </a>
                <ul  @if(request()->routeIs('admin.blog.*')) class="mm-collapse mm-show" aria-expanded="true" @else aria-expanded="false" @endif>

                    <li>
                        <a href="{{route('admin.comment.index')}}">Kommentare</a>
                    </li>
                    <li>
                        <a href="{{route('admin.sponsor.index')}}">Sponsoren</a>
                    </li>
                </ul>
            </li>
            <li @if(request()->routeIs('admin.blog.*')) class="mm-active"  @endif >
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">public</i>
                    <span class="nav-text">Web Einstellungen (Business)
                    </span>
                </a>
                <ul>

                    <li>
                        <a href="{{route('admin.sponsor.index')}}">Sponsoren</a>
                    </li>

                    <li>
                        <a href="{{route('admin.businessFaq.index')}}">FAQ</a>
                    </li>
                    <li>
                        <a href="{{route('admin.propartie.index')}}">Besonderheiten</a>
                    </li>

                    <li>
                        <a href="{{route('admin.mainPageSection.index')}}">Startseite 1</a>
                    </li>
                    <li>
                        <a href="{{route('admin.business.mainPage')}}">Startseite 2</a>
                    </li>
                    <li>
                        <a href="{{route('admin.business.settings')}}">Einstellungen</a>
                    </li>
                </ul>
            </li>
            <li @if(request()->routeIs('admin.blog.*')) class="mm-active"  @endif >
                <a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
                    <i class="material-icons-outlined">public</i>
                    <span class="nav-text">Web Einstellungen (Kunden)
                    </span>
                </a>
                <ul  @if(request()->routeIs('admin.blog.*')) class="mm-collapse mm-show" aria-expanded="true" @else aria-expanded="false" @endif>
                    <li>
                        <a href="{{route('admin.blog.index')}}">Blogs</a>
                    </li>
                    <li>
                        <a href="{{route('admin.page.index')}}">Rechtliches</a>
                    </li>
                    <li>
                        <a href="{{route('admin.faq.index')}}">FAQ</a>
                    </li>
                    <li>
                        <a href="{{route('admin.forBusiness.index')}}">Über uns</a>
                    </li>
                    <li>
                        <a href="{{route('admin.ads.index')}}">Werbung</a>
                    </li>
                    <li>
                        <a href="{{route('admin.user.mainPage')}}">Startseite</a>
                    </li>
                    <li>
                        <a href="{{route('admin.featuredCategorie.index')}}">Öne Çıkanlar</a>
                    </li>
                    <li>
                        <a href="{{route('admin.recommendedLink.index')}}">Önerilen Linkler</a>
                    </li>
                    <li>
                        <a href="{{route('admin.activity.index')}}">Events</a>
                    </li>
                    <li>
                        <a href="{{route('admin.user.settings')}}">Einstellungen</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow " href="{{route('admin.businessInfo.index')}}">
                    <i class="material-icons-outlined">notifications</i>
                    <span class="nav-text">Business Anfragen</span>
                    <span class="badge badge-danger" style="border-radius: 50%">{{$globalData["infos"]->count()}}</span>
                </a>
            </li>

            <li>
                <a class="has-arrow " href="{{route('admin.support.index')}}">
                    <i class="material-icons-outlined">help</i>
                    <span class="nav-text">Support Anfragen</span>
                </a>
            </li>

        </ul>

    </div>
</div>
