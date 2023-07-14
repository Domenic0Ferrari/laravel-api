@extends('admin.layouts.base')

@section('contents')
    <h1 class="text-center">Tecnologia</h1>
    <h5 class="text-center">{{ $technology->name }}</h5>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium corporis accusamus iure, porro sint aut necessitatibus architecto, iste nemo libero alias exercitationem aperiam odio mollitia odit animi. Commodi, molestiae.
    Quod molestiae labore impedit sapiente! Error, reiciendis iusto vero maiores recusandae beatae qui perspiciatis ut quam minus eaque odit velit cupiditate aspernatur facilis provident eligendi debitis ea eum dignissimos voluptatum.
    Quae obcaecati aperiam, distinctio sed hic ipsam consequuntur. Repellat odit excepturi sed reprehenderit vel. Consequatur perspiciatis blanditiis laborum repellendus nesciunt cum, veritatis, quisquam at soluta officia iure sed facere quod.
    Ipsa ab aspernatur suscipit sit, quos quas aut quia dolores quaerat tempore, provident sapiente esse quis voluptates corrupti veniam illo alias? Inventore, minus enim. Enim quos corporis incidunt id voluptatum.
    Impedit doloremque, est ipsa culpa earum in dolor facilis ex perferendis soluta expedita accusantium nemo? Asperiores deserunt tenetur earum nulla quasi debitis aspernatur sed ratione similique, dignissimos, accusantium eaque veniam!
    Fugiat aut blanditiis facilis accusamus nisi ipsam cupiditate consectetur quasi? Doloribus asperiores, repellat deleniti, quos illum quis id assumenda repudiandae, quidem vitae sapiente necessitatibus illo officia dolor expedita? Fugit, ratione!
    Deserunt maxime excepturi repudiandae tenetur recusandae alias natus aliquid, pariatur, tempora tempore obcaecati magni reiciendis, blanditiis quod cupiditate id debitis quos? Repellat vitae totam iste tenetur doloremque ab hic dicta.
    Ducimus nisi vel tempore vitae amet odit labore inventore hic ut? Consequuntur quae, placeat beatae fugit ipsam inventore ex nulla autem aliquid iste accusamus explicabo veniam illo necessitatibus? Exercitationem, id.
    Harum nobis magnam illo perspiciatis provident, magni sed unde delectus vero nemo corporis libero nisi ducimus, cupiditate natus temporibus itaque blanditiis vel explicabo, perferendis repellat voluptatem ut! Laborum, eius odit.
    Numquam tenetur adipisci et ab, voluptatem fuga obcaecati iste velit quae inventore. Reiciendis architecto ratione voluptas enim eveniet sit, aut unde provident esse officia cum quam, illum accusamus ut necessitatibus.</p>
    <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">
        Torna alla index
    </a>
@endsection