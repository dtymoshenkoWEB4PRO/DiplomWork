<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('personal.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Головна сторінка
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.post.index')}}" class="nav-link">
                    <i class="nav-icon far fa-clipboard"></i>
                    <p>
                        Мої петиції
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link">
                    <i class="nav-icon far fa-heart"></i>
                    <p>
                        Петиції, за які я вже проголосував
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('personal.anonimliked.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Петиції, за які я вже проголосував анонімно
                    </p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
