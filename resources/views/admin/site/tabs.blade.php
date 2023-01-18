<div>
    <h1 class="display-6">Редактирование сайта</h1>
</div>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if($active == 'banner') active @endif" aria-current="page" href="/admin/site">Баннер</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'company') active @endif" href="/admin/company">О компании</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'contacts') active @endif" href="/admin/contacts">Контакты</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'partners') active @endif" href="/admin/partners">Партнеры</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'feedbacks') active @endif" href="/admin/feedbacks">Отзывы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($active == 'questions') active @endif" href="/admin/questions">Вопросы</a>
    </li>
</ul>
