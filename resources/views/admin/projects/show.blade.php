@extends('admin.layouts.base')

@section('contents')
    <h1 class="text-center mt-3">{{ $project->title }}</h1>
    <h2 class="text-center">Type: {{ $project->type->name }}</h2>
    <h3 class="text-center">Technologies: {{ implode(', ', $project->technologies->pluck('name')->all()) }}</h3>
    <h3 class="text-center mt-3">
        <a href="{{ $project->url_github}}">{{ $project->url_github}}</a>
    </h3>
    @if ($project->image)
    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
    @endif
    <p class="mt-3">{{ $project->description }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique quia excepturi eos sed facilis fuga ad dicta labore sint? Et quasi modi ullam quia harum consectetur repudiandae eius aliquid quisquam?
    Facilis veniam beatae natus corrupti numquam non ad, ipsam sunt! Repudiandae voluptas esse atque inventore doloremque alias velit repellendus labore aut error facilis ullam porro odio, soluta sapiente quia necessitatibus!
    In dolore odit tenetur? Similique, voluptatibus! Sunt ut fuga maiores quidem beatae expedita deleniti sapiente! Molestias quas praesentium nostrum quos dolore, pariatur optio ipsum expedita consequuntur esse ipsam quibusdam ea.
    Ullam beatae soluta quia amet aperiam voluptatibus assumenda distinctio deserunt. Repellendus dolorem ut debitis nostrum dignissimos soluta at, modi odio non mollitia fuga dolore numquam, corporis cupiditate facilis sunt libero?
    Autem explicabo itaque illo praesentium assumenda, animi tempore accusantium neque cumque voluptatum totam iste quibusdam nemo cupiditate adipisci fugiat dolorum consequatur vitae ipsum? Eius voluptatem officia suscipit a veritatis alias.
    Quidem iste excepturi quos amet dolorum fugit dolore praesentium sint, voluptatibus aut eaque eius deserunt maxime ab voluptate impedit voluptatum asperiores. Molestias repudiandae inventore similique ratione rem voluptatum est amet?
    Natus perferendis at, dolorem adipisci reiciendis tempore. Earum hic neque ab iure aut voluptate sint cum rem asperiores est, qui tenetur et aperiam natus aliquam iusto in ipsam exercitationem error?
    Mollitia officia voluptatibus, corrupti itaque ipsam architecto quae quo hic commodi ipsum, laborum sunt beatae expedita, alias recusandae porro blanditiis ex assumenda! Quo vitae obcaecati tempore rem voluptas officia debitis.
    Accusamus, nisi minus inventore beatae commodi debitis nihil corrupti obcaecati. Aliquam, excepturi eaque molestias officiis delectus laborum ut cupiditate autem dicta quae illum non illo recusandae ea explicabo? Deleniti, minus?
    Illo voluptatum numquam atque quisquam, explicabo ad odit accusamus. Id porro tempore, iure cumque tempora incidunt quo dolore amet debitis explicabo dolores possimus autem minus optio quia vitae non sed!</p>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
    Torna alla index
    </a>
@endsection