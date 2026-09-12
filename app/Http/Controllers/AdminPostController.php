<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                // Recuperar todos los posts (puedes usar paginación)
                $posts = Post::latest()->paginate(10);

                // Retornar la vista con la lista de posts
                return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               // Validar datos
               $request->validate([
                'title'   => 'required|max:255',
                'content' => 'required',
                'image'   => 'nullable|image',
                'meta_title' => 'nullable|max:255',
                'meta_description' => 'nullable|max:320',
            ]);
    
            // Crear slug a partir del título
            $slug = Str::slug($request->title);
    
            // Verificar si existe un slug repetido (opcional)
            $existingSlugCount = Post::where('slug', $slug)->count();
            if ($existingSlugCount > 0) {
                $slug .= '-' . ($existingSlugCount + 1);
            }
    
            // Subir imagen si existe
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
            }
    
            // Crear el post
            Post::create([
                'title'   => $request->title,
                'slug'    => $slug,
                'content' => $request->content,
                'image'   => $imageName,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
            ]);
    
            return redirect()->route('admin.posts.index')
                ->with('success', 'Post creado correctamente.');
    }

       // 4. Formulario para editar un post existente
       public function edit(Post $post)
       {
           return view('admin.posts.edit', compact('post'));
       }
   
       // 5. Actualizar el post en la base de datos
       public function update(Request $request, Post $post)
       {
           $request->validate([
               'title' => 'required|string|max:255',
               'content' => 'required|string',
               'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
               'meta_title' => 'nullable|string|max:255',
               'meta_description' => 'nullable|string|max:320',
           ]);
       
           // Si el usuario sube una nueva imagen
           if ($request->hasFile('image')) {
               $image = $request->file('image');
               $imageName = time() . '.' . $image->getClientOriginalExtension();
               
               // Mover la imagen a la carpeta public/img
               $image->move(public_path('img'), $imageName);
           
               // Guardar la ruta relativa en la base de datos
        $post->image = 'img/' . $imageName;
           }
       
           // Guardar cambios en la base de datos
           $post->update([
               'title' => $request->title,
               'content' => $request->content,
               'image' => $post->image ?? $post->getOriginal('image'), // Mantener imagen si no se cambia
               'meta_title' => $request->meta_title,
               'meta_description' => $request->meta_description,
           ]);
       
           return redirect()->route('admin.posts.index')->with('success', 'Post actualizado correctamente.');
       }
       
   
       // 6. Eliminar un post
       public function destroy(Post $post)
       {
           // Borrar imagen asociada si existe
           // if ($post->image && file_exists(public_path('images/'.$post->image))) {
           //     unlink(public_path('images/'.$post->image));
           // }
   
           $post->delete();
   
           return redirect()->route('admin.posts.index')
               ->with('success', 'Post eliminado correctamente.');
       }
   }