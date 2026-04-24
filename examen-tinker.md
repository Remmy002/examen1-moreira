
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
// P7
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

> $note->users()->attach($user->id, ['role' => 'collaborator']);

= null

>      

// 4. Verificamos que ahora el usuario 5 aparece en la nota

> $note->users()->get();

= Illuminate\Database\Eloquent\Collection {#7352
    all: [
      App\Models\User {#8141
        id: 4,
        name: "Prof. Murl Hermiston MD",
        email: "dayana41@example.com",
        email_verified_at: "2026-04-24 13:01:39",
        #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
        #remember_token: "22uM4K2gJ0",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#8054
          note_id: 1,
          user_id: 4,
          role: "owner",
          created_at: "2026-04-24 13:01:39",
          updated_at: "2026-04-24 13:01:39",
        },
      },
      App\Models\User {#8056
        id: 2,
        name: "Emilie Ernser",
        email: "hill.brisa@example.net",
        email_verified_at: "2026-04-24 13:01:39",
        #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
        #remember_token: "0oXXbQIwGv",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#8538
          note_id: 1,
          user_id: 2,
          role: "collaborator",
          created_at: "2026-04-24 13:01:39",
          updated_at: "2026-04-24 13:01:39",
        },
      },
      App\Models\User {#8059
        id: 5,
        name: "Dr. Shanna VonRueden",
        email: "sawayn.izaiah@example.net",
        email_verified_at: "2026-04-24 13:01:39",
        #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
        #remember_token: "ARzMIcssmL",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        pivot: Illuminate\Database\Eloquent\Relations\Pivot {#8533
          note_id: 1,
          user_id: 5,
          role: "collaborator",
          created_at: "2026-04-24 13:11:03",
          updated_at: "2026-04-24 13:11:03",
        },
      },
    ],
  }

>  
// P8
// 1. Asegurar de tener la nota cargada 

> $note = App\Models\Note::find(1);

= App\Models\Note {#8073
    id: 1,
    title: "Sed ipsa similique.",
    content: "Repellendus expedita deleniti in consectetur optio laborum. Non totam enim ut aut in reprehenderit provident. Ipsa est vel inventore. In et quaerat nihil voluptas.",
    is_pinned: false,
    category_id: 1,
    created_at: "2026-04-24 13:01:39",
    updated_at: "2026-04-24 13:01:39",
  }

>

// 2. Actualizamos el pivote para el usuario 5

> $note->users()->updateExistingPivot(5, ['role' => 'owner']);

= 1

>

// 3. Verificamos el cambio buscando específicamente a ese usuario en la nota

> $note->users()->where('user_id', 5)->first()->pivot->role;

= "owner"

>     

// P9
// Obtenemos categorías con conteo de notas, ordenadas por el conteo

> App\Models\Category::withCount('notes')->orderByDesc('notes_count')->get();

= Illuminate\Database\Eloquent\Collection {#8559
    all: [
      App\Models\Category {#8572
        id: 1,
        name: "error",
        description: "Et animi vitae neque ullam ea impedit vitae rerum.",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        notes_count: 3,
      },
      App\Models\Category {#8563
        id: 2,
        name: "eum",
        description: "Totam eos facere occaecati et omnis.",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        notes_count: 3,
      },
      App\Models\Category {#8564
        id: 5,
        name: "et",
        description: "Reprehenderit vel odio commodi totam minima.",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        notes_count: 2,
      },
      App\Models\Category {#8561
        id: 3,
        name: "ut",
        description: "Adipisci ratione at aliquid odit.",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        notes_count: 1,
      },
      App\Models\Category {#8560
        id: 4,
        name: "laboriosam",
        description: "Qui ea repudiandae natus quae eaque odit sit illum.",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
        notes_count: 1,
      },
    ],
  }

>                                                                                                                       
// P10
// Buscamos usuarios que tengan notas donde is_pinned sea true
w PHP manual is available (latest: 3.0.5). Update with `doc --update-manual`

> App\Models\User::has('notes', '>=', 1)->whereHas('notes', function($query) {
.     $query->where('is_pinned', true);
. })->get();

= Illuminate\Database\Eloquent\Collection {#8601
    all: [
      App\Models\User {#8600
        id: 4,
        name: "Prof. Murl Hermiston MD",
        email: "dayana41@example.com",
        email_verified_at: "2026-04-24 13:01:39",
        #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
        #remember_token: "22uM4K2gJ0",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
      },
      App\Models\User {#8591
        id: 3,
        name: "Mayra Gislason Jr.",
        email: "rhea30@example.org",
        email_verified_at: "2026-04-24 13:01:39",
        #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
        #remember_token: "sPYnn36XAG",
        created_at: "2026-04-24 13:01:39",
        updated_at: "2026-04-24 13:01:39",
      },
    ],
  }

>

// P11
// Usamos el nombre de la tabla intermedia directamente para el filtro

> $u = App\Models\User::withCount(['notes' => function ($query) {
.     $query->where('note_user.role', 'collaborator');
. }])->find(1);

= App\Models\User {#7373
    id: 1,
    name: "Dr. Wilford Schmidt MD",
    email: "bergnaum.rex@example.org",
    email_verified_at: "2026-04-24 13:01:38",
    #password: "\$2y\$12\$wg9QoaMJ8/VEDbBJf39FVukjb0uTp1jcjvdDZ8Mt8bL04hxc58XnC",
    #remember_token: "4EQ2xKnaul",
    created_at: "2026-04-24 13:01:39",
    updated_at: "2026-04-24 13:01:39",
    notes_count: 1,
  }

>

// Accedemos al resultado
> $u->notes_count;

= 1

>     
// P12

> $note = App\Models\Note::find(1);

= App\Models\Note {#8540
    id: 1,
    title: "Sed ipsa similique.",
    content: "Repellendus expedita deleniti in consectetur optio laborum. Non totam enim ut aut in reprehenderit provident. Ipsa est vel inventore. In et quaerat nihil voluptas.",
    is_pinned: false,
    category_id: 1,
    created_at: "2026-04-24 13:01:39",
    updated_at: "2026-04-24 13:01:39",
  }

>

> $note->users()->detach(5);

= 1

>
// Verificación (debe devolver null si ya no existe la relación)
> $note->users()->where('user_id', 5)->first();

= null

>          


// P13
// Contar cuántas notas hay actualmente
> App\Models\Note::count();

= 10

>    

// Elegir la primera categoría y ver su ID

> $cat = App\Models\Category::first();

= App\Models\Category {#8502
    id: 1,
    name: "et",
    description: "Sequi natus voluptatum amet perferendis.",
    created_at: "2026-04-24 13:35:48",
    updated_at: "2026-04-24 13:35:48",
  }

> $id = $cat->id;

= 1

>                                                                                                                       
// Ver cuántas notas pertenecen a esta categoría específicamente

> App\Models\Note::where('category_id', $id)->count();

= 3

>                                                                                                                       
// ELIMINAR LA CATEGORÍA (Aquí ocurre la magia de la cascada)
> $cat->delete();

= true

>   

// Verificar que las notas de esa categoría ya NO existen 
> App\Models\Note::where('category_id', $id)->count();

= 0

>  

// Verificar el conteo total de notas tiene que ser menor a  Contar cuántas notas hay actualmente
> App\Models\Note::count();

= 7

>                                                                                                                       
