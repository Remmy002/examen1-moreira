
C:\Users\Remmy\Documents\560\1\examen\examen1-moreira>php artisan tinker
Psy Shell v0.12.22 (PHP 8.3.30 — cli) by Justin Hileman
New PHP manual is available (latest: 3.0.5). Update with `doc --update-manual`
// 1. Contar usuarios 
> App\Models\User::count();

= 5

// 2. Contar categorías 
> App\Models\Category::count();

= 5

// 3. Contar notas
> App\Models\Note::count();

= 10


// Buscamos al primer usuario
> $u = App\Models\User::first();

= App\Models\User {#7357
    id: 1,
    name: "Dr. Wilford Schmidt MD",
    email: "bergnaum.rex@example.org",
    email_verified_at: "2026-04-24 13:01:38",
    #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
    #remember_token: "4EQ2xKnaul",
    created_at: "2026-04-24 13:01:39",
    updated_at: "2026-04-24 13:01:39",
  }


// Obtenemos sus notas donde el rol en la tabla pivote sea 'owner'
> $u->notes()->wherePivot('role', 'owner')->get();

= Illuminate\Database\Eloquent\Collection {#8650
    all: [
      App\Models\Note {#7361
        id: 2,
        title: "Consectetur impedit dolore.",
        content: "Aut inventore omnis officiis reprehenderit fugit. Alias sit non omnis et delectus. Autem fugit in voluptatem ut architecto magnam. Facere pariatur qui cumque est velit quaerat.",
        is_pinned: false,
        category_id: 4,
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#8108
          user_id: 1,
          note_id: 2,
          role: "owner",
          created_at: "2026-04-24 13:01:39",
          updated_at: "2026-04-24 13:01:39",
        },
      },
      App\Models\Note {#8073
        id: 5,
        title: "Totam aperiam eaque.",
        content: "Odio quaerat tempore vel. Sed accusantium laborum non est. Alias nesciunt nobis et magni velit omnis. Optio nihil impedit perspiciatis.",
        is_pinned: false,
        category_id: 3,
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#8653
          user_id: 1,
          note_id: 5,
          role: "owner",
          created_at: "2026-04-24 13:01:39",
          updated_at: "2026-04-24 13:01:39",
        },
      },
      App\Models\Note {#8109
        id: 8,
        title: "Voluptatem quis quis.",
        content: "Sapiente quos dolorem suscipit aut sit. Dignissimos rem est ipsam officiis rerum excepturi. Ex temporibus architecto odio.",
        is_pinned: false,
        category_id: 1,
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#8651
          user_id: 1,
          note_id: 8,
          role: "owner",
          created_at: "2026-04-24 13:01:39",
          updated_at: "2026-04-24 13:01:39",
        },
      },
    ],
  }

>                                                                                                         

// 1. Elegimos la nota con ID 1

> $note = App\Models\Note::find(1);

= App\Models\Note {#7351
    id: 1,
    title: "Sed ipsa similique.",
    content: "Repellendus expedita deleniti in consectetur optio laborum. Non totam enim ut aut in reprehenderit provident. Ipsa est vel inventore. In et quaerat nihil voluptas.",
    is_pinned: false,
    category_id: 1,
    created_at: "2026-04-24 13:01:39",
    updated_at: "2026-04-24 13:01:39",
  }

>   

// 2. Elegimos un usuario con el que NO esté compartida (por ejemplo el ID 5)

> $user = App\Models\User::find(5);

= App\Models\User {#7359
    id: 5,
    name: "Dr. Shanna VonRueden",
    email: "sawayn.izaiah@example.net",
    email_verified_at: "2026-04-24 13:01:39",
    #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
    #remember_token: "ARzMIcssmL",
    created_at: "2026-04-24 13:01:39",
    updated_at: "2026-04-24 13:01:39",
  }

>    

// 3. La compartimos usando attach
$note->users()->attach($user->id, ['role' => 'collaborator']);

// 4. Verificamos que ahora el usuario 5 aparece en la nota
$note->users()->get();