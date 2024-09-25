<aside class="text-bg-dark">
    <ul class="lh-lg">
        <li>
            <a href="{{ route('admin.home') }}"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        <li>
            <a href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-list"></i> Elenco Progetti</a>
        </li>
        <li>
            <a href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus"></i> Nuovo Progetto</a>
        </li>
        <li>
            <a href="{{ route('admin.types.index') }}"><i class="fa-solid fa-pen-to-square"></i> Gestione Tipo</a>
        </li>
        <li>
            <a href="{{ route('admin.technologies.index') }}"><i class="fa-solid fa-microchip"></i> Gestione
                Tecnologie</a>
        </li>
        <li>
            <a href="{{ route('admin.typeProjects') }}"><i class="fa-solid fa-layer-group"></i> Progetti per tipo</a>
        </li>
    </ul>
</aside>
